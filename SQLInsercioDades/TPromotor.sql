-- phpMyAdmin SQL Dump
-- version 4.0.4.2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 22-05-2019 a las 17:45:39
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
-- Estructura de tabla para la tabla `usr_promotor`
--

CREATE TABLE IF NOT EXISTS `usr_promotor` (
  `id_usuari` int(11) NOT NULL,
  `validat` char(1) COLLATE latin1_spanish_ci DEFAULT NULL,
  `cif_promotor` char(9) COLLATE latin1_spanish_ci DEFAULT NULL,
  `adreca` varchar(10000) COLLATE latin1_spanish_ci DEFAULT NULL,
  `nom_local` varchar(200) COLLATE latin1_spanish_ci DEFAULT NULL,
  `num_events_creats` int(11) DEFAULT NULL,
  PRIMARY KEY (`id_usuari`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_spanish_ci;

--
-- Volcado de datos para la tabla `usr_promotor`
--

INSERT INTO `usr_promotor` (`id_usuari`, `validat`, `cif_promotor`, `adreca`, `nom_local`, `num_events_creats`) VALUES
(91, 'n', 'A80746951', 'asdfg', 'jkl', 0),
(93, 'n', 'P2146382C', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47723.68957087317!2d0.584915414967244!3d41.61833698622821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a6e048e73bd37f%3A0xa0d32ea2d259aaa', 'LightCode', 0),
(94, 's', 'R6466539A', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d47723.68957087317!2d0.584915414967244!3d41.61833698622821!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a6e048e73bd37f%3A0xa0d32ea2d259aaaf!2zTMOpcmlkYQ!5e0!3m2!1ses!2ses!4v1558456680647!5m2!1ses!2ses', 'Diables de Lleida', 1),
(95, 'n', 'G86093903', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d11949.433241461467!2d0.8614384375595577!3d41.51817861803632!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x12a6c0d4d47886c5%3A0x9d3567c4a6608', 'Casal Borges', 0),
(96, 's', 'D70385166', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d317718.69319292053!2d-0.3817765050863085!3d51.528307984912544!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x47d8a00baf21de75%3A0x52963a5addd52a99!2sLondres%2C+Reino+Unido!5e0!3m2!1ses!2ses!4v1558463058508!5m2!1ses!2ses', 'LightCodeEnt', 0),
(100, 'n', 'Q4646871F', 'null', 'Art Until Dark', 0);

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `usr_promotor`
--
ALTER TABLE `usr_promotor`
  ADD CONSTRAINT `usr_promotor_ibfk_1` FOREIGN KEY (`id_usuari`) REFERENCES `usuari` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
