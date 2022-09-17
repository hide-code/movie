<?php
declare(strict_types=1);

namespace App\Http\Controllers\Content;

use Domain\Service\UseCase\Content\GetCategoryList;
use Domain\Service\UseCase\Content\GetContentList;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GetCreateContentController extends Controller
{
    /**
     * コンテンツ一覧画面に表示する情報を取得する
     *
     * @param GetContentList $getContentList
     */
    public function __invoke(): View
    {
        return view('content.create');
    }
}
