<?php

declare(strict_types=1);

namespace Zorachka\Middleware\Cors;

use Psr\Container\ContainerInterface;
use Zorachka\Container\ServiceProvider;

final class CorsServiceProvider implements ServiceProvider
{
    public static function getDefinitions(): array
    {
        return [
            CorsMiddleware::class => static function (ContainerInterface $container) {
                /** @var CorsConfig $config */
                $config = $container->get(CorsConfig::class);

                return new CorsMiddleware($config);
            },
            CorsConfig::class => static fn () => CorsConfig::withDefaults(),
        ];
    }

    public static function getExtensions(): array
    {
        return [];
    }
}
