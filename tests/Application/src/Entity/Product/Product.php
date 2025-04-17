<?php

declare(strict_types=1);

namespace Tests\Majerome\WorkshopPlugin\Entity\Product;

use Doctrine\ORM\Mapping as ORM;
use Sylius\Component\Core\Model\Product as BaseProduct;
use Majerome\WorkshopPlugin\Entity\Product\ProductInterface;
use Majerome\WorkshopPlugin\Entity\Product\ProductTrait;

#[ORM\Entity]
#[ORM\Table(name: 'sylius_product')]
class Product extends BaseProduct implements ProductInterface
{
    use ProductTrait;
}
