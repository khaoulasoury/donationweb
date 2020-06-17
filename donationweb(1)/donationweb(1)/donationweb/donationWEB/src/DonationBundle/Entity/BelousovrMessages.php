<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * BelousovrMessages
 *
 * @ORM\Table(name="belousovr_messages", indexes={@ORM\Index(name="IDX_4E4EB37BF675F31B", columns={"author_id"}), @ORM\Index(name="IDX_4E4EB37B2261B4C3", columns={"addressee_id"}), @ORM\Index(name="idDon", columns={"idDon"})})
 * @ORM\Entity
 */
class BelousovrMessages
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="messageText", type="string", length=1000, nullable=false)
     */
    private $messagetext;

    /**
     * @var boolean
     *
     * @ORM\Column(name="reading", type="boolean", nullable=false)
     */
    private $reading;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="addressee_id", referencedColumnName="id")
     * })
     */
    private $addressee;

    /**
     * @var \FosUser
     *
     * @ORM\ManyToOne(targetEntity="FosUser")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="author_id", referencedColumnName="id")
     * })
     */
    private $author;

    /**
     * @var \AppelsDon
     *
     * @ORM\ManyToOne(targetEntity="AppelsDon")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="idDon", referencedColumnName="id")
     * })
     */
    private $iddon;


}

