<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeMat
 *
 * @ORM\Table(name="type_mat")
 * @ORM\Entity
 */
class TypeMat
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTypeMat", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtypemat;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;


}

