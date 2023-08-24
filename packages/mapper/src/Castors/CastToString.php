<?php

declare(strict_types=1);

namespace Zorachka\Mapper\Castors;

use Zorachka\Mapper\Cast;

final class CastToString implements Cast
{
    public function cast(mixed $value): string
    {
        return (string)$value;
    }
}
