-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2019 a las 17:46:04
-- Versión del servidor: 5.6.13
-- Versión de PHP: 5.4.17

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `daw2_liightcode`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuari`
--

CREATE TABLE IF NOT EXISTS `usuari` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(200) COLLATE latin1_spanish_ci NOT NULL,
  `nom_usuari` varchar(150) COLLATE latin1_spanish_ci NOT NULL,
  `nom` varchar(100) COLLATE latin1_spanish_ci DEFAULT NULL,
  `cognoms` varchar(250) COLLATE latin1_spanish_ci DEFAULT NULL,
  `psswd` varchar(50) COLLATE latin1_spanish_ci NOT NULL,
  `esPromotor` char(1) COLLATE latin1_spanish_ci NOT NULL,
  `data_creacio` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `mail` (`mail`),
  UNIQUE KEY `nom_usuari` (`nom_usuari`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci AUTO_INCREMENT=104 ;

--
-- Volcado de datos para la tabla `usuari`
--

INSERT INTO `usuari` (`id`, `mail`, `nom_usuari`, `nom`, `cognoms`, `psswd`, `esPromotor`, `data_creacio`) VALUES
(1, 'stef@mail.com', '@stef', 'stef', 'ano', 'stef123', 'n', '2019-01-01 11:45:23'),
(2, 'coc@mail.com', '@coc', 'coc', 'ainomano', 'coc123', 'n', '2019-01-01 11:45:23'),
(3, 'lam@mail.com', '@lam', 'lam', 'brusco', 'lam123', 'n', '2019-01-01 11:45:23'),
(4, 'tro@mail.com', '@tro', 'tro', 'tronero', 'tro123', 'n', '2019-01-01 11:45:23'),
(5, 'ming@mail.com', '@ming', 'ming', 'a', 'ming123', 'n', '2019-01-01 11:45:23'),
(6, 'pim@mail.com', '@pim', 'pim', 'pam', 'pim123', 'n', '2019-01-01 11:45:23'),
(7, 'tam@mail.com', '@tam', 'tam', 'izar', 'tam123', 'n', '2019-01-01 11:45:23'),
(8, 'cum@mail.com', '@cum', 'cum', 'shot', 'cum123', 'n', '2019-01-01 11:45:23'),
(9, 'somn@mail.com', '@somn', 'somn', 'i', 'somn123', 'n', '2019-01-01 11:45:23'),
(17, 'caasa@aa.comm', 'caleixsa', 'Stefano', 'Cattoni', 'casa', 'n', '2019-05-19 01:22:12'),
(18, 'caaasa@aa.comm', 'caleixsaa', 'Stefano', 'Cattoni', '', 'n', '2019-05-19 01:22:28'),
(19, 'casa2@gma.com', '', 'Stefano', 'Cattoni', 'casa', 's', '2019-05-19 01:43:49'),
(23, 'casa@casa.com', 'steaaaa', 'Stefano', 'Cattoni', 'casa', 'n', '2019-05-19 01:46:40'),
(24, 'casa@home.es', 'gory', 'Stefano', 'Cattoni', 'casa', 'n', '2019-05-19 13:54:41'),
(25, 'home@depot.com', 'cattonis', 'Stefano', 'Cattoni', 'casa', 'n', '2019-05-19 14:01:06'),
(26, 'stefa@fds.com', 'stef', 'Stefano', 'Cattoni', 'hola', 'n', '2019-05-19 15:09:01'),
(30, 'stefa@fa.com', 'hdbsf', 'Stefano', 'Cattoni', 'gfd', 'n', '2019-05-19 15:15:03'),
(31, 'sol@ga.com', 'sforstefnao', 'Stefano', 'Cattoni', 'casa', 'n', '2019-05-19 15:15:22'),
(34, '', 'Hola', 'hhh', 'hhh', 'aa', 'n', '2019-05-19 16:31:06'),
(35, 'e@e.e', 'Holasss', 'hhh', 'hhh', 'aa', 'n', '2019-05-19 16:32:57'),
(36, 'aaa@eee.l', 'nombres', 'Nom', 'Cognom', 'a', 'n', '2019-05-19 16:39:22'),
(37, 'refa@gfd.com', 'liobhsa', 'Hola', 'Hola', 'aa', 'n', '2019-05-19 16:43:23'),
(38, 'jjjj@gfds.com', 'qwerty', 'Hola', 'Hola', 'hh', 'n', '2019-05-19 16:57:53'),
(39, 'j@e.p', 'test1', 'Nom', 'Cognom', 'pass', 'n', '2019-05-19 17:09:49'),
(54, 'ola@ers.ol', 'test6969', 'Stefano', 'Cattoni', 'aq', 's', '2019-05-19 17:43:11'),
(55, 'ibu@ipub.com', 'aaa', 'ikj', 'kñjn', 'ñkjb', 'n', '2019-05-19 19:09:15'),
(56, 'ojnu@gfd.com', 'iub', 'oin', 'iub', 'jajaj', 'n', '2019-05-19 19:20:49'),
(58, 'oiub@oiyv.com', 'stefiputo', 'Stefano', 'Cattoni', 'contra', 's', '2019-05-19 19:45:50'),
(73, 'nahah@gfd.com', 'alesito', 'biko', 'oibu', 'asd', 'n', '2019-05-19 20:48:42'),
(74, 'hola@gfdswer.com', 'holaaaaaaaa', 'Stefano', 'Catto no', 'hola', 'n', '2019-05-19 20:50:17'),
(84, 'ikb@gfds.com', 'sdoajbmnv', 'jkrn6vjk', 'ipkbjl', 'asd', 'n', '2019-05-19 23:12:19'),
(85, 'ikb@gf2ds.com', 'sdoajbmnv2', 'jkrn6vjk', 'ipkbjl', 'aa', 'n', '2019-05-19 23:25:59'),
(86, 'ikb@gf3ds.com', 'sdoajbmnv3', 'jkrn6vjk', 'ipkbjl', 'aaa', 'n', '2019-05-19 23:28:35'),
(87, 'ikb@gf4ds.com', 'sdoajbmnv4', 'jkrn6vjk', 'ipkbjl', 'aa', 'n', '2019-05-19 23:33:12'),
(88, 'ikb@gf54ds.com', 'sdoajbmnv5', 'jkrn6vjk', 'ipkbjl', 'aa', 'n', '2019-05-19 23:34:58'),
(89, 'wqsvd@gfs.qcom', 'qwerfdsa', 'jkrn6vjk', 'ipkbjl', 'aaa', 'n', '2019-05-19 23:36:07'),
(90, 'wqas2svd@gfs.qcom', 'qazxsw', 'jkrn6vjk', 'ipkbjl', 'as', 'n', '2019-05-19 23:40:33'),
(91, 'qwert@hjkl.ol', 'test12', 'Nombre', 'Apellido', 'asd', 's', '2019-05-19 23:42:25'),
(93, 'lightcode@gmail.com', 'sforstefano', 'Stefano', 'Cattoni', 'contrasenya', 's', '2019-05-21 16:40:05'),
(94, 'contacte@diablesdelleida.cat', 'aleixberna2', 'Aleix', 'Bernadó', 'password', 's', '2019-05-21 16:46:05'),
(95, 'info@casalborges.cat', 'profilactic', 'Ivan', 'Maciá', 'password', 's', '2019-05-21 16:50:47'),
(96, 'mail@mailito.es', 'lightcode', 'Light', 'Code', 'contra', 's', '2019-05-21 20:25:19'),
(97, 'mail@mailsito.es', 'lightcode2', 'Light', 'Code', 'aaa', 'n', '2019-05-21 20:36:07'),
(98, 'mail@mail.ola', 'lightcode3', 'Light', 'Code', 'pass', 'n', '2019-05-21 20:43:06'),
(99, 'stefa@no.es', 'stefANO', 'Stefano', 'Cattoni', 'casa', 'n', '2019-05-21 20:48:12'),
(100, 'art@molt.es', 'darelix', 'Alexandra', 'Popescu', 'contra', 'n', '2019-05-21 20:49:35'),
(102, 'null@null.com', 'darelixxx', 'Nombre', 'Interesante', 'contra', 'n', '2019-05-21 20:53:43'),
(103, 'mail@tome.es', 'stefi', 'Stefano', 'Cattoni', 'contra', 'n', '2019-05-22 18:33:39');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
