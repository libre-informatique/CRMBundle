<?php

namespace Librinfo\CRMBundle\Admin;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Show\ShowMapper;
use Blast\CoreBundle\Admin\CoreAdmin;
use Blast\CoreBundle\Admin\Traits\Base as BaseAdmin;

class CircleAdmin extends CoreAdmin
{
   use BaseAdmin;

    /**
     * {@inheritdoc}
     */
    public function createQuery($context = 'list')
    {
        $query = parent::createQuery($context);

        $ra = $query->getRootAliases()[0];

        $query
                ->addSelect('users')
                ->leftJoin($ra . '.users', 'users')
        ;

        $config = $this->getConfigurationPool()->getContainer()->getParameter('librinfo_crm');
        if ( $config['Circle']['allow_organisms'] )
            $query
                ->addSelect('organisms')
                ->leftJoin($ra . '.organisms', 'organisms')
            ;
        if ( $config['Circle']['allow_contacts'] )
            $query
                ->addSelect('contacts')
                ->leftJoin($ra . '.contacts', 'contacts')
            ;
        if ( $config['Circle']['allow_positions'] )
            $query
                ->addSelect('positions')
                ->leftJoin($ra . '.positions', 'positions')
            ;

        $user = $this->getConfigurationPool()->getContainer()->get('security.context')->getToken()->getUser();
        if ( $user->hasRole('ROLE_SUPER_ADMIN') )
            return $query;

        // we add 3 conditions :
        // 1. the Circle has no Owner and no Users
        // 2. ... OR the current user is the Circle owner
        // 3. ... OR the current user belongs to the circle users

        $expr = $query->expr();

        // 1. the Circle has no Owner and no Users...
        $subquery1 = $query->getEntityManager()->createQueryBuilder()
            ->select('u1.id')
            ->from('Librinfo\CRMBundle\Entity\Circle', 'c1')
            ->join('c1.users', 'u1')
            ->where($expr->eq('c1', $ra));
        $dql1 = $expr->andX(
                $expr->isNull($ra . '.owner'), $expr->not($expr->exists($subquery1->getDql()))
        );

        // 2. the current user is the Circle owner
        $dql2 = $expr->eq($ra . ".owner", ':user2');

        // 3. the current user belongs to the circle users
        $subquery3 = $query->getEntityManager()->createQueryBuilder()
            ->select('c3.id')
            ->from('Librinfo\CRMBundle\Entity\Circle', 'c3')
            ->join('c3.users', 'u3')
            ->where($expr->eq('u3', ':user3'))
            ->andWhere($expr->eq('c3', $ra));
        $dql3 = $expr->exists($subquery3->getDql());

        $query->andWhere($expr->orX(
            $dql1, $dql2, $dql3
        ));
        $query->setParameter('user2', $user);
        $query->setParameter('user3', $user);

        return $query;
    }

    /**
     * @param ShowMapper $mapper
     */
    protected function configureShowFields(ShowMapper $mapper)
    {
        parent::configureShowFields($mapper);
        
        $config = $this->getConfigurationPool()->getContainer()->getParameter('librinfo_crm');
        if ( !$config['Circle']['allow_organisms'] )
            $mapper->remove('organismsCount');
        if ( !$config['Circle']['allow_contacts'] )
            $mapper->remove('contactsCount');
        if ( !$config['Circle']['allow_positions'] )
            $mapper->remove('positionsCount');
    }

    /**
     * @param ListMapper $mapper
     */
    protected function configureListFields(ListMapper $mapper)
    {
        parent::configureListFields($mapper);

        $config = $this->getConfigurationPool()->getContainer()->getParameter('librinfo_crm');
        if ( !$config['Circle']['allow_organisms'] )
            $mapper->remove('organismsCount');
        if ( !$config['Circle']['allow_contacts'] )
            $mapper->remove('contactsCount');
        if ( !$config['Circle']['allow_positions'] )
            $mapper->remove('positionsCount');
    }
}
