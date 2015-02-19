<?php
/**
 * Created by PhpStorm.
 * User: kostya
 * Date: 2/10/15
 * Time: 5:28 PM
 */

namespace AdLabs\SalesAdminBundle\Form\Type;

use Oro\Bundle\SoapBundle\Form\EventListener\PatchSubscriber;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

/**
 * Class ItemsTypeApi
 *
 * @package AdLabs\SalesAdminBundle\Form\Type
 */
class ItemsTypeApi extends ItemsType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        parent::buildForm($builder, $options);
        $builder->addEventSubscriber(new PatchSubscriber());
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(
            array(
                'data_class' => 'AdLabs\SalesAdminBundle\Entity\Itemsl',
                'intention'  => 'items',
                'csrf_protection' => false,
            )
        );
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return "sales_admin_items_api";
    }

}