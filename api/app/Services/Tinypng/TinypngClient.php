<?php

namespace App\Services\Tinypng;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tinify\Source;
use Tinify\Tinify;

final class TinypngClient
{

    public function __construct()
    {
        Tinify::setKey(config("tinypng.API_KEY"));
    }

    public function optimizeImage(UploadedFile $image): string
    {
        $time = strtotime(now());
        $imageName = $image->getClientOriginalName();
        $destination_path = 'public/images/' . $time;

        $path = $image->storeAs($destination_path, $imageName);
        $url = Storage::disk('public')->url($image);

        $savedImage = Storage::disk('local')->get($path);

        if (!$savedImage) {
            throw new \JsonException();
        }

        $source = Source::fromBuffer($savedImage);

        $resized = $source->resize(array(
            "method" => "cover",
            "width" => 70,
            "height" => 70
        ));

        $resizedImage = $resized->toBuffer();

        Storage::disk('public')->put('images/' . $time . '/' . $imageName, $resizedImage);

        return $url;
    }
}
