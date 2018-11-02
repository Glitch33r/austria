<?php
namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="rooms_prices_table")
 * @Vich\Uploadable
 */
class RoomsPrices
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $background_image;

    /**
     * @Vich\UploadableField(mapping="background_rooms", fileNameProperty="background_image")
     * @var File
     */
    private $background_imageFile;

    /**
     * @return mixed
     */
    public function getBackgroundImage()
    {
        return $this->background_image;
    }

    /**
     * @param mixed $background_image
     */
    public function setBackgroundImage($background_image)
    {
        $this->background_image = $background_image;
    }

    /**
     * @return File
     */
    public function getBackgroundImageFile()
    {
        return $this->background_imageFile;
    }

    /**
     * @param File $background_imageFile
     */
    public function setBackgroundImageFile(File $background_imageFile)
    {
        $this->background_imageFile = $background_imageFile;

        if ($background_imageFile) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @return \DateTime
     */
    public function getUpdatedAt()
    {
        return $this->updatedAt;
    }

    /**
     * @param \DateTime $updatedAt
     */
    public function setUpdatedAt(\DateTime $updatedAt)
    {
        $this->updatedAt = $updatedAt;
    }

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $title_trans;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description_trans;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $special;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $special_trans;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\RoomClass", mappedBy="class", cascade={"persist", "remove"})
     */
    private $item;

    /**
     * @return mixed
     */
    public function getSpecial()
    {
        return $this->special;
    }

    /**
     * @param mixed $special
     */
    public function setSpecial($special)
    {
        $this->special = $special;
    }

    /**
     * @return mixed
     */
    public function getSpecialTrans()
    {
        return $this->special_trans;
    }

    /**
     * @param mixed $special_trans
     */
    public function setSpecialTrans($special_trans)
    {
        $this->special_trans = $special_trans;
    }


//    /**
//     * @ORM\Column(type="string", nullable=true)
//     */
//    private $image;
//
//    /**
//     * @Vich\UploadableField(mapping="charlets", fileNameProperty="image")
//     * @var File
//     */
//    private $imageFile;
//
//    /**
//     * @ORM\Column(type="datetime", nullable=true)
//     * @var \DateTime
//     */
//    private $updatedAt;

//    /**
//     * @return \DateTime
//     */
//    public function getUpdatedAt()
//    {
//        return $this->updatedAt;
//    }
//
//    /**
//     * @param \DateTime $updatedAt
//     */
//    public function setUpdatedAt(\DateTime $updatedAt)
//    {
//        $this->updatedAt = $updatedAt;
//    }
//
//    public function setImageFile(File $image = null)
//    {
//        $this->imageFile = $image;
//
//        // VERY IMPORTANT:
//        // It is required that at least one field changes if you are using Doctrine,
//        // otherwise the event listeners won't be called and the file is lost
//        if ($image) {
//            // if 'updatedAt' is not defined in your entity, use another property
//            $this->updatedAt = new \DateTime('now');
//        }
//    }
//
//    public function getImageFile()
//    {
//        return $this->imageFile;
//    }
//
//    /**
//     * @return mixed
//     */
//    public function getImage()
//    {
//        return $this->image;
//    }
//
//    /**
//     * @param mixed $image
//     */
//    public function setImage($image)
//    {
//        $this->image = $image;
//    }


    public function __construct()
    {
        $this->item = new \Doctrine\Common\Collections\ArrayCollection();
//        $this->updatedAt = new \DateTime('now');
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getItem()
    {
        return $this->item;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $item
     */
    public function setItem(\Doctrine\Common\Collections\Collection $item)
    {
        $this->item = $item;
    }



    /**
     * @param \BackendBundle\Entity\RoomClass $r
     *
     * @return RoomsPrices
     */
    public function addItem(\BackendBundle\Entity\RoomClass $r)
    {
        $r->setClass($this);

        $this->item->add($r);

        return $this;
    }

    /**
     * @param \BackendBundle\Entity\RoomClass $r
     *
     */
    public function removeItem(\BackendBundle\Entity\RoomClass $r)
    {
        $this->item->removeElement($r);
        $r->setClass(null);
    }


    /**
     * @return mixed
     */
    public function getTitleTrans()
    {
        return $this->title_trans;
    }

    /**
     * @param mixed $title_trans
     */
    public function setTitleTrans($title_trans)
    {
        $this->title_trans = $title_trans;
    }

    /**
     * @return mixed
     */
    public function getDescriptionTrans()
    {
        return $this->description_trans;
    }

    /**
     * @param mixed $description_trans
     */
    public function setDescriptionTrans($description_trans)
    {
        $this->description_trans = $description_trans;
    }


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
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}