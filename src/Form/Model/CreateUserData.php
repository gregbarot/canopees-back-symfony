<?php

namespace App\Form\Model;

use Symfony\Component\Validator\Constraints as Assert;

class CreateUserData
{
    #[Assert\NotBlank(message: 'Veuillez saisir un nom.')]
    public ?string $name = null;

    #[Assert\NotBlank(message: 'Veuillez saisir une adresse email.')]
    #[Assert\Email(message: 'Veuillez saisir une adresse email valide.')]
    public ?string $email = null;

    #[Assert\NotBlank(message: 'Veuillez choisir au moins un rôle.')]
    public array $roles = ['ROLE_ADMIN'];

    #[Assert\NotBlank(message: 'Veuillez saisir un mot de passe.')]
    #[Assert\Length(
        min: 8,
        minMessage: 'Le mot de passe doit contenir au moins {{ limit }} caractères.'
    )]
    public ?string $password = null;
}