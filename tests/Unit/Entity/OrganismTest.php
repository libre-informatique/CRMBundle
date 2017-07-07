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
use Librinfo\CRMBundle\Entity\Organism;
use Doctrine\Common\Collections\ArrayCollection;

class OrganismTest extends TestCase
{
    /**
     * @var Organism
     */
    protected $object;

    protected function setUp()
    {
        $this->object = new Organism();
    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::initOrganism
     */
    public function testInitOrganism()
    {
        $this->object->InitOrganism();
        $test = $this->object->getActive();
        $this->assertTrue($test);
        $this->assertInstanceOf(ArrayCollection::class, $this->object->getCircles());
        $this->assertInstanceOf(ArrayCollection::class, $this->object->getPositions());
        $this->assertInstanceOf(ArrayCollection::class, $this->object->getPhones());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::__clone
     */
    public function test__clone()
    {
        // init
       $id = 'id';
        $this->object->setId($id);
       // test methods
       $clone = clone $this->object;
        $this->assertNull($clone->getId());
        $this->assertInstanceOf(ArrayCollection::class, $clone->getPositions());
       //test object
       $this->assertEquals($id, $this->object->getId());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::__toString
     */
    public function test__toString()
    {
        $firstname = 'firstname';
        $name = 'name';
        $this->object->setFirstname($firstname);
        $this->object->setName($name);
        $this->object->getFirstname();
        $this->object->getName();
        $this->assertEquals('Firstname NAME', $this->object->__toString());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setFirstname
     * @covers \Librinfo\CRMBundle\Entity\Organism::getFirstname
     */
    public function testSetFirstname()
    {
        $firstname = 'firstname';
        $this->object->setFirstname($firstname);
        $this->assertEquals('Firstname', $this->object->getFirstname());

        $firstname = 'FIRSTNAME';
        $this->object->setFirstname($firstname);
        $this->assertEquals('Firstname', $this->object->getFirstname());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::getLastname
     */
    public function testGetLastname()
    {
        $lastname = 'lastname';
        $this->object->setLastname($lastname);
        $this->assertEquals('LASTNAME', $this->object->getLastname());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setShortname
     * @covers \Librinfo\CRMBundle\Entity\Organism::getShortname
     */
    public function testSetShortname()
    {
        $shortname = 'shortname';
        $this->object->setShortname($shortname);
        $this->assertEquals('shortname', $this->object->getShortname());

        $shortname = 'SHORTname';
        $this->object->setShortname('SHORTname');
        $this->assertContains('SHORTname', $this->object->getShortname());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setTitle
     * @covers \Librinfo\CRMBundle\Entity\Organism::getTitle
     */
    public function testSetTitle()
    {
        $title = 'Ambassadeurs';
        $this->object->setTitle($title);
        $this->assertContains('Ambassadeurs', $this->object->getTitle());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setCulture
     * @covers \Librinfo\CRMBundle\Entity\Organism::getCulture
     */
    public function testSetCulture()
    {
        $culture = 'culture';
        $this->object->setCulture($culture);
        $this->assertSame('culture', $this->object->getCulture());
        $this->assertInternalType('string', $this->object->getCulture());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::getName
     * @covers \Librinfo\CRMBundle\Entity\Organism::setName
     */
    public function testGetName()
    {
        $name = 'name';
        $this->object->setName($name);
        $this->assertEquals('NAME', $this->object->getName());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setCategory
     * @covers \Librinfo\CRMBundle\Entity\Organism::getCategory
     */
    public function testSetCategory()
    {
        $category = null;
        $this->object->setCategory($category);
        $this->assertNull($this->object->getCategory());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setIsIndividual
     * @covers \Librinfo\CRMBundle\Entity\Organism::getIsIndividual
     */
    public function testSetIsIndividual()
    {
        $isIndividual = false;
        $this->object->setIsIndividual($isIndividual);
        $this->assertEquals(false, $this->object->getIsIndividual());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setIsCustomer
     * @covers \Librinfo\CRMBundle\Entity\Organism::getIsCustomer
     */
    public function testSetIsCustomer()
    {
        $isCustomer = false;
        $this->object->setIsCustomer($isCustomer);
        $this->assertFalse($this->object->getIsCustomer());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setIsSupplier
     * @covers \Librinfo\CRMBundle\Entity\Organism::getIsSupplier
     */
    public function testSetIsSupplier()
    {
        $isSupplier = true;
        $this->object->setIsSupplier($isSupplier);
        $this->assertTrue($this->object->getIsSupplier());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setVatVerified
     * @covers \Librinfo\CRMBundle\Entity\Organism::getVatVerified
     */
    public function testSetVatVerified()
    {
        $vatVerified = 0;
        $this->object->setVatVerified($vatVerified);
        $this->assertEquals(0, $this->object->getVatVerified());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::isPersonal
     */
    public function testIsPersonal()
    {
        $this->assertFalse($this->object->isPersonal());
    }
}
