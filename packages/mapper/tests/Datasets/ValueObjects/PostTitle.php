<?php

declare(strict_types=1);

namespace Zorachka\Mapper\Tests\Datasets\ValueObjects;

use Webmozart\Assert\Assert;

final class PostTitle
{
    private string $value;

    private function __construct(string $value)
    {
        Assert::notEmpty($value);
        $this->value = $value;
    }

    public static function fromString(string $value): self
    {
        return new self($value);
    }

    public function asString(): string
    {
        return $this->value;
    }
}
