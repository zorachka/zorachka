<?php

declare(strict_types=1);

namespace Zorachka\Console;

use Psr\Container\ContainerInterface;
use Symfony\Component\Console\Command\Command;
use Zorachka\Container\ServiceProvider;

final class ConsoleServiceProvider implements ServiceProvider
{
    public static function getDefinitions(): array
    {
        return [
            Application::class => static function (ContainerInterface $container): Application {
                /** @var ConsoleConfig $config */
                $config = $container->get(ConsoleConfig::class);
                $commands = [];

                foreach ($config->commands() as $commandClassName) {
                    /** @var Command $command */
                    $command = $container->get($commandClassName);
                    $commands[] = $command;
                }

                return new ConsoleApplication(
                    $config->appName(),
                    $config->catchExceptions(),
                    $commands,
                );
            },
            ConsoleConfig::class => static fn () => ConsoleConfig::withDefaults(),
        ];
    }

    public static function getExtensions(): array
    {
        return [];
    }
}
