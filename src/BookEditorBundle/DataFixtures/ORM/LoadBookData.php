<?php

namespace AppBundle\DataFixtures\ORM;

use Doctrine\Common\DataFixtures\AbstractFixture;
use Doctrine\Common\DataFixtures\OrderedFixtureInterface;
use Doctrine\Common\Persistence\ObjectManager;
use BookEditorBundle\Entity\Book;

class LoadUserData extends AbstractFixture implements OrderedFixtureInterface
{
    public function load(ObjectManager $manager)
    {
        $book1 = new Book();
        $book1->setTitle('Le Petit Bacchus');
        $book1->setAuthor('Benjamin Poussardin');
        $book1->setDescription('Passionné de vin et de gastronomie, présent toute l’année aux côtés des vignerons, j’ai créé "Le Petit Bacchus" afin de vous faciliter l’accès à la dégustation du vin. Ce carnet a été développé de manière simple et ludique. Il vous permettra de placer très rapidement des mots sur ce que vous voyez, sentez et goûtez.
Il vous donnera l’opportunité de vous souvenir de vos coups de cœurs, de vos meilleurs rapports prix/plaisir, ainsi que de vos rencontres avec les vignerons.
Cet outil vous aidera également à être plus à l’aise dans votre relation avec le vin : repas de famille, repas professionnels, discussions entre amis... Synonyme d’art et de culture, l’œnologie vous offre l’occasion d’aborder de nombreux sujets tout aussi passionnants : géographie, histoire, littérature, photographie, voyages, arts plastiques, etc.
Le vin, une question de bon(s) sens !');
        $book1->setFacebookLinkUrl(NULL);
        $book1->setImageUrl('Couverture Le Petit Bachus.jpg');
        $book1->setReleaseDate(new \DateTime('2013-01-01'));
        $book1->setPurchaseOrderImageUrl(NULL);
        $book1->setSlug('le-petit-bacchus');
        $manager->persist($book1);
        $this->addReference('le-petit-bacchus', $book1);

        $book2 = new Book();
        $book2->setTitle('L\'île sacrée');
        $book2->setAuthor('Catherine Pierdat');
        $book2->setDescription('L’abbé Henri Boudet est curé de Rennes-les-Bains, petite station thermale très prisée en cette fin de dix-neuvième siècle. Il publie en 1886 un livre singulier et obscur : « La Vraie Langue celtique et le Cromleck de Rennes-les-Bains » dans lequel il prétend restituer la langue originelle grâce à l’anglais moderne, très proche, selon lui, de la langue des Tectosages, tribu celte du sud-ouest de la Gaule.
Pour la première fois, La Vraie Langue celtique de l’abbé Boudet est entièrement décodée. Après quatre ans de travail acharné et méthodique, l’auteur de L’Île Sacrée met au jour un double secret — d’État et d’Église — jusqu’ici totalement oublié des historiens....
Livre historique et passionnant à découvrir, c’est un magnifique cadeau à offrir ou à s’offrir pour Noël ou toutes autres circonstances. Réservez dès à présent votre livre....');
        $book2->setFacebookLinkUrl(NULL);
        $book2->setImageUrl('Couverture l\'île sacrée.jpg');
        $book2->setReleaseDate(new \DateTime('2013-01-01'));
        $book2->setPurchaseOrderImageUrl(NULL);
        $book2->setSlug('l-ile-sacree');
        $manager->persist($book2);
        $this->addReference('ile', $book2);

        $book3 = new Book();
        $book3->setTitle('Découvertes Gourmandes');
        $book3->setAuthor('Paul Bocuse');
        $book3->setDescription('Rhône-Alpes Passions se met à table et présente ses "Découvertes gourmandes" issues de la région Rhône-Alpes.
Partez à la rencontre de 46 passionnés issus des métiers de bouche de la région Rhône-Alpes avec comme particularité et fil rouge le vécu d’un parcours souvent riche en émotions, rencontres et échanges.
Des hommes et des femmes, certes au service de notre quotidien, qui travaillent toujours dans l’excellence et la passion pour révéler le meilleur à nos papilles gustatives.
Des motivations suprêmes pour avancer dans ces professions, dont l’unique objectif est de donner du plaisir gourmand au plus grand nombre d’entre nous...
Un grand Monsieur au service de la gastronomie de France...merci pour votre soutien mon cher Paul Bocuse à cet ouvrage.
Une seule envie : dévorer ce livre !');
        $book3->setFacebookLinkUrl(NULL);
        $book3->setImageUrl('Couverture Découvertes Gourmandes.jpeg');
        $book3->setReleaseDate(new \DateTime('2012-01-01'));
        $book3->setPurchaseOrderImageUrl(NULL);
        $book3->setSlug('decouvertes-gourmandes');
        $manager->persist($book3);
        $this->addReference('decouvertes-gourmandes', $book3);

        $book4 = new Book();
        $book4->setTitle('L\'Afficheur tombe dans le panneau');
        $book4->setAuthor('Dominique Guichard');
        $book4->setDescription('Du monde qui nous entoure, de l’immédiat et du quotidien au présent, même si par 
        précaution l’action se déroule dans les années 80. Mais il y a forcément un passé, le sien n’est fait que de 
        fugaces réminiscences et c’est un peu le moteur du présent, et il a un avenir, sauf que le sien n’a pas de but 
        si ce n’est d’aider ses amis, ses proches ses rencontres, et c’est le carburant du présent. Par son métier il 
        est dehors, dans la rue où il voit la ville depuis le coin du trottoir jusqu’à toute l’agglomération. C’est un 
        urbain qui vit aux pulsations de la cité selon l’heure du jour et la saison. C’est un grand témoin qui veut 
        rester en retrait, mais ne peut s’empêcher d’intervenir pour aider, selon son instinct ou à la demande ses amis.
         Il déguste aussi le parler lyonnais, qui enjolive ses échanges. Son passé, avant Lyon, fut radicalement 
         différent de son présent, il s’en sert pour aider, jamais pour se valoriser. On ne sait pas vraiment d’où 
         il vient et il ne sait pas où il va, mais seulement où il est.');
        $book4->setFacebookLinkUrl('https://www.facebook.com/groups/lafficheur/?fref=ts');
        $book4->setImageUrl('Couverture L\'Afficheur tombe dans le panneau.JPG');
        $book4->setReleaseDate(new \DateTime('2014-01-01'));
        $book4->setPurchaseOrderImageUrl(NULL);
        $book4->setSlug('l-afficheur-tombe-dans-le-panneau');
        $manager->persist($book4);

        $book5 = new Book();
        $book5->setTitle('Les Pierres Dorées, émotions et images...');
        $book5->setAuthor('Laurence Chabalier');
        $book5->setDescription('Sans doute avez-vous perçu au fil du temps, ma tendresse, mon amour, 
        voire ma passion pour les petits « Villages du Beaujolais en Pierres Dorées » que je découvre au gré de 
        mes pas : découvertes de scènes touchantes ou évocatrices d’instants de vie, lumières et couleurs, chaleur 
        des pierres, douceur vallonnée des paysages de vignes... Ce plaisir des découvertes, ces lieux que 
        j\'affectionne, je souhaite les partager avec vous au travers d’un ouvrage photographique d’une 
        centaine de pages...témoignages de ces jolis pétales d’une vie simple que je me suis plu à 
        effeuiller au gré des années et des saisons.... Au gré de mes pas...quelques jolies découvertes...
        des scènes lumineuses au cœur du Beaujolais des Pierres Dorées...');
        $book5->setFacebookLinkUrl('https://www.facebook.com/imagesaugredesbalades');
        $book5->setImageUrl('Couverture Les Pierres Dorées, émotions et images....jpg');
        $book5->setReleaseDate(new \DateTime('2014-01-01'));
        $book5->setPurchaseOrderImageUrl(NULL);
        $book5->setSlug('les-pierres-dorees-emotions-et-images');
        $manager->persist($book5);
        $this->addReference('les-pierres-dorees', $book5);

        $book6 = new Book();
        $book6->setTitle('Mousselines au fil du temps, une édition haute en couleurs');
        $book6->setAuthor('Christelle Beauvent');
        $book6->setDescription('L’ouvrage retrace l’histoire de l’organisation des Mousselines 2015 de la 1ère 
        réunion (18 avril 2014) à la fin de l’événement (le grand défilé avec concert et feu d’artifice du 28 
        juin 2015) au travers d’un livre de photographies légendées. Au fil des pages et des photographies, 
        découvrez toute l’organisation, pendant plus d\'\'un an, au travers de la mobilisation humaine avec 
        de nombreux bénévoles ainsi que l’ensemble des habitants de Tarare pour aboutir à une véritable réussite.');
        $book6->setFacebookLinkUrl('https://www.facebook.com/mousselinesdeTarare2015lelivre/');
        $book6->setImageUrl('Couverture Mousselines au fil du temps, une édition haute en couleurs.jpg');
        $book6->setReleaseDate(new \DateTime('2015-01-01'));
        $book6->setPurchaseOrderImageUrl(NULL);
        $book6->setSlug('mousselines-au-fil-du-temps-une-edition-haute-en-couleurs');
        $manager->persist($book6);
        $this->addReference('mousselines', $book6);

        $book7 = new Book();
        $book7->setTitle('Coeur de vigneron');
        $book7->setAuthor('Sandrine Vadrot-Morel');
        $book7->setDescription('Dégustons un verre de vin : le vigneron y a déposé une part de son âme et 
        une pincée de son cœur. Balade que vous propose cet ouvrage... Travail de la vigne et du vin, 
        légendes, dictons et proverbes... contés au fil des mois.');
        $book7->setFacebookLinkUrl('https://www.facebook.com/coeurdevigneron/');
        $book7->setImageUrl('Couverture Coeur de vigneron.jpg');
        $book7->setReleaseDate(new \DateTime('2016-01-01'));
        $book7->setPurchaseOrderImageUrl(NULL);
        $book7->setSlug('coeur-de-vigneron');
        $manager->persist($book7);
        $this->addReference('vigne', $book7);

        $book8 = new Book();
        $book8->setTitle('Voyages d\'un chien amoureux');
        $book8->setAuthor('François Jean-Marie Mercier');
        $book8->setDescription('François Mercier revendique l’errance entre le trait libre qui raconte et le 
        dessin qui construit. Il avoue la séduction que représente la peinture et le graphisme qui permet de 
        conduire rapidement à la matérialisation de l\'idée par rapport à l\'architecture qui nécessite la 
        mise en oeuvre de beaucoup de moyens avec des intermédiaires qui « parasitent » souvent le fonctionnement 
        créatif. Expositions à Paris, Clermont-Ferrand, Valence, Lyon, Stockholm, etc.... En Décembre 2015, il 
        s’est lancé dans l’écriture d’un roman dont le titre est : Voyages d’un chien amoureux, Un homme à poil.');
        $book8->setFacebookLinkUrl(NULL);
        $book8->setImageUrl('Couverture Voyages d\'un chien amoureux.jpg');
        $book8->setReleaseDate(new \DateTime('2016-01-01'));
        $book8->setPurchaseOrderImageUrl(NULL);
        $book8->setSlug('voyages-d-un-chien-amoureux');
        $manager->persist($book8);
        $this->addReference('chien', $book8);

        $book9 = new Book();
        $book9->setTitle('Un instant éclairé');
        $book9->setAuthor('Bertrand Mouret');
        $book9->setDescription('Le Graphistographe est de ceux qui vous charment autant qu’ils vous dérangent. 
        Et en plus, il adore ça. Derrière son appareil, il a cette capacité à creuser, à saisir des émotions 
        dans leur intégrité et sans toujours les nommer puisque souvent ses photos parlent d’elles-mêmes. Son 
        objectif est saisissant, son regard ressemble à celui du prédateur qui, loin d’être destructeur ou chasseur, 
        tente d’abord de voir puis de montrer. Il sent, fixe les gens, arpente les rues et tourne autour des bâtiments 
        pour mieux les immortaliser.');
        $book9->setFacebookLinkUrl(NULL);
        $book9->setImageUrl('Couverture Un instant éclairé.jpeg');
        $book9->setReleaseDate(new \DateTime('2016-01-01'));
        $book9->setPurchaseOrderImageUrl(NULL);
        $book9->setSlug('un-instant-eclaire');
        $manager->persist($book9);

        $manager->flush();
    }

    public function getOrder()
    {
        return 1;
    }
}