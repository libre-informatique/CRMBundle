<?php

namespace Librinfo\CRMBundle\Entity\Traits;

use Librinfo\CRMBundle\Entity\Circle;

/**
 * Circlable trait
 */
trait Circlable
{
    /**
     * @var Collection
     */
    private $circles;

    /**
     * This function is called by the owning side (Circle::addContact) of the N-N relationship
     * @param \Librinfo\CRMBundle\Entity\Circle $circle
     * @return Contact
     */
    public function addCircle(Circle $circle)
    {
        $this->circles->add($circle);
        return $this;
    }

    /**
     * @param Circle $circle
     * @return Contact
     */
    public function removeCircle(Circle $circle)
    {
        $this->circles->removeElement($circle);
        return $this;
    }

    /**
     * @return Collection
     */
    public function getCircles()
    {
        return $this->circles;
    }

}
