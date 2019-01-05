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

namespace Localheinz\FactoryMuffin\Definition\Exception;

final class InvalidDirectory extends \InvalidArgumentException
{
    public static function notDirectory(string $directory): self
    {
        return new self(\sprintf(
            'Directory should be a directory, but "%s" is not.',
            $directory
        ));
    }
}
