<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Comment
 *
 * @ORM\Table(name="comment", indexes={@ORM\Index(name="fk_commentUser", columns={"Id_user"}), @ORM\Index(name="fk_commentView", columns={"Id_view"})})
 * @ORM\Entity
 */
class Comment
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_comment", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idComment;

    /**
     * @var string
     *
     * @ORM\Column(name="Text_comment", type="string", length=255, nullable=false)
     */
    private $textComment;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_user", type="integer", nullable=false)
     */
    private $idUser;

    /**
     * @var integer
     *
     * @ORM\Column(name="Id_view", type="integer", nullable=false)
     */
    private $idView;


}

