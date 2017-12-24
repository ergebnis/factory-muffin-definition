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

use Localheinz\FactoryMuffin\Definition\Test\Fixture;
use Localheinz\Test\Util\Helper;
use PHPUnit\Framework;

final class ProjectCodeTest extends Framework\TestCase
{
    use Helper;

    public function testProductionClassesAreAbstractOrFinal()
    {
        $this->assertClassesAreAbstractOrFinal(__DIR__ . '/../../src');
    }

    public function testProductionClassesHaveTests()
    {
        $this->assertClassesHaveTests(
            __DIR__ . '/../../src',
            'Localheinz\\FactoryMuffin\\Definition\\',
            'Localheinz\\FactoryMuffin\\Definition\\Test\\Unit'
        );
    }

    public function testTestClassesAreAbstractOrFinal()
    {
        $this->assertClassesAreAbstractOrFinal(__DIR__ . '/..', [
            Fixture\Definition\CanNotBeAutoloaded\MaybeUserDefinition::class,
        ]);
    }
}
