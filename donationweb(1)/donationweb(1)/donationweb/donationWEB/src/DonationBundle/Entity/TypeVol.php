<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * TypeVol
 *
 * @ORM\Table(name="type_vol")
 * @ORM\Entity
 */
class TypeVol
{
    /**
     * @var integer
     *
     * @ORM\Column(name="idTypeVol", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idtypevol;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=false)
     */
    private $type;


}

