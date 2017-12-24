<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017 Andreas Möller.
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/localheinz/factory-muffin-definition
 */

namespace Localheinz\FactoryMuffin\Definition\Test\Unit\Exception;

use Localheinz\FactoryMuffin\Definition\Exception;
use Localheinz\Test\Util\Helper;
use PHPUnit\Framework;

final class InvalidDirectoryTest extends Framework\TestCase
{
    use Helper;

    public function testExtendsInvalidArgumentException()
    {
        $this->assertClassExtends(\InvalidArgumentException::class, Exception\InvalidDirectory::class);
    }

    public function testNotDirectoryCreatesException()
    {
        $directory = $this->faker()->word;

        $exception = Exception\InvalidDirectory::notDirectory($directory);

        $this->assertInstanceOf(Exception\InvalidDirectory::class, $exception);

        $message = \sprintf(
            'Directory should be a directory, but "%s" is not.',
            $directory
        );

        $this->assertSame($message, $exception->getMessage());
    }
}
