<?php

declare(strict_types=1);

namespace Zorachka\Templates;

use Zorachka\Container\ServiceProvider;

final class TemplatesServiceProvider implements ServiceProvider
{
    public static function getDefinitions(): array
    {
        return [
            TemplatesConfig::class => static fn () => TemplatesConfig::withDefaults(),
        ];
    }

    public static function getExtensions(): array
    {
        return [];
    }
}
