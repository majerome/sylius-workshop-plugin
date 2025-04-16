<?php

declare(strict_types=1);

namespace Majerome\WorkshopPlugin\EventSubscriber;

use Sylius\Bundle\AdminBundle\Event\ProductMenuBuilderEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class ProductMenuSubscriber implements EventSubscriberInterface
{
    public function addItems(ProductMenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $menu
            ->addChild('brands')
            ->setAttribute('template', '@MajeromeWorkshopPlugin/Admin/Product/Tab/_brand.html.twig')
            ->setLabel('majerome_workshop_plugin.ui.brands')
        ;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'sylius.menu.admin.product.form' => 'addItems'
        ];
    }
}
