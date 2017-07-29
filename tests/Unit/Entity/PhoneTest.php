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

namespace Librinfo\CRMBundle\Entity\Test\Unit;

use PHPUnit\Framework\TestCase;
use Librinfo\CRMBundle\Entity\Phone;

class PhoneTest extends TestCase
{
    /**
     * @var Phone
     */
    protected $object;

    protected function setUp()
    {
        $this->object = $this->getMockForAbstractClass(Phone::class);
    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Phone::__toString
     * @covers \Librinfo\CRMBundle\Entity\Phone::setNumber
     * @covers \Librinfo\CRMBundle\Entity\Phone::getNumber
     * @covers \Librinfo\CRMBundle\Entity\Phone::setPhoneType
     * @covers \Librinfo\CRMBundle\Entity\Phone::getPhoneType
     */
    public function test__toString()
    {
        $this->object->setPhoneType('fix');
        $this->assertEquals('fix', $this->object->getPhoneType());

        $this->object->setNumber('food');
        $this->assertEquals('food', $this->object->getNumber());

        $this->assertEquals('food (fix)', $this->object->__toString());
    }
}
