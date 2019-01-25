<?php
namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="special_offers_table")
 * @Vich\Uploadable
 */
class SpecialOffers
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
    private $background_image;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $background_image_alt;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $background_image_alt_trans;

    /**
     * @Vich\UploadableField(mapping="background_offers", fileNameProperty="background_image")
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
     * @ORM\Column(type="string", nullable=true)
     */
    private $title;

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
    private $first_blc_title;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $first_blc_title_trans;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $first_blc_description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $first_blc_description_trans;

    /**
     * @return mixed
     */
    public function getFirstBlcTitle()
    {
        return $this->first_blc_title;
    }

    /**
     * @param mixed $first_blc_title
     */
    public function setFirstBlcTitle($first_blc_title)
    {
        $this->first_blc_title = $first_blc_title;
    }

    /**
     * @return mixed
     */
    public function getFirstBlcTitleTrans()
    {
        return $this->first_blc_title_trans;
    }

    /**
     * @param mixed $first_blc_title_trans
     */
    public function setFirstBlcTitleTrans($first_blc_title_trans)
    {
        $this->first_blc_title_trans = $first_blc_title_trans;
    }

    /**
     * @return mixed
     */
    public function getFirstBlcDescription()
    {
        return $this->first_blc_description;
    }

    /**
     * @param mixed $first_blc_description
     */
    public function setFirstBlcDescription($first_blc_description)
    {
        $this->first_blc_description = $first_blc_description;
    }

    /**
     * @return mixed
     */
    public function getFirstBlcDescriptionTrans()
    {
        return $this->first_blc_description_trans;
    }

    /**
     * @param mixed $first_blc_description_trans
     */
    public function setFirstBlcDescriptionTrans($first_blc_description_trans)
    {
        $this->first_blc_description_trans = $first_blc_description_trans;
    }


    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\SpecialOffersItem", mappedBy="offer", cascade={"persist", "remove"})
     */
    private $item;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image_alt;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image_alt_trans;

    /**
     * @Vich\UploadableField(mapping="offer_main", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

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


    public function __construct()
    {
        $this->item = new \Doctrine\Common\Collections\ArrayCollection();
        $this->updatedAt = new \DateTime('now');
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
     * @param \BackendBundle\Entity\SpecialOffersItem $r
     *
     * @return SpecialOffers
     */
    public function addItem(\BackendBundle\Entity\SpecialOffersItem $r)
    {
        $r->setOffer($this);

        $this->item->add($r);

        return $this;
    }

    /**
     * @param \BackendBundle\Entity\SpecialOffersItem $r
     *
     */
    public function removeItem(\BackendBundle\Entity\SpecialOffersItem $r)
    {
        $this->item->removeElement($r);
        $r->setOffer(null);

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
     * @return mixed
     */
    public function getBackgroundImageAlt()
    {
        return $this->background_image_alt;
    }

    /**
     * @param mixed $background_image_alt
     */
    public function setBackgroundImageAlt($background_image_alt)
    {
        $this->background_image_alt = $background_image_alt;
    }

    /**
     * @return mixed
     */
    public function getBackgroundImageAltTrans()
    {
        return $this->background_image_alt_trans;
    }

    /**
     * @param mixed $background_image_alt_trans
     */
    public function setBackgroundImageAltTrans($background_image_alt_trans)
    {
        $this->background_image_alt_trans = $background_image_alt_trans;
    }

    /**
     * @return mixed
     */
    public function getImageAlt()
    {
        return $this->image_alt;
    }

    /**
     * @param mixed $image_alt
     */
    public function setImageAlt($image_alt)
    {
        $this->image_alt = $image_alt;
    }

    /**
     * @return mixed
     */
    public function getImageAltTrans()
    {
        return $this->image_alt_trans;
    }

    /**
     * @param mixed $image_alt_trans
     */
    public function setImageAltTrans($image_alt_trans)
    {
        $this->image_alt_trans = $image_alt_trans;
    }
}