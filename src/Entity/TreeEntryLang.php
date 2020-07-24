<?php

namespace App\Entity;

use App\Repository\TreeEntryLangRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=TreeEntryLangRepository::class)
 */
class TreeEntryLang
{

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="TreeEntry", inversedBy="lang")
     * @ORM\JoinColumn(name="entry_id", referencedColumnName="id")
     */
    private $treeEntry;

    /**
     * @ORM\Column(type="string", length=3)
     */
    private $lang;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

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
    public function getTreeEntry()
    {
        return $this->treeEntry;
    }

    /**
     * @param mixed $treeEntry
     */
    public function setTreeEntry($treeEntry): void
    {
        $this->treeEntry = $treeEntry;
    }


    public function getLang(): ?string
    {
        return $this->lang;
    }

    public function setLang(string $lang): self
    {
        $this->lang = $lang;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }
}
