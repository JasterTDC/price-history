<?php

namespace JasterTDC\PriceHistory\BoxPrice\Application\UseCase;

use JasterTDC\PriceHistory\BoxPrice\Domain\Repository\BoxPriceRepository;
use JasterTDC\PriceHistory\Shared\Domain\BoxId;

final readonly class GetBoxPriceHistoryUseCase
{
    public function __construct(
        private BoxPriceRepository $boxPriceRepository
    ) {
    }

    public function __invoke(BoxId $boxId): array
    {
        return $this->boxPriceRepository->getBoxPriceHistory($boxId);
    }
}
