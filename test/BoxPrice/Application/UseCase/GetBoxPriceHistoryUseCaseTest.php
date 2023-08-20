<?php

namespace JasterTDC\PriceHistory\Tests\BoxPrice\Application\UseCase;

use JasterTDC\PriceHistory\BoxPrice\Application\UseCase\GetBoxPriceHistoryUseCase;
use JasterTDC\PriceHistory\BoxPrice\Domain\BoxPrice;
use JasterTDC\PriceHistory\BoxPrice\Domain\Repository\BoxPriceRepository;
use JasterTDC\PriceHistory\Shared\Domain\BoxId;
use JasterTDC\PriceHistory\Tests\BoxPrice\Domain\ObjectMother\BoxPriceObjectMother;
use JasterTDC\PriceHistory\Tests\Shared\Domain\ObjectMother\BoxIdObjectMother;
use PHPUnit\Framework\TestCase;

final class GetBoxPriceHistoryUseCaseTest extends TestCase
{
    public function testGivenValidWhenHappyPathThenReturnValid(): void
    {
        $boxPrices = BoxPriceObjectMother::buildCollection(
            BoxPriceObjectMother::build(
                primitiveBoxId: 199,
                primitiveSellPrice: 49.99,
                primitiveCashPrice: 39.99
            ),
            BoxPriceObjectMother::build(
                primitiveBoxId: 199,
                primitiveSellPrice: 79.99,
                primitiveCashPrice: 49.99
            )
        );

        $boxId = BoxIdObjectMother::build(199);

        $repository = $this->boxPriceRepository(boxId: $boxId, boxPrices: $boxPrices);
        
        $sut = new GetBoxPriceHistoryUseCase($repository);

        $actual = $sut($boxId);

        $this->assertSameSize($boxPrices, $actual);

        /** @var BoxPrice $boxPrice */
        foreach ($boxPrices as $boxPrice) {
            $actualPrice = $actual[$boxPrice->boxId()];

            $this->assertNotEmpty($actualPrice);
            $this->assertEquals($boxPrice->boxId(), $actualPrice->boxId());
            $this->assertEquals($boxPrice->sellPrice(), $actualPrice->sellPrice());
            $this->assertEquals($boxPrice->cashPrice(), $actualPrice->cashPrice());
            $this->assertEquals($boxPrice->createdAt(), $actualPrice->createdAt());
        }
    }

    private function boxPriceRepository(BoxId $boxId, array $boxPrices): BoxPriceRepository
    {
        $repository = $this->createMock(BoxPriceRepository::class);

        $repository->expects($this->once())
            ->method('getBoxPriceHistory')
            ->with($boxId)
            ->willReturn($boxPrices);
        
        return $repository;
    }
}
