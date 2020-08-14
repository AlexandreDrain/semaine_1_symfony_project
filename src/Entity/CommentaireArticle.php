<?php

namespace App\Entity;

use \DateTime;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\CommentaireArticleRepository;

/**
 * @ORM\Entity(repositoryClass=CommentaireArticleRepository::class)
 */
class CommentaireArticle
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
    private $userName;

    /**
     * @ORM\Column(type="text")
     */
    private $userCommentaire;

    /**
     * @ORM\Column(type="datetime")
     */
    private $publishedAt;

    /**
     * @ORM\ManyToOne(targetEntity=Article::class, inversedBy="commentaireArticles")
     */
    private $article;

    public function __construct() {

        $this->publishedAt = new DateTime();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }

    public function getUserCommentaire(): ?string
    {
        return $this->userCommentaire;
    }

    public function setUserCommentaire(string $userCommentaire): self
    {
        $this->userCommentaire = $userCommentaire;

        return $this;
    }

    public function getPublishedAt(): ?\DateTimeInterface
    {
        return $this->publishedAt;
    }

    public function setPublishedAt(\DateTimeInterface $publishedAt): self
    {
        $this->publishedAt = $publishedAt;

        return $this;
    }

    public function getArticle(): ?Article
    {
        return $this->article;
    }

    public function setArticle(?Article $article): self
    {
        $this->article = $article;

        return $this;
    }
}
