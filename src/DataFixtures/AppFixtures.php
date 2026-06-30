<?php

namespace App\DataFixtures;

use App\Entity\Bio;
use App\Entity\PageContent;
use App\Entity\RealisationImage;
use App\Entity\Service;
use App\Entity\ServiceImage;
use App\Entity\SliderImage;
use App\Entity\TargetAudience;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Slider
        $slides = [
            [
                'imageUrl' => '/assets/images/slider/slide_01.png',
                'altText' => 'Jardin paysager',
                'position' => 1,
                'isActive' => true,
            ],
            [
                'imageUrl' => '/assets/images/slider/slide_02.png',
                'altText' => 'Élagage d’arbre',
                'position' => 2,
                'isActive' => true,
            ],
            [
                'imageUrl' => '/assets/images/slider/slide_03.png',
                'altText' => 'Entretien d’espace vert',
                'position' => 3,
                'isActive' => true,
            ],
            [
                'imageUrl' => '/assets/images/slider/slide_04.png',
                'altText' => 'Aménagement extérieur',
                'position' => 4,
                'isActive' => true,
            ],
        ];

        foreach ($slides as $data) {
            $slide = new SliderImage();
            $slide->setImageUrl($data['imageUrl']);
            $slide->setAltText($data['altText']);
            $slide->setPosition($data['position']);
            $slide->setIsActive($data['isActive']);

            $manager->persist($slide);
        }



        // Contenu de page
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

        // Publics cibles - Target
        $targetAudiences = [
            [
                'name' => 'Particuliers',
                'imageUrl' => '/assets/images/publiccibles/particuliers.png',
                'description' => 'Nous créons et entretenons des jardins sur mesure, pensés pour votre confort, votre style de vie et votre environnement.',
            ],
            [
                'name' => 'Professionnels',
                'imageUrl' => '/assets/images/publiccibles/professionnels.png',
                'description' => 'Nous valorisons vos espaces extérieurs pour renforcer votre image, accueillir vos clients et améliorer le cadre de travail.',
            ],
            [
                'name' => 'Collectivités',
                'imageUrl' => '/assets/images/publiccibles/collectivites.png',
                'description' => 'Nous aménageons et entretenons des espaces publics durables, favorisant le bien-être des usagers et la biodiversité locale.',
            ],
        ];

        foreach ($targetAudiences as $data) {
            $targetAudience = new TargetAudience();
            $targetAudience->setName($data['name']);
            $targetAudience->setImageUrl($data['imageUrl']);
            $targetAudience->setDescription($data['description']);

            $manager->persist($targetAudience);
        }

        // Bios
        //Canopées
        $canopees = new Bio();
        $canopees->setName('Canopées');
        $canopees->setRole('Société');
        $canopees->setImageUrl('/assets/images/portrait/bob-et-tom.png');
        $canopees->setDescription(
            <<<HTML
        <p>
            La société <strong>Canopées</strong> est née en 2020 de la rencontre
            entre deux passionnés de nature, Bob et Tom. Amis de longue date,
            ils partageaient une conviction forte : les espaces verts ne sont
            pas seulement des éléments décoratifs, mais de véritables lieux de
            vie, essentiels au bien-être et à l’équilibre des environnements
            urbains et ruraux.
        </p>
        <p>
            Animés par cette vision, ils ont décidé de créer une entreprise
            capable d’accompagner particuliers, professionnels et collectivités
            territoriales dans la conception, la création et l’entretien de
            leurs espaces extérieurs. Dès ses débuts, <strong>Canopées</strong> s’est distinguée par une approche à la fois technique et sensible,
            mêlant savoir-faire paysager et respect profond du vivant.
        </p>
        <p>
            Au fil des projets, la société a développé une expertise complète
            couvrant l’ensemble des besoins liés aux espaces verts. De la
            conception sur mesure de jardins et d’aménagements paysagers à leur
            réalisation concrète, <strong>Canopées</strong> s’engage à créer des
            espaces harmonieux, durables et adaptés à chaque client. L’entretien
            régulier des espaces verts constitue également un pilier de son
            activité, garantissant la pérennité et la qualité des aménagements
            réalisés.
        </p>
        <p>
            L’entreprise intervient aussi dans des opérations plus techniques
            telles que la taille des haies, l’élagage ou encore l’abattage
            d’arbres, toujours dans le respect des règles de sécurité et de
            l’équilibre écologique. Chaque intervention est pensée pour
            préserver la santé des végétaux et favoriser la biodiversité.
        </p>
        <p>
            Fidèle à ses valeurs fondatrices, <strong>Canopées</strong> a
            intégré très tôt une démarche écoresponsable dans son
            fonctionnement. La valorisation des déchets verts, notamment par le
            compostage, s’inscrit au cœur de sa charte graphique et de son
            identité. Cette approche permet de limiter l’impact environnemental
            de ses activités tout en participant à un cycle vertueux de
            réutilisation des matières organiques.
        </p>
        <p>
            Aujourd’hui, <strong>Canopées</strong> incarne une entreprise
            engagée, qui place la nature au centre de ses préoccupations et qui
            œuvre chaque jour pour créer des espaces verts durables, vivants et
            porteurs de sens.
        </p>
        HTML,
        );

        $manager->persist($canopees);

        //Bob
        $bob = new Bio();
        $bob->setName('Bob');
        $bob->setRole('Co-fondateur de Canopées');
        $bob->setImageUrl('/assets/images/portrait/Bob_01.png');
        $bob->setDescription(
            <<<HTML
        <p>Bob a grandi au plus près de la nature, développant très tôt une <strong>sensibilité aux paysages</strong> et aux équilibres naturels. Observateur et réfléchi, il s’est passionné pour la manière dont les éléments interagissent : lumière, sol, eau et végétation. Cette curiosité l’a naturellement conduit vers les métiers du paysage, où il s’est spécialisé dans la conception et l’aménagement d’espaces verts.</p>
        <p>Doté d’une approche structurée, Bob imagine chaque projet comme une véritable composition. Il pense les volumes, les perspectives et l’évolution des espaces dans le temps, avec une attention particulière portée à <strong>l’harmonie et à la durabilité</strong>. Son regard allie esthétique et fonctionnalité, toujours guidé par le respect du vivant.</p>
        <p>Engagé dans une démarche responsable, il privilégie des solutions durables et adaptées à chaque environnement. Il accorde également une grande importance à la <strong>valorisation des déchets verts</strong>, notamment par le compostage, convaincu de la nécessité de préserver les ressources naturelles.</p>
        <p>Calme, méthodique et créatif, Bob apporte une vision globale et cohérente à chaque projet. Il incarne une <strong>approche sensible et réfléchie</strong> du paysage, où chaque espace devient un lieu vivant, équilibré et durable.</p>
        HTML,
        );

        $manager->persist($bob);

        //Tom
        $tom = new Bio();
        $tom->setName('Tom');
        $tom->setRole('Co-fondateur de Canopées');
        $tom->setImageUrl('/assets/images/portrait/Tom_01.png');
        $tom->setDescription(
            <<<HTML
        <p>Tom a grandi en lien direct avec le terrain, développant très jeune un goût pour les activités extérieures et le travail manuel. <strong>Curieux et dynamique</strong>, il apprend en observant, en expérimentant et en pratiquant, ce qui lui permet d’acquérir rapidement une solide compréhension des végétaux et de leur environnement.</p>
        <p>Naturellement attiré par l’action, il se spécialise dans l’entretien et la gestion des espaces verts. Il se forme aux techniques de taille, d’élagage et d’abattage, tout en développant une connaissance fine des arbres et de leur évolution. Avec l’expérience, il sait analyser l’état d’un végétal et adapter ses interventions avec <strong>précision et respect.</strong></p>
        <p>Sur le terrain, Tom se distingue par son efficacité et sa rigueur. Il maîtrise les outils, applique des gestes sûrs et s’adapte aux contraintes techniques comme environnementales. Son approche est concrète et pragmatique, toujours orientée vers des <strong>résultats durables.</strong></p>
        <p>Attentif aux besoins, il accorde une grande importance à l’écoute et au conseil. Son sens du contact lui permet de créer une <strong>relation de confiance</strong> et de proposer des solutions adaptées. Énergique et engagé, Tom incarne une approche directe et responsable, au service d’espaces naturels préservés et valorisés.</p>
        HTML,
        );

        $manager->persist($tom);


        // Services - Prestations
        $services = [
            [
                "name" => "Conception et réalisation d’espaces verts",
                "description" => <<<HTML
                <p>La conception et la réalisation d’espaces verts consistent à imaginer et créer des <strong>aménagements extérieurs harmonieux</strong>, en tenant compte des contraintes du terrain, du climat et des attentes du client. Chaque projet est pensé comme un ensemble cohérent, où végétaux, matériaux et volumes s’équilibrent pour créer un <strong>lieu esthétique, fonctionnel et durable.</strong></p>
                <p>De l’étude initiale à la mise en œuvre, chaque étape est réalisée avec soin : choix des plantations, création des massifs, installation des éléments paysagers et structuration des espaces. L’objectif est de concevoir un environnement vivant, agréable à parcourir et évolutif dans le temps, en respectant <strong>les équilibres naturels et la biodiversité</strong>.</p>
                HTML,
                "color" => "vert",
                "priceText" => "Sur devis",
                "images" => [
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_01/conception1.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => true,
                    ],
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_01/conception2.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => false,
                    ],
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_01/conception3.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => false,
                    ],
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_01/conception4.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => false,
                    ],
                ],
            ],
            [
                "name" => "Entretien des espaces verts",
                "description" => <<<HTML
                <p>L’entretien des espaces verts permet de préserver la qualité, l’esthétique et la santé des aménagements paysagers au fil des saisons. Il comprend des interventions régulières telles que la tonte, la taille des haies, le désherbage ou encore le soin apporté aux plantations. Chaque action est réalisée en tenant compte des spécificités du lieu et du rythme naturel des végétaux.</p>
                <p>Au-delà de l’aspect visuel, un entretien adapté favorise la durabilité des aménagements et le développement d’un environnement équilibré. Grâce à un suivi rigoureux et des techniques respectueuses du vivant, les espaces verts restent harmonieux, fonctionnels et agréables à vivre tout au long de l’année.</p>
                HTML,
                "color" => "rose",
                "priceText" => "À partir de 35€ / h",
                "images" => [
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_02/entretien1.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => true,
                    ],
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_02/entretien2.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => false,
                    ],
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_02/entretien3.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => false,
                    ],
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_02/entretien4.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => false,
                    ],
                ],
            ],
            [
                "name" => "Taille des haies",
                "description" => <<<HTML
                <p key="1">La taille des haies est essentielle pour maintenir des espaces extérieurs soignés, structurés et harmonieux. Elle permet de contrôler la croissance des végétaux, de conserver des formes nettes et d’assurer une séparation esthétique entre les différents espaces. Chaque intervention est adaptée aux essences présentes et réalisée au bon moment afin de respecter leur cycle de développement.</p>
                <p key="2">Au-delà de l’aspect visuel, une taille régulière favorise la densité et la bonne santé des haies. En supprimant les branches abîmées ou déséquilibrées, elle stimule la repousse et renforce la vitalité des végétaux. Réalisée avec précision, cette prestation garantit des haies durables, équilibrées et parfaitement intégrées à leur environnement.</p>
                HTML,
                "color" => "orange",
                "priceText" => "À partir de 45€ / h",
                "images" => [
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_03/taille1.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => true,
                    ],
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_03/taille2.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => false,
                    ],
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_03/taille3.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => false,
                    ],
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_03/taille4.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => false,
                    ],
                ],
            ],
            [
                "name" => "Élagage et abattage d’arbres",
                "description" => <<<HTML
                <p key="1">L’élagage et l’abattage d’arbres sont des interventions techniques visant à assurer la sécurité, la santé et la longévité des végétaux. L’élagage consiste à tailler les branches afin de maîtriser le développement de l’arbre, améliorer sa structure et limiter les risques de chute. Chaque intervention est réalisée avec précision, en respectant les caractéristiques de l’essence et son environnement.</p>
                <p key="2">Lorsque l’arbre présente un danger ou ne peut être conservé, l’abattage devient nécessaire. Cette opération délicate est menée dans le respect des normes de sécurité et des contraintes du terrain, notamment en milieu urbain ou difficile d’accès. L’objectif est d’intervenir de manière contrôlée et responsable, tout en préservant au maximum l’équilibre des espaces environnants.</p>
                HTML,
                "color" => "mauve",
                "priceText" => "Sur devis",
                "images" => [
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_04/elagage1.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => true,
                    ],
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_04/elagage2.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => false,
                    ],
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_04/elagage3.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => false,
                    ],
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_04/elagage4.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => false,
                    ],
                ],
            ],
            [
                "name" => "Valorisation des déchets verts",
                "description" => <<<HTML
                <p key="1">La valorisation des déchets verts consiste à transformer les résidus issus de l’entretien des espaces extérieurs en ressources utiles. Branches, feuilles, tontes ou tailles sont récupérées puis traitées afin d’être réutilisées, notamment sous forme de compost ou de paillage. Cette approche permet de limiter les déchets tout en favorisant un cycle naturel et durable.</p>
                <p key="2">En réintégrant ces matières organiques dans le sol, la valorisation contribue à enrichir la terre, à préserver l’humidité et à améliorer la qualité des plantations. Elle s’inscrit dans une démarche respectueuse de l’environnement, visant à réduire l’impact des interventions tout en soutenant la biodiversité et la vitalité des espaces verts.</p>
                HTML,
                "color" => "vert",
                "priceText" => "Sur devis",
                "images" => [
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_05/dechets1.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => true,
                    ],
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_05/dechets2.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => false,
                    ],
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_05/dechets3.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => false,
                    ],
                    [
                        'imageUrl' => '/assets/images/prestations/prestation_05/dechets4.png',
                        'altText' => 'Conception et réalisation d’espaces verts',
                        'isMain' => false,
                    ],
                ],
            ],

        ];
        //Pour chaque service
        foreach ($services as $serviceData) {
            $service = new Service();
            $service->setName($serviceData["name"]);
            $service->setDescription($serviceData["description"]);
            $service->setColor($serviceData["color"]);
            $service->setPriceText($serviceData["priceText"]);

            $manager->persist($service);
            //pour chaque image appartenant à ce service
            foreach ($serviceData['images'] as $imageData) {
                $serviceImage = new ServiceImage();
                $serviceImage->setImageUrl($imageData['imageUrl']);
                $serviceImage->setAltText($imageData['altText']);
                $serviceImage->setIsMain($imageData['isMain']);

                //Pour dire que le ServiceImage créée appartient au service crée
                $serviceImage->setService($service);

                $manager->persist($serviceImage);
            }
        }


        // Réalisations
        $realisationImages = [
            [
                'imageUrl' => '/assets/images/realisations/img_realisations_01.png',
                'altText' => "Réalisation d'aménagement de jardin",
            ],
            [
                'imageUrl' => '/assets/images/realisations/img_realisations_02.png',
                'altText' => "Réalisation d'aménagement de jardin",
            ],
            [
                'imageUrl' => '/assets/images/realisations/img_realisations_03.png',
                'altText' => "Réalisation d'aménagement de jardin",
            ],
            [
                'imageUrl' => '/assets/images/realisations/img_realisations_04.png',
                'altText' => "Réalisation d'aménagement de jardin",
            ],
            [
                'imageUrl' => '/assets/images/realisations/img_realisations_05.png',
                'altText' => "Réalisation d'aménagement de jardin",
            ],
        ];

        foreach ($realisationImages as $data){
            $realisationImage = new RealisationImage();
            $realisationImage->setImageUrl($data["imageUrl"]);
            $realisationImage->setAltText($data["altText"]);
    
            $manager->persist($realisationImage);

        }




        $manager->flush();
    }
}
