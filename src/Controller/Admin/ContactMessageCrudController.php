<?php

namespace App\Controller\Admin;

use App\Entity\ContactMessage;
use EasyCorp\Bundle\EasyAdminBundle\Config\Action;
use EasyCorp\Bundle\EasyAdminBundle\Config\Actions;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\BooleanField;
use EasyCorp\Bundle\EasyAdminBundle\Field\DateTimeField;
use EasyCorp\Bundle\EasyAdminBundle\Field\EmailField;
use EasyCorp\Bundle\EasyAdminBundle\Field\IdField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextareaField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class ContactMessageCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return ContactMessage::class;
    }


    //configuration de l'apparence et comportements du CRUD
        public function configureCrud(Crud $crud): Crud
    {
        return $crud
            ->setEntityLabelInSingular('Message de contact')
            ->setEntityLabelInPlural('Messages de contact')
            ->setPageTitle(Crud::PAGE_INDEX, 'Messages de contact')
            ->setPageTitle(Crud::PAGE_DETAIL, 'Détail du message')
            ->setPageTitle(Crud::PAGE_EDIT, 'Traitement du message')
            ->setDefaultSort(['sentAt' => 'DESC']);
    }
    
    public function configureFields(string $pageName): iterable
    {
        return [
           IdField::new('id')
                ->hideOnForm(),

            TextField::new('name', 'Nom'),

            EmailField::new('email', 'Email'),

            TextField::new('phone', 'Téléphone'),

            TextField::new('serviceRequested', 'Prestation demandée'),

            TextareaField::new('message', 'Message')
                ->hideOnIndex(),

            DateTimeField::new('sentAt', 'Date d’envoi')
                ->hideOnForm(),

            BooleanField::new('isRead', 'Lu'),

            BooleanField::new('isAnswered', 'Répondu'),
        ];
    }


    //actions personnalisées.
    public function configureActions(Actions $actions): Actions
    {
        return $actions
            ->disable(Action::NEW)
            ->add(Crud::PAGE_INDEX, Action::DETAIL)
            ->update(Crud::PAGE_INDEX, Action::DETAIL, function (Action $action) {
                return $action
                    ->setLabel('Lire')
                    ->setIcon('fa fa-eye');
            })
            ->update(Crud::PAGE_INDEX, Action::EDIT, function (Action $action) {
                return $action
                    ->setLabel('Traiter')
                    ->setIcon('fa fa-pen');
            });
    }
    
}
