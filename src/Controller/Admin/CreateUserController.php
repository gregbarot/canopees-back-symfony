<?php

namespace App\Controller\Admin;

use App\Entity\User;
use App\Form\CreateUserType;
use App\Form\Model\CreateUserData;
use App\Repository\UserRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\FormError;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\PasswordHasher\Hasher\UserPasswordHasherInterface;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\Security\Http\Attribute\IsGranted;

#[IsGranted('ROLE_ADMIN')]
class CreateUserController extends AbstractController
{
    #[Route('/admin/create-user', name: 'admin_create_user')]
    public function index(
        Request $request,
        UserRepository $userRepository,
        UserPasswordHasherInterface $passwordHasher,
        EntityManagerInterface $entityManager
    ): Response {
        $createUserData = new CreateUserData();

        $form = $this->createForm(CreateUserType::class, $createUserData);

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $existingUser = $userRepository->findOneBy([
                'email' => $createUserData->email,
            ]);

            if ($existingUser) {
                $form->get('email')->addError(
                    new FormError('Un utilisateur existe déjà avec cette adresse email.')
                );

                return $this->render('admin/create_user.html.twig', [
                    'form' => $form,
                ]);
            }

            $user = new User();
            $user->setName($createUserData->name);
            $user->setEmail($createUserData->email);
            $user->setRoles($createUserData->roles);

            $hashedPassword = $passwordHasher->hashPassword(
                $user,
                $createUserData->password
            );

            $user->setPassword($hashedPassword);

            $entityManager->persist($user);
            $entityManager->flush();

            $this->addFlash('success', 'L’utilisateur a bien été créé.');

            return $this->redirectToRoute('admin_create_user');
        }

        return $this->render('admin/create_user.html.twig', [
            'form' => $form,
        ]);
    }
}