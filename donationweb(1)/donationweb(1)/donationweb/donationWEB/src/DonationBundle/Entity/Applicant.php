<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Applicant
 *
 * @ORM\Table(name="applicant")
 * @ORM\Entity
 */
class Applicant
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Applicant", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idApplicant;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_dispo", type="date", nullable=false)
     */
    private $dateDispo;

    /**
     * @var string
     *
     * @ORM\Column(name="Location_Applicant", type="string", length=200, nullable=false)
     */
    private $locationApplicant;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=200, nullable=false)
     */
    private $description;


}

