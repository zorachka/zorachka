<?php

declare(strict_types=1);

namespace Zorachka\Uuid;

use Zorachka\Container\ServiceProvider;

final class UuidServiceProvider implements ServiceProvider
{
    public static function getDefinitions(): array
    {
        return [
            UuidProvider::class => static fn () => new RamseyUuidProvider(),
        ];
    }

    public static function getExtensions(): array
    {
        return [];
    }
}
