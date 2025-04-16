<?php

declare(strict_types=1);

namespace Majerome\WorkshopPlugin\Factory;

use Sylius\Resource\Factory\FactoryInterface;
use Majerome\WorkshopPlugin\Entity\Brand\BrandInterface;

final class BrandFactory implements BrandFactoryInterface
{
    public function __construct(
        private FactoryInterface $decoratedFactory,
    ) {
    }

    public function createNew(): BrandInterface
    {
        /** @var BrandInterface $brand */
        $brand = $this->decoratedFactory->createNew();
        $brand->setCreatedAt(new \DateTime());

        return $brand;
    }
}
