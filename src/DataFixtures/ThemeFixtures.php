<?php

namespace App\DataFixtures;

use App\Entity\Theme;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Persistence\ObjectManager;

class ThemeFixtures extends Fixture
{
    public const USE_COMPUTER_REFERENCE = 'use-computer';
    public const ADVISE_SECURITY_REFERENCE = 'conseil-securité';
    public const BAN_REFERENCE = 'interdictions';
    public const TOOLS_REFERENCE = 'matériels';

    public function load(ObjectManager $manager): void
    {
        $theme1 = new Theme();
        $theme1->setTitle("Utilisation des ordinateurs du lycée")
                ->setDescription("Savoir se connecter  au domaine, changer son mot de passe, utiliser un coffre fort de mots de passe, toujours se déconnecter, les différents dossiers partagés du lycée, ...")
                ->setStep(10);
        $manager->persist($theme1);

        $this->addReference(self::USE_COMPUTER_REFERENCE, $theme1);

        $theme2 = new Theme();
        $theme2->setTitle("Conseil sécurité")
                ->setDescription("Les différents tyoes d'esoaces de stockage, les espaces de stockage conseillés/déconseillés, comment sauvegarder ses fichiers, ...")
                ->setStep(20);
        $manager->persist($theme2);

        $this->addReference(self::ADVISE_SECURITY_REFERENCE, $theme2);

        $theme3 = new Theme();
        $theme3->setTitle("Interdictions")
                ->setDescription("Les sites interdits, les actions interdites (téléchargement, piratage), les protections miose en place au lycée, la surveillance du lycée, ...")
                ->setStep(30);
        $manager->persist($theme3);

        $this->addReference(self::BAN_REFERENCE, $theme3);

        $theme4 = new Theme();
        $theme4->setTitle("Matériels")
                ->setDescription("Comment informer d'une panne, consignes d'utilisation du matériel (le respect, na pas manger ou boire à proximité, la remise en place apèrs utilisation, na pas connecter un ordinateur personnel sur une prise réseau du lycée, ...), ...")
                ->setStep(40);
        $manager->persist($theme4);

        $this->addReference(self::TOOLS_REFERENCE, $theme4);

        $manager->flush();
    }

    public function getDependencies(): array
    {
        return [
            CountryFixtures::class,
        ];
    }
}
