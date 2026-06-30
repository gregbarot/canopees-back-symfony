<?php

namespace App\DataFixtures;

use App\Entity\SliderImage;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class SliderImageFixtures extends Fixture
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

        $manager->flush();
    }
}
