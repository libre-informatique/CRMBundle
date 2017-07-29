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
use Librinfo\CRMBundle\Form\Type\FakeEmailType;
use Blast\UtilsBundle\Form\Type\UniqueFieldType;

class FakeEmailTypeTest extends TestCase
{
    /**
     * @var FakeEmailType
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new FakeEmailType();
    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\Form\Type\FakeEmailType::getParent
     * @covers \Librinfo\CRMBundle\Form\Type\FakeEmailType::getBlockPrefix
     */
    public function testGetParent()
    {
        // getParent return UniqueFieldType::class
        $this->assertEquals(UniqueFieldType::class, $this->object->getParent());

        // getBlockPrefix return 'librinfo_fake_email'
        $this->assertEquals('librinfo_fake_email', $this->object->getBlockPrefix());
    }
}
