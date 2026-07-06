<?php

namespace App\Controller\Admin;

use App\Entity\ServiceImage;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ServiceImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ServiceImage::class;
    }

public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Image de prestation')
            ->setEntityLabelInPlural('Images des prestations')
            ->setPageTitle(Crud::PAGE_INDEX, 'Images des prestations')
            ->setPageTitle(Crud::PAGE_NEW, 'Ajouter une image de prestation')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier une image de prestation')
            ->setDefaultSort(['id' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),

            AssociationField::new('service', 'Prestation')
                ->setFormTypeOption('choice_label', 'name')
                ->formatValue(function ($value, ServiceImage $serviceImage) {
                    return $serviceImage->getService()?->getName();
                })
                ->setHelp('Prestation à laquelle cette image est associée.'),

            ImageField::new('imageUrl', 'Image')
                ->setBasePath('')
                ->setUploadDir('public')
                ->setUploadedFileNamePattern('/assets/images/services/[uuid].[extension]')
                ->setRequired($pageName === Crud::PAGE_NEW)
                ->setHelp('Image affichée pour une prestation.'),

            TextField::new('altText', 'Texte alternatif')
                ->setHelp('Texte décrivant l’image pour l’accessibilité.'),

            BooleanField::new('isMain', 'Image principale')
                ->setHelp('Indique si cette image est l’image principale de la prestation.'),

            BooleanField::new('isActive', 'Active')
                ->setHelp('Permet de masquer une image sans la supprimer.')
        ];
    }

    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
        if ($entityInstance instanceof ServiceImage) {
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