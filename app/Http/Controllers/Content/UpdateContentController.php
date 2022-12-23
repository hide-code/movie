<?php
declare(strict_types=1);

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\ContentUpdateRequest;
use App\Models\Content;
use Domain\Service\UseCase\Content\UpdateContent;
use Illuminate\Http\RedirectResponse;

class UpdateContentController extends Controller
{
    /**
     * コンテンツを更新する
     *
     * @param UpdateContent $updateContent
     * @param ContentUpdateRequest $contentUpdateRequest
     * @return void
     */
    public function __invoke(
        Content $content,
        UpdateContent $updateContent,
        ContentUpdateRequest $contentUpdateRequest
    ): RedirectResponse {
        $updateContent(
            (int)$contentUpdateRequest->content_id,
            $contentUpdateRequest->title,
            $contentUpdateRequest->comment,
            $contentUpdateRequest->avatar,
            $contentUpdateRequest->category_ids
        );

        return redirect()->route('content.index');
    }
}
