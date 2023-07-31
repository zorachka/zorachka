<?php

declare(strict_types=1);

namespace Zorachka\Telegram\UI\Bot\Listener;

use TelegramBot\Api\Types\Update;

interface BotListener
{
    public function __invoke(Update $update): void;
}
