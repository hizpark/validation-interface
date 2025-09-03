<?php

declare(strict_types=1);

namespace Hizpark\ValidationInterface\Validator;

use Hizpark\ValidationInterface\Result\ValidationResult;
use Hizpark\ValidationInterface\ValidatorInterface;

abstract class AbstractValidator implements ValidatorInterface
{
    // 具体验证的对象
    protected object $target;

    public function __construct(object $target)
    {
        $this->target = $target;
    }

    /**
     * 执行验证
     */
    abstract public function validate(): ValidationResult;

    /**
     * 验证成功
     */
    protected function ok(): ValidationResult
    {
        return ValidationResult::ok();
    }

    /**
     * 验证失败
     */
    protected function fail(string $error, ?string $code = null): ValidationResult
    {
        return ValidationResult::fail($error, $code);
    }
}
