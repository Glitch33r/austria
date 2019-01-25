<?php
namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="room_features_table")
 * @Vich\Uploadable
 */
class RoomFeature
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $name_trans;


    /**
     * @ORM\Column(type="string", length=128, nullable=true)
     */
    private $image_hash;

//    /**
//     * Many Features have One Product.
//     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\RoomClass", inversedBy="feature")
//     * @ORM\JoinColumn(name="room_id", referencedColumnName="id")
//     */
//    private $room;

    /**
     * Many Groups have Many Users.
     * @ORM\ManyToMany(targetEntity="BackendBundle\Entity\RoomClass", mappedBy="feature")
     */
    private $room;

    /**
     * @return mixed
     */
    public function getImageHash()
    {
        return $this->image_hash;
    }

    /**
     * @param mixed $image_hash
     */
    public function setImageHash($image_hash)
    {
        $this->image_hash = $image_hash;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getNameTrans()
    {
        return $this->name_trans;
    }

    /**
     * @param mixed $name_trans
     */
    public function setNameTrans($name_trans)
    {
        $this->name_trans = $name_trans;
    }

    /**
     * @return mixed
     */
    public function getRoom()
    {
        return $this->room;
    }


    public function setRoom(\BackendBundle\Entity\RoomClass $room= null)
    {
        $this->room = $room;
    }

    public function addRoom(\BackendBundle\Entity\RoomClass $room= null)
    {
        $this->room->add($room);
    }

    public function removeRoom(\BackendBundle\Entity\RoomClass $room= null)
    {
        $this->room->removeElement($room);
    }


    public function __toString()
    {
        return (string)$this->getName();
    }

    public function __construct()
    {
        $this->room = new ArrayCollection();
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

}