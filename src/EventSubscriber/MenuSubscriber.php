<?php

declare(strict_types=1);

namespace Majerome\WorkshopPlugin\EventSubscriber;

use Sylius\Bundle\UiBundle\Menu\Event\MenuBuilderEvent;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

final class MenuSubscriber implements EventSubscriberInterface
{
    public function buildMenu(MenuBuilderEvent $event): void
    {
        $menu = $event->getMenu();

        $catalog = $menu->getChild('catalog');
        $catalog
            ->addChild('majerome.workshop.brand', ['route' => 'majerome_workshop_admin_brand_index'])
            ->setLabel('majerome_workshop_plugin.ui.brands')
            ->setLabelAttribute('icon', 'tags')
        ;
    }

    public static function getSubscribedEvents(): array
    {
        return [
            'sylius.menu.admin.main' => 'buildMenu'
        ];
    }
}
