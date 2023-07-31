<?php

declare(strict_types=1);

namespace Zorachka\ErrorHandler;

use Psr\Container\ContainerInterface;
use Whoops\Run;
use Zorachka\Container\ServiceProvider;

final class ErrorHandlerServiceProvider implements ServiceProvider
{
    public static function getDefinitions(): array
    {
        return [
            ErrorHandler::class => static function (ContainerInterface $container) {
                /** @var ErrorHandlerConfig $config */
                $config = $container->get(ErrorHandlerConfig::class);

                return new WhoopsErrorHandler(
                    new Run(),
                    $config->catchExceptions(),
                );
            },
            ErrorHandlerConfig::class => static fn () => ErrorHandlerConfig::withDefaults(),
        ];
    }

    public static function getExtensions(): array
    {
        return [];
    }
}
