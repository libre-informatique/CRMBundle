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
use Librinfo\CRMBundle\Entity\Role;
use Librinfo\CRMBundle\Entity\OrganismGroup;

class RoleTest extends TestCase
{
    /**
     * @var Role
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new Role();
    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Role::getContactGroups
     * @covers \Librinfo\CRMBundle\Entity\Role::addContactGroup
     * @covers \Librinfo\CRMBundle\Entity\Role::removeContactGroup
     */
    public function testGetContactGroups()
    {
        // add ContactGroup
        $this->object->addContactGroup($org = new OrganismGroup());
        $this->assertContains($org, $this->object->getContactGroups());

        // remove ContactGroup
        $this->object->removeContactGroup($org);
        $this->assertNotContains($org, $this->object->getContactGroups());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Role::__toString
     */
    public function test__toString()
    {
        // return getName
        $this->object->setName('goo');
        $this->assertEquals('goo', $this->object->__toString());
    }
}
