<?php

declare(strict_types=1);

namespace Hizpark\ValidationInterface\Tests\Result;

use Hizpark\ValidationInterface\Result\ValidationResult;
use PHPUnit\Framework\TestCase;

class ValidationResultTest extends TestCase
{
    public function testOkReturnsValidTrueAndNullErrorAndCode(): void
    {
        $result = ValidationResult::ok();

        $this->assertTrue($result->isValid());
        $this->assertNull($result->getError());
        $this->assertNull($result->getCode());
    }

    public function testFailReturnsValidFalseAndErrorMessage(): void
    {
        $error  = 'Invalid input';
        $result = ValidationResult::fail($error);

        $this->assertFalse($result->isValid());
        $this->assertSame($error, $result->getError());
        $this->assertNull($result->getCode());
    }

    public function testFailWithCode(): void
    {
        $error  = 'Invalid input';
        $code   = 'ERR123';
        $result = ValidationResult::fail($error, $code);

        $this->assertFalse($result->isValid());
        $this->assertSame($error, $result->getError());
        $this->assertSame($code, $result->getCode());
    }

    public function testManualConstruction(): void
    {
        $result = new ValidationResult(false, 'Something went wrong', 'E500');

        $this->assertFalse($result->isValid());
        $this->assertEquals('Something went wrong', $result->getError());
        $this->assertEquals('E500', $result->getCode());
    }
}
