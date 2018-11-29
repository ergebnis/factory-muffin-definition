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

namespace Localheinz\FactoryMuffin\Definition\Test\Unit;

use League\FactoryMuffin\FactoryMuffin;
use Localheinz\FactoryMuffin\Definition\Definitions;
use Localheinz\FactoryMuffin\Definition\Exception;
use Localheinz\Test\Util\Helper;
use PHPUnit\Framework;

/**
 * @internal
 */
final class DefinitionsTest extends Framework\TestCase
{
    use Helper;

    public function testInRejectsNonExistentDirectory()
    {
        $this->expectException(Exception\InvalidDirectory::class);

        Definitions::in(__DIR__ . '/../Fixture/Definition/NonExistentDirectory');
    }

    public function testInIgnoresClassesWhichCanNotBeAutoloaded()
    {
        $factoryMuffin = $this->createFactoryMuffinMock();

        $factoryMuffin
            ->expects(self::never())
            ->method(self::anything());

        Definitions::in(__DIR__ . '/../Fixture/Definition/CanNotBeAutoloaded')->registerWith($factoryMuffin);
    }

    public function testInIgnoresClassesWhichDoNotImplementProviderInterface()
    {
        $factoryMuffin = $this->createFactoryMuffinMock();

        $factoryMuffin
            ->expects(self::never())
            ->method(self::anything());

        Definitions::in(__DIR__ . '/../Fixture/Definition/DoesNotImplementInterface')->registerWith($factoryMuffin);
    }

    public function testInIgnoresClassesWhichAreAbstract()
    {
        $factoryMuffin = $this->createFactoryMuffinMock();

        $factoryMuffin
            ->expects(self::never())
            ->method(self::anything());

        Definitions::in(__DIR__ . '/../Fixture/Definition/IsAbstract')->registerWith($factoryMuffin);
    }

    public function testInIgnoresClassesWhichHavePrivateConstructors()
    {
        $factoryMuffin = $this->createFactoryMuffinMock();

        $factoryMuffin
            ->expects(self::never())
            ->method(self::anything());

        Definitions::in(__DIR__ . '/../Fixture/Definition/PrivateConstructor')->registerWith($factoryMuffin);
    }

    public function testInAcceptsClassesWhichAreAcceptable()
    {
        $factoryMuffin = $this->createFactoryMuffinMock();

        $factoryMuffin
            ->expects(self::once())
            ->method('define');

        Definitions::in(__DIR__ . '/../Fixture/Definition/Acceptable')->registerWith($factoryMuffin);
    }

    public function testThrowsInvalidDefinitionExceptionIfInstantiatingDefinitionsThrowsException()
    {
        $factoryMuffin = $this->createFactoryMuffinMock();

        $factoryMuffin
            ->expects(self::never())
            ->method(self::anything());

        $this->expectException(Exception\InvalidDefinition::class);

        Definitions::in(__DIR__ . '/../Fixture/Definition/ThrowsExceptionDuringConstruction');
    }

    /**
     * @return FactoryMuffin|\PHPUnit_Framework_MockObject_MockObject
     */
    private function createFactoryMuffinMock()
    {
        return $this->createMock(FactoryMuffin::class);
    }
}
