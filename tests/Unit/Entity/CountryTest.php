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
        $enabled = true;
        $this->object->setEnabled($enabled);
        $this->assertEquals(true, $this->object->getEnabled());
    }
}
