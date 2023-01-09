<?php
declare(strict_types=1);

namespace Domain\Service\Traits;

use Illuminate\Http\UploadedFile;
use Intervention\Image\Facades\Image as ImageFacade;
use Intervention\Image\Image;

trait ResizeImage
{
    /**
     * 画像をリサイズする
     *
     * @param UploadedFile $file
     * @param integer $height
     * @param integer $width
     * @return Image
     */
    private function resizeImage(
      UploadedFile $file,
      int $height,
      int $width
    ): Image {
        return ImageFacade::make($file)
            ->orientate()
            ->resize(
                $height,
                $width
            );
    }
}
