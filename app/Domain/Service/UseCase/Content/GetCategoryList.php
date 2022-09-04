<?php
declare(strict_types=1);

namespace app\Domain\Service\UseCase\Content;

use App\Models\Category;

class GetCategoryList
{
    private $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function __invoke()
    {
        return $this->category->get();
    }

}
