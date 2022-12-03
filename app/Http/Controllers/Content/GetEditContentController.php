<?php
declare(strict_types=1);

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Domain\Service\UseCase\Content\GetCategoryList;
use Domain\Service\UseCase\Content\GetEditContent;
use Illuminate\View\View;

class GetEditContentController extends Controller
{
    /**
     * 編集画面に遷移する
     *
     * @param integer $contentId
     * @param GetShowContent $getShowContent
     * @return View
     */
    public function __invoke(
        int $contentId,
        GetEditContent $getEditContent,
        GetCategoryList $getCategoryList
    ): View {
        return view('content.edit',
            [
                'content' => $getEditContent($contentId),
                'categories' => $getCategoryList()
            ]
        );
    }
}
