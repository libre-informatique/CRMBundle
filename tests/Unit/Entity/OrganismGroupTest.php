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
use Librinfo\CRMBundle\Entity\OrganismGroup;
use Doctrine\Common\Collections\ArrayCollection;

class OrganismGroupTest extends TestCase
{
    /**
     * @var OrganismGroup
     */
    protected $object;


    protected $roles;

    protected $mockRole;

    protected function setUp()
    {
        $this->object = new OrganismGroup();
        $this->roles = new ArrayCollection();
        $this->mockRole = $this->createMock('\Librinfo\CRMBundle\Entity\Role');

    protected function setUp()
    {
        $this->object = new OrganismGroup();

    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\OrganismGroup::__construct()
     */
    public function test__construct()
    {
        $this->assertInstanceOf(ArrayCollection::class, $this->object->getRoles());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\OrganismGroup::getContact
     * @covers \Librinfo\CRMBundle\Entity\OrganismGroup::setContact
     */
    public function testGetContact()
    {

        $contact = 'toto';
        $this->object->setContact($contact);
        $this->assertContains('toto', $this->object->getContact());

        $contact = 'contact';
        $this->object->setContact($contact);
        $this->assertContains($contact, $this->object->getContact());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\OrganismGroup::getOrganism
     * @covers \Librinfo\CRMBundle\Entity\OrganismGroup::setOrganism
     */
    public function testGetOrganism()
    {

        $organism = 'clps';
        $this->object->setOrganism($organism);
        $this->assertEquals('clps', $this->object->getOrganism());

        $organism = 'organism';
        $this->object->setOrganism($organism);
        $this->assertEquals($organism, $this->object->getOrganism());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\OrganismGroup::getRoles
     * @covers \Librinfo\CRMBundle\Entity\OrganismGroup::setRoles
     */
    public function testGetRoles()
    {

        $role = 'fireman';
        $this->object->setRoles($this->roles);
        $this->object->getRoles()->add($role);
        $this->assertContains('fireman', $this->object->getRoles());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\OrganismGroup::addRole
     */
    public function testAddRole()
    {
        $role = $this->mockRole;
        $this->object->addRole($role)->getRoles();
        $this->assertEquals(1, $this->object->getRoles()->count());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\OrganismGroup::removeRole
     */
    public function testRemoveRole()
    {
        $this->object->addRole($this->mockRole);
        $test = $this->object->getRoles();
        $this->assertEquals(1, $test->count());

        $test = $this->object->removeRole($this->mockRole)->getRoles();
        $this->assertEquals(0, $test->count());

        $roles = new ArrayCollection();
        $role = 'toto';
        $this->object->setRoles($roles);
        $this->object->getRoles()->add($role);
        $this->assertContains('toto', $this->object->getRoles());

    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\OrganismGroup::__toString
     */
    public function test__toString()
    {
        // __toString return $this->getId()
        $id = 'id';
        $this->object->setId($id);
        $this->assertEquals('id', $this->object->__toString());
    }
}
