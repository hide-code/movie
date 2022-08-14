<?php
declare(strict_types=1);

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use App\Domain\Service\UseCase\Content\GetContent;
use Illuminate\View\View;

/**
 *  GetController class
 */
class GetController extends Controller
{
    /**
     * コンテンツ一覧情報を取得する
     *
     * @param GetContent $getContent
     */
    public function __invoke(GetContent $getContent): View
    {
        return view('content.index', ['content' => $getContent->getContentList() ]);
    }
}
