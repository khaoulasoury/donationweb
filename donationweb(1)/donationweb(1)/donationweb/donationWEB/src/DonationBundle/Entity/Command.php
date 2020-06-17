<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Command
 *
 * @ORM\Table(name="command", indexes={@ORM\Index(name="fk_productc", columns={"Id_Product"}) , @ORM\Index(name="fk_Id_user", columns={"user"})})
 * @ORM\Entity(repositoryClass="DonationBundle\Repository\CommandRepository")
 */
class Command
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Command", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommand;
      /**
     * Get idCommand.
     *
     * @return integer
     */
    public function getidCommand()
    {
        return $this->idCommand;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Product", type="integer", nullable=false)
     */
    private $idProduct;
        /**
     * Get idProduct.
     *
     * @return integer
     */
    public function getidProduct()
    {
        return $this->idProduct;
    }

      /**
     * Set idProduct.
     *
     * @param integer $idProduct
     *
     * @return Command
     */
    public function setidProduct($idProduct)
    {
        $this->idProduct = $idProduct;

        return $this;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="Quantity_Product", type="integer", nullable=false)
     */
    private $quantityProduct;
         /**
     * Get quantityProduct.
     *
     * @return integer
     */
    public function getquantityProduct()
    {
        return $this->quantityProduct;
    }

      /**
     * Set quantityProduct.
     *
     * @param integer $quantityProduct
     *
     * @return Command
     */
    public function setquantityProduct($quantityProduct)
    {
        $this->quantityProduct = $quantityProduct;

        return $this;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="Paid", type="integer", nullable=false)
     */
    private $paid;
             /**
     * Get paid.
     *
     * @return integer
     */
    public function getpaid()
    {
        return $this->paid;
    }

      /**
     * Set paid.
     *
     * @param integer $paid
     *
     * @return Command
     */
    public function setpaid($paid)
    {
        $this->paid = $paid;

        return $this;
    }

    

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_Command", type="date", nullable=false)
     */
    private $dateCommand;
             /**
     * Get dateCommand.
     *
     * @return \DateTime
     */
    public function getdateCommand()
    {
        return $this->dateCommand;
    }

      /**
     * Set dateCommand.
     *
     * @param \DateTime $dateCommand
     *
     * @return Command
     */
    public function setdateCommand($dateCommand)
    {
        $this->dateCommand = $dateCommand;

        return $this;
    }

    
    /**
     * @var \UserBundle\Entity\User
     *
     * @ORM\ManyToOne(targetEntity="UserBundle\Entity\User")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="user", referencedColumnName="id")
     * })
     */
    private $user;
    public function getUser(): ?\UserBundle\Entity\User
    {
        return $this->user;
    }

    public function setuser(?\UserBundle\Entity\User $user): self
    {
        $this->user = $user;

        return $this;
    }


}

