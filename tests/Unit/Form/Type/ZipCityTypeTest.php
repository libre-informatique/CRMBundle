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
use Librinfo\CRMBundle\Form\Type\ZipCityType;

class ZipCityTypeTest extends TestCase
{
    /**
     * @var ZipCityType
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new ZipCityType();
    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\Form\Type\ZipCityType::getParent
     */
    public function testGetParent()
    {
        // getParent() return 'text'
        $test = $this->object->getParent();
        $this->assertEquals('text', $test);
    }

    /**
     * @covers \Librinfo\CRMBundle\Form\Type\ZipCityType::getBlockPrefix
     */
    public function testGetBlockPrefix()
    {
        // getBlockPrefix() return 'Librinfo_zip_city'
        $this->assertEquals('librinfo_zip_city', $this->object->getBlockPrefix());
    }

    /**
     * @covers \Librinfo\CRMBundle\Form\Type\ZipCityType::getName
     */
    public function testGetName()
    {
        // getName() return getBlockPrefix()
        $this->assertEquals('librinfo_zip_city', $this->object->getName());
    }
}
