<?php

namespace App\DataFixtures;

use App\Entity\Bio;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class BioFixtures extends Fixture
{
    public function load(ObjectManager $manager): void
    {
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

        $manager->flush();
        }
}