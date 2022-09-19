<?php
declare(strict_types=1);

namespace App\Http\Controllers\Content;

use Domain\Service\UseCase\Content\GetCategoryList;
use Domain\Service\UseCase\Content\GetContentList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GetContentController extends Controller
{
    /**
     * コンテンツ一覧画面に遷移する
     *
     * @param GetContentList $getContentList
     * @param GetCategoryList $getCategoryList
     * @param Request $request
     * @return View
     */
    public function __invoke(
        GetContentList $getContentList,
        GetCategoryList $getCategoryList,
        Request $request
    ): View {
        return view('content.index',
            [
                'content_list' => $getContentList(
                    (int)$request->category_id,
                    $request->search_word
                ),
                'category_list' => $getCategoryList()
            ]
        );
    }
}
