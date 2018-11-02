<?php
namespace BackendBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Gedmo\Mapping\Annotation as Gedmo;
use Vich\UploaderBundle\Mapping\Annotation as Vich;

/**
 * @ORM\Entity()
 * @ORM\Table(name="home_icons_table")
 * @Vich\Uploadable
 */
class HomeIcons
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
    private $titletrans;

    /**
     * Many Features have One Product.
     * @ORM\ManyToOne(targetEntity="BackendBundle\Entity\HomePage", inversedBy="icon", cascade={"persist"})
     * @ORM\JoinColumn(name="home_id", referencedColumnName="id")
     */
    private $homep;

    /**
     * @return mixed
     */
    public function getHomep()
    {
        return $this->homep;
    }


    public function setHomep(\BackendBundle\Entity\HomePage $homep = null)
    {
        $this->homep = $homep;

        return $this;
    }

    public function __toString()
    {
        return (string)$this->getTitle();
    }

    /**
     * @return mixed
     */
    public function getTitletrans()
    {
        return $this->titletrans;
    }

    /**
     * @param mixed $titletrans
     */
    public function setTitletrans($titletrans)
    {
        $this->titletrans = $titletrans;
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
     * @param mixed $description
     */
    public function setDescription($description)
    {
        $this->description = $description;
    }
}