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
use Librinfo\CRMBundle\Entity\Category;
use Doctrine\Common\Collections\ArrayCollection;

class CategoryTest extends TestCase
{
    /**
     * @var Category
     */
    protected $object;

    protected $mockOrganism;

    protected function setUp()
    {
        $this->object = new Category();
        $this->mockOrganism = $this->createMock('\Librinfo\CRMBundle\Entity\Organism');
    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Category::__construct
     */
    public function test__construct()
    {
        // testing $this->initCollections() with init NesteTreeable treeChildren Collection
        $this->assertInstanceOf(ArrayCollection::class, $this->object->getTreeChildren());

        // testing $this->organisms = new ArrayCollection()
        $this->assertInstanceOf(ArrayCollection::class, $this->object->getOrganisms());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Category::addOrganism
     * @covers \Librinfo\CRMBundle\Entity\Category::removeOrganism
     * @covers \Librinfo\CRMBundle\Entity\Category::getOrganisms
     */
    public function testAddOrganism()
    {
        // get Organism
        $this->object->getOrganisms();
        $this->assertEquals(0, $this->object->getOrganisms()->count());

        // addOrganism($this->mockOrganism)
        $this->object->addOrganism($this->mockOrganism);
        $this->assertContains($this->mockOrganism, $this->object->getOrganisms());

        // removeOrganism($this->mockOrganism)
        $this->object->removeOrganism($this->mockOrganism);
        $this->assertNotContains($this->mockOrganism, $this->object->getOrganisms());
    }
}
