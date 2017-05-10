<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Librinfo\CRMBundle\Admin;

use Blast\CoreBundle\Admin\CoreAdmin;
use Blast\CoreBundle\Admin\Traits\HandlesRelationsAdmin;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Librinfo\CRMBundle\Entity\Organism;
use Librinfo\CRMBundle\Form\DataTransformer\CustomerCodeTransformer;
use Librinfo\CRMBundle\Form\DataTransformer\SupplierCodeTransformer;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\CoreBundle\Validator\ErrorElement;
use Sonata\AdminBundle\Show\ShowMapper;

class OrganismAdmin extends CoreAdmin
{
    use HandlesRelationsAdmin;

    protected function configureRoutes(RouteCollection $collection)
    {
        parent::configureRoutes($collection);

        // xxxxxxxAction in CRUD controller
        $collection->add('validateVat');
        $collection->add('set_default_address', 'set-default-address/{organismId}/{addressId}');
        $collection->add('set_default_phone', 'set-default-phone/{organismId}/{phoneId}');
    }

    /**
     * @param FormMapper $mapper
     */
    protected function postConfigureFormFields(FormMapper $mapper)
    {
        $mapper->get('customerCode')->addViewTransformer(new CustomerCodeTransformer());
        $mapper->get('supplierCode')->addViewTransformer(new SupplierCodeTransformer());

        $subject = $this->getSubject();

        if( $subject->getId() )
        {
            if( $subject->isIndividual() )
            {
                $mapper->remove('name');
                $mapper->remove('individuals');
                $this->renameFormTab('form_tab_individuals', 'form_tab_organizations');
            }else
            {
                $mapper->remove('title');
                $mapper->remove('firstname');
                $mapper->remove('lastname');
                $mapper->remove('organizations');
            }
        }
    }

    /**
     *
     * @param ShowMapper $mapper
     */
    protected function postConfigureShowFields(ShowMapper $mapper)
    {
        $subject = $this->getSubject();

        if( $subject )
        {
            if( $subject->isIndividual() )
            {
                $mapper->remove('name');
                $mapper->remove('individuals');
                $this->renameShowTab('show_tab_individuals', 'show_tab_organizations');
            }else
            {
                $mapper->remove('title');
                $mapper->remove('firstname');
                $mapper->remove('lastname');
                $mapper->remove('organizations');
            }
        }
    }

    public function preUpdate($object)
    {
        parent::preUpdate($object);
        $this->handlePositions($object);
    }

    public function prePersist($object)
    {
        parent::prePersist($object);
        $this->handlePositions($object);
    }

    /**
     * @param Organism $organism
     */
    public function preRemove($organism)
    {
        foreach($organism->getIndividuals() as $position)
            $this->getModelManager()->delete($position);

        foreach($organism->getOrganizations() as $position)
            $this->getModelManager()->delete($position);

        foreach($organism->getPhones() as $phone)
            $this->getModelManager()->delete($phone);

        foreach($organism->getAddresses() as $phone)
            $this->getModelManager()->delete($phone);

        parent::preRemove($organism);
    }

    public function preBatchAction($actionName, \Sonata\AdminBundle\Datagrid\ProxyQueryInterface $query, array &$idx, $allElements)
    {
        parent::preBatchAction($actionName, $query, $idx, $allElements);
    }

    /**
     * @param ErrorElement $errorElement
     * @param mixed        $object
     *
     * @deprecated this feature cannot be stable, use a custom validator,
     *             the feature will be removed with Symfony 2.2
     */
    public function validate(ErrorElement $errorElement, $object)
    {
        $this->validateCustomerCode($errorElement, $object);
        $this->validateSupplierCode($errorElement, $object);
    }

