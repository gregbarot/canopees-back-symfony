<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use Symfony\Component\Serializer\Attribute\Groups;
use App\Repository\ContactMessageRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ContactMessageRepository::class)]
#[ApiResource(
    operations: [
        new Post(),
    ],
    denormalizationContext: ['groups' => ['contact_message:write']]
)]
class ContactMessage
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Groups(['contact_message:write'])]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    #[Groups(['contact_message:write'])]
    private ?string $email = null;

    #[ORM\Column(length: 50)]
    #[Groups(['contact_message:write'])]
    private ?string $phone = null;

    #[ORM\Column(length: 255, nullable: true)]
    #[Groups(['contact_message:write'])]
    private ?string $serviceRequested = null;

    #[ORM\Column(type: Types::TEXT)]
    #[Groups(['contact_message:write'])]
    private ?string $message = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $sentAt = null;

    #[ORM\Column]
    private ?bool $isRead = null;

    #[ORM\Column]
    private ?bool $isAnswered = null;


    //je crée une fonction qui va envoyer ces données à chaque POST de message car elles ne seront pas dans le formulaire.
    public function __construct()
{
    $this->sentAt = new \DateTimeImmutable();
    $this->isRead = false;
    $this->isAnswered = false;
}

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getServiceRequested(): ?string
    {
        return $this->serviceRequested;
    }

    public function setServiceRequested(?string $serviceRequested): static
    {
        $this->serviceRequested = $serviceRequested;

        return $this;
    }

    public function getMessage(): ?string
    {
        return $this->message;
    }

    public function setMessage(string $message): static
    {
        $this->message = $message;

        return $this;
    }

    public function getSentAt(): ?\DateTimeImmutable
    {
        return $this->sentAt;
    }

    public function setSentAt(\DateTimeImmutable $sentAt): static
    {
        $this->sentAt = $sentAt;

        return $this;
    }

    public function isRead(): ?bool
    {
        return $this->isRead;
    }

    public function setIsRead(bool $isRead): static
    {
        $this->isRead = $isRead;

        return $this;
    }

    public function isAnswered(): ?bool
    {
        return $this->isAnswered;
    }

    public function setIsAnswered(bool $isAnswered): static
    {
        $this->isAnswered = $isAnswered;

        return $this;
    }
}
