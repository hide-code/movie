<?php
declare(strict_types=1);

namespace Domain\Service\UseCase\Content;

use App\Models\Content;
use Domain\Service\Traits\ResizeImage;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class StoreContent
{
    use ResizeImage;

    private $content;

    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    public function __invoke(
        string $title,
        string $comment,
        UploadedFile $avatar,
        array $selectedCategoryIds
    ): void {
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

        $tmpPath = storage_path('app/public/movie/' . $random . '.jpg');
        $url = Storage::disk('s3')->putFile('test', new File($tmpPath), 'public');

        $this->content->user_id = Auth::id();
        $this->content->title = $title;
        $this->content->comment = $comment;
        $this->content->avatar = $url;
        $this->content->save();

        $this->content
            ->categories()
            ->sync($selectedCategoryIds);
    }
}
