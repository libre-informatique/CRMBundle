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
        $this->object->setColor('red');
        $this->assertEquals('red', $this->object->getColor());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Circle::setTranslatable
     * @covers \Librinfo\CRMBundle\Entity\Circle::isTranslatable
     */
    public function testSetTranslatable()
    {
        $this->object->setTranslatable(false);
        $this->assertEquals(false, $this->object->isTranslatable());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Circle::setEditable
     * @covers \Librinfo\CRMBundle\Entity\Circle::isEditable
     */
    public function testSetEditable()
    {
        $this->object->setEditable(true);
        $this->assertEquals(true, $this->object->isEditable());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Circle::addPosition
     * @covers \Librinfo\CRMBundle\Entity\Circle::countPositions
     * @covers \Librinfo\CRMBundle\Entity\Circle::removePosition
     */
    public function testAddPosition()
    {
        // add $position1
        $position1 = $this->mockPosition;
        $this->object->addPosition($position1);
        $this->assertContains($position1, $this->object->getPositions());

        // add $position2
        $position2 = $this->mockPosition;
        $this->object->addPosition($position2);
        $this->assertContains($position2, $this->object->getPositions());

        // countPositions()
        $this->assertEquals(2, $this->object->countPositions());

        // remove $position1
        $this->object->removePosition($position1);
        $this->assertNotContains(array($position1), $this->object->getPositions());
        $this->assertEquals(1, $this->object->countPositions());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Circle::addOrganism
     * @covers \Librinfo\CRMBundle\Entity\Circle::removeOrganism
     * @covers \Librinfo\CRMBundle\Entity\Circle::countOrganisms
     */
    public function testAddOrganism()
    {
        // addOrganism($this->mockOrganism)
        $this->object->addOrganism($this->mockOrganism);
        $this->assertContains($this->mockOrganism, $this->object->getOrganisms());

        // countOrganisms()
        $this->assertEquals(1, $this->object->countOrganisms());

        // removeOrganism($this->mockOrganism)
        $this->object->removeOrganism($this->mockOrganism);
        $this->assertNotContains($this->mockOrganism, $this->object->getOrganisms());
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
        $this->object->setCode('45G');
        $this->object->getCode();

        $this->object->setName('foo');
        $this->object->getName();

        $this->assertEquals('45G foo', $this->object->__toString());
    }
}
