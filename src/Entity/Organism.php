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

namespace Librinfo\CRMBundle\Entity;

use AppBundle\Entity\OuterExtension\LibrinfoCRMBundle\OrganismExtension;
use AppBundle\Entity\OuterExtension\LibrinfoCRMBundle\OrganismExtensionInterface;
use Blast\BaseEntitiesBundle\Entity\Traits\Nameable;
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
 * Organism.
 */
class Organism implements VCardableInterface, OrganismExtensionInterface
{
    use BaseEntity,
        OuterExtensible,
        Nameable,
        Timestampable,
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
    private $firstname;

    /**
     * @var string
     */
    private $lastname;

    /**
     * @var string
     */
    private $shortname;

    /**
     * @var string
     */
    private $title;

    /**
     * @var string
     */
    private $flashOnControl;

    /**
     * @var bool
     */
    private $familyContact;

    /**
     * @var string
     */
    private $culture;

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
    private $isIndividual = false;

    /**
     * @var bool
     */
    private $isCustomer = false;

    /**
     * @var string
     */
    private $customerCode;

    /**
     * @var bool
     */
    private $isSupplier = false;

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
     * @var bool
     */
    private $active;

    /**
     * @var bool
     */
    private $catalogue_sent;

    /**
     * @var \DateTime
     */
    private $last_catalogue_sent_date;

    /**
     * @var \DateTime
     */
    private $first_catalogue_sent_date;

    /**
     * @ var string
     */
    private $catalogue_send_mean;

    /**
     * @var string
     */
    private $source;

    /**
     * @var Phone
     */
    private $defaultPhone;

    /**
     * @var Collection|Phone[]
     */
    private $phones;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $individuals;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $organizations;

    public function initOrganism()
    {
        $this->active = true;
        $this->circles = new ArrayCollection();
        $this->positions = new ArrayCollection();
        $this->phones = new ArrayCollection();
        $this->addresses = new ArrayCollection
        $this->individuals = new ArrayCollection();
        $this->organizations = new ArrayCollection();
        $this->initOuterExtendedClasses();
    }

    /**
     * Organism constructor.
     */
    public function __construct()
    {
        $this->initOrganism();
    }

    // implementation of __clone for duplication
    public function __clone()
    {
        $this->id = null;
        $this->initOrganism();
    }

    public function __toString()
    {
        return sprintf(
            '%s %s',
            $this->getFirstname(),
            $this->getName()
        );
    }

    /**
     * bEvErly CRuSHeR = Beverly Crusher
     * JEAN-LUC PICARD => Jean-Luc Picard
     * MILES O'BRIEN => Miles O'Brian.
     *
     * @param string $string
     *
     * @return string
     */
    protected function ucname($string)
    {
        $string = ucwords(mb_strtolower($string));

        foreach (array('-', '\'', '_') as $delimiter) {
            if (strpos($string, $delimiter) !== false) {
                $string = implode($delimiter, array_map('ucfirst', explode($delimiter, $string)));
            }
        }

        return $string;
    }

    /**
     * Set firstname.
     *
     * @param string $firstname
     *
     * @return Contact
     *
     * @todo ucname should go in an event listener, so we can configure the behaviour
     */
    public function setFirstname($firstname)
    {
        $this->firstname = $this->ucname($firstname);

        return $this;
    }

    /**
     * Get firstname.
     *
     * @return string
     */
    public function getFirstname()
    {
        return $this->firstname;
    }

    /**
     * Set lastname.
     *
     * @param string $lastname
     *
     * @return Contact
     *
     * @todo mb_strtoupper should go in an event listener, so we can configure the behaviour
     */
    public function setLastname($lastname)
    {
        $this->lastname = mb_strtoupper($lastname);

        return $this;
    }

    /**
     * Get lastname.
     *
     * @return string
     */
    public function getLastname()
    {
        return $this->lastname;
    }

    /**
     * Set shortname.
     *
     * @param string $shortname
     *
     * @return Contact
     */
    public function setShortname($shortname)
    {
        $this->shortname = $shortname;

        return $this;
    }

    /**
     * Get shortname.
     *
     * @return string
     */
    public function getShortname()
    {
        return $this->shortname;
    }

    /**
     * Set title.
     *
     * @param string $title
     *
     * @return Contact
     */
    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    /**
     * Get title.
     *
     * @return string
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * Set flashOnControl.
     *
     * @param string $flashOnControl
     *
     * @return Contact
     */
    public function setFlashOnControl($flashOnControl)
    {
        $this->flashOnControl = $flashOnControl;

        return $this;
    }

