<?php

declare(strict_types=1);

namespace Zorachka\Templates\Tests\Unit;

use PHPUnit\Framework\TestCase;
use Zorachka\Templates\Twig\Extensions\Frontend\FrontendUrlGenerator;

/**
 * @covers \Zorachka\Templates\Twig\Extensions\Frontend\FrontendUrlGenerator
 *
 * @internal
 */
final class FrontendUrlGeneratorTest extends TestCase
{
    public function testEmpty(): void
    {
        $generator = new FrontendUrlGenerator('http://test');

        self::assertEquals('http://test', $generator->generate(''));
    }

    public function testPath(): void
    {
        $generator = new FrontendUrlGenerator('http://test');

        self::assertEquals('http://test/path', $generator->generate('path'));
    }

    public function testWithParams(): void
    {
        $generator = new FrontendUrlGenerator('http://test');

        self::assertEquals('http://test/path?a=1&b=2', $generator->generate('path', [
            'a' => '1',
            'b' => 2,
        ]));
    }
}
