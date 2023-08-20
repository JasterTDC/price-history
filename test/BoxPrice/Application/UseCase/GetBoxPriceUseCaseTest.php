<?php

namespace JasterTDC\PriceHistory\Tests\Box\Application\UseCase;

use InvalidArgumentException;
use JasterTDC\PriceHistory\BoxPrice\Application\UseCase\GetBoxPriceUseCase;
use JasterTDC\PriceHistory\BoxPrice\Domain\BoxPrice;
use JasterTDC\PriceHistory\BoxPrice\Domain\Repository\BoxPriceRepository;
use JasterTDC\PriceHistory\BoxPrice\Domain\Service\BoxPriceService;
use JasterTDC\PriceHistory\Tests\BoxPrice\Domain\ObjectMother\BoxPriceObjectMother;
use PHPUnit\Framework\TestCase;

final class GetBoxPriceUseCaseTest extends TestCase
{
    /** @dataProvider dataProvider */
    public function testGivenValidWhenHappyPathThenReturnValid(
        BoxPriceService $boxPriceService,
        BoxPriceRepository $boxPriceRepository,
        int $page
    ): void {
        $sut = new GetBoxPriceUseCase(
            boxPriceService: $boxPriceService,
            boxPriceRepository: $boxPriceRepository
        );

        $sut($page);

        $this->assertTrue(true);
    }

    public function dataProvider(): array
    {
        $boxPrices = BoxPriceObjectMother::buildCollection(
            BoxPriceObjectMother::build(
                primitiveBoxId: 199,
                primitiveSellPrice: 49.99,
                primitiveCashPrice: 39.99
            ),
            BoxPriceObjectMother::build(
                primitiveBoxId: 200,
                primitiveSellPrice: 79.99,
                primitiveCashPrice: 49.99
            )
        );

        return [
            'first page' => [
                'boxPriceService' => $this->boxPriceService(
                    page: 1,
                    boxPrices: $boxPrices,
                ),
                'boxPriceRepository' => $this->boxPriceRepository(...$boxPrices),
                'page' => 1,
            ],
        ];
    }

    private function boxPriceService(int $page, array $boxPrices): BoxPriceService
    {
        $service = $this->createMock(BoxPriceService::class);

        $service->expects($this->once())
            ->method('getBoxPricesByPage')
            ->with($page)
            ->willReturn($boxPrices);

        return $service;
    }

    private function boxPriceRepository(BoxPrice ...$boxPrices): BoxPriceRepository
    {
        $repository = $this->createMock(BoxPriceRepository::class);

        $repository->expects($this->once())
            ->method('save')
            ->willReturnCallback(static function (BoxPrice ...$actualPrices) use ($boxPrices) {
                if (count($boxPrices) !== count($actualPrices)) {
                    throw new InvalidArgumentException('Total prices does not match');
                }

                $position = 0;

                foreach ($boxPrices as $boxPrice) {
                    $actualPrice = $actualPrices[$position];

                    if ($boxPrice->boxId() !== $actualPrice->boxId()) {
                        throw new InvalidArgumentException('BoxId does not match');
                    }

                    if ($boxPrice->sellPrice() !== $actualPrice->sellPrice()) {
                        throw new InvalidArgumentException('Sell price does not match');
                    }

                    if ($boxPrice->cashPrice() !== $actualPrice->cashPrice()) {
                        throw new InvalidArgumentException('Cash price does not match');
                    }

                    $position++;
                }
            });

        return $repository;
    }
}
