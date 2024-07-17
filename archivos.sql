-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-07-2024 a las 22:37:05
-- Versión del servidor: 10.4.32-MariaDB
-- Versión de PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `archivos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `archivador`
--

CREATE TABLE `archivador` (
  `id` int(11) NOT NULL,
  `id_letra` varchar(100) NOT NULL,
  `numero` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `archivador`
--

INSERT INTO `archivador` (`id`, `id_letra`, `numero`, `estado`) VALUES
(1, 'A', 1, 1),
(2, 'A', 2, 1),
(3, 'A', 3, 1),
(4, 'A', 4, 1),
(5, 'A', 5, 1),
(6, 'A', 6, 1),
(7, 'A', 7, 1),
(8, 'A', 8, 1),
(9, 'A', 9, 1),
(10, 'A', 10, 1),
(11, 'A', 11, 1),
(12, 'A', 12, 1),
(13, 'A', 13, 1),
(14, 'A', 14, 1),
(15, 'A', 15, 1),
(16, 'A', 16, 1),
(17, 'A', 17, 1),
(18, 'A', 18, 1),
(19, 'A', 19, 1),
(20, 'A', 20, 1),
(21, 'A', 21, 1),
(22, 'A', 22, 1),
(23, 'B', 1, 1),
(24, 'B', 2, 1),
(25, 'B', 3, 1),
(26, 'B', 4, 1),
(27, 'B', 5, 1),
(28, 'B', 6, 1),
(29, 'B', 7, 1),
(30, 'B', 8, 1),
(31, 'B', 9, 1),
(32, 'B', 10, 1),
(33, 'B', 11, 1),
(34, 'B', 12, 1),
(35, 'B', 13, 1),
(36, 'B', 14, 1),
(37, 'B', 15, 1),
(38, 'B', 16, 1),
(39, 'C', 1, 1),
(40, 'C', 2, 1),
(41, 'C', 3, 1),
(42, 'C', 4, 1),
(43, 'C', 5, 1),
(44, 'C', 6, 1),
(45, 'C', 7, 1),
(46, 'C', 8, 1),
(47, 'C', 9, 1),
(48, 'C', 10, 1),
(49, 'C', 11, 1),
(50, 'C', 12, 1),
(51, 'C', 13, 1),
(52, 'C', 14, 1),
(53, 'C', 15, 1),
(54, 'C', 16, 1),
(55, 'C', 17, 1),
(56, 'C', 18, 1),
(57, 'C', 19, 1),
(58, 'C', 20, 1),
(59, 'C', 21, 1),
(60, 'C', 22, 1),
(61, 'C', 23, 1),
(62, 'C', 24, 1),
(63, 'C', 25, 1),
(64, 'C', 26, 1),
(65, 'C', 27, 1),
(66, 'C', 28, 1),
(67, 'C', 29, 1),
(68, 'C', 30, 1),
(69, 'C', 31, 1),
(70, 'C', 32, 1),
(71, 'C', 33, 1),
(72, 'C', 34, 1),
(73, 'CH', 1, 1),
(74, 'CH', 2, 1),
(75, 'CH', 3, 1),
(76, 'CH', 4, 1),
(77, 'CH', 5, 1),
(78, 'CH', 6, 1),
(79, 'CH', 7, 1),
(80, 'CH', 8, 1),
(81, 'CH', 9, 1),
(82, 'CH', 10, 1),
(83, 'CH', 11, 1),
(84, 'CH', 12, 1),
(85, 'D', 1, 1),
(86, 'D', 2, 1),
(87, 'D', 3, 1),
(88, 'D', 4, 1),
(89, 'D', 5, 1),
(90, 'D', 6, 1),
(91, 'D', 7, 1),
(92, 'D', 8, 1),
(93, 'D', 9, 1),
(94, 'D', 10, 1),
(95, 'D', 11, 1),
(96, 'D', 12, 1),
(97, 'D', 13, 1),
(98, 'D', 14, 1),
(99, 'E', 1, 1),
(100, 'E', 2, 1),
(101, 'E', 3, 1),
(102, 'E', 4, 1),
(103, 'E', 5, 1),
(104, 'F', 1, 1),
(105, 'F', 2, 1),
(106, 'F', 3, 1),
(107, 'F', 4, 1),
(108, 'F', 5, 1),
(109, 'F', 6, 1),
(110, 'F', 7, 1),
(111, 'F', 8, 1),
(112, 'F', 9, 1),
(113, 'F', 10, 1),
(114, 'F', 11, 1),
(115, 'G', 1, 1),
(116, 'G', 2, 1),
(117, 'G', 3, 1),
(118, 'G', 4, 1),
(119, 'G', 5, 1),
(120, 'G', 6, 1),
(121, 'G', 7, 1),
(122, 'G', 8, 1),
(123, 'G', 9, 1),
(124, 'G', 10, 1),
(125, 'G', 11, 1),
(126, 'G', 12, 1),
(127, 'G', 13, 1),
(128, 'G', 14, 1),
(129, 'G', 15, 1),
(130, 'G', 16, 1),
(131, 'G', 17, 1),
(132, 'G', 18, 1),
(133, 'G', 19, 1),
(134, 'H', 1, 1),
(135, 'H', 2, 1),
(136, 'H', 3, 1),
(137, 'H', 4, 1),
(138, 'H', 5, 1),
(139, 'H', 6, 1),
(140, 'H', 7, 1),
(141, 'H', 8, 1),
(142, 'H', 9, 1),
(143, 'I', 1, 1),
(144, 'I', 2, 1),
(145, 'I', 3, 1),
(146, 'I', 4, 1),
(147, 'I', 5, 1),
(148, 'J', 1, 1),
(149, 'J', 2, 1),
(150, 'J', 3, 1),
(151, 'J', 4, 1),
(152, 'K', 1, 1),
(153, 'L', 1, 1),
(154, 'L', 2, 1),
(155, 'L', 3, 1),
(156, 'L', 4, 1),
(157, 'L', 5, 1),
(158, 'L', 6, 1),
(159, 'L', 7, 1),
(160, 'L', 8, 1),
(161, 'L', 9, 1),
(162, 'L', 10, 1),
(163, 'L', 11, 1),
(164, 'LL', 1, 1),
(165, 'LL', 2, 1),
(166, 'LL', 3, 1),
(167, 'LL', 4, 1),
(168, 'LL', 5, 1),
(169, 'M', 1, 1),
(170, 'M', 2, 1),
(171, 'M', 3, 1),
(172, 'M', 4, 1),
(173, 'M', 5, 1),
(174, 'M', 6, 1),
(175, 'M', 7, 1),
(176, 'M', 8, 1),
(177, 'M', 9, 1),
(178, 'M', 10, 1),
(179, 'M', 11, 1),
(180, 'M', 12, 1),
(181, 'M', 13, 1),
(182, 'M', 14, 1),
(183, 'M', 15, 1),
(184, 'M', 16, 1),
(185, 'M', 17, 1),
(186, 'M', 18, 1),
(187, 'M', 19, 1),
(188, 'M', 20, 1),
(189, 'M', 21, 1),
(190, 'M', 22, 1),
(191, 'M', 23, 1),
(192, 'M', 24, 1),
(193, 'M', 25, 1),
(194, 'M', 26, 1),
(195, 'M', 27, 1),
(196, 'N', 1, 1),
(197, 'N', 2, 1),
(198, 'N', 3, 1),
(199, 'N', 4, 1),
(200, 'N', 5, 1),
(201, 'Ñ', 1, 1),
(202, 'O', 1, 1),
(203, 'O', 2, 1),
(204, 'O', 3, 1),
(205, 'O', 4, 1),
(206, 'O', 5, 1),
(207, 'P', 1, 1),
(208, 'P', 2, 1),
(209, 'P', 3, 1),
(210, 'P', 4, 1),
(211, 'P', 5, 1),
(212, 'P', 6, 1),
(213, 'P', 7, 1),
(214, 'P', 8, 1),
(215, 'P', 9, 1),
(216, 'P', 10, 1),
(217, 'P', 11, 1),
(218, 'P', 12, 1),
(219, 'P', 13, 1),
(220, 'P', 14, 1),
(221, 'P', 15, 1),
(222, 'P', 16, 1),
(223, 'Q', 1, 1),
(224, 'Q', 2, 1),
(225, 'Q', 3, 1),
(226, 'Q', 4, 1),
(227, 'Q', 5, 1),
(228, 'R', 1, 1),
(229, 'R', 2, 1),
(230, 'R', 3, 1),
(231, 'R', 4, 1),
(232, 'R', 5, 1),
(233, 'R', 6, 1),
(234, 'R', 7, 1),
(235, 'R', 8, 1),
(236, 'R', 9, 1),
(237, 'R', 10, 1),
(238, 'R', 11, 1),
(239, 'R', 12, 1),
(240, 'R', 13, 1),
(241, 'R', 14, 1),
(242, 'R', 15, 1),
(243, 'R', 16, 1),
(244, 'R', 17, 1),
(245, 'R', 18, 1),
(246, 'R', 19, 1),
(247, 'R', 20, 1),
(248, 'R', 21, 1),
(249, 'R', 22, 1),
(250, 'S', 1, 1),
(251, 'S', 2, 1),
(252, 'S', 3, 1),
(253, 'S', 4, 1),
(254, 'S', 5, 1),
(255, 'S', 6, 1),
(256, 'S', 7, 1),
(257, 'S', 8, 1),
(258, 'S', 9, 1),
(259, 'S', 10, 1),
(260, 'S', 11, 1),
(261, 'S', 12, 1),
(262, 'S', 13, 1),
(263, 'S', 14, 1),
(264, 'S', 15, 1),
(265, 'S', 16, 1),
(266, 'S', 17, 1),
(267, 'S', 18, 1),
(268, 'S', 19, 1),
(269, 'S', 20, 1),
(270, 'S', 21, 1),
(271, 'S', 22, 1),
(272, 'S', 23, 1),
(273, 'S', 24, 1),
(274, 'S', 25, 1),
(275, 'S', 26, 1),
(276, 'S', 27, 1),
(277, 'S', 28, 1),
(278, 'S', 29, 1),
(279, 'S', 30, 1),
(280, 'T', 1, 1),
(281, 'T', 2, 1),
(282, 'T', 3, 1),
(283, 'T', 4, 1),
(284, 'T', 5, 1),
(285, 'T', 6, 1),
(286, 'T', 7, 1),
(287, 'T', 8, 1),
(288, 'T', 9, 1),
(289, 'T', 10, 1),
(290, 'T', 11, 1),
(291, 'T', 12, 1),
(292, 'T', 13, 1),
(293, 'U', 1, 1),
(294, 'U', 2, 1),
(295, 'U', 3, 1),
(296, 'V', 1, 1),
(297, 'V', 2, 1),
(298, 'V', 3, 1),
(299, 'V', 4, 1),
(300, 'V', 5, 1),
(301, 'V', 6, 1),
(302, 'V', 7, 1),
(303, 'V', 8, 1),
(304, 'V', 9, 1),
(305, 'V', 10, 1),
(306, 'V', 11, 1),
(307, 'V', 12, 1),
(308, 'V', 13, 1),
(309, 'V', 14, 1),
(310, 'V', 15, 1),
(311, 'V', 16, 1),
(312, 'V', 17, 1),
(313, 'V', 18, 1),
(314, 'V', 19, 1),
(315, 'W', 1, 1),
(316, 'Y', 1, 1),
(317, 'Y', 2, 1),
(318, 'Y', 3, 1),
(319, 'Z', 1, 1),
(320, 'Z', 2, 1),
(321, 'Z', 3, 1),
(322, 'Z', 4, 1),
(323, 'Z', 5, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_expediente`
--

