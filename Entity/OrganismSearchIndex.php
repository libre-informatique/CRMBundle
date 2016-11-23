<?php

namespace Librinfo\CRMBundle\Entity;

use Librinfo\BaseEntitiesBundle\Entity\SearchIndexEntity;

class OrganismSearchIndex extends SearchIndexEntity
{
    // TODO: this should go in the organism.orm.yml mapping file :
    //       find a way to override Doctrine ORM YamlDriver and ClassMetadata classes
    public static $fields = ['name', 'description', 'address', 'city', 'country', 'email', 'url'];
}
