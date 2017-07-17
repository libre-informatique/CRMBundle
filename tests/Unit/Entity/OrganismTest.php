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

<<<<<<< HEAD
    protected $mockCategory;

    protected function setUp()
    {
        $this->object = new Organism();
        $this->mockCategory = $this->createMock('\Librinfo\CRMBundle\Entity\Category');
=======
    protected function setUp()
    {
        $this->object = new Organism();
>>>>>>> original_wip-test/wip-test
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
<<<<<<< HEAD
      $id = 'id';
        $this->object->setId($id);
      // test methods
      $clone = clone $this->object;
        $this->assertNull($clone->getId());
        $this->assertInstanceOf(ArrayCollection::class, $clone->getPositions());
      //test object
      $this->assertEquals($id, $this->object->getId());
=======
       $id = 'id';
        $this->object->setId($id);
       // test methods
       $clone = clone $this->object;
        $this->assertNull($clone->getId());
        $this->assertInstanceOf(ArrayCollection::class, $clone->getPositions());
       //test object
       $this->assertEquals($id, $this->object->getId());
>>>>>>> original_wip-test/wip-test
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
<<<<<<< HEAD
     * @covers \Librinfo\CRMBundle\Entity\Organism::setLastname
=======
>>>>>>> original_wip-test/wip-test
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
<<<<<<< HEAD
=======
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
>>>>>>> original_wip-test/wip-test
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
<<<<<<< HEAD
     * @covers \Librinfo\CRMBundle\Entity\Organism::setUrl
     * @covers \Librinfo\CRMBundle\Entity\Organism::getUrl
     */
    public function testSetUrl()
    {
        $url = 'toto';
        $set = $this->object->setUrl($url);
        $this->assertInstanceOf(Organism::class, $set);

        $get = $this->object->getUrl();
        $this->assertEquals('toto', $get);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setAdministrativeNumber
     * @covers \Librinfo\CRMBundle\Entity\Organism::getAdministrativeNumber
     */
    public function testSetAdministrativeNumber()
    {
        $administrativeNumber = 'foo';
        $set = $this->object->setAdministrativeNumber($administrativeNumber);
        $this->assertInstanceOf(Organism::class, $set);

        $get = $this->object->getAdministrativeNumber();
        $this->assertEquals('foo', $get);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setCategory
     * @covers \Librinfo\CRMBundle\Entity\Organism::getCategory
     */
    public function testSetCategory()
    {
        $category = $this->mockCategory = null;
        $get = $this->object->setCategory($category);
        $this->assertInstanceOf(Organism::class, $get);

        $set = $this->object->getCategory();
        $this->assertEquals(null, $set);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::getCustomerCode
     *
     * @todo   Implement testGetCustomerCode().
     */
    public function testGetCustomerCode()
    {
        $customerCode = 'moo';
        $set = $this->object->setCustomerCode($customerCode);
        $this->assertInstanceOf(Organism::class, $set);

        $get = $this->object->getCustomerCode();
        $this->assertEquals('moo', $get);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setSupplierCode
     * @covers \Librinfo\CRMBundle\Entity\Organism::getSupplierCode
     */
    public function testSetSupplierCode()
    {
        $supplierCode = 'boo';
        $set = $this->object->setSupplierCode($supplierCode);
        $this->assertInstanceOf(Organism::class, $set);

        $get = $this->object->getSupplierCode();
        $this->assertEquals('boo', $get);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setIban
     * @covers \Librinfo\CRMBundle\Entity\Organism::getIban
     */
    public function testSetIban()
    {
        $iban = 'to';
        $set = $this->object->setIban($iban);
        $this->assertInstanceOf(Organism::class, $set);

        $get = $this->object->getIban();
        $this->assertEquals('to', $get);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setVat
     * @covers \Librinfo\CRMBundle\Entity\Organism::getVat
     */
    public function testSetVat()
    {
        $vat = 'rol';
        $set = $this->object->setVat($vat);
        $this->assertInstanceOf(Organism::class, $set);

        $get = $this->object->getVat();
        $this->assertEquals('rol', $get);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setAlert
     * @covers \Librinfo\CRMBundle\Entity\Organism::getAlert
     */
    public function testSetAlert()
    {
        $alert = 'to';
        $set = $this->object->setAlert($alert);
        $this->assertInstanceOf(Organism::class, $set);

        $get = $this->object->getAlert();
        $this->assertEquals('to', $get);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setActive
     * @covers \Librinfo\CRMBundle\Entity\Organism::getActive
     */
    public function testSetActive()
    {
        $active = true;
        $set = $this->object->setActive($active);
        $this->assertInstanceOf(Organism::class, $set);

        $get = $this->object->getActive();
        $this->assertEquals(true, $get);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setCatalogueSent
     * @covers \Librinfo\CRMBundle\Entity\Organism::getCatalogueSent
     */
    public function testSetCatalogueSent()
    {
        $catalogueSent = true;
        $set = $this->object->setCatalogueSent($catalogueSent);
        $this->assertInstanceOf(Organism::class, $set);

        $get = $this->object->getCatalogueSent();
        $this->assertEquals(true, $get);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setCatalogueSendMean
     * @covers \Librinfo\CRMBundle\Entity\Organism::getCatalogueSendMean
     */
    public function testSetCatalogueSendMean()
    {
        $catalogueSendMean = true;
        $set = $this->object->setCatalogueSendMean($catalogueSendMean);
        $this->assertInstanceOf(Organism::class, $set);

        $get = $this->object->getCatalogueSendMean();
        $this->assertEquals(true, $get);
    }

    /**
     * @covers \Librinfo\CRMBundle\Entity\Organism::setSource
     * @covers \Librinfo\CRMBundle\Entity\Organism::getSource
     */
    public function testSetSource()
    {
        $source = 'poo';
        $set = $this->object->setSource($source);
        $this->assertInstanceOf(Organism::class, $set);

        $get = $this->object->getSource();
        $this->assertEquals('poo', $get);
    }

    /**
=======
>>>>>>> original_wip-test/wip-test
     * @covers \Librinfo\CRMBundle\Entity\Organism::isPersonal
     */
    public function testIsPersonal()
    {
<<<<<<< HEAD
        $test = $this->object->isPersonal();
        $this->assertEquals(false, $test);
=======
        $this->assertFalse($this->object->isPersonal());
>>>>>>> original_wip-test/wip-test
    }
}
