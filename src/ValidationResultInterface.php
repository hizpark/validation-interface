<?php

declare(strict_types=1);

namespace Hizpark\ValidationInterface;

interface ValidationResultInterface
{
    public function isValid(): bool;

    public function getError(): ?string;

    public function getCode(): ?string;
}
