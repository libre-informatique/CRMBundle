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
use Librinfo\CRMBundle\Form\DataTransformer\CustomerCodeTransformer;

class CustomerCodeTransformerTest extends TestCase
{
    /**
     * @var CustomerCodeTransformer
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new CustomerCodeTransformer();
    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\Form\DataTransformer\CustomerCodeTransformer::transform
     */
    public function testTransform()
    {
        // $code is null or string ,transform($code) return $code
        $transform = 'toto';
        $test = $this->object->transform($transform);
        $this->assertEquals('toto', $test);
        $this->assertEquals('', $this->object->transform(null));
    }

    /**
     * @covers \Librinfo\CRMBundle\Form\DataTransformer\CustomerCodeTransformer::reverseTransform
     */
    public function testReverseTransform()
    {
        $reverse = trim('1234');
        $test = $this->object->reverseTransform($reverse);
        $this->assertEquals(1234, $test);
        $this->assertEquals(null, $this->object->reverseTransform(''));
    }
}
