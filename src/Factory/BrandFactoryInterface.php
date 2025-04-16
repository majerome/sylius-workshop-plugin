<?php

declare(strict_types=1);

namespace Majerome\WorkshopPlugin\Factory;

use Sylius\Resource\Factory\FactoryInterface;
use Majerome\WorkshopPlugin\Entity\Brand\BrandInterface;

interface BrandFactoryInterface extends FactoryInterface
{
    public function createNew(): BrandInterface;
}
