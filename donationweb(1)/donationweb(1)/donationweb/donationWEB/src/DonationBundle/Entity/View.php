<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * View
 *
 * @ORM\Table(name="view", indexes={@ORM\Index(name="fk_Id_user", columns={"Id_user"})})
 * @ORM\Entity
 */
class View
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_view", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idView;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="Text", type="string", length=255, nullable=false)
     */
    private $text;


}

