<?php
namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity(repositoryClass="BackendBundle\Entity\Repository\RoomClassRepository")
 * @ORM\Table(name="room_class_table")
 * @Vich\Uploadable
 */
class RoomClass
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
     * @Gedmo\Slug(fields={"title"},unique=true,separator="-")
     * @ORM\Column(name="slug", length=255, unique=true)
     */
    private $slug;

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
     * @ORM\Column(type="string", nullable=true)
     */
    private $price;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $price_trans;

    /**
     * @return mixed
     */
    public function getPriceTrans()
    {
        return $this->price_trans;
    }

    /**
     * @param mixed $price_trans
     */
    public function setPriceTrans($price_trans)
    {
        $this->price_trans = $price_trans;
    }

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="room_class", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\RoomsPrices", inversedBy="item")
     * @ORM\JoinColumn(name="page_id", referencedColumnName="id")
     */
    private $class;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\RoomClassItem", mappedBy="class", cascade={"persist"})
     */
    private $item;


    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\FeaturesClassItem", mappedBy="i", cascade={"persist"})
     */
    private $feature;


    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\GalleryClassItem", mappedBy="class", cascade={"persist"}, orphanRemoval=true)
     */
    private $gallery;


    /**
     * @return mixed
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * @param mixed $slug
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;
    }


    public function __construct()
    {
        $this->updatedAt = new \DateTime('now');
        $this->item = new ArrayCollection();
        $this->feature = new ArrayCollection();
        $this->gallery = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getClass()
    {
        return $this->class;
    }

    /**
     * @param mixed $class
     */
    public function setClass($class)
    {
        $this->class = $class;
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
     * @param \BackendBundle\Entity\RoomClassItem $r
     *
     * @return RoomClass
     */
    public function addItem(\BackendBundle\Entity\RoomClassItem $r)
    {
        $r->setClass($this);

        $this->item->add($r);

        return $this;
    }

    /**
     * @param \BackendBundle\Entity\RoomClassItem $r
     *
     */
    public function removeItem(\BackendBundle\Entity\RoomClassItem $r)
    {
        $this->item->removeElement($r);
        $r->setClass(null);

    }


    /**
     * @param \BackendBundle\Entity\FeaturesClassItem $r
     *
     * @return RoomClass
     */
    public function addFeature(\BackendBundle\Entity\FeaturesClassItem $r)
    {
        $r->setI($this);

        $this->feature->add($r);

        return $this;
    }


    /**
     * @param \BackendBundle\Entity\FeaturesClassItem $r
     *
     */
    public function removeFeature(\BackendBundle\Entity\FeaturesClassItem $r)
    {
        $this->feature->removeElement($r);
        $r->setI(null);

    }


    /**
     * @param \BackendBundle\Entity\GalleryClassItem $r
     *
     * @return RoomClass
     */
    public function addGallery(\BackendBundle\Entity\GalleryClassItem $r)
    {
        $r->setClass($this);

        $this->gallery->add($r);

        return $this;
    }

    /**
     * @param \BackendBundle\Entity\GalleryClassItem $r
     *
     */
    public function removeGallery(\BackendBundle\Entity\GalleryClassItem $r)
    {
        $this->gallery->removeElement($r);
        $r->setClass(null);

    }


    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFeature()
    {
        return $this->feature;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $feature
     */
    public function setFeature(\Doctrine\Common\Collections\Collection $feature)
    {
        $this->feature = $feature;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGallery()
    {
        return $this->gallery;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $gallery
     */
    public function setGallery(\Doctrine\Common\Collections\Collection $gallery)
    {
        $this->gallery = $gallery;
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

    public function setImageFile(File $image = null)
    {
        $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
        if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    public function getImageFile()
    {
        return $this->imageFile;
    }

    /**
     * @return mixed
     */
    public function getImage()
    {
        return $this->image;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        $this->image = $image;
    }

    public function __toString()
    {
        return (string)$this->getTitle();

    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
}