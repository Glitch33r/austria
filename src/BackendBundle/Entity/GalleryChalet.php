<?php
namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="chalet_gallery_table")
 * @Vich\Uploadable
 */
class GalleryChalet
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     * @ORM\Column(type="integer")
     */
    private $id;

//    /**
//     * @ORM\Column(type="string", nullable=true)
//     */
//    private $title;
//
//    /**
//     * @ORM\Column(type="text", nullable=true)
//     */
//    private $description;
//
//    /**
//     * @ORM\Column(type="string", nullable=true)
//     */
//    private $title_trans;
//
//    /**
//     * @ORM\Column(type="text", nullable=true)
//     */
//    private $description_trans;

    /**
     * @ORM\Column(type="string")
     */
    private $image;

    /**
     * @Vich\UploadableField(mapping="chalet_gallery", fileNameProperty="image")
     * @var File
     */
    private $imageFile;


    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $image_thumb;

    /**
     * @Vich\UploadableField(mapping="chalet_gallery_thumb", fileNameProperty="image_thumb")
     * @var File
     */
    private $imageFile_thumb;

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

        if ($imageFile_thumb) {
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
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\ChaletPage", inversedBy="gallery")
     * @ORM\JoinColumn(name="chalet_id", referencedColumnName="id")
     */
    private $chalet;

    public function __construct()
    {
        $this->updatedAt = new \DateTime('now');
    }

    /**
     * @return mixed
     */
    public function getChalet()
    {
        return $this->chalet;
    }

    /**
     * @param mixed $chalet
     */
    public function setChalet($chalet)
    {
        $this->chalet = $chalet;
    }


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
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
}