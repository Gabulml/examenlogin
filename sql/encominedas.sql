-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 24-02-2016 a las 17:39:20
-- Versión del servidor: 5.6.21
-- Versión de PHP: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Base de datos: `encominedas`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `bus`
--

CREATE TABLE IF NOT EXISTS `bus` (
  `IDBus` varchar(20) NOT NULL,
  `nombreBus` varchar(80) NOT NULL,
  `telefonoBus` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `bus`
--

INSERT INTO `bus` (`IDBus`, `nombreBus`, `telefonoBus`) VALUES
('AER1003', 'COOP. TRANSPORTE AERO TAXI', 2955200),
('AND1001', 'TRANSPORTES ANDINA', 2950833),
('ECU1006', 'TRANSPORTES COLOMBO ECUATORIANA', 2955625),
('ESP1002', 'COOP. DE TRANSPORTES EUGENIO ESPEJO', 2959917),
('IMB1005', 'TRANSPORTES FLOTA IMBABURA', 2952440),
('OPI1007', 'COOP. ORIENTAL PIMAMPIRO', 2472751),
('PUL1008', 'PULMAN CARCHI', 3500418),
('TUR1004', 'TRANSPORTES EXPRESO TURISMO', 2951110);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE IF NOT EXISTS `cliente` (
  `IDCliente` int(11) NOT NULL,
  `nombreCliente` varchar(20) NOT NULL,
  `apellidoCliente` varchar(20) NOT NULL,
  `telefonoCliente` int(11) NOT NULL,
  `direccionCliente` varchar(50) DEFAULT NULL,
  `ciudadCliente` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`IDCliente`, `nombreCliente`, `apellidoCliente`, `telefonoCliente`, `direccionCliente`, `ciudadCliente`) VALUES
(1002003004, 'Dayana', 'Cuaspud', 580466, 'Priorato', 'Ibarra'),
(1002972824, 'Matep', 'Salcedo', 234567, 'Atuntaqui', 'Atuntaqui'),
(1003952528, 'Nataly Gabriela', 'Cuaspud Pineda', 580455, 'Priorato 4 Esquinas Via Aloburo', 'Ibarra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE IF NOT EXISTS `empleado` (
  `IDEmpleado` int(11) NOT NULL,
  `nombreEmpleado` varchar(20) NOT NULL,
  `apellidoEmpleado` varchar(20) NOT NULL,
  `cargoEmpleado` varchar(30) DEFAULT NULL,
  `edadEmpleado` int(11) DEFAULT NULL,
  `fechaContratoEmpleado` date DEFAULT NULL,
  `direccionEmpleado` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`IDEmpleado`, `nombreEmpleado`, `apellidoEmpleado`, `cargoEmpleado`, `edadEmpleado`, `fechaContratoEmpleado`, `direccionEmpleado`) VALUES
(1003952528, 'MarÃ­a JosÃ©', 'Loza', 'SECRETARIA NOCHE', 21, '2016-02-24', 'Ibarra'),
(1004005006, 'Carmina', 'Loza', 'SECRETARIA NOCHE', 21, '2016-02-23', 'Ibarra'),
(2003004005, 'Paulina', 'Loyo', 'SECRETARIA TARDE', 25, '2016-02-23', 'Ibarra');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `pedido`
--

CREATE TABLE IF NOT EXISTS `pedido` (
`IDPedido` int(11) NOT NULL,
  `IDCliente` int(11) NOT NULL,
  `IDEmpleado` int(11) NOT NULL,
  `fechaPedido` date DEFAULT NULL,
  `fechaEntrega` date DEFAULT NULL,
  `fechaEnvio` date DEFAULT NULL,
  `IDBus` varchar(20) NOT NULL,
  `productoDestinatario` varchar(2000) NOT NULL,
  `nombreDestinatario` varchar(30) NOT NULL,
  `apellidoDestinatario` varchar(30) NOT NULL,
  `direccionDestino` varchar(50) NOT NULL,
  `ciudadDestino` varchar(50) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `pedido`
--

INSERT INTO `pedido` (`IDPedido`, `IDCliente`, `IDEmpleado`, `fechaPedido`, `fechaEntrega`, `fechaEnvio`, `IDBus`, `productoDestinatario`, `nombreDestinatario`, `apellidoDestinatario`, `direccionDestino`, `ciudadDestino`) VALUES
(1, 1002972824, 1004005006, '2016-02-23', '2016-02-23', '2016-02-23', 'ESP1002', 'dasd', 'fgbh', 'fghj', 'fghjk', 'ghjk'),
(3, 1002972824, 1004005006, '2016-02-23', '2016-02-23', '2016-02-23', 'ESP1002', 'dasd', 'fgbh', 'fghj', 'fghjk', 'ghjk'),
(4, 1003952528, 2003004005, '2016-02-23', '2016-02-23', '2016-02-23', 'ESP1002', 'mateo gordito ', 'gaby', 'Cuaspud', 'Priorato 4 Esquinas ', 'Ibarra'),
(5, 1002972824, 1004005006, '2016-02-23', '2016-02-23', '2016-02-23', 'ESP1002', 'Botellas, play station', 'Dayana', 'Vila', 'Priorato 4 Esquinas ', 'Ibarra'),
(7, 1002972824, 1003952528, '2016-02-24', '2016-02-24', '2016-02-24', 'AND1001', 'Sabanas, Cobijas', 'Lorena', 'Cuaspud', 'Barrio Olimpico', 'Quito');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `bus`
--
ALTER TABLE `bus`
 ADD PRIMARY KEY (`IDBus`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
 ADD PRIMARY KEY (`IDCliente`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
 ADD PRIMARY KEY (`IDEmpleado`);

--
-- Indices de la tabla `pedido`
--
ALTER TABLE `pedido`
 ADD PRIMARY KEY (`IDPedido`), ADD KEY `cliente_fk` (`IDCliente`), ADD KEY `empleado_fk` (`IDEmpleado`), ADD KEY `bus_fk` (`IDBus`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `pedido`
--
ALTER TABLE `pedido`
MODIFY `IDPedido` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=8;
--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `pedido`
--
ALTER TABLE `pedido`
ADD CONSTRAINT `bus_fk` FOREIGN KEY (`IDBus`) REFERENCES `bus` (`IDBus`),
ADD CONSTRAINT `cliente_fk` FOREIGN KEY (`IDCliente`) REFERENCES `cliente` (`IDCliente`),
ADD CONSTRAINT `empleado_fk` FOREIGN KEY (`IDEmpleado`) REFERENCES `empleado` (`IDEmpleado`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
