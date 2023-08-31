<?php

declare(strict_types=1);

namespace JasterTDC\PriceHistory\Tests\Box\Application\UseCase;

use InvalidArgumentException;
use JasterTDC\PriceHistory\Box\Application\UseCase\SaveBoxesUseCase;
use JasterTDC\PriceHistory\Box\Domain\Box;
use JasterTDC\PriceHistory\Box\Domain\Repository\BoxRepository;
use JasterTDC\PriceHistory\Box\Domain\Service\BoxService;
use JasterTDC\PriceHistory\Tests\Box\Domain\ObjectMother\BoxObjectMother;
use PHPUnit\Framework\TestCase;

final class SaveBoxUseCaseTest extends TestCase
{
    /** @dataProvider dataProvider */
    public function testGivenValidWhenHappyPathThenReturnValid(
        BoxService $boxService,
        BoxRepository $boxRepository,
        int $page
    ): void {
        $sut = new SaveBoxesUseCase(
            service: $boxService,
            repository: $boxRepository
        );

        $sut($page);

        $this->assertTrue(true);
    }

    public function dataProvider(): array
    {
        $godOfWar = BoxObjectMother::build(
            primitiveBoxId: 1,
            primitiveCategoryId: 20,
            primitiveName: 'God of War',
            primitiveRating: 4.5,
        );
        $persona5 = BoxObjectMother::build(
            primitiveBoxId: 2,
            primitiveCategoryId: 20,
            primitiveName: 'Persona 5',
            primitiveRating: 3,
        );
        $gtaV = BoxObjectMother::build(
            primitiveBoxId: 3,
            primitiveCategoryId: 20,
            primitiveName: 'GTA V',
            primitiveRating: 4,
        );

        return [
            'first page' => [
                'boxService' => $this->boxService(
                    page: 1,
                    boxes: [
                        $godOfWar,
                        $persona5,
                    ],
                ),
                'boxRepository' => $this->boxRepository(
                    numberOfBoxes: 2,
                    boxes: [
                        $godOfWar,
                        $persona5,
                    ],
                ),
                'page' => 1,
            ],
            'second page' => [
                'boxService' => $this->boxService(
                    page: 2,
                    boxes: [
                        $gtaV,
                    ],
                ),
                'boxRepository' => $this->boxRepository(
                    numberOfBoxes: 1,
                    boxes: [
                        $gtaV,
                    ],
                ),
                'page' => 2,
            ],
        ];
    }

    private function boxService(int $page, array $boxes): BoxService
    {
        $service = $this->createMock(BoxService::class);

        $service
            ->expects($this->once())
            ->method('getBoxesByPage')
            ->with($page)
            ->willReturn($boxes);

        return $service;
    }

    private function boxRepository(int $numberOfBoxes, array $boxes): BoxRepository
    {
        $repository = $this->createMock(BoxRepository::class);

        $repository
            ->expects($this->once())
            ->method('save')
            ->willReturnCallback(static function (Box ...$actualBoxes) use ($numberOfBoxes, $boxes) {
                if ($numberOfBoxes !== count($actualBoxes)) {
                    throw new InvalidArgumentException('Invalid number of boxes');
                }

                $position = 0;

                /** @var Box $box */
                foreach ($boxes as $box) {
                    $actualBox = $actualBoxes[$position];

                    if ($box->id() !== $actualBox->id()) {
                        throw new InvalidArgumentException('Invalid box id');
                    }

                    if ($box->name() !== $actualBox->name()) {
                        throw new InvalidArgumentException('Invalid box name');
                    }

                    if ($box->rating() !== $actualBox->rating()) {
                        throw new InvalidArgumentException('Invalid box price');
                    }

                    if ($box->categoryId() !== $actualBox->categoryId()) {
                        throw new InvalidArgumentException('Invalid box category id');
                    }

                    $position++;
                }
            });

        return $repository;
    }
}
