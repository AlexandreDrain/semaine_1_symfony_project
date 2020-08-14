<?php

namespace App\Entity;

use App\Repository\SliderRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=SliderRepository::class)
 */
class Slider
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
    private $nameImage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $srcImage;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $altImage;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNameImage(): ?string
    {
        return $this->nameImage;
    }

    public function setNameImage(string $nameImage): self
    {
        $this->nameImage = $nameImage;

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
}
