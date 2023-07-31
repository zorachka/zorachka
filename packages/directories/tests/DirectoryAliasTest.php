<?php

declare(strict_types=1);

namespace Zorachka\Directories\Tests;

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Zorachka\Directories\DirectoryAlias;

/**
 * @internal
 */
final class DirectoryAliasTest extends TestCase
{
    /**
     * @test
     */
    public function shouldHaveRootItem(): void
    {
        Assert::assertIsString(DirectoryAlias::ROOT);
        Assert::assertNotEmpty(DirectoryAlias::ROOT);
    }
}
