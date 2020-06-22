-- phpMyAdmin SQL Dump
-- version 4.2.12deb2+deb8u3
-- http://www.phpmyadmin.net
--
-- Servidor: localhost
-- Tiempo de generación: 29-08-2018 a las 17:04:06
-- Versión del servidor: 5.5.60-0+deb8u1
-- Versión de PHP: 5.6.36-0+deb8u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `axecapital`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_asesor`
--

CREATE TABLE IF NOT EXISTS `t_asesor` (
`co_asesor` int(9) NOT NULL,
  `tx_asesor` varchar(250) NOT NULL,
  `tx_email` varchar(250) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_asesor`
--

INSERT INTO `t_asesor` (`co_asesor`, `tx_asesor`, `tx_email`) VALUES
(1, 'ABOG. JESUS BELIZARIO', 'belizarioja@gmail.com');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cita`
--

CREATE TABLE IF NOT EXISTS `t_cita` (
`co_cita` int(9) NOT NULL,
  `co_cliente` int(9) NOT NULL,
  `co_asesor` int(9) NOT NULL,
  `fe_cita` date NOT NULL,
  `ho_cita` time NOT NULL,
  `co_estatus` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_cita`
--

INSERT INTO `t_cita` (`co_cita`, `co_cliente`, `co_asesor`, `fe_cita`, `ho_cita`, `co_estatus`) VALUES
(1, 1, 1, '2018-08-29', '08:30:00', 1),
(2, 1, 1, '2018-08-30', '04:30:00', 1),
(3, 1, 1, '2018-08-31', '15:45:00', 1),
(4, 1, 1, '2018-08-31', '11:53:00', 1),
(5, 1, 1, '2018-09-07', '17:30:00', 1),
(6, 1, 1, '2018-08-30', '14:59:00', 1),
(7, 0, 1, '2018-08-30', '14:59:00', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_cliente`
--

CREATE TABLE IF NOT EXISTS `t_cliente` (
`co_cliente` int(9) NOT NULL,
  `tx_dni_cliente` varchar(20) NOT NULL,
  `tx_nombre` varchar(250) NOT NULL,
  `nu_edad` int(3) NOT NULL,
  `tx_telefono` varchar(20) NOT NULL,
  `tx_direccion` varchar(250) NOT NULL,
  `tx_referencia` varchar(250) NOT NULL,
  `tx_trabajo` varchar(500) NOT NULL,
  `va_sueldo` decimal(10,2) NOT NULL,
  `va_linea_tc` decimal(10,2) NOT NULL,
  `tx_hipoteca` varchar(20) NOT NULL,
  `tx_vehiculo` varchar(100) NOT NULL,
  `tx_email` varchar(250) NOT NULL,
  `co_sbs` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_cliente`
--

INSERT INTO `t_cliente` (`co_cliente`, `tx_dni_cliente`, `tx_nombre`, `nu_edad`, `tx_telefono`, `tx_direccion`, `tx_referencia`, `tx_trabajo`, `va_sueldo`, `va_linea_tc`, `tx_hipoteca`, `tx_vehiculo`, `tx_email`, `co_sbs`) VALUES
(1, '123456', 'LUIS MARTIN VALLES', 43, '4234234', 'AVENIDA', 'TERTERTERTERT', 'TTTTTTTT', 13000.00, 23000.00, '', 'FORD FOCUS', 'kkkk@mm.com', 1),
(4, '222222', 'luisa', 0, '', '', '', '', 0.00, 0.00, '', '', '', 1),
(5, '333333', 'qweqwe', 0, '', '', '', '', 0.00, 0.00, '', '', '', 2);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_estatus`
--

CREATE TABLE IF NOT EXISTS `t_estatus` (
  `co_estatus` int(2) NOT NULL,
  `tx_estatus` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_estatus`
--

INSERT INTO `t_estatus` (`co_estatus`, `tx_estatus`) VALUES
(1, 'ACTVA'),
(2, 'CANCELADA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_hijo`
--

CREATE TABLE IF NOT EXISTS `t_hijo` (
`co_hijo` int(9) NOT NULL,
  `co_cliente` int(9) NOT NULL,
  `nu_edad` int(3) NOT NULL,
  `co_sexo` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_hijo`
--

INSERT INTO `t_hijo` (`co_hijo`, `co_cliente`, `nu_edad`, `co_sexo`) VALUES
(4, 4, 2, 1),
(5, 4, 8, 2),
(6, 4, 5, 2),
(7, 5, 0, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_permisologia`
--

CREATE TABLE IF NOT EXISTS `t_permisologia` (
  `co_permisologia` int(2) NOT NULL,
  `tx_permisologia` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_permisologia`
--

INSERT INTO `t_permisologia` (`co_permisologia`, `tx_permisologia`) VALUES
(1, 'ADMINISTRADOR'),
(2, 'USUARIO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_sbs`
--

CREATE TABLE IF NOT EXISTS `t_sbs` (
  `co_sbs` int(2) NOT NULL,
  `tx_sbs` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_sbs`
--

INSERT INTO `t_sbs` (`co_sbs`, `tx_sbs`) VALUES
(1, 'NORMAL'),
(2, 'CON PROBLEMA'),
(3, 'DEFICIENTE'),
(4, 'DUDOSO'),
(5, 'PERDIDA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_sexo`
--

CREATE TABLE IF NOT EXISTS `t_sexo` (
  `co_sexo` int(2) NOT NULL,
  `tx_sexo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_sexo`
--

INSERT INTO `t_sexo` (`co_sexo`, `tx_sexo`) VALUES
(1, 'MASCULINO'),
(2, 'FEMENINO');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `t_usuario`
--

CREATE TABLE IF NOT EXISTS `t_usuario` (
`co_usuario` int(9) NOT NULL,
  `tx_usuario` varchar(50) NOT NULL,
  `tx_nombre` varchar(250) NOT NULL,
  `tx_clave` varchar(100) NOT NULL,
  `co_permisologia` int(2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `t_usuario`
--

INSERT INTO `t_usuario` (`co_usuario`, `tx_usuario`, `tx_nombre`, `tx_clave`, `co_permisologia`) VALUES
(1, 'admin', 'YULE SOSA', '123456', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `t_asesor`
--
ALTER TABLE `t_asesor`
 ADD PRIMARY KEY (`co_asesor`);

--
-- Indices de la tabla `t_cita`
--
ALTER TABLE `t_cita`
 ADD PRIMARY KEY (`co_cita`);

--
-- Indices de la tabla `t_cliente`
--
ALTER TABLE `t_cliente`
 ADD PRIMARY KEY (`co_cliente`);

--
-- Indices de la tabla `t_estatus`
--
ALTER TABLE `t_estatus`
 ADD PRIMARY KEY (`co_estatus`);

--
-- Indices de la tabla `t_hijo`
--
ALTER TABLE `t_hijo`
 ADD PRIMARY KEY (`co_hijo`);

--
-- Indices de la tabla `t_permisologia`
--
ALTER TABLE `t_permisologia`
 ADD PRIMARY KEY (`co_permisologia`);

--
-- Indices de la tabla `t_sbs`
--
ALTER TABLE `t_sbs`
 ADD PRIMARY KEY (`co_sbs`);

--
-- Indices de la tabla `t_sexo`
--
ALTER TABLE `t_sexo`
 ADD PRIMARY KEY (`co_sexo`);

--
-- Indices de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
 ADD PRIMARY KEY (`co_usuario`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `t_asesor`
--
ALTER TABLE `t_asesor`
MODIFY `co_asesor` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT de la tabla `t_cita`
--
ALTER TABLE `t_cita`
MODIFY `co_cita` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `t_cliente`
--
ALTER TABLE `t_cliente`
MODIFY `co_cliente` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `t_hijo`
--
ALTER TABLE `t_hijo`
MODIFY `co_hijo` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT de la tabla `t_usuario`
--
ALTER TABLE `t_usuario`
MODIFY `co_usuario` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
