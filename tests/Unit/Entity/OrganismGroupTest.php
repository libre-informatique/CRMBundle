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
    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\OrganismGroup::getContact
     * @covers \Librinfo\CRMBundle\Entity\OrganismGroup::setContact
     */
    public function testGetContact()
    {
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
        $organism = 'organism';
        $this->object->setOrganism($organism);
        $this->assertEquals($organism, $this->object->getOrganism());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\OrganismGroup::getRoles
     * @covers \Librinfo\CRMBundle\Entity\OrganismGroup::setRoles
     * @covers \Librinfo\CRMBundle\Entity\OrganismGroup::addRole
     * @covers \Librinfo\CRMBundle\Entity\OrganismGroup::removeRole
     */
    public function testGetRoles()
    {
        $role1 = $this->mockRole;
        $this->object->setRoles($this->roles);
        $this->object->getRoles()->add($role1);
        $this->assertContains($role1, $this->object->getRoles());

        // testing addRole($this->mockRole)
        $role2 = $this->mockRole;
        $this->object->addRole($role2);
        $this->assertContains($role2, $this->object->getRoles());

        // testing removeRole($role1)
        $this->object->removeRole($role1);
        $this->assertNotContains($role1, $this->object->getRoles());
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
