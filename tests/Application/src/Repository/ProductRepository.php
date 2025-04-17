<?php

declare(strict_types=1);

namespace Tests\Majerome\WorkshopPlugin\Repository;

use Sylius\Bundle\CoreBundle\Doctrine\ORM\ProductRepository as BaseProductRepository;
use Majerome\WorkshopPlugin\Repository\ProductRepositoryInterface;
use Majerome\WorkshopPlugin\Repository\ProductRepositoryTrait;

final class ProductRepository extends BaseProductRepository implements ProductRepositoryInterface
{
    use ProductRepositoryTrait;
}
