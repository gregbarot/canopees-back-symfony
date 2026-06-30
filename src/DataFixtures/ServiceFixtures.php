<?php

namespace App\DataFixtures;

use App\Entity\Service;
use App\Entity\ServiceImage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ServiceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
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
        $manager->flush();
    }
}
