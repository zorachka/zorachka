<?php

declare(strict_types=1);

namespace Zorachka\Uuid;

interface UuidProvider
{
    /**
     * Return UUID string.
     */
    public static function next(): string;
}
