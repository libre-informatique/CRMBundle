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
use Librinfo\CRMBundle\CodeGenerator\CustomerCodeGenerator;
use Librinfo\CRMBundle\Entity\Organism;

class CustomerCodeGeneratorTest extends TestCase
{
    /**
     * @var CustomerCodeGenerator
     */
    protected $object;
    protected $mockEntityManager;
    protected $organism;
    protected $mockEntityRepository;
    protected $mockQueryBuilder;
    protected $mockQuery;

    protected function setUp()
    {
        $this->object = new CustomerCodeGenerator();
        $this->organism = new Organism();
        $this->mockEntityManager = $this->createMock(
        $originalClassName = "\Doctrine\ORM\EntityManager",
        $arguments = array(),
        $mockClassName = '',
        $callOriginalConstructor = false,
        $callOriginalClone = true,
        $callAutoload = true,
        $mockedMethods = array('getRepository'),
        $cloneArguments = true
      );
        $this->mockEntityRepository = $this->createMock(
        $originalClassName = "\Doctrine\ORM\EntityRepository",
        $arguments = array(),
        $mockClassName = '',
        $callOriginalConstructor = false,
        $callOriginalClone = true,
        $callAutoload = true,
        $mockedMethods = array('createQueryBuilder'),
        $cloneArguments = true
      );
        $this->mockQueryBuilder = $this->createMock(
        $originalClassName = "\Doctrine\ORM\QueryBuilder",
        $arguments = array(),
        $mockClassName = '',
        $callOriginalConstructor = false,
        $callOriginalClone = true,
        $callAutoload = true,
        $mockedMethods = array('select', 'andWhere', 'setMaxResults', 'addOrderBy', 'getQuery'),
        $cloneArguments = true
      );
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
        $this->mockEntityManager->method('getRepository')->willReturn($this->mockEntityRepository);
        $this->mockEntityRepository->method('createQueryBuilder')->willReturn($this->mockQueryBuilder);
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
     * @covers \Librinfo\CRMBundle\CodeGenerator\CustomerCodeGenerator::generate
     */
    public function testGenerate()
    {
        //** return '000001' if IsCustomer true and getCustomerCode null
      $this->organism->setIsCustomer(true);
        $this->object::setEntityManager($this->mockEntityManager);
        $this->mockEntityManager->getRepository($this->organism);
        $this->organism->setCustomerCode(null);
        $this->assertEquals('000001', $this->object::generate($this->organism));

      // return getCustomerCode if IsCustomer true getCustomerCode not null
      $this->organism->setCustomerCode('ddd');
        $this->assertEquals('ddd', $this->object::generate($this->organism));

      //** return null if IsCustomer false
      $this->organism->setIsCustomer(false);
        $this->assertEquals(null, $this->object::generate($this->organism));
    }

    /**
     * @covers \Librinfo\CRMBundle\CodeGenerator\CustomerCodeGenerator::getHelp
     */
    public function testGetHelp()
    {
        $this->assertEquals('6 digits', $this->object::getHelp());
    }
}
