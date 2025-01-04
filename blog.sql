-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jan 04, 2025 at 09:17 PM
-- Server version: 8.3.0
-- PHP Version: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int NOT NULL AUTO_INCREMENT,
  `admin_name` varchar(55) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `action` varchar(55) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `admin_name`, `email`, `password`, `action`) VALUES
(3, 'Franck', 'franckmaniche6@gmail.com', '$2y$10$E9dnTL8VHrx9MUVkdof/wO2ioaQVwNrkwVO7D04wlBrkvPISSzJ9a', ''),
(5, 'Tatiana Tsombeng', 'tatia@gmail.com', '$2y$10$0xDFDyO7ARGkSMC8Tj2keu8wNGD7Va2TTrYl8P.JeYQDqfTwlXI1.', ''),
(6, 'Sorelle', 'laprincesse@gmail.com', '$2y$10$WSEjbMR7/X60zarMp6/8Pek2ZiNhvhArD5Hp3Vf73ApMY0NnxD2aS', '');

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

DROP TABLE IF EXISTS `articles`;
CREATE TABLE IF NOT EXISTS `articles` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name_art` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `cat_art` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `des_art` text CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `img_cover_url` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `img_pub_url` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `public` longtext COLLATE utf8mb3_unicode_ci NOT NULL,
  `nbre_like` int NOT NULL,
  `nbre_comment` int NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `idx_name_art` (`name_art`),
  KEY `idx_cat_art` (`cat_art`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`id`, `name_art`, `cat_art`, `des_art`, `img_cover_url`, `img_pub_url`, `public`, `nbre_like`, `nbre_comment`, `created_at`) VALUES
(2, 'Toujours pret', 'Paludisme', 'Comment connecter un frontend React avec un backend NodeJS/Express', 'uploads/cover_677336f0107bc.png', 'uploads/pub_677336f0107c9.png', 'Comment connecter un frontend React avec un backend NodeJS/ExpressComment connecter un frontend React avec un backend NodeJS/ExpressComment connecter un frontend React avec un backend NodeJS/ExpressComment connecter un frontend React avec un backend NodeJS/ExpressComment connecter un frontend React avec un backend NodeJS/ExpressComment connecter un frontend React avec un backend NodeJS/ExpressComment connecter un frontend React avec un backend NodeJS/ExpressComment connecter un frontend React avec un backend NodeJS/Express', 1, 0, '2024-12-31 00:12:32'),
(3, 'Developpement web', 'Web developpement', 'Les meilleurs outils d&#039;accessibilité Web pour les développeurs en 2021', 'uploads/cover_67733a0d8de20.png', 'uploads/pub_67733a0d8de2b.png', 'Les meilleurs outils d&#039;accessibilité Web pour les développeurs en 2021 Les meilleurs outils d&#039;accessibilité Web pour les développeurs en 2021Les meilleurs outils d&#039;accessibilité Web pour les développeurs en 2021Les meilleurs outils d&#039;accessibilité Web pour les développeurs en 2021Les meilleurs outils d&#039;accessibilité Web pour les développeurs en 2021Les meilleurs outils d&#039;accessibilité Web pour les développeurs en 2021Les meilleurs outils d&#039;accessibilité Web pour les développeurs en 2021Les meilleurs outils d&#039;accessibilité Web pour les développeurs en 2021Les meilleurs outils d&#039;accessibilité Web pour les développeurs en 2021', 2, 0, '2024-12-31 00:25:49'),
(4, 'Art oratoire ', 'Speaker', 'Savoir se vendre', 'uploads/cover_67733c2c7f914.png', 'uploads/pub_67733c2c7f922.png', 'Bien que cette locution n&#039;ait pas de sens, elle a une longue histoire. Elle a été utilisée pendant plusieurs siècles par les typographes pour mettre en évidence les apparences les plus caractéristiques de leurs polices. Elle est utilisée car les lettres qu&#039;elle contient et l&#039;espacement des caractères font apparaître de façon optimale l&#039;épaisseur, la présentation et toutes les autres caractéristiques importantes de la police.', 4, 0, '2024-12-31 00:34:52'),
(5, 'Zone travel', 'Immigration', 'Vente de billet d&#039;avion et divers', 'uploads/cover_677349478fb75.png', 'uploads/pub_677349478fb80.png', 'Résumé La locution « Lorem ipsum dolor sit amet consectetuer » apparaît dans l&#039;aide en ligne de Microsoft Word. Elle ressemble à une locution latine sensée. En fait, elle n&#039;a pas de sens.  Plus d&#039;informations Bien que cette locution n&#039;ait pas de sens, elle a une longue histoire. Elle a été utilisée pendant plusieurs siècles par les typographes pour mettre en évidence les apparences les plus caractéristiques de leurs polices. Elle est utilisée car les lettres qu&#039;elle contient et l&#039;espacement des caractères font apparaître de façon optimale l&#039;épaisseur, la présentation et toutes les autres caractéristiques importantes de la police.   Une publication de 1994 du magazine « Before &amp; After » décrit l&#039;expression « Lorem ipsum ... » comme une version latine peu fidèle d&#039;un passage d&#039;un traité de théorie éthique, de Finibus Bonorum et Malorum, écrit par Cicéron en 45 avant Jésus-Christ. Le passage « Lorem ipsum ... » est tiré du texte « Neque porro quisquam est qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit ... » qui peut se traduire par « Personne n&#039;aime la douleur en elle-même, ne la recherche et ne la souhaite, tout simplement parce qu&#039;il s&#039;agit de la douleur... ».   Au 16e siècle, un imprimeur a adapté le texte de Cicéron afin d&#039;en tirer une page d&#039;exemples typographiques. Depuis, le texte est devenu le standard utilisé par l&#039;industrie de l&#039;imprimerie pour les textes factices. Avant l&#039;avènement de la PAO, les graphistes devaient faire des maquettes de présentation en dessinant des lignes factices pour figurer le format du texte. L&#039;avènement des feuilles auto-adhésives préimprimées avec le texte « Lorem ipsum » a permis de figurer de façon plus réaliste où un texte devrait s&#039;insérer dans une page.', 9, 0, '2024-12-31 01:30:47'),
(7, 'St Sylvestre', 'Wikipedia', 'Explication sur la fete de nouvel an', 'uploads/cover_677513af78a71.jpg', 'uploads/pub_677513af78a87.jpg', '  Wikipédial&#039;encyclopédie libre Rechercher sur Wikipédia Rechercher Faire un don Créer un compte Se connecter  Sommaire masquer Début Culture et société  Fêtes et coutumes Monuments Musique Anthroponyme Toponyme  Canada France Suisse Saint-Sylvestre Saint Sylvestre   Article Discussion Lire Modifier Modifier le code Voir l’historique  Outils Apparence masquer Taille du texte  Petite  Standard  Grande Largeur  Standard  Large Couleur (bêta)  Automatique  Clair  Sombre Sur les autres projets Wikimedia :  Saint-Sylvestre, sur le Wiktionnaire Page d’aide sur l’homonymie	 Cette page d’homonymie répertorie les différents sujets et articles portant le même nom.  Culture et société Fêtes et coutumes Le jour de la Saint-Sylvestre est le 31 décembre, dernier jour de l&#039;année du calendrier grégorien et jour retenu par l&#039;Église catholique pour célébrer le pape Sylvestre Ier. La nuit de la Saint-Sylvestre est la nuit du 31 décembre au 1er janvier. Le réveillon de la Saint-Sylvestre est une coutume qui consiste à fêter l&#039;arrivée du Nouvel An, en veillant jusqu&#039;à minuit le soir du 31 décembre. Monuments Plusieurs églises portent le nom d&#039;église Saint-Sylvestre Ce lien renvoie vers une page d&#039;homonymie, notamment en France, en Italie et au Luxembourg. Musique Saint Sylvestre est un album de chansons de Noël du groupe Les Innocents. Anthroponyme Plusieurs saints chrétiens sont appelés saint Sylvestre :  saints catholiques et orthodoxes : Sylvestre Ier, pape de Rome (fêté le 31 décembre en Occident, le 2 janvier en Orient), Sylvestre de Besançon (+ 396), évêque (10 mai), Sylvestre de Chalon-sur-Saône (au VIe siècle), évêque de Chalon-sur-Saône (20 novembre), Sylvestre de Moutier Saint Jean (+ 625), abbé (15 avril) ; saints catholiques : Sylvestre Guzzolini (26 novembre) ; saints orthodoxes : Sylvestre d&#039;Obnorsk (+ 1379), (25 avril). Toponyme Saint-Sylvestre est un nom de lieu notamment porté par :  Canada Saint-Sylvestre, une municipalité de la MRC de Lotbinière (Québec) ; France Saint-Sylvestre, une commune de l&#039;Ardèche ; Saint-Sylvestre, une commune de la Haute-Savoie ; Saint-Sylvestre, une commune de la Haute-Vienne ; Saint-Sylvestre-Cappel, une commune du Nord ; Saint-Sylvestre-de-Cormeilles, une commune de l&#039;Eure ; Saint-Sylvestre-Pragoulin, une commune du Puy-de-Dôme ; Saint-Sylvestre-sur-Lot, une commune du Lot-et-Garonne ; Suisse Saint-Sylvestre, une commune du canton de Fribourg. Catégories : HomonymieHomonymie de toponymeHomonymie de communes et d&#039;anciennes communes en France La dernière modification de cette page a été faite le 30 décembre 2022 à 23:52. Droit d&#039;auteur : les textes sont disponibles sous licence Creative Commons attribution, partage dans les mêmes conditions ; d’autres conditions peuvent s’appliquer. Voyez les conditions d’utilisation pour plus de détails, ainsi que les crédits graphiques. En cas de réutilisation des textes de cette page, voyez comment citer les auteurs et mentionner la licence. Wikipedia® est une marque déposée de la Wikimedia Foundation, Inc., organisation de bienfaisance régie par le paragraphe 501(c)(3) du code fiscal des États-Unis. Politique de confidentialitéÀ propos de WikipédiaAvertissementsContactCode de conduiteDéveloppeursStatistiquesDéclaration sur les témoins (cookies)Version mobile Wikimedia FoundationPowered by MediaWiki', 15, 0, '2025-01-01 10:06:39'),
(10, 'Avant propos d&#039;IUGET', 'Education', 'Regroupement dans un tableau de toute les filiere propose par l&#039;IUGET', 'uploads/cover_677900b548d61.png', 'uploads/pub_677900b548d7d.png', 'L’offre de formation s’est considérablement enrichie au Cameroun au cours des deux dernières décennies. Cette mutation a touché pratiquement tous les domaines, toutes les filières et toutes les spécialités. Au niveau de l’enseignement supérieur, le gouvernement en encourageant la création des Instituts Privés d’Enseignement Supérieur (IPES) a permis aux étudiants de bénéficier des formations professionnelles dans les dix régions du Cameroun dans le but d’assurer son développement et de fournir à son industrie des agents de maîtrise et des cadres compétents.\r\n\r\nDans différentes spécialités, l’Etat du Cameroun par son arrêté ministériel N°90/E/ (BTS) et de Higher National Diplôma (HND). C’est dans cette optique que de nombreux IPES ont vu le jour. C’est le cas de l’ISTTI (devenue l’IUGET) qui a choisi de faire le pari de la qualité en misant sur le professionnalisme et l’éthique.\r\nEn effet, l’Institut supérieur des techniques tertiaires et industrielles en abrégée ISTTI, crée par l’autorisation N° 08/0095/MINESUP du 05 mai 2008 et ouvert par l’autorisation N° 14/0402/MINESUP/SG/DDES du 04 juillet 2014, a été hissé au statut d’institut universitaire des grandes écoles des tropiques (IUGET) par l’arrêté N° 18/0397/LM/ MINESUP/SG/DDES/ESUP/SDA/AOSB du 15 mai 2018 avec ses trois écoles (ISSTI, SOUTH POLYTECH, SCHOOL OF HEALTH SCIENCES).\r\n\r\nCet institut universitaire met à la disposition des étudiants des cycles de formation conduisant à l’obtention des diplômes des niveaux BACC + 2, BACC + 3 et BACC + 5 dans les spécialités suivantes :\r\n\r\nL’étudiant en cycle BTS est tenu d’effectuer un stage académique selon sa spécialité durant son cursus académique. Ce stage permettra aux étudiants de mieux appréhender le monde professionnel, de compléter les connaissances acquises. \r\n\r\nDans le cadre de notre formation, il nous a été donné de rédiger un rapport de stage ; le nôtre est intitulé : « . »\r\n', 3, 0, '2025-01-04 09:34:45'),
(12, 'CORRESPONDANCE ADMINISTRATIVE', 'Education', 'Documents écrit pour communiquer à l’intérieur ou à l’extérieur d’une organisation ou d’une entreprise', 'uploads/cover_677908a191559.png', 'uploads/pub_677908a191568.png', 'La correspondance administrative : est l’ensemble des documents écrit pour communiquer à l’intérieur ou à l’extérieur d’une organisation ou d’une entreprise. Quand la communication se fait à l’intérieur, on parle de correspondance à dominance professionnelle mais à l’extérieur on parle de correspondance à dominance individuelle\r\n\r\nI.   CORRESPONDANCE ADMINISTRATIVE A DOMINANCE PROFESSIONNELLE\r\n1.   Le compte rendu et le rapport\r\nCes deux documents ont un point commun en ce sens qu’ils permettent de transmettre un certain nombre d’informations sur un évènement ou une situation vécue. Mais selon la structure et l’objectif visé, on peut noter quelques différences :\r\n   •	Le compte rendu relate les faits, alors que le rapport les analyses c’est-à-dire que le plan d’un compte rendu se fait selon l’ordre du déroulement des activités alors que celui qui fait le rapport adapte le plan selon les informations qu’il souhaite communiquer. \r\n   •	Le compte rendu est objectif tant dis que le rapport est argumentatif\r\n   •	Un compte rendu informe, laisse des traces écrites d’un évènement alors que le rapport donne un avis en vue d’une décision à prendre pour l’autorité responsable\r\nL’entête ou l’introduction d’un rapport ou d’un compte rendu dois présenter les informations suivantes : Lieu, date, le titre (compte rendu ou rapport), le thème ou l’objet\r\nA la fin des deux documents, la signature manuscrite est obligatoire porter par le nom et la qualité (poste occupe dans l’entreprise)\r\n\r\n2.   La note de service\r\nC’est un moyen de transmission des décisions des consignes au sein des services d’une entreprise, elle suit la hiérarchie descendante. Elles doivent toujours être numéroté, elle doit avoir maximum une (01) page minimum (01) ligne, la signature de celui qui a rédigé, elle doit comporter un émetteur, un destinataire, une date un titre en majuscule et au centre, le thème de l’information et avec un vocabulaire professionnel propre à l’entreprise, des phrases courte et précise, rédiger les informations de la plus importante à la moins importante\r\n\r\n3.   Procès-verbal\r\n\r\nII.  CORRESPONDANCE ADMINISTRATIVE A DOMINANCE INDIVIDUELLE\r\n\r\nIl s’agit des documents qu’une personne peut avoir à rédiger pour entrer en contact avec une entreprise, on peut avoir : lettre de motivation, CV, demande d’emploi\r\nQuelques consignes pour une lettre de motivation :\r\n   •	Utiliser un format A4 de couleur blanche,\r\n   •	Si la lettre est saisie, prévoir une marge de 2,5 des quatre coté, caractère 12 ou 14, interligne 1,5 police Times New Roman. Mais si elle est manuscrite, prévoir juste une marge de 2cm a gauche et se rassurer que le texte soit bien lisible\r\n   •	Elle doit tenir sur une seule page\r\n   •	Présentation : \r\n      o	L’adresse de l’émetteur doit être en haut à gauche (Nom et prénom, téléphone, adresse email)\r\n      o	La date sur la première ligne en haut en droite\r\n      o	L’adresse du destinataire en bas de la date et suit la dernière ligne de l’émetteur mais à droite\r\n      o	Objet de la demande\r\n', 4, 0, '2025-01-04 10:08:33');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `user_name` varchar(55) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(55) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(25) COLLATE utf8mb3_unicode_ci NOT NULL,
  `action` varchar(55) COLLATE utf8mb3_unicode_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `email`, `password`, `action`) VALUES
(1, 'Maniche', 'maniche6@gmail.com', '$2y$10$hTVVCBQa16pqMzf5Zo', ''),
(2, 'Sorelle', 'sorelle@gmail.com', '$2y$10$pCO7eLQhNwQkWDZr1u', ''),
(3, 'Mama', 'mama@gmail.com', '$2y$10$1iLeMfsXlt0lV5dr2X', ''),
(4, 'Ivan', 'ivan@gmail.com', '$2y$10$VLS1HIL86XsOj6bCAF', ''),
(5, 'Francis', 'francis6@gmail.com', '$2y$10$6NhqbYYO9iMa1eUxyS', ''),
(6, 'David', 'david@gmail.com', '$2y$10$vml12yMWjmHDMfjpyi', ''),
(7, 'Tatiana', 'tati@gmail.com', '$2y$10$NX5gOaej7NEtCv4CSF', ''),
(8, 'papa', 'papa@gmail.com', '$2y$10$QMkHpW4FEAGMlI9ifX', '');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
