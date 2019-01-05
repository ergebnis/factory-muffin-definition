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

namespace Localheinz\FactoryMuffin\Definition;

use League\FactoryMuffin\FactoryMuffin;

interface Definition
{
    public function accept(FactoryMuffin $factoryMuffin);
}
