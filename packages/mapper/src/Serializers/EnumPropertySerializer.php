<?php

declare(strict_types=1);

namespace Zorachka\Mapper\Serializers;

use UnitEnum;
use Webmozart\Assert\Assert;
use Zorachka\Mapper\PropertySerializer;
use Zorachka\Mapper\Serializer;
use Zorachka\Mapper\Tests\Datasets\ValueObjects\PaymentStatusString;

final class EnumPropertySerializer implements PropertySerializer
{
    public function serialize(mixed $value, Serializer $serializer): mixed
    {
        Assert::isInstanceOf($value, UnitEnum::class);

        return $value->value;
    }
}
