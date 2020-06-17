<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * Action
 *
 * @ORM\Table(name="action", indexes={@ORM\Index(name="fk_Id_Association", columns={"Id_Association"})})
 * @ORM\Entity
 * @ORM\Entity(repositoryClass="DonationBundle\Repository\ActionRepository")
 * @Vich\Uploadable
 */
class Action
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Action", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAction;

    /**
     * @var string
     *
     * @ORM\Column(name="Name_Action", type="string", length=255, nullable=false)
     */
    private $nameAction;

    /**
     * @var string
     *
     * @ORM\Column(name="Date_Action", type="string", length=255, nullable=false)
     */
    private $dateAction;

    /**
     * @var string
     *
     * @ORM\Column(name="Location_Action", type="string", length=255, nullable=false)
     */
    private $locationAction;

    /**
     * @var integer
     *
     * @ORM\Column(name="NbV_Action", type="integer", nullable=false)
     */
    private $nbvAction;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255, nullable=false)
     */
    private $description;

    /**
     * @var integer
     *
     * @ORM\ManyToOne(targetEntity="Association")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_Association", referencedColumnName="Id_Association")
     * })
     */
    private $idAssociation;

    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="commentaire_file", fileNameProperty="imageName", size="imageSize")
     *
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string")
     *
     * @var string|null
     */
    private $imageName;

    /**
     * @return int
     */
    public function getIdAction()
    {
        return $this->idAction;
    }

    /**
     * @param int $idAction
     */
    public function setIdAction($idAction)
    {
        $this->idAction = $idAction;
    }

    /**
     * @return string
     */
    public function getNameAction()
    {
        return $this->nameAction;
    }

    /**
     * @param string $nameAction
     */
    public function setNameAction($nameAction)
    {
        $this->nameAction = $nameAction;
    }

    /**
     * @return string
     */
    public function getDateAction()
    {
        return $this->dateAction;
    }

    /**
     * @param string $dateAction
     */
    public function setDateAction($dateAction)
    {
        $this->dateAction = $dateAction;
    }

    /**
     * @return string
     */
    public function getLocationAction()
    {
        return $this->locationAction;
    }

    /**
     * @param string $locationAction
     */
    public function setLocationAction($locationAction)
    {
        $this->locationAction = $locationAction;
    }

    /**
     * @return int
     */
    public function getNbvAction()
    {
        return $this->nbvAction;
    }

    /**
     * @param int $nbvAction
     */
    public function setNbvAction($nbvAction)
    {
        $this->nbvAction = $nbvAction;
    }

    /**
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param string $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }

    /**
     * @return int
     */
    public function getIdAssociation()
    {
        return $this->idAssociation;
    }

    /**
     * @param int $idAssociation
     */
    public function setIdAssociation($idAssociation)
    {
        $this->idAssociation = $idAssociation;
    }


    /**
     * @param File $imageFile
     */
    public function setImageFile(File $imageFile = null)
    {
        $this->imageFile = $imageFile;

    }


    /**
     * @return File
     */
    public function getImageFile()
    {
        return $this->imageFile;
    }


    /**
     * @param string $imageName
     */
    public function setImageName($imageName)
    {
        $this->imageName = $imageName;
    }

    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->imageName;
    }

}

