<?php
// app/Http/Middleware/GlobalImageOptimizer.php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageOptimizer
{
    protected $imageTypes = [
        'image/jpeg',
        'image/jpg',
        'image/png'
    ];

    public function handle(Request $request, Closure $next)
    {
        $response = $next($request);

        try {
            $contentType = $response->headers->get('Content-Type');

            // Skip if not an image or already optimized
            if (!in_array($contentType, $this->imageTypes)) {
                return $response;
            }

            $image = Image::make($response->getContent());
            
            // Global optimization with moderate compression
            $optimizedImage = $image->encode(null, 75);

            return response($optimizedImage)
                ->header('Content-Type', $contentType)
                ->header('Cache-Control', 'public, max-age=31536000');

        } catch (\Exception $e) {
            // If any error occurs, return original response
            return $response;
        }
    }
}