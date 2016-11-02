<?php
/**
 * Created by PhpStorm.
 * User: nicolas
 * Date: 02/11/16
 * Time: 10:04
 */

namespace BookEditorBundle\DataFixtures\ORM;


use BookEditorBundle\Entity\PressArticle;
use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;

class LoadPressArticleData extends AbstractFixture implements OrderedFixtureInterface
{

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $pressArticle1 = new PressArticle();
        $pressArticle1->setTitle("Le Progres 21/07/15.jpg");
        $pressArticle1->setImageUrl("article_christelle_beauvent_mousselines_leprogres_210715.jpg");
        $pressArticle1->setBook($this->getReference("mousselines"));
        $manager->persist($pressArticle1);

        $pressArticle2 = new PressArticle();
        $pressArticle2->setTitle("Le Progrès 24/09/2015");
        $pressArticle2->setImageUrl("Article Laurence Chabalier Le Progrès 24.09.2015.jpg");
        $pressArticle2->setBook($this->getReference("les-pierres-dorees"));
        $manager->persist($pressArticle2);

        $pressArticle3 = new PressArticle();
        $pressArticle3->setTitle("Patriote Beaujolais 11/2012");
        $pressArticle3->setImageUrl("Article Patriote Beaujolais 11.2012.jpeg");
        $pressArticle3->setBook($this->getReference("decouvertes-gourmandes"));
        $manager->persist($pressArticle3);

        $pressArticle4 = new PressArticle();
        $pressArticle4->setTitle("Le Progrès 09/2016");
        $pressArticle4->setImageUrl("Article Le Progrès F Mercier 09.2016.jpg");
        $pressArticle4->setBook($this->getReference("chien"));
        $manager->persist($pressArticle4);

        $pressArticle5 = new PressArticle();
        $pressArticle5->setTitle("Portrait 06/05/15");
        $pressArticle5->setImageUrl("article_portrait_laurence_chabalier_060515.jpg");
        $pressArticle5->setBook($this->getReference("les-pierres-dorees"));
        $manager->persist($pressArticle5);

        $pressArticle6 = new PressArticle();
        $pressArticle6->setTitle("Courrier Picard 06/03/2012");
        $pressArticle6->setImageUrl("Courrier_Picard_06-03-2012.jpg");
        $pressArticle6->setBook($this->getReference("ile"));
        $manager->persist($pressArticle6);

        $pressArticle7 = new PressArticle();
        $pressArticle7->setTitle("Le Progrès 27/09/2015");
        $pressArticle7->setImageUrl("Le Progrès 27 09 2015 Christelle Beauvent.jpg");
        $pressArticle7->setBook($this->getReference("mousselines"));
        $manager->persist($pressArticle7);

        $pressArticle8 = new PressArticle();
        $pressArticle8->setTitle("Livre Tarare 29/04/2016");
        $pressArticle8->setImageUrl("PDF-Complet-tarare-l-arbresle-monts-du-lyonnais-20160429 art ch beauvent....jpg");
        $pressArticle8->setBook($this->getReference("vigne"));
        $manager->persist($pressArticle8);

        $pressArticle9 = new PressArticle();
        $pressArticle9->setTitle("Villefranche et Beaujolais 03/03/2016");
        $pressArticle9->setImageUrl("PDF-Complet-villefranche-et-beaujolais-20160303 svm.jpg");
        $pressArticle9->setBook($this->getReference("vigne"));
        $manager->persist($pressArticle9);

        



        $manager->flush();
    }

    /**
     * Get the order of this fixture
     *
     * @return integer
     */
    public function getOrder()
    {
        return 2;
    }
}