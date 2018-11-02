<?php
namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="about_us_features_table")
 * @Vich\Uploadable
 */
class AboutUsFeatures
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
     * @ORM\Column(type="string", nullable=true)
     */
    private $icon;

    /**
     * @return mixed
     */
    public function getIcon()
    {
        return $this->icon;
    }

    /**
     * @param mixed $icon
     */
    public function setIcon($icon)
    {
        $this->icon = $icon;
    }

//    /**
//     * @ORM\Column(type="string", nullable=true)
//     */
//    private $image;
//
//    /**
//     * @Vich\UploadableField(mapping="amenitie_part", fileNameProperty="image")
//     * @var File
//     */
//    private $imageFile;
//
//    /**
//     * @ORM\Column(type="datetime", nullable=true)
//     * @var \DateTime
//     */
//    private $updatedAt;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\AboutPage", inversedBy="feature")
     * @ORM\JoinColumn(name="about_id", referencedColumnName="id")
     */
    private $i;

//    public function __construct()
//    {
//        $this->updatedAt = new \DateTime('now');
//    }

    /**
     * @param \BackendBundle\Entity\AboutPage $c
     *
     * @return AboutUsFeatures
     */
    public function setI(\BackendBundle\Entity\AboutPage $c = null)
    {
        $this->i = $c;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getI()
    {
        return $this->i;
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

    public function __toString()
    {
        return (string)$this->getTitle();
    }
}