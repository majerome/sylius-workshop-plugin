<?php

declare(strict_types=1);

namespace Majerome\WorkshopPlugin\StateMachine;

interface BrandTransitions
{
    public const GRAPH = 'sylius_brand';

    public const TRANSITION_APPROVE = 'approve';

    public const TRANSITION_REJECT = 'reject';

    public const TRANSITION_SUSPEND = 'suspend';
}
