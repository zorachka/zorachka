<?php

declare(strict_types=1);

namespace Zorachka\Templates\Twig;

use Psr\Container\ContainerInterface;
use Twig\Environment;
use Twig\Extension\DebugExtension;
use Twig\Extension\ExtensionInterface;
use Twig\Loader\FilesystemLoader;
use Zorachka\Container\ServiceProvider;
use Zorachka\Directories\Directories;
use Zorachka\Templates\Templates;
use Zorachka\Templates\TemplatesConfig;
use Zorachka\Templates\Twig\Extensions\Frontend\FrontendUrlGenerator;

final class TwigServiceProvider implements ServiceProvider
{
    /**
     *
     */
    public static function getDefinitions(): array
    {
        return [
            Environment::class => static function (ContainerInterface $container): Environment {
                /** @var Directories $directories */
                $directories = $container->get(Directories::class);
                /** @var TemplatesConfig $templatesConfig */
                $templatesConfig = $container->get(TemplatesConfig::class);
                /** @var TwigConfig $twigConfig */
                $twigConfig = $container->get(TwigConfig::class);

                $loader = new FilesystemLoader();
                $templatesDirectory = $directories->get($templatesConfig->templatesDirectory());
                $templateDirectories = [
                    FilesystemLoader::MAIN_NAMESPACE => $templatesDirectory,
                ];

                foreach ($templateDirectories as $alias => $directory) {
                    $loader->addPath($directory, $alias);
                }

                $cacheDirectory = $directories->get($templatesConfig->cacheDirectory());
                $environment = new Environment($loader, [
                    'cache' => $templatesConfig->isDebugEnabled() ? false : $cacheDirectory,
                    'debug' => $templatesConfig->isDebugEnabled(),
                    'strict_variables' => $templatesConfig->isDebugEnabled(),
                    'auto_reload' => $templatesConfig->isDebugEnabled(),
                ]);

                if ($templatesConfig->isDebugEnabled()) {
                    $environment->addExtension(new DebugExtension());
                }

                foreach ($twigConfig->extensions() as $extensionClassName) {
                    /** @var ExtensionInterface $extension */
                    $extension = $container->get($extensionClassName);
                    $environment->addExtension($extension);
                }

                return $environment;
            },
            FrontendUrlGenerator::class => static function (ContainerInterface $container): FrontendUrlGenerator {
                /** @var TwigConfig $twigConfig */
                $twigConfig = $container->get(TwigConfig::class);

                return new FrontendUrlGenerator($twigConfig->frontendUrl());
            },
            Templates::class => static function (ContainerInterface $container) {
                $environment = $container->get(Environment::class);

                return new TwigTemplates($environment);
            },
            TwigConfig::class => static fn () => TwigConfig::withDefaults(),
        ];
    }

    /**
     *
     */
    public static function getExtensions(): array
    {
        return [];
    }
}
