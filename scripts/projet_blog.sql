-- phpMyAdmin SQL Dump
-- version 4.7.7
-- https://www.phpmyadmin.net/
--
-- Hôte : 127.0.0.1
-- Généré le :  jeu. 26 avr. 2018 à 15:19
-- Version du serveur :  10.1.30-MariaDB
-- Version de PHP :  7.2.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données :  `projet_blog`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date_comment` date NOT NULL,
  `reported_comment` tinyint(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `date_comment`, `reported_comment`) VALUES
(1, 1, 'clement', 'commentaire 1', '2018-04-03', 0),
(2, 1, 'clement', 'commentaire 2', '2018-04-03', 0),
(4, 1, 'max', 'test', '2018-04-08', 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `date_created`) VALUES
(1, 'Le musher', '<p>Qui est ce Dan Murphy qui traverse l\'Alaska au seuil de l\'hiver ? Les gens se d&eacute;tournent sur son passage, les chasseurs cherchent &agrave; le tuer, la police et la bonne soci&eacute;t&eacute; voudraient le voir aux cinq cents diables. Lui, il est revenu par bravade, et peut-&ecirc;tre aussi pour reconqu&eacute;rir une femme perdue. Il va tenter de gagner l\'impossible &eacute;preuve, l\'Iditarod, une course de tra&icirc;neaux tir&eacute;s par des chiens sur 1 800 kilom&egrave;tres. Ce roman d\'aventures est aussi l\'histoire d\'Eccluke, la chienne de t&ecirc;te, f&eacute;roce pour tous et pleine d\'amour pour Dan, son musher et son ma&icirc;tre.</p>\r\n<p>source :https://books.google.fr&nbsp;</p>', '2018-03-27 00:00:00'),
(2, 'L\'Ours bleu', '<p style=\"text-align: left;\">Une histoire d\'amiti&eacute; une qu&ecirc;te d\'absolu. Dans les contr&eacute;es sauvages de l\'Alaska, au milieu des fjords, des for&ecirc;ts et des glaciers, Lynn Schooler exerce le m&eacute;tier de guide. Sa rencontre avec le l&eacute;gendaire photographe japonais Michio Hoshino, venu faire un reportage sur les baleines, sera d&eacute;terminante. Pendant une dizaine d\'ann&eacute;es, ils se retrouvent r&eacute;guli&egrave;rement le long de la banquise, dans l\'espoir de rep&eacute;rer et de photographier un animal rare et mythique, l\'ours bleu, connu &eacute;galement sous le nom d\'\"ours des glaciers\". C\'est leur histoire, ces longues exp&eacute;ditions, parfois risqu&eacute;es, men&eacute;es ensemble dans l\'intimit&eacute; d\'une nature encore pr&eacute;serv&eacute;e mais dangereuse, que Lynn Schooler raconte dans ces m&eacute;moires charg&eacute;s d\'&eacute;motions extr&ecirc;mes. Lynn Schooler vit depuis trente ans en Alaska. Il habite sur un bateau &agrave; Juneau. Tour &agrave; tour p&ecirc;cheur, photographe, guide touristique, il a gagn&eacute; plusieurs prix pour son activit&eacute; de photographe.</p>\r\n<p>source:&nbsp;https://books.google.fr</p>', '2018-03-27 00:00:00'),
(3, 'Coeur de loup', '<p>Le Grand Nord... Trois syllabes qui d&eacute;bouchent sur l\'infini. Quelque part, &agrave; l\'autre bout du monde, subsistent encore des espaces vierges, des champs de neige immacul&eacute;s, des for&ecirc;ts o&ugrave; l\'ours et l\'&eacute;lan vagabondent &agrave; leur guise. Seule la nature y impose sa loi.... &agrave; ceux du moins qui sont de taille &agrave; l\'accepter. Un journaliste anglais a relev&eacute; le d&eacute;fi. Robinson volontaire, il s\'est enfonc&eacute; dans ce d&eacute;sert blanc o&ugrave; durant des mois, le thermom&egrave;tre descend &agrave; 40&deg; au-dessous de z&eacute;ro. Pour y accomplir un exploit ? Non&nbsp; pour savourer la grisante libert&eacute; de la vie &agrave; l\'&eacute;tat sauvage. Ecoutez-le. Il nous livre le r&eacute;cit authentique de ses combats quotidiens, et surtout nous raconte l\'alliance qu\'il scella avec Yukon, le chien-loup qui fut, durant plus d\'un an, son guide, son confident, et parfois son sauveur. Tous ceux qui liront ce t&eacute;moignage exceptionnel resteront fascin&eacute;s par la magie de cette amiti&eacute; o&ugrave; l\'homme et l\'animal se font d&eacute;couvrir l\'un &agrave; l\'autre leur v&eacute;rit&eacute;</p>\r\n<p>source:&nbsp;https://books.google.fr</p>', '2018-03-27 00:00:00');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `pseudo` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Déchargement des données de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `mot_de_passe`, `email`) VALUES
(5, 'clement', '$2y$10$CNVS.w5hSamHktKbnngxdeBej/LhKPG1nbqgcWCDoMpN6FhRdSwhS', 'jeanforteroche@outlook.fr');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Index pour la table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT pour la table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
