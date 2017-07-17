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
        $phone = 'fix';

        $set = $this->object->setPhone($phone);
        $this->assertInstanceOf(Position::class, $set);

        $get = $this->object->getPhone();
        $this->assertEquals('fix', $get);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Position::setDepartment
     * @covers \Librinfo\CRMBundle\Entity\Position::getDepartment
     */
    public function testSetDepartment()
    {
        $department = 'Finistere';

        $set = $this->object->setDepartment($department);
        $this->assertInstanceOf(Position::class, $set);

        $get = $this->object->getDepartment();
        $this->assertEquals('Finistere', $get);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Position::setOrganism
     * @covers \Librinfo\CRMBundle\Entity\Position::getOrganism
     */
    public function testSetOrganism()
    {
        $organism = 'clps';

        $set = $this->object->setOrganism($organism);
        $this->assertInstanceOf(Position::class, $set);

        $get = $this->object->getOrganism();
        $this->assertEquals('clps', $get);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Position::setPositionType
     * @covers \Librinfo\CRMBundle\Entity\Position::getPositionType
     */
    public function testSetPositionType()
    {
        $positionType = 'xx';

        $set = $this->object->setPositionType($positionType);
        $this->assertInstanceOf(Position::class, $set);

        $get = $this->object->getPositionType();
        $this->assertEquals('xx', $get);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Position::setIndividual
     * @covers \Librinfo\CRMBundle\Entity\Position::getIndividual
     */
    public function testSetIndividual()
    {
        $individual = $this->mockOrganism;

        $set = $this->object->setIndividual($individual);
        $this->assertInstanceOf(Position::class, $set);

        $get = $this->object->getIndividual();
        $this->assertEquals($individual, $get);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Position::setOrganization
     * @covers \Librinfo\CRMBundle\Entity\Position::getOrganization
     */
    public function testSetOrganization()
    {
        $organization = $this->mockOrganism;

        $set = $this->object->setOrganization($organization);
        $this->assertInstanceOf(Position::class, $set);

        $get = $this->object->getOrganization();
        $this->assertEquals($organization, $get);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Position::isPersonal
     */
    public function testIsPersonal()
    {
        $test = $this->object->isPersonal();
        $this->assertEquals(false, $test);
    }
}
