<?php

namespace App\Controller\Admin;

use App\Entity\PageContent;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextEditorField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class PageContentCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return PageContent::class;
    }

    
    public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Contenu de page')
            ->setEntityLabelInPlural('Contenus des pages')
            ->setPageTitle(Crud::PAGE_INDEX, 'Contenus des pages')
            ->setPageTitle(Crud::PAGE_EDIT, 'Modifier un contenu')
            ->setDefaultSort(['id' => 'ASC']);
    }

    public function configureFields(string $pageName): iterable
    {
        return [
            IdField::new('id')
                ->hideOnForm(),

            TextField::new('page', 'Page')
                ->setFormTypeOption('disabled', true),

            TextField::new('section', 'Sections')
                ->setFormTypeOption('disabled', true),

            TextField::new('title', 'Titre'),
            
            TextField::new('subtitle', 'Sous-Titre'),

            TextEditorField::new('textContent', "Contenu")

        ];
    }

    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW, Action::DELETE);
    }
    
}
