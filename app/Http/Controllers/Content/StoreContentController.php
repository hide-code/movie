<?php
declare(strict_types=1);

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Http\Requests\Content\ContentRequest;
use Domain\Service\UseCase\Content\StoreContent;
use Illuminate\Http\RedirectResponse;

class StoreContentController extends Controller
{
    /**
     * コンテンツを新規登録する
     *
     * @param StoreContent $storeContent
     * @param ContentRequest $contentRequest
     * @return void
     */
    public function __invoke(
        StoreContent $storeContent,
        ContentRequest $contentRequest
    ) {
        $storeContent(
            $contentRequest->title,
            $contentRequest->comment,
            $contentRequest->avatar,
            $contentRequest->category_ids
        );

        return redirect()->route('content.index');
    }
}
