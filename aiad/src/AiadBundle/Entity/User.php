<?php

namespace AiadBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\Role\Role;
use Symfony\Component\Security\Core\User\UserInterface;
use AiadBundle\Repository\UsersRepository;
/**
 * User
 *
 * @ORM\Table(name="user", indexes={@ORM\Index(name="fk_role_id_idx", columns={"role"})})
 * @ORM\Entity(repositoryClass="AiadBundle\Repository\UsersRepository")
 */
class User implements UserInterface, \Serializable
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
     * @ORM\Column(name="name", type="string", length=100, nullable=true)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="surname", type="string", length=100, nullable=true)
     */
    private $surname;

    /**
     * @var string
     *
     * @ORM\Column(name="username", type="string", length=100, nullable=true)
     */
    private $username;

    /**
     * @var string
     *
     * @ORM\Column(name="password", type="string", length=150, nullable=true)
     */
    private $password;

    /**
     * @var string
     *
     * @ORM\Column(name="email", type="string", length=100, nullable=false)
     */
    private $email;

    /**
     * @var string
     *
     * @ORM\Column(name="adresa_banimit", type="string", length=200, nullable=true)
     */
    private $adresaBanimit;

    /**
     * @var \DateTime
     *
     * @ORM\Column(name="data_regjistrimit", type="date", nullable=true)
     */
    private $dataRegjistrimit;

    /**
     * @var string
     *
     * @ORM\Column(name="forgot_password", type="string", length=150, nullable=true)
     */
    private $forgotPassword;

    /**
     * @var integer
     *
     * @ORM\Column(name="active", type="integer", nullable=true)
     */
    private $active;

    /**
     * @var \UserRole
     *
     * @ORM\ManyToOne(targetEntity="UserRole")
     * @ORM\JoinColumns({
     *   @ORM\JoinColumn(name="role", referencedColumnName="id")
     * })
     */
    private $role;

    /**
     * @return string
     */
    public function __toString(){
     return $this->username;
 }

    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set name
     *
     * @param string $name
     * @return User
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string 
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set surname
     *
     * @param string $surname
     * @return User
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string 
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set username
     *
     * @param string $username
     * @return User
     */
    public function setUsername($username)
    {
        $this->username = $username;

        return $this;
    }

    /**
     * Get username
     *
     * @return string 
     */
    public function getUsername()
    {
        return $this->username;
    }

    /**
     * Set password
     *
     * @param string $password
     * @return User
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Get password
     *
     * @return string 
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set email
     *
     * @param string $email
     * @return User
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string 
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set adresaBanimit
     *
     * @param string $adresaBanimit
     * @return User
     */
    public function setAdresaBanimit($adresaBanimit)
    {
        $this->adresaBanimit = $adresaBanimit;

        return $this;
    }

    /**
     * Get adresaBanimit
     *
     * @return string 
     */
    public function getAdresaBanimit()
    {
        return $this->adresaBanimit;
    }

    /**
     * Set dataRegjistrimit
     *
     * @param \DateTime $dataRegjistrimit
     * @return User
     */
    public function setDataRegjistrimit($dataRegjistrimit)
    {
        $this->dataRegjistrimit = $dataRegjistrimit;

        return $this;
    }

    /**
     * Get dataRegjistrimit
     *
     * @return \DateTime 
     */
    public function getDataRegjistrimit()
    {
        return $this->dataRegjistrimit;
    }

    /**
     * Set forgotPassword
     *
     * @param string $forgotPassword
     * @return User
     */
    public function setForgotPassword($forgotPassword)
    {
        $this->forgotPassword = $forgotPassword;

        return $this;
    }

    /**
     * Get forgotPassword
     *
     * @return string 
     */
    public function getForgotPassword()
    {
        return $this->forgotPassword;
    }

    /**
     * Set active
     *
     * @param integer $active
     * @return User
     */
    public function setActive($active)
    {
        $this->active = $active;

        return $this;
    }

    /**
     * Get active
     *
     * @return integer 
     */
    public function getActive()
    {
        return $this->active;
    }

    /**
     * Set role
     *
     * @param \AiadBundle\Entity\UserRole $role
     * @return User
     */
    public function setRole(\AiadBundle\Entity\UserRole $role = null)
    {
        $this->role = $role;

        return $this;
    }

    /**
     * Get role
     *
     * @return \AiadBundle\Entity\UserRole 
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * String representation of object
     * @link http://php.net/manual/en/serializable.serialize.php
     * @return string the string representation of the object or null
     */
    public function serialize()
    {
        // TODO: Implement serialize() method.
        return serialize(array(
            $this->id,
            $this->username,
            $this->password,
            $this->email
        ));
    }

    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Constructs the object
     * @link http://php.net/manual/en/serializable.unserialize.php
     * @param string $serialized <p>
     * The string representation of the object.
     * </p>
     * @return void
     */
    public function unserialize($serialized)
    {
        // TODO: Implement unserialize() method.
        list (
            $this->id,
            $this->username,
            $this->password,
            $this->email,
            ) = unserialize($serialized);
    }

    /**
     * Returns the roles granted to the user.
     *
     * <code>
     * public function getRoles()
     * {
     *     return array('ROLE_USER');
     * }
     * </code>
     *
     * Alternatively, the roles might be stored on a ``roles`` property,
     * and populated in any number of different ways when the user object
     * is created.
     *
     * @return Role[] The user roles
     */
    public function getRoles()
    {
        // TODO: Implement getRoles() method.
        $uRoles = UsersRepository::getUserAllRoles($this->id);
        return $uRoles;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * This can return null if the password was not encoded using a salt.
     *
     * @return string|null The salt
     */
    public function getSalt()
    {
        // TODO: Implement getSalt() method.
        return null;
    }

    /**
     * Removes sensitive data from the user.
     *
     * This is important if, at any given point, sensitive information like
     * the plain-text password is stored on this object.
     */
    public function eraseCredentials()
    {
        // TODO: Implement eraseCredentials() method.

    }


}
