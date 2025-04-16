<?php

declare(strict_types=1);

namespace Majerome\WorkshopPlugin\Repository;

use Majerome\WorkshopPlugin\Entity\Brand\BrandInterface;

interface ProductRepositoryInterface
{
    public function findBrandedProducts(BrandInterface $brand): array;
}
