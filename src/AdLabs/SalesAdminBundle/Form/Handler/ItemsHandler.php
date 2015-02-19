<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 2/10/15
 * Time: 5:28 PM
 */

namespace AdLabs\SalesAdminBundle\Form\Handler;

use Symfony\Component\Form\FormInterface;
use Symfony\Component\HttpFoundation\Request;
use Doctrine\Common\Persistence\ObjectManager;
use AdLabs\SalesAdminBundle\Entity\Items;

/**
 * Class ItemsHandler
 *
 * @package AdLabs\SalesAdminBundle\Form\Handler
 */
class ItemsHandler
{
    /**
     * Form service interface
     *
     * @var FormInterface
     */
    protected $form;

    /**
     * Request object service
     *
     * @var Request
     */
    protected $request;

    /**
     * Object manager
     *
     * @var ObjectManager
     */
    protected $manager;

    /**
     * Create object manager
     *
     * @param FormInterface $form
     * @param Request       $request
     * @param ObjectManager $objectManager
     */
    public function __construct(FormInterface $form, Request $request, ObjectManager $objectManager)
    {
        $this->form = $form;
        $this->request = $request;
        $this->manager = $objectManager;
    }

    /**
     * Process
     *
     * @param Items $item
     *
     * @return bool
     */
    public function process(Items $item)
    {
        $this->form->setData($item);

        if (!in_array($this->request->getMethod(), array('POST', 'PUT'))) return false;

        $this->form->submit($this->request);

        if (!$this->form->isValid()) return false;

        $this->onSuccess($item);

        return true;
    }

    /**
     * On Success
     *
     * @param Items $item
     */
    protected function onSuccess(Items $item)
    {
        $this->manager->persist($item);
        $this->manager->flush();
    }
}