<?php

declare(strict_types=1);

namespace Zorachka\FirstPackage;

use Zorachka\SecondPackage\SecondClass;

final class FirstClass
{
    public function __construct(private readonly SecondClass $secondClass)
    {
    }
}
