<?php

declare(strict_types=1);

namespace Hizpark\ValidationInterface\Result;

use Hizpark\ValidationInterface\ValidationResultInterface;

class ValidationResult implements ValidationResultInterface
{
    public function __construct(
        protected bool $valid,
        protected ?string $error = null,
        protected ?string $code = null,
    ) {
    }

    public function isValid(): bool
    {
        return $this->valid;
    }

    public function getError(): ?string
    {
        return $this->error;
    }

    public function getCode(): ?string
    {
        return $this->code;
    }

    // 创建成功的验证结果
    public static function ok(): self
    {
        return new self(true);
    }

    // 创建失败的验证结果，并传递错误信息
    public static function fail(string $error, ?string $code = null): self
    {
        return new self(false, $error, $code);
    }
}
