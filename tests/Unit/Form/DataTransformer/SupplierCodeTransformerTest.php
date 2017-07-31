<?php

/*
 * This file is part of the Blast Project package.
 *
 * Copyright (C) 2015-2017 Libre Informatique
 *
 * This file is licenced under the GNU LGPL v3.
 * For the full copyright and license information, please view the LICENSE.md
 * file that was distributed with this source code.
 */

namespace Librinfo\CRMBundle\Form\DataTransformer\Test\Unit;

use PHPUnit\Framework\TestCase;
use Librinfo\CRMBundle\Form\DataTransformer\SupplierCodeTransformer;

class SupplierCodeTransformerTest extends TestCase
{
    /**
     * @var SupplierCodeTransformer
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new SupplierCodeTransformer();
    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\Form\DataTransformer\SupplierCodeTransformer::transform
     */
    public function testTransform()
    {
        // transform(string or null $code) return string or null
        $this->assertEquals(null, $this->object->transform(null));
        $this->assertEquals('foo', $this->object->transform('foo'));
    }

    /**
     * @covers \Librinfo\CRMBundle\Form\DataTransformer\SupplierCodeTransformer::reverseTransform
     */
    public function testReverseTransform()
    {
        // if preg_match('/^[0-9]+$/', $code)
        $this->assertEquals('000023', $this->object->reverseTransform('23'));

        // else return trim($code)
        $this->assertEquals(trim('foo'), $this->object->reverseTransform('foo'));
    }
}
