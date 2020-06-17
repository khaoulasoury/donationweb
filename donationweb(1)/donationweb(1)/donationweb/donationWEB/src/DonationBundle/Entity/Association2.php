<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Association2
 *
 * @ORM\Table(name="association2", uniqueConstraints={@ORM\UniqueConstraint(name="Email_Association", columns={"Email_Association"})})
 * @ORM\Entity
 */
class Association2
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
     */
    private $nomAssociation;

    /**
     * @var string
     *
     * @ORM\Column(name="Email_Association", type="string", length=255, nullable=false)
     */
    private $emailAssociation;

    /**
     * @var string
     *
     * @ORM\Column(name="Password_Association", type="string", length=255, nullable=false)
     */
    private $passwordAssociation;

    /**
     * @var string
     *
     * @ORM\Column(name="Address_Association", type="string", length=255, nullable=false)
     */
    private $addressAssociation;

    /**
     * @var string
     *
     * @ORM\Column(name="Type_Association", type="string", length=255, nullable=true)
     */
    private $typeAssociation;

    /**
     * @var string
     *
     * @ORM\Column(name="Object_Association", type="string", length=255, nullable=false)
     */
    private $objectAssociation;

    /**
     * @var string
     *
     * @ORM\Column(name="Description_Association", type="text", length=65535, nullable=false)
     */
    private $descriptionAssociation;

    /**
     * @var string
     *
     * @ORM\Column(name="redeem", type="string", length=255, nullable=true)
     */
    private $redeem;


}

