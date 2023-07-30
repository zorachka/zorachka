<?php

declare(strict_types=1);

namespace Zorachka\SecondPackage;

use Zorachka\FirstPackage\FirstClass;

final class SecondClass
{
    public function __construct(private readonly FirstClass $firstClass)
    {
    }
}
