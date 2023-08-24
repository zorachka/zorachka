<?php

declare(strict_types=1);

namespace Zorachka\Mapper\Hydrators;

use ReflectionClass;
use Zorachka\Mapper\Hydrator;
use Zorachka\Mapper\KeyFormatter;
use Zorachka\Mapper\PropertyHydrator;

final class ObjectPropertyHydrator implements PropertyHydrator
{
    public function __construct(
        private readonly KeyFormatter $keyFormatter,
    ) {
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

        $keys = array_map(static fn ($key) => str_replace($keyName . '_', '', $key), \array_keys($value));

        return $hydrator->hydrate($className, \array_combine($keys, $value));
    }
}
