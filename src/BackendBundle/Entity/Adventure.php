<?php
namespace BackendBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="adventure_table")
 * @Vich\Uploadable
 */
class Adventure
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
     * @var \Doctrine\Common\Collections\Collection
     * @ORM\OneToMany(targetEntity="BackendBundle\Entity\AdventurePart", mappedBy="adv", cascade={"persist", "remove"}, orphanRemoval=true)
     */
    private $part;

    /**
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getPart()
    {
        return $this->part;
    }

    /**
     * @param \Doctrine\Common\Collections\Collection $part
     */
    public function setPart($part)
    {
        $this->part = $part;
    }

    /**
     * @param \BackendBundle\Entity\AdventurePart $part
     *
     * @return Adventure
     */
    public function addPart(\BackendBundle\Entity\AdventurePart $part)
    {
        $part->setAdv($this);

        $this->part->add($part);

        return $this;
    }

    /**
     * @param \BackendBundle\Entity\AdventurePart $part
     *
     */
    public function removePart(\BackendBundle\Entity\AdventurePart $part)
    {
        $this->part->removeElement($part);
    }


    public function __construct()
    {
        $this->part = new ArrayCollection();
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
}