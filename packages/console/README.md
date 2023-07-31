<p align="center">
    <a href="https://github.com/zorachka" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/86768962" height="240px">
    </a>
    <h1 align="center">Zorachka Console</h1>
    <br>
</p>

Example of Console Application using [Symfony Console Component](https://github.com/symfony/console/) at core.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/zorachka/console.svg?style=flat-square)](https://packagist.org/packages/zorachka/console)
[![Tests](https://github.com/zorachka/console/actions/workflows/test.yml/badge.svg?branch=main)](https://github.com/zorachka/console/actions/workflows/test.yml)
[![Analysis](https://github.com/zorachka/console/actions/workflows/analyse.yml/badge.svg?branch=main)](https://github.com/zorachka/console/actions/workflows/analyse.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/zorachka/console.svg?style=flat-square)](https://packagist.org/packages/zorachka/console)

## Installation

You can install the package via composer:

```bash
composer require zorachka/console
```

## Usage

Create a `bin/app.php` file at root of your project with content below:

```php
<?php

declare(strict_types=1);

use Zorachka\Console\Application;

/**
 * Self-called anonymous function that creates its own scope and keeps the global namespace clean.
 */
(function () {
    $application = new ConsoleApplication(
        appName: 'My Console App',
        catchExceptions: false,
        commands: [],
    );
    $application->run();
})();

```

## Testing

```bash
make test
```

## Changelog

Please see [CHANGELOG](CHANGELOG.md) for more information on what has changed recently.

## Contributing

Please see [CONTRIBUTING](.github/CONTRIBUTING.md) for details.

## Security Vulnerabilities

Please review [our security policy](../../security/policy) on how to report security vulnerabilities.

## Credits

- [Siarhei Bautrukevich](https://github.com/bautrukevich)
- [All Contributors](../../contributors)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
