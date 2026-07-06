<?php

namespace App\Controller\Admin;

use App\Entity\RealisationImage;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class RealisationImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return RealisationImage::class;
    }

    //configuration de l'affichage
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Image de réalisation')
            ->setEntityLabelInPlural('Images des réalisations')
            ->setPageTitle(Crud::PAGE_INDEX, 'Images des réalisations')
            ->setPageTitle(Crud::PAGE_NEW, 'Ajouter une image de réalisation')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier une image de réalisation')
            ->setDefaultSort(['id' => 'ASC']);
    }

    //configuration des champs
    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),

            ImageField::new('imageUrl', 'Image')
                ->setBasePath('')
                ->setUploadDir('public')
                ->setUploadedFileNamePattern('/assets/images/realisations/[uuid].[extension]')
                ->setRequired($pageName === Crud::PAGE_NEW)
                ->setHelp('Image affichée dans le carrousel des réalisations.'),

            TextField::new('altText', 'Texte alternatif')
                ->setHelp('Texte décrivant l’image pour l’accessibilité.'),
        ];
    }

    //gestion de probleme d'image vide
    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof RealisationImage) {
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