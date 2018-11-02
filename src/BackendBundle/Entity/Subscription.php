<?php
namespace BackendBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="subscription_table")
 */
class Subscription
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $email;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $settedAt;

    /**
     * @return \DateTime
     */
    public function getSettedAt(): \DateTime
    {
        return $this->settedAt;
    }

    /**
     * @param \DateTime $settedAt
     */
    public function setSettedAt(\DateTime $settedAt)
    {
        $this->settedAt = $settedAt;
    }

    public function __construct()
    {
        $this->settedAt = new \DateTime('now');
    }

}