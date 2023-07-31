<?php

declare(strict_types=1);

namespace Zorachka\Uuid;

use Ramsey\Uuid\Uuid;

final class RamseyUuidProvider implements UuidProvider
{
    public static function next(): string
    {
        return Uuid::uuid4()->toString();
    }
}
