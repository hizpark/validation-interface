# Validation Interface

> Unified, testable, and extensible validation for any PHP project

![License](https://img.shields.io/github/license/hizpark/validation-interface?style=flat-square)
![Latest Version](https://img.shields.io/packagist/v/hizpark/validation-interface?style=flat-square)
![PHP Version](https://img.shields.io/badge/php-8.2--8.4-blue?style=flat-square)
![Static Analysis](https://img.shields.io/badge/static_analysis-PHPStan-blue?style=flat-square)
![Tests](https://img.shields.io/badge/tests-PHPUnit-brightgreen?style=flat-square)
[![codecov](https://codecov.io/gh/hizpark/validation-interface/branch/main/graph/badge.svg)](https://codecov.io/gh/hizpark/validation-interface)
![CI](https://github.com/hizpark/validation-interface/actions/workflows/ci.yml/badge.svg?style=flat-square)

A lightweight, framework-agnostic validation contract package that provides generic validator and validation result interfaces. It is designed to help developers build consistent, testable, and easily extensible validation logic, suitable for scenarios such as upload validation, form validation, and custom rule implementation.

## ✨ 特性

- 轻量级与无依赖：独立于任何框架或外部库，易于集成到现有项目中
- 明确定义的接口：提供标准化的验证器和验证结果接口，支持灵活扩展与自定义
- 灵活集成与扩展：作为独立组件使用，或方便地集成进任意現代架构和系统中

## 📦 安装

```bash
composer require hizpark/validation-interface
```

## 📂 目录结构

```txt
src
├── Result
│   ├── ValidationResultInterface.php
│   └── ValidationResult.php
└── Validator
    └── ValidatorInterface.php
```

## 🚀 用法示例

### 示例 1：自定义 Email 验证器

```php
use Hizpark\ValidationInterface\Result\ValidationResult;
use Hizpark\ValidationInterface\Result\ValidationResultInterface;
use Hizpark\ValidationInterface\Validator\ValidatorInterface;

class EmailValidator implements ValidatorInterface
{
    public function validate(mixed $target): ValidationResultInterface
    {
        if (!is_string($target) || !filter_var($target, FILTER_VALIDATE_EMAIL)) {
            return ValidationResult::fail('Invalid email address', 'INVALID_EMAIL');
        }

        return ValidationResult::ok();
    }
}
```

### 示例 2：执行验证并处理结果

```php
$validator = new EmailValidator();

$result = $validator->validate('user@example.com');

if ($result->isValid()) {
    echo "Email is valid.";
} else {
    echo "Validation failed: " . $result->getError();
}
```

## 📐 接口说明

### ValidatorInterface

> 定义验证器的通用行为，每个实现类应实现 validate() 方法，接收任意类型的输入并返回验证结果对象

```php
namespace Hizpark\ValidationInterface\Validator;

use Hizpark\ValidationInterface\Result\ValidationResultInterface;

interface ValidatorInterface
{
    public function validate(mixed $target): ValidationResultInterface;
}
```

### ValidationResultInterface

> 用于表示验证操作的结果，包含是否通过验证、错误信息与错误代码

```php
namespace Hizpark\ValidationInterface\Result;

interface ValidationResultInterface
{
    public function isValid(): bool;
    public function getError(): ?string;
    public function getCode(): ?string;
}
```

## ⬜ 实例说明

### `ValidationResult`

> `ValidationResultInterface` 接口实现及扩展

```php
namespace Hizpark\ValidationInterface\Result;

ValidationResult::ok();                   // 构造成功结果
ValidationResult::fail('error message');  // 构造失败结果
```

## 🔍 静态分析

使用 PHPStan 工具进行静态分析，确保代码的质量和一致性：

```bash
composer stan
```

## 🎯 代码风格

使用 PHP-CS-Fixer 工具检查代码风格：

```bash
composer cs:chk
```

使用 PHP-CS-Fixer 工具自动修复代码风格问题：

```bash
composer cs:fix
```

## ✅ 单元测试

执行 PHPUnit 单元测试：

```bash
composer test
```

执行 PHPUnit 单元测试并生成代码覆盖率报告：

```bash
composer test:coverage
```

## 🤝 贡献指南

欢迎 Issue 与 PR，建议遵循以下流程：

1. Fork 仓库
2. 创建新分支进行开发
3. 提交 PR 前请确保测试通过、风格一致
4. 提交详细描述

## 📜 License

MIT License. See the [LICENSE](LICENSE) file for details.
