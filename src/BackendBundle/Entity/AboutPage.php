<?php
namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="about_page_table")
 * @Vich\Uploadable
 */
class AboutPage
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\AboutUsFeatures", mappedBy="i", cascade={"persist"})
     */
    private $feature;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\AboutUsItem", mappedBy="about", cascade={"persist"})
     */
    private $item;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $background_image;

    /**
     * @Vich\UploadableField(mapping="background_about", fileNameProperty="background_image")
     * @var File
     */
    private $background_imageFile;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $background_image_alt;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $background_image_alt_trans;

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
     * @param \BackendBundle\Entity\AboutUsItem $r
     *
     * @return AboutPage
     */
    public function addItem(\BackendBundle\Entity\AboutUsItem $r)
    {
        $r->setAbout($this);

        $this->item->add($r);

        return $this;
    }

    /**
     * @param \BackendBundle\Entity\AboutUsItem $r
     *
     */
    public function removeItem(\BackendBundle\Entity\AboutUsItem $r)
    {
        $this->item->removeElement($r);
        $r->setAbout(NULL);
    }


    /**
     * @param \BackendBundle\Entity\AboutUsFeatures $r
     *
     * @return AboutPage
     */
    public function addFeature(\BackendBundle\Entity\AboutUsFeatures $r)
    {
        $r->setI($this);

        $this->feature->add($r);

        return $this;
    }


    /**
     * @param \BackendBundle\Entity\AboutUsFeatures $r
     *
     */
    public function removeFeature(\BackendBundle\Entity\AboutUsFeatures $r)
    {
        $this->feature->removeElement($r);
        $r->setI(NULL);

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
     * @ORM\Column(type="string", nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $title_trans;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

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
     * @ORM\Column(type="string", nullable=true)
     */
    private $image_first;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image_first_alt;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image_first_alt_trans;

    /**
     * @Vich\UploadableField(mapping="about_first", fileNameProperty="image_first")
     * @var File
     */
    private $imageFile_first;

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
     * @return mixed
     */
    public function getImageFirst()
    {
        return $this->image_first;
    }

    /**
     * @param mixed $image_first
     */
    public function setImageFirst($image_first)
    {
        $this->image_first = $image_first;
    }

    /**
     * @return File
     */
    public function getImageFileFirst()
    {
        return $this->imageFile_first;
    }

    /**
     * @param File $imageFile_first
     */
    public function setImageFileFirst(File $imageFile_first)
    {
        $this->imageFile_first = $imageFile_first;

        if ($imageFile_first) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $third_blc_title;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $third_blc_title_trans;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $third_blc_description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $third_blc_description_trans;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image_third;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image_third_alt;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image_third_alt_trans;

    /**
     * @Vich\UploadableField(mapping="about_third", fileNameProperty="image_third")
     * @var File
     */
    private $imageFile_third;

    /**
     * @return mixed
     */
    public function getImageThird()
    {
        return $this->image_third;
    }

    /**
     * @param mixed $image_third
     */
    public function setImageThird($image_third)
    {
        $this->image_third = $image_third;
    }

    /**
     * @return File
     */
    public function getImageFileThird()
    {
        return $this->imageFile_third;
    }

    /**
     * @param File $imageFile_third
     */
    public function setImageFileThird(File $imageFile_third)
    {
        $this->imageFile_third = $imageFile_third;

        if ($imageFile_third) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $fourth_blc_title;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $fourth_blc_title_trans;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $fourth_blc_description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $fourth_blc_description_trans;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image_fourth;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image_fourth_alt;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image_fourth_alt_trans;

    /**
     * @Vich\UploadableField(mapping="about_fourth", fileNameProperty="image_fourth")
     * @var File
     */
    private $imageFile_fourth;

    /**
     * @return mixed
     */
    public function getImageFourth()
    {
        return $this->image_fourth;
    }

    /**
     * @param mixed $image_fourth
     */
    public function setImageFourth($image_fourth)
    {
        $this->image_fourth = $image_fourth;
    }

    /**
     * @return File
     */
    public function getImageFileFourth()
    {
        return $this->imageFile_fourth;
    }

    /**
     * @param File $imageFile_fourth
     */
    public function setImageFileFourth(File $imageFile_fourth)
    {
        $this->imageFile_fourth = $imageFile_fourth;

        if ($imageFile_fourth) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }


    public function __construct()
    {
        $this->updatedAt = new \DateTime('now');
        $this->feature = new ArrayCollection();
        $this->item = new ArrayCollection();
    }

    /**
     * @return mixed
     */
    public function getImageFirstAlt()
    {
        return $this->image_first_alt;
    }

    /**
     * @param mixed $image_first_alt
     */
    public function setImageFirstAlt($image_first_alt)
    {
        $this->image_first_alt = $image_first_alt;
    }

    /**
     * @return mixed
     */
    public function getImageFirstAltTrans()
    {
        return $this->image_first_alt_trans;
    }

    /**
     * @param mixed $image_first_alt_trans
     */
    public function setImageFirstAltTrans($image_first_alt_trans)
    {
        $this->image_first_alt_trans = $image_first_alt_trans;
    }

    /**
     * @return mixed
     */
    public function getImageThirdAlt()
    {
        return $this->image_third_alt;
    }

    /**
     * @param mixed $image_third_alt
     */
    public function setImageThirdAlt($image_third_alt)
    {
        $this->image_third_alt = $image_third_alt;
    }

    /**
     * @return mixed
     */
    public function getImageThirdAltTrans()
    {
        return $this->image_third_alt_trans;
    }

    /**
     * @param mixed $image_third_alt_trans
     */
    public function setImageThirdAltTrans($image_third_alt_trans)
    {
        $this->image_third_alt_trans = $image_third_alt_trans;
    }

    /**
     * @return mixed
     */
    public function getImageFourthAlt()
    {
        return $this->image_fourth_alt;
    }

    /**
     * @param mixed $image_fourth_alt
     */
    public function setImageFourthAlt($image_fourth_alt)
    {
        $this->image_fourth_alt = $image_fourth_alt;
    }

    /**
     * @return mixed
     */
    public function getImageFourthAltTrans()
    {
        return $this->image_fourth_alt_trans;
    }

    /**
     * @param mixed $image_fourth_alt_trans
     */
    public function setImageFourthAltTrans($image_fourth_alt_trans)
    {
        $this->image_fourth_alt_trans = $image_fourth_alt_trans;
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
     * @return mixed
     */
    public function getThirdBlcTitle()
    {
        return $this->third_blc_title;
    }

    /**
     * @param mixed $third_blc_title
     */
    public function setThirdBlcTitle($third_blc_title)
    {
        $this->third_blc_title = $third_blc_title;
    }

    /**
     * @return mixed
     */
    public function getThirdBlcTitleTrans()
    {
        return $this->third_blc_title_trans;
    }

    /**
     * @param mixed $third_blc_title_trans
     */
    public function setThirdBlcTitleTrans($third_blc_title_trans)
    {
        $this->third_blc_title_trans = $third_blc_title_trans;
    }

    /**
     * @return mixed
     */
    public function getThirdBlcDescription()
    {
        return $this->third_blc_description;
    }

    /**
     * @param mixed $third_blc_description
     */
    public function setThirdBlcDescription($third_blc_description)
    {
        $this->third_blc_description = $third_blc_description;
    }

    /**
     * @return mixed
     */
    public function getThirdBlcDescriptionTrans()
    {
        return $this->third_blc_description_trans;
    }

    /**
     * @param mixed $third_blc_description_trans
     */
    public function setThirdBlcDescriptionTrans($third_blc_description_trans)
    {
        $this->third_blc_description_trans = $third_blc_description_trans;
    }

    /**
     * @return mixed
     */
    public function getFourthBlcTitle()
    {
        return $this->fourth_blc_title;
    }

    /**
     * @param mixed $fourth_blc_title
     */
    public function setFourthBlcTitle($fourth_blc_title)
    {
        $this->fourth_blc_title = $fourth_blc_title;
    }

    /**
     * @return mixed
     */
    public function getFourthBlcTitleTrans()
    {
        return $this->fourth_blc_title_trans;
    }

    /**
     * @param mixed $fourth_blc_title_trans
     */
    public function setFourthBlcTitleTrans($fourth_blc_title_trans)
    {
        $this->fourth_blc_title_trans = $fourth_blc_title_trans;
    }

    /**
     * @return mixed
     */
    public function getFourthBlcDescription()
    {
        return $this->fourth_blc_description;
    }

    /**
     * @param mixed $fourth_blc_description
     */
    public function setFourthBlcDescription($fourth_blc_description)
    {
        $this->fourth_blc_description = $fourth_blc_description;
    }

    /**
     * @return mixed
     */
    public function getFourthBlcDescriptionTrans()
    {
        return $this->fourth_blc_description_trans;
    }

    /**
     * @param mixed $fourth_blc_description_trans
     */
    public function setFourthBlcDescriptionTrans($fourth_blc_description_trans)
    {
        $this->fourth_blc_description_trans = $fourth_blc_description_trans;
    }
}