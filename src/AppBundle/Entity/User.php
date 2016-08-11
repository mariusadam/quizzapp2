<?php

namespace AppBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;

/**
 * @ORM\Entity
 * @ORM\Table(name="users")
 * @UniqueEntity(fields={"email"}, groups={"AppRegistration", "AppProfile"}, message="user.unique.email")
 */
class User extends BaseUser
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    /**
     * @ORM\Column(name="first_name", type="string", length=255, nullable=true)
     *
     * @Assert\NotBlank(groups={"AppRegistration", "AppProfile"}, message="user.not_blank.firstName")
     * @Assert\Length(max=255, groups={"AppRegistration", "AppProfile"}, maxMessage="user.max_length.firstName")
     */
    protected $firstName;

    /**
     * @ORM\Column(name="last_name", type="string", length=255, nullable=true)
     *
     * @Assert\NotBlank(groups={"AppRegistration", "AppProfile"}, message="user.not_blank.lastName")
     * @Assert\Length(max=255, groups={"AppRegistration", "AppProfile"}, maxMessage="user.max_length.lastName")
     */
    protected $lastName;

    /**
     * @return string
     */
    public function __toString()
    {
        return (string) $this->getFullName() ?: $this->getUsername();
    }

    /**
     * @param string $email
     *
     * @return User
     */
    public function setEmail($email)
    {
        parent::setEmail($email);
        $this->setUsername($email);

        return $this;
    }

    /**
     * @return mixed
     */
    public function getMemberSince()
    {
        return $this->memberSince;
    }

    /**
     * @param mixed $memberSince
     *
     * @return User
     */
    public function setMemberSince(\DateTime $memberSince)
    {
        $this->memberSince = $memberSince;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * @param string $firstName
     *
     * @return User
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * @param string $lastName
     *
     * @return User
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * @return string
     */
    public function getFullName()
    {
        return trim(implode(' ', [$this->getFirstName(), $this->getLastName()]));
    }

}
