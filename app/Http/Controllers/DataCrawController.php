<?php

namespace App\Http\Controllers;

use App\Mail\DataCrawReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\DataCraw;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class DataCrawController extends Controller
{
    public function datashow()
    {
        return view('datashow.index');
    }
    public function search(Request $request)
    {
        try {
            // Validate the request body
            $validator = Validator::make($request->all(), [
                'market' => 'nullable|string',
                'fishType' => 'nullable|string',
                'date' => 'nullable|date_format:Y-m-d',
            ]);
    
            if ($validator->fails()) {
                return response()->json([
                    'success' => false,
                    'error' => 'Validation failed',
                    'messages' => $validator->errors()
                ], 400);
            }
    
            // Get input parameters, default date to yesterday if not provided
            $market = $request->input('market');
            $fishType = $request->input('fishType');
            $date = $request->input('date');
    
            // If date is null, use yesterday's date
            if (!$date) {
                $date = now()->subDay()->toDateString(); // e.g., 2025-04-23 if today is 2025-04-24
            }
    
            // Build query
            $query = DataCraw::query();
    
            if ($market) {
                $query->where('market', $market);
            }
    
            if ($fishType) {
                $query->where('fish_type', $fishType);
            }
    
            $query->whereDate('date', $date);
    
            // Fetch matching records
            $dataCrawRecords = $query->get();
    
            // Group records by category
            $groupedData = $dataCrawRecords->groupBy('category')->map(function ($records) {
                // Group by market, date, and fishType to identify duplicates
                $groupedByMarketDateFish = $records->groupBy(function ($record) {
                    return $record->market . '|' . $record->date . '|' . $record->fish_type;
                });
    
                // Process each group to merge duplicates and calculate averages
                $mergedRecords = $groupedByMarketDateFish->map(function ($group) {
                    if ($group->count() === 1) {
                        $record = $group->first();
                        return [
                            'category' => $record->category,
                            'market' => $record->market,
                            'market_code' => $record->market_code,
                            'date' => $record->date,
                            'fishType' => $record->fish_type,
                            'quantity' => $record->quantity,
                            'unit' => $record->unit,
                            'prices' => [
                                'fish_body_composition' => [
                                    'large' => $record->composition_large,
                                    'medium' => $record->composition_medium,
                                    'small' => $record->composition_small,
                                    'vary_small' => $record->composition_vary_small,
                                ],
                                'large' => [
                                    'high' => $record->large_high,
                                    'medium' => $record->large_medium,
                                    'low_price' => $record->large_low,
                                ],
                                'medium' => [
                                    'high' => $record->medium_high,
                                    'middle_value' => $record->medium_middle,
                                    'low_price' => $record->medium_low,
                                ],
                                'small' => [
                                    'high' => $record->small_high,
                                    'middle_value' => $record->small_middle,
                                    'low_price' => $record->small_low,
                                ],
                            ],
                            'additional_metrics' => [
                                'high' => $record->additional_high,
                                'middle_value' => $record->additional_middle,
                                'low_price' => $record->additional_low,
                            ],
                        ];
                    }
    
                    // For multiple records, calculate averages
                    $firstRecord = $group->first();
                    $averageQuantity = $group->avg('quantity');
                    $avgCompositionLarge = $group->avg('composition_large') ?? 0;
                    $avgCompositionMedium = $group->avg('composition_medium') ?? 0;
                    $avgCompositionSmall = $group->avg('composition_small') ?? 0;
                    $avgCompositionVarySmall = $group->avg('composition_vary_small') ?? 0;
    
                    $avgLargeHigh = $group->pluck('large_high')->filter()->avg() ?? null;
                    $avgLargeMedium = $group->pluck('large_medium')->filter()->avg() ?? null;
                    $avgLargeLow = $group->pluck('large_low')->filter()->avg() ?? null;
    
                    $avgMediumHigh = $group->pluck('medium_high')->filter()->avg() ?? null;
                    $avgMediumMiddle = $group->pluck('medium_middle')->filter()->avg() ?? null;
                    $avgMediumLow = $group->pluck('medium_low')->filter()->avg() ?? null;
    
                    $avgSmallHigh = $group->pluck('small_high')->filter()->avg() ?? null;
                    $avgSmallMiddle = $group->pluck('small_middle')->filter()->avg() ?? null;
                    $avgSmallLow = $group->pluck('small_low')->filter()->avg() ?? null;
    
                    $avgAdditionalHigh = $group->pluck('additional_high')->filter()->avg() ?? null;
                    $avgAdditionalMiddle = $group->pluck('additional_middle')->filter()->avg() ?? null;
                    $avgAdditionalLow = $group->pluck('additional_low')->filter()->avg() ?? null;
    
                    return [
                        'category' => $firstRecord->category,
                        'market' => $firstRecord->market,
                        'market_code' => $firstRecord->market_code,
                        'date' => $firstRecord->date,
                        'fishType' => $firstRecord->fish_type,
                        'quantity' => round($averageQuantity, 2),
                        'unit' => $firstRecord->unit,
                        'prices' => [
                            'fish_body_composition' => [
                                'large' => round($avgCompositionLarge, 2),
                                'medium' => round($avgCompositionMedium, 2),
                                'small' => round($avgCompositionSmall, 2),
                                'vary_small' => round($avgCompositionVarySmall, 2),
                            ],
                            'large' => [
                                'high' => $avgLargeHigh ? round($avgLargeHigh, 2) : null,
                                'medium' => $avgLargeMedium ? round($avgLargeMedium, 2) : null,
                                'low_price' => $avgLargeLow ? round($avgLargeLow, 2) : null,
                            ],
                            'medium' => [
                                'high' => $avgMediumHigh ? round($avgMediumHigh, 2) : null,
                                'middle_value' => $avgMediumMiddle ? round($avgMediumMiddle, 2) : null,
                                'low_price' => $avgMediumLow ? round($avgMediumLow, 2) : null,
                            ],
                            'small' => [
                                'high' => $avgSmallHigh ? round($avgSmallHigh, 2) : null,
                                'middle_value' => $avgSmallMiddle ? round($avgSmallMiddle, 2) : null,
                                'low_price' => $avgSmallLow ? round($avgSmallLow, 2) : null,
                            ],
                        ],
                        'additional_metrics' => [
                            'high' => $avgAdditionalHigh ? round($avgAdditionalHigh, 2) : null,
                            'middle_value' => $avgAdditionalMiddle ? round($avgAdditionalMiddle, 2) : null,
                            'low_price' => $avgAdditionalLow ? round($avgAdditionalLow, 2) : null,
                        ],
                    ];
                })->values()->toArray();
    
                return $mergedRecords;
            })->toArray();
    
            return response()->json([
                'success' => true,
                'data' => $groupedData,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to retrieve data',
                'message' => $e->getMessage(),
            ], 500);
        }
    }

    public function fetchAndStore()
    {

        $today = now()->toDateString();


        $existingData = DataCraw::whereDate('created_at', $today)->exists();

        if ($existingData) {
            $stats = [
                'total' => 0,
                'processed' => 0,
                'saved' => 0,
                'skipped' => 0,
            ];

            Mail::send(new DataCrawReport($stats));

            return response()->json([
                'success' => false,
                'error' => 'Data already exists for today',
                'date' => $today
            ], 400);
        }


        $response = Http::get('https://test.fishseller.shop/api.php');

        if (!$response->successful()) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to fetch data',
                'status' => $response->status()
            ], 500);
        }

        $data = $response->json();

        if (!isset($data['data']) || !is_array($data['data'])) {
            return response()->json([
                'success' => false,
                'error' => 'Invalid data format'
            ], 400);
        }

        $processedData = [];
        $lastValidMarket = null;

        foreach ($data['data'] as $item) {
            $market = $this->normalizeMarket($item['market'] ?? null);

            if ($market === null && $lastValidMarket !== null) {
                $market = $lastValidMarket;
            }

            if ($market !== null) {
                if ($this->normalizeMarket($item['market'] ?? null) !== null) {
                    $lastValidMarket = $market;
                }

                $date = $this->normalizeDate($item['date'] ?? null);

                $processedData[] = [
                    'category' => $item['category'] ?? null,
                    'market' => $market,
                    'market_code' => $item['market_code'] ?? null,
                    'date' => $date,
                    'fish_type' => $item['fishType'] ?? null,
                    'quantity' => $item['quantity'] ?? null,
                    'unit' => $item['unit'] ?? null,
                    'composition_large' => $item['prices']['fish_body_composition']['large'] ?? 0,
                    'composition_medium' => $item['prices']['fish_body_composition']['medium'] ?? 0,
                    'composition_small' => $item['prices']['fish_body_composition']['small'] ?? 0,
                    'composition_vary_small' => $item['prices']['fish_body_composition']['vary_small'] ?? 0,
                    'large_high' => $item['prices']['large']['high'] ?? null,
                    'large_medium' => $item['prices']['large']['medium'] ?? null,
                    'large_low' => $item['prices']['large']['low_price'] ?? null,
                    'medium_high' => $item['prices']['medium']['high'] ?? null,
                    'medium_middle' => $item['prices']['medium']['middle_value'] ?? null,
                    'medium_low' => $item['prices']['medium']['low_price'] ?? null,
                    'small_high' => $item['prices']['small']['high'] ?? null,
                    'small_middle' => $item['prices']['small']['middle_value'] ?? null,
                    'small_low' => $item['prices']['small']['low_price'] ?? null,
                    'additional_high' => $item['additional_metrics']['high'] ?? null,
                    'additional_middle' => $item['additional_metrics']['middle_value'] ?? null,
                    'additional_low' => $item['additional_metrics']['low_price'] ?? null,
                    'created_at' => now(),
                    'updated_at' => now(),
                ];
            }
        }


        $mergedData = collect($processedData)->groupBy(function ($item) {
            return $item['market'] . '|' . $item['date'] . '|' . $item['fish_type'];
        })->map(function ($group) {
            if ($group->count() === 1) {
                return $group->first();
            }


            $averageQuantity = $group->avg('quantity');
            $avgCompositionLarge = $group->avg('composition_large') ?? 0;
            $avgCompositionMedium = $group->avg('composition_medium') ?? 0;
            $avgCompositionSmall = $group->avg('composition_small') ?? 0;
            $avgCompositionVarySmall = $group->avg('composition_vary_small') ?? 0;

            $avgLargeHigh = $group->pluck('large_high')->filter()->avg() ?? null;
            $avgLargeMedium = $group->pluck('large_medium')->filter()->avg() ?? null;
            $avgLargeLow = $group->pluck('large_low')->filter()->avg() ?? null;

            $avgMediumHigh = $group->pluck('medium_high')->filter()->avg() ?? null;
            $avgMediumMiddle = $group->pluck('medium_middle')->filter()->avg() ?? null;
            $avgMediumLow = $group->pluck('medium_low')->filter()->avg() ?? null;

            $avgSmallHigh = $group->pluck('small_high')->filter()->avg() ?? null;
            $avgSmallMiddle = $group->pluck('small_middle')->filter()->avg() ?? null;
            $avgSmallLow = $group->pluck('small_low')->filter()->avg() ?? null;

            $avgAdditionalHigh = $group->pluck('additional_high')->filter()->avg() ?? null;
            $avgAdditionalMiddle = $group->pluck('additional_middle')->filter()->avg() ?? null;
            $avgAdditionalLow = $group->pluck('additional_low')->filter()->avg() ?? null;

            $firstItem = $group->first();

            return [
                'category' => $firstItem['category'],
                'market' => $firstItem['market'],
                'market_code' => $firstItem['market_code'],
                'date' => $firstItem['date'],
                'fish_type' => $firstItem['fish_type'],
                'quantity' => round($averageQuantity, 2),
                'unit' => $firstItem['unit'],
                'composition_large' => round($avgCompositionLarge, 2),
                'composition_medium' => round($avgCompositionMedium, 2),
                'composition_small' => round($avgCompositionSmall, 2),
                'composition_vary_small' => round($avgCompositionVarySmall, 2),
                'large_high' => $avgLargeHigh ? round($avgLargeHigh, 2) : null,
                'large_medium' => $avgLargeMedium ? round($avgLargeMedium, 2) : null,
                'large_low' => $avgLargeLow ? round($avgLargeLow, 2) : null,
                'medium_high' => $avgMediumHigh ? round($avgMediumHigh, 2) : null,
                'medium_middle' => $avgMediumMiddle ? round($avgMediumMiddle, 2) : null,
                'medium_low' => $avgMediumLow ? round($avgMediumLow, 2) : null,
                'small_high' => $avgSmallHigh ? round($avgSmallHigh, 2) : null,
                'small_middle' => $avgSmallMiddle ? round($avgSmallMiddle, 2) : null,
                'small_low' => $avgSmallLow ? round($avgSmallLow, 2) : null,
                'additional_high' => $avgAdditionalHigh ? round($avgAdditionalHigh, 2) : null,
                'additional_middle' => $avgAdditionalMiddle ? round($avgAdditionalMiddle, 2) : null,
                'additional_low' => $avgAdditionalLow ? round($avgAdditionalLow, 2) : null,
                'created_at' => now(),
                'updated_at' => now(),
            ];
        })->values()->toArray();

        try {
            DB::beginTransaction();

            $savedCount = 0;
            foreach ($mergedData as $item) {
                DataCraw::create($item);
                $savedCount++;
            }

            DB::commit();
            $stats = [
                'total' => count($data['data']),
                'processed' => count($mergedData),
                'saved' => $savedCount,
                'skipped' => count($data['data']) - count($mergedData)
            ];

            Mail::send(new DataCrawReport($stats));

            return response()->json([
                'success' => true,
                'message' => 'Data saved successfully',
                'stats' => $stats
            ]);
        } catch (\Exception $e) {
            DB::rollBack();
            $stats = [
                'total' => count($data['data'] ?? []),
                'processed' => count($mergedData),
                'saved' => 0,
                'skipped' => count($data['data'] ?? []) - count($mergedData)
            ];

            Mail::send(new DataCrawReport($stats));

            return response()->json([
                'success' => false,
                'error' => 'Database error',
                'message' => $e->getMessage()
            ], 500);
        }
    }


    private function normalizeMarket($value)
    {
        if ($value === null) {
            return null;
        }

        $value = (string)$value;
        $value = trim($value, " \t\n\r\0\x0B\u{3000}");

        if ($value === '' || strtolower($value) === 'null') {
            return null;
        }

        return $value;
    }


    private function normalizeDate($date)
    {

        $date = trim((string)$date, " \t\n\r\0\x0B\u{3000}");


        if ($date === null || $date === '' || strtolower($date) === 'null') {
            return Carbon::now()->format('Y-m-d');
        }


        $date = str_replace('分', '', $date);


        if (preg_match('/^\d{1,2}\/\d{1,2}$/', $date)) {
            $date = Carbon::now()->format('Y-') . str_replace('/', '-', $date);
        }


        if (empty($date)) {
            return Carbon::now()->format('Y-m-d');
        }

        return $date;
    }


    public function apidata()
    {
        try {

            $today = now()->toDateString();
            $yesterday = now()->subDay()->toDateString();

            $dataCrawRecords = DataCraw::whereDate('created_at', $today)->get();


            if ($dataCrawRecords->isEmpty()) {
                $dataCrawRecords = DataCraw::whereDate('created_at', $yesterday)->get();
            }


            $groupedData = $dataCrawRecords->groupBy('category')->map(function ($records) {
                return $records->map(function ($record) {
                    return [
                        'category' => $record->category,
                        'market' => $record->market,
                        'market_code' => $record->market_code,
                        'date' => $record->date,
                        'fishType' => $record->fish_type,
                        'quantity' => $record->quantity,
                        'unit' => $record->unit,
                        'prices' => [
                            'fish_body_composition' => [
                                'large' => $record->composition_large,
                                'medium' => $record->composition_medium,
                                'small' => $record->composition_small,
                                'vary_small' => $record->composition_vary_small,
                            ],
                            'large' => [
                                'high' => $record->large_high,
                                'medium' => $record->large_medium,
                                'low_price' => $record->large_low,
                            ],
                            'medium' => [
                                'high' => $record->medium_high,
                                'middle_value' => $record->medium_middle,
                                'low_price' => $record->medium_low,
                            ],
                            'small' => [
                                'high' => $record->small_high,
                                'middle_value' => $record->small_middle,
                                'low_price' => $record->small_low,
                            ],
                        ],
                        'additional_metrics' => [
                            'high' => $record->additional_high,
                            'middle_value' => $record->additional_middle,
                            'low_price' => $record->additional_low,
                        ],
                    ];
                })->toArray();
            })->toArray();

            return response()->json([
                'success' => true,
                'data' => $groupedData,
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'error' => 'Failed to retrieve data',
                'message' => $e->getMessage(),
            ], 500);
        }
    }


    public function getByMarket()
    {
        $data = DataCraw::distinct()->pluck('market');

        return response()->json($data);
    }



    public function getByFish(Request $request)
    {
        $data = DataCraw::distinct()->pluck('fish_type');

        return response()->json($data);
    }

    public function getByDate(Request $request)
    {
        $data = DataCraw::distinct()->pluck('date');

        return response()->json($data);
    }
}
