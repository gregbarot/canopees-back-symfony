<?php

namespace App\Controller\Admin;

use App\Entity\SliderImage;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IntegerField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SliderImageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return SliderImage::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Image du slider')
            ->setEntityLabelInPlural('Images du slider')
            ->setPageTitle(Crud::PAGE_INDEX, 'Images du slider')
            ->setPageTitle(Crud::PAGE_NEW, 'Ajouter une image au slider')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier une image du slider')
            ->setDefaultSort(['position' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),

            ImageField::new('imageUrl', 'URL de l’image')
                ->setBasePath('')
                ->setUploadDir('public')
                ->setUploadedFileNamePattern('/assets/images/slider/[uuid].[extension]')
                ->setRequired(false)
                ->setHelp('Image utilisée dans le slider d’accueil. Formats conseillés : JPG, PNG ou WEBP.'),

            TextField::new('altText', 'Texte alternatif')
                ->setHelp('Texte décrivant l’image pour l’accessibilité.'),

            IntegerField::new('position', 'Position')
                ->setHelp('Ordre d’affichage dans le slider.'),

            BooleanField::new('isActive', 'Active'),
        ];
    }

    //si on ne modifie que le texte ça n'efface pas l'image
    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
    if ($entityInstance instanceof SliderImage) {
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

