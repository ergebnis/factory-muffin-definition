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

namespace Localheinz\FactoryMuffin\Definition\Test\AutoReview;

use Localheinz\Test\Util\Helper;
use PHPUnit\Framework;

/**
 * @internal
 */
final class SrcCodeTest extends Framework\TestCase
{
    use Helper;

    public function testSrcClassesAreAbstractOrFinal(): void
    {
        $this->assertClassesAreAbstractOrFinal(__DIR__ . '/../../src');
    }

    public function testSrcClassesHaveUnitTests(): void
    {
        $this->assertClassesHaveTests(
            __DIR__ . '/../../src',
            'Localheinz\\FactoryMuffin\\Definition\\',
            'Localheinz\\FactoryMuffin\\Definition\\Test\\Unit'
        );
    }
}
