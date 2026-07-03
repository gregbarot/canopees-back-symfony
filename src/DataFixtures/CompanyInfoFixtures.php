<?php

namespace App\DataFixtures;

use App\Entity\CompanyInfo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class CompanyInfoFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
        $companyInfo = new CompanyInfo();

        $companyInfo->setName('Canopées');
        $companyInfo->setAddress('820 Boulevard des Capucines, 82000 Montauban');
        $companyInfo->setPhone('09.48.56.87.96');
        $companyInfo->setEmail('contact@canopees.fr');
        $companyInfo->setFacebookUrl('https://www.facebook.com/');
        $companyInfo->setInstagramUrl('https://www.instagram.com/');
        $companyInfo->setLinkedinUrl('https://www.linkedin.com/');
        $companyInfo->setLogoUrl('/assets/images/logo/logo-canopees.png');

        $manager->persist($companyInfo);
        $manager->flush();
    }
}