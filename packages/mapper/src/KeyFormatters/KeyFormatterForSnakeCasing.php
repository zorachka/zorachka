<?php

declare(strict_types=1);

namespace Zorachka\Mapper\KeyFormatters;

use Zorachka\Mapper\KeyFormatter;

use function lcfirst;
use function str_replace;
use function strtolower;
use function ucwords;

final class KeyFormatterForSnakeCasing implements KeyFormatter
{
    public function propertyNameToKey(string $propertyName): string
    {
        return strtolower(preg_replace('/(.)(?=[A-Z])/u', '$1_', $propertyName));
    }

    public function keyToPropertyName(string $key): string
    {
        return lcfirst(str_replace('_', '', ucwords($key, '_')));
    }
}
