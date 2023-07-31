<?php

declare(strict_types=1);

namespace Zorachka\Console;

interface Application
{
    /**
     * Get application name.
     */
    public function getName(): string;

    /**
     * Get all available commands.
     * @return array<object>
     */
    public function getCommands(): array;

    /**
     * Run application.
     */
    public function run(): void;
}
