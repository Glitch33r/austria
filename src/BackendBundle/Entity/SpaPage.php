<?php

namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="spa_page_table")
 * @Vich\Uploadable
 */
class SpaPage
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
     * @Vich\UploadableField(mapping="background_spa", fileNameProperty="background_image")
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
     * @ORM\Column(type="text", nullable=true)
     */
    private $first_blc_description;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $first_blc_title_trans;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $first_blc_description_trans;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $second_blc_description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $second_blc_description_trans;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $price_blc_title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $price_blc_description;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $price_blc_title_trans;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $price_blc_description_trans;

    /**
     * @return mixed
     */
    public function getPriceBlcTitle()
    {
        return $this->price_blc_title;
    }

    /**
     * @param mixed $price_blc_title
     */
    public function setPriceBlcTitle($price_blc_title)
    {
        $this->price_blc_title = $price_blc_title;
    }

    /**
     * @return mixed
     */
    public function getPriceBlcDescription()
    {
        return $this->price_blc_description;
    }

    /**
     * @param mixed $price_blc_description
     */
    public function setPriceBlcDescription($price_blc_description)
    {
        $this->price_blc_description = $price_blc_description;
    }

    /**
     * @return mixed
     */
    public function getPriceBlcTitleTrans()
    {
        return $this->price_blc_title_trans;
    }

    /**
     * @param mixed $price_blc_title_trans
     */
    public function setPriceBlcTitleTrans($price_blc_title_trans)
    {
        $this->price_blc_title_trans = $price_blc_title_trans;
    }

    /**
     * @return mixed
     */
    public function getPriceBlcDescriptionTrans()
    {
        return $this->price_blc_description_trans;
    }

    /**
     * @param mixed $price_blc_description_trans
     */
    public function setPriceBlcDescriptionTrans($price_blc_description_trans)
    {
        $this->price_blc_description_trans = $price_blc_description_trans;
    }

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $file_for_price;

    /**
     * @Vich\UploadableField(mapping="file_price", fileNameProperty="file_for_price")
     * @var File
     */
    private $priceFile;

    /**
     * @return string
     */
    public function getFileForPrice()
    {
        return $this->file_for_price;
    }

    /**
     * @param string $file_for_price
     */
    public function setFileForPrice($file_for_price)
    {
        $this->file_for_price = $file_for_price;
    }

    /**
     * @return File
     */
    public function getPriceFile()
    {
        return $this->priceFile;
    }

    /**
     * @param File $priceFile
     */
    public function setPriceFile(File $priceFile)
    {
        $this->priceFile = $priceFile;

        if ($priceFile) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }



    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     * @var string
     */
    private $file_for_price_trans;

    /**
     * @Vich\UploadableField(mapping="file_price_trans", fileNameProperty="file_for_price_trans")
     * @var File
     */
    private $priceFile_trans;

    /**
     * @return string
     */
    public function getFileForPriceTrans()
    {
        return $this->file_for_price_trans;
    }

    /**
     * @param string $file_for_price_trans
     */
    public function setFileForPriceTrans($file_for_price_trans): void
    {
        $this->file_for_price_trans = $file_for_price_trans;
    }

    /**
     * @return File
     */
    public function getPriceFileTrans()
    {
        return $this->priceFile_trans;
    }

    /**
     * @param File $priceFile
     */
    public function setPriceFileTrans(File $priceFile)
    {
        $this->priceFile_trans = $priceFile;

        if ($priceFile) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="spa_page", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     * @var \DateTime
     */
    private $updatedAt;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\SpaGallery", mappedBy="spa", cascade={"persist"})
     */
    private $gallery;

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
     * @param \BackendBundle\Entity\SpaGallery $r
     *
     * @return SpaPage
     */
    public function addGallery(\BackendBundle\Entity\SpaGallery $r)
    {
        $r->setSpa($this);

        $this->gallery->add($r);

        return $this;
    }

    /**
     * @param \BackendBundle\Entity\SpaGallery $r
     *
     */
    public function removeGallery(\BackendBundle\Entity\SpaGallery $r)
    {
        $this->gallery->removeElement($r);
    }

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
     * @return mixed
     */
    public function getSecondBlcDescription()
    {
        return $this->second_blc_description;
    }

    /**
     * @param mixed $second_blc_description
     */
    public function setSecondBlcDescription($second_blc_description)
    {
        $this->second_blc_description = $second_blc_description;
    }

    /**
     * @return mixed
     */
    public function getSecondBlcDescriptionTrans()
    {
        return $this->second_blc_description_trans;
    }

    /**
     * @param mixed $second_blc_description_trans
     */
    public function setSecondBlcDescriptionTrans($second_blc_description_trans)
    {
        $this->second_blc_description_trans = $second_blc_description_trans;
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


    public function __construct()
    {
        $this->updatedAt = new \DateTime('now');
        $this->gallery = new ArrayCollection();

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