<?php
/*
 * This file is part of the Blast Project package.
 *
 * Copyright (C) 2015-2017 Libre Informatique
 *
 * This file is licenced under the GNU GPL v3.
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace AppBundle\Entity\OuterExtension\LibrinfoCRMBundle;
use Sylius\Component\Customer\Model\CustomerInterface;
trait AddressExtension
{


      /**
       * @var string
       */
      protected $phoneNumber;
      /**
       * @var string
       */
      protected $company;
      /**
       * @var CustomerInterface
       */
      protected $customer;
      /**
       * {@inheritdoc}
       */
      public function getCustomer()
      {
          return $this->customer;
      }
      /**
       * {@inheritdoc}
       */
      public function setCustomer(CustomerInterface $customer = null)
      {
          $this->customer = $customer;
      }
      /**
       * {@inheritdoc}
       */
      public function getPhoneNumber()
      {
          return $this->phoneNumber;
      }
      /**
       * {@inheritdoc}
       */
      public function setPhoneNumber($phoneNumber)
      {
          $this->phoneNumber = $phoneNumber;
      }
      /**
       * {@inheritdoc}
       */
      public function getCompany()
      {
          return $this->company;
      }
      /**
       * {@inheritdoc}
       */
      public function setCompany($company)
      {
          $this->company = $company;
      }
      /**
       * @return string
       */
      public function getFullName()
      {
          return sprintf(
              '%s %s', $this->firstName, $this->lastName
          );
      }
}
