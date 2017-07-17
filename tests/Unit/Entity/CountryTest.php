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
     * @covers \Librinfo\CRMBundle\Entity\Country::setCode
     * @covers \Librinfo\CRMBundle\Entity\Country::getCode
     */
    public function testSetCode()
    {
        $code = 'loo';
        $set = $this->object->setCode($code);
        $get = $this->object->getCode();
        $this->assertEquals('loo', $get);

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

        $set = $this->object->setEnabled($enabled);
        $get = $this->object->getEnabled();
        $this->assertEquals(true, $get);
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
        $province = $this->mockProvince;
        // testing addProvince(Province $province) return $this
        $add = $this->object->addProvince($province)->getProvinces();
        $this->assertContains($province, $add);

        // testing hasProvince(Province $province) return bool
        $has = $this->object->hasProvince($province);
        $this->assertEquals(true, $has);

        // testing hasProvinces() return !$this->provinces->isEmpty()
        $this->assertEquals(true, $this->object->hasProvinces());

        // testing removeProvince(Province $province) return $this
        $rm = $this->object->removeProvince($province)->getProvinces();
        $this->assertNotContains($province, $rm);

        $this->object->setEnabled($enabled);
        $this->assertEquals(true, $this->object->getEnabled());
    }
}
