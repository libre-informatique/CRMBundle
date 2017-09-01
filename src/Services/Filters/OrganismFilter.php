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

namespace Librinfo\CRMBundle\Services\Filters;

class OrganismFilter
{
    public function filterOnFullname($queryBuilder, $alias, $field, $value)
    {
        if (!isset($value['value'])) {
            return;
        }

        $queryBuilder->andWhere(
            $queryBuilder->expr()->orX(
                $queryBuilder->expr()->like('customer.firstname', ':value'),
                $queryBuilder->expr()->like('customer.lastname', ':value'),
                $queryBuilder->expr()->like('customer.name', ':value')
            )
        );
        $queryBuilder->setParameter('value', '%' . $value['value'] . '%');

        return true;
    }
}