    /**
     * Get flashOnControl.
     *
     * @return string
     */
    public function getFlashOnControl()
    {
        return $this->flashOnControl;
    }

    /**
     * Set familyContact.
     *
     * @param bool $familyContact
     *
     * @return Contact
     */
    public function setFamilyContact($familyContact)
    {
        $this->familyContact = $familyContact;

        return $this;
    }

    /**
     * Get familyContact.
     *
     * @return bool
     */
    public function getFamilyContact()
    {
        return $this->familyContact;
    }

    /**
     * Set culture.
     *
     * @param string $culture
     *
     * @return Contact
     */
    public function setCulture($culture)
    {
        $this->culture = $culture;

        return $this;
    }

    /**
     * Get culture.
     *
     * @return string
     */
    public function getCulture()
    {
        return $this->culture;
    }

    /**
     * Set url.
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
     * Get url.
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
     *
     * @todo mb_strtoupper should go in an event listener, so we can configure the behaviour
     */
    public function setName($name)
    {
        $this->name = mb_strtoupper($name);

        return $this;
    }

    /**
     * Set administrativeNumber.
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
     * Get administrativeNumber.
     *
     * @return string
     */
    public function getAdministrativeNumber()
    {
        return $this->administrativeNumber;
    }

    /**
     * Set category.
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
     * Get category.
     *
     * @return Category
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set isIndividual.
     *
     * @param bool $isIndividual
     *
     * @return Organism
     */
    public function setIsIndividual($isIndividual)
    {
        $this->isIndividual = $isIndividual;

        return $this;
    }

    /**
     * Get isIndividual.
     *
     * @return bool
     */
    public function getIsIndividual()
    {
        return $this->isIndividual;
    }

    /**
     * Set isCustomer.
     *
     * @param bool $isCustomer
     *
     * @return Organism
     */
    public function setIsCustomer($isCustomer)
    {
        $this->isCustomer = $isCustomer;

        return $this;
    }

    /**
     * Get isCustomer.
     *
     * @return bool
     */
    public function getIsCustomer()
    {
        return $this->isCustomer;
    }

    /**
     * Alias for  getIsIndividual.
     *
     * @return bool
     */
    public function isIndividual()
    {
        return $this->isIndividual;
    }

    /**
     * Alias for getIsCustomer.
     *
     * @return bool
     */
    public function isCustomer()
    {
        return $this->isCustomer;
    }

    /**
     * Set customerCode.
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
     * Get customerCode.
     *
     * @return string
     */
    public function getCustomerCode()
    {
        return $this->customerCode;
    }

    /**
     * Set isSupplier.
     *
     * @param bool $isSupplier
     *
     * @return Organism
     */
    public function setIsSupplier($isSupplier)
    {
        $this->isSupplier = $isSupplier;

        return $this;
    }

    /**
     * Get isSupplier.
     *
     * @return bool
     */
    public function getIsSupplier()
    {
        return $this->isSupplier;
    }

    /**
     * Alias for getIsSupplier.
     *
     * @return bool
     */
    public function isSupplier()
    {
        return $this->isSupplier;
    }

    /**
     * Set supplierCode.
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
     * Get supplierCode.
     *
     * @return string
     */
    public function getSupplierCode()
    {
        return $this->supplierCode;
    }

    /**
     * Set iban.
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
     * Get iban.
     *
     * @return string
     */
    public function getIban()
    {
        return $this->iban;
    }

    /**
     * Set vat.
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
     * Get vat.
     *
     * @return string
     */
    public function getVat()
    {
        return $this->vat;
    }

    /**
     * Set vatVerified.
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
     * Get vatVerified.
     *
     * @return int
     */
    public function getVatVerified()
    {
        return $this->vatVerified;
    }

    /**
     * Set alert.
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
     * Get alert.
     *
     * @return string
     */
    public function getAlert()
    {
        return $this->alert;
    }

    /**
     * Set active.
     *
     * @param bool $active
     *
     * @return Organism
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active.
     *
     * @return bool
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set catalogue_sent.
     *
     * @param bool $catalogueSent
     *
     * @return Organism
     */
    public function setCatalogueSent($catalogueSent)
    {
        $this->catalogue_sent = $catalogueSent;

        return $this;
    }

    /**
     * Get catalogue_sent.
     *
     * @return bool
     */
    public function getCatalogueSent()
    {
        return $this->catalogue_sent;
    }

