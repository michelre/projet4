-- phpMyAdmin SQL Dump
-- version 4.1.14.8
-- http://www.phpmyadmin.net
--
-- Client :  db735816325.db.1and1.com
-- Généré le :  Lun 30 Avril 2018 à 17:28
-- Version du serveur :  5.5.59-0+deb7u1-log
-- Version de PHP :  5.4.45-0+deb7u13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de données :  `db735816325`
--

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `post_id` int(11) NOT NULL,
  `author` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `date_comment` date NOT NULL,
  `reported_comment` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `author`, `comment`, `date_comment`, `reported_comment`) VALUES
(1, 1, 'clement', 'commentaire 1', '2018-04-03', 0),
(2, 1, 'clement', 'commentaire 2', '2018-04-03', 0),
(4, 1, 'max', 'test', '2018-04-08', 0),
(5, 1, 'MIka', 'test commentaire ', '2018-04-26', 0);

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE IF NOT EXISTS `posts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Contenu de la table `posts`
--

INSERT INTO `posts` (`id`, `title`, `content`, `date_created`) VALUES
(1, 'Le musher', '<p>Qui est ce Dan Murphy qui traverse l''Alaska au seuil de l''hiver ? Les gens se d&eacute;tournent sur son passage, les chasseurs cherchent &agrave; le tuer, la police et la bonne soci&eacute;t&eacute; voudraient le voir aux cinq cents diables. Lui, il est revenu par bravade, et peut-&ecirc;tre aussi pour reconqu&eacute;rir une femme perdue. Il va tenter de gagner l''impossible &eacute;preuve, l''Iditarod, une course de tra&icirc;neaux tir&eacute;s par des chiens sur 1 800 kilom&egrave;tres. Ce roman d''aventures est aussi l''histoire d''Eccluke, la chienne de t&ecirc;te, f&eacute;roce pour tous et pleine d''amour pour Dan, son musher et son ma&icirc;tre.</p>\r\n<p>source :https://books.google.fr&nbsp;</p>', '2018-03-27 00:00:00'),
(2, 'L''Ours bleu', '<p style="text-align: left;">Une histoire d''amiti&eacute; une qu&ecirc;te d''absolu. Dans les contr&eacute;es sauvages de l''Alaska, au milieu des fjords, des for&ecirc;ts et des glaciers, Lynn Schooler exerce le m&eacute;tier de guide. Sa rencontre avec le l&eacute;gendaire photographe japonais Michio Hoshino, venu faire un reportage sur les baleines, sera d&eacute;terminante. Pendant une dizaine d''ann&eacute;es, ils se retrouvent r&eacute;guli&egrave;rement le long de la banquise, dans l''espoir de rep&eacute;rer et de photographier un animal rare et mythique, l''ours bleu, connu &eacute;galement sous le nom d''"ours des glaciers". C''est leur histoire, ces longues exp&eacute;ditions, parfois risqu&eacute;es, men&eacute;es ensemble dans l''intimit&eacute; d''une nature encore pr&eacute;serv&eacute;e mais dangereuse, que Lynn Schooler raconte dans ces m&eacute;moires charg&eacute;s d''&eacute;motions extr&ecirc;mes. Lynn Schooler vit depuis trente ans en Alaska. Il habite sur un bateau &agrave; Juneau. Tour &agrave; tour p&ecirc;cheur, photographe, guide touristique, il a gagn&eacute; plusieurs prix pour son activit&eacute; de photographe.</p>\r\n<p>source:&nbsp;https://books.google.fr</p>', '2018-03-27 00:00:00'),
(3, 'Coeur de loup', '<p>Le Grand Nord... Trois syllabes qui d&eacute;bouchent sur l''infini. Quelque part, &agrave; l''autre bout du monde, subsistent encore des espaces vierges, des champs de neige immacul&eacute;s, des for&ecirc;ts o&ugrave; l''ours et l''&eacute;lan vagabondent &agrave; leur guise. Seule la nature y impose sa loi.... &agrave; ceux du moins qui sont de taille &agrave; l''accepter. Un journaliste anglais a relev&eacute; le d&eacute;fi. Robinson volontaire, il s''est enfonc&eacute; dans ce d&eacute;sert blanc o&ugrave; durant des mois, le thermom&egrave;tre descend &agrave; 40&deg; au-dessous de z&eacute;ro. Pour y accomplir un exploit ? Non&nbsp; pour savourer la grisante libert&eacute; de la vie &agrave; l''&eacute;tat sauvage. Ecoutez-le. Il nous livre le r&eacute;cit authentique de ses combats quotidiens, et surtout nous raconte l''alliance qu''il scella avec Yukon, le chien-loup qui fut, durant plus d''un an, son guide, son confident, et parfois son sauveur. Tous ceux qui liront ce t&eacute;moignage exceptionnel resteront fascin&eacute;s par la magie de cette amiti&eacute; o&ugrave; l''homme et l''animal se font d&eacute;couvrir l''un &agrave; l''autre leur v&eacute;rit&eacute;</p>\r\n<p>source:&nbsp;https://books.google.fr</p>', '2018-03-27 00:00:00'),
(4, 'Dernière course', '<p>Hiver 1900. Le trappeur qu&eacute;b&eacute;cois Jacques Larivi&egrave;re atteint les terres gel&eacute;es de l&rsquo;Alaska apr&egrave;s une incroyable travers&eacute;e de la ta&iuml;ga en tra&icirc;neau tir&eacute; par des chiens. La folie de l&rsquo;or a contamin&eacute; ce nouvel eldorado. Apr&egrave;s avoir tent&eacute; sa chance dans la prospection, Jacques se marie avec Kate et le couple s&rsquo;installe dans un chalet avec leur fille Elisabeth. Le trappeur retourne au commerce des fourrures alors que sa passion pour les chiens de trait ne l&rsquo;a pas quitt&eacute;. Il va enseigner &agrave; Elisabeth tout son savoir de musher (conducteur d&rsquo;attelage). Celle-ci participe bient&ocirc;t &agrave; des courses de tra&icirc;neau et la renomm&eacute;e de ses chiens grandit vite dans ces territoires recul&eacute;s. Dans ces ann&eacute;es-l&agrave;, les Larivi&egrave;re font aussi une rencontre d&eacute;cisive avec le Fran&ccedil;ais Ren&eacute; Dampierre, un militaire de carri&egrave;re bourlingueur. Quand la guerre &eacute;clate sur le vieux continent, le jeune officier y retourne accomplir son devoir. Lui vient alors l&rsquo;id&eacute;e extravagante d&rsquo;approvisionner par tra&icirc;neaux les avant-postes du front des Vosges&hellip; gr&acirc;ce &agrave; ces chiens puissants et endurants qu&rsquo;il a pu approcher dans le Grand Nord. Ce sont donc plus de 400 b&ecirc;tes qui prennent le large en direction des c&ocirc;tes fran&ccedil;aises, accompagn&eacute;s de mushers exp&eacute;riment&eacute;s... et de la jeune Elisabeth d&eacute;guis&eacute;e en homme !<br />De nouvelles exp&eacute;riences, rencontres fortes et confrontations avec le danger attendent la jeune fille.</p>\r\n<p>&nbsp;</p>\r\n<p>source:&nbsp;www.ricochet-jeunes.org</p>', '2018-04-29 20:05:58');

-- --------------------------------------------------------

--
-- Structure de la table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pseudo` varchar(255) NOT NULL,
  `mot_de_passe` varchar(255) CHARACTER SET utf8 COLLATE utf8_bin NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Contenu de la table `user`
--

INSERT INTO `user` (`id`, `pseudo`, `mot_de_passe`, `email`) VALUES
(5, 'clement', '$2y$10$CNVS.w5hSamHktKbnngxdeBej/LhKPG1nbqgcWCDoMpN6FhRdSwhS', 'jeanforteroche@outlook.fr');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
