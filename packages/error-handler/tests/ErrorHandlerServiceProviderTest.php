<?php

declare(strict_types=1);

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Zorachka\ErrorHandler\ErrorHandler;
use Zorachka\ErrorHandler\ErrorHandlerConfig;
use Zorachka\ErrorHandler\ErrorHandlerServiceProvider;

/**
 * @internal
 */
final class ErrorHandlerServiceProviderTest extends TestCase
{
    /**
     * @test
     */
    public function shouldContainDefinitions(): void
    {
        Assert::assertEquals([
            ErrorHandler::class,
            ErrorHandlerConfig::class,
        ], array_keys(ErrorHandlerServiceProvider::getDefinitions()));
    }
}
