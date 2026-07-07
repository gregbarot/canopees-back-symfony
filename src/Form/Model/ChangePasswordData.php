<?php

namespace App\Form\Model;

use Symfony\Component\Security\Core\Validator\Constraints as SecurityAssert;
use Symfony\Component\Validator\Constraints as Assert;

class ChangePasswordData
{
    #[Assert\NotBlank(message: 'Veuillez saisir votre mot de passe actuel.')]
    #[SecurityAssert\UserPassword(message: 'Le mot de passe actuel est incorrect.')]
    public ?string $currentPassword = null;

    #[Assert\NotBlank(message: 'Veuillez saisir un nouveau mot de passe.')]
    #[Assert\Length(
        min: 8,
        minMessage: 'Le nouveau mot de passe doit contenir au moins {{ limit }} caractères.'
    )]
    public ?string $newPassword = null;
}