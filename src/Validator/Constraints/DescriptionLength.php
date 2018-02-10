<?php

namespace App\Validator\Constraints;

use Symfony\Component\Validator\Constraint;

class DescriptionLength extends Constraint
{
    /**
     * @var string
     */
    public $wrongDescriptionLength = 'Opis musi posaidać przynajmniej {{ limit }} znaków!';
}
