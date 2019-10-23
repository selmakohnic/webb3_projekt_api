-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Värd: 127.0.0.1
-- Tid vid skapande: 22 okt 2019 kl 20:54
-- Serverversion: 10.1.37-MariaDB
-- PHP-version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databas: `cv`
--

-- --------------------------------------------------------

--
-- Tabellstruktur `cv_educations`
--

CREATE TABLE `cv_educations` (
  `id` int(11) NOT NULL,
  `duration` varchar(128) NOT NULL,
  `name` varchar(128) NOT NULL,
  `type` varchar(128) NOT NULL,
  `description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `cv_educations`
--

INSERT INTO `cv_educations` (`id`, `duration`, `name`, `type`, `description`) VALUES
(1, '2009-2012', 'Paradisskolan', 'HÃ¶gstadiet', 'HÃ¶gstadiet frÃ¥n sjuan till nian.'),
(2, '2012-2015', 'Ã…krahÃ¤llskolan', 'HÃ¶gskolefÃ¶rberedande examen', 'HÃ¶gskolefÃ¶rberedande examen inom teknik med inriktning mot informations- och medieteknik. Gick ut med 2700 poÃ¤ng.'),
(3, '2015-2018', 'LinnÃ©universitetet', 'Kandidatexamen', 'Filosofie kandidatexamen med inriktning mot interaktionsdesign.'),
(4, '2017-2017', 'HÃ¶gskolan Kristianstad', 'Kurs', 'Valfri enskild kurs som lÃ¤stes inom utbildningen Interaktionsdesign pÃ¥ LinnÃ©universitetet.'),
(5, '2018-Nuvarande', 'Mittuniversitetet', 'HÃ¶gskoleexamen', 'HÃ¶gskoleexamen med inriktning mot webbutveckling. FÃ¤rdigutbildad hÃ¶sten Ã¥r 2020.');

-- --------------------------------------------------------

--
-- Tabellstruktur `cv_jobs`
--

CREATE TABLE `cv_jobs` (
  `id` int(11) NOT NULL,
  `duration` varchar(128) NOT NULL,
  `company` varchar(128) NOT NULL,
  `role` varchar(128) NOT NULL,
  `description` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `cv_jobs`
--

INSERT INTO `cv_jobs` (`id`, `duration`, `company`, `role`, `description`) VALUES
(1, '2008-2012', 'Sport o lekringen m.fl.', 'Praktik', 'Praktiserat pÃ¥ Sport och lekringen, Awes, FagerslÃ¤ttskolan och fÃ¶rskolan Skattkistan.'),
(2, '2017-2017', 'ILT InlÃ¤sningstjÃ¤nst', 'Interaktionsdesigner', 'ExpertutvÃ¤rdering av deras tjÃ¤nst i form utav en heuristisk utvÃ¤rdering baserat pÃ¥ designprinciper. UtvÃ¤rdering av tjÃ¤nsten pÃ¥ olika plattformar sÃ¥som dator, telefon och surfplatta.'),
(3, '2014-Nuvarande', 'Olika fÃ¶retag', 'Interaktionsdesigner, grafisk formgivare, webbutvecklare', 'UtfÃ¶rt gratisjobb till fÃ¶rmÃ¥n fÃ¶r fÃ¶reningar och privatpersoner. Exempelvis affischer och bildretuschering.'),
(4, '2014-Nuvarande', 'RM Kedjeservice AB', 'Interaktionsdesigner', 'Frilansning frÃ¥n 2014 och fortgÃ¥ende dÃ¥ det behÃ¶vs. Grafisk formgivning av logotyp, tryck, bildekaler, banners och liknande.'),
(5, '2014-Nuvarande', 'Frilans', 'Interaktionsdesigner, grafisk formgivare, webbutvecklare', 'Frilansning fÃ¶r olika fÃ¶retag under ett antal Ã¥r.');

-- --------------------------------------------------------

--
-- Tabellstruktur `cv_user`
--

CREATE TABLE `cv_user` (
  `id` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `personal_id` int(11) NOT NULL,
  `address` varchar(128) NOT NULL,
  `zip_code` int(11) NOT NULL,
  `city` varchar(128) NOT NULL,
  `email` varchar(128) NOT NULL,
  `phone` int(11) NOT NULL,
  `cv_username` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `cv_user`
--

INSERT INTO `cv_user` (`id`, `name`, `personal_id`, `address`, `zip_code`, `city`, `email`, `phone`, `cv_username`, `password`) VALUES
(1, 'Selma Kohnic', 960309, 'Hantverkaregatan 14', 38244, 'Nybro', 'seko1800@student.miun.se', 725554611, 'cv_admin', 'loSeNord1');

-- --------------------------------------------------------

--
-- Tabellstruktur `cv_websites`
--

CREATE TABLE `cv_websites` (
  `id` int(11) NOT NULL,
  `title` varchar(128) NOT NULL,
  `url` varchar(128) NOT NULL,
  `description` varchar(225) NOT NULL,
  `image` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumpning av Data i tabell `cv_websites`
--

INSERT INTO `cv_websites` (`id`, `title`, `url`, `description`, `image`) VALUES
(1, 'Seal webbyrÃ¥', 'http://studenter.miun.se/~seko1800/dt057g/projekt/', 'Responsiv webbplats kodad med HTML och CSS Ã¥t det fiktiva fÃ¶retaget Seal WebbyrÃ¥.', 'sealwebbyra.jpg'),
(2, 'Web tutorials', 'http://studenter.miun.se/~seko1800/gd008g/Moment3_malluppgift/', 'Webbplats som Ã¤r responsiv, kodad i HTML och CSS och har fokus pÃ¥ typografi Ã¥t ett fiktivt fÃ¶retag kallat Web tutorials.', 'webtutorials.jpg'),
(3, 'Filmshoppen', 'http://studenter.miun.se/~seko1800/dt163g/moment4_projekt/', 'Responsiv webbplats kodad med HTML, CSS och JavaScript Ã¥t ett fiktigt fÃ¶retag, Filmshoppen, som sÃ¤ljer filmer. Fokus pÃ¥ bildbehandling.', 'filmshoppen.jpg'),
(4, 'My Blog', 'http://studenter.miun.se/~seko1800/dt093g/projekt/', 'Bloggplattform med mÃ¶jlighet att registrera ett konto, logga in, skriva inlÃ¤gg och liknande. Webbplatsen Ã¤r responsiv och kodad med HTML, CSS, JavaScript och PHP.', 'myblog.jpg'),
(5, 'SkogsfÃ¶retaget', 'http://studenter.miun.se/~seko1800/dt152g/moment1.3/', 'Webbplats, med fokus som lÃ¥g i CMS (WordPress), skapad Ã¥t det fiktiva fÃ¶retaget SkogsfÃ¶retaget. Webbplatsen Ã¤r responsiv och kodades om till ett tema som anvÃ¤ndes i WordPress.', 'skogsforetaget.jpg'),
(7, 'FÃ¤rdtjÃ¤nst', 'http://studenter.miun.se/~seko1800/dt068g/', 'Webbplats skapad i syfte att kunna boka fÃ¤rdtjÃ¤nst online. En anvÃ¤ndare kan registrera konto, logga in, boka fÃ¤rdtjÃ¤nst och liknande. Webbplatsen Ã¤r kodad i HTML, CSS, JavaScript och PHP.', 'fardtjanst.jpg');

--
-- Index för dumpade tabeller
--

--
-- Index för tabell `cv_educations`
--
ALTER TABLE `cv_educations`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `cv_jobs`
--
ALTER TABLE `cv_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `cv_user`
--
ALTER TABLE `cv_user`
  ADD PRIMARY KEY (`id`);

--
-- Index för tabell `cv_websites`
--
ALTER TABLE `cv_websites`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT för dumpade tabeller
--

--
-- AUTO_INCREMENT för tabell `cv_educations`
--
ALTER TABLE `cv_educations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT för tabell `cv_jobs`
--
ALTER TABLE `cv_jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT för tabell `cv_user`
--
ALTER TABLE `cv_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT för tabell `cv_websites`
--
ALTER TABLE `cv_websites`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
