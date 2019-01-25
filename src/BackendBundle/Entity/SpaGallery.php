<?php
namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="spa_gallery_table")
 * @Vich\Uploadable
 */
class SpaGallery
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="spa_gallery", fileNameProperty="image")
     * @var File
     */
    private $imageFile;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image_thumb;

    /**
     * @Vich\UploadableField(mapping="spa_gallery_thumb", fileNameProperty="image_thumb")
     * @var File
     */
    private $imageFile_thumb;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\SpaPage", inversedBy="gallery")
     * @ORM\JoinColumn(name="spa_id", referencedColumnName="id")
     */
    private $spa;

    /**
     * @ORM\Column(type="string")
     */
    private $image_alt;

    /**
     * @ORM\Column(type="string")
     */
    private $image_alt_trans;

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

    /**
     * @return mixed
     */
    public function getSpa()
    {
        return $this->spa;
    }

    /**
     * @param mixed $spa
     */
    public function setSpa($spa)
    {
        $this->spa = $spa;
    }

    /**
     * @return mixed
     */
    public function getImageThumb()
    {
        return $this->image_thumb;
    }

    /**
     * @param mixed $image_thumb
     */
    public function setImageThumb($image_thumb)
    {
        $this->image_thumb = $image_thumb;
    }

    /**
     * @return File
     */
    public function getImageFileThumb()
    {
        return $this->imageFile_thumb;
    }

    /**
     * @param File $imageFile_thumb
     */
    public function setImageFileThumb(File $imageFile_thumb)
    {
        $this->imageFile_thumb = $imageFile_thumb;
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
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }
}