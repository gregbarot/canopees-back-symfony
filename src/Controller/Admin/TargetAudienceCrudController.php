<?php

namespace App\Controller\Admin;

use App\Entity\TargetAudience;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\ImageField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class TargetAudienceCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return TargetAudience::class;
    }

    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Public cible')
            ->setEntityLabelInPlural('Publics cibles')
            ->setPageTitle(Crud::PAGE_INDEX, 'Publics cibles')
            ->setPageTitle(Crud::PAGE_NEW, 'Ajouter un public cible')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier un public cible')
            ->setDefaultSort(['id' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),

            TextField::new('name', 'Nom'),

            ImageField::new('imageUrl', 'Image')
                ->setBasePath('')
                ->setUploadDir('public')
                ->setUploadedFileNamePattern('/assets/images/publiccible/[uuid].[extension]')
                ->setRequired(false)
                ->setHelp('Image associée au public cible.'),

            TextareaField::new('description', 'Description'),
        ];
    }

    public function configureActions(Actions $actions): Actions
    {
    return $actions
        ->disable(Action::NEW, Action::DELETE);
    }

    //si on ne modifie que le texte ça n'efface pas l'image
    public function updateEntity(EntityManagerInterface $entityManager, $entityInstance): void
    {
    if ($entityInstance instanceof TargetAudience) {
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
