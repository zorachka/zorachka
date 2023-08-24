<?php

declare(strict_types=1);

namespace Zorachka\Mapper;

interface Cast
{
    /**
     */
    public function cast(mixed $value): mixed;
}
