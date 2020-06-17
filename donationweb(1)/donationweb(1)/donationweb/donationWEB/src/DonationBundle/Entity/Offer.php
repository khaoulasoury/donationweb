<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Offer
 *
 * @ORM\Table(name="offer")
 * @ORM\Entity
 */
class Offer
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_Offer", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idOffer;

    /**
     * @var string
     *
     * @ORM\Column(name="post", type="string", length=200, nullable=false)
     */
    private $post;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=200, nullable=false)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=200, nullable=false)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="condition", type="string", length=255, nullable=false)
     */
    private $condition;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="Date_ajout", type="date", nullable=true)
     */
    private $dateAjout;


}

