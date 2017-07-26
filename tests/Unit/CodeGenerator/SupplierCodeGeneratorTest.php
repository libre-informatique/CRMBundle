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

namespace Librinfo\CRMBundle\CodeGenerator\Test\Unit;

use PHPUnit\Framework\TestCase;
use Librinfo\CRMBundle\CodeGenerator\SupplierCodeGenerator;
use Librinfo\CRMBundle\Entity\Organism;

class SupplierCodeGeneratorTest extends TestCase
{
    /**
     * @var SupplierCodeGenerator
     */
    protected $object;
    protected $mockEntityManager;
    protected $organism;
    protected $mockRepository;
    protected $mockQueryBuilder;
    protected $mockQuery;

    protected function setUp()
    {
        $this->object = new SupplierCodeGenerator();
        $this->organism = new Organism();

        $this->mockEntityManager = $this->createMock("\Doctrine\ORM\EntityManager");
        $this->mockRepository = $this->createMock("\Doctrine\ORM\EntityRepository");
        $this->mockQueryBuilder = $this->createMock("\Doctrine\ORM\QueryBuilder");

        $this->mockQuery = $this->getMockForAbstractClass(
            $originalClassName = "\Doctrine\ORM\AbstractQuery",
            $arguments = array(),
            $mockClassName = '',
            $callOriginalConstructor = false,
            $callOriginalClone = true,
            $callAutoload = true,
            $mockedMethods = array('getScalarResult'),
            $cloneArguments = true
        );
        $this->mockEntityManager->method('getRepository')->willReturn($this->mockRepository);
        $this->mockRepository->method('createQueryBuilder')->willReturn($this->mockQueryBuilder);
        $this->mockQueryBuilder->method('select')->willReturn($this->mockQueryBuilder);
        $this->mockQueryBuilder->method('andWhere')->willReturn($this->mockQueryBuilder);
        $this->mockQueryBuilder->method('setMaxResults')->willReturn($this->mockQueryBuilder);
        $this->mockQueryBuilder->method('addOrderBy')->willReturn($this->mockQueryBuilder);
        $this->mockQueryBuilder->method('getQuery')->willReturn($this->mockQuery);
    }

    protected function tearDown()
    {
    }

    /**
     * @covers \Librinfo\CRMBundle\CodeGenerator\SupplierCodeGenerator::setEntityManager
     */
    public function testSetEntityManager()
    {
        $this->assertEquals($this->mockEntityManager, $this->object::setEntityManager($this->mockEntityManager));
    }

    /**
     * @covers \Librinfo\CRMBundle\CodeGenerator\SupplierCodeGenerator::generate
     */
    public function testGenerate()
    {
        // return null is !$organism->isSupplier()
        $this->assertEquals(null, $this->object->generate($this->organism));

        //if $organism->isSupplier()
        $this->organism->setIsSupplier(true);
        $this->object::setEntityManager($this->mockEntityManager);
        $this->mockEntityManager->getRepository($this->organism);
        // if $organism->getSupplierCode() === null
        $this->organism->setSupplierCode(null);
        $this->assertEquals('000001', $this->object::generate($this->organism));

        //if $organism->getSupplierCode() !== null , return $organism->getCustomerCode()
        $this->organism->setSupplierCode('foo');
        $this->organism->setCustomerCode('code');
        $this->assertEquals('code', $this->object::generate($this->organism));
    }

    /**
     * @covers \Librinfo\CRMBundle\CodeGenerator\SupplierCodeGenerator::getHelp
     */
    public function testGetHelp()
    {
        $this->assertEquals('6 digits', $this->object::getHelp());
    }
}
