<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Product
 *
 * @ORM\Table(name="product", indexes={@ORM\Index(name="fk_Id_associationp", columns={"Id_Association"}), @ORM\Index(name="fk_Id_admin", columns={"Id_admin"})})
 * @ORM\Entity(repositoryClass="DonationBundle\Repository\ProductRepository")
 */

class Product
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Product", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idProduct;
    public function getidProduct()
    {
        return $this->idProduct;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="Name_Product", type="string", length=255, nullable=false)
     */
    private $nameProduct;

    /**
     * Get nameProduct.
     *
     * @return string
     */
    public function getnameProduct()
    {
        return $this->nameProduct;
    }

      /**
     * Set nameProduct.
     *
     * @param String $nameProduct
     *
     * @return Product
     */
    public function setnameProduct($nameProduct)
    {
        $this->nameProduct = $nameProduct;

        return $this;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="Quantity_Total", type="integer", nullable=false)
     */
    private $quantityTotal;

        /**
     * Get nameProduct.
     *
     * @return int
     */
    public function getquantityTotal()
    {
        return $this->quantityTotal;
    }

      /**
     * Set quantityTotal.
     *
     * @param int $quantityTotal
     *
     * @return Product
     */
    public function setquantityTotal($quantityTotal)
    {
        $this->quantityTotal = $quantityTotal;

        return $this;
    }

    /**
     * @var float
     *
     * @ORM\Column(name="Price_Product", type="float", precision=10, scale=0, nullable=false)
     */
    private $priceProduct;
       /**
     * Get priceProduct.
     *
     * @return float
     */
    public function getpriceProduct()
    {
        return $this->priceProduct;
    }

      /**
     * Set priceProduct.
     *
     * @param float $priceProduct
     *
     * @return Product
     */
    public function setpriceProduct($priceProduct)
    {
        $this->priceProduct = $priceProduct;

        return $this;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="Description_Product", type="text", length=65535, nullable=false)
     */
    private $descriptionProduct;

      /**
     * Get descriptionProduct.
     *
     * @return text
     */
    public function getdescriptionProduct()
    {
        return $this->descriptionProduct;
    }

      /**
     * Set descriptionProduct.
     *
     * @param text $descriptionProduct
     *
     * @return Product
     */
    public function setdescriptionProduct($descriptionProduct)
    {
        $this->descriptionProduct = $descriptionProduct;

        return $this;
    }
    

    /**
     * @var integer
     *
     * @ORM\Column(name="Quantity_Remaining", type="integer", nullable=false)
     */
    private $quantityRemaining;

      /**
     * Get quantityRemaining.
     *
     * @return integr
     */
    public function getquantityRemaining()
    {
        return $this->quantityRemaining;
    }

      /**
     * Set quantityRemaining.
     *
     * @param integr $quantityRemaining
     *
     * @return Product
     */
    public function setquantityRemaining($quantityRemaining)
    {
        $this->quantityRemaining = $quantityRemaining;

        return $this;
    }

    /**
     * @var \Admin
     *
     * @ORM\ManyToOne(targetEntity="Admin")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_admin", referencedColumnName="Id_admin")
     * })
     */
    private $idAdmin;
    public function getidAdmin(): ?Admin
    {
        return $this->idAdmin;
    }

    public function setidAdmin(?Admin $idAdmin): self
    {
        $this->idAdmin = $idAdmin;

        return $this;
    }

    /**
     * @var \Association
     *
     * @ORM\ManyToOne(targetEntity="Association")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Association", referencedColumnName="Id_Association")
     * })
     */
    private $idAssociation;
    public function getidAssociation(): ?Association
    {
        return $this->idAssociation;
    }

    public function setidAssociation(?Association $idAssociation): self
    {
        $this->idAssociation = $idAssociation;

        return $this;
    }


}

