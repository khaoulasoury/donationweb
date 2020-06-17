<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commandline
 *
 * @ORM\Table(name="commandline", indexes={@ORM\Index(name="khoukha", columns={"Id_Product"}), @ORM\Index(name="fkhaoula", columns={"Id_Command"})})
 * @ORM\Entity(repositoryClass="DonationBundle\Repository\CommandlineRepository")
 */
class Commandline
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_CommandLine", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idCommandline;
    /**
     * Get idCommandline.
     *
     * @return integer
     */
    public function getidCommandline()
    {
        return $this->idCommandline;
    }

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_liv", type="date", nullable=false)
     */
    private $dateLiv;
               /**
     * Get dateLiv.
     *
     * @return \DateTime
     */
    public function getdateLiv()
    {
        return $this->dateLiv;
    }

      /**
     * Set dateLiv.
     *
     * @param \DateTime $dateLiv
     *
     * @return Commandline
     */
    public function setdateLiv($dateLiv)
    {
        $this->dateLiv = $dateLiv;

        return $this;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="State_Command", type="string", length=255, nullable=false)
     */
    private $stateCommand;
               /**
     * Get stateCommand.
     *
     * @return string
     */
    public function getstateCommand()
    {
        return $this->stateCommand;
    }

      /**
     * Set stateCommand.
     *
     * @param string $stateCommand
     *
     * @return Commandline
     */
    public function setstateCommand($stateCommand)
    {
        $this->stateCommand = $stateCommand;

        return $this;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="Type_Command", type="string", length=255, nullable=false)
     */
    private $typeCommand;
               /**
     * Get typeCommand.
     *
     * @return string
     */
    public function gettypeCommand()
    {
        return $this->typeCommand;
    }

      /**
     * Set typeCommand.
     *
     * @param string $typeCommand
     *
     * @return Commandline
     */
    public function settypeCommand($typeCommand)
    {
        $this->typeCommand = $typeCommand;

        return $this;
    }

    /**
     * @var \Command
     *
     * @ORM\ManyToOne(targetEntity="Command")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Command", referencedColumnName="Id_Command")
     * })
     */
    private $idCommand;
    public function getidCommand(): ?Command
    {
        return $this->idCommand;
    }

    public function setidCommand(?Command $idCommand): self
    {
        $this->idCommand = $idCommand;

        return $this;
    }

    /**
     * @var \Product
     *
     * @ORM\ManyToOne(targetEntity="Product")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Product", referencedColumnName="Id_Product")
     * })
     */
    private $idProduct;
    public function getidProduct(): ?Product
    {
        return $this->idProduct;
    }

    public function setidProduct(?Product $idProduct): self
    {
        $this->idProduct = $idProduct;

        return $this;
    }


}

