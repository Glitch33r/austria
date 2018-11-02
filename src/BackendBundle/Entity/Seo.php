<?php
namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="seo_table")
 * @Vich\Uploadable
 */
class Seo
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
    private $page;

    /**
     * @Gedmo\Slug(fields={"page"},unique=true,separator="-")
     * @ORM\Column(name="slug", length=255, unique=true)
     */
    private $slug;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $title;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $h1;

    /**
     * @ORM\Column(type="string", nullable=true)
     */
    private $h1_trans;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $description;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $keywords;

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
    private $keywords_trans;

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
     * @return mixed
     */
    public function getH1()
    {
        return $this->h1;
    }

    /**
     * @param mixed $h1
     */
    public function setH1($h1)
    {
        $this->h1 = $h1;
    }

    /**
     * @return mixed
     */
    public function getH1Trans()
    {
        return $this->h1_trans;
    }

    /**
     * @param mixed $h1_trans
     */
    public function setH1Trans($h1_trans)
    {
        $this->h1_trans = $h1_trans;
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
    public function getKeywordsTrans()
    {
        return $this->keywords_trans;
    }

    /**
     * @param mixed $keywords_trans
     */
    public function setKeywordsTrans($keywords_trans)
    {
        $this->keywords_trans = $keywords_trans;
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
    public function getPage()
    {
        return $this->page;
    }

    /**
     * @return mixed
     */
    public function getKeywords()
    {
        return $this->keywords;
    }

    /**
     * @param mixed $keywords
     */
    public function setKeywords($keywords)
    {
        $this->keywords = $keywords;
    }

    /**
     * @param mixed $page
     */
    public function setPage($page)
    {
        $this->page = $page;
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
}