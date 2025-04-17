<?php

declare(strict_types=1);

namespace Majerome\WorkshopPlugin\Validator\Constraints;

use Majerome\WorkshopPlugin\Validator\BrandHasCorrectTypeValidator;
use Symfony\Component\Validator\Constraint;

final class BrandHasCorrectType extends Constraint
{
    public string $message = 'majerome_workshop.brand.type.invalid';

    public function validatedBy(): string
    {
        return BrandHasCorrectTypeValidator::class;
    }

    public function getTargets(): string
    {
        return self::CLASS_CONSTRAINT;
    }
}
