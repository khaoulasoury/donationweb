<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * Association
 *
 * @ORM\Table(name="association")
 * @ORM\Entity
 * @Vich\Uploadable
 */
class Association
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Association", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAssociation;

    /**
     * @var string
     *
     * @ORM\Column(name="Nom_Association", type="string", length=255, nullable=false)
     *
     * @Assert\NotBlank()
     * @Assert\Type("string")
     */
    private $nomAssociation;

    /**
     * @var string
     *
     * @ORM\Column(name="Objectif_Association", type="string", length=255, nullable=false)
     *@Assert\NotBlank()
     */
    private $objectifAssociation;

    /**
     * @var string
     *
     * @ORM\Column(name="Email_Association", type="string", length=255, nullable=false)
     * @Assert\Email()
     * @Assert\NotBlank()
     */
    private $emailAssociation;

    /**
     * @var string
     *
     * @ORM\Column(name="Password_Association", type="string", length=255, nullable=false)
     *@Assert\NotBlank()
     *@Assert\Length(min=4)
     */
    private $passwordAssociation;

    /**
     * @var string
     *
     * @ORM\Column(name="Address_Association", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $addressAssociation;

    /**
     * @var string
     *
     *
     * @ORM\Column(name="Type_Association", type="string", length=255, nullable=false)
     * @Assert\Type("string")
     * @Assert\NotBlank()
     */
    private $typeAssociation;

    /**
     * @var string
     *
     * @ORM\Column(name="Description_Association", type="string", length=255, nullable=false)
     * @Assert\NotBlank()
     */
    private $descriptionAssociation;


    /**
     * NOTE: This is not a mapped field of entity metadata, just a simple property.
     *
     * @Vich\UploadableField(mapping="commentaire_file", fileNameProperty="imageName", size="imageSize")
     * @Assert\NotBlank()
     * @var File|null
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string")
     *
     *
     * @var string|null
     */
    private $imageName;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_inscrit", type="datetime", nullable=false)
     */
    private $dateInscrit = 'CURRENT_TIMESTAMP';

    /**
     * @var string
     *
     * @ORM\Column(name="redeem", type="string", length=255, nullable=true)
     */
    private $redeem;

    /**
     * @return int
     */
    public function getIdAssociation()
    {
        return $this->idAssociation;
    }


    /**
     * @return string
     */
    public function getNomAssociation()
    {
        return $this->nomAssociation;
    }

    /**
     * @param string $nomAssociation
     */
    public function setNomAssociation($nomAssociation)
    {
        $this->nomAssociation = $nomAssociation;
    }

    /**
     * @return string
     */
    public function getObjectifAssociation()
    {
        return $this->objectifAssociation;
    }

    /**
     * @param string $objectifAssociation
     */
    public function setObjectifAssociation($objectifAssociation)
    {
        $this->objectifAssociation = $objectifAssociation;
    }

    /**
     * @return string
     */
    public function getEmailAssociation()
    {
        return $this->emailAssociation;
    }

    /**
     * @param string $emailAssociation
     */
    public function setEmailAssociation($emailAssociation)
    {
        $this->emailAssociation = $emailAssociation;
    }

    /**
     * @return string
     */
    public function getPasswordAssociation()
    {
        return $this->passwordAssociation;
    }

    /**
     * @param string $passwordAssociation
     */
    public function setPasswordAssociation($passwordAssociation)
    {
        $this->passwordAssociation = $passwordAssociation;
    }

    /**
     * @return string
     */
    public function getAddressAssociation()
    {
        return $this->addressAssociation;
    }

    /**
     * @param string $addressAssociation
     */
    public function setAddressAssociation($addressAssociation)
    {
        $this->addressAssociation = $addressAssociation;
    }

    /**
     * @return string
     */
    public function getTypeAssociation()
    {
        return $this->typeAssociation;
    }

    /**
     * @param string $typeAssociation
     */
    public function setTypeAssociation($typeAssociation)
    {
        $this->typeAssociation = $typeAssociation;
    }

    /**
     * @return string
     */
    public function getDescriptionAssociation()
    {
        return $this->descriptionAssociation;
    }

    /**
     * @param string $descriptionAssociation
     */
    public function setDescriptionAssociation($descriptionAssociation)
    {
        $this->descriptionAssociation = $descriptionAssociation;
    }


    /**
     * @return \DateTime
     */
    public function getDateInscrit()
    {
        return $this->dateInscrit;
    }

    /**
     * @param \DateTime $dateInscrit
     */
    public function setDateInscrit($dateInscrit)
    {
        $this->dateInscrit = $dateInscrit;
    }

    /**
     * @return string
     */
    public function getRedeem()
    {
        return $this->redeem;
    }

    /**
     * @param string $redeem
     */
    public function setRedeem($redeem)
    {
        $this->redeem = $redeem;
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

