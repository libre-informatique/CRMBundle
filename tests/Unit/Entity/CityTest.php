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
        $this->object->setCountryCode('g20');
        $this->assertEquals('g20', $this->object->getCountryCode());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\City::setZip
     * @covers \Librinfo\CRMBundle\Entity\City::getZip
     */
    public function testSetZip()
    {
        $this->object->setZip('foo');
        $this->assertEquals('foo', $this->object->getZip());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\City::setCity
     * @covers \Librinfo\CRMBundle\Entity\City::getCity
     */
    public function testSetCity()
    {
        $this->object->setCity('zoo');
        $this->assertEquals('zoo', $this->object->getCity());
    }
}
