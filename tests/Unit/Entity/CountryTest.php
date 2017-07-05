<?php

namespace Librinfo\CRMBundle\Entity\Test\Unit;

/**
 * Generated by PHPUnit_SkeletonGenerator on 2017-06-30 at 11:08:42.
 */

use PHPUnit\Framework\TestCase;
use Librinfo\CRMBundle\Entity\Country;


class CountryTest extends TestCase
{
    /**
     * @var Country
     */
    protected $object;

    /**
     * Sets up the fixture, for example, opens a network connection.
     * This method is called before a test is executed.
     */
    protected function setUp()
    {

       $this->object = new Country;
    /*
    * @todo: uncomment this line
    * $this->object = new Country;
    */
    }

    /**
     * Tears down the fixture, for example, closes a network connection.
     * This method is called after a test is executed.
     */
    protected function tearDown()
    {
    }

    /**
     * @covers Librinfo\CRMBundle\Entity\Country::setCode
     * @todo   Implement testSetCode().
     */
    public function testSetCode()
    {

       $test = 'ABG';
       $this->object->setCode($test);
       $this->assertEquals($test,$this->object->getCode());
    }

    /**
     * @covers Librinfo\CRMBundle\Entity\Country::getCode
     * @todo   Implement testGetCode().
     */
    public function testGetCode()
    {
       $code = 'ABG';
       $this->object->setCode($code);
       $test=$this->object->getCode();
       $this->assertTrue($test==='ABG' );
    }

    /**
     * @covers Librinfo\CRMBundle\Entity\Country::setEnabled
     * @todo   Implement testSetEnabled().
     */
    public function testSetEnabled()
    {
       $test = true ;
       $this->object->setEnabled($test);
       $this->assertTrue($test===$this->object->getEnabled());
    }

    /**
     * @covers Librinfo\CRMBundle\Entity\Country::getEnabled
     * @todo   Implement testGetEnabled().
     */
    public function testGetEnabled()
    {
       $enabled = true;
       $this->object->setEnabled($enabled);
       $test=$this->object->getEnabled();
       $this->assertTrue($test===$enabled);
    }

    /**
     * @covers Librinfo\CRMBundle\Entity\Country::enable
     * @todo   Implement testEnable().
     */
    public function testEnable()
    {
      // Remove the following lines when you implement this test.
      $this->markTestIncomplete(
          'This test has not been implemented yet.'
      );
    }

    /**
     * @covers Librinfo\CRMBundle\Entity\Country::disable
     * @todo   Implement testDisable().
     */
    public function testDisable()
    {
      // Remove the following lines when you implement this test.
      $this->markTestIncomplete(
          'This test has not been implemented yet.'
      );
    }

    /**
     * @covers Librinfo\CRMBundle\Entity\Country::addProvince
     * @todo   Implement testAddProvince().
     */
    public function testAddProvince()
    {

        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Librinfo\CRMBundle\Entity\Country::removeProvince
     * @todo   Implement testRemoveProvince().
     */
    public function testRemoveProvince()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Librinfo\CRMBundle\Entity\Country::getProvinces
     * @todo   Implement testGetProvinces().
     */
    public function testGetProvinces()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Librinfo\CRMBundle\Entity\Country::hasProvinces
     * @todo   Implement testHasProvinces().
     */
    public function testHasProvinces()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Librinfo\CRMBundle\Entity\Country::hasProvince
     * @todo   Implement testHasProvince().
     */
    public function testHasProvince()
    {
        // Remove the following lines when you implement this test.
        $this->markTestIncomplete(
            'This test has not been implemented yet.'
        );
    }

    /**
     * @covers Librinfo\CRMBundle\Entity\Country::getId
     * @todo   Implement testGetId().
     */
    public function testGetId()
    {
        $id = 12 ;
        $this->object->setId($id);
        $test=$this->object->getId();
        $this->assertTrue($id===$test);
    }

    /**
     * @covers Librinfo\CRMBundle\Entity\Country::setId
     * @todo   Implement testSetId().
     */
    public function testSetId()
    {
       $id = 120 ;
       $this->object->setId($id);
       $this->assertEquals(120 , $this->object->getId());
    }

    /**
     * @covers Librinfo\CRMBundle\Entity\Country::isNew
     * @todo   Implement testIsNew().
     */
    public function testIsNew()
    {

       $id = "AD12";
       $this->object->setId($id);
       $this->object->getId();
       $test = $this->object->isNew();
       $this->assertEquals($test ,false);
       $this->assertNotEquals($test ,true);
    }

    /**
     * @covers Librinfo\CRMBundle\Entity\Country::__toString
     * @todo   Implement test__toString().
     */
    public function test__toString()
    {
       $id = "45H";
       $this->object->setId($id);
       $test= $this->object->__toString();
       $this->assertEquals($test,"45H");
    }
}
