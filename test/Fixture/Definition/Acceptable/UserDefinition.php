<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/factory-muffin-definition
 */

namespace Localheinz\FactoryMuffin\Definition\Test\Fixture\Definition\Acceptable;

use League\FactoryMuffin\FactoryMuffin;
use Localheinz\FactoryMuffin\Definition\Definition;

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
