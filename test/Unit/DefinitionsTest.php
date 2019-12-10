<?php

declare(strict_types=1);

/**
 * Copyright (c) 2017 Andreas Möller
 *
 * For the full copyright and license information, please view
 * the LICENSE file that was distributed with this source code.
 *
 * @see https://github.com/ergebnis/factory-muffin-definition
 */

namespace Ergebnis\FactoryMuffin\Definition\Test\Unit;

use Ergebnis\FactoryMuffin\Definition\Definitions;
use Ergebnis\FactoryMuffin\Definition\Exception;
use Ergebnis\Test\Util\Helper;
use League\FactoryMuffin\FactoryMuffin;
use PHPUnit\Framework;
use Prophecy\Argument;

/**
 * @internal
 *
 * @covers \Ergebnis\FactoryMuffin\Definition\Definitions
 *
 * @uses \Ergebnis\FactoryMuffin\Definition\Exception\InvalidDefinition
 * @uses \Ergebnis\FactoryMuffin\Definition\Exception\InvalidDirectory
 */
final class DefinitionsTest extends Framework\TestCase
{
    use Helper;

    public function testInRejectsNonExistentDirectory(): void
    {
        $this->expectException(Exception\InvalidDirectory::class);

        Definitions::in(__DIR__ . '/../Fixture/Definition/NonExistentDirectory');
    }

    public function testInIgnoresClassesWhichDoNotImplementProviderInterface(): void
    {
        $factoryMuffin = $this->prophesize(FactoryMuffin::class);

        $factoryMuffin
            ->define(Argument::any())
            ->shouldNotBeCalled();

        Definitions::in(__DIR__ . '/../Fixture/Definition/DoesNotImplementInterface')->registerWith($factoryMuffin->reveal());
    }

    public function testInIgnoresClassesWhichAreAbstract(): void
    {
        $factoryMuffin = $this->prophesize(FactoryMuffin::class);

        $factoryMuffin
            ->define(Argument::any())
            ->shouldNotBeCalled();

        Definitions::in(__DIR__ . '/../Fixture/Definition/IsAbstract')->registerWith($factoryMuffin->reveal());
    }

    public function testInIgnoresClassesWhichHavePrivateConstructors(): void
    {
        $factoryMuffin = $this->prophesize(FactoryMuffin::class);

        $factoryMuffin
            ->define(Argument::any())
            ->shouldNotBeCalled();

        Definitions::in(__DIR__ . '/../Fixture/Definition/PrivateConstructor')->registerWith($factoryMuffin->reveal());
    }

    public function testInAcceptsClassesWhichAreAcceptable(): void
    {
        $factoryMuffin = $this->prophesize(FactoryMuffin::class);

        $factoryMuffin
            ->define(Argument::is('Foo'))
            ->shouldBeCalled();

        Definitions::in(__DIR__ . '/../Fixture/Definition/Acceptable')->registerWith($factoryMuffin->reveal());
    }

    public function testThrowsInvalidDefinitionExceptionIfInstantiatingDefinitionsThrowsException(): void
    {
        $this->expectException(Exception\InvalidDefinition::class);

        Definitions::in(__DIR__ . '/../Fixture/Definition/ThrowsExceptionDuringConstruction');
    }
}
