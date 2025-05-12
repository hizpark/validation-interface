<?php

declare(strict_types=1);

namespace Hizpark\ValidationInterface\Validator;

use Hizpark\ValidationInterface\Result\ValidationResultInterface;

interface ValidatorInterface
{
    public function validate(mixed $target): ValidationResultInterface;
}
