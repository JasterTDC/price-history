<?php

namespace JasterTDC\PriceHistory\Category\Application\UseCase;

use JasterTDC\PriceHistory\Category\Domain\Category;
use JasterTDC\PriceHistory\Category\Domain\Repository\CategoryRepository;
use JasterTDC\PriceHistory\Category\Domain\Service\CategoryService;

final readonly class SaveCategoryUseCase
{
    public function __construct(
        private CategoryService $service,
        private CategoryRepository $repository
    ) {
    }

    public function __invoke(int $page): void
    {
        $categoriesToSave = [];

        $categories = $this->service->getCategoryByPage($page);

        /** @var Category $category */
        foreach ($categories as $category) {
            if (!empty($category->parentCategory())) {
                $categoriesToSave[$category->parentCategoryId()] = $category->parentCategory();
            }
            $categoriesToSave[$category->idValue()] = $category;
        }

        $this->repository->save(...$categoriesToSave);
    }
}