    /**
     * Set catalogue_send_mean.
     *
     * @param bool $catalogueSendMean
     *
     * @return Organism
     */
    public function setCatalogueSendMean($catalogueSendMean)
    {
        $this->catalogue_send_mean = $catalogueSendMean;

        return $this;
    }

    /**
     * Get catalogue_send_mean.
     *
     * @return bool
     */
    public function getCatalogueSendMean()
    {
        return $this->catalogue_send_mean;
    }

    /**
     * Set last_catalogue_sent_date.
     *
     * @param \DateTime $lastCatalogueSentDate
     *
     * @return Organism
     */
    public function setLastCatalogueSentDate($lastCatalogueSentDate)
    {
        $this->last_catalogue_sent_date = $lastCatalogueSentDate;

        return $this;
    }

    /**
     * Get last_catalogue_sent_date.
     *
     * @return \DateTime
     */
    public function getLastCatalogueSentDate()
    {
        return $this->last_catalogue_sent_date;
    }

    /**
     * Set first_catalogue_sent_date.
     *
     * @param \DateTime $firstCatalogueSentDate
     *
     * @return Organism
     */
    public function setFirstCatalogueSentDate($firstCatalogueSentDate)
    {
        $this->first_catalogue_sent_date = $firstCatalogueSentDate;

        return $this;
    }

    /**
     * Get first_catalogue_sent_date.
     *
     * @return \DateTime
     */
    public function getFirstCatalogueSentDate()
    {
        return $this->first_catalogue_sent_date;
    }

    /**
     * Set source.
     *
     * @param string $source
     *
     * @return Organism
     */
    public function setSource($source)
    {
        $this->source = $source;

        return $this;
    }

    /**
     * Get source.
     *
     * @return string
     */
    public function getSource()
    {
        return $this->source;
    }

    /**
     * {@inheritdoc}
     */
    public function getDefaultPhone()
    {
        return $this->defaultPhone;
    }

    /**
     * {@inheritdoc}
     */
    public function setDefaultPhone(Phone $defaultPhone = null)
    {
        $this->defaultPhone = $defaultPhone;
        if (null !== $defaultPhone) {
            $this->addPhone($defaultPhone);
        }
    }

    /**
     * {@inheritdoc}
     */
    public function addPhone(OrganismPhone $phone)
    {
        if (!$this->hasPhone($phone)) {
            $this->phones->add($phone);
            $phone->setOrganism($this);

            if (!$this->getDefaultPhone()) {
                $this->setDefaultPhone($phone);
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function removePhone(Phone $phone)
    {
        $this->phones->removeElement($phone);

        if ($phone->getId() == $this->defaultPhone->getId()) {
            if ($this->phones->count() > 0) {
                $this->defaultPhone = $this->phones[0];
            } else {
                $this->defaultPhone = null;
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function hasPhone(Phone $phone)
    {
        return $this->phones->contains($phone);
    }

    /**
     * {@inheritdoc}
     */
    public function getPhones()
    {
        return $this->phones;
    }

    /**
     * Add individual.
     *
     * @param \Librinfo\CRMBundle\Entity\Position $individual
     *
     * @return Organism
     */
    public function addIndividual(\Librinfo\CRMBundle\Entity\Position $individual)
    {
        $this->individuals[] = $individual;

        return $this;
    }

    /**
     * Remove individual.
     *
     * @param \Librinfo\CRMBundle\Entity\Position $individual
     */
    public function removeIndividual(\Librinfo\CRMBundle\Entity\Position $individual)
    {
        $this->individuals->removeElement($individual);
    }

    /**
     * Get individuals.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIndividuals()
    {
        return $this->individuals;
    }

    /**
     * Add organization.
     *
     * @param \Librinfo\CRMBundle\Entity\Position $organization
     *
     * @return Organism
     */
    public function addOrganization(\Librinfo\CRMBundle\Entity\Position $organization)
    {
        $this->organizations[] = $organization;

        return $this;
    }

    /**
     * Remove organization.
     *
     * @param \Librinfo\CRMBundle\Entity\Position $organization
     */
    public function removeOrganization(\Librinfo\CRMBundle\Entity\Position $organization)
    {
        $this->organizations->removeElement($organization);
    }

    /**
     * Get organizations.
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getOrganizations()
    {
        return $this->organizations;
    }

    public function isPersonal()
    {
        return false;
    }

    /**
     * ex. "Mr John DOE".
     *
     * @return string
     */
    public function getFulltextName()
    {
        if (!$this->isIndividual()) {
            return $this->getName();
        }

        return sprintf('%s %s', $this->getFirstname(), $this->getLastName());
    }
}
