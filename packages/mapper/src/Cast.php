<?php

declare(strict_types=1);

namespace Zorachka\Mapper;

interface Cast
{
    /**
     * @param mixed $value
     * @return mixed
     */
    public function cast(mixed $value): mixed;
}
