<?php
declare(strict_types=1);

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Domain\Service\UseCase\Content\GetCategoryList;
use Illuminate\View\View;

class GetCreateContentController extends Controller
{
    /**
     * コンテンツ作成ページに遷移する
     *
     * @return View
     */
    public function __invoke(
        GetCategoryList $getCategoryList
    ): View {
        return view(
            'content.create',
            ['category_list' => $getCategoryList()]
        );
    }
}
