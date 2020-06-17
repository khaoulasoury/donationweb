<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Users
 *
 * @ORM\Table(name="users", uniqueConstraints={@ORM\UniqueConstraint(name="Login_user", columns={"Login_user"}), @ORM\UniqueConstraint(name="Tel", columns={"Tel"})})
 * @ORM\Entity
 */
class Users
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_user", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idUser;

    /**
     * @var string
     *
     * @ORM\Column(name="Login_user", type="string", length=255, nullable=false)
     */
    private $loginUser;

    /**
     * @var string
     *
     * @ORM\Column(name="Password_user", type="string", length=255, nullable=false)
     */
    private $passwordUser;

    /**
     * @var string
     *
     * @ORM\Column(name="First_name", type="string", length=255, nullable=false)
     */
    private $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="Last_name", type="string", length=255, nullable=false)
     */
    private $lastName;

    /**
     * @var integer
     *
     * @ORM\Column(name="Tel", type="integer", nullable=false)
     */
    private $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="Address", type="string", length=255, nullable=false)
     */
    private $address;

    /**
     * @var string
     *
     * @ORM\Column(name="Blood_type", type="string", length=255, nullable=true)
     */
    private $bloodType;

    /**
     * @var string
     *
     * @ORM\Column(name="redeem", type="string", length=250, nullable=true)
     */
    private $redeem;

    /**
     * @var integer
     *
     * @ORM\Column(name="role", type="integer", nullable=false)
     */
    private $role = '0';


}

