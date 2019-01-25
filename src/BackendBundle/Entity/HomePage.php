<?php

namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="home_page_table")
 * @Vich\Uploadable
 */
class HomePage
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
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\HomeIcons", mappedBy="homep", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $icon;

    /**
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\HomeSlider", mappedBy="home", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $slide;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $spa_title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $spa_description;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $spa_title_trans;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $spa_description_trans;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $spa_image;

    /**
     * @Vich\UploadableField(mapping="spa", fileNameProperty="spa_image")
     * @var File
     */
    private $spa_imageFile;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $spa_image_alt;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $spa_image_alt_trans;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $video_title;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $video_title_trans;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $video_description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $video_description_trans;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $chalet_title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $chalet_description;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $chalet_title_trans;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $chalet_description_trans;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $chalet_image;

    /**
     * @Vich\UploadableField(mapping="chalet", fileNameProperty="chalet_image")
     * @var File
     */
    private $chalet_imageFile;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $chalet_image_alt;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $chalet_image_alt_trans;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $background_image;

    /**
     * @Vich\UploadableField(mapping="background_home", fileNameProperty="background_image")
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
    private $ame_title;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $ame_description;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $ame_title_trans;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $ame_description_trans;

    /**
     * @return mixed
     */
    public function getVideoTitle()
    {
        return $this->video_title;
    }

    /**
     * @param mixed $video_title
     */
    public function setVideoTitle($video_title)
    {
        $this->video_title = $video_title;
    }

    /**
     * @return mixed
     */
    public function getVideoTitleTrans()
    {
        return $this->video_title_trans;
    }

    /**
     * @param mixed $video_title_trans
     */
    public function setVideoTitleTrans($video_title_trans)
    {
        $this->video_title_trans = $video_title_trans;
    }

    /**
     * @return mixed
     */
    public function getVideoDescription()
    {
        return $this->video_description;
    }

    /**
     * @param mixed $video_description
     */
    public function setVideoDescription($video_description)
    {
        $this->video_description = $video_description;
    }

    /**
     * @return mixed
     */
    public function getVideoDescriptionTrans()
    {
        return $this->video_description_trans;
    }

    /**
     * @param mixed $video_description_trans
     */
    public function setVideoDescriptionTrans($video_description_trans)
    {
        $this->video_description_trans = $video_description_trans;
    }

    /**
     * @return mixed
     */
    public function getChaletTitle()
    {
        return $this->chalet_title;
    }

    /**
     * @param mixed $chalet_title
     */
    public function setChaletTitle($chalet_title)
    {
        $this->chalet_title = $chalet_title;
    }

    /**
     * @return mixed
     */
    public function getChaletDescription()
    {
        return $this->chalet_description;
    }

    /**
     * @param mixed $chalet_description
     */
    public function setChaletDescription($chalet_description)
    {
        $this->chalet_description = $chalet_description;
    }

    /**
     * @return mixed
     */
    public function getChaletTitleTrans()
    {
        return $this->chalet_title_trans;
    }

    /**
     * @param mixed $chalet_title_trans
     */
    public function setChaletTitleTrans($chalet_title_trans)
    {
        $this->chalet_title_trans = $chalet_title_trans;
    }

    /**
     * @return mixed
     */
    public function getChaletDescriptionTrans()
    {
        return $this->chalet_description_trans;
    }

    /**
     * @param mixed $chalet_description_trans
     */
    public function setChaletDescriptionTrans($chalet_description_trans)
    {
        $this->chalet_description_trans = $chalet_description_trans;
    }

    /**
     * @return mixed
     */
    public function getChaletImage()
    {
        return $this->chalet_image;
    }

    /**
     * @param mixed $chalet_image
     */
    public function setChaletImage($chalet_image)
    {
        $this->chalet_image = $chalet_image;
    }

    /**
     * @return File
     */
    public function getChaletImageFile()
    {
        return $this->chalet_imageFile;
    }

    /**
     * @param File $chalet_imageFile
     */
    public function setChaletImageFile(File $chalet_imageFile)
    {
        $this->chalet_imageFile = $chalet_imageFile;

        if ($chalet_imageFile) {
            // if 'updatedAt' is not defined in your entity, use another property
            $this->updatedAt = new \DateTime('now');
        }
    }

    /**
     * @return mixed
     */
    public function getAmeTitle()
    {
        return $this->ame_title;
    }

    /**
     * @param mixed $ame_title
     */
    public function setAmeTitle($ame_title)
    {
        $this->ame_title = $ame_title;
    }

    /**
     * @return mixed
     */
    public function getAmeDescription()
    {
        return $this->ame_description;
    }

    /**
     * @param mixed $ame_description
     */
    public function setAmeDescription($ame_description)
    {
        $this->ame_description = $ame_description;
    }

    /**
     * @return mixed
     */
    public function getAmeTitleTrans()
    {
        return $this->ame_title_trans;
    }

    /**
     * @param mixed $ame_title_trans
     */
    public function setAmeTitleTrans($ame_title_trans)
    {
        $this->ame_title_trans = $ame_title_trans;
    }

    /**
     * @return mixed
     */
    public function getAmeDescriptionTrans()
    {
        return $this->ame_description_trans;
    }

    /**
     * @param mixed $ame_description_trans
     */
    public function setAmeDescriptionTrans($ame_description_trans)
    {
        $this->ame_description_trans = $ame_description_trans;
    }


    /**
     * @return mixed
     */
    public function getSpaTitle()
    {
        return $this->spa_title;
    }

    /**
     * @param mixed $spa_title
     */
    public function setSpaTitle($spa_title)
    {
        $this->spa_title = $spa_title;
    }

    /**
     * @return mixed
     */
    public function getSpaDescription()
    {
        return $this->spa_description;
    }

    /**
     * @param mixed $spa_description
     */
    public function setSpaDescription($spa_description)
    {
        $this->spa_description = $spa_description;
    }

    /**
     * @return mixed
     */
    public function getSpaTitleTrans()
    {
        return $this->spa_title_trans;
    }

    /**
     * @param mixed $spa_title_trans
     */
    public function setSpaTitleTrans($spa_title_trans)
    {
        $this->spa_title_trans = $spa_title_trans;
    }

    /**
     * @return mixed
     */
    public function getSpaDescriptionTrans()
    {
        return $this->spa_description_trans;
    }

    /**
     * @param mixed $spa_description_trans
     */
    public function setSpaDescriptionTrans($spa_description_trans)
    {
        $this->spa_description_trans = $spa_description_trans;
    }

    /**
     * @return mixed
     */
    public function getSpaImage()
    {
        return $this->spa_image;
    }

    /**
     * @param mixed $spa_image
     */
    public function setSpaImage($spa_image)
    {
        $this->spa_image = $spa_image;
    }

    /**
     * @return File
     */
    public function getSpaImageFile()
    {
        return $this->spa_imageFile;
    }

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getSlide()
    {
        return $this->slide;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $slide
     */
    public function setSlide(\Doctrine\Common\Collections\Collection $slide)
    {
        $this->slide = $slide;
    }

    /**
     * @param File $spa_imageFile
     */
    public function setSpaImageFile(File $spa_imageFile)
    {
        $this->spa_imageFile = $spa_imageFile;


        if ($spa_imageFile) {
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
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

    /**
     * @param \BackendBundle\Entity\HomeIcons $part
     *
     * @return HomePage
     */
    public function addIcon(\BackendBundle\Entity\HomeIcons $part)
    {
        $part->setHomep($this);

        $this->icon->add($part);

        return $this;
    }

    /**
     * @param \BackendBundle\Entity\HomeIcons $part
     *
     */
    public function removeIcon(\BackendBundle\Entity\HomeIcons $part)
    {
        $this->icon->removeElement($part);
        $part->setHomep(null);

    }

    /**
     * @param \BackendBundle\Entity\HomeSlider $part
     *
     * @return HomePage
     */
    public function addSlide(\BackendBundle\Entity\HomeSlider $part)
    {
        $part->setHome($this);

        $this->slide->add($part);

        return $this;
    }

    /**
     * @param \BackendBundle\Entity\HomeSlider $part
     *
     */
    public function removeSlide(\BackendBundle\Entity\HomeSlider $part)
    {
        $this->slide->removeElement($part);
        $part->setHome(null);

    }

    public function __construct()
    {
        $this->updatedAt = new \DateTime('now');
        $this->icon = new ArrayCollection();
        $this->slide = new ArrayCollection();
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
    public function getSpaImageAlt()
    {
        return $this->spa_image_alt;
    }

    /**
     * @param mixed $spa_image_alt
     */
    public function setSpaImageAlt($spa_image_alt)
    {
        $this->spa_image_alt = $spa_image_alt;
    }

    /**
     * @return mixed
     */
    public function getSpaImageAltTrans()
    {
        return $this->spa_image_alt_trans;
    }

    /**
     * @param mixed $spa_image_alt_trans
     */
    public function setSpaImageAltTrans($spa_image_alt_trans)
    {
        $this->spa_image_alt_trans = $spa_image_alt_trans;
    }

    /**
     * @return mixed
     */
    public function getChaletImageAlt()
    {
        return $this->chalet_image_alt;
    }

    /**
     * @param mixed $chalet_image_alt
     */
    public function setChaletImageAlt($chalet_image_alt)
    {
        $this->chalet_image_alt = $chalet_image_alt;
    }

    /**
     * @return mixed
     */
    public function getChaletImageAltTrans()
    {
        return $this->chalet_image_alt_trans;
    }

    /**
     * @param mixed $chalet_image_alt_trans
     */
    public function setChaletImageAltTrans($chalet_image_alt_trans)
    {
        $this->chalet_image_alt_trans = $chalet_image_alt_trans;
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
}