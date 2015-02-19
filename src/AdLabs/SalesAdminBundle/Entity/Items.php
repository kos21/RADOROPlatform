<?php

namespace AdLabs\SalesAdminBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Items
 */
class Items
{
    /**
     * @var integer
     */
    private $id;

    /**
     * @var string
     */
    private $name;

    /**
     * @var string
     */
    private $brand;

    /**
     * @var \DateTime
     */
    private $createdAt;

    /**
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     */
    private $catalogues;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->catalogues = new \Doctrine\Common\Collections\ArrayCollection();
    }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return Items
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

    /**
     * Set brand
     *
     * @param string $brand
     * @return Items
     */
    public function setBrand($brand)
    {
        $this->brand = $brand;

        return $this;
    }

    /**
     * Get brand
     *
     * @return string 
     */
    public function getBrand()
    {
        return $this->brand;
    }

    /**
     * Set createdAt
     *
     * @param \DateTime $createdAt
     * @return Items
     */
    public function setCreatedAt($createdAt)
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * Get createdAt
     *
     * @return \DateTime 
     */
    public function getCreatedAt()
    {
        return $this->createdAt;
    }

    /**
     * Set updatedAt
     *
     * @param \DateTime $updatedAt
     * @return Items
     */
    public function setUpdatedAt($updatedAt)
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * Get updatedAt
     *
     * @return \DateTime 
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * Add catalogues
     *
     * @param \AdLabs\SalesAdminBundle\Entity\Catalogues $catalogues
     * @return Items
     */
    public function addCatalogue(\AdLabs\SalesAdminBundle\Entity\Catalogues $catalogues)
    {
        $this->catalogues[] = $catalogues;

        return $this;
    }

    /**
     * Remove catalogues
     *
     * @param \AdLabs\SalesAdminBundle\Entity\Catalogues $catalogues
     */
    public function removeCatalogue(\AdLabs\SalesAdminBundle\Entity\Catalogues $catalogues)
    {
        $this->catalogues->removeElement($catalogues);
    }

    /**
     * Get catalogues
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCatalogues()
    {
        return $this->catalogues;
    }
}
