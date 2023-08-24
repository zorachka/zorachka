<?php

declare(strict_types=1);

namespace Zorachka\Mapper;

interface KeyFormatter
{
    public function propertyNameToKey(string $propertyName): string;

    public function keyToPropertyName(string $key): string;
}