CREATE TABLE `detalle_expediente` (
  `id` int(11) NOT NULL,
  `id_expediente` int(11) NOT NULL,
  `id_documento` int(11) NOT NULL,
  `archivo` blob NOT NULL,
  `fecha_ingreso` date NOT NULL,
  `observacion` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_expediente`
--

INSERT INTO `detalle_expediente` (`id`, `id_expediente`, `id_documento`, `archivo`, `fecha_ingreso`, `observacion`, `estado`) VALUES
(1, 1, 1, 0x64656661756c742e706466, '2024-07-11', 'Faltan Notas', 1),
(2, 1, 2, 0x64656661756c742e706466, '2024-07-12', '', 1),
(3, 1, 3, 0x64656661756c742e706466, '2024-07-12', '', 1),
(4, 2, 1, 0x64656661756c742e706466, '2024-07-11', 'Faltan Notas', 1),
(5, 3, 1, 0x64656661756c742e706466, '2024-07-12', 'Faltan ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `detalle_roles`
--

CREATE TABLE `detalle_roles` (
  `id` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `id_rol` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `detalle_roles`
--

INSERT INTO `detalle_roles` (`id`, `id_usuario`, `id_rol`) VALUES
(48, 4, 1),
(49, 4, 2),
(50, 4, 3),
(51, 4, 4),
(52, 4, 8),
(53, 4, 9),
(54, 4, 10),
(55, 2, 1),
(56, 2, 2),
(57, 2, 3),
(58, 2, 4),
(59, 2, 8),
(60, 2, 9),
(61, 2, 10),
(65, 3, 1),
(66, 3, 2),
(67, 3, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `documento`
--

CREATE TABLE `documento` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `documento`
--

INSERT INTO `documento` (`id`, `descripcion`, `estado`) VALUES
(1, 'Boleta de Notas', 1),
(2, 'Copia de DNi del Estudiante', 1),
(3, 'Certificado de Estudios', 1),
(4, 'Copia dni del Apoderado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `estanteria`
--

CREATE TABLE `estanteria` (
  `id` int(11) NOT NULL,
  `descripcion` varchar(5000) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `estanteria`
--

INSERT INTO `estanteria` (`id`, `descripcion`, `estado`) VALUES
(1, 'Ninguno ', 1),
(2, 'Estanter 1', 1),
(3, 'Estanter 2', 1),
(4, 'Estanter 3', 1),
(5, 'Estanter 4', 1),
(6, 'Estanter 5', 1),
(7, 'Estanter 6', 1),
(8, 'Estanter 7', 1),
(9, 'Estanter 8', 1),
(10, 'Estanter 9', 1),
(11, 'Estanter 10', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `expediente`
--

CREATE TABLE `expediente` (
  `id` int(11) NOT NULL,
  `id_persona` int(11) NOT NULL,
  `id_estanteria` int(11) NOT NULL,
  `id_archivador` int(11) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `expediente`
--

INSERT INTO `expediente` (`id`, `id_persona`, `id_estanteria`, `id_archivador`, `estado`) VALUES
(1, 6, 1, 1, 1),
(2, 1, 1, 1, 1),
(3, 2, 1, 1, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `letra`
--

CREATE TABLE `letra` (
  `id_letra` int(50) NOT NULL,
  `letra` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `persona`
--

CREATE TABLE `persona` (
  `id` int(11) NOT NULL,
  `id_tipodoc` int(50) DEFAULT NULL,
  `numero_doc` varchar(50) DEFAULT NULL,
  `codigo_estudiante` varchar(50) DEFAULT NULL,
  `apellido_pat` varchar(100) NOT NULL,
  `apellido_mat` varchar(100) NOT NULL,
  `nombres` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `persona`
--

INSERT INTO `persona` (`id`, `id_tipodoc`, `numero_doc`, `codigo_estudiante`, `apellido_pat`, `apellido_mat`, `nombres`, `estado`) VALUES
(1, 1, '', '', 'ALCANTARA', 'CERCADO', 'MARIA JESUS', 1),
(2, 1, '', '', 'ALCANTARA', 'AGAPITO', 'RUBEN HOMERO', 1),
(3, 1, '', '', 'ALCALDE', 'GUEVARA', 'MABILA ', 1),
(4, 1, '', '', 'ALCALDE', 'GUEVARA', 'CELMIRA', 1),
(5, 1, '', '', 'ALBUJAR', 'CASTAÑEDA', 'ANDRIANA ANDREA', 1),
(6, 1, '', '', 'ALBITES', 'LABRIN', 'YANINA', 1),
(7, 1, '', '', 'ALBERCA', 'VILCHEZ', 'KAREN ALEXANDRA', 1),
(8, 1, '', '', 'ALBERCA', 'URIARTE', 'EBERILDO', 1),
(9, 1, '', '', 'ALBERCA', 'RAMIREZ', 'HERMELINDA', 1),
(10, 1, '', '', 'ALBERCA', 'GUEVARA', 'JOSE MIGUEL', 1),
(11, 1, '', '', 'ALBERCA', 'ADRIANZEN', 'CARMEN  EMERITA', 1),
(12, 1, '', '', 'ALBERCA', 'ACHA', 'GEORGINA', 1),
(13, 1, '', '', 'ALARCON', 'TENORIO', 'DANIEL ALEXANDER', 1),
(14, 1, '', '', 'ALARCON', 'SILVA', 'HERMELINDA SUCETTI', 1),
(15, 1, '', '', 'ALARCON', 'ROJAS', 'ANA KARY', 1),
(16, 1, '', '', 'ALARCON', 'PEREZ', 'MELVA YANE', 1),
(17, 1, '', '', 'ALARCON', 'MANAY', 'NORMALY', 1),
(18, 1, '', '', 'ALARCON', 'GUERRERO', 'DILMER', 1),
(19, 1, '', '', 'ALARCON', 'FERNANDEZ', 'ELMA', 1),
(20, 1, '', '', 'ALARCON', 'COTRINA', 'LUZ VIOLETA', 1),
(21, 1, '', '', 'ALARCON', 'CONSTANTINO', 'NANCY ARACELY', 1),
(22, 1, '', '', 'ALARCON', 'BAUTISTA', 'JORGE LUIS', 1),
(23, 1, '', '', 'ALARCON', 'ALARCON', 'LINO NELSON', 1),
(24, 1, '', '', 'ALAMO', 'VENTURA', 'MERLI EVELI', 1),
(25, 1, '', '', 'ALAMAS', 'REYES', 'JERSON ALEXANDER', 1),
(26, 1, '', '', 'ALACHE', 'TANTALEAN', 'NELLY', 1),
(27, 1, '', '', 'ALACHE', 'CALLACNA', 'MIRIAM EDITH', 1),
(28, 1, '', '', 'AHUMADA', 'HERNANDEZ', 'LUCIA', 1),
(29, 1, '', '', 'AGURTO', 'AGUILAR', 'JEAN PIER ESTIVEN', 1),
(30, 1, '', '', 'AGURTO', 'SANDOVAL', 'LIZET JACKELIN', 1),
(31, 1, '', '', 'AGURTO', 'HUAMAN', 'MAHILSON ELIAS', 1),
(32, 1, '', '', 'AGURTO', 'HUAMAN', 'LEYDI KARINA', 1),
(33, 1, '', '', 'AGUERO', 'HUAMAN', 'DEYSI MILAGROS', 1),
(34, 1, '', '', 'AGURTO', 'FLORES', 'MATILDE', 1),
(35, 1, '', '', 'AGURTO', 'FLORES', 'BALVINA', 1),
(36, 1, '', '', 'AGUIRRE', 'GARCIA', 'ALIPIO', 1),
(37, 1, '', '', 'AGUIRRE', 'AYALA', 'NESTOR JAHIR', 1),
(38, 1, '', '', 'AGUILERA', 'REYES', 'JOSE ALEX', 1),
(39, 1, '', '', 'AGUILERA', 'ABARCA', 'JOSE ANDRES', 1),
(40, 1, '', '', 'AGUILAR', 'VENTURA', 'DIANA KAREN', 1),
(41, 1, '', '', 'AGUILAR', 'VASQUEZ', 'ROSA', 1),
(42, 1, '', '', 'AGUILAR', 'VASQUEZ', 'MARTHA YOELA', 1),
(43, 1, '', '', 'AGUILAR', 'VASQUEZ', 'JHON EDINSON', 1),
(44, 1, '', '', 'AGUILAR', 'TORRES', 'SHIRLEY DEL ROSARIO', 1),
(45, 1, '', '', 'AGUILAR', 'SANCHEZ', 'SIOMAR', 1),
(46, 1, '', '', 'AGUILAR', 'PALACIOS', 'VERONICA', 1),
(47, 1, '', '', 'AGUILAR', 'MONTEZA', 'ALEJANDRINA', 1),
(48, 1, '', '', 'AGUILAR', 'LOPEZ', 'ELIZABETH FABIOLA', 1),
(49, 1, '', '', 'AGUILAR', 'HERRERA', 'NOEMI', 1),
(50, 1, '', '', 'AGUILAR', 'FLORES', 'PEDRO JESUS', 1),
(51, 1, '', '', 'AGUILAR', 'DIAZ', 'HELI', 1),
(52, 1, '', '', 'AGUILAR', 'CESPEDES', 'BENJAMIN', 1),
(53, 1, '', '', 'AGUILAR', 'BACA', 'WILTON', 1),
(54, 1, '', '', 'AGUILAR', 'MERINO', 'ANGEL DIEGO', 1),
(55, 1, '', '', 'AGAPITO', 'MAYRA', 'SALINA', 1),
(56, 1, '', '', 'AGAPITO', 'GONZALES', 'ROXANA ENCARNACION', 1),
(57, 1, '', '', 'AGAPITO', 'GONZALES', 'JANET', 1),
(58, 1, '', '', 'ADRIANZEN', 'BERMEO', 'EDWAN ENRIQUE', 1),
(59, 1, '', '', 'ADANAQUE', 'JUAREZ', 'JOPSE OMAR', 1),
(60, 1, '', '', 'ACUÑA', 'TARRILLO', 'JULIA', 1),
(61, 1, '', '', 'ACUÑA', 'LEONARDO', 'ZAIRA ELIZABETH', 1),
(62, 1, '', '', 'ACUÑA', 'FERNANDEZ', 'LUISSINIO JESUS', 1),
(63, 1, '', '', 'ACUÑA', 'ALARCON', 'DEYSI FABIOLA', 1),
(64, 1, '', '', 'ACUÑA', 'ALARCON', 'ROXANA JAKELINE', 1),
(65, 1, '', '', 'ACOSTA', 'SANTISTEBAN', 'JOSE AGUSTIN', 1),
(66, 1, '', '', 'ACOSTA', 'SANCHEZ', 'EDWIN EMERSON', 1),
(67, 1, '', '', 'ACOSTA', 'RIOJAS', 'DONAY YAMPIER', 1),
(68, 1, '', '', 'ACOSTA', 'MORALES', 'DORIS DEL ROCIO', 1),
(69, 1, '', '', 'ACOSTA', 'MORALES', 'DENIS JAVIER', 1),
(70, 1, '', '', 'ACOSTA', 'LOPEZ', 'MARIA SUSANA', 1),
(71, 1, '', '', 'ACOSTA', 'CHAPOÑAN', 'MAYRA JAKELINE', 1),
(72, 1, '', '', 'ACOSTA', 'CASTILLO', 'JONATHAN ANTONIO', 1),
(73, 1, '', '', 'ACOSTA', 'CAJUSOL', 'JESENIA', 1),
(74, 1, '', '', 'ACOSTA', 'CAJUSOL', 'JUAN LUIS', 1),
(75, 1, '', '', 'ACHO', 'APASA', 'MITSY BERENISSE', 1),
(76, 1, '', '', 'ABARCA', 'RUEDA', 'ANITA ARACELI', 1),
(77, 1, '', '', 'ABANTO', 'LEON', 'RONALD', 1),
(78, 1, '', '', 'ABANTO', 'HUAMAN', 'HAYDEE CAROLA', 1),
(79, 1, '', '', 'ABANTO', 'ABANTO', 'MARIA ADELA', 1),
(80, 1, '', '', 'ABAD', 'REQUEJO', 'MARLON ANTONIO', 1),
(81, 1, '', '', 'ABAD', 'QUINTE', 'LUZ AURORA', 1),
(82, 1, '', '', 'ABAD', 'MULATILLO', 'LUZ IRENE', 1),
(83, 1, '', '', 'ALARCON', 'GUERRERO', 'JOSUE JONATTAN', 1),
(84, 1, '', '', 'ALVARADO', 'BENITES', 'ELIDA ISABEL', 1),
(85, 1, '', '', 'ANTON', 'CHAPILLIQUEN', 'JOSE SANTOS', 1),
(86, 1, '', '', 'ATOCHE', 'GUTIERREZ', 'MIRIAM SUGEY', 1),
(87, 1, '', '', 'ATOCHE', 'ALBURQUEQUE', 'STEFANIE KATHERINE', 1),
(88, 1, '', '', 'ATENCIO', 'VERA', 'GUSTAVO ADOLFO', 1),
(89, 1, '', '', 'ATENCIO', 'LLANOS', 'YOHANA PAOLA', 1),
(90, 1, '', '', 'ATENCIO', 'GONZALES', 'MARIA ELIZABETH', 1),
(91, 1, '', '', 'ASTONITAS', 'VASQUEZ', 'EVELIO', 1),
(92, 1, '', '', 'ASTONITAS', 'ILAS', 'JULIA', 1),
(93, 1, '', '', 'ASPAJO', 'CARRASCO', 'NANCY JOHANA', 1),
(94, 1, '', '', 'ASENJO', 'TORRES', 'SILVIA', 1),
(95, 1, '', '', 'ASENJO', 'TORRES', 'ROSA ESPERANZA', 1),
(96, 1, '', '', 'ASENCIO', 'SONAPO', 'LINA', 1),
(97, 1, '', '', 'ASENCIO', 'CUEVA', 'DELVINA', 1),
(98, 1, '', '', 'ASCOY', 'VASQUEZ', 'BANESA RUTH', 1),
(99, 1, '', '', 'ASCOY', 'BARRIENTE', 'JAIME ALEJANDRO', 1),
(100, 1, '', '', 'ASENCIO', 'QUESQUEN', 'MILAGROS YULIANA', 1),
(101, 1, '', '', 'ALCANTARA', 'CERCADO', 'JOSE EMILIO', 1),
(102, 1, '', '', 'HUAMAN', 'GUERRERO', 'LILI', 1),
(103, 1, '', '', 'HUAMAN', 'HUAMAN', 'LILI ', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `nombre_rol` varchar(250) NOT NULL,
  `tipo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `roles`
--

INSERT INTO `roles` (`id`, `nombre_rol`, `tipo`) VALUES
(1, 'Archivadores', 0),
(2, 'Expedientes', 0),
(3, 'Estanteria', 0),
(4, 'Personas', 0),
(5, 'Usuarios', 0),
(6, 'Dashboard', 0),
(8, 'Tipo Documento Identidad', 0),
(9, 'Documentos', 0),
(10, 'Detalles de Expedientes', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_documento_identidad`
--

CREATE TABLE `tipo_documento_identidad` (
  `id` int(50) NOT NULL,
  `tipoDocumento` varchar(50) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `tipo_documento_identidad`
--

INSERT INTO `tipo_documento_identidad` (`id`, `tipoDocumento`, `estado`) VALUES
(1, 'Ninguno', 1),
(2, 'DNI', 1),
(3, 'Carnet', 0);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(12) NOT NULL,
  `usuario` varchar(100) NOT NULL,
  `nombre` varchar(200) NOT NULL,
  `clave` varchar(100) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `dni` varchar(12) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL,
  `imagen` varchar(100) NOT NULL,
  `estado` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `usuario`, `nombre`, `clave`, `dni`, `imagen`, `estado`) VALUES
(1, 'admin', 'Juan Mejia Baca', '8c6976e5b5410415bde908bd4dee15dfb167a9c873fc4bb8a81f6f2ab448a918', '23456789', 'default.png', 1),
(2, 'archivo', 'Archivo', '247a8174ec0c61e4f6c2f0299b27648c9ef3dc8482f7083d01c8a389976a6a76', '71862573', 'default.png', 1),
(3, 'practicante', 'colegio', 'bb6c9cfd1b4541b361aa4feb15061b70b9ac8bdd2a7341b384b00506f97f8e5a', '12345678', 'default.png', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `archivador`
--
ALTER TABLE `archivador`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_letra` (`id_letra`);

--
-- Indices de la tabla `detalle_expediente`
--
ALTER TABLE `detalle_expediente`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_documento` (`id_documento`),
  ADD KEY `id_expediente` (`id_expediente`) USING BTREE;

--
-- Indices de la tabla `detalle_roles`
--
ALTER TABLE `detalle_roles`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_rol` (`id_rol`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `documento`
--
ALTER TABLE `documento`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `estanteria`
--
ALTER TABLE `estanteria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD PRIMARY KEY (`id`) USING BTREE,
  ADD KEY `id_archivador` (`id_archivador`) USING BTREE,
  ADD KEY `id_persona` (`id_persona`) USING BTREE,
  ADD KEY `id_estanteria` (`id_estanteria`) USING BTREE;

--
-- Indices de la tabla `letra`
--
ALTER TABLE `letra`
  ADD PRIMARY KEY (`id_letra`);

--
-- Indices de la tabla `persona`
--
ALTER TABLE `persona`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_tipodoc` (`id_tipodoc`);

--
-- Indices de la tabla `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tipo_documento_identidad`
--
ALTER TABLE `tipo_documento_identidad`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `archivador`
--
ALTER TABLE `archivador`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT de la tabla `detalle_expediente`
--
ALTER TABLE `detalle_expediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `detalle_roles`
--
ALTER TABLE `detalle_roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=68;

--
-- AUTO_INCREMENT de la tabla `documento`
--
ALTER TABLE `documento`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `estanteria`
--
ALTER TABLE `estanteria`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `expediente`
--
ALTER TABLE `expediente`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `persona`
--
ALTER TABLE `persona`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=104;

--
-- AUTO_INCREMENT de la tabla `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT de la tabla `tipo_documento_identidad`
--
ALTER TABLE `tipo_documento_identidad`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `expediente`
--
ALTER TABLE `expediente`
  ADD CONSTRAINT `expediente_ibfk_1` FOREIGN KEY (`id_persona`) REFERENCES `persona` (`id`),
  ADD CONSTRAINT `expediente_ibfk_2` FOREIGN KEY (`id_estanteria`) REFERENCES `estanteria` (`id`),
  ADD CONSTRAINT `expediente_ibfk_3` FOREIGN KEY (`id_archivador`) REFERENCES `archivador` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
