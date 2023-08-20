<?php

namespace JasterTDC\PriceHistory\BoxPrice\Application\UseCase;

use JasterTDC\PriceHistory\BoxPrice\Domain\Repository\BoxPriceRepository;
use JasterTDC\PriceHistory\BoxPrice\Domain\Service\BoxPriceService;

final readonly class GetBoxPriceUseCase
{
    public function __construct(
        private BoxPriceService $boxPriceService,
        private BoxPriceRepository $boxPriceRepository
    ) {
    }

    public function __invoke(int $page): void
    {
        $boxPrices = $this->boxPriceService->getBoxPricesByPage($page);

        $this->boxPriceRepository->save(...$boxPrices);
    }
}
