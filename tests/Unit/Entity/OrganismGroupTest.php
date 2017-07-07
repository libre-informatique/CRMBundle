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

    protected function setUp()
    {
        $this->object = new OrganismGroup();
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
     */
    public function testGetRoles()
    {
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
