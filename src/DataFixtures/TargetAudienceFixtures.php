<?php

namespace App\DataFixtures;

use App\Entity\TargetAudience;

use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;


class TargetAudienceFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        // Publics cibles - Target
        $targetAudiences = [
            [
                'name' => 'Particuliers',
                'imageUrl' => '/assets/images/publiccible/img_particuliers.png',
                'description' => 'Nous créons et entretenons des jardins sur mesure, pensés pour votre confort, votre style de vie et votre environnement.',
            ],
            [
                'name' => 'Professionnels',
                'imageUrl' => '/assets/images/publiccible/img_professionnels.png',
                'description' => 'Nous valorisons vos espaces extérieurs pour renforcer votre image, accueillir vos clients et améliorer le cadre de travail.',
            ],
            [
                'name' => 'Collectivités',
                'imageUrl' => '/assets/images/publiccible/img_collectivites.png',
                'description' => 'Nous aménageons et entretenons des espaces publics durables, favorisant le bien-être des usagers et la biodiversité locale.',
            ],
        ];

        foreach ($targetAudiences as $targetAudiencedata) {
            $targetAudience = new TargetAudience();
            $targetAudience->setName($targetAudiencedata['name']);
            $targetAudience->setImageUrl($targetAudiencedata['imageUrl']);
            $targetAudience->setDescription($targetAudiencedata['description']);

            $manager->persist($targetAudience);
        }
        $manager->flush();
    }
}
