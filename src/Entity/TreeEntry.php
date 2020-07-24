<?php

namespace App\Entity;

use App\Repository\TreeEntryRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TreeEntryRepository::class)
 */
class TreeEntry
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * One TreeEntry has Many TreeEntries.
     * @ORM\OneToMany(targetEntity="TreeEntry", mappedBy="parent")
     */
    private $children;

    /**
     * Many TreeEntries have One TreeEntry.
     * @ORM\ManyToOne(targetEntity="TreeEntry", inversedBy="children")
     * @ORM\JoinColumn(name="parent_id", referencedColumnName="id", columnDefinition="DEFAULT 0")
     */
    private $parent = 0;


    /**
     * @ORM\OneToMany(targetEntity="TreeEntryLang", mappedBy="treeEntry")
     */
    private $lang;

    /**
     * TreeEntry constructor.
     */
    public function __construct() {
        $this->children = new ArrayCollection();
    }

    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getChildren()
    {
        return $this->children;
    }

    /**
     * @param mixed $children
     */
    public function setChildren($children): void
    {
        $this->children = $children;
    }

    /**
     * @return mixed
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * @param mixed $parent
     */
    public function setParent($parent): void
    {
        $this->parent = $parent;
    }

    /**
     * @return mixed
     */
    public function getLang()
    {
        return $this->lang;
    }

    /**
     * @param mixed $lang
     */
    public function setLang($lang): void
    {
        $this->lang = $lang;
    }

}