    /**
     * Customer code validator
     *
     * @param ErrorElement $errorElement
     * @param Organism $object
     */
    public function validateCustomerCode(ErrorElement $errorElement, $object)
    {
        $is_new = empty($object->getId());
        $code = $object->getCustomerCode();

        if ( empty($code) && $object->isCustomer() ) {
            $errorElement
                ->with('customerCode')
                    ->addViolation('A customer code is required for customers')
                ->end()
            ;
        }

        $registry = $this->getConfigurationPool()->getContainer()->get('blast_core.code_generators');
        $codeGenerator = $registry->getCodeGenerator(Organism::class, 'customerCode');
        if ( !empty($code) && !$codeGenerator->validate($code) ) {
            $msg = 'Wrong format for customer code. It shoud be: ' . $codeGenerator::getHelp();
            $errorElement
                ->with('customerCode')
                    ->addViolation($msg)
                ->end()
            ;
        }

        if ( !empty($code) ) {
            $valid = true;
            $organisms = $this->getModelManager()->findBy(
                 'Librinfo\CRMBundle\Entity\Organism',
                 ['customerCode' => $code]
             );
            if ( $organisms ) {
                if ( $is_new )
                    $valid = false;
                else foreach ( $organisms as $organism ) if ( $organism->getId() != $object->getId() ) {
                    $valid = false;
                    break;
                }
            }
            if ( !$valid )
                $errorElement
                    ->with('customerCode')
                        ->addViolation('This customer code is already in use')
                    ->end()
                ;
        }

    }


    /**
     * Supplier code validator
     *
     * @param ErrorElement $errorElement
     * @param Organism $object
     */
    public function validateSupplierCode(ErrorElement $errorElement, $object)
    {
        $is_new = empty($object->getId());
        $code = $object->getSupplierCode();

        if ( empty($code) && $object->isSupplier() ) {
            $errorElement
                ->with('supplierCode')
                    ->addViolation('A supplier code is required for suppliers')
                ->end()
            ;
        }

        $registry = $this->getConfigurationPool()->getContainer()->get('blast_core.code_generators');
        $codeGenerator = $registry->getCodeGenerator(Organism::class, 'supplierCode');
        if ( !empty($code) && !$codeGenerator->validate($code) ) {
            $msg = 'Wrong format for supplier code. It shoud be: ' . $codeGenerator::getHelp();
            $errorElement
                ->with('supplierCode')
                    ->addViolation($msg)
                ->end()
            ;
        }

        if ( !empty($code) ) {
            $valid = true;
            $organisms = $this->getModelManager()->findBy(
                 'Librinfo\CRMBundle\Entity\Organism',
                 ['supplierCode' => $code]
             );
            if ( $organisms ) {
                if ( $is_new )
                    $valid = false;
                else foreach ( $organisms as $organism ) if ( $organism->getId() != $object->getId() ) {
                    $valid = false;
                    break;
                }
            }
            if ( !$valid )
                $errorElement
                    ->with('supplierCode')
                        ->addViolation('This supplier code is already in use')
                    ->end()
                ;
        }
    }

    /**
     * @param QueryBuilder $queryBuilder
     * @param string $alias
     * @param string $field
     * @param array $value
     */
    public static function contactFilterQueryBuilder(ProxyQueryInterface $queryBuilder, $alias, $field, $value)
    {
        if (!$value['value'])
            return;

        $search = '%' . $value['value'] . '%';
        $queryBuilder
            ->andWhere($queryBuilder->expr()->orX(
                $queryBuilder->expr()->like("$alias.firstname", ':firstname'),
                $queryBuilder->expr()->like("$alias.name", ':name')
            ))
            ->setParameter('firstname', $search)
            ->setParameter('name', $search)
        ;

        return true;
    }

    private function handlePositions($object)
    {
        if($object->isIndividual())
        {
            if( $object->getOrganizations() && $object->getOrganizations()->count() > 0 )
                foreach( $object->getOrganizations() as $org )
                    $org->setIndividual($object);
        }else
        {
            if( $object->getIndividuals() && $object->getIndividuals()->count() > 0 )
                foreach($object->getIndividuals() as $ind)
                    $ind->setOrganization($object);
        }
    }
}
