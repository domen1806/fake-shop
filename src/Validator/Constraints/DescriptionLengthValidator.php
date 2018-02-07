<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\ConstraintValidator;

class DescriptionLengthValidator extends ConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        if (100 >strlen($value)) {
            $this->context->buildViolation($constraint->wrongDescriptionLength)
                ->setParameter('{{ limit }}', 100)
                ->addViolation();
        }
    }
}
