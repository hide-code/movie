<?php
declare(strict_types=1);

namespace App\Http\Controllers\Content;

use App\Http\Controllers\Controller;
use Domain\Service\UseCase\Content\GetShowContent;
use Illuminate\View\View;

class GetShowController extends Controller
{
    /**
     * 詳細画面に遷移する
     *
     * @param integer $contentId
     * @param GetShowContent $getShowContent
     * @return View
     */
    public function __invoke(
        int $contentId,
        GetShowContent $getShowContent
    ): View {
        return view('content.show',
            [
                'content' => $getShowContent($contentId),
            ]
        );
    }
}
