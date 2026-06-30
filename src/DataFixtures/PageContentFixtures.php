<?php

namespace App\DataFixtures;

use App\Entity\PageContent;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class PageContentFixtures extends Fixture
{
    public function load(ObjectManager $manager): void 
    {
    //Contenu des pages
    $pageContents = [

        //Page d'accueil
            //slider
        [
        'page' => 'accueil',
        'section' => 'slider',
        'title' => "Création et entretien d'espaces verts",
        'subtitle' => 'Découvrez nos prestations',
        'textContent' => '',
        ],
            //Description courte
        [
        'page' => 'accueil',
        'section' => 'description',
        'title' => "Donner vie à vos espaces extérieurs.",
        'subtitle' => 'Découvrez nos prestations',
        'textContent' => <<<HTML
        <p>
            <strong>Canopées</strong> accompagne les particuliers, les professionnels et les collectivités dans la conception, la création et l’entretien de leurs espaces verts.
        </p>
        <p>
            De l’aménagement paysager à la taille, l’élagage ou l’abattage, chaque intervention est pensée avec soin, dans le <strong>respect du vivant</strong> et de l’équilibre naturel des lieux.
        </p>
        <p>
            Engagée dans une démarche durable, l’entreprise valorise ses déchets verts, notamment par le compostage, afin de limiter son impact environnemental.
        </p>
        HTML,
        ],
            //Publics cibles - clients
        [
        'page' => 'accueil',
        'section' => 'clients',
        'title' => "A qui s'adressent nos services ?",
        'subtitle' => '',
        'textContent' => '',
        ],
            //Dernières réalisations
        [
        'page' => 'accueil',
        'section' => 'realisations',
        'title' => "Nos dernières réalisations",
        'subtitle' => '',
        'textContent' => '',
        ],


        //Page Qui-sommes-nous?
            //La société
        [
        'page' => 'qui-sommes-nous',
        'section' => 'societe',
        'title' => 'Qui Sommes Nous?',
        'subtitle' => '',
        'textContent' => '',
        ],
            //L'équipe
        [
        'page' => 'qui-sommes-nous',
        'section' => 'equipe',
        'title' => "L'équipe",
        'subtitle' => '',
        'textContent' => '',
        ],

        //Page Prestations
        [
        'page' => 'prestations',
        'section' => 'introduction',
        'title' => 'Nos prestations.',
        'subtitle' => '',
        'textContent' => '',
        ],

        //Page Tarifs
        [
        'page' => 'tarifs',
        'section' => 'introduction',
        'title' => 'Tarifs de nos prestations.',
        'subtitle' => '',
        'textContent' => <<<HTML
        <p>
            Chaque espace vert possède ses <strong>propres besoins</strong>.
            Canopées propose des <strong>prestations adaptées</strong> aux
            particuliers, professionnels et collectivités, avec des tarifs pensés
            selon la nature de l’intervention.
        </p>
        HTML,
        ],
                    
        //Page Contact
            //Infos
        [
        'page' => 'contact',
        'section' => 'infos',
        'title' => 'Bob et Tom',
        'subtitle' => 'Gérants de Canopées',
        'textContent' => 'Une question, un besoin d’entretien ou un projet d’aménagement ? L’équipe Canopées vous accompagne avec écoute et savoir-faire.',
        ],
            //Horaires
        [
        'page' => 'contact',
        'section' => 'horaires',
        'title' => 'Horaires',
        'subtitle' => '',
        'textContent' => <<<HTML
        <p>
            <strong>Lundi au Vendredi</strong>
        </p>
        <p>8h30 - 12h00 / 13h30 - 17h30</p>
        <p>
            <strong>Samedi -Dimanche :</strong> fermé
        </p>
        HTML,
        ],
        ];
                
        foreach ($pageContents as $data) {
            $pageContent = new PageContent();
            $pageContent->setPage($data['page']);
            $pageContent->setSection($data['section']);
            $pageContent->setTitle($data['title']);
            $pageContent->setSubtitle($data['subtitle']);
            $pageContent->setTextContent($data['textContent']);
            
            $manager->persist($pageContent);
            }

        $manager->flush();
   }
}