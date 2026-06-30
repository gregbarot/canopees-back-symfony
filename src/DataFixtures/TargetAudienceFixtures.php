<?php

namespace App\DataFixtures;

use App\Entity\TargetAudience;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class AppFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
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
        $manager->flush();
    }
}
