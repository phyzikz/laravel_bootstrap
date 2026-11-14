<?php

namespace App\Http\Controllers;

use Devrabiul\ToastMagic\Facades\ToastMagic;
use Illuminate\View\View;
use Intervention\Image\Direction;
use Intervention\Image\Drivers\Gd\Driver as GdDriver;
use Intervention\Image\Drivers\Imagick\Driver as ImagickDriver;
use Intervention\Image\Format;
use Intervention\Image\ImageManager;
use RuntimeException;

class DemoController extends Controller
{
    public function index(): View
    {
        ToastMagic::success('Welcome', 'Hi there');

        $sourcePath = public_path('img/example.png');

        if (! is_file($sourcePath)) {
            throw new RuntimeException('Demo image missing. Run npm run build (or npm run dev) to copy resources/img to public/img.');
        }

        $manager = ImageManager::usingDriver(
            config('images.default') === 'imagick' ? ImagickDriver::class : GdDriver::class
        );

        $image = $manager->decodePath($sourcePath);
        $image->scale(width: (int) round($image->width() / 2));
        $image->flip(Direction::VERTICAL);

        $processedImageDataUri = (string) $image
            ->encodeUsingFormat(Format::PNG)
            ->toDataUri();

        return view('demo', [
            'originalImageUrl' => asset('img/example.png'),
            'processedImageDataUri' => $processedImageDataUri,
        ]);
    }
}
