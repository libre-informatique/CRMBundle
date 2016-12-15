<?php

namespace Librinfo\CRMBundle\Controller;

use Blast\CoreBundle\Controller\CRUDController;
use Librinfo\CRMBundle\Entity\City;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;


class CityAdminController extends CRUDController
{
    /**
     * Retrieve list of items for address autocomplete form fields.
     *
     * @param Request $request
     *
     * @return JsonResponse
     *
     * @see Sonata\AdminBundle\Controller\HelperController
     *
     * @throws AccessDeniedException
     */
    public function getAddressAutocompleteItemsAction(Request $request)
    {
        // check user permission
        if ( false === $this->admin->isGranted('LIST') ) 
            throw new AccessDeniedException();

        $em = $this->admin->getModelManager()->getEntityManager(City::class);
        $repo = $em->getRepository(City::class);

        $field = $request->query->get('field');
        $searchTerm = mb_strtoupper($request->query->get('q', ''));
        $page = (int) $request->query->get('_page', 1);
        $items_per_page = (int) $request->query->get('_per_page', 10);
        $country_code = $request->query->get('country_code', null);

        $results = $repo->getAddressAutocompleteItems($field, $searchTerm, $page, $items_per_page, $country_code);

        $items = $results['items'];
        
        foreach ( $items as $k => $item ) 
        {
            $format = $field == 'zip' ? '<strong>%s</strong> %s, %s' : '%s <strong>%s</strong>, %s';
            $label = sprintf($format, $item['zip'], $item['city'], $item['country_code']);
            $items[$k]['label'] = $label;
        }

        return new JsonResponse(array(
            'status' => 'OK',
            'more' => $page < $results['last_page'],
            'items' => $items,
        ));
    }

}

