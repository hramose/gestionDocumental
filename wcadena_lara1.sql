-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 16-09-2017 a las 04:29:07
-- Versión del servidor: 10.1.25-MariaDB
-- Versión de PHP: 7.1.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `wcadena_lara1`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `config`
--

CREATE TABLE `config` (
  `id_config` int(11) NOT NULL,
  `tipo` varchar(20) DEFAULT NULL,
  `valor` varchar(20) DEFAULT NULL,
  `fijo` int(11) DEFAULT '0',
  `fecha_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `config`
--

INSERT INTO `config` (`id_config`, `tipo`, `valor`, `fijo`, `fecha_update`) VALUES
(1, NULL, NULL, 0, '2015-02-27 02:49:34'),
(2, NULL, NULL, 0, '2015-02-27 02:49:38');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `ext`
--

CREATE TABLE `ext` (
  `ID` int(11) NOT NULL,
  `EXT` varchar(255) DEFAULT NULL,
  `USUARIO` varchar(255) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `listadeusuarios`
--

CREATE TABLE `listadeusuarios` (
  `id` int(10) UNSIGNED NOT NULL,
  `base_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `nombre_completo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `registro_empleado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cargo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `aplicacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `id_de_usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `estado_del_usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_de_usuario` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `modulo` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `rol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `privilegio` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `certificacion_del_rol` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_de_documento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `documento_de_identificacion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_de_empleado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `empresa` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `correo_electronico` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2015_04_17_214027_create_tb_estaciones_table', 2),
('2015_04_19_033413_create_nerds_table', 3),
('2015_04_19_034328_tb_departamento', 4),
('2015_04_21_030624_create_tablas', 4),
('2015_12_20_001241_create_documents_table', 5),
('2016_01_21_013543_create_directorios_table', 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedidos`
--

CREATE TABLE `pedidos` (
  `ID_PETICION` int(11) NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `CANTIDAD` int(11) DEFAULT NULL,
  `ESTACION` varchar(20) DEFAULT NULL,
  `TIPO` varchar(20) DEFAULT NULL,
  `PROBLEMA` varchar(1000) DEFAULT NULL,
  `COD_EMPLEADO_SOPORTE` varchar(50) DEFAULT NULL,
  `ESTADO` varchar(50) DEFAULT NULL,
  `FECHA_PEDIDO` datetime DEFAULT NULL,
  `FECHA_SOLUCION` datetime DEFAULT NULL,
  `ASIGNADO` varchar(50) DEFAULT NULL,
  `SOLUCION` varchar(1000) DEFAULT NULL,
  `MAIL_REQ` varchar(100) DEFAULT NULL,
  `FECHA_ASIGNACION` datetime DEFAULT NULL,
  `AREA` varchar(100) DEFAULT NULL,
  `REASIGNADO` varchar(100) DEFAULT NULL,
  `FECHA_REASIGNACION` datetime DEFAULT NULL,
  `MOTIVO_REASIGNACION` varchar(500) DEFAULT NULL,
  `PRIORIDAD` varchar(50) DEFAULT NULL,
  `EXTENCION` varchar(50) DEFAULT NULL,
  `CELULAR` varchar(50) DEFAULT NULL,
  `IP_1` varchar(20) DEFAULT NULL,
  `IP_2` varchar(20) DEFAULT NULL,
  `ID_DEPARTAMENTO` int(11) DEFAULT NULL,
  `TITULO` varchar(150) DEFAULT NULL,
  `UNIQ` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedidos`
--

INSERT INTO `pedidos` (`ID_PETICION`, `NOMBRE`, `CANTIDAD`, `ESTACION`, `TIPO`, `PROBLEMA`, `COD_EMPLEADO_SOPORTE`, `ESTADO`, `FECHA_PEDIDO`, `FECHA_SOLUCION`, `ASIGNADO`, `SOLUCION`, `MAIL_REQ`, `FECHA_ASIGNACION`, `AREA`, `REASIGNADO`, `FECHA_REASIGNACION`, `MOTIVO_REASIGNACION`, `PRIORIDAD`, `EXTENCION`, `CELULAR`, `IP_1`, `IP_2`, `ID_DEPARTAMENTO`, `TITULO`, `UNIQ`) VALUES
(72, 'GAD PIFO', NULL, '-', NULL, 'OFIC. 001-GAD-PIFO-2016', NULL, 'EN PROCESO', '2016-05-11 10:21:27', NULL, NULL, NULL, 'secretariageneral@conagoparepichincha.gob.ec', NULL, NULL, NULL, NULL, NULL, 'URGENTE', '02-2381-449 / 2382-212', '099-9609-212', '181.112.82.106', '181.112.82.106', 161, 'EVENTO CULTURAL - AUSPICIA', 'pedido_573368a990662'),
(71, 'GAD ALOASI ', NULL, '-', NULL, 'OFIC.0002-GPA CF-2016\r\n\r\nEVENTO : SABADO  14 DE MAYO 20H00PM', NULL, 'EN PROCESO', '2016-04-20 13:47:21', NULL, NULL, NULL, 'secretariageneral@conagoparepichincha.gob.ec', NULL, NULL, NULL, NULL, NULL, 'MEDIO', '02-2309-837               02-2309-417', '099-5330-741', '181.112.104.80', '181.112.104.80', 161, 'AUSPICIO JORNADAS CULTURALES', 'pedido_5717ea4b458b9'),
(70, 'GAD GUANGOPOLO ', NULL, '-', NULL, 'OFIC.36-2016-GADG', NULL, 'COMPLETADO', '2016-03-23 15:32:38', '2017-04-09 15:15:31', 'Patricia  Tonato', NULL, 'secretariageneral@conagoparepichincha.gob.ec', NULL, NULL, NULL, NULL, NULL, 'ALTO', '02-2095-389', '098-5656-183', '190.63.150.26', '190.63.150.26', 161, 'SOLICITUD AUSPICIO ARTISTA', 'pedido_56f318c08191b'),
(69, 'GAD ALOASI ', NULL, '-', NULL, 'OFIC. 0002-GPA CF.-2016', NULL, 'EN PROCESO', '2016-03-23 14:46:08', NULL, NULL, NULL, 'gpaloasi@hotmail.com', NULL, NULL, NULL, NULL, NULL, 'BAJO', '02-2309-837               02-2309-417', '099-5330-741', '190.63.150.26', '190.63.150.26', 161, 'SOLICITUD AUSPICIO ARTISTA', 'pedido_56f30dfb19aeb'),
(73, 'Wagner cadena', NULL, '-', NULL, 'PreparaciÃ³n de envÃ­o de correo, solicito archivos para envio de correo', NULL, 'EN PROCESO', '2017-03-28 16:48:57', NULL, NULL, NULL, 'wcadena@outlook.com', NULL, NULL, NULL, NULL, NULL, 'URGENTE', '0992946682', '0992946682', '127.0.0.1', '127.0.0.1', 91, 'PreparaciÃ³n de envÃ­o de correo', 'pedido_58dad9fe7c926'),
(74, 'GAD ATAHUALPA', NULL, '-', NULL, 'Solicitud de capacitaciÃ³n de Excel para empleados nuevos', NULL, 'EN PROCESO', '2017-03-28 16:55:23', NULL, NULL, NULL, 'gpatahualpacn@gmail.com', NULL, NULL, NULL, NULL, NULL, 'MEDIO', '02-2304-755', '099-3937-500', '127.0.0.1', '127.0.0.1', 104, 'Solicitud de capacitaciÃ³n de Excel', 'pedido_58dadb911efde'),
(75, 'GAD MANUEL CORNEJO ASTORGA   TANDAPI  ', NULL, '-', NULL, 'pintura de entrada de comunidad San Juan de Tandapi', NULL, 'COMPLETADO', '2017-03-29 08:15:10', '2017-03-31 20:51:25', 'Lucia  Toapanta', NULL, 'juntaparroquialmca@hotmail.es', NULL, NULL, NULL, NULL, NULL, 'MEDIO', '02-2177-142     ', '099-2015-248', '127.0.0.1', '127.0.0.1', 153, 'pintura de entrada de comunidad San Juan de Tandapi', 'pedido_58dbb2fe76792'),
(76, 'GAD SAN JOSE DE MINAS', NULL, '-', NULL, 'se solicita verificaciÃ³n de nomina de horas extras de empleados ', NULL, 'COMPLETADO', '2017-03-29 08:20:28', '2017-03-31 22:38:33', 'Patricia  Tonato', NULL, 'junta.parroquial.sanjosedeminas@hotmail.com', NULL, NULL, NULL, NULL, NULL, 'ALTO', '02-2302-118 / 2308-642', '099-7867-523 / 099-8032-222', '127.0.0.1', '127.0.0.1', 110, 'consulta nomina de pagos mes de abril', 'pedido_58dbb39d9b80e'),
(77, 'GAD ATAHUALPA', NULL, '-', NULL, 'Se solicita ayuda, consulta sobre escrito escuela almirante Pozo', NULL, 'EN PROCESO', '2017-03-29 10:46:50', NULL, NULL, NULL, 'gpatahualpacn@gmail.com', NULL, NULL, NULL, NULL, NULL, 'MEDIO', '02-2304-755', '099-3937-500', '172.29.16.145', '172.29.16.145', 134, 'Consulta juicio Almirante Pozo', 'pedido_58dbb6d24013e'),
(78, 'GAD CALDERON', NULL, '-', NULL, 'Se solicita arreglo de parque y mantenimiento de juegos o cambio por juegos ecolÃ³gicos ', NULL, 'EN PROCESO', '2017-03-29 10:50:48', NULL, NULL, NULL, 'asistente.presidencia@gobiernopcalderon.gob.ec', NULL, NULL, NULL, NULL, NULL, 'MEDIO', '02-2826-023 / 2821-018 / 2821-414', '099-2876-332 / 098-6627-875', '172.29.16.145', '172.29.16.145', 150, 'Mantenimiento de juegos parque Mario Fuertes', 'pedido_58dbd72f6ee91'),
(79, 'GAD PACTO', NULL, '-', NULL, 'Fiesta de fundaciÃ³n, se necesita una mano con contratacion de tarima y sonido ', NULL, 'EN PROCESO', '2017-03-30 23:03:26', NULL, NULL, NULL, 'gobiernoparroquialpacto@hotmail.com', NULL, NULL, NULL, NULL, NULL, 'ALTO', '02-2176-061 / 2176-125', ' 098-3674-328', '127.0.0.1', '127.0.0.1', 94, 'Fiestas patronales y de fundacion', 'pedido_58ddd105eacb3'),
(80, 'GAD LA MERCED', NULL, '-', NULL, 'Solicitud de capacitaciÃ³n de Excel para compaÃ±eros de clases', NULL, 'EN PROCESO', '2017-03-31 22:53:29', NULL, NULL, NULL, 'juntaparroquialdelamerced@hotmail.com', NULL, NULL, NULL, NULL, NULL, 'MEDIO', '02-2386-070 / 2385-529', '093-9028-233', '127.0.0.1', '127.0.0.1', 104, 'Solicitud de capacitaciÃ³n de Excel', 'pedido_58df23b17e534'),
(81, 'GAD PINTAG', NULL, '-', NULL, 'Se solicita creaciÃ³n de parque en la entrada de arrio 24 de mayo', NULL, 'EN PROCESO', '2017-04-08 21:49:31', NULL, NULL, NULL, 'junta_parroquial_de_pintag@hotmail.com', NULL, NULL, NULL, NULL, NULL, 'ALTO', '02-2383-716 / 2585-716', '098-2554-366', '127.0.0.1', '127.0.0.1', 121, 'creaciÃ³n de parque', 'pedido_58e9a0d021bc0'),
(82, 'GAD LLANO CHICO ', NULL, '-', NULL, 'Fiestas de fundacion LLano Chico, solicitud de tarima y musica', NULL, 'EN PROCESO', '2017-04-08 22:05:10', NULL, NULL, NULL, 'jpllanochico@hotmail.com', NULL, NULL, NULL, NULL, NULL, 'ALTO', '02-2830-866 / 2830-852 / 2830-866', '098-0325-405/099-6122-060', '127.0.0.1', '127.0.0.1', 161, 'Fiestas de fundacion LLano Chico', 'pedido_58e9a3e4b7aa9'),
(83, 'GAD CHAVEZPAMBA ', NULL, '-', NULL, 'SOlicitud de envio de actas de reunion1', NULL, 'EN PROCESO', '2017-04-09 14:29:06', NULL, NULL, NULL, 'gadchavezpamba@hotmail.es', NULL, NULL, NULL, NULL, NULL, 'ALTO', '02-2782-138', '099-9458-266', '127.0.0.1', '127.0.0.1', 102, 'SOlicitud de envio de actas de reunion1', 'pedido_58ea89ca92d75'),
(84, 'Patricia ', NULL, '-', NULL, 'curso de actualizaciÃ³n SRI', NULL, 'EN PROCESO', '2017-04-09 15:06:33', NULL, NULL, NULL, 'contabilidad@conagoparepichincha.gob.ec', NULL, NULL, NULL, NULL, NULL, 'BAJO', '2551-623', '099-600-1470', '127.0.0.1', '127.0.0.1', 102, 'curso de actualizaciÃ³n SRI', 'pedido_58ea93ca69454'),
(85, 'Patricia ', NULL, '-', NULL, 'EnvÃ­o de correos de solicitud de vacaciones para empleados CONAGOPARE', NULL, 'EN PROCESO', '2017-04-09 16:36:58', NULL, NULL, NULL, 'contabilidad@conagoparepichincha.gob.ec', NULL, NULL, NULL, NULL, NULL, 'ALTO', '2551-623', '099-600-1470', '127.0.0.1', '127.0.0.1', 102, 'EnvÃ­o de correos de solicitud de vacaciones', 'pedido_58eaa91e112fa'),
(86, 'Patricia ', NULL, '-', NULL, 'Visita con delegaciÃ³n de Cuba a Escuelas del sur de quito', NULL, 'EN PROCESO', '2017-04-09 16:38:42', NULL, NULL, NULL, 'contabilidad@conagoparepichincha.gob.ec', NULL, NULL, NULL, NULL, NULL, 'URGENTE', '2551-623', '099-600-1470', '127.0.0.1', '127.0.0.1', 102, 'Visita con delegaciÃ³n de Cuba', 'pedido_58eaa98e5f47f'),
(87, 'Patricia ', NULL, '-', NULL, 'Reporte financiero primera Quincena Marzo', NULL, 'EN PROCESO', '2017-04-09 16:41:26', NULL, NULL, NULL, 'contabilidad@conagoparepichincha.gob.ec', NULL, NULL, NULL, NULL, NULL, 'BAJO', '2551-623', '099-600-1470', '127.0.0.1', '127.0.0.1', 102, 'Reporte financiero primera Quincena Marzo', 'pedido_58eaa9f6d5ed5'),
(88, 'Patricia ', NULL, '-', NULL, 'Reporte financiero segunda Quincena Marzo', NULL, 'EN PROCESO', '2017-04-09 16:42:36', NULL, NULL, NULL, 'contabilidad@conagoparepichincha.gob.ec', NULL, NULL, NULL, NULL, NULL, 'MEDIO', '2551-623', '099-600-1470', '127.0.0.1', '127.0.0.1', 102, 'Reporte financiero segunda Quincena Marzo', 'pedido_58eaaa991fbdd'),
(89, 'Patricia ', NULL, '-', NULL, 'Reporte financiero primer Quincena Abril', NULL, 'EN PROCESO', '2017-04-09 16:44:01', NULL, NULL, NULL, 'contabilidad@conagoparepichincha.gob.ec', NULL, NULL, NULL, NULL, NULL, 'MEDIO', '2551-623', '099-600-1470', '127.0.0.1', '127.0.0.1', 102, 'Reporte financiero primer Quincena Abril', 'pedido_58eaaae464e54'),
(90, 'GAD AMAGUAÃ‘A', NULL, '-', NULL, 'SOLICITUD DE APOYO PARA req fiestas patronales', NULL, 'EN PROCESO', '2017-07-07 07:36:55', NULL, NULL, NULL, 'gobamaguana@hotmail.com', NULL, NULL, NULL, NULL, NULL, 'URGENTE', '02-2877-189 / 2877-265', '099-2177-581', '127.0.0.1', '127.0.0.1', 155, 'req fiestas patronales', 'pedido_595f7ea048975'),
(91, 'GAD CALDERON', NULL, '-', NULL, 'Curso de actualizaciÃ³n de normas contables 2017, ', NULL, 'EN PROCESO', '2017-07-08 10:18:24', '2017-09-15 16:47:25', 'Wagner Cadena', NULL, 'asistente.presidencia@gobiernopcalderon.gob.ec', NULL, NULL, NULL, NULL, NULL, 'ALTO', '02-2826-023 / 2821-018 / 2821-414', '099-2876-332 / 098-6627-875', '127.0.0.1', '127.0.0.1', 117, 'Curso de actualizaciÃ³n de normas contables 2017', 'pedido_5960f6ac8d9ae'),
(92, 'GAD CALDERON', NULL, '-', NULL, 'Solicitud de curso de actulizaciÃ³n tributaria, explicaion telefonica de codigos de actualizacion 2 semestr ', NULL, 'EN PROCESO', '2017-07-08 10:44:55', NULL, NULL, NULL, 'asistente.presidencia@gobiernopcalderon.gob.ec', NULL, NULL, NULL, NULL, NULL, 'MEDIO', '(02) -2826-023? ext ', '099-2876-332 / 098-6627-875', '127.0.0.1', '127.0.0.1', 116, 'Solicitud de curso de actulizaciÃ³n tributaria', 'pedido_5960fd3f5b2ff'),
(93, 'GAD PIFO', NULL, '-', NULL, 'REGISTRO OFICIAL NO. 31\r\nViernes, 07 Julio 2017\r\n020 DelÃ©guense atribuciones a el/la Coordinador(a) General de PlanificaciÃ³n Ambiental\r\n', NULL, 'COMPLETADO', '2017-07-08 20:40:07', '2017-07-08 20:46:33', 'Patricia  Tonato', NULL, 'gobiernoparroquialpifo@hotmail.com', NULL, NULL, NULL, NULL, NULL, 'ALTO', '02-2381-449 / 2382-212', '099-9609-212', '127.0.0.1', '127.0.0.1', 103, 'Ayuda de entrega de fondos para capacitaciÃ³n ambiental', 'pedido_59618535960af'),
(94, 'GAD CONOCOTO', NULL, '-', NULL, 'Solicitud de asesoria de estructura de cuentas contables segundo semestre 2017\r\nSe necesita reformar la estructura de cuentas contables para adjuntar gastos de reforma tributaria REGISTRO OFICIAL NO. 31\r\nViernes, 07 Julio 2017\r\n020 DelÃ©guense atribuciones a el/la Coordinador(a) General de PlanificaciÃ³n Ambiental\r\n', NULL, 'EN PROCESO', '2017-07-08 21:11:43', NULL, NULL, NULL, 'juntaconocoto@andinanet.net', NULL, NULL, NULL, NULL, NULL, 'MEDIO', '(02) -2349-582', '099-7877-502', '127.0.0.1', '127.0.0.1', 117, 'Ascesoria de  estructura de cuentas contables segundo semestre 2017', 'pedido_5961900ac7a96'),
(95, 'GAD CONOCOTO', NULL, '-', NULL, 'Solicitud de sscesoria de estructura de cuentas contables segundo semestre 2017\r\nSe necesita reformar la estructura de cuentas contables para adjuntar gastos de reforma tributaria REGISTRO OFICIAL NO. 31\r\nViernes, 07 Julio 2017\r\n020 DelÃ©guense atribuciones a el/la Coordinador(a) General de PlanificaciÃ³n Ambiental\r\n\r\n', NULL, 'EN PROCESO', '2017-07-09 09:05:17', NULL, NULL, NULL, 'juntaconocoto@andinanet.net', NULL, NULL, NULL, NULL, NULL, 'MEDIO', '(02) -2349-582', '099-7877-502', '127.0.0.1', '127.0.0.1', 117, 'Ascesoria de  estructura de cuentas contables segundo semestre 2017', 'pedido_59623750e4193'),
(96, 'GAD CONOCOTO', NULL, '-', NULL, 'Solicitud de sscesoria de estructura de cuentas contables segundo semestre 2017\r\nSe necesita reformar la estructura de cuentas contables para adjuntar gastos de reforma tributaria REGISTRO OFICIAL NO. 31\r\nViernes, 07 Julio 2017\r\n020 DelÃ©guense atribuciones a el/la Coordinador(a) General de PlanificaciÃ³n Ambiental\r\n\r\n', NULL, 'EN PROCESO', '2017-07-09 11:36:17', NULL, NULL, NULL, 'juntaconocoto@andinanet.net', NULL, NULL, NULL, NULL, NULL, 'BAJO', '(02) -2349-582', '099-7877-502', '127.0.0.1', '127.0.0.1', 117, 'Ascesoria de  estructura de cuentas contables segundo semestre 2017', 'pedido_59625aeb9009c'),
(97, 'GAD CONOCOTO', NULL, '-', NULL, 'Solicitud de sscesoria de estructura de cuentas contables segundo semestre 2017\r\nSe necesita reformar la estructura de cuentas contables para adjuntar gastos de reforma tributaria REGISTRO OFICIAL NO. 31\r\nViernes, 07 Julio 2017\r\n020 DelÃ©guense atribuciones a el/la Coordinador(a) General de PlanificaciÃ³n Ambiental\r\n', NULL, 'EN PROCESO', '2017-07-09 18:01:27', NULL, NULL, NULL, 'juntaconocoto@andinanet.net', NULL, NULL, NULL, NULL, NULL, 'ALTO', '02-2349-582', '099-7877-502', '127.0.0.1', '127.0.0.1', 117, 'Ascesoria de  estructura de cuentas contables segundo semestre 2017', 'pedido_5962b544d2d74'),
(98, 'GAD CONOCOTO', NULL, '-', NULL, 'Solicitud de sscesoria de estructura de cuentas contables segundo semestre 2017\r\nSe necesita reformar la estructura de cuentas contables para adjuntar gastos de reforma tributaria REGISTRO OFICIAL NO. 31\r\nViernes, 07 Julio 2017\r\n020 DelÃ©guense atribuciones a el/la Coordinador(a) General de PlanificaciÃ³n Ambiental\r\n', NULL, 'EN PROCESO', '2017-07-10 08:09:55', NULL, NULL, NULL, 'juntaconocoto@andinanet.net', NULL, NULL, NULL, NULL, NULL, 'ALTO', '02-2349-582', '099-7877-502', '127.0.0.1', '127.0.0.1', 117, 'Ascesoria de  estructura de cuentas contables segundo semestre 2017', 'pedido_59637c3f74928'),
(99, 'GAD TABABELA', NULL, '-', NULL, 'REGISTRO OFICIAL NO. 31\r\nViernes, 07 Julio 2017\r\nCSP-2017-03EX-4A ApruÃ©bese la suscripciÃ³n del contrato de inversiÃ³n con la compaÃ±Ã­a Industria Nacional de Ensamblajes S.A. INNACENSA\r\n', NULL, 'EN PROCESO', '2017-07-10 08:19:25', NULL, NULL, NULL, 'juntaptababela@hotmail.com', NULL, NULL, NULL, NULL, NULL, 'URGENTE', '02-2391-969', '098-3509-692', '127.0.0.1', '127.0.0.1', 102, 'CoordinaciÃ³n de cotizacion de lastre via de acceso Ã¡rea de bodegas Tababela', 'pedido_5962bfac0517e'),
(100, 'GAD TABABELA', NULL, '-', NULL, 'REGISTRO OFICIAL NO. 31\r\nViernes, 07 Julio 2017\r\nCSP-2017-03EX-4A ApruÃ©bese la suscripciÃ³n del contrato de inversiÃ³n con la compaÃ±Ã­a Industria Nacional de Ensamblajes S.A. INNACENSA\r\n', NULL, 'EN PROCESO', '2017-07-10 09:04:50', NULL, NULL, NULL, 'juntaptababela@hotmail.com', NULL, NULL, NULL, NULL, NULL, 'ALTO', '(02) -2391-969', '098-3509-692', '127.0.0.1', '127.0.0.1', 121, 'CoordinaciÃ³n de cotizacion de lastre via de acceso Ã¡rea de bodegas Tababela', 'pedido_59637ef0e0352');

--
-- Disparadores `pedidos`
--
DELIMITER $$
CREATE TRIGGER `TR_PEDIDO_INSERT` AFTER INSERT ON `pedidos` FOR EACH ROW INSERT INTO tb_log_pedido (
   ID_PETICION
  ,NOMBRE
  ,ESTADO
  ,FECHA_INSERT
) VALUES (
  NEW.ID_PETICION     ,NEW.NOMBRE    ,NEW.ESTADO    ,NOW()  )
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TR_pedido_update` AFTER UPDATE ON `pedidos` FOR EACH ROW INSERT INTO tb_log_pedido (
   ID_PETICION
  ,NOMBRE
  ,ESTADO
  ,FECHA_INSERT
) VALUES (
  NEW.ID_PETICION     ,NEW.NOMBRE    ,NEW.ESTADO    ,NOW()  )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `soporte_empleados`
--

CREATE TABLE `soporte_empleados` (
  `COD_EMPLEADO_SOPORTE` varchar(10) NOT NULL,
  `ID_DEPARTAMENTO` int(11) DEFAULT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `MAIL` varchar(30) NOT NULL,
  `CONTRASENA` varchar(10) NOT NULL,
  `PENDIENTES` int(11) DEFAULT NULL,
  `ESTADO` varchar(20) DEFAULT NULL,
  `TIPO` varchar(50) DEFAULT NULL,
  `AREA` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `soporte_empleados`
--

INSERT INTO `soporte_empleados` (`COD_EMPLEADO_SOPORTE`, `ID_DEPARTAMENTO`, `NOMBRE`, `MAIL`, `CONTRASENA`, `PENDIENTES`, `ESTADO`, `TIPO`, `AREA`) VALUES
('DCHAVEZ', NULL, 'DENNIS CHAVEZ', 'DENNIS.CHAVEZ@AVIANCATACA.COM', '1234', NULL, 'VIAJE', 'ADMINISTRADOR', 'SOPORTE'),
('DPADILLA', NULL, 'DAVID PADILLA', 'DAVID.PADILLA@AVIANCATACA.COM', '5986', 7, 'ACTIVO', 'ADMINISTRADOR', 'DESARROLLO'),
('EPENAFIEL', NULL, 'EDWIN PENAFIEL', 'EDWIN.PENAFIEL@AVIANCATACA.COM', 'nicolas123', 3, 'ACTIVO', 'USUARIO', 'SOPORTE'),
('WCADENA', NULL, 'WAGNER CADENA', 'WAGNER.CADENA@AVIANCATACA.COM', 'wcadena', 12, 'VIAJE', 'USUARIO', 'DESARROLLO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_adjuntos`
--

CREATE TABLE `tb_adjuntos` (
  `ID_ADJUNTOS` int(11) NOT NULL,
  `ID_PETICION` int(11) DEFAULT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `URL` varchar(200) DEFAULT NULL,
  `TITULO` varchar(100) DEFAULT NULL,
  `FECHA_INSERT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ELIMINADO` int(11) DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_aplicaciones`
--

CREATE TABLE `tb_aplicaciones` (
  `ID_APLICACION` int(11) NOT NULL,
  `APLICACION` varchar(100) DEFAULT NULL,
  `SOPORTE_TI` varchar(100) DEFAULT NULL,
  `SOPORTE_BK` varchar(100) DEFAULT NULL,
  `SOPORTE_EXT` varchar(100) DEFAULT NULL,
  `FABRICANTE` varchar(100) DEFAULT NULL,
  `OBSERVACIONES` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_area`
--

CREATE TABLE `tb_area` (
  `ID_AREA` int(11) NOT NULL,
  `AREA` varchar(50) NOT NULL,
  `OBSERVACIONES` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_area`
--

INSERT INTO `tb_area` (`ID_AREA`, `AREA`, `OBSERVACIONES`) VALUES
(3, 'DESARROLLO', 'NINGUNO'),
(4, 'SOPORTE', 'NINGUNO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_cambios_estados`
--

CREATE TABLE `tb_cambios_estados` (
  `ID_TABLA` int(11) NOT NULL,
  `USUARIO` varchar(30) DEFAULT NULL,
  `FECHA` datetime DEFAULT NULL,
  `OBSERVACIONES` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_criticidades`
--

CREATE TABLE `tb_criticidades` (
  `ID_TABLA` int(11) NOT NULL,
  `COD_CRITICIDAD` varchar(10) DEFAULT NULL,
  `PRIORIDAD` varchar(30) DEFAULT NULL,
  `DESCRIPCION` varchar(1000) DEFAULT NULL,
  `USUARIOS` varchar(1000) DEFAULT NULL,
  `TIEMPO_ATENCION` varchar(100) DEFAULT NULL,
  `OBSERVACIONES` varchar(1000) DEFAULT NULL,
  `TIEMPO_ROJO` time DEFAULT NULL,
  `TIEMPO_AMARILLO` time DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_criticidades`
--

INSERT INTO `tb_criticidades` (`ID_TABLA`, `COD_CRITICIDAD`, `PRIORIDAD`, `DESCRIPCION`, `USUARIOS`, `TIEMPO_ATENCION`, `OBSERVACIONES`, `TIEMPO_ROJO`, `TIEMPO_AMARILLO`) VALUES
(1, 'C_URG', 'URGENTE', 'REQUERIMIENTOS QUE AFECTEN AL PROCESO Y/O DESARROLLO DE ATENCION DE CLIENTES', 'PRESIDENTE, VICEPRESIDENTE', 'ANTES DE 24 HORAS', NULL, '24:00:00', '12:00:00'),
(2, 'C_ALT', 'ALTO', 'REQUERIMIENTO QUE APLACE O DEMORE LA ACTIVIDAD', ' FINANCIERO, JURIDICO', 'ANTES DE 72 HORAS', NULL, '72:00:00', '36:00:00'),
(3, 'C_MEDIO', 'MEDIO', 'REQUERIMIENTOS CON INCONVENIENTES NO GRAVES', 'UNICO USUARIO IMPACTADO, COORDINADORES, SUPERVISORES, JUNTAS PAROQUIALES', 'ANTES DE 8 DIAS', NULL, '192:00:00', '96:00:00'),
(4, 'C_BAJO', 'BAJO', 'REQUERIMIENTOS DE BAJO IMPACTO', 'FALTA PARTIDA PRESUPUESTARIA, NO ESTA INCLUIDO EN EL POA', 'ANTES DE 15 DIAS', NULL, '360:00:00', '180:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_departamento`
--

CREATE TABLE `tb_departamento` (
  `ID_DEPARTAMNETO` int(11) NOT NULL,
  `ID_ESTACION` varchar(3) DEFAULT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL,
  `OBSERVACION` varchar(100) DEFAULT NULL,
  `FECHA_INSERT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `ESTADO` int(11) DEFAULT '1',
  `deleted_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_departamento`
--

INSERT INTO `tb_departamento` (`ID_DEPARTAMNETO`, `ID_ESTACION`, `DESCRIPCION`, `OBSERVACION`, `FECHA_INSERT`, `ESTADO`, `deleted_at`, `updated_at`, `created_at`) VALUES
(1, 'PHC', 'Asesorias', 'Asesorias', '2015-02-26 21:14:21', 1, '2016-01-28 02:42:58', '2016-01-28 02:42:58', '0000-00-00 00:00:00'),
(9, 'PHC', 'Publicidad', 'Publicidad', '2016-01-19 01:07:57', 1, '2016-01-28 02:43:01', '2016-01-28 02:43:01', '0000-00-00 00:00:00'),
(5, 'PHC', 'Eventos culturales', 'Eventos Culturales', '2016-01-18 12:00:00', 1, '2016-01-28 02:43:04', '2016-01-28 02:43:04', '0000-00-00 00:00:00'),
(6, 'PHC', 'Capacitacion', 'Capacitacion', '2016-01-18 12:00:00', 1, '2016-01-28 02:43:07', '2016-01-28 02:43:07', '0000-00-00 00:00:00'),
(7, 'PHC', 'Fortalecimiento Institucional', 'Fortalecimiento Institucional', '2016-01-18 12:00:00', 1, '2016-01-28 02:43:10', '2016-01-28 02:43:10', '0000-00-00 00:00:00'),
(8, 'PHC', 'Invitaciones', 'Invitaciones a acto solmne', '2016-01-19 00:57:13', 1, '2016-01-28 02:43:15', '2016-01-28 02:43:15', '0000-00-00 00:00:00'),
(85, 'PHC', 'Invitaciones  ', 'Invitaciones  ', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(84, 'PHC', 'Fortalecimiento Externa Comunicacion', 'Fortalecimiento Externa Comunicacion', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(83, 'PHC', 'Fortalecimiento Externa Contable', 'Fortalecimiento Externa Contable', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(82, 'PHC', 'Fortalecimiento Externa Financiera', 'Fortalecimiento Externa Financiera', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(81, 'PHC', 'Fortalecimiento Externa Juridica', 'Fortalecimiento Externa Juridica', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(80, 'PHC', 'Fortalecimiento Externa Gestion', 'Fortalecimiento Externa Gestion', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(79, 'PHC', 'Fortalecimiento Interna Comunicacion', 'Fortalecimiento Interna Comunicacion', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(78, 'PHC', 'Fortalecimiento Interna Contable', 'Fortalecimiento Interna Contable', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(77, 'PHC', 'Fortalecimiento Interna Financiera', 'Fortalecimiento Interna Financiera', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(76, 'PHC', 'Fortalecimiento Interna Juridica', 'Fortalecimiento Interna Juridica', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(75, 'PHC', 'Fortalecimiento Interna Gestion', 'Fortalecimiento Interna Gestion', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(74, 'PHC', 'Capacitacion  Externa Comunicacion', 'Capacitacion  Externa Comunicacion', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(73, 'PHC', 'Capacitacion  Externa Contable', 'Capacitacion  Externa Contable', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(72, 'PHC', 'Capacitacion  Externa Financiera', 'Capacitacion  Externa Financiera', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(71, 'PHC', 'Capacitacion  Externa Juridica', 'Capacitacion  Externa Juridica', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(69, 'PHC', 'Capacitacion  Interna Comunicacion', 'Capacitacion  Interna Comunicacion', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(70, 'PHC', 'Capacitacion  Externa Gestion', 'Capacitacion  Externa Gestion', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(67, 'PHC', 'Capacitacion  Interna Financiera', 'Capacitacion  Interna Financiera', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(68, 'PHC', 'Capacitacion  Interna Contable', 'Capacitacion  Interna Contable', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(66, 'PHC', 'Capacitacion  Interna Juridica', 'Capacitacion  Interna Juridica', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(65, 'PHC', 'Capacitacion  Interna Gestion', 'Capacitacion  Interna Gestion', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(86, 'PHC', 'Eventos Culturales Auspicios ', 'Eventos Culturales Auspicios ', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(87, 'PHC', 'Contratos ', 'Contratos ', '2016-01-27 04:35:53', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(88, 'PHF', 'Coordinacion', 'Coordinacion\r\n', '2016-01-30 03:50:26', 1, '2016-03-24 11:42:38', '2016-03-24 11:42:38', '2016-01-30 08:50:26'),
(89, 'iop', 'HYUI', 'UIOKSIS', '2016-02-09 21:49:40', 1, NULL, '2016-02-10 04:49:40', '2016-02-10 04:49:40'),
(90, 't4r', 'uytuyt', 'uytuytuyt', '2016-02-10 00:38:07', 1, '2016-02-10 07:39:13', '2016-02-10 07:39:13', '2016-02-10 07:38:07'),
(91, 'PHO', 'Administrativo', 'Administrativo', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(92, 'PHO', 'Boletines informativos', 'Boletines informativos', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(93, 'PHO', 'Diseño Grafico', 'Diseño Grafico', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(94, 'PHO', 'Eventos', 'Eventos', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(95, 'PHO', 'Oficios', 'Oficios', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(96, 'PHO', 'Pagina web', 'Pagina web', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(97, 'PHO', 'Publicaciones', 'Publicaciones', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(98, 'PHO', 'Redes sociales', 'Redes sociales', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(99, 'PHO', 'Reuniones', 'Reuniones', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(100, 'PHO', 'Consultas telefónicas', 'Consultas telefónicas', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(101, 'PHO', 'Recepción de oficios', 'Recepción de oficios', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(102, 'PHF', 'Administrativo', 'Administrativo', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(103, 'PHF', 'Arqueo de Fondos Rotativos ', 'Arqueo de Fondos Rotativos ', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(104, 'PHF', 'Capacitaciones', 'Capacitaciones', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(105, 'PHF', 'Consulta Financiera por Correo', 'Consulta Financiera por Correo', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(106, 'PHF', 'Control de Activos Fijos', 'Control de Activos Fijos', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(107, 'PHF', 'Control previo al pago', 'Control previo al pago', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(108, 'PHF', 'Convenios', 'Convenios', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(109, 'PHF', 'Documentos habilitantes para pagos', 'Documentos habilitantes para pagos', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(110, 'PHF', 'Obligaciones Patronales (IESS)', 'Obligaciones Patronales (IESS)', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(111, 'PHF', 'Obligaciones Tributarias (SRI)', 'Obligaciones Tributarias (SRI)', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(112, 'PHF', 'Reuniones', 'Reuniones', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(113, 'PHF', 'Seguimiento a GAD-s MEF', 'Seguimiento a GAD-s MEF', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(114, 'PHF', 'Transferencia de pagos', 'Transferencia de pagos', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(115, 'PHF', 'Visita', 'Visita', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(116, 'PHF', 'Asesoramiento contable vía telefónica', 'Asesoramiento contable vía telefónica', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(117, 'PHF', 'Asesoramiento contable Presencial', 'Asesoramiento contable Presencial', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(118, 'PHF', 'Elaboración de Proforma presupuestaria', 'Elaboración de Proforma presupuestaria', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(119, 'PHF', 'Publicaciones ínfima cuantía', 'Publicaciones ínfima cuantía', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(120, 'PHF', 'Planificación', 'Planificación', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(121, 'PHF', 'Coordinación', 'Coordinación', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(122, 'PHF', 'Documentación y archivo', 'Documentación y archivo', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(123, 'PHF', 'Reportes Financieros', 'Reportes Financieros', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(124, 'PHF', 'Comisión Gad', 'Comisión Gad', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(125, 'PHF', 'Adquisición de Vienes y Servicios', 'Adquisición de Vienes y Servicios', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(126, 'PHF', 'Compras por Catalogo Electrónico(SERCOP)', 'Compras por Catalogo Electrónico(SERCOP)', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(127, 'PHF', 'Ingreso de información Financiera', 'Ingreso de información Financiera', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(128, 'PHJ', 'Representación Judicial', 'Representación Judicial', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(129, 'PHJ', 'Asesoramiento Jurídico  vía telefónica', 'Asesoramiento Jurídico  vía telefónica', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(130, 'PHJ', 'Realización de documentación jurídica', 'Realización de documentación jurídica', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(131, 'PHJ', 'Realización de informes', 'Realización de informes', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(132, 'PHJ', 'Administrativo', 'Administrativo', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(133, 'PHJ', 'Audiencia', 'Audiencia', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(134, 'PHJ', 'Consulta', 'Consulta', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(135, 'PHJ', 'Entrevista', 'Entrevista', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(136, 'PHJ', 'Visita', 'Visita', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(137, 'PHJ', 'Documentación y archivo', 'Documentación y archivo', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(138, 'PHJ', 'Comisión Gad', 'Comisión Gad', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(139, 'PHJ', 'Capacitación', 'Capacitación', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(140, 'PHJ', 'Invitación', 'Invitación', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(141, 'PHJ', 'Realización de oficio', 'Realización de oficio', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(142, 'PHJ', 'Rendición de Cuentas', 'Rendición de Cuentas', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(143, 'PHJ', 'Reunión', 'Reunión', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(144, 'PHP', 'Administrativo', 'Administrativo', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(145, 'PHP', 'Capacitaciones', 'Capacitaciones', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(146, 'PHP', 'Reuniones', 'Reuniones', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(147, 'PHS', 'Administrativo', 'Administrativo', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(148, 'PHS', 'Agenda', 'Agenda', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(149, 'PHS', 'Capacitaciones', 'Capacitaciones', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(150, 'PHS', 'Mantenimiento', 'Mantenimiento', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(151, 'PHS', 'Reuniones', 'Reuniones', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(152, 'PHS', 'Planificación', 'Planificación', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(153, 'PHS', 'Consultas telefónicas', 'Consultas telefónicas', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(154, 'PHS', 'Recepción de oficios', 'Recepción de oficios', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(155, 'PHS', 'Coordinación de visita', 'Coordinación de visita', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(156, 'PHS', 'Elaboración de Documentación', 'Elaboración de Documentación', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(157, 'PHS', 'Revisión de Documentación', 'Revisión de Documentación', '2016-02-13 00:08:23', 1, NULL, '0000-00-00 00:00:00', '0000-00-00 00:00:00'),
(161, 'PHF', 'EVENTOS CULTURALES', 'Eventos Culturales', '2016-03-23 14:00:00', 1, NULL, '2016-03-23 14:00:00', '2016-03-23 14:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_directorios`
--

CREATE TABLE `tb_directorios` (
  `id` int(10) UNSIGNED NOT NULL,
  `nombre` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `encargado` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `mail_req` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `extencion` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `celular` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_directorios`
--

INSERT INTO `tb_directorios` (`id`, `nombre`, `encargado`, `mail_req`, `extencion`, `celular`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'GAD ALANGASI', 'LUIS ERNESTO  MORALES ATAHUALPA  ', 'juntalangasi@hotmail.com', '02-2787-647', '098-5488-780', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'GAD AMAGUAÑA', 'LUIS MILTOM PACHACAMA TACO ', 'gobamaguana@hotmail.com ', '02-2877-189 / 2877-265', '099-2177-581', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, 'GAD ATAHUALPA', 'WILLIAM FABIO CASTELO', 'gpatahualpacn@gmail.com', '02-2304-755', '099-3937-500', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(4, 'GAD CALACALI', 'JUAN CARLOS ZAPATA', 'gpcalacali@hotmail.es', '02-2306-378', '098-0410-122', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(5, 'GAD CALDERON', 'MARIA ISABEL BEJARANO YEPEZ', 'asistente.presidencia@gobiernopcalderon.gob.ec , myry2102@gmail.com', '02-2826-023 / 2821-018 / 2821-414', '099-2876-332 / 098-6627-875', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(6, 'GAD CONOCOTO', 'MANUEL DE JESUS  ALBAN PINTO ', 'juntaconocoto@andinanet.net, adrycnc@hotmail.com', '02-2349-582', '099-7877-502', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(7, 'GAD CUMBAYA', 'GUSTAVO  ALFREDO VALDEZ CUÑAS ', 'carly032008@hotmail.com  ', '02-2895-586', '099-9170-230', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(8, 'GAD CHAVEZPAMBA ', 'LIDA PAZ MATILDE BASTIDAS TORRES', 'gadchavezpamba@hotmail.es', '02-2782-138', '099-9458-266', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(9, 'GAD CHECA', 'JULIO SAMUEL LOPEZ ESTEVEZ', ' secretariacheca@gmail.com ', '02-2300-055', '099-7645-017', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(10, 'GAD EL QUINCHE', 'PAUL GONZALO GORDON PALAGUARAY', ' dj-arteaga@hotmail.com , javier230611@hotmail.com', '02-2387-181 / 2388-414', ' 096-8780-793/   099-6351-891 ', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(11, 'GAD GUALEA', 'SEGUNDO CARLOS RAMOS LITA ', 'juntaparroquialgualea@hotmail.es', '02-3629-869', '099-5797-235  /  098-509-1683', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(12, 'GAD GUANGOPOLO ', 'MARCO PLACIDO CUMANICHO GUACHAMIN ', 'jpguangopolo@yahoo.es, elyparedes2012@hotmail.com ', '02-2095-389', '098-5656-183', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(13, 'GAD GUAYLLABAMBA', 'LUIS GUAYTARILLA', ' cristinap@gadguayllabamba.gob.ec', '02-2369-466 /2369-782', '0992-733-637', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(14, 'GAD LA MERCED', 'ROSA CHUQUIMARCA', 'juntaparroquialdelamerced@hotmail.com  ', '02-2386-070 / 2385-529', '093-9028-233', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(15, 'GAD LLANO CHICO ', 'LUIS ALBERTO PULUPA SANCHEZ', 'jpllanochico@hotmail.com', '02-2830-866 / 2830-852 / 2830-866', '098-0325-405/099-6122-060', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(16, 'GAD LLOA', 'ARTURO SOTOMAYOR', 'juntaparroquialloa@yahoo.com ', '02-3816-212 / 3816-095', '098-7367-422', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(17, 'GAD NANEGAL', 'WASHIGTON  OMAR BENALCAZAR PEREZ', 'gparroquialnanegal@yahoo.es', '02-2157-078', '099-3286-614', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(18, 'GAD NANEGALITO', 'PATRICIO GERSAN CALDERON CABRERA', 'juntaparroquialnanegalito@gmail.com', '02-2116-128', '099-7307-692', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(19, 'GAD NAYON ', 'MARIA DE LOURDES QUIJIA SOTALIN ', 'junta_nayon@hotmail.com', '02-2885-034', '099-8331-952', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(20, 'GAD NONO', 'LUIS SANTIAGO ENRIQUEZ MOSQUERA', 'gobiernoparroquialdenono@yahoo.es', '02-2786-145', '099-1503-229', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(21, 'GAD PACTO', 'JAIME  EXEQUIAS VILLARREAL HIGUERA ', 'gobiernoparroquialpacto@hotmail.com, ruth1275@hotmail.com', '02-2176-061 / 2176-125', ' 098-3674-328', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(22, 'GAD PERUCHO', 'GUIDO RODRIGO  ALVARADO CIFUENTES', 'juntaparroquialperucho@hotmail.es', '02-2780-178 / 2780-175', '099-6501-657', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(23, 'GAD PIFO', 'ANGEL VEGA', 'gobiernoparroquialpifo@hotmail.com  fsilvanadavilav@hotmail.com', '02-2381-449 / 2382-212', '099-9609-212', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(24, 'GAD PINTAG', 'JULIO GABRIEL NOROÑA DIAZ', 'junta_parroquial_de_pintag@hotmail.com', '02-2383-716 / 2585-716', '098-2554-366', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(25, 'GAD POMASQUI', 'JAQUELINE CASTRO', 'gad@pomasqui.gob.ec ,  gabykjv@hotmail.com ', '02-2354-664 / 2354-757  ', '099-0344-653', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(26, 'GAD PUELLARO', 'CARLOS ELOY MOSQUERA', 'gad_puellaro@hotmail.com', '02-2775-396 / 2775-042', '099-8946-535', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(27, 'GAD PUEMBO', 'GINA PATRICIA  ROSERO AVILES', 'nancy.torres@puembo.gob.ec ,  informacion@puembo.gob.ec  ', '02-2393-252', '099-7086-349', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(28, 'GAD SAN ANTONIO DE PICHINCHA', 'ALEX IVAN TROYA SANCHO', 'cruales@gadsap.gob.ec, info@gadsap.gob.ec', '02-2394-873', '099-4926-582', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(29, 'GAD SAN JOSE DE MINAS', 'PABLO LEONARDO COBOS IBARRA', 'junta.parroquial.sanjosedeminas@hotmail.com', '02-2302-118 / 2308-642', '099-7867-523 / 099-8032-222', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(30, 'GAD TABABELA', 'HUMBERTO ELOY BAQUERO CARDENAS ', 'juntaptababela@hotmail.com', '02-2391-969', '098-3509-692', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(31, 'GAD TUMBACO', 'MAYRA LORENA BRITO CUZCO', 'rociocanchignia@hotmail.com,   gad.parroquialtumbaco@hotmail.com', '02-2376-083 / 2370-001  2374-401', '098-4652-927', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(32, 'GAD YARUQUI', 'PATRICIA DE JESUS OSORIO FLORES ', 'juntaparroquialyaruqui@andinanet.net', '02-2777-109', '099-9811-345', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(33, 'GAD ZAMBIZA', 'MARIBEL ALVAREZ', 'gadzambiza@hotmail.com', '02-2886-280', '098-7027-718', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(34, 'GAD ALOAG', 'WILSON HUMBERTO RODRIGUEZ VERGARA ', 'jp_aloag@hotmail.com', '02-2389-876', '099-4010-826', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(35, 'GAD ALOASI ', 'MARIA FERNANDA QUINALUIZA CHAMORRO', 'gpaloasi@hotmail.com', '02-2309-837               02-2309-417', '099-5330-741', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(36, 'GAD CUTUGLAGUA ', ' ROBERTO  CARLOS HIDALGO PINTO ', 'jpcutuglagua@hotmail.com , nancynaranjovalle@yahoo.com', '02-3006-462', '098-4257-605', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(37, 'GAD EL CHAUPI', ' FROILAN  GEOVANNY SALAZAR SALAZAR', 'elchaupi.gad@gmail.com  , goya_gloria@yahoo.es', '02-3674-222', '098-0905-494', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(38, 'GAD MANUEL CORNEJO ASTORGA   TANDAPI  ', ' EGAR PATRICIO  RUIZ ROSERO ', 'juntaparroquialmca@hotmail.es ,  cilebr@yahoo.com', '02-2177-142     ', '099-2015-248', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(39, 'GAD TAMBILLO', 'RUTH MARLENE CORDOVA AGUILAR ', 'gobiernoparroquialtambillo@hotmail.com ', '02-2318-096', '098-7702-482', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(40, 'GAD UYUMBICHO ', 'DAVID ALBERTO  LOPEZ ROBLES ', 'juntauyumbicho@yahoo.es', '02-2855-043', '099-5378-108', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(41, 'GAD COTOGCHOA', 'JOSE ANIBAL LOACHAMIN GUALOTUÑA ', 'jpcotogchoa@hotmail.com', '02-2085-479', '099-5036-954', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(42, 'GAD RUMIPAMBA', 'VICTOR HUGO ALCOCER CHANGO ', 'jprumipamba@hotmail.com', '02-3614-665', '098-7031-601', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(43, 'GAD LA ESPERANZA', 'NELSON IBAN TOAPANTA CORO ', 'juntaparroquiallaesperanza@hotmail.com', '02-2366-666', '099-9604-595', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(44, 'GAD MALCHINGUI', ' JOSE LUIS RODRIGUEZ REINOSO ', 'gpmalchingui@gmail.com', '02-2158-330', '097-9710-295', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(45, 'GAD TOCACHI', 'PEDRO BOLIVAR BOADA VIZCAINO ', 'gadtocachi@hotmail.com', '02-3610-896', '098-3020-017', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(46, 'GAD TUPIGACHI', ' OSCAR FERNANDO VINUESA VINUEZA ', 'gobiernoparroquialruraltupigachi@hotmail.com', '02-2119-104', '099-0569-979', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(47, 'GAD ASCAZUBI', 'LUIS ELADIO CEVALLOS PASQUEL ', 'jpascazubi2009@hotmail.com', '02-2784-124', '099-4134-453', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(48, 'GAD AYORA', 'IVAN  RUFO ALBUJA SILVA', 'gadpsanjosedeayora@hotmail.com', '02-2138-732 / 2138-535', '095-9415-443', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(49, 'GAD CANGAHUA', 'JOSE BAYARDO LANCHIMBA FARINANGO ', 'j-p-cangahua@hotmail.com', '02-3610-064', '098-6366-337', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(50, 'GAD CUZUBAMBA', ' PABLO PEREZ SANCHEZ', 'gadprsrcuzubamba@hotmail.com ,', '02-2164-418', '099-5822-046', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(51, 'GAD OLMEDO', 'LUIS VINICIO QUILO COLCHA', 'jpolmedo2010@hotmail.com', '02-2115-278', '096-7453-329', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(52, 'GAD OTON', 'LUIS RENE PINANJOTA GUAÑA', 'oton.j.p.cayambe@hotmail.com', '02-3610-605', '099-9930-081', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(53, 'GAD MINDO', 'LILIAN DEL ROCIO SALAZAR TAPIA', 'gadparroquialruralmindo@gmail.com, caporellana@hotmail.ec', '02-2170-289', '098-6442-492', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(54, 'Wagner cadena', '', 'wcadena@outlook.com', '0992946682', '0992946682', '2016-01-27 06:27:20', '2016-01-27 06:27:20', NULL),
(55, 'marlon brando', '', 'marlon@ajolj.com', '02-2877-189 / 2877-265', '099-2177-581', '2016-02-10 07:41:55', '2016-02-10 07:42:05', '2016-02-10 07:42:05');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_documents`
--

CREATE TABLE `tb_documents` (
  `id` int(10) UNSIGNED NOT NULL,
  `identificador_letras` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `identificador_numero` int(11) NOT NULL,
  `identificador` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tipo_documento` enum('oficio','memo') COLLATE utf8_unicode_ci NOT NULL,
  `observaciones_doc` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `requerimiento` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `solicitante` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `formato_numero` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Volcado de datos para la tabla `tb_documents`
--

INSERT INTO `tb_documents` (`id`, `identificador_letras`, `identificador_numero`, `identificador`, `tipo_documento`, `observaciones_doc`, `requerimiento`, `solicitante`, `formato_numero`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'mem', 1, 'MEM-0000001', 'memo', '', '', 'WCADENA@OUtlook.com', '#######', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(2, 'off', 1, 'OFF-0000001', 'oficio', '', '', 'WCADENA@OUtlook.com', '#######', '0000-00-00 00:00:00', '0000-00-00 00:00:00', NULL),
(3, '', 3, 'Off-000003', 'oficio', 'asdasdad', '', '', '', '2015-12-20 16:03:58', '2015-12-20 16:03:58', NULL),
(6, '', 6, 'MEM000006', 'oficio', 'oficio', '', '', '', '2015-12-26 07:38:24', '2015-12-26 07:38:24', NULL),
(7, '', 2, 'MEM000002', 'memo', 'hola memo 1', '', '', '', '2015-12-26 10:43:32', '2015-12-26 10:43:32', NULL),
(8, '', 7, 'OFF000007', 'oficio', '', '', '', '', '2015-12-26 11:40:37', '2015-12-26 11:40:37', NULL),
(9, '', 8, 'OFF000008', 'oficio', '', '', '', '', '2015-12-26 11:40:59', '2015-12-26 11:40:59', NULL),
(10, '', 9, 'OFF000009', 'oficio', '', '', '', '', '2015-12-26 14:08:13', '2015-12-26 14:08:13', NULL),
(11, '', 10, 'OFF000010', 'oficio', '', '', '', '', '2015-12-26 14:10:51', '2015-12-26 14:10:51', NULL),
(12, '', 11, 'OFF000011', 'oficio', '', '', '', '', '2015-12-26 14:14:25', '2015-12-26 14:14:25', NULL),
(13, 'OFI', 12, 'OFF000012', 'oficio', '', '', '', '', '2015-12-26 14:18:30', '2015-12-26 14:18:30', NULL),
(14, 'OFI', 13, 'OFF000013', 'oficio', '', '', '', '', '2015-12-26 14:19:51', '2015-12-26 14:19:51', NULL),
(15, 'OFI', 14, 'OFF000014', 'oficio', '', '', '', '', '2015-12-26 14:20:37', '2015-12-26 14:20:37', NULL),
(16, 'OFI', 15, 'OFF000015', 'oficio', '', '', 'wcadena', '', '2015-12-26 14:21:15', '2015-12-26 14:21:15', NULL),
(17, 'MEM', 3, 'MEM000003', 'memo', '', '', 'wcadena', '', '2015-12-26 14:21:52', '2015-12-26 14:21:52', NULL),
(18, 'MEM', 4, 'MEM000004', 'memo', '', '', 'wcadena', '', '2015-12-26 17:43:47', '2015-12-26 17:43:47', NULL),
(21, 'OFI', 16, 'OFF000016', 'oficio', '', '', 'wcadena', '', '2015-12-27 01:48:46', '2015-12-27 01:48:46', NULL),
(23, 'OFI', 17, 'OFF000017', 'oficio', '', '', 'wcadena', '', '2015-12-27 01:54:48', '2015-12-27 01:54:48', NULL),
(24, 'MEM', 5, 'MEM000005', 'memo', '', '', 'wcadena', '', '2015-12-28 04:46:43', '2015-12-28 04:46:43', NULL),
(25, 'OFI', 18, 'OFF000018', 'oficio', 'OFF000018 987987987987', '', 'wcadena', '', '2016-02-10 07:39:59', '2016-02-10 07:39:59', NULL),
(26, 'MEM', 6, 'MEM000006', 'memo', 'MEM000006  eedr222222', '', 'wcadena', '', '2016-02-10 07:40:29', '2016-02-10 07:40:29', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estaciones`
--

CREATE TABLE `tb_estaciones` (
  `ID_ESTACION` varchar(3) NOT NULL,
  `ESTACION` varchar(30) NOT NULL,
  `OBSERVACIONES` varchar(100) NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_estaciones`
--

INSERT INTO `tb_estaciones` (`ID_ESTACION`, `ESTACION`, `OBSERVACIONES`, `deleted_at`, `created_at`, `updated_at`) VALUES
('PHC', 'General CP', 'General CP', NULL, '2016-01-20 12:00:00', '2016-01-20 12:00:00'),
('PHF', 'Financiero CP', 'Financiero CP', NULL, '2016-01-30 08:48:33', '2016-01-30 08:48:33'),
('PHO', 'Comunicacion CP', 'Comunicacion CP', NULL, '2016-02-12 14:00:00', '2016-02-12 14:00:00'),
('PRU', 'prueBa', 'Estacion de prueba', '2016-03-24 11:42:23', '2016-03-03 13:47:53', '2016-03-24 11:42:23'),
('PHJ', 'Juridico CP', 'Juridico CP', NULL, '2016-02-12 14:00:00', '2016-02-12 14:00:00'),
('PHP', 'Presidencia CP', 'Presidencia CP', NULL, '2016-02-12 14:00:00', '2016-02-12 14:00:00'),
('PHS', 'Secretaria CP', 'Secretaria CP', NULL, '2016-02-12 14:00:00', '2016-02-12 14:00:00');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_estados`
--

CREATE TABLE `tb_estados` (
  `ID_TABLA` int(11) NOT NULL,
  `ESTADO` varchar(20) DEFAULT NULL,
  `OBSERVACIONES` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_estados`
--

INSERT INTO `tb_estados` (`ID_TABLA`, `ESTADO`, `OBSERVACIONES`) VALUES
(1, 'BLOQUEADO', NULL),
(2, 'CAMBIO DE CLAVE', NULL),
(3, 'ELIMINADO', NULL),
(4, 'IT NO MANEJA APP', NULL),
(5, 'N/A', 'N/A');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_eventos_relevantes`
--

CREATE TABLE `tb_eventos_relevantes` (
  `ID_TABLA` int(11) NOT NULL,
  `EVENTO` varchar(500) DEFAULT NULL,
  `AREA` varchar(50) DEFAULT NULL,
  `ESTACION` varchar(30) DEFAULT NULL,
  `FECHA` datetime DEFAULT NULL,
  `OBSERVACIONES` varchar(500) DEFAULT NULL,
  `USUARIO` varchar(30) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_fabricante`
--

CREATE TABLE `tb_fabricante` (
  `ID_SOPORTE_FAB` int(11) NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `E_MAIL` varchar(100) DEFAULT NULL,
  `TELEFONO` varchar(20) DEFAULT NULL,
  `CONTACTO` varchar(100) DEFAULT NULL,
  `OBSERVACIONES` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_firmas`
--

CREATE TABLE `tb_firmas` (
  `ID_TABLA` int(11) NOT NULL,
  `EMPLEADO` varchar(100) DEFAULT NULL,
  `APLICACION` varchar(100) DEFAULT NULL,
  `ESTADO` varchar(100) DEFAULT NULL,
  `CORREO` varchar(100) DEFAULT NULL,
  `AREA` varchar(500) DEFAULT NULL,
  `TELEFONO` varchar(200) DEFAULT NULL,
  `FECHA` datetime NOT NULL,
  `OBSERVACIONES` varchar(100) DEFAULT NULL,
  `ESTACION` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_formatos`
--

CREATE TABLE `tb_formatos` (
  `ID_TABLA` int(11) NOT NULL,
  `SOLICITUD` varchar(50) NOT NULL,
  `PATH` varchar(50) NOT NULL,
  `SOLICITANTE` varchar(100) NOT NULL,
  `OBSERVACIONES` varchar(100) DEFAULT NULL,
  `FECHA` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_incidentes`
--

CREATE TABLE `tb_incidentes` (
  `ID_TABLA` int(11) NOT NULL,
  `INCIDENTE` varchar(500) DEFAULT NULL,
  `APLICACION_SERVICIO_SERVIDOR` varchar(100) DEFAULT NULL,
  `FECHA` datetime DEFAULT NULL,
  `USUARIO` varchar(30) DEFAULT NULL,
  `OBSERVACIONES` varchar(500) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_inf_empleados`
--

CREATE TABLE `tb_inf_empleados` (
  `ID_TABLA` int(11) NOT NULL,
  `CEDULA` varchar(15) DEFAULT NULL,
  `CORREO` varchar(250) DEFAULT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `APELLIDO` varchar(100) DEFAULT NULL,
  `ESTACION` varchar(30) DEFAULT NULL,
  `CIUDAD` varchar(30) DEFAULT NULL,
  `CARGO` varchar(100) DEFAULT NULL,
  `DEPARTAMENTO` varchar(100) DEFAULT NULL,
  `EXT` varchar(10) DEFAULT NULL,
  `IP` varchar(20) DEFAULT NULL,
  `NOMBRE_COMPLETO` varchar(200) DEFAULT NULL,
  `ESTADO_CIVIL` varchar(10) DEFAULT NULL,
  `FECHA_NACIMIENTO` datetime DEFAULT NULL,
  `CODIGO` varchar(10) DEFAULT NULL,
  `ESTADO` varchar(15) DEFAULT NULL,
  `CORREO_AVIANCATACA` varchar(100) DEFAULT NULL,
  `OBSERVACIONES` varchar(100) DEFAULT NULL,
  `ACTUALIZADO` varchar(5) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_inf_pc`
--

CREATE TABLE `tb_inf_pc` (
  `ID_TABLA` int(11) NOT NULL,
  `USUARIO` varchar(150) DEFAULT NULL,
  `NOMBRE` varchar(150) DEFAULT NULL,
  `APELLIDO` varchar(150) DEFAULT NULL,
  `LOCALIZACION` varchar(20) DEFAULT NULL,
  `DEPARTAMENTO` varchar(150) DEFAULT NULL,
  `MAQUINA` varchar(250) DEFAULT NULL,
  `IMPRESORA` varchar(250) DEFAULT NULL,
  `SO` varchar(50) DEFAULT NULL,
  `HOST` varchar(100) DEFAULT NULL,
  `IP` varchar(20) DEFAULT NULL,
  `EXT` varchar(20) DEFAULT NULL,
  `IP_EXT` varchar(20) DEFAULT NULL,
  `EMAIL` varchar(100) DEFAULT NULL,
  `USUARIO_DOMINIO` varchar(100) DEFAULT NULL,
  `ESTADO` varchar(5) DEFAULT NULL,
  `ACTUALIZADO` varchar(5) DEFAULT NULL,
  `OBSERVACIONES` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_iniciativas`
--

CREATE TABLE `tb_iniciativas` (
  `ID_TABLA` int(11) NOT NULL,
  `INICIATIVA` varchar(500) DEFAULT NULL,
  `SOLUCION_RECOMENDADA` varchar(500) DEFAULT NULL,
  `OBSERVACIONES` varchar(500) DEFAULT NULL,
  `USUARIO` varchar(30) DEFAULT NULL,
  `FECHA` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_lista_solicitudes`
--

CREATE TABLE `tb_lista_solicitudes` (
  `ID_TABLA` int(11) NOT NULL,
  `SOLICITUD` varchar(50) DEFAULT NULL,
  `PATH` varchar(50) DEFAULT NULL,
  `OBSERVACIONES` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_log_pedido`
--

CREATE TABLE `tb_log_pedido` (
  `ID_LOG_PEDIDO` int(11) NOT NULL,
  `ID_PETICION` int(11) DEFAULT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `ESTADO` varchar(50) DEFAULT NULL,
  `FECHA_INSERT` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_log_pedido`
--

INSERT INTO `tb_log_pedido` (`ID_LOG_PEDIDO`, `ID_PETICION`, `NOMBRE`, `ESTADO`, `FECHA_INSERT`) VALUES
(1, 0, 'wagner cadena', 'EN PROCESO', '2016-01-18 09:40:21'),
(2, 18, 'wagner cadena', 'EN PROCESO', '2016-01-18 09:40:21'),
(3, 2, NULL, 'COMPLETADO', '2016-01-18 09:44:51'),
(4, 0, 'gad amaguaÃ±a', 'EN PROCESO', '2016-01-19 01:35:41'),
(5, 0, 'ALANGASI', 'EN PROCESO', '2016-01-24 23:05:04'),
(6, 0, 'ALANGASI', 'EN PROCESO', '2016-01-24 23:05:30'),
(7, 0, 'ALANGASI', 'EN PROCESO', '2016-01-24 23:06:41'),
(8, 0, 'ALANGASI', 'EN PROCESO', '2016-01-24 23:08:51'),
(9, 0, 'ALANGASI', 'EN PROCESO', '2016-01-24 23:09:19'),
(10, 0, 'ALANGASI', 'EN PROCESO', '2016-01-24 23:09:32'),
(11, 0, 'ALANGASI', 'EN PROCESO', '2016-01-24 23:10:04'),
(12, 0, 'AMAGUAÃ‘A', 'EN PROCESO', '2016-01-24 23:12:19'),
(13, 0, 'AMAGUAÃ‘A', 'EN PROCESO', '2016-01-24 23:15:51'),
(14, 0, 'AMAGUAÃ‘A', 'EN PROCESO', '2016-01-24 23:19:16'),
(15, 0, 'AMAGUAÃ‘A', 'EN PROCESO', '2016-01-24 23:22:19'),
(16, 0, 'ALANGASI', 'EN PROCESO', '2016-01-24 23:23:19'),
(17, 0, 'AMAGUAÃ‘A', 'EN PROCESO', '2016-01-24 23:36:21'),
(18, 0, 'ALANGASI', 'EN PROCESO', '2016-01-25 07:21:38'),
(19, 0, 'ALANGASI', 'EN PROCESO', '2016-01-25 07:24:24'),
(20, 0, 'AMAGUAÃ‘A', 'EN PROCESO', '2016-01-25 07:30:58'),
(21, 0, 'ATAHUALPA', 'EN PROCESO', '2016-01-25 07:33:23'),
(22, 0, 'ATAHUALPA', 'EN PROCESO', '2016-01-25 07:38:00'),
(23, 0, 'ALOAG', 'EN PROCESO', '2016-01-25 08:41:16'),
(24, 0, 'ALANGASI', 'EN PROCESO', '2016-01-25 09:37:08'),
(25, 0, 'ALOASI ', 'EN PROCESO', '2016-01-25 09:39:00'),
(26, 0, 'ALOAG', 'EN PROCESO', '2016-01-25 09:42:26'),
(27, 0, 'chav', 'EN PROCESO', '2016-01-26 21:59:39'),
(28, 0, 'GAD PIFO', 'EN PROCESO', '2016-01-27 23:40:38'),
(29, 0, 'Renne', 'EN PROCESO', '2016-01-30 03:44:04'),
(30, 0, 'Luci Toapanta', 'EN PROCESO', '2016-01-30 03:52:33'),
(31, 0, 'Wagner cadena', 'EN PROCESO', '2016-02-09 10:18:07'),
(32, 0, 'rapid', 'EN PROCESO', '2016-02-09 10:25:59'),
(33, 0, 'GAD ALANGASI', 'EN PROCESO', '2016-02-19 21:47:11'),
(34, 0, 'GAD EL QUINCHE', 'EN PROCESO', '2016-02-19 22:14:55'),
(35, 0, 'GAD EL QUINCHE', 'EN PROCESO', '2016-02-19 22:33:40'),
(36, 0, 'GAD CHAVEZPAMBA ', 'EN PROCESO', '2016-02-19 22:34:12'),
(37, 0, 'GAD ALANGASI', 'EN PROCESO', '2016-02-19 22:42:30'),
(38, 0, 'GAD ALANGASI', 'EN PROCESO', '2016-02-19 22:42:42'),
(39, 0, 'GAD ALANGASI', 'EN PROCESO', '2016-02-19 22:44:37'),
(40, 0, 'GAD ATAHUALPA', 'EN PROCESO', '2016-02-19 22:52:06'),
(41, 0, 'GAD CONOCOTO', 'EN PROCESO', '2016-02-19 23:07:14'),
(42, 0, 'GAD CONOCOTO', 'EN PROCESO', '2016-02-19 23:07:26'),
(43, 0, 'GAD EL QUINCHE', 'EN PROCESO', '2016-02-20 00:39:23'),
(44, 0, 'GAD CHECA', 'EN PROCESO', '2016-02-20 00:43:16'),
(45, 0, 'GAD CUMBAYA', 'EN PROCESO', '2016-02-20 12:16:38'),
(46, 0, 'GAD EL QUINCHE', 'EN PROCESO', '2016-02-24 02:58:02'),
(47, 0, 'GAD CONOCOTO', 'EN PROCESO', '2016-03-03 06:33:03'),
(48, 0, 'GAD CONOCOTO', 'EN PROCESO', '2016-03-03 06:45:11'),
(49, 0, 'GAD PIFO', 'EN PROCESO', '2016-03-08 22:35:17'),
(50, 0, 'GAD AMAGUAÃ‘A', 'EN PROCESO', '2016-03-22 04:31:09'),
(51, 0, 'Wagner cadena', 'EN PROCESO', '2016-03-22 21:17:05'),
(52, 0, 'Wagner cadena', 'EN PROCESO', '2016-03-22 21:35:07'),
(53, 0, 'GAD CALACALI', 'EN PROCESO', '2016-03-22 22:12:28'),
(54, 0, 'GAD ALOASI ', 'EN PROCESO', '2016-03-24 04:46:08'),
(55, 0, 'GAD GUANGOPOLO ', 'EN PROCESO', '2016-03-24 05:32:38'),
(56, 0, 'GAD ALOASI ', 'EN PROCESO', '2016-04-21 03:47:21'),
(57, 0, 'GAD PIFO', 'EN PROCESO', '2016-05-12 00:21:27'),
(58, 0, 'Wagner cadena', 'EN PROCESO', '2017-03-28 21:48:57'),
(59, 0, 'GAD ATAHUALPA', 'EN PROCESO', '2017-03-28 21:55:23'),
(60, 0, 'GAD MANUEL CORNEJO ASTORGA   TANDAPI  ', 'EN PROCESO', '2017-03-29 13:15:10'),
(61, 0, 'GAD SAN JOSE DE MINAS', 'EN PROCESO', '2017-03-29 13:20:28'),
(62, 0, 'GAD ATAHUALPA', 'EN PROCESO', '2017-03-29 15:46:50'),
(63, 0, 'GAD CALDERON', 'EN PROCESO', '2017-03-29 15:50:48'),
(64, 0, 'GAD PACTO', 'EN PROCESO', '2017-03-31 04:03:26'),
(65, 0, 'GAD LA MERCED', 'EN PROCESO', '2017-04-01 03:53:29'),
(66, 0, 'GAD PINTAG', 'EN PROCESO', '2017-04-09 02:49:31'),
(67, 0, 'GAD LLANO CHICO ', 'EN PROCESO', '2017-04-09 03:05:10'),
(68, 0, 'GAD CHAVEZPAMBA ', 'EN PROCESO', '2017-04-09 19:29:06'),
(69, 84, 'Patricia ', 'EN PROCESO', '2017-04-09 20:06:33'),
(70, 70, 'GAD GUANGOPOLO ', 'STAND BY', '2017-04-09 20:12:29'),
(71, 70, 'GAD GUANGOPOLO ', 'COMPLETADO', '2017-04-09 20:15:31'),
(72, 85, 'Patricia ', 'EN PROCESO', '2017-04-09 21:36:58'),
(73, 86, 'Patricia ', 'EN PROCESO', '2017-04-09 21:38:42'),
(74, 87, 'Patricia ', 'EN PROCESO', '2017-04-09 21:41:26'),
(75, 88, 'Patricia ', 'EN PROCESO', '2017-04-09 21:42:36'),
(76, 89, 'Patricia ', 'EN PROCESO', '2017-04-09 21:44:01'),
(77, 90, 'GAD AMAGUAÃ‘A', 'EN PROCESO', '2017-07-07 12:36:55'),
(78, 91, 'GAD CALDERON', 'EN PROCESO', '2017-07-08 15:18:24'),
(79, 92, 'GAD CALDERON', 'EN PROCESO', '2017-07-08 15:44:55'),
(80, 93, 'GAD PIFO', 'EN PROCESO', '2017-07-09 01:40:07'),
(81, 93, 'GAD PIFO', 'EN PROCESO', '2017-07-09 01:41:29'),
(82, 93, 'GAD PIFO', 'EN PROCESO', '2017-07-09 01:42:13'),
(83, 93, 'GAD PIFO', 'EN PROCESO', '2017-07-09 01:42:56'),
(84, 93, 'GAD PIFO', 'COMPLETADO', '2017-07-09 01:46:33'),
(85, 94, 'GAD CONOCOTO', 'EN PROCESO', '2017-07-09 02:11:43'),
(86, 95, 'GAD CONOCOTO', 'EN PROCESO', '2017-07-09 14:05:17'),
(87, 96, 'GAD CONOCOTO', 'EN PROCESO', '2017-07-09 16:36:17'),
(88, 97, 'GAD CONOCOTO', 'EN PROCESO', '2017-07-09 23:01:27'),
(89, 91, 'GAD CALDERON', 'STAND BY', '2017-07-09 23:46:55'),
(90, 98, 'GAD CONOCOTO', 'EN PROCESO', '2017-07-10 13:09:55'),
(91, 99, 'GAD TABABELA', 'EN PROCESO', '2017-07-10 13:19:25'),
(92, 100, 'GAD TABABELA', 'EN PROCESO', '2017-07-10 14:04:50'),
(93, 91, 'GAD CALDERON', 'EN PROCESO', '2017-09-15 21:47:25');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_log_pedido_usuarios`
--

CREATE TABLE `tb_log_pedido_usuarios` (
  `ID_LOG_PEDIDO_USUARIOS` int(11) NOT NULL,
  `ID_PEDIDO_USUARIOS` int(11) DEFAULT NULL,
  `ID_PETICION` int(11) DEFAULT NULL,
  `ID_USUARIOS` int(11) DEFAULT NULL,
  `TIPO` varchar(5) DEFAULT NULL,
  `ESTADO` varchar(5) DEFAULT NULL,
  `FECHA_INSERT` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `FECHA_UPDATE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `FECHA_INI` datetime DEFAULT NULL,
  `FECHA_FIN` datetime DEFAULT NULL,
  `TOTAL` varchar(10) DEFAULT NULL,
  `DESCRIPCION` varchar(1000) DEFAULT NULL,
  `ACCION` varchar(6) DEFAULT NULL,
  `FECHA_INSERT_LOG` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `SEGUIMIENTO` int(3) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_log_pedido_usuarios`
--

INSERT INTO `tb_log_pedido_usuarios` (`ID_LOG_PEDIDO_USUARIOS`, `ID_PEDIDO_USUARIOS`, `ID_PETICION`, `ID_USUARIOS`, `TIPO`, `ESTADO`, `FECHA_INSERT`, `FECHA_UPDATE`, `FECHA_INI`, `FECHA_FIN`, `TOTAL`, `DESCRIPCION`, `ACCION`, `FECHA_INSERT_LOG`, `SEGUIMIENTO`) VALUES
(1, 0, 2, 1, 'TECNI', 'PROCE', '2015-04-11 11:30:12', '2015-04-11 11:30:12', NULL, NULL, NULL, NULL, 'INSERT', '2015-04-11 11:30:12', NULL),
(2, 0, 4, 1, 'TECNI', 'ACTIV', '2015-04-11 11:31:42', '2015-04-11 11:31:42', '2015-04-11 05:30:00', '2015-04-12 05:30:00', '24:00', 'TEST', 'INSERT', '2015-04-11 11:31:42', NULL),
(3, 54, 4, 1, 'TECNI', 'ACTIV', '2015-03-25 21:55:13', '2015-03-25 21:55:13', NULL, NULL, NULL, NULL, 'DELETE', '2015-04-11 11:32:01', NULL),
(4, 44, 1, 1, 'TECNI', 'ACTIV', '2015-03-14 10:53:15', '2015-03-14 10:53:15', '2015-03-14 03:45:00', '2015-03-14 03:45:00', NULL, '555', 'UPDATE', '2015-04-11 11:32:33', NULL),
(5, 47, 1, 1, 'TECNI', 'ACTIV', '2015-03-14 10:53:54', '2015-03-14 10:53:54', '2015-03-14 03:45:00', '2015-03-14 03:45:00', NULL, 'qwerty5', 'UPDATE', '2015-04-11 11:34:29', NULL),
(6, 0, 4, 2, 'TECNI', 'ACTIV', '2015-04-11 12:22:21', '2015-04-11 12:22:21', '2015-04-11 06:15:00', '2015-04-12 01:45:00', '19:30', NULL, 'INSERT', '2015-04-11 12:22:21', NULL),
(7, 0, 4, 1, 'CERRA', 'ACTIV', '2015-12-26 12:54:21', '2015-12-26 12:54:21', NULL, NULL, NULL, NULL, 'INSERT', '2015-12-26 12:54:21', NULL),
(8, 0, 1, 1, 'CERRA', 'ACTIV', '2015-12-26 12:55:21', '2015-12-26 12:55:21', NULL, NULL, NULL, NULL, 'INSERT', '2015-12-26 12:55:21', NULL),
(9, 0, 18, 1, 'SOLIC', 'ACTIV', '2016-01-18 09:40:21', '2016-01-18 09:40:21', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-18 09:40:21', NULL),
(10, 0, 18, 1, 'TECNI', 'ACTIV', '2016-01-18 09:40:21', '2016-01-18 09:40:21', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-18 09:40:21', NULL),
(11, 0, 18, 2, 'TECNI', 'ACTIV', '2016-01-18 09:41:38', '2016-01-18 09:41:38', '2016-01-18 02:30:00', '2016-01-18 02:30:00', NULL, NULL, 'INSERT', '2016-01-18 09:41:38', NULL),
(12, 95, 18, 1, 'TECNI', 'ACTIV', '2016-01-18 09:40:21', '2016-01-18 09:40:21', NULL, NULL, NULL, NULL, 'DELETE', '2016-01-18 09:41:43', NULL),
(13, 0, 4, 1, 'TECNI', 'PROCE', '2016-01-18 09:42:48', '2016-01-18 09:42:48', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-18 09:42:48', NULL),
(14, 0, 16, 1, 'TECNI', 'PROCE', '2016-01-18 09:43:08', '2016-01-18 09:43:08', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-18 09:43:08', NULL),
(15, 0, 15, 1, 'TECNI', 'PROCE', '2016-01-18 09:43:12', '2016-01-18 09:43:12', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-18 09:43:12', NULL),
(16, 0, 14, 1, 'TECNI', 'PROCE', '2016-01-18 09:43:16', '2016-01-18 09:43:16', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-18 09:43:16', NULL),
(17, 0, 9, 1, 'TECNI', 'PROCE', '2016-01-18 09:43:23', '2016-01-18 09:43:23', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-18 09:43:23', NULL),
(18, 0, 8, 1, 'TECNI', 'PROCE', '2016-01-18 09:43:27', '2016-01-18 09:43:27', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-18 09:43:27', NULL),
(19, 0, 10, 1, 'TECNI', 'PROCE', '2016-01-18 09:43:35', '2016-01-18 09:43:35', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-18 09:43:35', NULL),
(20, 0, 2, 1, 'CERRA', 'ACTIV', '2016-01-18 09:44:51', '2016-01-18 09:44:51', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-18 09:44:51', NULL),
(21, 0, 4, 1, 'CERRA', 'ACTIV', '2016-01-18 09:49:29', '2016-01-18 09:49:29', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-18 09:49:29', NULL),
(22, 0, 8, 1, 'CERRA', 'ACTIV', '2016-01-18 09:50:26', '2016-01-18 09:50:26', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-18 09:50:26', NULL),
(23, 0, 19, 1, 'SOLIC', 'ACTIV', '2016-01-19 01:35:41', '2016-01-19 01:35:41', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-19 01:35:41', NULL),
(24, 0, 19, NULL, 'TECNI', 'ACTIV', '2016-01-19 01:35:41', '2016-01-19 01:35:41', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-19 01:35:41', NULL),
(25, 0, 19, 1, 'TECNI', 'ACTIV', '2016-01-19 04:18:10', '2016-01-19 04:18:10', '2016-01-18 18:00:00', '2016-01-20 16:30:00', '46:30', 'generr contrato', 'INSERT', '2016-01-19 04:18:10', NULL),
(26, 0, 19, 2, 'TECNI', 'ACTIV', '2016-01-19 04:19:21', '2016-01-19 04:19:21', '2016-01-18 21:15:00', '2016-01-19 21:15:00', '24:00', 'prueba', 'INSERT', '2016-01-19 04:19:21', NULL),
(27, 110, 19, 2, 'TECNI', 'ACTIV', '2016-01-19 04:19:21', '2016-01-19 04:19:21', '2016-01-18 21:15:00', '2016-01-19 21:15:00', '24:00', 'prueba', 'DELETE', '2016-01-19 04:19:37', NULL),
(28, 0, 19, 1, 'CERRA', 'ACTIV', '2016-01-22 23:09:30', '2016-01-22 23:09:30', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-22 23:09:30', NULL),
(29, 0, 19, 1, 'TECNI', 'ACTIV', '2016-01-24 04:23:25', '2016-01-24 04:23:25', '2016-01-23 21:15:00', '2016-01-24 18:15:00', '21:00', 'test', 'INSERT', '2016-01-24 04:23:25', NULL),
(30, 0, 20, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:05:04', '2016-01-24 23:05:04', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:05:04', NULL),
(31, 0, 20, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:05:04', '2016-01-24 23:05:04', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:05:04', NULL),
(32, 0, 21, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:05:30', '2016-01-24 23:05:30', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:05:30', NULL),
(33, 0, 21, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:05:30', '2016-01-24 23:05:30', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:05:30', NULL),
(34, 0, 22, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:06:41', '2016-01-24 23:06:41', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:06:41', NULL),
(35, 0, 22, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:06:41', '2016-01-24 23:06:41', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:06:41', NULL),
(36, 0, 23, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:08:51', '2016-01-24 23:08:51', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:08:51', NULL),
(37, 0, 23, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:08:51', '2016-01-24 23:08:51', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:08:51', NULL),
(38, 0, 24, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:09:19', '2016-01-24 23:09:19', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:09:19', NULL),
(39, 0, 24, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:09:19', '2016-01-24 23:09:19', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:09:19', NULL),
(40, 0, 25, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:09:32', '2016-01-24 23:09:32', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:09:32', NULL),
(41, 0, 25, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:09:32', '2016-01-24 23:09:32', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:09:32', NULL),
(42, 0, 26, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:10:04', '2016-01-24 23:10:04', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:10:04', NULL),
(43, 0, 26, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:10:04', '2016-01-24 23:10:04', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:10:04', NULL),
(44, 0, 27, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:12:19', '2016-01-24 23:12:19', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:12:19', NULL),
(45, 0, 27, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:12:19', '2016-01-24 23:12:19', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:12:19', NULL),
(46, 0, 28, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:15:51', '2016-01-24 23:15:51', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:15:51', NULL),
(47, 0, 28, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:15:51', '2016-01-24 23:15:51', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:15:51', NULL),
(48, 0, 29, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:19:16', '2016-01-24 23:19:16', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:19:16', NULL),
(49, 0, 29, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:19:16', '2016-01-24 23:19:16', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:19:16', NULL),
(50, 0, 30, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:22:19', '2016-01-24 23:22:19', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:22:19', NULL),
(51, 0, 30, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:22:19', '2016-01-24 23:22:19', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:22:19', NULL),
(52, 0, 31, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:23:19', '2016-01-24 23:23:19', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:23:19', NULL),
(53, 0, 31, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:23:19', '2016-01-24 23:23:19', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:23:19', NULL),
(54, 0, 32, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:36:21', '2016-01-24 23:36:21', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:36:21', NULL),
(55, 0, 32, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:36:21', '2016-01-24 23:36:21', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-24 23:36:21', NULL),
(56, 0, 33, 1, 'SOLIC', 'ACTIV', '2016-01-25 07:21:38', '2016-01-25 07:21:38', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 07:21:38', NULL),
(57, 0, 33, NULL, 'TECNI', 'ACTIV', '2016-01-25 07:21:38', '2016-01-25 07:21:38', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 07:21:38', NULL),
(58, 0, 34, 1, 'SOLIC', 'ACTIV', '2016-01-25 07:24:24', '2016-01-25 07:24:24', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 07:24:24', NULL),
(59, 0, 34, 1, 'TECNI', 'ACTIV', '2016-01-25 07:24:24', '2016-01-25 07:24:24', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 07:24:24', NULL),
(60, 0, 35, 1, 'SOLIC', 'ACTIV', '2016-01-25 07:30:58', '2016-01-25 07:30:58', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 07:30:58', NULL),
(61, 0, 35, 1, 'TECNI', 'ACTIV', '2016-01-25 07:30:58', '2016-01-25 07:30:58', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 07:30:58', NULL),
(62, 0, 36, 1, 'SOLIC', 'ACTIV', '2016-01-25 07:33:23', '2016-01-25 07:33:23', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 07:33:23', NULL),
(63, 0, 36, 1, 'TECNI', 'ACTIV', '2016-01-25 07:33:23', '2016-01-25 07:33:23', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 07:33:23', NULL),
(64, 0, 37, 1, 'SOLIC', 'ACTIV', '2016-01-25 07:38:00', '2016-01-25 07:38:00', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 07:38:00', NULL),
(65, 0, 37, 1, 'TECNI', 'ACTIV', '2016-01-25 07:38:00', '2016-01-25 07:38:00', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 07:38:00', NULL),
(66, 0, 38, 1, 'SOLIC', 'ACTIV', '2016-01-25 08:41:16', '2016-01-25 08:41:16', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 08:41:16', NULL),
(67, 0, 38, 1, 'TECNI', 'ACTIV', '2016-01-25 08:41:16', '2016-01-25 08:41:16', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 08:41:16', NULL),
(68, 0, 39, 1, 'SOLIC', 'ACTIV', '2016-01-25 09:37:08', '2016-01-25 09:37:08', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 09:37:08', NULL),
(69, 0, 39, 1, 'TECNI', 'ACTIV', '2016-01-25 09:37:08', '2016-01-25 09:37:08', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 09:37:08', NULL),
(70, 0, 40, 1, 'SOLIC', 'ACTIV', '2016-01-25 09:39:00', '2016-01-25 09:39:00', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 09:39:00', NULL),
(71, 0, 40, 1, 'TECNI', 'ACTIV', '2016-01-25 09:39:00', '2016-01-25 09:39:00', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 09:39:00', NULL),
(72, 0, 41, 1, 'SOLIC', 'ACTIV', '2016-01-25 09:42:26', '2016-01-25 09:42:26', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 09:42:26', NULL),
(73, 0, 41, 1, 'TECNI', 'ACTIV', '2016-01-25 09:42:26', '2016-01-25 09:42:26', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 09:42:26', NULL),
(74, 0, 11, 1, 'TECNI', 'PROCE', '2016-01-25 10:11:42', '2016-01-25 10:11:42', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 10:11:42', NULL),
(75, 0, 12, 1, 'TECNI', 'PROCE', '2016-01-25 10:11:47', '2016-01-25 10:11:47', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 10:11:47', NULL),
(76, 0, 13, 1, 'TECNI', 'PROCE', '2016-01-25 10:11:53', '2016-01-25 10:11:53', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-25 10:11:53', NULL),
(77, 0, 42, 1, 'SOLIC', 'ACTIV', '2016-01-26 21:59:39', '2016-01-26 21:59:39', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-26 21:59:39', NULL),
(78, 0, 42, 1, 'TECNI', 'ACTIV', '2016-01-26 21:59:39', '2016-01-26 21:59:39', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-26 21:59:39', NULL),
(79, 0, 42, 1, 'TECNI', 'ACTIV', '2016-01-26 22:01:24', '2016-01-26 22:01:24', '2016-01-26 15:00:00', '2016-01-26 16:00:00', '01:00', 'Aseo y mantenimiento de las Oficinas ', 'INSERT', '2016-01-26 22:01:24', NULL),
(80, 0, 43, 1, 'SOLIC', 'ACTIV', '2016-01-27 23:40:38', '2016-01-27 23:40:38', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-27 23:40:38', NULL),
(81, 0, 43, 5, 'TECNI', 'ACTIV', '2016-01-27 23:40:38', '2016-01-27 23:40:38', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-27 23:40:38', NULL),
(82, 0, 43, 6, 'TECNI', 'ACTIV', '2016-01-27 23:45:06', '2016-01-27 23:45:06', '2016-01-30 10:00:00', '2016-01-30 15:00:00', '05:00', 'Coordinar colocacion de banner, y lonas publicidades con persona encargada de la junta.', 'INSERT', '2016-01-27 23:45:06', NULL),
(83, 0, 43, 5, 'TECNI', 'ACTIV', '2016-01-27 23:48:26', '2016-01-27 23:48:26', '2016-01-25 08:00:00', '2016-01-28 12:00:00', '76:00', 'Autorizacion por parte de presidente', 'INSERT', '2016-01-27 23:48:26', NULL),
(84, 0, 43, 10, 'TECNI', 'ACTIV', '2016-01-28 00:03:38', '2016-01-28 00:03:38', '2016-01-25 08:00:00', '2016-01-27 17:00:00', '57:00', 'Evaluar y autorizacion de oficios , pendientes', 'INSERT', '2016-01-28 00:03:38', NULL),
(85, 0, 43, 5, 'TECNI', 'ACTIV', '2016-01-28 00:16:10', '2016-01-28 00:16:10', '2016-01-27 17:15:00', '2016-01-27 17:45:00', '00:30', 'Envio de solicitud', 'INSERT', '2016-01-28 00:16:10', NULL),
(86, 0, 44, 1, 'SOLIC', 'ACTIV', '2016-01-30 03:44:04', '2016-01-30 03:44:04', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-30 03:44:04', NULL),
(87, 0, 44, NULL, 'TECNI', 'ACTIV', '2016-01-30 03:44:04', '2016-01-30 03:44:04', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-30 03:44:04', NULL),
(88, 0, 45, 1, 'SOLIC', 'ACTIV', '2016-01-30 03:52:33', '2016-01-30 03:52:33', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-30 03:52:33', NULL),
(89, 0, 45, NULL, 'TECNI', 'ACTIV', '2016-01-30 03:52:33', '2016-01-30 03:52:33', NULL, NULL, NULL, NULL, 'INSERT', '2016-01-30 03:52:33', NULL),
(90, 0, 45, 5, 'TECNI', 'ACTIV', '2016-01-30 03:54:21', '2016-01-30 03:54:21', '2016-01-29 20:45:00', '2016-02-01 20:45:00', '72:00', 'Convocatorias y confirmacion de asistencia', 'INSERT', '2016-01-30 03:54:21', NULL),
(91, 0, 45, 5, 'TECNI', 'ACTIV', '2016-01-30 03:56:06', '2016-01-30 03:56:06', '2016-02-01 12:15:00', '2016-02-01 20:45:00', '08:30', 'Se envia reporte de asistentes confirmados via telefonicamente', 'INSERT', '2016-01-30 03:56:06', NULL),
(92, 101, 9, 1, 'TECNI', 'PROCE', '2016-01-18 09:43:23', '2016-01-18 09:43:23', NULL, NULL, NULL, NULL, 'DELETE', '2016-01-30 03:58:58', NULL),
(93, 68, 9, 1, 'TECNI', 'ACTIV', '2015-03-26 09:46:46', '2015-03-26 09:46:46', NULL, NULL, NULL, NULL, 'DELETE', '2016-01-30 03:59:09', NULL),
(94, 0, 43, 1, 'CERRA', 'ACTIV', '2016-02-01 09:04:30', '2016-02-01 09:04:30', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-01 09:04:30', NULL),
(95, 0, 43, 1, 'CERRA', 'ACTIV', '2016-02-01 09:05:01', '2016-02-01 09:05:01', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-01 09:05:01', NULL),
(96, 69, 10, 2, 'SOLIC', 'ACTIV', '2015-03-26 10:00:02', '2015-03-26 10:00:02', NULL, NULL, NULL, NULL, 'UPDATE', '2016-02-03 07:14:27', NULL),
(97, 103, 10, 2, 'TECNI', 'PROCE', '2016-01-18 09:43:35', '2016-01-18 09:43:35', NULL, NULL, NULL, NULL, 'UPDATE', '2016-02-03 07:17:29', NULL),
(98, 0, 46, 1, 'SOLIC', 'ACTIV', '2016-02-09 10:18:07', '2016-02-09 10:18:07', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-09 10:18:07', NULL),
(99, 0, 46, NULL, 'TECNI', 'ACTIV', '2016-02-09 10:18:07', '2016-02-09 10:18:07', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-09 10:18:07', NULL),
(100, 0, 46, 1, 'TECNI', 'ACTIV', '2016-02-09 10:19:46', '2016-02-09 10:19:46', '2016-02-09 02:15:00', '2016-02-10 02:15:00', '24:00', 'test', 'INSERT', '2016-02-09 10:19:46', NULL),
(101, 0, 46, 1, 'TECNI', 'ACTIV', '2016-02-09 10:19:46', '2016-02-09 10:19:46', '2016-02-09 02:15:00', '2016-02-10 02:15:00', '24:00', 'test', 'INSERT', '2016-02-09 10:19:46', NULL),
(102, 180, 46, 1, 'TECNI', 'ACTIV', '2016-02-09 10:19:46', '2016-02-09 10:19:46', '2016-02-09 02:15:00', '2016-02-10 02:15:00', '24:00', 'test', 'DELETE', '2016-02-09 10:19:57', NULL),
(103, 0, 46, 1, 'CERRA', 'ACTIV', '2016-02-09 10:20:31', '2016-02-09 10:20:31', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-09 10:20:31', NULL),
(104, 0, 46, 1, 'CERRA', 'ACTIV', '2016-02-09 10:21:21', '2016-02-09 10:21:21', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-09 10:21:21', NULL),
(105, 0, 47, 12, 'SOLIC', 'ACTIV', '2016-02-09 10:25:59', '2016-02-09 10:25:59', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-09 10:25:59', NULL),
(106, 0, 47, 12, 'TECNI', 'ACTIV', '2016-02-09 10:25:59', '2016-02-09 10:25:59', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-09 10:25:59', NULL),
(107, 0, 47, 12, 'CERRA', 'ACTIV', '2016-02-09 10:25:59', '2016-02-09 10:25:59', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-09 10:25:59', NULL),
(108, 0, 46, 1, 'TECNI', 'PROCE', '2016-02-09 10:26:59', '2016-02-09 10:26:59', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-09 10:26:59', NULL),
(109, 0, 48, 5, 'SOLIC', 'ACTIV', '2016-02-19 21:47:11', '2016-02-19 21:47:11', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 21:47:11', NULL),
(110, 0, 48, 3, 'TECNI', 'ACTIV', '2016-02-19 21:47:11', '2016-02-19 21:47:11', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 21:47:11', NULL),
(111, 0, 49, 1, 'SOLIC', 'ACTIV', '2016-02-19 22:14:55', '2016-02-19 22:14:55', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 22:14:55', NULL),
(112, 0, 49, 5, 'TECNI', 'ACTIV', '2016-02-19 22:14:55', '2016-02-19 22:14:55', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 22:14:55', NULL),
(113, 0, 50, 1, 'SOLIC', 'ACTIV', '2016-02-19 22:33:40', '2016-02-19 22:33:40', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 22:33:40', NULL),
(114, 0, 50, 5, 'TECNI', 'ACTIV', '2016-02-19 22:33:40', '2016-02-19 22:33:40', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 22:33:40', NULL),
(115, 0, 51, 1, 'SOLIC', 'ACTIV', '2016-02-19 22:34:12', '2016-02-19 22:34:12', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 22:34:12', NULL),
(116, 0, 51, 9, 'TECNI', 'ACTIV', '2016-02-19 22:34:12', '2016-02-19 22:34:12', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 22:34:12', NULL),
(117, 0, 52, 1, 'SOLIC', 'ACTIV', '2016-02-19 22:42:30', '2016-02-19 22:42:30', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 22:42:30', NULL),
(118, 0, 52, 9, 'TECNI', 'ACTIV', '2016-02-19 22:42:30', '2016-02-19 22:42:30', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 22:42:30', NULL),
(119, 0, 53, 1, 'SOLIC', 'ACTIV', '2016-02-19 22:42:42', '2016-02-19 22:42:42', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 22:42:42', NULL),
(120, 0, 53, 9, 'TECNI', 'ACTIV', '2016-02-19 22:42:42', '2016-02-19 22:42:42', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 22:42:42', NULL),
(121, 0, 54, 1, 'SOLIC', 'ACTIV', '2016-02-19 22:44:37', '2016-02-19 22:44:37', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 22:44:37', NULL),
(122, 0, 54, 9, 'TECNI', 'ACTIV', '2016-02-19 22:44:37', '2016-02-19 22:44:37', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 22:44:37', NULL),
(123, 0, 55, 1, 'SOLIC', 'ACTIV', '2016-02-19 22:52:06', '2016-02-19 22:52:06', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 22:52:06', NULL),
(124, 0, 55, 9, 'TECNI', 'ACTIV', '2016-02-19 22:52:06', '2016-02-19 22:52:06', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 22:52:06', NULL),
(125, 0, 56, 5, 'SOLIC', 'ACTIV', '2016-02-19 23:07:14', '2016-02-19 23:07:14', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 23:07:14', NULL),
(126, 0, 56, 9, 'TECNI', 'ACTIV', '2016-02-19 23:07:14', '2016-02-19 23:07:14', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 23:07:14', NULL),
(127, 0, 57, 5, 'SOLIC', 'ACTIV', '2016-02-19 23:07:26', '2016-02-19 23:07:26', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 23:07:26', NULL),
(128, 0, 57, 9, 'TECNI', 'ACTIV', '2016-02-19 23:07:26', '2016-02-19 23:07:26', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-19 23:07:26', NULL),
(129, 0, 58, 1, 'SOLIC', 'ACTIV', '2016-02-20 00:39:23', '2016-02-20 00:39:23', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-20 00:39:23', NULL),
(130, 0, 58, 9, 'TECNI', 'ACTIV', '2016-02-20 00:39:23', '2016-02-20 00:39:23', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-20 00:39:23', NULL),
(131, 0, 58, 1, 'CERRA', 'ACTIV', '2016-02-20 00:41:17', '2016-02-20 00:41:17', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-20 00:41:17', NULL),
(132, 0, 59, 5, 'SOLIC', 'ACTIV', '2016-02-20 00:43:16', '2016-02-20 00:43:16', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-20 00:43:16', NULL),
(133, 0, 59, 3, 'TECNI', 'ACTIV', '2016-02-20 00:43:16', '2016-02-20 00:43:16', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-20 00:43:16', NULL),
(134, 0, 45, 4, 'TECNI', 'ACTIV', '2016-02-20 04:06:19', '2016-02-20 04:06:19', '2016-02-26 08:00:00', '2016-02-27 20:00:00', '36:00', 'llllll', 'INSERT', '2016-02-20 04:06:19', NULL),
(135, 212, 45, 4, 'TECNI', 'ACTIV', '2016-02-20 04:06:19', '2016-02-20 04:06:19', '2016-02-26 08:00:00', '2016-02-27 20:00:00', '36:00', 'llllll', 'DELETE', '2016-02-20 04:08:25', NULL),
(136, 0, 60, 1, 'SOLIC', 'ACTIV', '2016-02-20 12:16:39', '2016-02-20 12:16:39', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-20 12:16:39', NULL),
(137, 0, 60, 5, 'TECNI', 'ACTIV', '2016-02-20 12:16:39', '2016-02-20 12:16:39', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-20 12:16:39', NULL),
(138, 0, 60, 1, 'TECNI', 'ACTIV', '2016-02-20 12:19:15', '2016-02-20 12:19:15', '2016-02-26 06:45:00', '2016-02-27 04:15:00', '21:30', 'DespuÃ©s ', 'INSERT', '2016-02-20 12:19:15', NULL),
(139, 0, 60, 1, 'CERRA', 'ACTIV', '2016-02-21 07:20:58', '2016-02-21 07:20:58', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-21 07:20:58', NULL),
(140, 0, 61, 5, 'SOLIC', 'ACTIV', '2016-02-24 02:58:02', '2016-02-24 02:58:02', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-24 02:58:02', NULL),
(141, 0, 61, 7, 'TECNI', 'ACTIV', '2016-02-24 02:58:02', '2016-02-24 02:58:02', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-24 02:58:02', NULL),
(142, 0, 48, 5, 'TECNI', 'PROCE', '2016-02-24 03:23:59', '2016-02-24 03:23:59', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-24 03:23:59', NULL),
(143, 219, 48, 5, 'TECNI', 'PROCE', '2016-02-24 03:23:59', '2016-02-24 03:23:59', NULL, NULL, NULL, NULL, 'DELETE', '2016-02-24 03:24:05', NULL),
(144, 0, 48, 5, 'TECNI', 'PROCE', '2016-02-24 03:31:27', '2016-02-24 03:31:27', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-24 03:31:27', NULL),
(145, 220, 48, 5, 'TECNI', 'PROCE', '2016-02-24 03:31:27', '2016-02-24 03:31:27', NULL, NULL, NULL, NULL, 'DELETE', '2016-02-24 03:31:32', NULL),
(146, 0, 18, 1, 'CERRA', 'ACTIV', '2016-02-25 04:36:09', '2016-02-25 04:36:09', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-25 04:36:09', NULL),
(147, 0, 46, 1, 'CERRA', 'ACTIV', '2016-02-25 04:36:37', '2016-02-25 04:36:37', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-25 04:36:37', NULL),
(148, 0, 19, 1, 'CERRA', 'ACTIV', '2016-02-25 04:38:16', '2016-02-25 04:38:16', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-25 04:38:16', NULL),
(149, 0, 24, 1, 'CERRA', 'ACTIV', '2016-02-25 04:38:45', '2016-02-25 04:38:45', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-25 04:38:45', NULL),
(150, 0, 25, 1, 'CERRA', 'ACTIV', '2016-02-25 04:39:19', '2016-02-25 04:39:19', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-25 04:39:19', NULL),
(151, 0, 26, 1, 'CERRA', 'ACTIV', '2016-02-25 04:39:49', '2016-02-25 04:39:49', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-25 04:39:49', NULL),
(152, 0, 44, 1, 'CERRA', 'ACTIV', '2016-02-25 04:40:30', '2016-02-25 04:40:30', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-25 04:40:30', NULL),
(153, 0, 45, 1, 'CERRA', 'ACTIV', '2016-02-25 04:41:00', '2016-02-25 04:41:00', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-25 04:41:00', NULL),
(154, 0, 48, 1, 'TECNI', 'PROCE', '2016-02-25 07:08:14', '2016-02-25 07:08:14', NULL, NULL, NULL, NULL, 'INSERT', '2016-02-25 07:08:14', NULL),
(155, 229, 48, 1, 'TECNI', 'PROCE', '2016-02-25 07:08:14', '2016-02-25 07:08:14', NULL, NULL, NULL, NULL, 'DELETE', '2016-02-25 07:08:18', NULL),
(156, 0, 48, 1, 'TECNI', 'ACTIV', '2016-02-25 07:10:11', '2016-02-25 07:10:11', '2016-02-25 00:00:00', '2016-02-25 02:15:00', '02:15', NULL, 'INSERT', '2016-02-25 07:10:11', NULL),
(157, 230, 48, 1, 'TECNI', 'ACTIV', '2016-02-25 07:10:11', '2016-02-25 07:10:11', '2016-02-25 00:00:00', '2016-02-25 02:15:00', '02:15', NULL, 'DELETE', '2016-02-25 07:10:19', NULL),
(158, 0, 62, 1, 'SOLIC', 'ACTIV', '2016-03-03 06:33:03', '2016-03-03 06:33:03', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-03 06:33:03', NULL),
(159, 0, 62, NULL, 'TECNI', 'ACTIV', '2016-03-03 06:33:03', '2016-03-03 06:33:03', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-03 06:33:03', NULL),
(160, 0, 62, 1, 'CERRA', 'ACTIV', '2016-03-03 06:37:28', '2016-03-03 06:37:28', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-03 06:37:28', NULL),
(161, 0, 62, 5, 'TECNI', 'ACTIV', '2016-03-03 06:40:49', '2016-03-03 06:40:49', '2016-03-03 07:30:00', '2016-03-03 13:00:00', '05:30', 'envio de solicitud', 'INSERT', '2016-03-03 06:40:49', NULL),
(162, 234, 62, 5, 'TECNI', 'ACTIV', '2016-03-03 06:40:49', '2016-03-03 06:40:49', '2016-03-03 07:30:00', '2016-03-03 13:00:00', '05:30', 'envio de solicitud', 'DELETE', '2016-03-03 06:41:33', NULL),
(163, 0, 63, 1, 'SOLIC', 'ACTIV', '2016-03-03 06:45:11', '2016-03-03 06:45:11', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-03 06:45:11', NULL),
(164, 0, 63, 5, 'TECNI', 'ACTIV', '2016-03-03 06:45:11', '2016-03-03 06:45:11', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-03 06:45:11', NULL),
(165, 0, 64, 1, 'SOLIC', 'ACTIV', '2016-03-08 22:35:17', '2016-03-08 22:35:17', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-08 22:35:17', NULL),
(166, 0, 64, NULL, 'TECNI', 'ACTIV', '2016-03-08 22:35:17', '2016-03-08 22:35:17', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-08 22:35:17', NULL),
(167, 0, 63, 1, 'TECNI', 'PROCE', '2016-03-17 09:42:31', '2016-03-17 09:42:31', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-17 09:42:31', NULL),
(168, 239, 63, 1, 'TECNI', 'PROCE', '2016-03-17 09:42:31', '2016-03-17 09:42:31', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-17 09:43:30', NULL),
(169, 0, 63, 1, 'TECNI', 'ACTIV', '2016-03-17 09:44:18', '2016-03-17 09:44:18', '2016-03-17 01:30:00', '2016-03-17 03:45:00', '02:15', 'test', 'INSERT', '2016-03-17 09:44:18', NULL),
(170, 240, 63, 1, 'TECNI', 'ACTIV', '2016-03-17 09:44:18', '2016-03-17 09:44:18', '2016-03-17 01:30:00', '2016-03-17 03:45:00', '02:15', 'test', 'DELETE', '2016-03-17 09:44:33', NULL),
(171, 0, 65, 1, 'SOLIC', 'ACTIV', '2016-03-22 04:31:09', '2016-03-22 04:31:09', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-22 04:31:09', NULL),
(172, 0, 65, 3, 'TECNI', 'ACTIV', '2016-03-22 04:31:09', '2016-03-22 04:31:09', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-22 04:31:09', NULL),
(173, 0, 65, 1, 'TECNI', 'PROCE', '2016-03-22 04:37:25', '2016-03-22 04:37:25', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-22 04:37:25', NULL),
(174, 243, 65, 1, 'TECNI', 'PROCE', '2016-03-22 04:37:25', '2016-03-22 04:37:25', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-22 04:37:55', NULL),
(175, 0, 65, 1, 'TECNI', 'PROCE', '2016-03-22 04:38:13', '2016-03-22 04:38:13', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-22 04:38:13', NULL),
(176, 0, 65, 8, 'TECNI', 'ACTIV', '2016-03-22 04:46:39', '2016-03-22 04:46:39', '2016-03-22 08:00:00', '2016-03-22 18:00:00', '10:00', 'Visita de campo a puellaro', 'INSERT', '2016-03-22 04:46:39', NULL),
(177, 242, 65, 3, 'TECNI', 'ACTIV', '2016-03-22 04:31:09', '2016-03-22 04:31:09', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-22 04:47:25', NULL),
(178, 244, 65, 1, 'TECNI', 'PROCE', '2016-03-22 04:38:13', '2016-03-22 04:38:13', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-22 04:47:28', NULL),
(179, 0, 65, 1, 'CERRA', 'ACTIV', '2016-03-22 04:49:52', '2016-03-22 04:49:52', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-22 04:49:52', NULL),
(180, 0, 66, 3, 'SOLIC', 'ACTIV', '2016-03-22 21:17:05', '2016-03-22 21:17:05', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-22 21:17:05', NULL),
(181, 0, 66, 3, 'TECNI', 'ACTIV', '2016-03-22 21:17:05', '2016-03-22 21:17:05', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-22 21:17:05', NULL),
(182, 0, 67, 3, 'SOLIC', 'ACTIV', '2016-03-22 21:35:07', '2016-03-22 21:35:07', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-22 21:35:07', NULL),
(183, 0, 67, 3, 'TECNI', 'ACTIV', '2016-03-22 21:35:07', '2016-03-22 21:35:07', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-22 21:35:07', NULL),
(184, 0, 66, 1, 'TECNI', 'PROCE', '2016-03-22 21:45:26', '2016-03-22 21:45:26', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-22 21:45:26', NULL),
(185, 0, 67, 1, 'TECNI', 'PROCE', '2016-03-22 21:45:29', '2016-03-22 21:45:29', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-22 21:45:29', NULL),
(186, 0, 68, 1, 'SOLIC', 'ACTIV', '2016-03-22 22:12:28', '2016-03-22 22:12:28', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-22 22:12:28', NULL),
(187, 0, 68, 3, 'TECNI', 'ACTIV', '2016-03-22 22:12:28', '2016-03-22 22:12:28', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-22 22:12:28', NULL),
(188, 0, 68, 1, 'TECNI', 'PROCE', '2016-03-22 22:22:57', '2016-03-22 22:22:57', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-22 22:22:57', NULL),
(189, 251, 66, 1, 'TECNI', 'PROCE', '2016-03-22 21:45:26', '2016-03-22 21:45:26', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-22 22:23:22', NULL),
(190, 255, 68, 1, 'TECNI', 'PROCE', '2016-03-22 22:22:57', '2016-03-22 22:22:57', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-22 22:23:24', NULL),
(191, 252, 67, 1, 'TECNI', 'PROCE', '2016-03-22 21:45:29', '2016-03-22 21:45:29', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-22 22:23:27', NULL),
(192, 0, 68, 1, 'CERRA', 'ACTIV', '2016-03-22 23:26:33', '2016-03-22 23:26:33', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-22 23:26:33', NULL),
(193, 0, 68, 1, 'CERRA', 'ACTIV', '2016-03-22 23:28:39', '2016-03-22 23:28:39', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-22 23:28:39', NULL),
(194, 0, 69, 1, 'SOLIC', 'ACTIV', '2016-03-24 04:46:08', '2016-03-24 04:46:08', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-24 04:46:08', NULL),
(195, 0, 69, NULL, 'TECNI', 'ACTIV', '2016-03-24 04:46:08', '2016-03-24 04:46:08', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-24 04:46:08', NULL),
(196, 0, 69, 10, 'TECNI', 'ACTIV', '2016-03-24 04:51:52', '2016-03-24 04:51:52', '2016-03-24 09:00:00', '2016-03-24 11:00:00', '02:00', 'ANALIZAR REQUERIMIENTO ', 'INSERT', '2016-03-24 04:51:52', NULL),
(197, 0, 69, 2, 'TECNI', 'PROCE', '2016-03-23 14:00:00', '2016-03-23 14:00:00', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-24 05:17:23', NULL),
(198, 261, 69, 10, 'TECNI', 'PROCE', '2016-03-23 14:00:00', '2016-03-23 14:00:00', NULL, NULL, NULL, NULL, 'UPDATE', '2016-03-24 05:17:59', NULL),
(199, 261, 69, 10, 'TECNI', 'PROCE', '2016-03-23 14:00:00', '2016-03-23 14:00:00', NULL, NULL, NULL, NULL, 'UPDATE', '2016-03-24 05:18:32', NULL),
(200, 1, 1, 1, 'SOLIC', 'ACTIV', '2015-02-26 23:30:17', '2015-02-26 23:30:17', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(201, 34, 1, 0, 'TECNI', 'ACTIV', '2015-03-14 09:50:39', '2015-03-14 09:50:39', '2015-03-14 02:45:00', '2015-03-14 02:45:00', NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(202, 27, 1, 0, 'TECNI', 'ACTIV', '2015-03-14 09:25:07', '2015-03-14 09:25:07', '2015-03-14 02:15:00', '2015-03-14 02:15:00', NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(203, 26, 1, 0, 'TECNI', 'ACTIV', '2015-03-14 09:25:00', '2015-03-14 09:25:00', '2015-03-14 02:15:00', '2015-03-14 02:15:00', NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(204, 25, 0, 0, 'TECNI', 'ACTIV', '2015-03-14 09:20:15', '2015-03-14 09:20:15', '2015-03-14 02:15:00', '2015-03-14 02:15:00', NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(205, 28, 1, 0, 'TECNI', 'ACTIV', '2015-03-14 09:25:23', '2015-03-14 09:25:23', '2015-03-14 02:15:00', '2015-03-14 06:45:00', '04:30', NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(206, 29, 1, 0, 'TECNI', 'ACTIV', '2015-03-14 09:25:59', '2015-03-14 09:25:59', '2015-03-14 02:15:00', '2015-03-14 02:15:00', NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(207, 30, 1, 0, 'TECNI', 'ACTIV', '2015-03-14 09:27:13', '2015-03-14 09:27:13', '2015-03-14 02:15:00', '2015-03-14 02:15:00', NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(208, 31, 1, 0, 'TECNI', 'ACTIV', '2015-03-14 09:27:44', '2015-03-14 09:27:44', '2015-03-14 02:15:00', '2015-03-14 02:15:00', NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(209, 32, 1, 0, 'TECNI', 'ACTIV', '2015-03-14 09:49:10', '2015-03-14 09:49:10', '2015-03-14 01:45:00', '2015-03-14 01:45:00', NULL, 'zzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzzz', 'DELETE', '2016-03-24 05:19:59', NULL),
(210, 45, 1, 1, 'TECNI', 'ACTIV', '2015-03-14 10:53:24', '2015-03-14 10:53:24', '2015-03-14 03:45:00', '2015-03-14 03:45:00', NULL, '6666', 'DELETE', '2016-03-24 05:19:59', NULL),
(211, 46, 1, 1, 'TECNI', 'ACTIV', '2015-03-14 10:53:36', '2015-03-14 10:53:36', '2015-03-14 03:45:00', '2015-03-14 03:45:00', NULL, '77787', 'DELETE', '2016-03-24 05:19:59', NULL),
(212, 35, 1, 0, 'TECNI', 'ACTIV', '2015-03-14 09:53:22', '2015-03-14 09:53:22', '2015-03-14 02:45:00', '2015-03-14 02:45:00', NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(213, 36, 1, 1, 'TECNI', 'ACTIV', '2015-03-14 09:53:40', '2015-03-14 09:53:40', '2015-03-14 02:45:00', '2015-03-14 02:45:00', NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(214, 41, 1, 1, 'TECNI', 'ACTIV', '2015-03-14 09:56:47', '2015-03-14 09:56:47', '2015-03-14 02:45:00', '2015-03-14 02:45:00', NULL, '33333333333', 'DELETE', '2016-03-24 05:19:59', NULL),
(215, 39, 0, 1, 'TECNI', 'ACTIV', '2015-03-14 09:55:15', '2015-03-14 09:55:15', '2015-03-14 02:45:00', '2015-03-14 02:45:00', NULL, '111111111', 'DELETE', '2016-03-24 05:19:59', NULL),
(216, 40, 0, 1, 'TECNI', 'ACTIV', '2015-03-14 09:55:24', '2015-03-14 09:55:24', '2015-03-14 02:45:00', '2015-03-14 02:45:00', NULL, '222222222222222222', 'DELETE', '2016-03-24 05:19:59', NULL),
(217, 42, 1, 0, 'TECNI', 'ACTIV', '2015-03-14 09:58:10', '2015-03-14 09:58:10', '2015-03-14 02:45:00', '2015-03-14 02:45:00', NULL, '4444444444444444444444444444444444444444', 'DELETE', '2016-03-24 05:19:59', NULL),
(218, 44, 1, 1, 'TECNI', 'ACTIV', '2015-03-14 10:53:15', '2015-03-14 10:53:15', '2015-03-14 03:45:00', '2015-03-14 03:45:00', NULL, '5557', 'DELETE', '2016-03-24 05:19:59', NULL),
(219, 47, 1, 1, 'TECNI', 'ACTIV', '2015-03-14 10:53:54', '2015-03-14 10:53:54', '2015-03-14 03:45:00', '2015-03-14 03:45:00', NULL, 'qwerty5', 'DELETE', '2016-03-24 05:19:59', NULL),
(220, 48, 2, 1, 'SOLIC', 'ACTIV', '2015-03-14 11:37:10', '2015-03-14 11:37:10', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(221, 49, 2, 1, 'TECNI', 'ACTIV', '2015-03-14 11:37:10', '2015-03-14 11:37:10', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(222, 50, 2, 1, 'TECNI', 'ACTIV', '2015-03-15 01:35:12', '2015-03-15 01:35:12', '2015-03-14 18:30:00', '2015-03-14 23:45:00', '05:15', '111111111111111', 'DELETE', '2016-03-24 05:19:59', NULL),
(223, 51, 3, 1, 'SOLIC', 'ACTIV', '2015-03-25 20:52:26', '2015-03-25 20:52:26', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(224, 52, 3, 1, 'TECNI', 'ACTIV', '2015-03-25 20:52:26', '2015-03-25 20:52:26', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(225, 53, 4, 1, 'SOLIC', 'ACTIV', '2015-03-25 21:55:13', '2015-03-25 21:55:13', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(226, 55, 5, NULL, 'SOLIC', 'ACTIV', '2015-03-26 00:22:26', '2015-03-26 00:22:26', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(227, 56, 5, 1, 'TECNI', 'ACTIV', '2015-03-26 00:22:26', '2015-03-26 00:22:26', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(228, 57, 5, 1, 'CERRA', 'ACTIV', '2015-03-26 00:22:26', '2015-03-26 00:22:26', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(229, 58, 6, NULL, 'SOLIC', 'ACTIV', '2015-03-26 00:38:58', '2015-03-26 00:38:58', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(230, 59, 6, 1, 'TECNI', 'ACTIV', '2015-03-26 00:38:58', '2015-03-26 00:38:58', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(231, 60, 6, 1, 'CERRA', 'ACTIV', '2015-03-26 00:38:58', '2015-03-26 00:38:58', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(232, 61, 7, NULL, 'SOLIC', 'ACTIV', '2015-03-26 00:39:34', '2015-03-26 00:39:34', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(233, 62, 7, 1, 'TECNI', 'ACTIV', '2015-03-26 00:39:34', '2015-03-26 00:39:34', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(234, 63, 7, 1, 'CERRA', 'ACTIV', '2015-03-26 00:39:34', '2015-03-26 00:39:34', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(235, 64, 3, 1, 'CERRA', 'ACTIV', '2015-03-26 03:06:58', '2015-03-26 03:06:58', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(236, 65, 8, 1, 'SOLIC', 'ACTIV', '2015-03-26 09:45:18', '2015-03-26 09:45:18', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(237, 66, 8, 1, 'TECNI', 'ACTIV', '2015-03-26 09:45:18', '2015-03-26 09:45:18', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(238, 67, 9, 1, 'SOLIC', 'ACTIV', '2015-03-26 09:46:46', '2015-03-26 09:46:46', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(239, 175, 43, 1, 'CERRA', 'ACTIV', '2016-02-01 09:04:30', '2016-02-01 09:04:30', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(240, 69, 10, 2, 'SOLIC', 'ACTIV', '2015-03-26 10:00:02', '2015-03-26 10:00:02', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(241, 70, 10, 1, 'TECNI', 'ACTIV', '2015-03-26 10:00:02', '2015-03-26 10:00:02', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(242, 71, 11, 1, 'SOLIC', 'ACTIV', '2015-03-26 10:33:14', '2015-03-26 10:33:14', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(243, 72, 11, 1, 'TECNI', 'ACTIV', '2015-03-26 10:33:14', '2015-03-26 10:33:14', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(244, 73, 12, 1, 'SOLIC', 'ACTIV', '2015-03-26 10:34:26', '2015-03-26 10:34:26', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(245, 74, 12, 1, 'TECNI', 'ACTIV', '2015-03-26 10:34:26', '2015-03-26 10:34:26', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(246, 75, 13, 1, 'SOLIC', 'ACTIV', '2015-03-28 12:02:10', '2015-03-28 12:02:10', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(247, 76, 13, 1, 'TECNI', 'ACTIV', '2015-03-28 12:02:10', '2015-03-28 12:02:10', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(248, 77, 3, 1, 'TECNI', 'ACTIV', '2015-03-30 01:51:32', '2015-03-30 01:51:32', '2015-03-20 19:45:00', '2015-04-03 19:15:00', '335:30', NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(249, 78, 14, 1, 'SOLIC', 'ACTIV', '2015-04-10 11:29:20', '2015-04-10 11:29:20', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(250, 79, 14, 1, 'TECNI', 'ACTIV', '2015-04-10 11:29:20', '2015-04-10 11:29:20', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(251, 80, 15, 1, 'SOLIC', 'ACTIV', '2015-04-11 07:42:20', '2015-04-11 07:42:20', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(252, 81, 15, 1, 'TECNI', 'ACTIV', '2015-04-11 07:42:20', '2015-04-11 07:42:20', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(253, 82, 16, 1, 'SOLIC', 'ACTIV', '2015-04-11 07:58:03', '2015-04-11 07:58:03', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(254, 83, 16, 1, 'TECNI', 'ACTIV', '2015-04-11 07:58:03', '2015-04-11 07:58:03', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(255, 84, 17, 1, 'SOLIC', 'ACTIV', '2015-04-11 08:06:48', '2015-04-11 08:06:48', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(256, 85, 17, 1, 'TECNI', 'ACTIV', '2015-04-11 08:06:48', '2015-04-11 08:06:48', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(257, 86, 17, 2, 'TECNI', 'ACTIV', '2015-04-11 08:06:48', '2015-04-11 08:06:48', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(258, 88, 1, 1, 'TECNI', 'PROCE', '2015-04-11 10:46:09', '2015-04-11 10:46:09', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(259, 89, 2, 1, 'TECNI', 'PROCE', '2015-04-11 11:30:12', '2015-04-11 11:30:12', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(260, 90, 4, 1, 'TECNI', 'ACTIV', '2015-04-11 11:31:42', '2015-04-11 11:31:42', '2015-04-11 05:30:00', '2015-04-12 05:30:00', '24:00', 'TEST', 'DELETE', '2016-03-24 05:19:59', NULL),
(261, 91, 4, 2, 'TECNI', 'ACTIV', '2015-04-11 12:22:21', '2015-04-11 12:22:21', '2015-04-11 06:15:00', '2015-04-12 01:45:00', '19:30', NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(262, 92, 4, 1, 'CERRA', 'ACTIV', '2015-12-26 12:54:21', '2015-12-26 12:54:21', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(263, 93, 1, 1, 'CERRA', 'ACTIV', '2015-12-26 12:55:21', '2015-12-26 12:55:21', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(264, 94, 18, 1, 'SOLIC', 'ACTIV', '2016-01-18 09:40:21', '2016-01-18 09:40:21', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(265, 97, 4, 1, 'TECNI', 'PROCE', '2016-01-18 09:42:48', '2016-01-18 09:42:48', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(266, 96, 18, 2, 'TECNI', 'ACTIV', '2016-01-18 09:41:38', '2016-01-18 09:41:38', '2016-01-18 02:30:00', '2016-01-18 02:30:00', NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(267, 98, 16, 1, 'TECNI', 'PROCE', '2016-01-18 09:43:08', '2016-01-18 09:43:08', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(268, 99, 15, 1, 'TECNI', 'PROCE', '2016-01-18 09:43:12', '2016-01-18 09:43:12', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(269, 100, 14, 1, 'TECNI', 'PROCE', '2016-01-18 09:43:16', '2016-01-18 09:43:16', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(270, 176, 43, 1, 'CERRA', 'ACTIV', '2016-02-01 09:05:01', '2016-02-01 09:05:01', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(271, 102, 8, 1, 'TECNI', 'PROCE', '2016-01-18 09:43:27', '2016-01-18 09:43:27', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(272, 103, 10, 2, 'TECNI', 'PROCE', '2016-01-18 09:43:35', '2016-01-18 09:43:35', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(273, 104, 2, 1, 'CERRA', 'ACTIV', '2016-01-18 09:44:51', '2016-01-18 09:44:51', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(274, 105, 4, 1, 'CERRA', 'ACTIV', '2016-01-18 09:49:29', '2016-01-18 09:49:29', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(275, 106, 8, 1, 'CERRA', 'ACTIV', '2016-01-18 09:50:26', '2016-01-18 09:50:26', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(276, 107, 19, 1, 'SOLIC', 'ACTIV', '2016-01-19 01:35:41', '2016-01-19 01:35:41', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(277, 108, 19, NULL, 'TECNI', 'ACTIV', '2016-01-19 01:35:41', '2016-01-19 01:35:41', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(278, 109, 19, 1, 'TECNI', 'ACTIV', '2016-01-19 04:18:10', '2016-01-19 04:18:10', '2016-01-18 18:00:00', '2016-01-20 16:30:00', '46:30', 'generr contrato', 'DELETE', '2016-03-24 05:19:59', NULL),
(279, 111, 19, 1, 'CERRA', 'ACTIV', '2016-01-22 23:09:30', '2016-01-22 23:09:30', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(280, 112, 19, 1, 'TECNI', 'ACTIV', '2016-01-24 04:23:25', '2016-01-24 04:23:25', '2016-01-23 21:15:00', '2016-01-24 18:15:00', '21:00', 'test', 'DELETE', '2016-03-24 05:19:59', NULL),
(281, 113, 20, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:05:04', '2016-01-24 23:05:04', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(282, 114, 20, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:05:04', '2016-01-24 23:05:04', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(283, 115, 21, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:05:30', '2016-01-24 23:05:30', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(284, 116, 21, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:05:30', '2016-01-24 23:05:30', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(285, 117, 22, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:06:41', '2016-01-24 23:06:41', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(286, 118, 22, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:06:41', '2016-01-24 23:06:41', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(287, 119, 23, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:08:51', '2016-01-24 23:08:51', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(288, 120, 23, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:08:51', '2016-01-24 23:08:51', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(289, 121, 24, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:09:19', '2016-01-24 23:09:19', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(290, 122, 24, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:09:19', '2016-01-24 23:09:19', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(291, 123, 25, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:09:32', '2016-01-24 23:09:32', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(292, 124, 25, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:09:32', '2016-01-24 23:09:32', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(293, 125, 26, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:10:04', '2016-01-24 23:10:04', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(294, 126, 26, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:10:04', '2016-01-24 23:10:04', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(295, 127, 27, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:12:19', '2016-01-24 23:12:19', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(296, 128, 27, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:12:19', '2016-01-24 23:12:19', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(297, 129, 28, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:15:51', '2016-01-24 23:15:51', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(298, 130, 28, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:15:51', '2016-01-24 23:15:51', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(299, 131, 29, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:19:16', '2016-01-24 23:19:16', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(300, 132, 29, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:19:16', '2016-01-24 23:19:16', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(301, 133, 30, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:22:19', '2016-01-24 23:22:19', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(302, 134, 30, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:22:19', '2016-01-24 23:22:19', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(303, 135, 31, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:23:19', '2016-01-24 23:23:19', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(304, 136, 31, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:23:19', '2016-01-24 23:23:19', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(305, 137, 32, 1, 'SOLIC', 'ACTIV', '2016-01-24 23:36:21', '2016-01-24 23:36:21', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(306, 138, 32, NULL, 'TECNI', 'ACTIV', '2016-01-24 23:36:21', '2016-01-24 23:36:21', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(307, 139, 33, 1, 'SOLIC', 'ACTIV', '2016-01-25 07:21:38', '2016-01-25 07:21:38', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(308, 140, 33, NULL, 'TECNI', 'ACTIV', '2016-01-25 07:21:38', '2016-01-25 07:21:38', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(309, 141, 34, 1, 'SOLIC', 'ACTIV', '2016-01-25 07:24:24', '2016-01-25 07:24:24', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(310, 142, 34, 1, 'TECNI', 'ACTIV', '2016-01-25 07:24:24', '2016-01-25 07:24:24', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(311, 143, 35, 1, 'SOLIC', 'ACTIV', '2016-01-25 07:30:58', '2016-01-25 07:30:58', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(312, 144, 35, 1, 'TECNI', 'ACTIV', '2016-01-25 07:30:58', '2016-01-25 07:30:58', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(313, 145, 36, 1, 'SOLIC', 'ACTIV', '2016-01-25 07:33:23', '2016-01-25 07:33:23', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(314, 146, 36, 1, 'TECNI', 'ACTIV', '2016-01-25 07:33:23', '2016-01-25 07:33:23', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(315, 147, 37, 1, 'SOLIC', 'ACTIV', '2016-01-25 07:38:00', '2016-01-25 07:38:00', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(316, 148, 37, 1, 'TECNI', 'ACTIV', '2016-01-25 07:38:00', '2016-01-25 07:38:00', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(317, 149, 38, 1, 'SOLIC', 'ACTIV', '2016-01-25 08:41:16', '2016-01-25 08:41:16', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(318, 150, 38, 1, 'TECNI', 'ACTIV', '2016-01-25 08:41:16', '2016-01-25 08:41:16', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(319, 151, 39, 1, 'SOLIC', 'ACTIV', '2016-01-25 09:37:08', '2016-01-25 09:37:08', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(320, 152, 39, 1, 'TECNI', 'ACTIV', '2016-01-25 09:37:08', '2016-01-25 09:37:08', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(321, 153, 40, 1, 'SOLIC', 'ACTIV', '2016-01-25 09:39:00', '2016-01-25 09:39:00', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(322, 154, 40, 1, 'TECNI', 'ACTIV', '2016-01-25 09:39:00', '2016-01-25 09:39:00', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(323, 155, 41, 1, 'SOLIC', 'ACTIV', '2016-01-25 09:42:26', '2016-01-25 09:42:26', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(324, 156, 41, 1, 'TECNI', 'ACTIV', '2016-01-25 09:42:26', '2016-01-25 09:42:26', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(325, 157, 11, 1, 'TECNI', 'PROCE', '2016-01-25 10:11:42', '2016-01-25 10:11:42', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(326, 158, 12, 1, 'TECNI', 'PROCE', '2016-01-25 10:11:47', '2016-01-25 10:11:47', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(327, 159, 13, 1, 'TECNI', 'PROCE', '2016-01-25 10:11:53', '2016-01-25 10:11:53', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(328, 160, 42, 1, 'SOLIC', 'ACTIV', '2016-01-26 21:59:39', '2016-01-26 21:59:39', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(329, 161, 42, 1, 'TECNI', 'ACTIV', '2016-01-26 21:59:39', '2016-01-26 21:59:39', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL);
INSERT INTO `tb_log_pedido_usuarios` (`ID_LOG_PEDIDO_USUARIOS`, `ID_PEDIDO_USUARIOS`, `ID_PETICION`, `ID_USUARIOS`, `TIPO`, `ESTADO`, `FECHA_INSERT`, `FECHA_UPDATE`, `FECHA_INI`, `FECHA_FIN`, `TOTAL`, `DESCRIPCION`, `ACCION`, `FECHA_INSERT_LOG`, `SEGUIMIENTO`) VALUES
(330, 162, 42, 1, 'TECNI', 'ACTIV', '2016-01-26 22:01:24', '2016-01-26 22:01:24', '2016-01-26 15:00:00', '2016-01-26 16:00:00', '01:00', 'Aseo y mantenimiento de las Oficinas ', 'DELETE', '2016-03-24 05:19:59', NULL),
(331, 163, 43, 1, 'SOLIC', 'ACTIV', '2016-01-27 23:40:38', '2016-01-27 23:40:38', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(332, 164, 43, 5, 'TECNI', 'ACTIV', '2016-01-27 23:40:38', '2016-01-27 23:40:38', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(333, 165, 43, 6, 'TECNI', 'ACTIV', '2016-01-27 23:45:06', '2016-01-27 23:45:06', '2016-01-30 10:00:00', '2016-01-30 15:00:00', '05:00', 'Coordinar colocacion de banner, y lonas publicidades con persona encargada de la junta.', 'DELETE', '2016-03-24 05:19:59', NULL),
(334, 166, 43, 5, 'TECNI', 'ACTIV', '2016-01-27 23:48:26', '2016-01-27 23:48:26', '2016-01-25 08:00:00', '2016-01-28 12:00:00', '76:00', 'Autorizacion por parte de presidente', 'DELETE', '2016-03-24 05:19:59', NULL),
(335, 167, 43, 10, 'TECNI', 'ACTIV', '2016-01-28 00:03:38', '2016-01-28 00:03:38', '2016-01-25 08:00:00', '2016-01-27 17:00:00', '57:00', 'Evaluar y autorizacion de oficios , pendientes', 'DELETE', '2016-03-24 05:19:59', NULL),
(336, 168, 43, 5, 'TECNI', 'ACTIV', '2016-01-28 00:16:10', '2016-01-28 00:16:10', '2016-01-27 17:15:00', '2016-01-27 17:45:00', '00:30', 'Envio de solicitud', 'DELETE', '2016-03-24 05:19:59', NULL),
(337, 169, 44, 1, 'SOLIC', 'ACTIV', '2016-01-30 03:44:04', '2016-01-30 03:44:04', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(338, 170, 44, NULL, 'TECNI', 'ACTIV', '2016-01-30 03:44:04', '2016-01-30 03:44:04', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(339, 171, 45, 1, 'SOLIC', 'ACTIV', '2016-01-30 03:52:33', '2016-01-30 03:52:33', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(340, 172, 45, NULL, 'TECNI', 'ACTIV', '2016-01-30 03:52:33', '2016-01-30 03:52:33', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(341, 173, 45, 5, 'TECNI', 'ACTIV', '2016-01-30 03:54:21', '2016-01-30 03:54:21', '2016-01-29 20:45:00', '2016-02-01 20:45:00', '72:00', 'Convocatorias y confirmacion de asistencia', 'DELETE', '2016-03-24 05:19:59', NULL),
(342, 174, 45, 5, 'TECNI', 'ACTIV', '2016-01-30 03:56:06', '2016-01-30 03:56:06', '2016-02-01 12:15:00', '2016-02-01 20:45:00', '08:30', 'Se envia reporte de asistentes confirmados via telefonicamente', 'DELETE', '2016-03-24 05:19:59', NULL),
(343, 177, 46, 1, 'SOLIC', 'ACTIV', '2016-02-09 10:18:07', '2016-02-09 10:18:07', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(344, 178, 46, NULL, 'TECNI', 'ACTIV', '2016-02-09 10:18:07', '2016-02-09 10:18:07', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(345, 179, 46, 1, 'TECNI', 'ACTIV', '2016-02-09 10:19:46', '2016-02-09 10:19:46', '2016-02-09 02:15:00', '2016-02-10 02:15:00', '24:00', 'test', 'DELETE', '2016-03-24 05:19:59', NULL),
(346, 181, 46, 1, 'CERRA', 'ACTIV', '2016-02-09 10:20:31', '2016-02-09 10:20:31', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(347, 182, 46, 1, 'CERRA', 'ACTIV', '2016-02-09 10:21:21', '2016-02-09 10:21:21', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(348, 183, 47, 12, 'SOLIC', 'ACTIV', '2016-02-09 10:25:59', '2016-02-09 10:25:59', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(349, 184, 47, 12, 'TECNI', 'ACTIV', '2016-02-09 10:25:59', '2016-02-09 10:25:59', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(350, 185, 47, 12, 'CERRA', 'ACTIV', '2016-02-09 10:25:59', '2016-02-09 10:25:59', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(351, 186, 46, 1, 'TECNI', 'PROCE', '2016-02-09 10:26:59', '2016-02-09 10:26:59', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(352, 187, 48, 5, 'SOLIC', 'ACTIV', '2016-02-19 21:47:11', '2016-02-19 21:47:11', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(353, 188, 48, 3, 'TECNI', 'ACTIV', '2016-02-19 21:47:11', '2016-02-19 21:47:11', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(354, 189, 49, 1, 'SOLIC', 'ACTIV', '2016-02-19 22:14:55', '2016-02-19 22:14:55', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(355, 190, 49, 5, 'TECNI', 'ACTIV', '2016-02-19 22:14:55', '2016-02-19 22:14:55', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(356, 191, 50, 1, 'SOLIC', 'ACTIV', '2016-02-19 22:33:40', '2016-02-19 22:33:40', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(357, 192, 50, 5, 'TECNI', 'ACTIV', '2016-02-19 22:33:40', '2016-02-19 22:33:40', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(358, 193, 51, 1, 'SOLIC', 'ACTIV', '2016-02-19 22:34:12', '2016-02-19 22:34:12', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(359, 194, 51, 9, 'TECNI', 'ACTIV', '2016-02-19 22:34:12', '2016-02-19 22:34:12', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(360, 195, 52, 1, 'SOLIC', 'ACTIV', '2016-02-19 22:42:30', '2016-02-19 22:42:30', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(361, 196, 52, 9, 'TECNI', 'ACTIV', '2016-02-19 22:42:30', '2016-02-19 22:42:30', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(362, 197, 53, 1, 'SOLIC', 'ACTIV', '2016-02-19 22:42:42', '2016-02-19 22:42:42', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(363, 198, 53, 9, 'TECNI', 'ACTIV', '2016-02-19 22:42:42', '2016-02-19 22:42:42', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(364, 199, 54, 1, 'SOLIC', 'ACTIV', '2016-02-19 22:44:37', '2016-02-19 22:44:37', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(365, 200, 54, 9, 'TECNI', 'ACTIV', '2016-02-19 22:44:37', '2016-02-19 22:44:37', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(366, 201, 55, 1, 'SOLIC', 'ACTIV', '2016-02-19 22:52:06', '2016-02-19 22:52:06', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(367, 202, 55, 9, 'TECNI', 'ACTIV', '2016-02-19 22:52:06', '2016-02-19 22:52:06', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(368, 203, 56, 5, 'SOLIC', 'ACTIV', '2016-02-19 23:07:14', '2016-02-19 23:07:14', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(369, 204, 56, 9, 'TECNI', 'ACTIV', '2016-02-19 23:07:14', '2016-02-19 23:07:14', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(370, 205, 57, 5, 'SOLIC', 'ACTIV', '2016-02-19 23:07:26', '2016-02-19 23:07:26', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(371, 206, 57, 9, 'TECNI', 'ACTIV', '2016-02-19 23:07:26', '2016-02-19 23:07:26', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(372, 207, 58, 1, 'SOLIC', 'ACTIV', '2016-02-20 00:39:23', '2016-02-20 00:39:23', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(373, 208, 58, 9, 'TECNI', 'ACTIV', '2016-02-20 00:39:23', '2016-02-20 00:39:23', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(374, 209, 58, 1, 'CERRA', 'ACTIV', '2016-02-20 00:41:17', '2016-02-20 00:41:17', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(375, 210, 59, 5, 'SOLIC', 'ACTIV', '2016-02-20 00:43:16', '2016-02-20 00:43:16', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(376, 211, 59, 3, 'TECNI', 'ACTIV', '2016-02-20 00:43:16', '2016-02-20 00:43:16', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(377, 213, 60, 1, 'SOLIC', 'ACTIV', '2016-02-20 12:16:39', '2016-02-20 12:16:39', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(378, 214, 60, 5, 'TECNI', 'ACTIV', '2016-02-20 12:16:39', '2016-02-20 12:16:39', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(379, 215, 60, 1, 'TECNI', 'ACTIV', '2016-02-20 12:19:15', '2016-02-20 12:19:15', '2016-02-26 06:45:00', '2016-02-27 04:15:00', '21:30', 'DespuÃ©s ', 'DELETE', '2016-03-24 05:19:59', NULL),
(380, 216, 60, 1, 'CERRA', 'ACTIV', '2016-02-21 07:20:58', '2016-02-21 07:20:58', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(381, 217, 61, 5, 'SOLIC', 'ACTIV', '2016-02-24 02:58:02', '2016-02-24 02:58:02', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(382, 218, 61, 7, 'TECNI', 'ACTIV', '2016-02-24 02:58:02', '2016-02-24 02:58:02', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(383, 221, 18, 1, 'CERRA', 'ACTIV', '2016-02-25 04:36:09', '2016-02-25 04:36:09', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(384, 222, 46, 1, 'CERRA', 'ACTIV', '2016-02-25 04:36:37', '2016-02-25 04:36:37', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(385, 223, 19, 1, 'CERRA', 'ACTIV', '2016-02-25 04:38:16', '2016-02-25 04:38:16', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(386, 224, 24, 1, 'CERRA', 'ACTIV', '2016-02-25 04:38:45', '2016-02-25 04:38:45', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(387, 225, 25, 1, 'CERRA', 'ACTIV', '2016-02-25 04:39:19', '2016-02-25 04:39:19', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(388, 226, 26, 1, 'CERRA', 'ACTIV', '2016-02-25 04:39:49', '2016-02-25 04:39:49', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(389, 227, 44, 1, 'CERRA', 'ACTIV', '2016-02-25 04:40:30', '2016-02-25 04:40:30', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(390, 228, 45, 1, 'CERRA', 'ACTIV', '2016-02-25 04:41:00', '2016-02-25 04:41:00', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(391, 231, 62, 1, 'SOLIC', 'ACTIV', '2016-03-03 06:33:03', '2016-03-03 06:33:03', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(392, 232, 62, NULL, 'TECNI', 'ACTIV', '2016-03-03 06:33:03', '2016-03-03 06:33:03', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(393, 233, 62, 1, 'CERRA', 'ACTIV', '2016-03-03 06:37:28', '2016-03-03 06:37:28', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(394, 235, 63, 1, 'SOLIC', 'ACTIV', '2016-03-03 06:45:11', '2016-03-03 06:45:11', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(395, 236, 63, 5, 'TECNI', 'ACTIV', '2016-03-03 06:45:11', '2016-03-03 06:45:11', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(396, 237, 64, 1, 'SOLIC', 'ACTIV', '2016-03-08 22:35:17', '2016-03-08 22:35:17', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(397, 238, 64, NULL, 'TECNI', 'ACTIV', '2016-03-08 22:35:17', '2016-03-08 22:35:17', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(398, 247, 66, 3, 'SOLIC', 'ACTIV', '2016-03-22 21:17:05', '2016-03-22 21:17:05', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(399, 241, 65, 1, 'SOLIC', 'ACTIV', '2016-03-22 04:31:09', '2016-03-22 04:31:09', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(400, 246, 65, 1, 'CERRA', 'ACTIV', '2016-03-22 04:49:52', '2016-03-22 04:49:52', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(401, 245, 65, 8, 'TECNI', 'ACTIV', '2016-03-22 04:46:39', '2016-03-22 04:46:39', '2016-03-22 08:00:00', '2016-03-22 18:00:00', '10:00', 'Visita de campo a puellaro', 'DELETE', '2016-03-24 05:19:59', NULL),
(402, 248, 66, 3, 'TECNI', 'ACTIV', '2016-03-22 21:17:05', '2016-03-22 21:17:05', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(403, 249, 67, 3, 'SOLIC', 'ACTIV', '2016-03-22 21:35:07', '2016-03-22 21:35:07', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(404, 250, 67, 3, 'TECNI', 'ACTIV', '2016-03-22 21:35:07', '2016-03-22 21:35:07', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(405, 256, 68, 1, 'CERRA', 'ACTIV', '2016-03-22 23:26:33', '2016-03-22 23:26:33', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(406, 253, 68, 1, 'SOLIC', 'ACTIV', '2016-03-22 22:12:28', '2016-03-22 22:12:28', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(407, 254, 68, 3, 'TECNI', 'ACTIV', '2016-03-22 22:12:28', '2016-03-22 22:12:28', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:19:59', NULL),
(408, 261, 69, 3, 'TECNI', 'PROCE', '2016-03-23 14:00:00', '2016-03-23 14:00:00', NULL, NULL, NULL, NULL, 'UPDATE', '2016-03-24 05:22:47', NULL),
(409, 0, 70, 1, 'SOLIC', 'ACTIV', '2016-03-24 05:32:38', '2016-03-24 05:32:38', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-24 05:32:38', NULL),
(410, 0, 70, 2, 'TECNI', 'ACTIV', '2016-03-24 05:32:38', '2016-03-24 05:32:38', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 21:32:02', NULL),
(411, 0, 70, 3, 'TECNI', 'PROCE', '2016-03-24 05:36:56', '2016-03-24 05:36:56', NULL, NULL, NULL, NULL, 'INSERT', '2016-03-24 05:36:56', NULL),
(412, 264, 70, 3, 'TECNI', 'PROCE', '2016-03-24 05:36:56', '2016-03-24 05:36:56', NULL, NULL, NULL, NULL, 'DELETE', '2016-03-24 05:37:31', NULL),
(413, 0, 70, 3, 'TECNI', 'ACTIV', '2016-03-24 05:38:33', '2016-03-24 05:38:33', '2016-03-23 21:30:00', '2016-03-23 21:45:00', '00:15', 'DueÃ±a del proceso', 'INSERT', '2016-03-24 05:38:33', NULL),
(414, 0, 71, 5, 'SOLIC', 'ACTIV', '2016-04-21 03:47:21', '2016-04-21 03:47:21', NULL, NULL, NULL, NULL, 'INSERT', '2016-04-21 03:47:21', NULL),
(415, 0, 71, 3, 'TECNI', 'ACTIV', '2016-04-21 03:47:21', '2016-04-21 03:47:21', NULL, NULL, NULL, NULL, 'INSERT', '2016-04-21 03:47:21', NULL),
(416, 0, 72, 5, 'SOLIC', 'ACTIV', '2016-05-12 00:21:27', '2016-05-12 00:21:27', NULL, NULL, NULL, NULL, 'INSERT', '2016-05-12 00:21:27', NULL),
(417, 0, 72, 3, 'TECNI', 'ACTIV', '2016-05-12 00:21:27', '2016-05-12 00:21:27', NULL, NULL, NULL, NULL, 'INSERT', '2016-05-12 00:21:27', NULL),
(418, 0, 73, 1, 'SOLIC', 'ACTIV', '2017-03-28 21:48:57', '2017-03-28 21:48:57', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-28 21:48:57', NULL),
(419, 0, 73, 9, 'TECNI', 'ACTIV', '2017-03-28 21:48:57', '2017-03-28 21:48:57', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-28 21:48:57', NULL),
(420, 0, 73, 4, 'TECNI', 'ACTIV', '2017-03-28 21:48:57', '2017-03-28 21:48:57', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-28 21:48:57', NULL),
(421, 0, 73, 6, 'TECNI', 'ACTIV', '2017-03-28 21:48:57', '2017-03-28 21:48:57', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-28 21:48:57', NULL),
(422, 0, 74, 1, 'SOLIC', 'ACTIV', '2017-03-28 21:55:23', '2017-03-28 21:55:23', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-28 21:55:23', NULL),
(423, 0, 74, 3, 'TECNI', 'ACTIV', '2017-03-28 21:55:23', '2017-03-28 21:55:23', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-28 21:55:23', NULL),
(424, 0, 75, 1, 'SOLIC', 'ACTIV', '2017-03-29 13:15:10', '2017-03-29 13:15:10', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-29 13:15:10', NULL),
(425, 0, 75, 5, 'TECNI', 'ACTIV', '2017-03-29 13:15:10', '2017-03-29 13:15:10', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-29 13:15:10', NULL),
(426, 0, 76, 1, 'SOLIC', 'ACTIV', '2017-03-29 13:20:28', '2017-03-29 13:20:28', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-29 13:20:28', NULL),
(427, 0, 76, 3, 'TECNI', 'ACTIV', '2017-03-29 13:20:28', '2017-03-29 13:20:28', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-29 13:20:28', NULL),
(428, 0, 77, 1, 'SOLIC', 'ACTIV', '2017-03-29 15:46:50', '2017-03-29 15:46:50', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-29 15:46:50', NULL),
(429, 0, 77, 7, 'TECNI', 'ACTIV', '2017-03-29 15:46:50', '2017-03-29 15:46:50', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-29 15:46:50', NULL),
(430, 0, 78, 1, 'SOLIC', 'ACTIV', '2017-03-29 15:50:48', '2017-03-29 15:50:48', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-29 15:50:48', NULL),
(431, 0, 78, 5, 'TECNI', 'ACTIV', '2017-03-29 15:50:48', '2017-03-29 15:50:48', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-29 15:50:48', NULL),
(432, 0, 79, 1, 'SOLIC', 'ACTIV', '2017-03-31 04:03:26', '2017-03-31 04:03:26', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-31 04:03:26', NULL),
(433, 0, 79, 9, 'TECNI', 'ACTIV', '2017-03-31 04:03:26', '2017-03-31 04:03:26', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-31 04:03:26', NULL),
(434, 0, 79, 4, 'TECNI', 'ACTIV', '2017-03-31 04:03:26', '2017-03-31 04:03:26', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-31 04:03:26', NULL),
(435, 0, 79, 6, 'TECNI', 'ACTIV', '2017-03-31 04:03:26', '2017-03-31 04:03:26', NULL, NULL, NULL, NULL, 'INSERT', '2017-03-31 04:03:26', NULL),
(436, 0, 76, 3, 'TECNI', 'ACTIV', '2017-03-31 05:19:46', '2017-03-31 05:19:46', '2017-03-31 06:15:00', '2017-03-31 08:15:00', '02:00', 'llamada telefÃ³nica para documentar req ', 'INSERT', '2017-03-31 05:19:46', NULL),
(437, 0, 76, 3, 'TECNI', 'ACTIV', '2017-03-31 05:38:42', '2017-03-31 05:38:42', '2017-04-07 06:30:00', '2017-04-14 06:30:00', '168:00', 'autorizaciÃ³n ', 'INSERT', '2017-03-31 05:38:42', NULL),
(438, 0, 75, 7, 'TECNI', 'ACTIV', '2017-04-01 01:50:07', '2017-04-01 01:50:07', '2017-04-01 02:45:00', '2017-04-01 03:15:00', '00:30', 'Actividad 1', 'INSERT', '2017-04-01 01:50:07', NULL),
(439, 0, 75, 7, 'TECNI', 'ACTIV', '2017-04-01 01:50:27', '2017-04-01 01:50:27', '2017-04-03 02:45:00', '2017-04-03 03:15:00', '00:30', 'Actividad 2', 'INSERT', '2017-04-01 01:50:27', NULL),
(440, 277, 75, 5, 'TECNI', 'ACTIV', '2017-03-29 13:15:10', '2017-03-29 13:15:10', NULL, NULL, NULL, NULL, 'DELETE', '2017-04-01 01:50:49', NULL),
(441, 0, 75, 5, 'CERRA', 'ACTIV', '2017-04-01 01:51:25', '2017-04-01 01:51:25', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-01 01:51:25', NULL),
(442, 0, 76, 3, 'TECNI', 'ACTIV', '2017-04-01 02:28:46', '2017-04-01 02:28:46', '2017-04-01 03:15:00', '2017-04-01 04:00:00', '00:45', 'verificado de autorizacion', 'INSERT', '2017-04-01 02:28:46', NULL),
(443, 0, 76, 3, 'TECNI', 'ACTIV', '2017-04-01 03:38:03', '2017-04-01 03:38:03', '2017-04-03 04:30:00', '2017-04-03 04:45:00', '00:15', 'envio de informacion', 'INSERT', '2017-04-01 03:38:03', NULL),
(444, 0, 76, 3, 'CERRA', 'ACTIV', '2017-04-01 03:38:33', '2017-04-01 03:38:33', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-01 03:38:33', NULL),
(445, 0, 80, 5, 'SOLIC', 'ACTIV', '2017-04-01 03:53:29', '2017-04-01 03:53:29', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-01 03:53:29', NULL),
(446, 0, 80, 3, 'TECNI', 'ACTIV', '2017-04-01 03:53:29', '2017-04-01 03:53:29', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-01 03:53:29', NULL),
(447, 0, 81, 1, 'SOLIC', 'ACTIV', '2017-04-09 02:49:31', '2017-04-09 02:49:31', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 02:49:31', NULL),
(448, 0, 81, 3, 'TECNI', 'ACTIV', '2017-04-09 02:49:31', '2017-04-09 02:49:31', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 02:49:31', NULL),
(449, 0, 81, 10, 'TECNI', 'ACTIV', '2017-04-09 02:55:10', '2017-04-09 02:55:10', '2017-04-10 03:00:00', '2017-04-11 03:45:00', '24:45', 'Revicion', 'INSERT', '2017-04-09 02:55:10', NULL),
(450, 299, 81, 3, 'TECNI', 'ACTIV', '2017-04-09 02:49:31', '2017-04-09 02:49:31', NULL, NULL, NULL, NULL, 'DELETE', '2017-04-09 02:55:13', NULL),
(451, 0, 82, 5, 'SOLIC', 'ACTIV', '2017-04-09 03:05:10', '2017-04-09 03:05:10', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 03:05:10', NULL),
(452, 0, 82, 3, 'TECNI', 'ACTIV', '2017-04-09 03:05:10', '2017-04-09 03:05:10', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 03:05:10', NULL),
(453, 0, 81, 3, 'TECNI', 'PROCE', '2017-04-09 03:06:36', '2017-04-09 03:06:36', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 03:06:36', NULL),
(454, 0, 77, 3, 'TECNI', 'PROCE', '2017-04-09 03:07:05', '2017-04-09 03:07:05', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 03:07:05', NULL),
(455, 303, 81, 3, 'TECNI', 'PROCE', '2017-04-09 03:06:36', '2017-04-09 03:06:36', NULL, NULL, NULL, NULL, 'DELETE', '2017-04-09 03:07:15', NULL),
(456, 304, 77, 3, 'TECNI', 'PROCE', '2017-04-09 03:07:05', '2017-04-09 03:07:05', NULL, NULL, NULL, NULL, 'DELETE', '2017-04-09 03:07:19', NULL),
(457, 0, 81, 3, 'TECNI', 'PROCE', '2017-04-09 03:07:44', '2017-04-09 03:07:44', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 03:07:44', NULL),
(458, 0, 74, 3, 'TECNI', 'PROCE', '2017-04-09 03:08:52', '2017-04-09 03:08:52', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 03:08:52', NULL),
(459, 0, 82, 5, 'TECNI', 'ACTIV', '2017-04-09 03:15:02', '2017-04-09 03:15:02', '2017-04-09 04:00:00', '2017-04-09 04:15:00', '00:15', 'recepct', 'INSERT', '2017-04-09 03:15:02', NULL),
(460, 0, 83, 5, 'SOLIC', 'ACTIV', '2017-04-09 19:29:06', '2017-04-09 19:29:06', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 19:29:06', NULL),
(461, 0, 83, 3, 'TECNI', 'ACTIV', '2017-04-09 19:29:06', '2017-04-09 19:29:06', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 19:29:06', NULL),
(462, 0, 84, 3, 'SOLIC', 'ACTIV', '2017-04-09 20:06:33', '2017-04-09 20:06:33', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 20:06:33', NULL),
(463, 0, 84, 3, 'TECNI', 'ACTIV', '2017-04-09 20:06:33', '2017-04-09 20:06:33', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 20:06:33', NULL),
(464, 0, 82, 3, 'TECNI', 'PROCE', '2017-04-09 20:10:49', '2017-04-09 20:10:49', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 20:10:49', NULL),
(465, 0, 70, 3, 'CERRA', 'ACTIV', '2017-04-09 20:12:29', '2017-04-09 20:12:29', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 20:12:29', NULL),
(466, 0, 70, 3, 'CERRA', 'ACTIV', '2017-04-09 20:15:31', '2017-04-09 20:15:31', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 20:15:31', NULL),
(467, 0, 85, 3, 'SOLIC', 'ACTIV', '2017-04-09 21:36:59', '2017-04-09 21:36:59', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 21:36:59', NULL),
(468, 0, 85, 3, 'TECNI', 'ACTIV', '2017-04-09 21:36:59', '2017-04-09 21:36:59', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 21:36:59', NULL),
(469, 0, 86, 3, 'SOLIC', 'ACTIV', '2017-04-09 21:38:42', '2017-04-09 21:38:42', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 21:38:42', NULL),
(470, 0, 86, 3, 'TECNI', 'ACTIV', '2017-04-09 21:38:42', '2017-04-09 21:38:42', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 21:38:42', NULL),
(471, 0, 87, 3, 'SOLIC', 'ACTIV', '2017-04-09 21:41:26', '2017-04-09 21:41:26', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 21:41:26', NULL),
(472, 0, 87, 3, 'TECNI', 'ACTIV', '2017-04-09 21:41:26', '2017-04-09 21:41:26', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 21:41:26', NULL),
(473, 0, 88, 3, 'SOLIC', 'ACTIV', '2017-04-09 21:42:36', '2017-04-09 21:42:36', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 21:42:36', NULL),
(474, 0, 88, 3, 'TECNI', 'ACTIV', '2017-04-09 21:42:36', '2017-04-09 21:42:36', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 21:42:36', NULL),
(475, 0, 89, 3, 'SOLIC', 'ACTIV', '2017-04-09 21:44:01', '2017-04-09 21:44:01', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 21:44:01', NULL),
(476, 0, 89, 3, 'TECNI', 'ACTIV', '2017-04-09 21:44:01', '2017-04-09 21:44:01', NULL, NULL, NULL, NULL, 'INSERT', '2017-04-09 21:44:01', NULL),
(477, 0, 90, 1, 'SOLIC', 'ACTIV', '2017-07-07 12:36:56', '2017-07-07 12:36:56', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-07 12:36:56', NULL),
(478, 0, 90, 5, 'TECNI', 'ACTIV', '2017-07-07 12:36:56', '2017-07-07 12:36:56', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-07 12:36:56', NULL),
(479, 0, 71, 1, 'TECNI', 'PROCE', '2017-07-08 01:33:53', '2017-07-08 01:33:53', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-08 01:33:53', NULL),
(480, 0, 91, 3, 'SOLIC', 'ACTIV', '2017-07-08 15:18:24', '2017-07-08 15:18:24', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-08 15:18:24', NULL),
(481, 0, 91, 3, 'TECNI', 'ACTIV', '2017-07-08 15:18:24', '2017-07-08 15:18:24', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-08 15:18:24', NULL),
(482, 0, 92, 3, 'SOLIC', 'ACTIV', '2017-07-08 15:44:55', '2017-07-08 15:44:55', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-08 15:44:55', NULL),
(483, 0, 92, 3, 'TECNI', 'ACTIV', '2017-07-08 15:44:55', '2017-07-08 15:44:55', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-08 15:44:55', NULL),
(484, 0, 92, 7, 'TECNI', 'ACTIV', '2017-07-08 15:46:45', '2017-07-08 15:46:45', '2017-07-08 08:00:00', '2017-07-08 16:45:00', '08:45', 'acesoria de normas tributarias ', 'INSERT', '2017-07-08 15:46:45', NULL),
(485, 331, 92, 3, 'TECNI', 'ACTIV', '2017-07-08 15:44:55', '2017-07-08 15:44:55', NULL, NULL, NULL, NULL, 'DELETE', '2017-07-08 15:47:02', NULL),
(486, 0, 93, 3, 'SOLIC', 'ACTIV', '2017-07-09 01:40:07', '2017-07-09 01:40:07', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-09 01:40:07', NULL),
(487, 0, 93, 3, 'TECNI', 'ACTIV', '2017-07-09 01:40:07', '2017-07-09 01:40:07', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-09 01:40:07', NULL),
(488, 0, 93, 3, 'CERRA', 'ACTIV', '2017-07-09 01:41:29', '2017-07-09 01:41:29', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-09 01:41:29', NULL),
(489, 0, 93, 3, 'CERRA', 'ACTIV', '2017-07-09 01:42:13', '2017-07-09 01:42:13', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-09 01:42:13', NULL),
(490, 0, 93, 3, 'CERRA', 'ACTIV', '2017-07-09 01:42:56', '2017-07-09 01:42:56', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-09 01:42:56', NULL),
(491, 0, 93, 3, 'CERRA', 'ACTIV', '2017-07-09 01:46:33', '2017-07-09 01:46:33', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-09 01:46:33', NULL),
(492, 0, 94, 3, 'SOLIC', 'ACTIV', '2017-07-09 02:11:43', '2017-07-09 02:11:43', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-09 02:11:43', NULL),
(493, 0, 94, 3, 'TECNI', 'ACTIV', '2017-07-09 02:11:43', '2017-07-09 02:11:43', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-09 02:11:43', NULL),
(494, 0, 94, 6, 'TECNI', 'ACTIV', '2017-07-09 02:14:26', '2017-07-09 02:14:26', '2017-07-09 03:00:00', '2017-07-09 04:30:00', '01:30', 'llama telefonica', 'INSERT', '2017-07-09 02:14:26', NULL),
(495, 340, 94, 3, 'TECNI', 'ACTIV', '2017-07-09 02:11:43', '2017-07-09 02:11:43', NULL, NULL, NULL, NULL, 'DELETE', '2017-07-09 02:14:37', NULL),
(496, 0, 78, 3, 'TECNI', 'PROCE', '2017-07-09 02:15:26', '2017-07-09 02:15:26', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-09 02:15:26', NULL),
(497, 0, 95, 3, 'SOLIC', 'ACTIV', '2017-07-09 14:05:17', '2017-07-09 14:05:17', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-09 14:05:17', NULL),
(498, 0, 95, 3, 'TECNI', 'ACTIV', '2017-07-09 14:05:17', '2017-07-09 14:05:17', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-09 14:05:17', NULL),
(499, 0, 95, 5, 'TECNI', 'ACTIV', '2017-07-09 14:09:03', '2017-07-09 14:09:03', '2017-07-09 10:45:00', '2017-07-09 15:00:00', '04:15', 'DESCRIP', 'INSERT', '2017-07-09 14:09:03', NULL),
(500, 344, 95, 3, 'TECNI', 'ACTIV', '2017-07-09 14:05:17', '2017-07-09 14:05:17', NULL, NULL, NULL, NULL, 'DELETE', '2017-07-09 14:09:17', NULL),
(501, 0, 96, 3, 'SOLIC', 'ACTIV', '2017-07-09 16:36:17', '2017-07-09 16:36:17', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-09 16:36:17', NULL),
(502, 0, 96, 3, 'TECNI', 'ACTIV', '2017-07-09 16:36:17', '2017-07-09 16:36:17', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-09 16:36:17', NULL),
(503, 0, 96, 7, 'TECNI', 'ACTIV', '2017-07-09 16:38:49', '2017-07-09 16:38:49', '2017-07-09 12:45:00', '2017-07-09 17:15:00', '04:30', 'ASDASDA', 'INSERT', '2017-07-09 16:38:49', NULL),
(504, 348, 96, 7, 'TECNI', 'ACTIV', '2017-07-09 16:38:49', '2017-07-09 16:38:49', '2017-07-09 12:45:00', '2017-07-09 17:15:00', '04:30', 'ASDASDA', 'DELETE', '2017-07-09 16:39:02', NULL),
(505, 0, 97, 3, 'SOLIC', 'ACTIV', '2017-07-09 23:01:27', '2017-07-09 23:01:27', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-09 23:01:27', NULL),
(506, 0, 97, 3, 'TECNI', 'ACTIV', '2017-07-09 23:01:27', '2017-07-09 23:01:27', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-09 23:01:27', NULL),
(507, 0, 97, 3, 'TECNI', 'ACTIV', '2017-07-09 23:03:40', '2017-07-09 23:03:40', '2017-07-10 09:15:00', '2017-07-10 17:30:00', '08:15', 'consulta', 'INSERT', '2017-07-09 23:03:40', NULL),
(508, 350, 97, 3, 'TECNI', 'ACTIV', '2017-07-09 23:01:27', '2017-07-09 23:01:27', NULL, NULL, NULL, NULL, 'DELETE', '2017-07-09 23:03:49', NULL),
(509, 0, 91, 3, 'CERRA', 'ACTIV', '2017-07-09 23:46:55', '2017-07-09 23:46:55', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-09 23:46:55', NULL),
(510, 0, 92, 3, 'TECNI', 'PROCE', '2017-07-09 23:47:20', '2017-07-09 23:47:20', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-09 23:47:20', NULL),
(511, 0, 98, 3, 'SOLIC', 'ACTIV', '2017-07-10 13:09:55', '2017-07-10 13:09:55', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-10 13:09:55', NULL),
(512, 0, 98, 3, 'TECNI', 'ACTIV', '2017-07-10 13:09:55', '2017-07-10 13:09:55', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-10 13:09:55', NULL),
(513, 0, 98, 9, 'TECNI', 'ACTIV', '2017-07-10 13:12:22', '2017-07-10 13:12:22', '2017-07-10 09:30:00', '2017-07-10 14:00:00', '04:30', 'dest', 'INSERT', '2017-07-10 13:12:22', NULL),
(514, 355, 98, 3, 'TECNI', 'ACTIV', '2017-07-10 13:09:55', '2017-07-10 13:09:55', NULL, NULL, NULL, NULL, 'DELETE', '2017-07-10 13:12:33', NULL),
(515, 0, 72, 3, 'TECNI', 'PROCE', '2017-07-10 13:13:25', '2017-07-10 13:13:25', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-10 13:13:25', NULL),
(516, 0, 99, NULL, 'SOLIC', 'ACTIV', '2017-07-10 13:19:25', '2017-07-10 13:19:25', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-10 13:19:25', NULL),
(517, 0, 99, 3, 'TECNI', 'ACTIV', '2017-07-10 13:19:25', '2017-07-10 13:19:25', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-10 13:19:25', NULL),
(518, 0, 100, 3, 'SOLIC', 'ACTIV', '2017-07-10 14:04:50', '2017-07-10 14:04:50', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-10 14:04:50', NULL),
(519, 0, 100, 3, 'TECNI', 'ACTIV', '2017-07-10 14:04:50', '2017-07-10 14:04:50', NULL, NULL, NULL, NULL, 'INSERT', '2017-07-10 14:04:50', NULL),
(520, 0, 100, 6, 'TECNI', 'ACTIV', '2017-07-10 14:07:24', '2017-07-10 14:07:24', '2017-07-10 10:45:00', '2017-07-10 15:00:00', '04:15', 'analisis', 'INSERT', '2017-07-10 14:07:24', NULL),
(521, 361, 100, 3, 'TECNI', 'ACTIV', '2017-07-10 14:04:50', '2017-07-10 14:04:50', NULL, NULL, NULL, NULL, 'DELETE', '2017-07-10 14:07:38', NULL),
(522, 0, 91, 9, 'TECNI', 'ACTIV', '2017-09-15 21:32:09', '2017-09-15 21:32:09', '2017-09-15 22:15:00', '2017-09-16 20:00:00', '21:45', 'zzz', 'INSERT', '2017-09-15 21:32:09', NULL),
(523, 0, 91, 9, 'TECNI', 'ACTIV', '2017-09-15 21:32:36', '2017-09-15 21:32:36', '2017-09-15 22:15:00', '2017-09-16 20:30:00', '22:15', 'zzzsdfsdfsdf', 'INSERT', '2017-09-15 21:32:36', NULL),
(524, 0, 91, 1, 'CERRA', 'ACTIV', '2017-09-15 21:47:25', '2017-09-15 21:47:25', NULL, NULL, NULL, NULL, 'INSERT', '2017-09-15 21:47:25', NULL),
(525, 0, 73, 1, 'TECNI', 'PROCE', '2017-09-15 21:50:57', '2017-09-15 21:50:57', NULL, NULL, NULL, NULL, 'INSERT', '2017-09-15 21:50:57', NULL),
(526, 0, 77, 1, 'TECNI', 'PROCE', '2017-09-15 21:51:00', '2017-09-15 21:51:00', NULL, NULL, NULL, NULL, 'INSERT', '2017-09-15 21:51:00', NULL),
(527, 367, 77, 1, 'TECNI', 'PROCE', '2017-09-15 21:51:00', '2017-09-15 21:51:00', NULL, NULL, NULL, NULL, 'DELETE', '2017-09-15 21:51:03', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_obs_tkt`
--

CREATE TABLE `tb_obs_tkt` (
  `ID_CASO` int(11) DEFAULT NULL,
  `OBSERVACIONES` varchar(1000) DEFAULT NULL,
  `FECHA` datetime DEFAULT NULL,
  `ID_TABLA` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pc_inc`
--

CREATE TABLE `tb_pc_inc` (
  `ID_TABLA` int(11) NOT NULL,
  `PC` varchar(30) DEFAULT NULL,
  `FECHA` datetime DEFAULT NULL,
  `OBSERVACIONES` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_pedido_usuarios`
--

CREATE TABLE `tb_pedido_usuarios` (
  `ID_PEDIDO_USUARIOS` int(11) NOT NULL,
  `ID_PETICION` int(11) DEFAULT NULL,
  `ID_USUARIOS` int(11) DEFAULT NULL,
  `TIPO` varchar(5) DEFAULT NULL,
  `ESTADO` varchar(5) DEFAULT NULL,
  `FECHA_INSERT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FECHA_UPDATE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `FECHA_INI` datetime DEFAULT NULL,
  `FECHA_FIN` datetime DEFAULT NULL,
  `TOTAL` varchar(10) DEFAULT NULL,
  `DESCRIPCION` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_pedido_usuarios`
--

INSERT INTO `tb_pedido_usuarios` (`ID_PEDIDO_USUARIOS`, `ID_PETICION`, `ID_USUARIOS`, `TIPO`, `ESTADO`, `FECHA_INSERT`, `FECHA_UPDATE`, `FECHA_INI`, `FECHA_FIN`, `TOTAL`, `DESCRIPCION`) VALUES
(269, 72, 3, 'TECNI', 'ACTIV', '2016-05-12 00:21:27', '2016-05-12 00:21:27', NULL, NULL, NULL, NULL),
(267, 71, 3, 'TECNI', 'ACTIV', '2016-04-21 03:47:21', '2016-04-21 03:47:21', NULL, NULL, NULL, NULL),
(268, 72, 5, 'SOLIC', 'ACTIV', '2016-05-12 00:21:27', '2016-05-12 00:21:27', NULL, NULL, NULL, NULL),
(266, 71, 5, 'SOLIC', 'ACTIV', '2016-04-21 03:47:21', '2016-04-21 03:47:21', NULL, NULL, NULL, NULL),
(258, 69, 1, 'SOLIC', 'ACTIV', '2016-03-24 04:46:08', '2016-03-24 04:46:08', NULL, NULL, NULL, NULL),
(265, 70, 3, 'TECNI', 'ACTIV', '2016-03-24 05:38:33', '2016-03-24 05:38:33', '2016-03-23 21:30:00', '2016-03-23 21:45:00', '00:15', 'DueÃ±a del proceso'),
(263, 70, NULL, 'TECNI', 'ACTIV', '2016-03-24 05:32:38', '2016-03-24 05:32:38', NULL, NULL, NULL, NULL),
(262, 70, 1, 'SOLIC', 'ACTIV', '2016-03-24 05:32:38', '2016-03-24 05:32:38', NULL, NULL, NULL, NULL),
(257, 68, 1, 'CERRA', 'ACTIV', '2016-03-22 23:28:39', '2016-03-22 23:28:39', NULL, NULL, NULL, NULL),
(259, 69, NULL, 'TECNI', 'ACTIV', '2016-03-24 04:46:08', '2016-03-24 04:46:08', NULL, NULL, NULL, NULL),
(260, 69, 10, 'TECNI', 'ACTIV', '2016-03-24 04:51:52', '2016-03-24 04:51:52', '2016-03-24 09:00:00', '2016-03-24 11:00:00', '02:00', 'ANALIZAR REQUERIMIENTO '),
(261, 69, 3, 'TECNI', 'PROCE', '2016-03-23 14:00:00', '2016-03-23 14:00:00', NULL, NULL, NULL, NULL),
(270, 73, 1, 'SOLIC', 'ACTIV', '2017-03-28 21:48:57', '2017-03-28 21:48:57', NULL, NULL, NULL, NULL),
(271, 73, 9, 'TECNI', 'ACTIV', '2017-03-28 21:48:57', '2017-03-28 21:48:57', NULL, NULL, NULL, NULL),
(272, 73, 4, 'TECNI', 'ACTIV', '2017-03-28 21:48:57', '2017-03-28 21:48:57', NULL, NULL, NULL, NULL),
(273, 73, 6, 'TECNI', 'ACTIV', '2017-03-28 21:48:57', '2017-03-28 21:48:57', NULL, NULL, NULL, NULL),
(274, 74, 1, 'SOLIC', 'ACTIV', '2017-03-28 21:55:23', '2017-03-28 21:55:23', NULL, NULL, NULL, NULL),
(275, 74, 3, 'TECNI', 'ACTIV', '2017-03-28 21:55:23', '2017-03-28 21:55:23', NULL, NULL, NULL, NULL),
(276, 75, 1, 'SOLIC', 'ACTIV', '2017-03-29 13:15:10', '2017-03-29 13:15:10', NULL, NULL, NULL, NULL),
(292, 75, 5, 'CERRA', 'ACTIV', '2017-04-01 01:51:25', '2017-04-01 01:51:25', NULL, NULL, NULL, NULL),
(278, 76, 1, 'SOLIC', 'ACTIV', '2017-03-29 13:20:28', '2017-03-29 13:20:28', NULL, NULL, NULL, NULL),
(279, 76, 3, 'TECNI', 'ACTIV', '2017-03-29 13:20:28', '2017-03-29 13:20:28', NULL, NULL, NULL, NULL),
(280, 77, 1, 'SOLIC', 'ACTIV', '2017-03-29 15:46:50', '2017-03-29 15:46:50', NULL, NULL, NULL, NULL),
(281, 77, 7, 'TECNI', 'ACTIV', '2017-03-29 15:46:50', '2017-03-29 15:46:50', NULL, NULL, NULL, NULL),
(282, 78, 1, 'SOLIC', 'ACTIV', '2017-03-29 15:50:48', '2017-03-29 15:50:48', NULL, NULL, NULL, NULL),
(283, 78, 5, 'TECNI', 'ACTIV', '2017-03-29 15:50:48', '2017-03-29 15:50:48', NULL, NULL, NULL, NULL),
(284, 79, 1, 'SOLIC', 'ACTIV', '2017-03-31 04:03:26', '2017-03-31 04:03:26', NULL, NULL, NULL, NULL),
(285, 79, 9, 'TECNI', 'ACTIV', '2017-03-31 04:03:26', '2017-03-31 04:03:26', NULL, NULL, NULL, NULL),
(286, 79, 4, 'TECNI', 'ACTIV', '2017-03-31 04:03:26', '2017-03-31 04:03:26', NULL, NULL, NULL, NULL),
(287, 79, 6, 'TECNI', 'ACTIV', '2017-03-31 04:03:26', '2017-03-31 04:03:26', NULL, NULL, NULL, NULL),
(288, 76, 3, 'TECNI', 'ACTIV', '2017-03-31 05:19:46', '2017-03-31 05:19:46', '2017-03-31 06:15:00', '2017-03-31 08:15:00', '02:00', 'llamada telefÃ³nica para documentar req '),
(289, 76, 3, 'TECNI', 'ACTIV', '2017-03-31 05:38:42', '2017-03-31 05:38:42', '2017-04-07 06:30:00', '2017-04-14 06:30:00', '168:00', 'autorizaciÃ³n '),
(290, 75, 7, 'TECNI', 'ACTIV', '2017-04-01 01:50:07', '2017-04-01 01:50:07', '2017-04-01 02:45:00', '2017-04-01 03:15:00', '00:30', 'Actividad 1'),
(291, 75, 7, 'TECNI', 'ACTIV', '2017-04-01 01:50:27', '2017-04-01 01:50:27', '2017-04-03 02:45:00', '2017-04-03 03:15:00', '00:30', 'Actividad 2'),
(293, 76, 3, 'TECNI', 'ACTIV', '2017-04-01 02:28:46', '2017-04-01 02:28:46', '2017-04-01 03:15:00', '2017-04-01 04:00:00', '00:45', 'verificado de autorizacion'),
(294, 76, 3, 'TECNI', 'ACTIV', '2017-04-01 03:38:03', '2017-04-01 03:38:03', '2017-04-03 04:30:00', '2017-04-03 04:45:00', '00:15', 'envio de informacion'),
(295, 76, 3, 'CERRA', 'ACTIV', '2017-04-01 03:38:33', '2017-04-01 03:38:33', NULL, NULL, NULL, NULL),
(296, 80, 5, 'SOLIC', 'ACTIV', '2017-04-01 03:53:29', '2017-04-01 03:53:29', NULL, NULL, NULL, NULL),
(297, 80, 3, 'TECNI', 'ACTIV', '2017-04-01 03:53:29', '2017-04-01 03:53:29', NULL, NULL, NULL, NULL),
(298, 81, 1, 'SOLIC', 'ACTIV', '2017-04-09 02:49:31', '2017-04-09 02:49:31', NULL, NULL, NULL, NULL),
(301, 82, 5, 'SOLIC', 'ACTIV', '2017-04-09 03:05:10', '2017-04-09 03:05:10', NULL, NULL, NULL, NULL),
(300, 81, 10, 'TECNI', 'ACTIV', '2017-04-09 02:55:10', '2017-04-09 02:55:10', '2017-04-10 03:00:00', '2017-04-11 03:45:00', '24:45', 'Revicion'),
(302, 82, 3, 'TECNI', 'ACTIV', '2017-04-09 03:05:10', '2017-04-09 03:05:10', NULL, NULL, NULL, NULL),
(306, 74, 3, 'TECNI', 'PROCE', '2017-04-09 03:08:52', '2017-04-09 03:08:52', NULL, NULL, NULL, NULL),
(305, 81, 3, 'TECNI', 'PROCE', '2017-04-09 03:07:44', '2017-04-09 03:07:44', NULL, NULL, NULL, NULL),
(307, 82, 5, 'TECNI', 'ACTIV', '2017-04-09 03:15:02', '2017-04-09 03:15:02', '2017-04-09 04:00:00', '2017-04-09 04:15:00', '00:15', 'recepct'),
(308, 83, 5, 'SOLIC', 'ACTIV', '2017-04-09 19:29:06', '2017-04-09 19:29:06', NULL, NULL, NULL, NULL),
(309, 83, 3, 'TECNI', 'ACTIV', '2017-04-09 19:29:06', '2017-04-09 19:29:06', NULL, NULL, NULL, NULL),
(310, 84, 3, 'SOLIC', 'ACTIV', '2017-04-09 20:06:33', '2017-04-09 20:06:33', NULL, NULL, NULL, NULL),
(311, 84, 3, 'TECNI', 'ACTIV', '2017-04-09 20:06:33', '2017-04-09 20:06:33', NULL, NULL, NULL, NULL),
(312, 82, 3, 'TECNI', 'PROCE', '2017-04-09 20:10:49', '2017-04-09 20:10:49', NULL, NULL, NULL, NULL),
(313, 70, 3, 'CERRA', 'ACTIV', '2017-04-09 20:12:29', '2017-04-09 20:12:29', NULL, NULL, NULL, NULL),
(314, 70, 3, 'CERRA', 'ACTIV', '2017-04-09 20:15:31', '2017-04-09 20:15:31', NULL, NULL, NULL, NULL),
(315, 85, 3, 'SOLIC', 'ACTIV', '2017-04-09 21:36:59', '2017-04-09 21:36:59', NULL, NULL, NULL, NULL),
(316, 85, 3, 'TECNI', 'ACTIV', '2017-04-09 21:36:59', '2017-04-09 21:36:59', NULL, NULL, NULL, NULL),
(317, 86, 3, 'SOLIC', 'ACTIV', '2017-04-09 21:38:42', '2017-04-09 21:38:42', NULL, NULL, NULL, NULL),
(318, 86, 3, 'TECNI', 'ACTIV', '2017-04-09 21:38:42', '2017-04-09 21:38:42', NULL, NULL, NULL, NULL),
(319, 87, 3, 'SOLIC', 'ACTIV', '2017-04-09 21:41:26', '2017-04-09 21:41:26', NULL, NULL, NULL, NULL),
(320, 87, 3, 'TECNI', 'ACTIV', '2017-04-09 21:41:26', '2017-04-09 21:41:26', NULL, NULL, NULL, NULL),
(321, 88, 3, 'SOLIC', 'ACTIV', '2017-04-09 21:42:36', '2017-04-09 21:42:36', NULL, NULL, NULL, NULL),
(322, 88, 3, 'TECNI', 'ACTIV', '2017-04-09 21:42:36', '2017-04-09 21:42:36', NULL, NULL, NULL, NULL),
(323, 89, 3, 'SOLIC', 'ACTIV', '2017-04-09 21:44:01', '2017-04-09 21:44:01', NULL, NULL, NULL, NULL),
(324, 89, 3, 'TECNI', 'ACTIV', '2017-04-09 21:44:01', '2017-04-09 21:44:01', NULL, NULL, NULL, NULL),
(325, 90, 1, 'SOLIC', 'ACTIV', '2017-07-07 12:36:56', '2017-07-07 12:36:56', NULL, NULL, NULL, NULL),
(326, 90, 5, 'TECNI', 'ACTIV', '2017-07-07 12:36:56', '2017-07-07 12:36:56', NULL, NULL, NULL, NULL),
(327, 71, 1, 'TECNI', 'PROCE', '2017-07-08 01:33:53', '2017-07-08 01:33:53', NULL, NULL, NULL, NULL),
(328, 91, 3, 'SOLIC', 'ACTIV', '2017-07-08 15:18:24', '2017-07-08 15:18:24', NULL, NULL, NULL, NULL),
(329, 91, 3, 'TECNI', 'ACTIV', '2017-07-08 15:18:24', '2017-07-08 15:18:24', NULL, NULL, NULL, NULL),
(330, 92, 3, 'SOLIC', 'ACTIV', '2017-07-08 15:44:55', '2017-07-08 15:44:55', NULL, NULL, NULL, NULL),
(333, 93, 3, 'SOLIC', 'ACTIV', '2017-07-09 01:40:07', '2017-07-09 01:40:07', NULL, NULL, NULL, NULL),
(332, 92, 7, 'TECNI', 'ACTIV', '2017-07-08 15:46:45', '2017-07-08 15:46:45', '2017-07-08 08:00:00', '2017-07-08 16:45:00', '08:45', 'acesoria de normas tributarias '),
(334, 93, 3, 'TECNI', 'ACTIV', '2017-07-09 01:40:07', '2017-07-09 01:40:07', NULL, NULL, NULL, NULL),
(335, 93, 3, 'CERRA', 'ACTIV', '2017-07-09 01:41:29', '2017-07-09 01:41:29', NULL, NULL, NULL, NULL),
(336, 93, 3, 'CERRA', 'ACTIV', '2017-07-09 01:42:13', '2017-07-09 01:42:13', NULL, NULL, NULL, NULL),
(337, 93, 3, 'CERRA', 'ACTIV', '2017-07-09 01:42:56', '2017-07-09 01:42:56', NULL, NULL, NULL, NULL),
(338, 93, 3, 'CERRA', 'ACTIV', '2017-07-09 01:46:33', '2017-07-09 01:46:33', NULL, NULL, NULL, NULL),
(339, 94, 3, 'SOLIC', 'ACTIV', '2017-07-09 02:11:43', '2017-07-09 02:11:43', NULL, NULL, NULL, NULL),
(342, 78, 3, 'TECNI', 'PROCE', '2017-07-09 02:15:26', '2017-07-09 02:15:26', NULL, NULL, NULL, NULL),
(341, 94, 6, 'TECNI', 'ACTIV', '2017-07-09 02:14:26', '2017-07-09 02:14:26', '2017-07-09 03:00:00', '2017-07-09 04:30:00', '01:30', 'llama telefonica'),
(343, 95, 3, 'SOLIC', 'ACTIV', '2017-07-09 14:05:17', '2017-07-09 14:05:17', NULL, NULL, NULL, NULL),
(346, 96, 3, 'SOLIC', 'ACTIV', '2017-07-09 16:36:17', '2017-07-09 16:36:17', NULL, NULL, NULL, NULL),
(345, 95, 5, 'TECNI', 'ACTIV', '2017-07-09 14:09:03', '2017-07-09 14:09:03', '2017-07-09 10:45:00', '2017-07-09 15:00:00', '04:15', 'DESCRIP'),
(347, 96, 3, 'TECNI', 'ACTIV', '2017-07-09 16:36:17', '2017-07-09 16:36:17', NULL, NULL, NULL, NULL),
(349, 97, 3, 'SOLIC', 'ACTIV', '2017-07-09 23:01:27', '2017-07-09 23:01:27', NULL, NULL, NULL, NULL),
(352, 91, 3, 'CERRA', 'ACTIV', '2017-07-09 23:46:55', '2017-07-09 23:46:55', NULL, NULL, NULL, NULL),
(351, 97, 3, 'TECNI', 'ACTIV', '2017-07-09 23:03:40', '2017-07-09 23:03:40', '2017-07-10 09:15:00', '2017-07-10 17:30:00', '08:15', 'consulta'),
(353, 92, 3, 'TECNI', 'PROCE', '2017-07-09 23:47:20', '2017-07-09 23:47:20', NULL, NULL, NULL, NULL),
(354, 98, 3, 'SOLIC', 'ACTIV', '2017-07-10 13:09:55', '2017-07-10 13:09:55', NULL, NULL, NULL, NULL),
(357, 72, 3, 'TECNI', 'PROCE', '2017-07-10 13:13:25', '2017-07-10 13:13:25', NULL, NULL, NULL, NULL),
(356, 98, 9, 'TECNI', 'ACTIV', '2017-07-10 13:12:22', '2017-07-10 13:12:22', '2017-07-10 09:30:00', '2017-07-10 14:00:00', '04:30', 'dest'),
(358, 99, NULL, 'SOLIC', 'ACTIV', '2017-07-10 13:19:25', '2017-07-10 13:19:25', NULL, NULL, NULL, NULL),
(359, 99, 3, 'TECNI', 'ACTIV', '2017-07-10 13:19:25', '2017-07-10 13:19:25', NULL, NULL, NULL, NULL),
(360, 100, 3, 'SOLIC', 'ACTIV', '2017-07-10 14:04:50', '2017-07-10 14:04:50', NULL, NULL, NULL, NULL),
(362, 100, 6, 'TECNI', 'ACTIV', '2017-07-10 14:07:24', '2017-07-10 14:07:24', '2017-07-10 10:45:00', '2017-07-10 15:00:00', '04:15', 'analisis'),
(363, 91, 9, 'TECNI', 'ACTIV', '2017-09-15 21:32:09', '2017-09-15 21:32:09', '2017-09-15 22:15:00', '2017-09-16 20:00:00', '21:45', 'zzz'),
(364, 91, 9, 'TECNI', 'ACTIV', '2017-09-15 21:32:36', '2017-09-15 21:32:36', '2017-09-15 22:15:00', '2017-09-16 20:30:00', '22:15', 'zzzsdfsdfsdf'),
(365, 91, 1, 'CERRA', 'ACTIV', '2017-09-15 21:47:25', '2017-09-15 21:47:25', NULL, NULL, NULL, NULL),
(366, 73, 1, 'TECNI', 'PROCE', '2017-09-15 21:50:57', '2017-09-15 21:50:57', NULL, NULL, NULL, NULL);

--
-- Disparadores `tb_pedido_usuarios`
--
DELIMITER $$
CREATE TRIGGER `TR_Pedido_usuario_log_DELETE` BEFORE DELETE ON `tb_pedido_usuarios` FOR EACH ROW insert into tb_log_pedido_usuarios (
   ID_PEDIDO_USUARIOS
  ,ID_PETICION
  ,ID_USUARIOS
  ,TIPO
  ,ESTADO
  ,FECHA_INSERT
  ,FECHA_UPDATE
  ,FECHA_INI
  ,FECHA_FIN
  ,TOTAL
  ,DESCRIPCION
  ,ACCION
  ,FECHA_INSERT_LOG
) VALUES (
   old.ID_PEDIDO_USUARIOS     ,OLD.ID_PETICION     ,OLD.ID_USUARIOS     ,OLD.TIPO    ,OLD.ESTADO    ,OLD.FECHA_INSERT  ,OLD.FECHA_UPDATE   ,OLD.FECHA_INI   ,OLD.FECHA_FIN   ,OLD.TOTAL    ,OLD.DESCRIPCION    ,'DELETE'    ,NOW() )
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TR_Pedido_usuario_log_INSERT` BEFORE INSERT ON `tb_pedido_usuarios` FOR EACH ROW insert into tb_log_pedido_usuarios (
   ID_PEDIDO_USUARIOS
  ,ID_PETICION
  ,ID_USUARIOS
  ,TIPO
  ,ESTADO
  ,FECHA_INSERT
  ,FECHA_UPDATE
  ,FECHA_INI
  ,FECHA_FIN
  ,TOTAL
  ,DESCRIPCION
  ,ACCION
  ,FECHA_INSERT_LOG
) VALUES (
   NEW.ID_PEDIDO_USUARIOS     ,NEW.ID_PETICION     ,NEW.ID_USUARIOS     ,NEW.TIPO    ,NEW.ESTADO    ,NEW.FECHA_INSERT  ,NEW.FECHA_UPDATE   ,NEW.FECHA_INI   ,NEW.FECHA_FIN   ,NEW.TOTAL    ,NEW.DESCRIPCION    ,'INSERT'    ,NOW() )
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `TR_Pedido_usuario_log_UPDATE` BEFORE UPDATE ON `tb_pedido_usuarios` FOR EACH ROW insert into tb_log_pedido_usuarios (
   ID_PEDIDO_USUARIOS
  ,ID_PETICION
  ,ID_USUARIOS
  ,TIPO
  ,ESTADO
  ,FECHA_INSERT
  ,FECHA_UPDATE
  ,FECHA_INI
  ,FECHA_FIN
  ,TOTAL
  ,DESCRIPCION
  ,ACCION
  ,FECHA_INSERT_LOG
) VALUES (
   NEW.ID_PEDIDO_USUARIOS     ,NEW.ID_PETICION     ,NEW.ID_USUARIOS     ,NEW.TIPO    ,NEW.ESTADO    ,NEW.FECHA_INSERT  ,NEW.FECHA_UPDATE   ,NEW.FECHA_INI   ,NEW.FECHA_FIN   ,NEW.TOTAL    ,NEW.DESCRIPCION    ,'UPDATE'    ,NOW() )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_permisos`
--

CREATE TABLE `tb_permisos` (
  `ID_PERMISO` int(11) NOT NULL,
  `ID_USUARIOS` int(11) NOT NULL,
  `PERMISO` varchar(10) DEFAULT 'ver'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_permisos`
--

INSERT INTO `tb_permisos` (`ID_PERMISO`, `ID_USUARIOS`, `PERMISO`) VALUES
(785, 1, 'ver'),
(64, 1, 'ver'),
(30, 1, 'ver'),
(6, 1, 'ver'),
(5, 1, 'ver'),
(3, 1, 'ver'),
(75, 1, 'ver'),
(7, 1, 'ver'),
(2, 1, 'ver'),
(1, 1, 'ver'),
(64, 2, 'ver'),
(75, 2, 'ver'),
(1, 2, 'ver'),
(4, 2, 'ver'),
(4, 1, 'ver'),
(64, 3, 'ver'),
(30, 3, 'ver'),
(6, 3, 'ver'),
(5, 3, 'ver'),
(3, 3, 'ver'),
(75, 3, 'ver'),
(2, 3, 'ver'),
(1, 3, 'ver'),
(4, 3, 'ver'),
(4, 5, 'ver'),
(1, 5, 'ver'),
(2, 5, 'ver'),
(7, 5, 'ver'),
(75, 5, 'ver'),
(3, 5, 'ver'),
(5, 5, 'ver'),
(6, 5, 'ver'),
(30, 5, 'ver'),
(64, 5, 'ver'),
(785, 5, 'ver'),
(1, 10, 'ver'),
(7, 10, 'ver'),
(3, 10, 'ver'),
(5, 10, 'ver'),
(6, 10, 'ver'),
(30, 10, 'ver'),
(64, 10, 'ver'),
(785, 12, 'ver'),
(64, 12, 'ver'),
(30, 12, 'ver'),
(6, 12, 'ver'),
(5, 12, 'ver'),
(3, 12, 'ver'),
(75, 12, 'ver'),
(7, 12, 'ver'),
(2, 12, 'ver'),
(1, 12, 'ver'),
(4, 12, 'ver'),
(4, 4, 'ver'),
(1, 4, 'ver'),
(2, 4, 'ver'),
(7, 4, 'ver'),
(75, 4, 'ver'),
(3, 4, 'ver'),
(5, 4, 'ver'),
(6, 4, 'ver'),
(30, 4, 'ver'),
(64, 4, 'ver'),
(785, 4, 'ver'),
(785, 3, 'ver');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_permisos_generales`
--

CREATE TABLE `tb_permisos_generales` (
  `ID_PERMISOS_GENERALES` int(11) NOT NULL,
  `OPC_PERMISO` char(20) DEFAULT NULL,
  `DET_PERMISO` char(50) DEFAULT NULL,
  `NOM_PERMISO` char(35) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_permisos_generales`
--

INSERT INTO `tb_permisos_generales` (`ID_PERMISOS_GENERALES`, `OPC_PERMISO`, `DET_PERMISO`, `NOM_PERMISO`) VALUES
(4, 'Nuevo Requerimiento', 'Nuevo Requerimiento', 'Nuevo Requerimiento'),
(1, 'Buscar requerimiento', 'Buscar requerimientos', 'Buscar requerimientos'),
(2, 'Usuarios', 'Usuarios', 'Usuarios'),
(7, 'Llamada de Telefono', 'Llamada de Telefono', 'Llamada de Telefono'),
(75, 'Reportes', 'Reportes', 'Reportes'),
(3, 'Atender Requerimient', 'Atender Requerimientos', 'Atender Requerimientos'),
(5, 'Edicion', 'Edicion', 'Edicion'),
(6, 'Tecnico', 'Tecnico', 'Tecnico'),
(30, 'edicion usuario', 'edicion usuario', 'edicion usuario'),
(64, 'Opciones', 'Opciones', 'Opciones'),
(785, 'Manejo de archivos', 'Manejo de archivos', 'Manejo de archivos');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_solicitudes`
--

CREATE TABLE `tb_solicitudes` (
  `ID_TABLA` int(11) NOT NULL,
  `PATH` varchar(100) DEFAULT NULL,
  `OBSERVACIONES` varchar(1000) DEFAULT NULL,
  `FECHA` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_solucion_pedido`
--

CREATE TABLE `tb_solucion_pedido` (
  `ID_SOLUCION_PEDIDO` int(11) NOT NULL,
  `ID_USUARIOS` int(11) DEFAULT NULL,
  `ID_PETICION` int(11) DEFAULT NULL,
  `RESOLUCION` varchar(1000) DEFAULT NULL,
  `SOLUCION` varchar(1000) DEFAULT NULL,
  `FECHA_INSERT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FECHA_UPDATE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `UNIQ` varbinary(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_solucion_pedido`
--

INSERT INTO `tb_solucion_pedido` (`ID_SOLUCION_PEDIDO`, `ID_USUARIOS`, `ID_PETICION`, `RESOLUCION`, `SOLUCION`, `FECHA_INSERT`, `FECHA_UPDATE`, `UNIQ`) VALUES
(1, 1, 5, 'se resuelve', 'se soluciona', '2015-03-26 00:22:26', '2015-03-26 00:22:26', NULL),
(2, 1, 6, 'resoluto', 'soluto', '2015-03-26 00:38:58', '2015-03-26 00:38:58', NULL),
(3, 1, 7, 'resoluto', 'soluto', '2015-03-26 00:39:34', '2015-03-26 00:39:34', NULL),
(4, 1, 3, 'solucion', 'resolucion', '2015-03-26 03:05:31', '2015-03-26 03:05:31', NULL),
(5, 1, 4, 'asdasdasdasdasd', 'sadasdasdasdasd', '2015-12-26 12:53:44', '2015-12-26 12:53:44', NULL),
(6, 1, 1, 'zzzz', 'zzzzzz', '2015-12-26 12:54:56', '2015-12-26 12:54:56', NULL),
(7, 1, 10, 'asasdasdasd', 'asdasdasdssssssssssssssssssssssssssssssssssssads', '2016-01-18 09:43:52', '2016-01-18 09:43:52', NULL),
(8, 1, 2, 'qweqweqwe', 'qweqweqwe', '2016-01-18 09:44:20', '2016-01-18 09:44:20', NULL),
(9, 1, 8, 'ZXZXZX', 'ZXZXZXZX', '2016-01-18 09:50:10', '2016-01-18 09:50:10', NULL),
(10, 1, 19, 'rESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAGrESOLUCION LASRAG', 'sOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGAsOLUCION LARGA', '2016-01-22 23:08:58', '2016-01-22 23:08:58', NULL),
(11, 1, 43, 'resolucion', 'solucion', '2016-02-01 09:03:29', '2016-02-01 09:03:29', NULL),
(12, 1, 46, 'resolucion server', 'solucion server', '2016-02-09 10:18:59', '2016-02-09 10:18:59', NULL),
(13, 12, 47, 'reesolucion rapid', 'solucion rapid', '2016-02-09 10:25:59', '2016-02-09 10:25:59', NULL),
(14, 1, 58, 'Resolucion', 'SoluciÃ³n', '2016-02-20 00:40:43', '2016-02-20 00:40:43', NULL),
(15, 1, 60, 'Resolucion', 'Solucion', '2016-02-21 07:19:00', '2016-02-21 07:19:00', NULL),
(16, 1, 18, 'Resolucion', 'envio', '2016-02-25 04:35:56', '2016-02-25 04:35:56', NULL),
(17, 1, 24, 'res', 'sol', '2016-02-25 04:38:35', '2016-02-25 04:38:35', NULL),
(18, 1, 25, 'res', 'sol', '2016-02-25 04:39:08', '2016-02-25 04:39:08', NULL),
(19, 1, 26, 'res', 'sol', '2016-02-25 04:39:39', '2016-02-25 04:39:39', NULL),
(20, 1, 44, 'res', 'sol', '2016-02-25 04:40:13', '2016-02-25 04:40:13', NULL),
(21, 1, 45, 'res', 'sol', '2016-02-25 04:40:53', '2016-02-25 04:40:53', NULL),
(22, 1, 62, 'aprobado', 'si hay presupuesto', '2016-03-03 06:36:39', '2016-03-03 06:43:26', NULL),
(23, 1, 65, 'llamada exitosa', 'cliente dificil', '2016-03-22 04:48:34', '2016-03-22 04:48:34', NULL),
(24, 1, 68, 'test aprobado', 'esun test de sistemas , solo para hacer pruebas de envio', '2016-03-22 23:20:19', '2016-03-22 23:26:18', NULL),
(25, 5, 75, 'Resolucion', 'Solucion ', '2017-04-01 01:51:13', '2017-04-01 01:51:13', NULL),
(26, 3, 76, 'Resolucion', 'Solucion', '2017-04-01 03:38:23', '2017-04-01 03:38:23', NULL),
(27, 3, 70, 'se niega debido a recortes, por favor solicitar algo mas acorde al presupuesto', 'presupuesto insuficiente ', '2017-04-09 20:12:19', '2017-04-09 20:12:19', NULL),
(28, 3, 93, 'Listo', 'mensaje interno', '2017-07-09 01:41:23', '2017-07-09 01:41:23', NULL),
(29, 3, 94, 'listo', 'presidencia', '2017-07-09 02:13:40', '2017-07-09 02:13:40', NULL),
(30, 3, 95, 'LISTO', 'MENSA INRTER', '2017-07-09 14:08:12', '2017-07-09 14:08:12', NULL),
(31, 1, 91, 'informaciÃ³n incompleta 2', 'informaciÃ³n incompleta 2', '2017-07-09 23:46:45', '2017-09-15 21:47:55', NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_soporte_ext`
--

CREATE TABLE `tb_soporte_ext` (
  `ID_SOPORTE_EXT` int(11) NOT NULL,
  `NOMBRE` varchar(100) DEFAULT NULL,
  `E_MAIL` varchar(100) DEFAULT NULL,
  `TELEFONO` varchar(20) DEFAULT NULL,
  `CONTACTO` varchar(100) DEFAULT NULL,
  `OBSERVACIONES` varchar(1000) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_soport_departament_suarios`
--

CREATE TABLE `tb_soport_departament_suarios` (
  `ID_SOPORT_DEPARTAMENT_SUARIOS` int(11) NOT NULL,
  `ID_DEPARTAMNETO` int(11) DEFAULT NULL,
  `ID_USUARIOS` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_soport_departament_suarios`
--

INSERT INTO `tb_soport_departament_suarios` (`ID_SOPORT_DEPARTAMENT_SUARIOS`, `ID_DEPARTAMNETO`, `ID_USUARIOS`) VALUES
(38, 4, 2),
(37, 3, 2),
(36, 1, 2),
(148, 158, 1),
(82, 80, 5),
(81, 85, 5),
(202, 108, 3),
(49, 1, 12),
(50, 9, 12),
(51, 5, 12),
(52, 6, 12),
(53, 8, 12),
(201, 107, 3),
(200, 106, 3),
(199, 105, 3),
(198, 104, 3),
(197, 103, 3),
(196, 102, 3),
(195, 109, 3),
(194, 110, 3),
(193, 121, 3),
(192, 122, 3),
(191, 123, 3),
(190, 124, 3),
(189, 125, 3),
(188, 126, 3),
(187, 127, 3),
(186, 161, 3),
(185, 120, 3),
(184, 119, 3),
(183, 111, 3),
(182, 112, 3),
(181, 113, 3),
(180, 114, 3),
(179, 115, 3),
(178, 116, 3),
(177, 117, 3),
(176, 118, 3),
(83, 147, 5),
(84, 148, 5),
(85, 149, 5),
(86, 150, 5),
(87, 151, 5),
(88, 152, 5),
(89, 153, 5),
(90, 154, 5),
(91, 155, 5),
(92, 156, 5),
(93, 157, 5),
(94, 128, 7),
(95, 129, 7),
(96, 130, 7),
(97, 131, 7),
(98, 132, 7),
(99, 133, 7),
(100, 134, 7),
(101, 135, 7),
(102, 136, 7),
(103, 137, 7),
(104, 138, 7),
(105, 139, 7),
(106, 140, 7),
(107, 141, 7),
(108, 142, 7),
(109, 143, 7),
(110, 144, 10),
(111, 145, 10),
(112, 146, 10),
(113, 144, 11),
(114, 145, 11),
(115, 146, 11),
(116, 91, 9),
(117, 92, 9),
(118, 93, 9),
(119, 94, 9),
(120, 95, 9),
(121, 96, 9),
(122, 97, 9),
(123, 98, 9),
(124, 99, 9),
(125, 100, 9),
(126, 101, 9),
(127, 100, 4),
(128, 99, 4),
(129, 98, 4),
(130, 97, 4),
(131, 96, 4),
(132, 95, 4),
(133, 94, 4),
(134, 101, 4),
(135, 93, 4),
(136, 92, 4),
(137, 91, 4),
(138, 99, 6),
(139, 98, 6),
(140, 97, 6),
(141, 96, 6),
(142, 95, 6),
(143, 94, 6),
(144, 101, 6),
(145, 93, 6),
(146, 92, 6),
(147, 91, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tb_usuarios`
--

CREATE TABLE `tb_usuarios` (
  `ID_USUARIOS` int(11) NOT NULL,
  `USUARIO` varchar(100) DEFAULT NULL,
  `CLAVE` varchar(100) DEFAULT NULL,
  `NOMBRE` varchar(200) DEFAULT NULL,
  `APELLIDO` varchar(200) DEFAULT NULL,
  `CORREO_CORPORATIVO` varchar(200) DEFAULT NULL,
  `CORREO_PERSONAL` varchar(200) DEFAULT NULL,
  `TELEFONO` varchar(100) DEFAULT NULL,
  `CELULAR_CORPORATIVO` varchar(50) DEFAULT NULL,
  `CELULAR_PERSONAL` varchar(50) DEFAULT NULL,
  `AREA` varchar(150) DEFAULT NULL,
  `FECHA_INSERT` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `FECHA_UPDATE` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `ESTADO` int(11) DEFAULT '2',
  `USER_NIVEL` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `tb_usuarios`
--

INSERT INTO `tb_usuarios` (`ID_USUARIOS`, `USUARIO`, `CLAVE`, `NOMBRE`, `APELLIDO`, `CORREO_CORPORATIVO`, `CORREO_PERSONAL`, `TELEFONO`, `CELULAR_CORPORATIVO`, `CELULAR_PERSONAL`, `AREA`, `FECHA_INSERT`, `FECHA_UPDATE`, `ESTADO`, `USER_NIVEL`) VALUES
(1, 'wcadena', 'wcadena', 'Wagner', 'Cadena', 'wcadena@outlook.com', 'wcadena@outlook.com', '0992946682', '0992946682', '0992946682', 'Sistemas', '2015-02-25 11:41:38', '2015-03-25 11:12:51', 2, 1),
(2, 'wagner', 'wagner', 'wagner', 'cadena', 'wcadena@live.com', 'wcadena@live.com', '0992946682', '0992946682', '0992946682', 'Sistemas', '2015-03-22 11:50:54', '2016-01-23 00:21:59', 2, -1),
(3, 'ptonato', 'ptonato', 'Patricia ', 'Tonato', 'contabilidad@conagoparepichincha.gob.ec', 'pattyto1245@hotmail.com', '2551-623', '099-600-1470', '099-332-0242', 'Contable-Financiera', '2016-01-27 12:00:00', '2017-03-31 04:42:20', 2, 1),
(4, 'emaldonado', 'emaldonado', 'Eliana ', 'Maldonado', NULL, 'elivalmz@hotmail.com', '2520-905', NULL, '099-469-6393', 'Contable-Financiera', '2016-01-27 12:00:00', '2016-01-27 12:00:00', 2, 1),
(5, 'ltoapanta', 'ltoapanta', 'Lucia ', 'Toapanta', 'secretariageneral@conagoparepichincha.gob.ec', 'jlucyth@gmail.com', '2551-623', '099-600-1476', '098-775-3838', 'Administrativa', '2016-01-27 12:00:00', '2017-03-31 04:42:52', 2, 1),
(6, 'fvalencia', 'fvalencia', 'Fiorela ', 'Valencia', 'comunicacion@conagoparepichincha.gob.ec', NULL, '2520-905', '099-600-1474', '099-846-6017', 'Comunicación', '2016-01-27 12:00:00', '2016-01-27 12:00:00', 2, 1),
(7, 'rgarcia', 'rgarcia', 'Rene ', 'Garcia', 'juridico@conagoparepichincha.gob.ec', 'renaco71@gmail.com', '2520-905', '099-600-1478', NULL, 'Juridico', '2016-01-27 12:00:00', '2016-01-27 12:00:00', 2, 1),
(8, 'jerazo', 'jerazo', 'Josselyn ', 'Erazo', 'proyectos@conagoparepichincha.gob.ec', 'josse1503@hotmail.com', '2520-905', NULL, '098-409-4336', 'Proyectos', '2016-01-27 12:00:00', '2016-01-27 12:00:00', 2, 1),
(9, 'mgualotuna', 'mgualotuna', 'Marcos ', 'GualotuÃ±a', 'comunicacion@conagoparepichincha.gob.ec', 'marcos_david.1001@hotmail.com', '2520-905', '00000000000000', '099-889-1247', 'Comunicación', '2016-01-27 12:00:00', '2016-02-21 08:19:14', 2, 1),
(10, 'gnorona', 'gnorona', 'Gabriel', 'NoroÃ±a', 'presidencia@conagoparepichincha.gob.ec', 'gabrielnorona@gmail.com', '2551-623', '099-600-1476', '0982554366', NULL, '2016-01-27 23:56:11', '2016-01-28 00:02:01', 2, 1),
(11, 'hbaquero', 'hbaquero', 'Humberto', 'Baquero', 'vicepresidencia@conagoparepichincha.gob.ec', 'baquerflor_76@hotmail.com', '2551-623', '0996001464', '0983509692', NULL, '2016-01-27 23:58:34', '2016-01-28 00:02:18', 2, 1),
(12, 'aaa', 'aaa', 'aaa', 'aaa', 'wcadena@live.com', 'wcadena@live.com', '090909090909', '090909090909', '090909090909', NULL, '2016-02-09 10:23:11', '2016-02-21 09:10:03', 2, -1),
(13, 'soporte', 'soporte', 'Soporte', 'Ecuatask', 'soporte@ecuatask.com', 'soporte@ecuatask.com', '0992946682', NULL, NULL, NULL, '2016-05-12 01:33:45', '2016-05-12 01:33:45', 2, 0);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_pedido_reporte`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_pedido_reporte` (
`ID_PETICION` int(11)
,`USUARIO` varchar(100)
,`DESCRIPCION` varchar(100)
,`TITULO` varchar(150)
,`PROBLEMA` varchar(1000)
,`FECHA_PEDIDO` datetime
,`FECHA_SOLUCION` datetime
,`ID_USUARIOS_asignado` bigint(11)
,`PRIORIDAD` varchar(30)
,`TIEMPO_ROJO` time
,`TIEMPO_AMARILLO` time
,`HORAS` time
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_pedido_reporte2`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_pedido_reporte2` (
`ID_PETICION` int(11)
,`USUARIO` varchar(100)
,`DESCRIPCION` varchar(100)
,`TITULO` varchar(150)
,`PROBLEMA` varchar(1000)
,`FECHA_PEDIDO` datetime
,`FECHA_SOLUCION` datetime
,`ESTADO` varchar(50)
,`ID_USUARIOS_asignado` bigint(11)
,`PRIORIDAD` varchar(30)
,`TIEMPO_ROJO` time
,`TIEMPO_AMARILLO` time
,`HORAS` time
);

-- --------------------------------------------------------

--
-- Estructura Stand-in para la vista `vw_reporte_max1`
-- (Véase abajo para la vista actual)
--
CREATE TABLE `vw_reporte_max1` (
`ID_PETICION` int(11)
,`USUARIO` varchar(100)
,`DESCRIPCION` varchar(100)
,`TITULO` varchar(150)
,`PROBLEMA` varchar(1000)
,`FECHA_PEDIDO` datetime
,`FECHA_SOLUCION` datetime
,`ESTADO` varchar(50)
,`ID_USUARIOS_asignado` bigint(11)
,`PRIORIDAD` varchar(30)
,`TIEMPO_ROJO` time
,`TIEMPO_AMARILLO` time
,`HORAS` bigint(21)
,`HORAS_rojo` int(1)
,`HORAS_Amarillo` int(1)
,`horas_Verde` int(1)
);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `vw_reporte_max1_old`
--

CREATE TABLE `vw_reporte_max1_old` (
  `ID_PETICION` int(11) DEFAULT NULL,
  `USUARIO` varchar(100) DEFAULT NULL,
  `DESCRIPCION` varchar(100) DEFAULT NULL,
  `TITULO` varchar(150) DEFAULT NULL,
  `PROBLEMA` varchar(1000) DEFAULT NULL,
  `FECHA_PEDIDO` datetime DEFAULT NULL,
  `FECHA_SOLUCION` datetime DEFAULT NULL,
  `ESTADO` varchar(50) DEFAULT NULL,
  `ID_USUARIOS_asignado` bigint(11) DEFAULT NULL,
  `PRIORIDAD` varchar(30) DEFAULT NULL,
  `TIEMPO_ROJO` time DEFAULT NULL,
  `TIEMPO_AMARILLO` time DEFAULT NULL,
  `HORAS` bigint(21) DEFAULT NULL,
  `HORAS_rojo` int(1) DEFAULT NULL,
  `HORAS_Amarillo` int(1) DEFAULT NULL,
  `horas_Verde` int(1) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_pedido_reporte`
--
DROP TABLE IF EXISTS `vw_pedido_reporte`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_pedido_reporte`  AS  select `pedidos`.`ID_PETICION` AS `ID_PETICION`,`tb_usuarios`.`USUARIO` AS `USUARIO`,`tb_departamento`.`DESCRIPCION` AS `DESCRIPCION`,`pedidos`.`TITULO` AS `TITULO`,`pedidos`.`PROBLEMA` AS `PROBLEMA`,`pedidos`.`FECHA_PEDIDO` AS `FECHA_PEDIDO`,`pedidos`.`FECHA_SOLUCION` AS `FECHA_SOLUCION`,(select max(`tb_pedido_usuarios`.`ID_USUARIOS`) AS `ID_USUARIOS_asignado` from `tb_pedido_usuarios` where ((`tb_pedido_usuarios`.`ESTADO` = 'PROCE') and (`tb_pedido_usuarios`.`ID_PETICION` = `pedidos`.`ID_PETICION`))) AS `ID_USUARIOS_asignado`,`tb_criticidades`.`PRIORIDAD` AS `PRIORIDAD`,`tb_criticidades`.`TIEMPO_ROJO` AS `TIEMPO_ROJO`,`tb_criticidades`.`TIEMPO_AMARILLO` AS `TIEMPO_AMARILLO`,sec_to_time(timestampdiff(HOUR,`pedidos`.`FECHA_PEDIDO`,ifnull(`pedidos`.`FECHA_SOLUCION`,curdate()))) AS `HORAS` from ((`pedidos` left join ((`tb_departamento` join `tb_soport_departament_suarios` on((`tb_departamento`.`ID_DEPARTAMNETO` = `tb_soport_departament_suarios`.`ID_DEPARTAMNETO`))) join `tb_usuarios` on((`tb_usuarios`.`ID_USUARIOS` = `tb_soport_departament_suarios`.`ID_USUARIOS`))) on((`pedidos`.`ID_DEPARTAMENTO` = `tb_soport_departament_suarios`.`ID_DEPARTAMNETO`))) join `tb_criticidades` on((`pedidos`.`PRIORIDAD` = `tb_criticidades`.`PRIORIDAD`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_pedido_reporte2`
--
DROP TABLE IF EXISTS `vw_pedido_reporte2`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wcadena_lara1`@`%` SQL SECURITY DEFINER VIEW `vw_pedido_reporte2`  AS  select `pedidos`.`ID_PETICION` AS `ID_PETICION`,`tb_usuarios`.`USUARIO` AS `USUARIO`,`tb_departamento`.`DESCRIPCION` AS `DESCRIPCION`,`pedidos`.`TITULO` AS `TITULO`,`pedidos`.`PROBLEMA` AS `PROBLEMA`,`pedidos`.`FECHA_PEDIDO` AS `FECHA_PEDIDO`,`pedidos`.`FECHA_SOLUCION` AS `FECHA_SOLUCION`,`pedidos`.`ESTADO` AS `ESTADO`,(select max(`tb_pedido_usuarios`.`ID_USUARIOS`) AS `ID_USUARIOS_asignado` from `tb_pedido_usuarios` where ((`tb_pedido_usuarios`.`ESTADO` = 'PROCE') and (`tb_pedido_usuarios`.`ID_PETICION` = `pedidos`.`ID_PETICION`))) AS `ID_USUARIOS_asignado`,`tb_criticidades`.`PRIORIDAD` AS `PRIORIDAD`,`tb_criticidades`.`TIEMPO_ROJO` AS `TIEMPO_ROJO`,`tb_criticidades`.`TIEMPO_AMARILLO` AS `TIEMPO_AMARILLO`,sec_to_time(timestampdiff(HOUR,`pedidos`.`FECHA_PEDIDO`,ifnull(`pedidos`.`FECHA_SOLUCION`,curdate()))) AS `HORAS` from ((`pedidos` left join ((`tb_departamento` join `tb_soport_departament_suarios` on((`tb_departamento`.`ID_DEPARTAMNETO` = `tb_soport_departament_suarios`.`ID_DEPARTAMNETO`))) join `tb_usuarios` on((`tb_usuarios`.`ID_USUARIOS` = `tb_soport_departament_suarios`.`ID_USUARIOS`))) on((`pedidos`.`ID_DEPARTAMENTO` = `tb_soport_departament_suarios`.`ID_DEPARTAMNETO`))) join `tb_criticidades` on((`pedidos`.`PRIORIDAD` = `tb_criticidades`.`PRIORIDAD`))) ;

-- --------------------------------------------------------

--
-- Estructura para la vista `vw_reporte_max1`
--
DROP TABLE IF EXISTS `vw_reporte_max1`;

CREATE ALGORITHM=UNDEFINED DEFINER=`wcadena_lara1`@`%` SQL SECURITY DEFINER VIEW `vw_reporte_max1`  AS  select `pedidos`.`ID_PETICION` AS `ID_PETICION`,`tb_usuarios`.`USUARIO` AS `USUARIO`,`tb_departamento`.`DESCRIPCION` AS `DESCRIPCION`,`pedidos`.`TITULO` AS `TITULO`,`pedidos`.`PROBLEMA` AS `PROBLEMA`,`pedidos`.`FECHA_PEDIDO` AS `FECHA_PEDIDO`,`pedidos`.`FECHA_SOLUCION` AS `FECHA_SOLUCION`,`pedidos`.`ESTADO` AS `ESTADO`,(select max(`tb_pedido_usuarios`.`ID_USUARIOS`) AS `ID_USUARIOS_asignado` from `tb_pedido_usuarios` where ((`tb_pedido_usuarios`.`ESTADO` = 'PROCE') and (`tb_pedido_usuarios`.`ID_PETICION` = `pedidos`.`ID_PETICION`))) AS `ID_USUARIOS_asignado`,`tb_criticidades`.`PRIORIDAD` AS `PRIORIDAD`,`tb_criticidades`.`TIEMPO_ROJO` AS `TIEMPO_ROJO`,`tb_criticidades`.`TIEMPO_AMARILLO` AS `TIEMPO_AMARILLO`,timestampdiff(HOUR,`pedidos`.`FECHA_PEDIDO`,ifnull(`pedidos`.`FECHA_SOLUCION`,curdate())) AS `HORAS`,(timestampdiff(HOUR,`pedidos`.`FECHA_PEDIDO`,ifnull(`pedidos`.`FECHA_SOLUCION`,curdate())) > date_format(`tb_criticidades`.`TIEMPO_ROJO`,'%H')) AS `HORAS_rojo`,((timestampdiff(HOUR,`pedidos`.`FECHA_PEDIDO`,ifnull(`pedidos`.`FECHA_SOLUCION`,curdate())) > date_format(`tb_criticidades`.`TIEMPO_AMARILLO`,'%H')) and (timestampdiff(HOUR,`pedidos`.`FECHA_PEDIDO`,ifnull(`pedidos`.`FECHA_SOLUCION`,curdate())) < date_format(`tb_criticidades`.`TIEMPO_ROJO`,'%H'))) AS `HORAS_Amarillo`,(timestampdiff(HOUR,`pedidos`.`FECHA_PEDIDO`,ifnull(`pedidos`.`FECHA_SOLUCION`,curdate())) < date_format(`tb_criticidades`.`TIEMPO_AMARILLO`,'%H')) AS `horas_Verde` from ((`pedidos` left join ((`tb_departamento` join `tb_soport_departament_suarios` on((`tb_departamento`.`ID_DEPARTAMNETO` = `tb_soport_departament_suarios`.`ID_DEPARTAMNETO`))) join `tb_usuarios` on((`tb_usuarios`.`ID_USUARIOS` = `tb_soport_departament_suarios`.`ID_USUARIOS`))) on((`pedidos`.`ID_DEPARTAMENTO` = `tb_soport_departament_suarios`.`ID_DEPARTAMNETO`))) join `tb_criticidades` on((`pedidos`.`PRIORIDAD` = `tb_criticidades`.`PRIORIDAD`))) ;

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id_config`);

--
-- Indices de la tabla `ext`
--
ALTER TABLE `ext`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `listadeusuarios`
--
ALTER TABLE `listadeusuarios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  ADD PRIMARY KEY (`ID_PETICION`),
  ADD KEY `FK_departamento` (`ID_DEPARTAMENTO`);

--
-- Indices de la tabla `soporte_empleados`
--
ALTER TABLE `soporte_empleados`
  ADD PRIMARY KEY (`COD_EMPLEADO_SOPORTE`),
  ADD KEY `FK_soporte_departamentos` (`ID_DEPARTAMENTO`);

--
-- Indices de la tabla `tb_adjuntos`
--
ALTER TABLE `tb_adjuntos`
  ADD PRIMARY KEY (`ID_ADJUNTOS`),
  ADD KEY `FK_pedidos` (`ID_PETICION`);

--
-- Indices de la tabla `tb_aplicaciones`
--
ALTER TABLE `tb_aplicaciones`
  ADD PRIMARY KEY (`ID_APLICACION`);

--
-- Indices de la tabla `tb_area`
--
ALTER TABLE `tb_area`
  ADD PRIMARY KEY (`ID_AREA`);

--
-- Indices de la tabla `tb_cambios_estados`
--
ALTER TABLE `tb_cambios_estados`
  ADD PRIMARY KEY (`ID_TABLA`);

--
-- Indices de la tabla `tb_criticidades`
--
ALTER TABLE `tb_criticidades`
  ADD PRIMARY KEY (`ID_TABLA`);

--
-- Indices de la tabla `tb_departamento`
--
ALTER TABLE `tb_departamento`
  ADD PRIMARY KEY (`ID_DEPARTAMNETO`),
  ADD KEY `FK_estacion_departamento` (`ID_ESTACION`);

--
-- Indices de la tabla `tb_directorios`
--
ALTER TABLE `tb_directorios`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `tb_documents`
--
ALTER TABLE `tb_documents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `UNK_documento` (`identificador_numero`,`tipo_documento`);

--
-- Indices de la tabla `tb_estaciones`
--
ALTER TABLE `tb_estaciones`
  ADD PRIMARY KEY (`ID_ESTACION`);

--
-- Indices de la tabla `tb_estados`
--
ALTER TABLE `tb_estados`
  ADD PRIMARY KEY (`ID_TABLA`);

--
-- Indices de la tabla `tb_eventos_relevantes`
--
ALTER TABLE `tb_eventos_relevantes`
  ADD PRIMARY KEY (`ID_TABLA`);

--
-- Indices de la tabla `tb_fabricante`
--
ALTER TABLE `tb_fabricante`
  ADD PRIMARY KEY (`ID_SOPORTE_FAB`);

--
-- Indices de la tabla `tb_firmas`
--
ALTER TABLE `tb_firmas`
  ADD PRIMARY KEY (`ID_TABLA`);

--
-- Indices de la tabla `tb_formatos`
--
ALTER TABLE `tb_formatos`
  ADD PRIMARY KEY (`ID_TABLA`);

--
-- Indices de la tabla `tb_incidentes`
--
ALTER TABLE `tb_incidentes`
  ADD PRIMARY KEY (`ID_TABLA`);

--
-- Indices de la tabla `tb_inf_empleados`
--
ALTER TABLE `tb_inf_empleados`
  ADD PRIMARY KEY (`ID_TABLA`);

--
-- Indices de la tabla `tb_inf_pc`
--
ALTER TABLE `tb_inf_pc`
  ADD PRIMARY KEY (`ID_TABLA`);

--
-- Indices de la tabla `tb_iniciativas`
--
ALTER TABLE `tb_iniciativas`
  ADD PRIMARY KEY (`ID_TABLA`);

--
-- Indices de la tabla `tb_lista_solicitudes`
--
ALTER TABLE `tb_lista_solicitudes`
  ADD PRIMARY KEY (`ID_TABLA`);

--
-- Indices de la tabla `tb_log_pedido`
--
ALTER TABLE `tb_log_pedido`
  ADD PRIMARY KEY (`ID_LOG_PEDIDO`);

--
-- Indices de la tabla `tb_log_pedido_usuarios`
--
ALTER TABLE `tb_log_pedido_usuarios`
  ADD PRIMARY KEY (`ID_LOG_PEDIDO_USUARIOS`);

--
-- Indices de la tabla `tb_obs_tkt`
--
ALTER TABLE `tb_obs_tkt`
  ADD PRIMARY KEY (`ID_TABLA`);

--
-- Indices de la tabla `tb_pc_inc`
--
ALTER TABLE `tb_pc_inc`
  ADD PRIMARY KEY (`ID_TABLA`);

--
-- Indices de la tabla `tb_pedido_usuarios`
--
ALTER TABLE `tb_pedido_usuarios`
  ADD PRIMARY KEY (`ID_PEDIDO_USUARIOS`),
  ADD KEY `FK_pedidos_master` (`ID_PETICION`),
  ADD KEY `FK_usuario_pedido` (`ID_USUARIOS`);

--
-- Indices de la tabla `tb_permisos`
--
ALTER TABLE `tb_permisos`
  ADD PRIMARY KEY (`ID_PERMISO`,`ID_USUARIOS`),
  ADD KEY `FK_usuarios` (`ID_USUARIOS`);

--
-- Indices de la tabla `tb_permisos_generales`
--
ALTER TABLE `tb_permisos_generales`
  ADD PRIMARY KEY (`ID_PERMISOS_GENERALES`);

--
-- Indices de la tabla `tb_solicitudes`
--
ALTER TABLE `tb_solicitudes`
  ADD PRIMARY KEY (`ID_TABLA`);

--
-- Indices de la tabla `tb_solucion_pedido`
--
ALTER TABLE `tb_solucion_pedido`
  ADD PRIMARY KEY (`ID_SOLUCION_PEDIDO`),
  ADD KEY `FK_peticion_solucion` (`ID_PETICION`),
  ADD KEY `FK_solucion_usuario` (`ID_USUARIOS`);

--
-- Indices de la tabla `tb_soporte_ext`
--
ALTER TABLE `tb_soporte_ext`
  ADD PRIMARY KEY (`ID_SOPORTE_EXT`);

--
-- Indices de la tabla `tb_soport_departament_suarios`
--
ALTER TABLE `tb_soport_departament_suarios`
  ADD PRIMARY KEY (`ID_SOPORT_DEPARTAMENT_SUARIOS`),
  ADD KEY `FK_departamento_usuario` (`ID_DEPARTAMNETO`),
  ADD KEY `FK_usuario_soporte` (`ID_USUARIOS`);

--
-- Indices de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  ADD PRIMARY KEY (`ID_USUARIOS`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `config`
--
ALTER TABLE `config`
  MODIFY `id_config` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT de la tabla `ext`
--
ALTER TABLE `ext`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `listadeusuarios`
--
ALTER TABLE `listadeusuarios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `pedidos`
--
ALTER TABLE `pedidos`
  MODIFY `ID_PETICION` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=101;
--
-- AUTO_INCREMENT de la tabla `tb_aplicaciones`
--
ALTER TABLE `tb_aplicaciones`
  MODIFY `ID_APLICACION` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_area`
--
ALTER TABLE `tb_area`
  MODIFY `ID_AREA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tb_cambios_estados`
--
ALTER TABLE `tb_cambios_estados`
  MODIFY `ID_TABLA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_criticidades`
--
ALTER TABLE `tb_criticidades`
  MODIFY `ID_TABLA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT de la tabla `tb_departamento`
--
ALTER TABLE `tb_departamento`
  MODIFY `ID_DEPARTAMNETO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=162;
--
-- AUTO_INCREMENT de la tabla `tb_directorios`
--
ALTER TABLE `tb_directorios`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
--
-- AUTO_INCREMENT de la tabla `tb_documents`
--
ALTER TABLE `tb_documents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT de la tabla `tb_estados`
--
ALTER TABLE `tb_estados`
  MODIFY `ID_TABLA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `tb_eventos_relevantes`
--
ALTER TABLE `tb_eventos_relevantes`
  MODIFY `ID_TABLA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_fabricante`
--
ALTER TABLE `tb_fabricante`
  MODIFY `ID_SOPORTE_FAB` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_firmas`
--
ALTER TABLE `tb_firmas`
  MODIFY `ID_TABLA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_formatos`
--
ALTER TABLE `tb_formatos`
  MODIFY `ID_TABLA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_incidentes`
--
ALTER TABLE `tb_incidentes`
  MODIFY `ID_TABLA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_inf_empleados`
--
ALTER TABLE `tb_inf_empleados`
  MODIFY `ID_TABLA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_inf_pc`
--
ALTER TABLE `tb_inf_pc`
  MODIFY `ID_TABLA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_iniciativas`
--
ALTER TABLE `tb_iniciativas`
  MODIFY `ID_TABLA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_lista_solicitudes`
--
ALTER TABLE `tb_lista_solicitudes`
  MODIFY `ID_TABLA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_log_pedido`
--
ALTER TABLE `tb_log_pedido`
  MODIFY `ID_LOG_PEDIDO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
--
-- AUTO_INCREMENT de la tabla `tb_log_pedido_usuarios`
--
ALTER TABLE `tb_log_pedido_usuarios`
  MODIFY `ID_LOG_PEDIDO_USUARIOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=528;
--
-- AUTO_INCREMENT de la tabla `tb_obs_tkt`
--
ALTER TABLE `tb_obs_tkt`
  MODIFY `ID_TABLA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_pc_inc`
--
ALTER TABLE `tb_pc_inc`
  MODIFY `ID_TABLA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_pedido_usuarios`
--
ALTER TABLE `tb_pedido_usuarios`
  MODIFY `ID_PEDIDO_USUARIOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=368;
--
-- AUTO_INCREMENT de la tabla `tb_solicitudes`
--
ALTER TABLE `tb_solicitudes`
  MODIFY `ID_TABLA` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_solucion_pedido`
--
ALTER TABLE `tb_solucion_pedido`
  MODIFY `ID_SOLUCION_PEDIDO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
--
-- AUTO_INCREMENT de la tabla `tb_soporte_ext`
--
ALTER TABLE `tb_soporte_ext`
  MODIFY `ID_SOPORTE_EXT` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tb_soport_departament_suarios`
--
ALTER TABLE `tb_soport_departament_suarios`
  MODIFY `ID_SOPORT_DEPARTAMENT_SUARIOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=203;
--
-- AUTO_INCREMENT de la tabla `tb_usuarios`
--
ALTER TABLE `tb_usuarios`
  MODIFY `ID_USUARIOS` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
