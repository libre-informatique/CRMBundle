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
use Librinfo\CRMBundle\Entity\Position;
use Librinfo\CRMBundle\Entity\Phone;
use Librinfo\CRMBundle\Entity\OrganismPhone;
use Librinfo\CRMBundle\Entity\Category;
use Symfony\Component\Validator\Constraints as Assert;

class OrganismTest extends TestCase
{
    /**
     * @var Organism
     */
    protected $object;
    protected $category;
    protected $position;
    protected $phone;
    protected $organismPhone;

    protected function setUp()
    {
        $this->object = new Organism();
        $this->category = new Category();
        $this->position = new Position();
        $this->phone = $this->getMockForAbstractClass(Phone::class);
        $this->organismPhone = new OrganismPhone();
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
        // return getFirstname getLastname if isIndividual true
        $this->object->setIsIndividual(true);
        $this->object->setFirstname('firstname');
        $this->object->setLastname('lastname');
        $this->assertEquals('Firstname LASTNAME', $this->object->__toString());

        // return getName if isIndividual false
        $this->object->setIsIndividual(false);
        $this->object->setName('name');
        $this->assertEquals('NAME', $this->object->__toString());
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

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setUrl
     * @covers \Librinfo\CRMBundle\Entity\Organism::getUrl
     */
    public function testSetUrl()
    {
        $this->object->setUrl('toto');
        $this->assertEquals('toto', $this->object->getUrl());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setAdministrativeNumber
     * @covers \Librinfo\CRMBundle\Entity\Organism::getAdministrativeNumber
     */
    public function testSetAdministrativeNumber()
    {
        $this->object->setAdministrativeNumber('foo');
        $this->assertEquals('foo', $this->object->getAdministrativeNumber());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::getCustomerCode
     * @covers \Librinfo\CRMBundle\Entity\Organism::setCustomerCode
     *
     * @todo   Implement testGetCustomerCode().
     */
    public function testGetCustomerCode()
    {
        $this->object->setCustomerCode('moo');
        $this->assertEquals('moo', $this->object->getCustomerCode());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setSupplierCode
     * @covers \Librinfo\CRMBundle\Entity\Organism::getSupplierCode
     */
    public function testSetSupplierCode()
    {
        $this->object->setSupplierCode('boo');
        $this->assertEquals('boo', $this->object->getSupplierCode());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setIban
     * @covers \Librinfo\CRMBundle\Entity\Organism::getIban
     */
    public function testSetIban()
    {
        $this->object->setIban('to');
        $this->assertEquals('to', $this->object->getIban());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setVat
     * @covers \Librinfo\CRMBundle\Entity\Organism::getVat
     */
    public function testSetVat()
    {
        $this->object->setVat('rol');
        $this->assertEquals('rol', $this->object->getVat());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setAlert
     * @covers \Librinfo\CRMBundle\Entity\Organism::getAlert
     */
    public function testSetAlert()
    {
        $this->object->setAlert('to');
        $this->assertEquals('to', $this->object->getAlert());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setActive
     * @covers \Librinfo\CRMBundle\Entity\Organism::getActive
     */
    public function testSetActive()
    {
        $this->object->setActive(true);
        $this->assertEquals(true, $this->object->getActive());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setCatalogueSent
     * @covers \Librinfo\CRMBundle\Entity\Organism::getCatalogueSent
     */
    public function testSetCatalogueSent()
    {
        $this->object->setCatalogueSent(true);
        $this->assertEquals(true, $this->object->getCatalogueSent());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setCatalogueSendMean
     * @covers \Librinfo\CRMBundle\Entity\Organism::getCatalogueSendMean
     */
    public function testSetCatalogueSendMean()
    {
        $this->object->setCatalogueSendMean(true);
        $this->assertEquals(true, $this->object->getCatalogueSendMean());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setSource
     * @covers \Librinfo\CRMBundle\Entity\Organism::getSource
     */
    public function testSetSource()
    {
        $this->object->setSource('poo');
        $this->assertEquals('poo', $this->object->getSource());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setDefaultPhone
     * @covers \Librinfo\CRMBundle\Entity\Organism::getDefaultPhone
     */
    public function testSetDefaultPhone()
    {
        $this->object->setDefaultPhone($this->organismPhone);
        $this->assertEquals($this->organismPhone, $this->object->getDefaultPhone());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::addOrganization
     * @covers \Librinfo\CRMBundle\Entity\Organism::removeOrganization
     * @covers \Librinfo\CRMBundle\Entity\Organism::getOrganizations
     */
    public function testRemoveOrganization()
    {
        // testing addOrganization($this->position)
        $this->object->addOrganization($this->position);
        $this->assertContains($this->position, $this->object->getOrganizations());

        // testing removeOrganization($this->position)
        $this->object->removeOrganization($this->position);
        $this->assertNotContains($this->position, $this->object->getOrganizations());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::addIndividual
     * @covers \Librinfo\CRMBundle\Entity\Organism::removeIndividual
     * @covers \Librinfo\CRMBundle\Entity\Organism::getIndividuals
     */
    public function testRemoveIndividual()
    {
        // testing addIndividual($this->position)
        $this->object->addIndividual($this->position);
        $this->assertContains($this->position, $this->object->getIndividuals());

        // testing removeIndividual($this->position)
        $this->object->removeIndividual($this->position);
        $this->assertNotContains($this->position, $this->object->getIndividuals());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::addPhone
     * @covers \Librinfo\CRMBundle\Entity\Organism::removePhone
     * @covers \Librinfo\CRMBundle\Entity\Organism::hasPhone
     * @covers \Librinfo\CRMBundle\Entity\Organism::getPhones
     */
    public function testRemovePhone()
    {
        // add $phone
        $phone = $this->organismPhone;
        $this->object->addPhone($phone);
        $this->assertContains($phone, $this->object->getPhones());

        // testing hasPhone(Phone $phone) return bool
        $has = $this->object->hasPhone($phone);
        $this->assertContains($has, $this->object->getPhones());

        // remove $phone
        $this->object->removePhone($phone);
        $this->assertNotContains($phone, $this->object->getPhones());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setFirstCatalogueSentDate
     * @covers \Librinfo\CRMBundle\Entity\Organism::getFirstCatalogueSentDate
     */
    public function testSetFirstCatalogueSentDate()
    {
        $this->object->setFirstCatalogueSentDate(new Assert\DateTime());
        $this->assertEquals(new Assert\DateTime(), $this->object->getFirstCatalogueSentDate());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setLastCatalogueSentDate
     * @covers \Librinfo\CRMBundle\Entity\Organism::getLastCatalogueSentDate
     */
    public function testSetLastCatalogueSentDate()
    {
        $this->object->setLastCatalogueSentDate(new Assert\DateTime());
        $this->assertEquals(new Assert\DateTime(), $this->object->getLastCatalogueSentDate());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setFamilyContact
     * @covers \Librinfo\CRMBundle\Entity\Organism::getFamilyContact
     */
    public function testSetFamilyContact()
    {
        $this->object->setFamilyContact(true);
        $this->assertEquals(true, $this->object->getFamilyContact());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setFlashOnControl
     * @covers \Librinfo\CRMBundle\Entity\Organism::getFlashOnControl
     */
    public function testSetFlashOnControl()
    {
        $this->object->setFlashOnControl('xx');
        $this->assertEquals('xx', $this->object->getFlashOnControl());
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::getFulltextName
     */
    public function testGetFulltextName()
    {
        // if !$this->isIndividual()
        $this->object->setIsIndividual(false);
        $this->object->setName('coo');
        $this->object->getName();
        $this->assertEquals('COO', $this->object->getFulltextName());

        // if $this->isIndividual()
        $this->object->setIsIndividual(true);
        $this->object->setLastname('Zoro');
        $this->object->getLastname();
        $this->object->setFirstname('Dooo');
        $this->object->getFirstname();
        $this->assertEquals('Dooo ZORO', $this->object->getFulltextName());
    }

    /**
     * @use \Librinfo\CRMBundle\Entity\Organism\Positionable::addPosition
     * @use \Librinfo\CRMBundle\Entity\Organism\Positionable::removePosition
     * @use \Librinfo\CRMBundle\Entity\Organism\Positionable::getPositions
     */
    public function testAddPosition()
    {
        // init
        $get = $this->object->getPositions();
        $pos = $this->position;

        // testing add $pos
        $this->object->addPosition($pos);
        $this->assertContains($pos, $get);

        // testing remove $pos
        $this->object->removePosition($pos);
        $this->assertNotContains($pos, $get);
    }
}
