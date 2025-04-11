<?php

namespace App\Http\Controllers;
use App\Mail\DataCrawReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\DataCraw;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class DataCrawController extends Controller
{
    public function datashow() {
        return view('datashow.index');
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

        try {
            DB::beginTransaction();

            $savedCount = 0;
            foreach ($processedData as $item) {
                DataCraw::create($item);
                $savedCount++;
            }

            DB::commit();
            $stats = [
                'total' => count($data['data']),
                'processed' => count($processedData),
                'saved' => $savedCount,
                'skipped' => count($data['data']) - count($processedData)
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
                'processed' => count($processedData),
                'saved' => 0,
                'skipped' => count($data['data'] ?? []) - count($processedData)
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

}