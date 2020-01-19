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

namespace Ergebnis\FactoryMuffin\Definition\Test\Fixture\Definition\IsAbstract;

use Ergebnis\FactoryMuffin\Definition\Definition;
use Ergebnis\FactoryMuffin\Definition\Test\Fixture\Entity;
use League\FactoryMuffin\FactoryMuffin;

/**
 * Is not acceptable as it is abstract.
 */
abstract class UserDefinition implements Definition
{
    final public function accept(FactoryMuffin $factoryMuffin): void
    {
        $factoryMuffin->define(Entity\User::class);
    }
}
