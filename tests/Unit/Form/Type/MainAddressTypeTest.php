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

namespace Librinfo\CRMBundle\Form\Type\Test\Unit;

use PHPUnit\Framework\TestCase;
use Librinfo\CRMBundle\Form\Type\MainAddressType;

class MainAddressTypeTest extends TestCase
{
    /**
     * @var MainAddressType
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new MainAddressType();
    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\Form\Type\MainAddressType::getParent
     * @covers \Librinfo\CRMBundle\Form\Type\MainAddressType::getBlockPrefix
     */
    public function testGetParent()
    {
        // getParent return 'text'
        $this->assertEquals('text', $this->object->getParent());

        // getBlockPrefix return 'librinfo_main_address'
        $this->assertEquals('librinfo_main_address', $this->object->getBlockPrefix());
    }
}
