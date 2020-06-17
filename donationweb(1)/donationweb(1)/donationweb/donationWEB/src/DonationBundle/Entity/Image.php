<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Image
 *
 * @ORM\Table(name="image", indexes={@ORM\Index(name="fk_image", columns={"Id_view"})})
 * @ORM\Entity
 */
class Image
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_image", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idImage;

    /**
     * @var string
     *
     * @ORM\Column(name="Name", type="blob", nullable=false)
     */
    private $name;

    /**
     * @var \View
     *
     * @ORM\ManyToOne(targetEntity="View")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="Id_view", referencedColumnName="Id_view")
     * })
     */
    private $idView;


}

