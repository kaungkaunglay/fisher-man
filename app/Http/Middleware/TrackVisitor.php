<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class TrackVisitor
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $ip = $request->ip();
        $productId = $request->route('id');

        // Generate a unique cache key for the product
        $cacheKey = "product:{$productId}:data";

        // Attempt to get the cached data
        $data = Cache::get($cacheKey);

        // If cache doesn't exist (cache miss) or expired, initialize it:
        if (!$data) {
            // Fetch the product's visit data from the database
            $product = Product::find($productId);

            if ($product) {
                $data = [
                    'visits' => 0,
                    'ips'    => [],  // An empty list of IPs for tracking
                ];

                // Retrieve TTL value from your system table (e.g., 1 week)
                $ttl = Setting::getValue('cache_time_out');
                $expirationTime = now()->add(\Carbon\CarbonInterval::createFromDateString($ttl));
                // Cache the data with the new TTL
                Cache::put($cacheKey, $data, $expirationTime);
            }
        }

        // Check if the IP has already visited
        $ip = $request->ip();

        if (!in_array($ip, $data['ips'])) {
            $data['ips'][] = $ip;
            $data['visits']++;

            // After modifying, update the cache with the new visit count
            $ttl = Setting::getValue('cache_time_out') ?? 3600;
            $expirationTime = now()->addSecond($ttl);

            Cache::put($cacheKey, $data, $expirationTime);
        }

        // dd($data,$productId,$cacheKey);

        return $next($request);
    }
}
