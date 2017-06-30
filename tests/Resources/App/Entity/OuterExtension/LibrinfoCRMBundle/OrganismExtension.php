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

use Librinfo\EcommerceBundle\Entity\OuterExtension\HasCustomerConstructor;
use Sylius\Component\Core\Model\AddressInterface;
use Sylius\Component\Core\Model\ShopUserInterface;
use Sylius\Component\Customer\Model\CustomerGroupInterface;
use Sylius\Component\Customer\Model\CustomerInterface;
use Sylius\Component\Resource\Model\ToggleableTrait;
use Sylius\Component\User\Model\UserInterface;
use Sylius\Component\User\Model\UserOAuthInterface;
trait OrganismExtension
{
    use ToggleableTrait, HasCustomerConstructor;
    /**
     * @var string
     */
    protected $username;
    /**
     * Normalized representation of a username.
     *
     * @var string
     */
    protected $usernameCanonical;
    /**
     * Random data that is used as an additional input to a function that hashes a password.
     *
     * @var string
     */
    protected $salt;
    /**
     * Encrypted password. Must be persisted.
     *
     * @var string
     */
    protected $password;
    /**
     * Password before encryption. Used for model validation. Must not be persisted.
     *
     * @var string
     */
    protected $plainPassword;
    /**
     * @var \DateTime
     */
    protected $lastLogin;
    /**
     * Random string sent to the user email address in order to verify it
     *
     * @var string
     */
    protected $emailVerificationToken;
    /**
     * Random string sent to the user email address in order to verify the password resetting request
     *
     * @var string
     */
    protected $passwordResetToken;
    /**
     * @var \DateTime
     */
    protected $passwordRequestedAt;
    /**
     * @var \DateTime
     */
    protected $verifiedAt;
    /**
     * @var bool
     */
    protected $locked = false;
    /**
     * @var \DateTime
     */
    protected $expiresAt;
    /**
     * @var \DateTime
     */
    protected $credentialsExpireAt;
    /**
     * We need at least one role to be able to authenticate
     *
     * @var array
     */
    protected $roles = [UserInterface::DEFAULT_ROLE];
    /**
     * @var Collection|UserOAuth[]
     */
    protected $oauthAccounts;
    /**
     * @var string
     */
    protected $emailCanonical;
    /**
     * @var CustomerInterface
     */
    protected $customer;
    /**
     * @var string
     */
    protected $firstName;
    /**
     * @var string
     */
    protected $lastName;
    /**
     * @var \DateTime
     */
    protected $birthday;
    /**
     * @var string
     */
    protected $gender = CustomerInterface::UNKNOWN_GENDER;
    /**
     * @var CustomerGroupInterface
     */
    protected $group;
    /**
     * @var string
     */
    protected $phoneNumber;
    /**
     * @var bool
     */
    protected $subscribedToNewsletter = false;
    /**
     * @var Collection|OrderInterface[]
     */
    protected $orders;
    /**
     * @var ShopUserInterface
     */
    protected $user;
   /**
     * @var AddressInterface
     */
    protected $defaultAddress;
    /**
     * @var Collection|AddressInterface[]
     */
    protected $addresses;
    /**
     * {@inheritdoc}
     */
    public function getUsername()
    {
        return $this->username;
    }
    /**
     * {@inheritdoc}
     */
    public function setUsername($username)
    {
        $this->username = $username;
    }
    /**
     * {@inheritdoc}
     */
    public function getUsernameCanonical()
    {
        return $this->usernameCanonical;
    }
    /**
     * {@inheritdoc}
     */
    public function setUsernameCanonical($usernameCanonical)
    {
        $this->usernameCanonical = $usernameCanonical;
    }
    /**
     * {@inheritdoc}
     */
    public function getSalt()
    {
        return $this->salt;
    }
    /**
     * {@inheritdoc}
     */
    public function getPlainPassword()
    {
        return $this->plainPassword;
    }
    /**
     * {@inheritdoc}
     */
    public function setPlainPassword($password)
    {
        $this->plainPassword = $password;
    }
    /**
     * {@inheritdoc}
     */
    public function getPassword()
    {
        return $this->password;
    }
    /**
     * {@inheritdoc}
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }
    /**
     * {@inheritdoc}
     */
    public function getExpiresAt()
    {
        return $this->expiresAt;
    }
    /**
     * @param \DateTime $date
     */
    public function setExpiresAt(\DateTime $date = null)
    {
        $this->expiresAt = $date;
    }
    /**
     * {@inheritdoc}
     */
    public function getCredentialsExpireAt()
    {
        return $this->credentialsExpireAt;
    }
    /**
     * {@inheritdoc}
     */
    public function setCredentialsExpireAt(\DateTime $date = null)
    {
        $this->credentialsExpireAt = $date;
    }
    /**
     * {@inheritdoc}
     */
    public function getLastLogin()
    {
        return $this->lastLogin;
    }
    /**
     * {@inheritdoc}
     */
    public function setLastLogin(\DateTime $time = null)
    {
        $this->lastLogin = $time;
    }
    /**
     * {@inheritdoc}
     */
    public function getEmailVerificationToken()
    {
        return $this->emailVerificationToken;
    }
    /**
     * {@inheritdoc}
     */
    public function setEmailVerificationToken($verificationToken)
    {
        $this->emailVerificationToken = $verificationToken;
    }
    /**
     * {@inheritdoc}
     */
    public function getPasswordResetToken()
    {
        return $this->passwordResetToken;
    }
    /**
     * {@inheritdoc}
     */
    public function setPasswordResetToken($passwordResetToken)
    {
        $this->passwordResetToken = $passwordResetToken;
    }
    /**
     * {@inheritdoc}
     */
    public function isCredentialsNonExpired()
    {
        return !$this->hasExpired($this->credentialsExpireAt);
    }
    /**
     * {@inheritdoc}
     */
    public function isAccountNonExpired()
    {
        return !$this->hasExpired($this->expiresAt);
    }
    /**
     * {@inheritdoc}
     */
    public function setLocked($locked)
    {
        $this->locked = $locked;
    }
    /**
     * {@inheritdoc}
     */
    public function isAccountNonLocked()
    {
        return !$this->locked;
    }
    /**
     * {@inheritdoc}
     */
    public function hasRole($role)
    {
        return in_array(strtoupper($role), $this->getRoles(), true);
    }
    /**
     * {@inheritdoc}
     */
    public function addRole($role)
    {
        $role = strtoupper($role);
        if (!in_array($role, $this->roles, true)) {
            $this->roles[] = $role;
        }
    }
    /**
     * {@inheritdoc}
     */
    public function removeRole($role)
    {
        if (false !== $key = array_search(strtoupper($role), $this->roles, true)) {
            unset($this->roles[$key]);
            $this->roles = array_values($this->roles);
        }
    }
    /**
     * {@inheritdoc}
     */
    public function getRoles()
    {
        return $this->roles;
    }
    /**
     * {@inheritdoc}
     */
    public function isPasswordRequestNonExpired(\DateInterval $ttl)
    {
        return null !== $this->passwordRequestedAt && new \DateTime() <= $this->passwordRequestedAt->add($ttl);
    }
    /**
     * {@inheritdoc}
     */
    public function getPasswordRequestedAt()
    {
        return $this->passwordRequestedAt;
    }
    /**
     * {@inheritdoc}
     */
    public function setPasswordRequestedAt(\DateTime $date = null)
    {
        $this->passwordRequestedAt = $date;
    }
    /**
     * {@inheritdoc}
     */
    public function isVerified()
    {
        return null !== $this->verifiedAt;
    }
    /**
     * {@inheritdoc}
     */
    public function getVerifiedAt()
    {
        return $this->verifiedAt;
    }
    /**
     * {@inheritdoc}
     */
    public function setVerifiedAt(\DateTime $verifiedAt = null)
    {
        $this->verifiedAt = $verifiedAt;
    }
    /**
     * {@inheritdoc}
     */
    public function eraseCredentials()
    {
        $this->plainPassword = null;
    }
    /**
     * {@inheritdoc}
     */
    public function getOAuthAccounts()
    {
        return $this->oauthAccounts;
    }
    /**
     * {@inheritdoc}
     */
    public function getOAuthAccount($provider)
    {
        if ($this->oauthAccounts->isEmpty()) {
            return null;
        }
        $filtered = $this->oauthAccounts->filter(function (UserOAuthInterface $oauth) use ($provider) {
            return $provider === $oauth->getProvider();
        });
        if ($filtered->isEmpty()) {
            return null;
        }
        return $filtered->current();
    }
    /**
     * {@inheritdoc}
     */
    public function addOAuthAccount(UserOAuthInterface $oauth)
    {
        if (!$this->oauthAccounts->contains($oauth)) {
            $this->oauthAccounts->add($oauth);
            $oauth->setUser($this);
        }
    }
    /**
     * The serialized data have to contain the fields used by the equals method and the username.
     *
     * @return string
     */
    public function serialize()
    {
        return serialize([
            $this->password,
            $this->salt,
            $this->usernameCanonical,
            $this->username,
            $this->locked,
            $this->enabled,
            $this->id,
        ]);
    }
    /**
     * @param string $serialized
     */
    public function unserialize($serialized)
    {
        $data = unserialize($serialized);
        // add a few extra elements in the array to ensure that we have enough keys when unserializing
        // older data which does not include all properties.
        $data = array_merge($data, array_fill(0, 2, null));
        list(
            $this->password,
            $this->salt,
            $this->usernameCanonical,
            $this->username,
            $this->locked,
            $this->enabled,
            $this->id
        ) = $data;
    }
    /**
     * @param \DateTime $date
     *
     * @return bool
     */
    protected function hasExpired(\DateTime $date = null)
    {
        return null !== $date && new \DateTime() >= $date;
    }
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
        if ($this->customer !== $customer) {
            $this->customer = $customer;
            $this->assignUser($customer);
        }
    }
    /**
     * @param CustomerInterface $customer
     */
    protected function assignUser(CustomerInterface $customer = null)
    {
        if (null !== $customer) {
            $customer->setUser($this);
        }
    }
    /**
     * {@inheritdoc}
     */
    public function getOrders()
    {
        return $this->orders;
    }
    /**
     * {@inheritdoc}
     */
    public function getUser()
    {
        return $this->user;
    }
    /**
     * {@inheritdoc}
     */
    public function setUser(UserInterface $user = null)
    {
        if ($this->user !== $user) {
            $this->user = $user;
            $this->assignCustomer($user);
        }
    }
    /**
     * {@inheritdoc}
     */
    public function hasUser()
    {
        return null !== $this->user;
    }
    /**
     * @param ShopUserInterface|null $user
     */
    protected function assignCustomer(ShopUserInterface $user = null)
    {
        if (null !== $user) {
            $user->setCustomer($this);
        }
    }
    /**
     * {@inheritdoc}
     */
    public function getEmailCanonical()
    {
        return $this->emailCanonical;
    }
    /**
     * {@inheritdoc}
     */
    public function setEmailCanonical($emailCanonical)
    {
        $this->emailCanonical = $emailCanonical;
    }
    /**
     * {@inheritdoc}
     */
    public function getFullName()
    {
        return trim(sprintf('%s %s', $this->firstName, $this->lastName));
    }
    /**
     * {@inheritdoc}
     */
    public function getFirstName()
    {
        return $this->firstName;
    }
    /**
     * {@inheritdoc}
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
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
     * {@inheritdoc}
     */
    public function getBirthday()
    {
        return $this->birthday;
    }
    /**
     * {@inheritdoc}
     */
    public function setBirthday(\DateTime $birthday = null)
    {
        $this->birthday = $birthday;
    }
    /**
     * {@inheritdoc}
     */
    public function getGender()
    {
        return $this->gender;
    }
    /**
     * {@inheritdoc}
     */
    public function setGender($gender)
    {
        $this->gender = $gender;
    }
    /**
     * {@inheritdoc}
     */
    public function isMale()
    {
        return CustomerInterface::MALE_GENDER === $this->gender;
    }
    /**
     * {@inheritdoc}
     */
    public function isFemale()
    {
        return CustomerInterface::FEMALE_GENDER === $this->gender;
    }
    /**
     * {@inheritdoc}
     */
    public function getGroup()
    {
        return $this->group;
    }
    /**
     * {@inheritdoc}
     */
    public function setGroup(CustomerGroupInterface $group = null)
    {
        $this->group = $group;
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
    public function isSubscribedToNewsletter()
    {
        return $this->subscribedToNewsletter;
    }
    /**
     * {@inheritdoc}
     */
    public function setSubscribedToNewsletter($subscribedToNewsletter)
    {
        $this->subscribedToNewsletter = $subscribedToNewsletter;
    }
    public function updateName()
    {
        $firstname = mb_convert_case($this->getFirstName(), MB_CASE_TITLE);
        $name = mb_strtoupper($this->getLastName());
        $this->setName(sprintf(
            '%s %s',
            $firstname,
            $name
        ));
    }
    /**
     * @return AddressInterface
     */
    public function getDefaultAddress()
    {
        return $this->defaultAddress;
    }
    /**
     * @param AddressInterface $defaultAddress
     * @return self
     */
    public function setDefaultAddress(AddressInterface $defaultAddress = null)
    {
        $this->defaultAddress = $defaultAddress;
        if (null !== $defaultAddress)
            $this->addAddress($defaultAddress);
        return $this;
    }
    /**
     * @param AddressInterface $address
     * @return self
     */
    public function addAddress(AddressInterface $address)
    {
        if (!$this->hasAddress($address))
        {
            $this->addresses->add($address);
            $address->setCustomer($this);
            if(!$this->getDefaultAddress())
                $this->setDefaultAddress($address);
        }
        return $this;
    }
    /**
     * @param AddressInterface $address
     * @return self
     */
    public function removeAddress(AddressInterface $address)
    {
        $this->addresses->removeElement($address);
        if( $address->getId() == $this->defaultAddress->getId())
        {
            if( $this->addresses->count() > 0 )
                $this->defaultAddress = $this->addresses[0];
            else
                $this->defaultAddress = null;
        }
        return $this;
    }
    /**
     *
     * @param AddressInterface $address
     * @return boolean
     */
    public function hasAddress(AddressInterface $address)
    {
        return $this->addresses->contains($address);
    }
    /**
     * @return Collection|AddressInterface[]
     */
    public function getAddresses()
    {
        return $this->addresses;
    }
}
