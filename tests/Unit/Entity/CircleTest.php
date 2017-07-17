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
use Librinfo\CRMBundle\Entity\Circle;
use Doctrine\Common\Collections\ArrayCollection;

class CircleTest extends TestCase
{
    /**
     * @var Circle
     */
    protected $object;

    protected $mockPosition;

    protected $mockOrganism;

    protected function setUp()
    {
        $this->object = new Circle();
        $this->mockPosition = $this->createMock('\Librinfo\CRMBundle\Entity\Position');
        $this->mockOrganism = $this->createMock('\Librinfo\CRMBundle\Entity\Organism');
    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Circle::__construct
     * @covers \Librinfo\CRMBundle\Entity\Circle::getPositions
     * @covers \Librinfo\CRMBundle\Entity\Circle::getOrganisms
     */
    public function test__construct()
    {
        $this->assertInstanceOf(ArrayCollection::class, $this->object->getOrganisms());
        $this->assertInstanceOf(ArrayCollection::class, $this->object->getPositions());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Circle::setColor
     * @covers \Librinfo\CRMBundle\Entity\Circle::getColor
     */
    public function testSetColor()
    {
        $color = 'red';
        $this->object->setColor($color);
        $test = $this->object->getColor();
        $this->assertEquals('red', $test);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Circle::setTranslatable
     * @covers \Librinfo\CRMBundle\Entity\Circle::isTranslatable
     */
    public function testSetTranslatable()
    {
        $translatable = false;
        $this->object->setTranslatable($translatable);
        $test = $this->object->isTranslatable();
        $this->assertEquals(false, $test);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Circle::setEditable
     * @covers \Librinfo\CRMBundle\Entity\Circle::isEditable
     */
    public function testSetEditable()
    {
        $editable = true;
        $this->object->setEditable($editable);
        $test = $this->object->isEditable();
        $this->assertEquals(true, $test);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Circle::addPosition
     * @covers \Librinfo\CRMBundle\Entity\Circle::countPositions
     * @covers \Librinfo\CRMBundle\Entity\Circle::removePosition
     */
    public function testAddPosition()
    {
        $position = $this->mockPosition;
        $this->object->addPosition($position);

        $position_1 = $this->mockPosition;
        $this->object->addPosition($position_1);

        $this->assertEquals(2, $this->object->countPositions());

        $this->object->removePosition($position_1);

        $this->assertEquals(1, $this->object->countPositions());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Circle::addOrganism
     * @covers \Librinfo\CRMBundle\Entity\Circle::removeOrganism
     * @covers \Librinfo\CRMBundle\Entity\Circle::countOrganisms
     */
    public function testAddOrganism()
    {
        $organism = $this->mockOrganism;
        $this->object->addOrganism($organism);

        $this->assertEquals(1, $this->object->countOrganisms());

        $this->object->removeOrganism($organism);

        $this->assertEquals(0, $this->object->countOrganisms());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Circle::__toString
     * @covers \Librinfo\CRMBundle\Entity\Circle::setCode
     * @covers \Librinfo\CRMBundle\Entity\Circle::getCode
     */
    public function test__toString()
    {
        // __toString() return (string) sprintf('%s %s', $this->code, $this->name)
        $code = '45G';
        $this->object->setCode($code);
        $this->object->getCode();

        $name = 'foo';
        $this->object->setName($name);
        $this->object->getName();
        $this->assertEquals('45G foo', $this->object->__toString());
    }
}
