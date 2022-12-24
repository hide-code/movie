<?php
declare(strict_types=1);

namespace Domain\Service\UseCase\Content;

use App\Models\Content;

class GetShowContent
{
    private $content;

    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    /**
     * コンテンツ情報を取得する
     *
     * @param integer $contentId
     * @return Content
     */
    public function __invoke(
        int $contentId
    ): Content {
        return $this->content
            ->with('comments')
            ->find($contentId);
    }
}
