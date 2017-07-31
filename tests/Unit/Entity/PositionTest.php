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
use Librinfo\CRMBundle\Entity\Position;
use Librinfo\CRMBundle\Entity\Circle;
use Doctrine\Common\Collections\ArrayCollection;

class PositionTest extends TestCase
{
    /**
     * @var Position
     */
    protected $object;

    protected $mockOrganism;

    protected function setUp()
    {
        $this->object = new Position();
        $this->mockOrganism = $this->createMock('\Librinfo\CRMBundle\Entity\Organism');
    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Position::setPhone
     * @covers \Librinfo\CRMBundle\Entity\Position::getPhone
     */
    public function testSetPhone()
    {
        $this->object->setPhone('fix');
        $this->assertEquals('fix', $this->object->getPhone());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Position::setDepartment
     * @covers \Librinfo\CRMBundle\Entity\Position::getDepartment
     */
    public function testSetDepartment()
    {
        $this->object->setDepartment('Finistere');
        $this->assertEquals('Finistere', $this->object->getDepartment());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Position::setOrganism
     * @covers \Librinfo\CRMBundle\Entity\Position::getOrganism
     */
    public function testSetOrganism()
    {
        $this->object->setOrganism('clps');
        $this->assertEquals('clps', $this->object->getOrganism());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Position::setPositionType
     * @covers \Librinfo\CRMBundle\Entity\Position::getPositionType
     * @covers \Librinfo\CRMBundle\Entity\Position::__toString
     */
    public function testSetPositionType()
    {
        $this->object->setPositionType('xx');
        $this->assertEquals('xx', $this->object->getPositionType());

        $this->assertEquals('xx', $this->object->__toString());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Position::setIndividual
     * @covers \Librinfo\CRMBundle\Entity\Position::getIndividual
     */
    public function testSetIndividual()
    {
        $this->object->setIndividual($this->mockOrganism);
        $this->assertEquals($this->mockOrganism, $this->object->getIndividual());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Position::setOrganization
     * @covers \Librinfo\CRMBundle\Entity\Position::getOrganization
     */
    public function testSetOrganization()
    {
        $this->object->setOrganization($this->mockOrganism);
        $this->assertEquals($this->mockOrganism, $this->object->getOrganization());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Position::isPersonal
     */
    public function testIsPersonal()
    {
        $this->assertEquals(false, $this->object->isPersonal());
    }

    /**
     * @use \Librinfo\CRMBundle\Entity\Position\Circlable::addCircle
     * @use \Librinfo\CRMBundle\Entity\Position\Circlable::removeCircle
     * @use \Librinfo\CRMBundle\Entity\Position\Circlable::getCircles()
     */
    public function testGetCircles()
    {
        // init
        $get = $this->object->getCircles();
        $circle = new Circle();

        // testing
        $this->assertInstanceOf(ArrayCollection::class, $get);

        $this->assertInstanceOf(Position::class, $this->object->addCircle($circle));
        $this->assertContains($circle, $get);

        $this->assertInstanceOf(Position::class, $this->object->removeCircle($circle));
        $this->assertNotContains($circle, $get);
    }
}
