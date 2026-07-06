<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use App\Repository\ServiceImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ServiceImageRepository::class)]
#[ApiResource()]
class ServiceImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $imageUrl = null;

    #[ORM\Column]
    private ?bool $isMain = null;

    #[ORM\Column(length: 255)]
    private ?string $altText = null;

    #[ORM\ManyToOne(inversedBy: 'serviceImages')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Service $service = null;

    #[ORM\Column(options: ['default' => true])]
    private ?bool $isActive = true;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageUrl(): ?string
    {
        return $this->imageUrl;
    }

    public function setImageUrl(string $imageUrl): static
    {
        $this->imageUrl = $imageUrl;

        return $this;
    }

    public function isMain(): ?bool
    {
        return $this->isMain;
    }

    public function setIsMain(bool $isMain): static
    {
        $this->isMain = $isMain;

        return $this;
    }

    public function getAltText(): ?string
    {
        return $this->altText;
    }

    public function setAltText(string $altText): static
    {
        $this->altText = $altText;

        return $this;
    }

    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): static
    {
        $this->service = $service;

        return $this;
    }

    public function isActive(): ?bool
    {
        return $this->isActive;
    }

    public function setIsActive(bool $isActive): static
    {
        $this->isActive = $isActive;

        return $this;
    }
}
