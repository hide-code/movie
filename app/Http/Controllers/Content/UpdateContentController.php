<?php
declare(strict_types=1);

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\ContentRequest;
use Domain\Service\UseCase\Content\UpdateContent;
use Illuminate\Http\RedirectResponse;

class UpdateContentController extends Controller
{
    /**
     * コンテンツを更新する
     *
     * @param UpdateContent $updateContent
     * @param ContentRequest $contentRequest
     * @return void
     */
    public function __invoke(
        UpdateContent $updateContent,
        ContentRequest $contentRequest
    ): RedirectResponse {
        $updateContent(
            (int)$contentRequest->content_id,
            $contentRequest->title,
            $contentRequest->comment,
            $contentRequest->avatar,
            $contentRequest->category_ids
        );

        return redirect()->route('content.index');
    }
}
