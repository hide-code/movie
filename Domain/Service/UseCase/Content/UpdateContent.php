<?php
declare(strict_types=1);

namespace Domain\Service\UseCase\Content;

use App\Models\Content;
use Domain\Service\Traits\ResizeImage;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
class UpdateContent
{
    use ResizeImage;

    private $content;

    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    public function __invoke(
        int $contentId,
        string $title,
        string $comment,
        ?UploadedFile $avatar,
        array $selectedCategoryIds
    ): void {

        $content = $this->content->find($contentId);

        if (isset($avatar)) {
            $resizedAvatar = $this->resizeImage(
                $avatar,
                512,
                512
            );

            if (!in_array("public/movie", Storage::directories('public'))) {
                Storage::makeDirectory("public/movie");
            }

            $random = Str::random(40);
            $avatar = $resizedAvatar->save(storage_path('app/public/movie/' . $random . '.jpg'));
            $content->avatar = 'storage/movie/' . $random . '.jpg';
        }

        $content->title = $title;
        $content->comment = $comment;

        $content->save();

        $content->categories()->sync($selectedCategoryIds);
    }
}
