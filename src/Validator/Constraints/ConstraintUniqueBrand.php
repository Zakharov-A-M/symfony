<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

/**
 * Class ConstraintUniqueBrand
 */
class ConstraintUniqueBrand extends Constraint
{
    public $message = 'Brand "{{ string }}" address already taken';
}