<?php

namespace Librinfo\CRMBundle\Entity\Test\Unit;

use PHPUnit\Framework\TestCase;
use Librinfo\CRMBundle\Entity\OrganismPhone;
use Librinfo\CRMBundle\Entity\Organism;


class OrganismPhoneTest extends TestCase
{
    /**
     * @var OrganismPhone
     */
    protected $object;

    protected $organism;

    protected function setUp()
    {
      $this->object = new OrganismPhone();
      $this->organism = new Organism();

    }

    protected function tearDown()
    {
    }

    /**
     * @covers Librinfo\CRMBundle\Entity\OrganismPhone::getOrganism
     * @covers Librinfo\CRMBundle\Entity\OrganismPhone::setOrganism
     */
    public function testGetOrganism()
    {
      $organism = $this->organism;
      $this->object->setOrganism($organism);
      $this->assertEquals($organism,$this->object->getOrganism());

    }

}
