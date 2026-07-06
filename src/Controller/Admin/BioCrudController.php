<?php

namespace App\Controller\Admin;

use App\Entity\Bio;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class BioCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Bio::class;
    }

public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Biographie')
            ->setEntityLabelInPlural('Biographies')
            ->setPageTitle(Crud::PAGE_INDEX, 'Biographies de Bob et Tom')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier une biographie')
            ->setDefaultSort(['id' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),

            TextField::new('name', 'Nom de la société'),

            TextField::new('role', 'Rôle'),

            ImageField::new('imageUrl', 'Photo')
                ->setBasePath('')
                ->setUploadDir('public')
                ->setUploadedFileNamePattern('/assets/images/portrait/[uuid].[extension]')
                ->setRequired(false)
                ->setHelp('Photo affichée sur la page Qui sommes-nous.'),

            TextEditorField::new('description', 'Description')
                ->setHelp('Texte de présentation affiché sur le site.'),
        ];
    }

    //On empeche la création et la suppression des Bios
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }

    //on empeche l'envoi d'image vide si elle n'est pas modifiée
    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof Bio) {
            $originalData = $entityManager
                ->getUnitOfWork()
                ->getOriginalEntityData($entityInstance);

            if (!$entityInstance->getImageUrl() && isset($originalData['imageUrl'])) {
                $entityInstance->setImageUrl($originalData['imageUrl']);
            }
        }

        parent::updateEntity($entityManager, $entityInstance);
    }
}
