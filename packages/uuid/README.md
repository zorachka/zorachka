<p align="center">
    <a href="https://github.com/zorachka" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/86768962" height="240px">
    </a>
    <h1 align="center">Zorachka Uuid</h1>
    <br>
</p>

The main purpose of this package is to provide a provider to generate uuid.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/zorachka/uuid.svg?style=flat-square)](https://packagist.org/packages/zorachka/uuid)
[![Tests](https://github.com/zorachka/uuid/actions/workflows/test.yml/badge.svg?branch=main)](https://github.com/zorachka/uuid/actions/workflows/test.yml)
[![Analysis](https://github.com/zorachka/uuid/actions/workflows/analyse.yml/badge.svg?branch=main)](https://github.com/zorachka/uuid/actions/workflows/analyse.yml)
[![Total Downloads](https://img.shields.io/packagist/dt/zorachka/uuid.svg?style=flat-square)](https://packagist.org/packages/zorachka/uuid)
## Installation

You can install the package via composer:

```bash
composer require zorachka/uuid
```

## Usage

Usually you need to generate a uuid in the repository implementation:

```php
<?php

declare(strict_types=1);

namespace Project\Reviews\Infrastructure\Persistence;

use Zorachka\Uuid\UuidProvider;
use Project\Reviews\Domain\ReviewId;
use Project\Reviews\Domain\ReviewRepository;

final class ReviewRepositoryUsingDbal implements ReviewRepository
{
    private UuidProvider $uuidProvider;

    public function __construct(UuidProvider $uuidProvider)
    {
        $this->uuidProvider = $uuidProvider;
    }

    public function nextIdentity(): ReviewId
    {
        return ReviewId::fromString($this->uuidProvider::next());
    }
    
    // ...
}

```

You can use `UuidServiceProvider` as definitions for container.

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
