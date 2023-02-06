<?php
declare(strict_types=1);

namespace Domain\Service\UseCase\Content;

use App\Models\Content;
use Illuminate\Pagination\LengthAwarePaginator;

class GetContentList
{
    private $content;

    public function __construct(Content $content)
    {
        $this->content = $content;
    }

    /**
     * 検索ワードとタグが指定されたらそのページを返却する
     *
     * @param ?int $categoryId
     * @param ?string $searchWord
     */
    public function __invoke(
        ?int $categoryId,
        ?string $searchWord
    ): LengthAwarePaginator {
        $query = Content::query();

        if (!empty($categoryId)) {
            $query = $query->whereHas('categories', function ($q) use ($categoryId) {
                return $q->where('id', $categoryId);
               });
        }

        if (!empty($searchWord)) {
            $query = $query->whereHas('categories', function ($q) use ($searchWord) {
                return $q->where('title', 'like', '%' . $searchWord . '%');
               });
        }

        return $query->orderBy('id', 'desc')->withCount('comments')->paginate(10);
    }

}
