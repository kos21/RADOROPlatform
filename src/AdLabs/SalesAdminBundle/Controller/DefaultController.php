<?php

namespace AdLabs\SalesAdminBundle\Controller;

use AdLabs\SalesAdminBundle\Entity\Items;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Oro\Bundle\SecurityBundle\Annotation\Acl;
use Oro\Bundle\SecurityBundle\Annotation\AclAncestor;
use Symfony\Component\HttpFoundation\Response;

class DefaultController extends Controller
{
    public function indexAction()
    {
        return $this->render('AdLabsSalesAdminBundle:Default:index.html.twig', array('name' => "dads"));
    }

    /**
     * @Route("/items/", name="items")
     * @Template()
     */
    public function itemsAction()
    {
        return array("name" => array("dadas" => array()));
    }

    /**
     * View action
     *
     * @Route("/view/{id}", name="items_view")
     * @Acl(
     *      id="items_view",
     *      type="entity",
     *      permission="VIEW",
     *      class="AdLabsSalesAdminBundle:Items"
     *  )
     * @Template("AdLabsSalesAdminBundle:Default:item.html.twig")
     */
    public function viewAction(Items $items)
    {
        return array(
            "entity" => $items
        );
    }

    /**
     * Update action
     *
     * @Route("/update/{id}", name="update_items")
     * @Acl(
     *      id="update_items",
     *      type="entity",
     *      permission="EDIT",
     *      class="AdLabsSalesAdminBundle:Items"
     *  )
     * @Template("AdLabsSalesAdminBundle:Default:test2.html.twig")
     *
     * @param Items $items
     *
     * @return array
     */
    public function updateAction(Items $items)
    {
        return $this->updateData($items);
    }

    /**
     * Update data
     *
     * @param Items $items
     *
     * @return array|\Symfony\Component\HttpFoundation\RedirectResponse
     */
    private function updateData(Items $items)
    {
        return $this->get("oro_form.model.update_handler")->handleUpdate(
            $items,
            $this->get("sales_admin.items.form"),
            function (Items $items) {
                return array(
                    'route' => 'orocrm_sales_opportunity_update',
                    'parameters' => array('id' => $items->getId())
                );
            },
            function (Items $items) {
                return array(
                    'route' => 'orocrm_sales_opportunity_view',
                    'parameters' => array('id' => $items->getId())
                );
            },
            "dadasadadasd",
            $this->get("sales_admin.items.form.handler")
        );
    }

    /**
     * Info action
     *
     * @Route("/info/{id}", name="info")
     * @Template("AdLabsSalesAdminBundle:Default:test.html.twig")
     * @AclAncestor("items_view")
     */
    public function infoAction(Items $items)
    {
        return array(
            "entity" => $items
        );
    }

    /**
     * Info action
     *
     * @Route("/sales/{id}", name="sales")
     * @Template("AdLabsSalesAdminBundle:Default:test.html.twig")
     * @AclAncestor("items_view")
     */
    public function salesAction(Items $items)
    {
        return array(
            "entity" => $items
        );
    }
}
