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
     * @covers \Librinfo\CRMBundle\Entity\OrganismPhone::getOrganism
     * @covers \Librinfo\CRMBundle\Entity\OrganismPhone::setOrganism
     */
    public function testGetOrganism()
    {
        $organism = $this->organism;
        $this->object->setOrganism($organism);
        $this->assertEquals($organism, $this->object->getOrganism());
    }
}
