<?php

declare(strict_types=1);

namespace Zorachka\Environment\Tests\Unit;

use InvalidArgumentException;
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\TestCase;
use Zorachka\Environment\EnvironmentConfig;
use Zorachka\Environment\EnvironmentName;

/**
 * @internal
 */
final class EnvironmentConfigTest extends TestCase
{
    /**
     * @test
     */
    public function shouldBeAbleToBeCreatedWithDefaults(): void
    {
        $defaultConfig = EnvironmentConfig::withDefaults();
        $requiredFields = $defaultConfig->requiredFields();

        Assert::assertIsArray($requiredFields);
        Assert::assertEmpty($requiredFields);
        Assert::assertEquals(EnvironmentName::PRODUCTION, $defaultConfig->environmentName());
    }

    /**
     * @test
     */
    public function throwsExceptionWhenWithRequiredFieldKeyIsEmpty(): void
    {
        $this->expectException(InvalidArgumentException::class);

        $defaultConfig = EnvironmentConfig::withDefaults();
        $defaultConfig->withRequiredField('');
    }

    /**
     * @test
     */
    public function shouldBeAbleToAddRequiredField(): void
    {
        $defaultConfig = EnvironmentConfig::withDefaults();

        $newConfig = $defaultConfig->withRequiredField('ENV_NAME');
        Assert::assertEquals([
            'ENV_NAME',
        ], $newConfig->requiredFields());

        $newConfig = $newConfig->withRequiredField('ANOTHER_VARIABLE');
        Assert::assertEquals([
            'ENV_NAME',
            'ANOTHER_VARIABLE',
        ], $newConfig->requiredFields());
    }
}
