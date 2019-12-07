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

namespace Localheinz\FactoryMuffin\Definition\Test\Unit\Exception;

use Ergebnis\Test\Util\Helper;
use Localheinz\FactoryMuffin\Definition\Exception;
use PHPUnit\Framework;

/**
 * @internal
 *
 * @covers \Localheinz\FactoryMuffin\Definition\Exception\InvalidDirectory
 */
final class InvalidDirectoryTest extends Framework\TestCase
{
    use Helper;

    public function testExtendsInvalidArgumentException(): void
    {
        self::assertClassExtends(\InvalidArgumentException::class, Exception\InvalidDirectory::class);
    }

    public function testNotDirectoryCreatesException(): void
    {
        $directory = self::faker()->word;

        $exception = Exception\InvalidDirectory::notDirectory($directory);

        self::assertInstanceOf(Exception\InvalidDirectory::class, $exception);

        $message = \sprintf(
            'Directory should be a directory, but "%s" is not.',
            $directory
        );

        self::assertSame($message, $exception->getMessage());
    }
}
