<?php
declare(strict_types=1);

namespace App\Http\Controllers\Content;

use App\Domain\Service\UseCase\Content\GetCategoryList;
use App\Domain\Service\UseCase\Content\GetContentList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

/**
 *  GetController class
 */
class GetContentController extends Controller
{
    /**
     * コンテンツ一覧画面に表示する情報を取得する
     *
     * @param GetContentList $getContentList
     */
    public function __invoke(
        GetContentList $getContentList,
        GetCategoryList $getCategoryList,
        Request $request
    ): View
    {
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
