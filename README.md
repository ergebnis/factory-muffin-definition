# factory-muffin-definition

[![Build Status](https://travis-ci.org/localheinz/factory-muffin-definition.svg?branch=master)](https://travis-ci.org/localheinz/factory-muffin-definition)
[![codecov](https://codecov.io/gh/localheinz/factory-muffin-definition/branch/master/graph/badge.svg)](https://codecov.io/gh/localheinz/factory-muffin-definition)[![Code Climate](https://codeclimate.com/github/localheinz/factory-muffin-definition/badges/gpa.svg)](https://codeclimate.com/github/localheinz/factory-muffin-definition)
[![Latest Stable Version](https://poser.pugx.org/localheinz/factory-muffin-definition/v/stable)](https://packagist.org/packages/localheinz/factory-muffin-definition)
[![Total Downloads](https://poser.pugx.org/localheinz/factory-muffin-definition/downloads)](https://packagist.org/packages/localheinz/factory-muffin-definition)

Inspired by [`localheinz/factory-girl-definition`](localheinz/factory-girl-definition), this provides an interface for, and an easy way to find and register entity definitions for [`league/factory-muffin`](https://github.com/thephpleague/factory-muffin).

## Installation

Run

```
$ composer require --dev localheinz/factory-muffin-definition
```

## Usage

### Create Definitions

Implement the `Definition` interface and use the instance of `League\FactoryMuffin\FactoryMuffin` 
that is passed in into `accept()` to define entities:

```php
<?php

namespace Foo\Bar\Test\Fixture\Entity;

use Foo\Bar\Entity;
use League\FactoryMuffin\FactoryMuffin;
use Localheinz\FactoryMuffin\Definition\Definition;

final class UserDefinition implements Definition
{
    public function accept(FactoryMuffin $factoryMuffin)
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

use League\FactoryMuffin\FactoryMuffin;
use League\FactoryMuffin\Stores;
use Localheinz\FactoryMuffin\Definition\Definitions;
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
