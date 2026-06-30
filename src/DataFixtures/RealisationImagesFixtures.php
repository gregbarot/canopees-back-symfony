<?php

namespace App\DataFixtures;

use App\Entity\RealisationImage;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class RealisationImagesFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
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

        foreach ($realisationImages as $data) {
            $realisationImage = new RealisationImage();
            $realisationImage->setImageUrl($data["imageUrl"]);
            $realisationImage->setAltText($data["altText"]);

            $manager->persist($realisationImage);
        }
        $manager->flush();
    }
}
