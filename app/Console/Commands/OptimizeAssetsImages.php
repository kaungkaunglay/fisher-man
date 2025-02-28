<?php

namespace App\Console\Commands;
use Illuminate\Console\Command;
use Spatie\ImageOptimizer\OptimizerChainFactory;
use Illuminate\Support\Facades\File;
use Spatie\ImageOptimizer\OptimizerChain;
use Spatie\ImageOptimizer\Optimizers\Jpegoptim;
use Spatie\ImageOptimizer\Optimizers\Pngquant;
use Spatie\ImageOptimizer\Optimizers\Optipng;
use Spatie\ImageOptimizer\Optimizers\Svgo;
use Illuminate\Support\Facades\Log;

class OptimizeAssetsImages extends Command
{
    protected $signature = 'images:optimize-assets';
    protected $description = 'Optimize all images inside public/assets/images';

        public function handle()
        {
        $optimizerChain = (new OptimizerChain)
        ->addOptimizer(new Jpegoptim([
            '--strip-all',
            '--all-progressive',
            '--max=80'
        ]))
        ->addOptimizer(new Pngquant([
            '--force',
            '--quality=65-80'
        ]))
        ->addOptimizer(new Optipng([
            '-o7',
        ]))
        ->addOptimizer(new Svgo([
            '--disable=cleanupIDs'
        ]));
        $directory = public_path('assets/images');

        $images = File::allFiles($directory);
        foreach ($images as $image) {
            if (in_array($image->getExtension(), ['jpg', 'jpeg', 'png', 'gif', 'svg', 'webp'])) {
                $originalSize = filesize($image->getRealPath());
                $this->info("Optimizing: " . $image->getFilename() . " (Original Size: " . $this->formatBytes($originalSize) . ")");

                try {
                    $optimizerChain->optimize($image->getRealPath());
                    Log::info("Optimization successful: " . $image->getFilename());
                } catch (\Exception $e) {
                    Log::error("Error optimizing " . $image->getFilename() . ": " . $e->getMessage());
                }

                $optimizedSize = filesize($image->getRealPath());

                $this->info("Optimized: " . $image->getFilename());
                $this->info("Original Size: " . $this->formatBytes($originalSize));
                $this->info("Optimized Size: " . $this->formatBytes($optimizedSize));
                $this->info("Reduction: " . $this->formatBytes($originalSize - $optimizedSize));
            }
        }

        $this->info('All images in public/assets/images have been optimized.');
    }

    private function formatBytes($bytes, $precision = 2)
    {
        $units = ['B', 'KB', 'MB', 'GB', 'TB'];

        $bytes = max($bytes, 0);
        $pow = floor(($bytes ? log($bytes) : 0) / log(1024));
        $pow = min($pow, count($units) - 1);

        $bytes /= (1 << (10 * $pow));

        return round($bytes, $precision) . ' ' . $units[$pow];
    }
}