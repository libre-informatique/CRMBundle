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
use Librinfo\CRMBundle\Entity\Province;

class CountryTest extends TestCase
{
    /**
     * @var Country
     */
    protected $object;
    protected $province;

    protected function setUp()
    {
        $this->object = new Country();
        $this->province = new Province();
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
        $enabled = true;
        $this->object->setEnabled($enabled);
        $this->assertEquals(true, $this->object->getEnabled());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Country::__construct
     */
    public function test__Construct()
    {
        $this->assertInstanceOf(ArrayCollection::class, $this->object->getProvinces());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Country::disable()
     * @covers \Librinfo\CRMBundle\Entity\Country::enable()

     */
    public function testDisable()
    {
        // testing disable()
        $this->object->setEnabled(true);
        $this->object->disable();
        $this->assertEquals(false, $this->object->getEnabled());

        // testing enable()
        $this->object->enable();
        $this->assertEquals(true, $this->object->getEnabled());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Country::addProvince
     * @covers \Librinfo\CRMBundle\Entity\Country::removeProvince
     * @covers \Librinfo\CRMBundle\Entity\Country::getProvinces
     * @covers \Librinfo\CRMBundle\Entity\Country::hasProvince
     * @covers \Librinfo\CRMBundle\Entity\Country::hasProvinces
     */
    public function testAddProvince()
    {
        // testing addProvince(Province $province) return $this
        $this->object->addProvince($this->province);
        $this->assertContains($this->province, $this->object->getProvinces());

        // testing hasProvince(Province $province) return bool
        $this->assertEquals(true, $this->object->hasProvince($this->province));

        // testing hasProvinces() return !$this->provinces->isEmpty()
        $this->assertEquals(true, $this->object->hasProvinces());

        // testing removeProvince(Province $province) return $this
        $this->object->removeProvince($this->province);
        $this->assertNotContains($this->province, $this->object->getProvinces());
    }
}
