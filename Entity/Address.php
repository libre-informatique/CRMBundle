<?php

/*
 * Copyright (C) 2015-2016 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Librinfo\CRMBundle\Entity;

use AppBundle\Entity\OuterExtension\LibrinfoCRMBundle\AddressExtension;
use AppBundle\Entity\OuterExtension\LibrinfoCRMBundle\AddressExtensionInterface;
use Blast\BaseEntitiesBundle\Entity\Traits\BaseEntity;
use Blast\BaseEntitiesBundle\Entity\Traits\Searchable;
use Blast\BaseEntitiesBundle\Entity\Traits\Timestampable;
use Blast\OuterExtensionBundle\Entity\Traits\OuterExtensible;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Address
 */
class Address implements AddressExtensionInterface, VCardableInterface
{
    use BaseEntity,
        OuterExtensible,
        Timestampable,
        Searchable,
        AddressExtension
    ;

    /**
     * @var string
     */
    private $firstName;

    /**
     * @var string
     */
    protected $lastName;

    /**
     * @var string
     */
    private $postCode;

    /**
     * @var string
     */
    private $street;

    /**
     * @var string
     */
    private $city;

    /**
     * @var string
     */
    private $countryCode;

    /**
     * @var string
     */
    private $provinceCode;

    /**
     * @var string
     */
    private $provinceName;

    /**
     * @var boolean
     */
    private $npai = false;

    /**
     * @var string
     */
    private $vcardUid;

    /**
     * @var boolean
     */
    private $confirmed = true;

    /**
     * @var \Librinfo\CRMBundle\Entity\Organism
     */
    private $organism;

    /**
     * @var \Librinfo\CRMBundle\Entity\Contact
     */
    private $contact;

    public function __construct()
    {
        $this->addresses = new ArrayCollection();
    }

    public function __toString()
    {
        return sprintf(
           '%s %s, %s %s',
           $this->getFirstName(),
           $this->getLastName(),
           $this->getStreet(),
           $this->getCountry()
        );
    }

    /**
     * Set firstName
     *
     * @param string $firstName
     * @return Address
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Get firstName
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * {@inheritdoc}
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * {@inheritdoc}
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * Set postCode
     *
     * @param string $postCode
     * @return Address
     */
    public function setPostCode($postCode)
    {
        $this->postCode = $postCode;

        return $this;
    }

    /**
     * Get postCode
     *
     * @return string
     */
    public function getPostCode()
    {
        return $this->postCode;
    }

    /**
     * Set street
     *
     * @param string $street
     * @return Address
     */
    public function setStreet($street)
    {
        $this->street = $street;

        return $this;
    }

    /**
     * Get street
     *
     * @return string
     */
    public function getStreet()
    {
        return $this->street;
    }

    /**
     * Set city
     *
     * @param string $city
     * @return Address
     */
    public function setCity($city)
    {
        $this->city = $city;

        return $this;
    }

    /**
     * Get city
     *
     * @return string
     */
    public function getCity()
    {
        return $this->city;
    }

    /**
     * Set countryCode
     *
     * @param string $countryCode
     * @return Address
     */
    public function setCountryCode($countryCode = null)
    {
        $this->countryCode = $countryCode;

        return $this;
    }

    /**
     * Get countryCode
     *
     * @return string
     */
    public function getCountryCode()
    {
        return $this->countryCode;
    }

    /**
     * Set provinceCode
     *
     * @param string $provinceCode
     * @return Address
     */
    public function setProvinceCode($provinceCode = null)
    {
        $this->provinceCode = $provinceCode;

        return $this;
    }

    /**
     * Get provinceCode
     *
     * @return string
     */
    public function getProvinceCode()
    {
        return $this->provinceCode;
    }

    /**
     * Set provinceName
     *
     * @param string $provinceName
     * @return Address
     */
    public function setProvinceName($provinceName = null)
    {
        $this->provinceName = $provinceName;

        return $this;
    }

    /**
     * Get provinceName
     *
     * @return string
     */
    public function getProvinceName()
    {
        return $this->provinceName;
    }

    /**
     * Set npai
     *
     * @param boolean $npai
     * @return Address
     */
    public function setNpai($npai)
    {
        $this->npai = $npai;

        return $this;
    }

    /**
     * Get npai
     *
     * @return boolean
     */
    public function getNpai()
    {
        return $this->npai;
    }

    /**
     * Set vcardUid
     *
     * @param string $vcardUid
     * @return Address
     */
    public function setVcardUid($vcardUid)
    {
        $this->vcardUid = $vcardUid;

        return $this;
    }

    /**
     * Get vcardUid
     *
     * @return string
     */
    public function getVcardUid()
    {
        return $this->vcardUid;
    }

    /**
     * Set confirmed
     *
     * @param boolean $confirmed
     * @return Address
     */
    public function setConfirmed($confirmed)
    {
        $this->confirmed = $confirmed;

        return $this;
    }

    /**
     * Get confirmed
     *
     * @return boolean
     */
    public function getConfirmed()
    {
        return $this->confirmed;
    }

    /**
     * Set organism
     *
     * @param \Librinfo\CRMBundle\Entity\Organism $organism
     * @return Address
     */
    public function setOrganism(\Librinfo\CRMBundle\Entity\Organism $organism = null)
    {
        $this->organism = $organism;

        return $this;
    }

    /**
     * Get organism
     *
     * @return \Librinfo\CRMBundle\Entity\Organism
     */
    public function getOrganism()
    {
        return $this->organism;
    }

    /**
     * Set contact
     *
     * @param \Librinfo\CRMBundle\Entity\Contact $contact
     * @return Address
     */
    public function setContact(\Librinfo\CRMBundle\Entity\Contact $contact = null)
    {
        $this->contact = $contact;

        return $this;
    }

    /**
     * Get contact
     *
     * @return \Librinfo\CRMBundle\Entity\Contact
     */
    public function getContact()
    {
        return $this->contact;
    }

    public function isPersonal()
    {
        return true;
    }
}
