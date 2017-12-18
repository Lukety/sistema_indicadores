-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u2
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 18-12-2017 a las 13:34:35
-- Versión del servidor: 5.5.57-0+deb8u1
-- Versión de PHP: 5.6.30-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `modernizacion`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion`
--

CREATE TABLE IF NOT EXISTS `direccion` (
`ID` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=61 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `direccion`
--

INSERT INTO `direccion` (`ID`, `nombre`) VALUES
(1, 'Alumbrado publico y semaforización'),
(2, 'Barrido y limpieza'),
(3, 'Bromatología'),
(4, 'Centro de atención primaria de la salud'),
(5, 'Centro de prevención local de adicciones '),
(6, 'CGM Barrio Jardín'),
(7, 'CGM zona 3er rotonda'),
(8, 'CGM zona José Hernández'),
(9, 'CGM zona sur'),
(10, 'Comercio'),
(11, 'Compras y contrataciones'),
(12, 'Contaduría y tesorerí­a'),
(13, 'Coordinación de monitoreo de servicios'),
(14, 'Coordinación literaria centro cultural'),
(15, 'CUIM'),
(16, 'Defensa civil'),
(17, 'Departamento de calidad de vida'),
(18, 'Adultos mayores'),
(19, 'Control de servicios'),
(20, 'Deportes'),
(21, 'Desarrollo social'),
(22, 'Enlace institucional y cultos'),
(24, 'Modernización del estado'),
(25, 'Prevención y asistencia de la violencia contra las mujeres'),
(26, 'Promoción de políticas de igualdad de género'),
(27, 'Protección integral de derechos y asistencia al vecino'),
(28, 'Transporte y registro civil'),
(29, 'Turismo y cultura'),
(30, 'Escuela de música'),
(31, 'Recolección de residuos'),
(32, 'Escribanía de Gobierno'),
(33, 'Gerente CDF'),
(34, 'Gerente de comercialización'),
(35, 'Gerente fabrica metalúrgica'),
(36, 'Gerente supermercado'),
(37, 'Higiene urbana y espacios verdes'),
(38, 'Hogar de mujeres víctimas de violencia '),
(39, 'Iluminación de espacios públicos '),
(40, 'Jefe de programa de control de cumplimiento de servicios tercerizados'),
(41, 'Laboratorio óptico'),
(42, 'Obra publica'),
(43, 'Obras privadas'),
(44, 'Orquesta municipal'),
(45, 'Plantas potabilizadoras y de efluentes cloacales'),
(46, 'Presupuestos y control presupuestario'),
(47, 'Recursos humanos'),
(48, 'SERBA'),
(49, 'Sistemas'),
(50, 'Sub contaduria'),
(51, 'Subsecretarí­a de gobierno'),
(52, 'Transito y vía publica'),
(53, 'Vialidad municipal'),
(54, 'Vivienda'),
(55, 'Zoonosis'),
(57, 'Ninguna'),
(58, 'Ingresos públicos'),
(60, 'Medio Ambiente y Espacio Público');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `indicadores`
--

CREATE TABLE IF NOT EXISTS `indicadores` (
`ID` int(255) NOT NULL,
  `Secretaria` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Direccion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Responsable` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Eje_gestion` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Prioridad` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Nombre_proyecto` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `RIL` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Indicador` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Unidad_medida` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Ene_2017` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Feb_2017` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Mar_2017` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Abr_2017` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `May_2017` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Jun_2017` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Jul_2017` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Ago_2017` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Sep_2017` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Oct_2017` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Nov_2017` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL,
  `Dic_2017` varchar(255) COLLATE utf8_spanish_ci DEFAULT NULL
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `indicadores`
--

INSERT INTO `indicadores` (`ID`, `Secretaria`, `Direccion`, `Responsable`, `Eje_gestion`, `Prioridad`, `Nombre_proyecto`, `RIL`, `Indicador`, `Unidad_medida`, `Ene_2017`, `Feb_2017`, `Mar_2017`, `Abr_2017`, `May_2017`, `Jun_2017`, `Jul_2017`, `Ago_2017`, `Sep_2017`, `Oct_2017`, `Nov_2017`, `Dic_2017`) VALUES
(1, 'Centro de logí­stica y servicios municipales', 'Recolección de residuos', 'Dardo Pérez', 'SERVICIO AL VECINO', 'NO', 'Programa de recolección de RSU', 'A', 'tn recolectadas por zona', 'Toneladas', '3985.64', '3654.28', '3557.23', '3822.33', '3856.73', '3793.76', '3501.91', '3721.35', '3822.86', '4061.30', '', ''),
(2, 'Centro de logí­stica y servicios municipales', 'Gerente CDF', 'Horacio Mansilla', 'SERVICIO AL VECINO', 'NO', 'Programa de tratamiento de residuos', 'A', 'tn ingresadas x tipo', 'Toneladas', '6319.48', '4934.32', '7257', '5363.33', '5452', '5274', '5591.5', '6543', '6772', '5950.7', '', ''),
(3, 'Centro de logí­stica y servicios municipales', 'Gerente CDF', 'Horacio Mansilla', 'SERVICIO AL VECINO', 'NO', 'Programa de tratamiento de residuos', 'B', 'Tn ingresadas RSU', 'Toneladas', '4220.87', '3045.59', '4730.4', '3596', '3716', '3475', '3575', '3636', '3381', '3689', '', ''),
(4, 'Centro de logí­stica y servicios municipales', 'Gerente CDF', 'Horacio Mansilla', 'SERVICIO AL VECINO', 'NO', 'Programa de tratamiento de residuos', 'B', 'Tn ingresadas RSI', 'Toneladas', '446.98', '332.47', '622', '553', '470', '693', '583', '1096', '1375', '619', '', ''),
(5, 'Centro de logí­stica y servicios municipales', 'Gerente CDF', 'Horacio Mansilla', 'SERVICIO AL VECINO', 'NO', 'Programa de tratamiento de residuos', 'B', 'Tn ingresadas Espacios Verdes', 'Toneladas', '1652', '1556', '1905', '1215', '1266', '1106', '1434', '1811', '2016', '1642', '', ''),
(6, 'Centro de logí­stica y servicios municipales', 'Gerente CDF', 'Horacio Mansilla', 'SERVICIO AL VECINO', 'NO', 'Programa de tratamiento de residuos', 'A', 'tn recuperadas x tipo', 'Toneladas', '50.58', '45.03', '80.38', '52.16', '46.21', '52.72', '60.86', '38.13', '49.19', '35.18', '', ''),
(7, 'Centro de logí­stica y servicios municipales', 'Gerente CDF', 'Horacio Mansilla', 'SERVICIO AL VECINO', 'NO', 'Programa de tratamiento de residuos', 'A', '% ocupación celda', 'Porcentaje', '0', '0', '65', '0', '67', '67', '60', '62', '65', '67', '', ''),
(8, 'Centro de logí­stica y servicios municipales', 'Gerente CDF', 'Horacio Mansilla', 'SERVICIO AL VECINO', 'NO', 'Programa de tratamiento de residuos', 'A', 'vida útil celda', 'Días', '0', '0', '340', '0', '315', '0', '360', '330', '300', '280', '', ''),
(9, 'Centro de logí­stica y servicios municipales', 'Gerente fabrica metalúrgica', 'Sebastián Páez Segalá', 'SERVICIO AL VECINO', 'NO', 'Programa de producción cooperativa', 'A', 'N° de nomencladores construidos', 'Cantidad', '0', '0', '98', '109', '171', '228', '434', '306', '62', '54', '', ''),
(10, 'Centro de logí­stica y servicios municipales', 'Gerente supermercado', 'Mariela Mortensen', 'SERVICIO AL VECINO', 'NO', 'Programa Supermercado Municipal', 'A', 'Nº de tickets', 'Cantidad', '5337', '5531', '6023', '5602', '5774', '5773', '5705', '6035', '5833', '5560', '', ''),
(11, 'Centro de logí­stica y servicios municipales', 'Gerente supermercado', 'Mariela Mortensen', 'SERVICIO AL VECINO', 'NO', 'Programa Supermercado Municipal', 'A', '$ facturación', 'Pesos', '940298.14', '1532731.17', '1022315.2', '1022315.2', '1273579.00', '1316609.61', '1783254.05', '2055622.32', '1973560.16', '2081477.00', '', ''),
(12, 'Centro de logí­stica y servicios municipales', 'Gerente supermercado', 'Mariela Mortensen', 'SERVICIO AL VECINO', 'NO', 'Programa Supermercado Municipal', 'A', '$ por venta itinerante', 'Pesos', '0', '21001.99', '0', '81703.26', '21073.04', '45253.75', '42296.94', '29530.00', '25582.76', '25582.76', '', ''),
(13, 'De las mujeres', 'Ninguna', 'Cynthia Savino', 'VIOLENCIA DE GENERO', 'NO', 'Interés Gral. para la Ciudadanía', 'B', 'Actividades de visibilizacion', 'Cantidad', '0', '0', '0', '0', '0', '300', '200', '0', '0', '0', '', ''),
(14, 'De las mujeres', 'Ninguna', 'Cynthia Savino', 'VIOLENCIA DE GENERO', 'NO', 'Interés Gral. para la Ciudadanía', 'B', 'Actividades de territorio', 'Cantidad', '0', '0', '0', '0', '0', '20', '30', '0', '0', '0', '', ''),
(15, 'General', 'Medio ambiente y espacio publico', 'Silvana Piguillem', 'SERVICIO AL VECINO', 'SI', 'Recolección diferenciada de residuos domiciliarios', 'A', 'Recolección diferenciada de residuos domiciliario', 'Cantidad', '0', '0', '0', '0', '0', '0', '0', '0', '760', '1160', '', ''),
(16, 'Centro de logí­stica y servicios municipales', 'Gerente CDF', 'Horacio Mansilla', 'SERVICIO AL VECINO', 'NO', 'Programa de tratamiento de residuos', 'B', '$ por venta de recuperado', 'Pesos', '0', '0', '0', '0', '0', '0', '0', '0', '0', '160958', '79684', ''),
(17, 'Centro de logí­stica y servicios municipales', 'Gerente CDF', 'Horacio Mansilla', 'SERVICIO AL VECINO', 'NO', 'Programa de tratamiento de residuos', 'B', '$ por venta de disposición final', 'Cantidad', '0', '0', '0', '0', '0', '0', '0', '0', '430878', '590161', '', ''),
(19, 'General', 'Medio Ambiente y Espacio Público', 'Silvana Piguillem', 'SERVICIO AL VECINO', 'SI', 'Inspecciones realizadas generadores peligrosos, industriales y patológicos ', 'A', 'Inspecciones realizadas generadores peligrosos, industriales y patológicos ', 'Cantidad', '54', '50', '58', '62', '80', '70', '67', '50', '52', '50', '', '');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `login`
--

CREATE TABLE IF NOT EXISTS `login` (
`ID` int(11) NOT NULL,
  `privilegio` int(255) NOT NULL,
  `usuario` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `pass` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `apellido` varchar(255) COLLATE utf8_spanish_ci NOT NULL,
  `nombre` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `dni` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `secretaria` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `direccion` varchar(100) COLLATE utf8_spanish_ci NOT NULL,
  `sec_dir` int(255) NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `login`
--

INSERT INTO `login` (`ID`, `privilegio`, `usuario`, `pass`, `apellido`, `nombre`, `dni`, `secretaria`, `direccion`, `sec_dir`) VALUES
(1, 1, 'lmoreno', 'demo', 'Moreno', 'Lucas Omar', '34060398', 'Innovación', 'Modernización del estado', 1),
(10, 1, 'gbregy', 'demo', 'Bregy', 'Gustavo', '28333190', 'Innovación', 'Modernización del estado', 1),
(11, 1, 'pgodoy', 'demo', 'Godoy', 'Maria de la paz', '29426329', 'Innovación', 'Modernización del estado', 1),
(13, 1, 'mjalvarez', 'demo', 'Alvarez', 'María José ', '30070221', 'Innovación', 'Modernización del estado', 1),
(15, 1, 'eponce', 'demo', 'Ponce', 'Enrique', '7669559', 'Intendencia', 'Ninguna', 0),
(17, 1, 'jbenosa', 'demo', 'Benosa', 'Jimena', '29232395', 'Innovación', 'Modernización del estado', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `secretaria`
--

CREATE TABLE IF NOT EXISTS `secretaria` (
`ID` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `secretaria`
--

INSERT INTO `secretaria` (`ID`, `nombre`) VALUES
(1, 'Centro de logí­stica y servicios municipales'),
(2, 'De las mujeres'),
(3, 'General'),
(4, 'Gobierno'),
(5, 'Hacienda'),
(6, 'Infraestructura'),
(7, 'Innovación'),
(8, 'Legal y Técnica'),
(9, 'Salud'),
(10, 'Seguridad'),
(11, 'Servicios Públicos'),
(13, 'Intendencia');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `unidad`
--

CREATE TABLE IF NOT EXISTS `unidad` (
`ID` int(11) NOT NULL,
  `nombre` varchar(255) COLLATE utf8_spanish_ci NOT NULL
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `unidad`
--

INSERT INTO `unidad` (`ID`, `nombre`) VALUES
(1, 'Pesos'),
(2, 'Porcentaje'),
(3, 'Toneladas'),
(4, 'Cantidad'),
(5, 'Litros'),
(6, 'Días');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `direccion`
--
ALTER TABLE `direccion`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `indicadores`
--
ALTER TABLE `indicadores`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `login`
--
ALTER TABLE `login`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `secretaria`
--
ALTER TABLE `secretaria`
 ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `unidad`
--
ALTER TABLE `unidad`
 ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `direccion`
--
ALTER TABLE `direccion`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=61;
--
-- AUTO_INCREMENT de la tabla `indicadores`
--
ALTER TABLE `indicadores`
MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT de la tabla `login`
--
ALTER TABLE `login`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=18;
--
-- AUTO_INCREMENT de la tabla `secretaria`
--
ALTER TABLE `secretaria`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT de la tabla `unidad`
--
ALTER TABLE `unidad`
MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
