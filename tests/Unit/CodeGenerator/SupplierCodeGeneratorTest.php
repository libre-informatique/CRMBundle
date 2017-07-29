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

/*
 * Generated by PHPUnit_SkeletonGenerator on 2017-07-29 at 15:29:00.
 */

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
        * @covers \Librinfo\CRMBundle\CodeGenerator\SupplierCodeGenerator::generate
        */
       public function testGenerate()
       {
           // return null if isSupplier false
           $this->assertEquals(null, $this->object->generate($this->organism));

           // return '000001 if isSupplier true and getSupplierCode null
           $this->organism->setIsSupplier(true);
           $this->object::setEntityManager($this->mockEntityManager);
           $this->mockEntityManager->getRepository($this->organism);
           $this->organism->setSupplierCode(null);
           $this->assertEquals('000001', $this->object::generate($this->organism));

           //return getCustomerCode if isSupplier true and getSupplierCode not null
           $this->organism->setIsSupplier(true);
           $this->object::setEntityManager($this->mockEntityManager);
           $this->mockEntityManager->getRepository($this->organism);
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

       /**
        * @covers \Librinfo\CRMBundle\CodeGenerator\SupplierCodeGenerator::validate
        */
       public function testValidate()
       {
           $this->assertEquals(false, $this->object::validate('', $this->organism = null));
       }
 }
