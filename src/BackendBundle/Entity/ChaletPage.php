<?php
namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="chalet_page_table")
 * @Vich\Uploadable
 */
class ChaletPage
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
     * @Vich\UploadableField(mapping="background_chalet", fileNameProperty="background_image")
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
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\GalleryChalet", mappedBy="chalet", cascade={"persist"})
     */
    private $gallery;


    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\ChaletItem", mappedBy="chalet", cascade={"persist"})
     */
    private $item;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $second_blc_title;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $second_blc_title_trans;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $second_blc_description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $second_blc_description_trans;

    /**
     * @return mixed
     */
    public function getSecondBlcTitle()
    {
        return $this->second_blc_title;
    }

    /**
     * @param mixed $second_blc_title
     */
    public function setSecondBlcTitle($second_blc_title)
    {
        $this->second_blc_title = $second_blc_title;
    }

    /**
     * @return mixed
     */
    public function getSecondBlcTitleTrans()
    {
        return $this->second_blc_title_trans;
    }

    /**
     * @param mixed $second_blc_title_trans
     */
    public function setSecondBlcTitleTrans($second_blc_title_trans)
    {
        $this->second_blc_title_trans = $second_blc_title_trans;
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
     * @param \BackendBundle\Entity\GalleryChalet $r
     *
     * @return ChaletPage
     */
    public function addGallery(\BackendBundle\Entity\GalleryChalet $r)
    {
        $r->setChalet($this);

        $this->gallery->add($r);

        return $this;
    }

    /**
     * @param \BackendBundle\Entity\GalleryChalet $r
     *
     */
    public function removeGallery(\BackendBundle\Entity\GalleryChalet $r)
    {
        $this->gallery->removeElement($r);
        $r->setChalet(null);

    }

    public function __construct()
    {
        $this->gallery = new ArrayCollection();
        $this->item = new ArrayCollection();
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
     * @param \BackendBundle\Entity\ChaletItem $r
     *
     * @return ChaletPage
     */
    public function addItem(\BackendBundle\Entity\ChaletItem $r)
    {
        $r->setChalet($this);

        $this->item->add($r);

        return $this;
    }

    /**
     * @param \BackendBundle\Entity\ChaletItem $r
     *
     */
    public function removeItem(\BackendBundle\Entity\ChaletItem $r)
    {
        $this->item->removeElement($r);
        $r->setChalet(null);

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
}