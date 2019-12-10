# factory-muffin-definition

[![Continuous Integration](https://github.com/ergebnis/factory-muffin-definition/workflows/Continuous%20Integration/badge.svg)](https://github.com/ergebnis/factory-muffin-definition/actions)
[![Code Coverage](https://codecov.io/gh/ergebnis/factory-muffin-definition/branch/master/graph/badge.svg)](https://codecov.io/gh/ergebnis/factory-muffin-definition)
[![Latest Stable Version](https://poser.pugx.org/ergebnis/factory-muffin-definition/v/stable)](https://packagist.org/packages/ergebnis/factory-muffin-definition)
[![Total Downloads](https://poser.pugx.org/ergebnis/factory-muffin-definition/downloads)](https://packagist.org/packages/ergebnis/factory-muffin-definition)

Inspired by [`ergebnis/factory-girl-definition`](https://github.com/ergebnis/factory-girl-definition), this provides an interface for, and an easy way to find and register entity definitions for [`league/factory-muffin`](https://github.com/thephpleague/factory-muffin).

## Installation

Run

```
$ composer require --dev ergebnis/factory-muffin-definition
```

## Usage

### Create Definitions

Implement the `Definition` interface and use the instance of `League\FactoryMuffin\FactoryMuffin`
that is passed in into `accept()` to define entities:

```php
<?php

namespace Foo\Bar\Test\Fixture\Entity;

use Ergebnis\FactoryMuffin\Definition\Definition;
use Foo\Bar\Entity;
use League\FactoryMuffin\FactoryMuffin;

final class UserDefinition implements Definition
{
    public function accept(FactoryMuffin $factoryMuffin): void
    {
        $factoryMuffin->define(Entity\User::class)->setDefinitions([
            // ...
        ]);
    }
}
```

:bulb: Any number of entities can be defined within a definition.
However, it's probably a good idea to create a definition for each entity.

### Register Definitions

Lazily instantiate an instance of `League\FactoryMuffin\FactoryMuffin`
and use `Definitions` to find definitions and register them with the factory:

```php
<?php

namespace Foo\Bar\Test\Integration;

use Ergebnis\FactoryMuffin\Definition\Definitions;
use League\FactoryMuffin\FactoryMuffin;
use League\FactoryMuffin\Stores;
use PHPUnit\Framework;

abstract class AbstractIntegrationTestCase extends Framework\TestCase
{
    final protected function factoryMuffin(): FactoryMuffin
    {
        static $factoryMuffin = null;

        if (null === $factoryMuffin) {
            $factoryMuffin = new FactoryMuffin(new Stores\ModelStore('save'));

            Definitions::in(__DIR__ . '/../Fixture')->registerWith($factoryMuffin);
        }

        return $factoryMuffin;
    }
}
```

## Contributing

Please have a look at [`CONTRIBUTING.md`](.github/CONTRIBUTING.md).

## Code of Conduct

Please have a look at [`CODE_OF_CONDUCT.md`](.github/CODE_OF_CONDUCT.md).

## License

This package is licensed using the MIT License.
