<?php

declare(strict_types=1);

namespace Zorachka\Logger;

use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;
use Psr\Container\ContainerInterface;
use Psr\Log\LoggerInterface;
use Zorachka\Container\ServiceProvider;

final class LoggerServiceProvider implements ServiceProvider
{
    /**
     *
     */
    public static function getDefinitions(): array
    {
        return [
            LoggerInterface::class => static function (ContainerInterface $container) {
                /** @var LoggerConfig $config */
                $config = $container->get(LoggerConfig::class);

                $level = $config->debug() ? Level::Debug : Level::Info;

                $monolog = new Logger($config->name());

                if ($config->stderr()) {
                    $monolog->pushHandler(new StreamHandler('php://stderr', $level));
                }

                if (!empty($config->file())) {
                    $monolog->pushHandler(new StreamHandler($config->file(), $level));
                }

                return $monolog;
            },
            LoggerConfig::class => static fn () => LoggerConfig::withDefaults(),
        ];
    }

    /**
     *
     */
    public static function getExtensions(): array
    {
        return [];
    }
}
