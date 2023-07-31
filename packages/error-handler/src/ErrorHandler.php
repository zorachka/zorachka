<?php

declare(strict_types=1);

namespace Zorachka\ErrorHandler;

interface ErrorHandler
{
    public function register(): void;
}
