<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Librinfo\CRMBundle\Entity;

use AppBundle\Entity\OuterExtension\LibrinfoCRMBundle\OrganismExtension;
use Blast\BaseEntitiesBundle\Entity\Traits\Addressable;
use Blast\BaseEntitiesBundle\Entity\Traits\BaseEntity;
use Blast\BaseEntitiesBundle\Entity\Traits\Descriptible;
use Blast\BaseEntitiesBundle\Entity\Traits\Emailable;
use Blast\BaseEntitiesBundle\Entity\Traits\Loggable;
use Blast\BaseEntitiesBundle\Entity\Traits\Searchable;
use Blast\BaseEntitiesBundle\Entity\Traits\Timestampable;
use Blast\OuterExtensionBundle\Entity\Traits\OuterExtensible;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Librinfo\CRMBundle\Entity\Traits\Circlable;
use Librinfo\CRMBundle\Entity\Traits\Positionable;

/**
 * Organism
 */
class Organism implements VCardableInterface
{
    use BaseEntity,
        OuterExtensible,
        Timestampable,
        Addressable,
        Emailable,
        Positionable,
        Circlable,
        Descriptible,
        Searchable,
        Loggable,
        OrganismExtension
    ;

    /**
     * @var string
     */
    private $url;

    /**
     * @var string
     */
    private $administrativeNumber;

    /**
     * @var Category
     */
    private $category;

    /**
     * @var bool
     */
    private $individual = false;

    /**
     * @var bool
     */
    private $customer = false;

    /**
     * @var string
     */
    private $customerCode;

    /**
     * @var bool
     */
    private $supplier = false;

    /**
     * @var string
     */
    private $supplierCode;

    /**
     * @var string
     */
    private $iban;

    /**
     * @var string
     */
    private $vat;

    /**
     * @var int
     */
    private $vatVerified = 0;

    /**
     * @var string
     */
    private $alert;

    /**
     * @var Collection
     */
    private $phones;



    /**
     * Organism constructor.
     */
    public function __construct()
    {
        $this->circles = new ArrayCollection();
        $this->positions = new ArrayCollection();
        $this->phones = new ArrayCollection();
        $this->initOuterExtendedClasses();
    }

    /**
     * Set url
     *
     * @param string $url
     *
     * @return Organism
     */
    public function setUrl($url)
    {
        $this->url = $url;

        return $this;
    }

    /**
     * Get url
     *
     * @return string
     */
    public function getUrl()
    {
        return $this->url;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     *
     * @return Organism
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * Set administrativeNumber
     *
     * @param string $administrativeNumber
     *
     * @return Organism
     */
    public function setAdministrativeNumber($administrativeNumber)
    {
        $this->administrativeNumber = $administrativeNumber;

        return $this;
    }

    /**
     * Get administrativeNumber
     *
     * @return string
     */
    public function getAdministrativeNumber()
    {
        return $this->administrativeNumber;
    }

    /**
     * Set category
     *
     * @param Category $category
     *
     * @return Organism
     */
    public function setCategory(Category $category = null)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }


    /**
     * Set individual
     *
     * @param bool $individual
     *
     * @return Organism
     */
    public function setIndividual($individual)
    {
        $this->individual = $individual;

        return $this;
    }

    /**
     * Get individual
     *
     * @return bool
     */
    public function isIndividual()
    {
        return $this->individual;
    }


    /**
     * Set customer
     *
     * @param bool $customer
     *
     * @return Organism
     */
    public function setCustomer($customer)
    {
        $this->customer = $customer;

        return $this;
    }

    /**
     * Get customer
     *
     * @return bool
     */
    public function isCustomer()
    {
        return $this->customer;
    }

    /**
     * Set customerCode
     *
     * @param string $customerCode
     *
     * @return Organism
     */
    public function setCustomerCode($customerCode)
    {
        $this->customerCode = $customerCode;

        return $this;
    }

    /**
     * Get customerCode
     *
     * @return string
     */
    public function getCustomerCode()
    {
        return $this->customerCode;
    }

    /**
     * Set supplier
     *
     * @param bool $supplier
     *
     * @return Organism
     */
    public function setSupplier($supplier)
    {
        $this->supplier = $supplier;

        return $this;
    }

    /**
     * Get supplier
     *
     * @return bool
     */
    public function isSupplier()
    {
        return $this->supplier;
    }

    /**
     * Set supplierCode
     *
     * @param string $supplierCode
     *
     * @return Organism
     */
    public function setSupplierCode($supplierCode)
    {
        $this->supplierCode = $supplierCode;

        return $this;
    }

    /**
     * Get supplierCode
     *
     * @return string
     */
    public function getSupplierCode()
    {
        return $this->supplierCode;
    }

    /**
     * Set iban
     *
     * @param string $iban
     *
     * @return Organism
     */
    public function setIban($iban)
    {
        $this->iban = $iban;

        return $this;
    }

    /**
     * Get iban
     *
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Set vat
     *
     * @param string $vat
     *
     * @return Organism
     */
    public function setVat($vat)
    {
        $this->vat = $vat;

        return $this;
    }

    /**
     * Get vat
     *
     * @return string
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * Set vatVerified
     *
     * @param int $vatVerified
     *
     * @return Organism
     */
    public function setVatVerified($vatVerified)
    {
        $this->vatVerified = $vatVerified;

        return $this;
    }

    /**
     * Get vatVerified
     *
     * @return int
     */
    public function getVatVerified()
    {
        return $this->vatVerified;
    }

    /**
     * Set alert
     *
     * @param string $alert
     *
     * @return Organism
     */
    public function setAlert($alert)
    {
        $this->alert = $alert;

        return $this;
    }

    /**
     * Get alert
     *
     * @return string
     */
    public function getAlert()
    {
        return $this->alert;
    }

    /**
     * @return Collection
     */
    public function getPhones()
    {
        return $this->phones;
    }


    /**
     * @param OrganismPhone $phone
     * @return Organism
     */
    public function addPhone(OrganismPhone $phone)
    {
        $phone->setOrganism($this);
        $this->phones->add($phone);
        return $this;
    }

    /**
     * @param OrganismPhone $phone
     * @return Organism
     */
    public function removePhone(OrganismPhone $phone)
    {
        $this->phones->removeElement($phone);
        return $this;
    }

    public function isPersonal()
    {
        return false;
    }
}
