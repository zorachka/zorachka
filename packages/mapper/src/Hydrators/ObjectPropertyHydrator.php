<?php

declare(strict_types=1);

namespace Zorachka\Mapper\Hydrators;

use Closure;
use ReflectionClass;
use Zorachka\Mapper\Hydrator;
use Zorachka\Mapper\KeyFormatter;
use Zorachka\Mapper\PropertyHydrator;
use Zorachka\Mapper\Tests\Datasets\ValueObjects\DateTimeRFC3339;
use Zorachka\Mapper\Tests\Datasets\ValueObjects\Price;

final class ObjectPropertyHydrator implements PropertyHydrator
{
    public function __construct(
        private readonly KeyFormatter $keyFormatter,
    )
    {
    }

    public function hydrate(mixed $value, string $className, string $keyName, Hydrator $hydrator): object
    {
        $reflectionClass = new ReflectionClass($className);
        $properties = $reflectionClass->getProperties();

        if (\count($properties) === 1) {
            $property = $properties[0];

            return $hydrator->hydrate($className, [
                $this->keyFormatter->propertyNameToKey($property->getName()) => $value[$keyName],
            ]);
        }

        $keys = array_map(function($key) use ($keyName) {
            return str_replace($keyName . '_', '', $key);
        }, \array_keys($value));

        return $hydrator->hydrate($className, \array_combine($keys, $value));
    }
}
