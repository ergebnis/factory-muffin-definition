<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017-2020 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE.md file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/factory-muffin-definition
 */

namespace Ergebnis\FactoryMuffin\Definition\Test\Fixture\Definition\Acceptable;

use Ergebnis\FactoryMuffin\Definition\Definition;
use League\FactoryMuffin\FactoryMuffin;

/**
 * Is acceptable as it implements the interface.
 */
final class UserDefinition implements Definition
{
    public function accept(FactoryMuffin $factoryMuffin): void
    {
        $factoryMuffin->define('Foo');
    }
}
