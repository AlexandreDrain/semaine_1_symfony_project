<?php

namespace App\Entity;

use App\Repository\ProductImageRelativeRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProductImageRelativeRepository::class)
 */
class ProductImageRelative
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
     * @ORM\Column(type="string", length=255)
     */
    private $srcImage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $altImage;

    /**
     * @ORM\ManyToOne(targetEntity=Product::class, inversedBy="productImageRelatives")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

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

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }
}
