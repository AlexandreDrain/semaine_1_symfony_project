<?php

namespace App\Entity;

use App\Repository\ProductRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductRepository::class)
 */
class Product
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
    private $title;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=0)
     */
    private $price;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $image;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $alt;

    /**
     * @ORM\ManyToOne(targetEntity=Category::class, inversedBy="products")
     * @ORM\JoinColumn(nullable=false)
     */
    private $categories;

    /**
     * @ORM\Column(type="text")
     */
    private $description;

    /**
     * @ORM\OneToMany(targetEntity=ProductImageRelative::class, mappedBy="product")
     */
    private $productImageRelatives;

    /**
     * @ORM\OneToMany(targetEntity=CommentaireProduit::class, mappedBy="product")
     */
    private $commentaireProduits;

    public function __construct()
    {
        $this->productImageRelatives = new ArrayCollection();
        $this->commentaireProduits = new ArrayCollection();
    }


    public function __toString() {

        return $this->categories;

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getAlt(): ?string
    {
        return $this->alt;
    }

    public function setAlt(string $alt): self
    {
        $this->alt = $alt;

        return $this;
    }

    public function getCategories(): ?Category
    {
        return $this->categories;
    }

    public function setCategories(?Category $categories): self
    {
        $this->categories = $categories;

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

    /**
     * @return Collection|ProductImageRelative[]
     */
    public function getProductImageRelatives(): Collection
    {
        return $this->productImageRelatives;
    }

    public function addProductImageRelative(ProductImageRelative $productImageRelative): self
    {
        if (!$this->productImageRelatives->contains($productImageRelative)) {
            $this->productImageRelatives[] = $productImageRelative;
            $productImageRelative->setProduct($this);
        }

        return $this;
    }

    public function removeProductImageRelative(ProductImageRelative $productImageRelative): self
    {
        if ($this->productImageRelatives->contains($productImageRelative)) {
            $this->productImageRelatives->removeElement($productImageRelative);
            // set the owning side to null (unless already changed)
            if ($productImageRelative->getProduct() === $this) {
                $productImageRelative->setProduct(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|CommentaireProduit[]
     */
    public function getCommentaireProduits(): Collection
    {
        return $this->commentaireProduits;
    }

    public function addCommentaireProduit(CommentaireProduit $commentaireProduit): self
    {
        if (!$this->commentaireProduits->contains($commentaireProduit)) {
            $this->commentaireProduits[] = $commentaireProduit;
            $commentaireProduit->setProduct($this);
        }

        return $this;
    }

    public function removeCommentaireProduit(CommentaireProduit $commentaireProduit): self
    {
        if ($this->commentaireProduits->contains($commentaireProduit)) {
            $this->commentaireProduits->removeElement($commentaireProduit);
            // set the owning side to null (unless already changed)
            if ($commentaireProduit->getProduct() === $this) {
                $commentaireProduit->setProduct(null);
            }
        }

        return $this;
    }
}
