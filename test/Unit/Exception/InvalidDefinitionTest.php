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

use Localheinz\FactoryMuffin\Definition\Exception;
use Localheinz\Test\Util\Helper;
use PHPUnit\Framework;

/**
 * @internal
 */
final class InvalidDefinitionTest extends Framework\TestCase
{
    use Helper;

    public function testExtendsRuntimeException(): void
    {
        $this->assertClassExtends(\RuntimeException::class, Exception\InvalidDefinition::class);
    }

    public function testFromClassNameCreatesException(): void
    {
        $className = $this->faker()->word;
        $previousException = new \Exception();

        $exception = Exception\InvalidDefinition::fromClassNameAndException(
            $className,
            $previousException
        );

        self::assertInstanceOf(Exception\InvalidDefinition::class, $exception);

        $message = \sprintf(
            'An exception was thrown while trying to instantiate definition "%s".',
            $className
        );

        self::assertSame($message, $exception->getMessage());
        self::assertSame(0, $exception->getCode());
        self::assertSame($previousException, $exception->getPrevious());
    }
}
