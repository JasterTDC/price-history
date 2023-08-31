<?php

declare(strict_types=1);

namespace JasterTDC\PriceHistory\Tests\Category\Application\UseCase;

use InvalidArgumentException;
use JasterTDC\PriceHistory\Category\Application\UseCase\SaveCategoryUseCase;
use JasterTDC\PriceHistory\Category\Domain\Category;
use JasterTDC\PriceHistory\Category\Domain\Repository\CategoryRepository;
use JasterTDC\PriceHistory\Category\Domain\Service\CategoryService;
use JasterTDC\PriceHistory\Tests\Category\Domain\ObjectMother\CategoryObjectMother;
use PHPUnit\Framework\TestCase;

final class SaveCategoryUseCaseTest extends TestCase
{
    /** @dataProvider dataProvider */
    public function testGivenValidWhenHappyPathThenReturnValid(
        CategoryService $categoryService,
        CategoryRepository $categoryRepository,
        int $page
    ): void {
        $sut = new SaveCategoryUseCase(
            service: $categoryService,
            repository: $categoryRepository
        );

        $sut($page);

        $this->assertTrue(true);
    }

    public function dataProvider(): array
    {
        $gameCategory = CategoryObjectMother::build(
            primitiveCategoryId: 2,
            primitiveName: 'Games',
            primitiveFriendlyName: 'Games'
        );
        $filmCategory = CategoryObjectMother::build(
            primitiveCategoryId: 4,
            primitiveName: 'Films',
            primitiveFriendlyName: 'Films'
        );
        $ps4GamesCategory = CategoryObjectMother::build(
            parentCategory: $gameCategory,
            primitiveCategoryId: 20,
            primitiveName: 'PS4 Games',
            primitiveFriendlyName: 'PS4 Games'
        );
        $ps5GamesCategory = CategoryObjectMother::build(
            parentCategory: $gameCategory,
            primitiveCategoryId: 21,
            primitiveName: 'PS5 Games',
            primitiveFriendlyName: 'PS5 Games'
        );
        $bluRayFilmsCategory = CategoryObjectMother::build(
            parentCategory: $filmCategory,
            primitiveCategoryId: 11,
            primitiveName: 'Blu-ray Films',
            primitiveFriendlyName: 'Blu-ray Films'
        );

        return [
            'first page' => [
                'categoryService' => $this->categoryService(
                    page: 1,
                    categories: [
                        $ps4GamesCategory,
                        $ps5GamesCategory,
                        $bluRayFilmsCategory,
                    ]
                ),
                'categoryRepository' => $this->categoryRepository(
                    numberOfCategories: 5,
                    categories: [
                        $gameCategory,
                        $ps4GamesCategory,
                        $ps5GamesCategory,
                        $filmCategory,
                        $bluRayFilmsCategory,
                    ]
                ),
                'page' => 1,
            ],
            'second page' => [
                'categoryService' => $this->categoryService(
                    page: 2,
                    categories: [
                        $filmCategory,
                    ]
                ),
                'categoryRepository' => $this->categoryRepository(
                    numberOfCategories: 1,
                    categories: [
                        $filmCategory,
                    ]
                ),
                'page' => 2,
            ],
        ];
    }

    private function categoryService(int $page, array $categories): CategoryService
    {
        $categoryService = $this->createMock(CategoryService::class);

        $categoryService
            ->expects($this->once())
            ->method('getCategoryByPage')
            ->with($page)
            ->willReturn($categories);

        return $categoryService;
    }

    private function categoryRepository(int $numberOfCategories, array $categories): CategoryRepository
    {
        $categoryRepository = $this->createMock(CategoryRepository::class);

        $categoryRepository
            ->expects($this->once())
            ->method('save')
            ->willReturnCallback(static function (
                Category ...$actualCategories
            ) use (
                $numberOfCategories,
                $categories
            ) {
                if ($numberOfCategories !== count($actualCategories)) {
                    throw new InvalidArgumentException('Invalid number of categories');
                }

                $position = 0;

                /** @var Category $category */
                foreach ($categories as $category) {
                    $actualCategory = $actualCategories[$position];

                    if ($category->idValue() !== $actualCategory->idValue()) {
                        throw new InvalidArgumentException('Invalid category id');
                    }

                    if ($category->name() !== $actualCategory->name()) {
                        throw new InvalidArgumentException('Invalid category name');
                    }

                    if ($category->friendlyName() !== $actualCategory->friendlyName()) {
                        throw new InvalidArgumentException('Invalid category friendly name');
                    }

                    if ($category->parentCategory() !== $actualCategory->parentCategory()) {
                        throw new InvalidArgumentException('Invalid category parent category');
                    }

                    $position++;
                }
            });

        return $categoryRepository;
    }
}
