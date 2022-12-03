<?php
declare(strict_types=1);

namespace Domain\Service\UseCase\Content;

use App\Models\Comment;

class StoreComment
{
    private $comment;

    public function __construct(Comment $comment)
    {
        $this->comment = $comment;
    }

    public function __invoke(
        int $contentId,
        string $title,
        string $content
    ): Comment {
        $this->comment->content_id = $contentId;
        $this->comment->title = $title;
        $this->comment->content = $content;
        $this->comment->save();

        return $this->comment;
    }
}
