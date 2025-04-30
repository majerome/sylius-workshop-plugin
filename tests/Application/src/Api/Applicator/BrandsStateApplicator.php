<?php

declare(strict_types=1);

namespace Tests\Majerome\WorkshopPlugin\Api\Applicator;

use Majerome\WorkshopPlugin\Entity\Brand\Brand;
use Majerome\WorkshopPlugin\StateMachine\BrandTransitions;
use Sylius\Bundle\ApiBundle\Exception\StateMachineTransitionFailedException;
use Symfony\Component\Workflow\Registry;

final class BrandsStateApplicator
{
    public function __construct(
        private Registry $registry
    ) {
    }

    public function approve(Brand $brand): Brand
    {
        $sm = $this->registry->get($brand, BrandTransitions::GRAPH);

        if (!$sm->can($brand, BrandTransitions::TRANSITION_APPROVE)) {
            throw new StateMachineTransitionFailedException('Cannot approve the Brand.');
        }
        if ($brand->getDescription() === null) {
            $brand->setDescription('');
        }
        $sm->apply($brand, BrandTransitions::TRANSITION_APPROVE);

        return $brand;
    }
}
