<?php

namespace UserBundle\Entity;

use Doctrine\ORM\Query\Expr\Base;
use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @var string
     *
     * @ORM\Column(name="First_name", type="string", length=255)
     */
    protected $firstName;

    /**
     * @var string
     *
     * @ORM\Column(name="Last_name", type="string", length=255)
     */
    protected $lastName;

    /**
     * @var int
     *
     * @ORM\Column(name="Tel", type="integer")
     */
    protected $tel;

    /**
     * @var string
     *
     * @ORM\Column(name="Address", type="string", length=255)
     */
    protected $address;

    /**
     * @var string
     *
     * @ORM\Column(name="Blood_type", type="string", length=255)
     */
    protected $bloodType;

    /**
     * @var string
     *
     * @ORM\Column(name="redeem", type="string", length=255, nullable=true)
     */
    protected $redeem;


    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param string $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return string
     */
    public function getBloodType()
    {
        return $this->bloodType;
    }

    /**
     * @param string $bloodType
     */
    public function setBloodType($bloodType)
    {
        $this->bloodType = $bloodType;
    }

    /**
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;
    }

    /**
     * @return int
     */
    public function getTel()
    {
        return $this->tel;
    }

    /**
     * @param int $tel
     */
    public function setTel($tel)
    {
        $this->tel = $tel;
    }

    /**
     * @return string
     */
    public function getRedeem()
    {
        return $this->redeem;
    }

    /**
     * @param string $redeem
     */
    public function setRedeem($redeem)
    {
        $this->redeem = $redeem;
    }
}

