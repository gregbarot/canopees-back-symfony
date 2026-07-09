<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\Serializer\Attribute\Groups;
use App\Repository\ServiceImageRepository;
use Doctrine\ORM\Mapping as ORM;


#[ORM\Entity(repositoryClass: ServiceImageRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(),
        new Get(),
    ],
    normalizationContext: ['groups' => ['service_image:read']]
)]
class ServiceImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['service_image:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['service_image:read'])]
    private ?string $imageUrl = null;

    #[ORM\Column]
    #[Groups(['service_image:read'])]
    private ?bool $isMain = null;

    #[ORM\Column(length: 255)]
    #[Groups(['service_image:read'])]
    private ?string $altText = null;

    #[ORM\ManyToOne(inversedBy: 'serviceImages')]
    #[ORM\JoinColumn(nullable: false)]
    #[Groups(['service_image:read'])]
    private ?Service $service = null;

    #[ORM\Column(options: ['default' => true])]
    #[Groups(['service_image:read'])]
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

    #[Groups(['service_image:read'])]
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

    #[Groups(['service_image:read'])]
    public function getService(): ?Service
    {
        return $this->service;
    }

    public function setService(?Service $service): static
    {
        $this->service = $service;

        return $this;
    }

    #[Groups(['service_image:read'])]
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
