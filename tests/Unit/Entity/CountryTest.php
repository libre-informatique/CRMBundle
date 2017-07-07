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
use Librinfo\CRMBundle\Entity\Country;

class CountryTest extends TestCase
{
    /**
     * @var Country
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new Country();
    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Country::setCode
     * @covers \Librinfo\CRMBundle\Entity\Country::getCode
     */
    public function testSetCode()
    {
        $test = 'ABG';
        $this->object->setCode($test);
        $this->assertEquals('ABG', $this->object->getCode());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Country::setEnabled
     * @covers \Librinfo\CRMBundle\Entity\Country::getEnabled
     */
    public function testSetEnabled()
    {
        $this->assertNull($this->object->getEnabled());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Country::getId
     * @covers \Librinfo\CRMBundle\Entity\Country::setId
     */
    public function testGetId()
    {
        $id = 12;
        $this->object->setId($id);
        $this->assertEquals(12, $this->object->getId());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Country::isNew
     */
    public function testIsNew()
    {
        $id = 'AD12';
        $this->object->setId($id);
        $this->object->getId();
        $this->assertFalse($this->object->isNew());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Country::__toString
     */
    public function test__toString()
    {
        $this->assertInternalType('string', $this->object->__toString());
    }
}
