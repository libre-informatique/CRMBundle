<?php

namespace Librinfo\CRMBundle\Entity;

use Librinfo\BaseEntitiesBundle\Entity\Traits\BaseEntity;

/**
 * Phone
 */
abstract class Phone
{
    use BaseEntity;

    /**
     * @var string
     */
    private $number;

    /**
     * @var string
     */
    private $phoneType;

    public function __toString()
    {
        $str = $this->number;
        if ( $this->phoneType )
            $str .= " (" . $this->phoneType . ")";
        return $str;
    }

    /**
     * Set number
     *
     * @param string $number
     *
     * @return Phone
     */
    public function setNumber($number)
    {
        $this->number = $number;

        return $this;
    }

    /**
     * Get number
     *
     * @return string
     */
    public function getNumber()
    {
        return $this->number;
    }

    /**
     * Set phoneType
     *
     * @param string $phoneType
     *
     * @return Phone
     */
    public function setPhoneType($phoneType)
    {
        $this->phoneType = $phoneType;

        return $this;
    }

    /**
     * Get phoneType
     *
     * @return string
     */
    public function getPhoneType()
    {
        return $this->phoneType;
    }

}
