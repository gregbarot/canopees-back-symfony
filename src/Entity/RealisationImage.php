<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Get;
use ApiPlatform\Metadata\GetCollection;
use Symfony\Component\Serializer\Attribute\Groups;
use App\Repository\RealisationImageRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: RealisationImageRepository::class)]
#[ApiResource(
    operations: [
        new GetCollection(),
        new Get(),
    ],
    normalizationContext: ['groups' => ['realisation_image:read']]
)]
class RealisationImage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups(['realisation_image:read'])]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['realisation_image:read'])]
    private ?string $imageUrl = null;

    #[ORM\Column(length: 255)]
    #[Groups(['realisation_image:read'])]
    private ?string $altText = null;

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

    public function getAltText(): ?string
    {
        return $this->altText;
    }

    public function setAltText(string $altText): static
    {
        $this->altText = $altText;

        return $this;
    }
}
