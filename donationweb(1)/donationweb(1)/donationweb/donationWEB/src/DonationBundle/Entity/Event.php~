<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Event
 *
 * @ORM\Table(name="event")
 * @ORM\Entity(repositoryClass="DonationBundle\Repository\EventRepository")
 */
class Event
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_ev", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idEv;

    /**
     * @var string
     *
     * @ORM\Column(name="Name_ev", type="string", length=255, nullable=true)
     * @Assert\Length(min=1, minMessage="Event's Name Is Too Short", max=50, maxMessage="Event's Name Is Too Long")
     */
    private $nameEv;

    /**
     * @var float
     *
     * @ORM\Column(name="location_x", type="float", precision=10, scale=0, nullable=true)
     */
    private $locationX;

    /**
     * @var float
     *
     * @ORM\Column(name="location_y", type="float", precision=10, scale=0, nullable=true)
     */
    private $locationY;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_ev", type="datetime", nullable=true)
     * @Assert\DateTime
     * @Assert\GreaterThan(value="+1 hour", message="Event's Start Date Should Be A Future Date")
     */
    private $dateEv;

    /**
     * @var string
     *
     * @ORM\Column(name="Description_ev", type="text", length=65535, nullable=true)
     * @Assert\Length(min=1, minMessage="Event's Description Is Too Short", max=255, maxMessage="Event's Description Is Too Long")
     */
    private $descriptionEv;

    /**
     * @var string
     *
     * @ORM\Column(name="Equipement_ev", type="text", length=16777215, nullable=true)
     * @Assert\NotBlank(message="An Event Should Have An Equipement")
     */
    private $equipementEv;

    /**
     * @var string
     *
     * @ORM\Column(name="Poster", type="string", length=255, nullable=true)
     */
    private $poster;

    /**
     * @var string
     *
     * @ORM\Column(name="Type_ev", type="string", length=255, nullable=true)
     * @Assert\NotBlank(message="An Event Should Have A Type")
     */
    private $typeEv;

    /**
     * @return int
     */
    public function getIdEv()
    {
        return $this->idEv;
    }

    /**
     * @param int $idEv
     */
    public function setIdEv($idEv)
    {
        $this->idEv = $idEv;
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
     * @return float
     */
    public function getLocationX()
    {
        return $this->locationX;
    }

    /**
     * @param float $locationX
     */
    public function setLocationX($locationX)
    {
        $this->locationX = $locationX;
    }

    /**
     * @return float
     */
    public function getLocationY()
    {
        return $this->locationY;
    }

    /**
     * @param float $locationY
     */
    public function setLocationY($locationY)
    {
        $this->locationY = $locationY;
    }

    /**
     * @return \DateTime
     */
    public function getDateEv()
    {
        return $this->dateEv;
    }

    /**
     * @param \DateTime $dateEv
     */
    public function setDateEv($dateEv)
    {
        $this->dateEv = $dateEv;
    }

    /**
     * @return string
     */
    public function getDescriptionEv()
    {
        return $this->descriptionEv;
    }

    /**
     * @param string $descriptionEv
     */
    public function setDescriptionEv($descriptionEv)
    {
        $this->descriptionEv = $descriptionEv;
    }

    /**
     * @return string
     */
    public function getEquipementEv()
    {
        return $this->equipementEv;
    }

    /**
     * @param string $equipementEv
     */
    public function setEquipementEv($equipementEv)
    {
        $this->equipementEv = $equipementEv;
    }

    /**
     * @return string
     */
    public function getPoster()
    {
        return $this->poster;
    }

    /**
     * @param string $poster
     */
    public function setPoster($poster)
    {
        $this->poster = $poster;
    }

    /**
     * @return string
     */
    public function getTypeEv()
    {
        return $this->typeEv;
    }

    /**
     * @param string $typeEv
     */
    public function setTypeEv($typeEv)
    {
        $this->typeEv = $typeEv;
    }

    public function __toString()
    {
        return $this->nameEv;

    }

}

