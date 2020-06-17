<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AppelsDon
 *
 * @ORM\Table(name="appels_don", indexes={@ORM\Index(name="IDX_D49243EA76ED395", columns={"user_id"})})
 * @ORM\Entity
 */
class AppelsDon
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
     * @var integer
     *
     * @ORM\Column(name="user_id", type="integer", nullable=true)
     */
    private $userId;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="image", type="string", length=400, nullable=false)
     */
    private $image;

    /**
     * @var string
     *
     * @ORM\Column(name="Category", type="string", length=255, nullable=false)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="text", nullable=false)
     */
    private $description;


}

