<?php

namespace DonationBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Admin
 *
 * @ORM\Table(name="admin", uniqueConstraints={@ORM\UniqueConstraint(name="Login_admin", columns={"Login_admin"})})
 *  @ORM\Entity(repositoryClass="DonationBundle\Repository\AdminRepository")
 */
class Admin
{
    /**
     * @var integer
     *
     * @ORM\Column(name="Id_admin", type="integer", nullable=false)
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="IDENTITY")
     */
    private $idAdmin;

    /**
     * @var string
     *
     * @ORM\Column(name="Login_admin", type="string", length=255, nullable=false)
     */
    private $loginAdmin;
      /**
     * Get loginAdmin.
     *
     * @return string
     */
    public function getloginAdmin()
    {
        return $this->loginAdmin;
    }

      /**
     * Set loginAdmin.
     *
     * @param String $loginAdmin
     *
     * @return Product
     */
    public function setloginAdmin($loginAdmin)
    {
        $this->loginAdmin = $loginAdmin;

        return $this;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="Password_admin", type="string", length=255, nullable=false)
     */
    private $passwordAdmin;
        /**
     * Get passwordAdmin.
     *
     * @return string
     */
    public function getpasswordAdmin()
    {
        return $this->passwordAdmin;
    }

      /**
     * Set passwordAdmin.
     *
     * @param String $passwordAdmin
     *
     * @return Product
     */
    public function setpasswordAdmin($passwordAdmin)
    {
        $this->passwordAdmin = $passwordAdmin;

        return $this;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="First_name", type="string", length=255, nullable=false)
     */
    private $firstName;
        /**
     * Get firstName.
     *
     * @return string
     */
    public function getfirstName()
    {
        return $this->firstName;
    }

      /**
     * Set firstName.
     *
     * @param String $firstName
     *
     * @return Product
     */
    public function setfirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @var string
     *
     * @ORM\Column(name="Last_name", type="string", length=255, nullable=false)
     */
    private $lastName;
        /**
     * Get lastName.
     *
     * @return string
     */
    public function getlastName()
    {
        return $this->lastName;
    }

      /**
     * Set lastName.
     *
     * @param String $lastName
     *
     * @return Product
     */
    public function setlastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @var integer
     *
     * @ORM\Column(name="session", type="integer", nullable=false)
     */
    private $session = '0';
        /**
     * Get session.
     *
     * @return integer
     */
    public function getsession()
    {
        return $this->session;
    }

      /**
     * Set session.
     *
     * @param integer $session
     *
     * @return Admin
     */
    public function setsession($session)
    {
        $this->session = $session;

        return $this;
    }


}

