<?php

declare(strict_types=1);

namespace JasterTDC\PriceHistory\Box\Application\UseCase;

use JasterTDC\PriceHistory\Box\Domain\Repository\BoxRepository;
use JasterTDC\PriceHistory\Box\Domain\Service\BoxService;

final readonly class SaveBoxesUseCase
{
    public function __construct(
        private BoxService $service,
        private BoxRepository $repository
    ) {
    }

    public function __invoke(int $page): void
    {
        $boxes = $this->service->getBoxesByPage($page);

        $this->repository->save(...$boxes);
    }
}
