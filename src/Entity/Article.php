<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ArticleRepository::class)
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $srcImage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $altImage;

    /**
     * @ORM\OneToMany(targetEntity=CommentaireArticle::class, mappedBy="article")
     */
    private $commentaireArticles;

    public function __construct()
    {
        $this->commentaireArticles = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
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

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getSrcImage(): ?string
    {
        return $this->srcImage;
    }

    public function setSrcImage(string $srcImage): self
    {
        $this->srcImage = $srcImage;

        return $this;
    }

    public function getAltImage(): ?string
    {
        return $this->altImage;
    }

    public function setAltImage(string $altImage): self
    {
        $this->altImage = $altImage;

        return $this;
    }

    /**
     * @return Collection|CommentaireArticle[]
     */
    public function getCommentaireArticles(): Collection
    {
        return $this->commentaireArticles;
    }

    public function addCommentaireArticle(CommentaireArticle $commentaireArticle): self
    {
        if (!$this->commentaireArticles->contains($commentaireArticle)) {
            $this->commentaireArticles[] = $commentaireArticle;
            $commentaireArticle->setArticle($this);
        }

        return $this;
    }

    public function removeCommentaireArticle(CommentaireArticle $commentaireArticle): self
    {
        if ($this->commentaireArticles->contains($commentaireArticle)) {
            $this->commentaireArticles->removeElement($commentaireArticle);
            // set the owning side to null (unless already changed)
            if ($commentaireArticle->getArticle() === $this) {
                $commentaireArticle->setArticle(null);
            }
        }

        return $this;
    }
}
