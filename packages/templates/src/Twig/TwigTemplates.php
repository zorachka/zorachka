<?php

declare(strict_types=1);

namespace Zorachka\Templates\Twig;

use Twig\Environment;
use Zorachka\Templates\Templates;

final class TwigTemplates implements Templates
{
    private Environment $templer;

    public function __construct(Environment $environment)
    {
        $this->templer = $environment;
    }

    public function render(string $name, array $context = []): string
    {
        return $this->templer->render($name . $this->getExtension(), $context);
    }

    public function getExtension(): string
    {
        return '.html.twig';
    }
}
