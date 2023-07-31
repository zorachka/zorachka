<?php

declare(strict_types=1);

namespace Zorachka\Console\Tests;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Zorachka\Console\Application;
use Zorachka\Console\ConsoleConfig;
use Zorachka\Console\ConsoleServiceProvider;

/**
 * @internal
 */
final class ConsoleServiceProviderTest extends TestCase
{
    /**
     * @test
     */
    public function shouldContainDefinitions(): void
    {
        Assert::assertEquals([
            Application::class,
            ConsoleConfig::class,
        ], array_keys(ConsoleServiceProvider::getDefinitions()));
    }
}
