<?php

declare(strict_types=1);

namespace Hizpark\ValidationInterface;

interface ValidatorInterface
{
    public function validate(): ValidationResultInterface;
}
