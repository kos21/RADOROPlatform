<?php

namespace AdLabs\SalesAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Catalogues
 */
class Catalogues
{
    /**
     * @var integer
     */
    private $cataloguesId;

    /**
     * @var string
     */
    private $name;


    /**
     * Get cataloguesId
     *
     * @return integer 
     */
    public function getCataloguesId()
    {
        return $this->cataloguesId;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Catalogues
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }
}
