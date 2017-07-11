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
use Doctrine\Common\Collections\ArrayCollection;

class CountryTest extends TestCase
{
    /**
     * @var Country
     */
    protected $object;

    protected $mockProvince;

    protected function setUp()
    {
        $this->object = new Country();
        $this->mockProvince = $this->createMock('\Librinfo\CRMBundle\Entity\Province');
    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Country::__construct()
     */
    public function test__construct()
    {
        $this->assertInstanceOf(ArrayCollection::class, $this->object->getProvinces());
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
        $enabled = true;
        $this->object->setEnabled($enabled);
        $this->assertEquals(true, $this->object->getEnabled());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Country::enable
     * @covers \Librinfo\CRMBundle\Entity\Country::disable
     */
    public function testEnable()
    {
        $enabled = false;
        $this->object->setEnabled($enabled)->enable();
        $this->assertEquals(true, $this->object->getEnabled());

        $this->object->setEnabled($enabled)->disable();
        $this->assertEquals(false, $this->object->getEnabled());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Country::addProvince
     * @covers \Librinfo\CRMBundle\Entity\Country::removeProvince
     */
    public function testAddProvince()
    {
        $this->object->addProvince($this->mockProvince);
        $test = $this->object->getProvinces();
        $this->assertEquals(1, $test->count());

        $this->object->removeProvince($this->mockProvince);
        $this->test = $this->object->getProvinces();
        $this->assertEquals(0, $this->test->count());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Country::getProvinces
     */
    public function testGetProvinces()
    {
        // getProvinces() return new ArrayCollection()
      $test = $this->object->getProvinces();
        $this->assertInstanceOf(ArrayCollection::class, $test);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Country::hasProvinces
     */
    public function testHasProvinces()
    {
        //hasProvinces() return !$this->provinces->isEmpty()
      $this->assertNotNull($this->object->hasProvinces());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Country::hasProvince
     */
    public function testHasProvince()
    {
        // hasProvince() return new ArrayCollection()->contains($province)
      $this->object->addProvince($this->mockProvince);
        $this->assertTrue($this->object->hasProvince($this->mockProvince));
    }
}
