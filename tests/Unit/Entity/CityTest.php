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
use Librinfo\CRMBundle\Entity\City;

class CityTest extends TestCase
{
    /**
     * @var City
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new City();
    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\City::setCountryCode
     * @covers \Librinfo\CRMBundle\Entity\City::getCountryCode
     */
    public function testSetCountryCode()
    {
        $country_code = 'g20';
        $this->object->setCountryCode($country_code);
        $test = $this->object->getCountryCode();
        $this->assertEquals('g20', $test);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\City::setZip
     * @covers \Librinfo\CRMBundle\Entity\City::getZip
     */
    public function testSetZip()
    {
        $zip = 'foo';
        $this->object->setZip($zip);
        $test = $this->object->getZip();
        $this->assertEquals('foo', $test);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\City::setCity
     * @covers \Librinfo\CRMBundle\Entity\City::getCity
     */
    public function testSetCity()
    {
        $city = 'zoo';
        $this->object->setCity($city);
        $test = $this->object->getCity();
        $this->assertEquals('zoo', $test);
    }
}
