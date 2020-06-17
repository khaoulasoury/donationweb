<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Activity
 *
 * @ORM\Table(name="activity", indexes={@ORM\Index(name="yo", columns={"id_activity"})})
 * @ORM\Entity
 */
class Activity
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_ac", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAc;

    /**
     * @var string
     *
     * @ORM\Column(name="Name_ev", type="string", length=255, nullable=true)
     */
    private $nameEv;

    /**
     * @var string
     *
     * @ORM\Column(name="Name_ac", type="string", length=255, nullable=false)
     *
     */
    private $nameAc;

    /**
     * @var float
     *
     * @ORM\Column(name="Duration", type="float", precision=10, scale=0, nullable=false)
     */
    private $duration;

    /**
     * @var string
     *
     * @ORM\Column(name="Description_ac", type="text", length=65535, nullable=false)
     *
     */
    private $descriptionAc;

    /**
     * @var string
     *
     * @ORM\Column(name="Type_ac", type="string", length=255, nullable=false)
     * 
     */
    private $typeAc;

    /**
     * @return int
     */
    public function getIdAc()
    {
        return $this->idAc;
    }

    /**
     * @param int $idAc
     */
    public function setIdAc($idAc)
    {
        $this->idAc = $idAc;
    }

    /**
     * @return string
     */
    public function getNameEv()
    {
        return $this->nameEv;
    }

    /**
     * @param string $nameEv
     */
    public function setNameEv($nameEv)
    {
        $this->nameEv = $nameEv;
    }

    /**
     * @return string
     */
    public function getNameAc()
    {
        return $this->nameAc;
    }

    /**
     * @param string $nameAc
     */
    public function setNameAc($nameAc)
    {
        $this->nameAc = $nameAc;
    }

    /**
     * @return float
     */
    public function getDuration()
    {
        return $this->duration;
    }

    /**
     * @param float $duration
     */
    public function setDuration($duration)
    {
        $this->duration = $duration;
    }

    /**
     * @return string
     */
    public function getDescriptionAc()
    {
        return $this->descriptionAc;
    }

    /**
     * @param string $descriptionAc
     */
    public function setDescriptionAc($descriptionAc)
    {
        $this->descriptionAc = $descriptionAc;
    }

    /**
     * @return string
     */
    public function getTypeAc()
    {
        return $this->typeAc;
    }

    /**
     * @param string $typeAc
     */
    public function setTypeAc($typeAc)
    {
        $this->typeAc = $typeAc;
    }

    /**
     * @return \Event
     */
    public function getIdActivity()
    {
        return $this->idActivity;
    }

    /**
     * @param \Event $idActivity
     */
    public function setIdActivity($idActivity)
    {
        $this->idActivity = $idActivity;
    }

    /**
     * @var \Event
     *
     * @ORM\ManyToOne(targetEntity="Event")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="id_activity", referencedColumnName="Id_ev")
     * })
     */
    private $idActivity;


    public function __toString()
    {
        return $this->nameEv;
    }

}

