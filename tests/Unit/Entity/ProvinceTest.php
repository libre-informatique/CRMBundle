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
use Librinfo\CRMBundle\Entity\Province;

class ProvinceTest extends TestCase
{
    /**
     * @var Province
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new Province();
    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Province::setCode
     * @covers \Librinfo\CRMBundle\Entity\Province::getCode
     * @covers \Librinfo\CRMBundle\Entity\Province::setName
     * @covers \Librinfo\CRMBundle\Entity\Province::getName
     * @covers \Librinfo\CRMBundle\Entity\Province::setAbbreviation
     * @covers \Librinfo\CRMBundle\Entity\Province::getAbbreviation
     * @covers \Librinfo\CRMBundle\Entity\Province::setCountry
     * @covers \Librinfo\CRMBundle\Entity\Province::getCountry
     */
    public function testSetCode()
    {
        // init
        $test = 'foo';
        $country = $this->createMock("\Librinfo\CRMBundle\Entity\Country");

        // testing setters
        $this->assertInstanceOf(Province::class,
        $this->object->setCode($test),
        $this->object->setName($test),
        $this->object->setAbbreviation($test),
        $this->object->setCountry($country));

        // testing getters
        $this->assertEquals($this->object->getCode(),
        $this->object->getName(),
        $this->object->getAbbreviation());
        $this->assertEquals($country, $this->object->getCountry());
    }
}
