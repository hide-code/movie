<?php
declare(strict_types=1);

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\CommentRequest;
use Domain\Service\UseCase\Content\StoreComment;
use Illuminate\Http\RedirectResponse;

class StoreCommentController extends Controller
{
    /**
     * コメントを新規登録する
     *
     * @param StoreComment $storeComment
     * @param CommentRequest $commentRequest
     * @return RedirectResponse
     */
    public function __invoke(
        StoreComment $storeComment,
        CommentRequest $commentRequest
    ): RedirectResponse {
      $contentId = (int)$commentRequest->content_id;
        $storeComment(
            $contentId,
            $commentRequest->title,
            $commentRequest->content
        );

        return redirect()->route('content.show', $contentId);
    }
}
