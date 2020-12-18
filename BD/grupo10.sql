-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 12-12-2020 a las 15:11:29
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `grupo10`
--
CREATE DATABASE IF NOT EXISTS `grupo10` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `grupo10`;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `arrastrado`
--

CREATE TABLE `arrastrado` (
  `id_arrastrado` int(11) NOT NULL,
  `nro_chasis` varchar(40) DEFAULT NULL,
  `patente_arrastrado` varchar(40) DEFAULT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `arrastrado`
--

INSERT INTO `arrastrado` (`id_arrastrado`, `nro_chasis`, `patente_arrastrado`, `eliminado`) VALUES
(1, '312312', 'dasd123adss', 1),
(2, '129831209321 modificado', 'AA555AA', 0),
(5, 'AX990CM', '31245434t453', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga`
--

CREATE TABLE `carga` (
  `id_tipo_carga` int(11) NOT NULL,
  `tipo` varchar(40) DEFAULT NULL,
  `peso_neto` double DEFAULT NULL,
  `hazard` varchar(40) DEFAULT NULL,
  `refeer` varchar(40) DEFAULT NULL,
  `id_proforma` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carga_combustible`
--

CREATE TABLE `carga_combustible` (
  `id_carga` int(11) NOT NULL,
  `cantidad_litros` double DEFAULT NULL,
  `importe` double DEFAULT NULL,
  `lugar` varchar(40) DEFAULT NULL,
  `id_proforma` int(11) DEFAULT NULL,
  `id_posicion` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `carga_combustible`
--

INSERT INTO `carga_combustible` (`id_carga`, `cantidad_litros`, `importe`, `lugar`, `id_proforma`, `id_posicion`) VALUES
(1, 12, 1200, 'itu', 68, NULL),
(2, 12, 1200, 'itu', 68, NULL),
(3, 12, 1222, '21212', 68, NULL),
(4, 4141, 4141, '4141', 70, NULL),
(5, 15, 50000000, 'asdasd', 70, NULL),
(6, 455, 1, 'asd', 70, NULL),
(7, 41, 41, '41', 70, NULL),
(8, 41, 41, '41', 70, NULL),
(9, 41, 41, '', 70, NULL),
(10, 41, 41, '', 70, NULL),
(11, 2000, 200, 'Rosario', 78, NULL);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `celular`
--

CREATE TABLE `celular` (
  `id_celular` int(11) NOT NULL,
  `nro` int(11) DEFAULT NULL,
  `id_posicion` int(11) DEFAULT NULL,
  `id_chofer` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `celular`
--

INSERT INTO `celular` (`id_celular`, `nro`, `id_posicion`, `id_chofer`) VALUES
(11, 1524443233, NULL, 'Maurod'),
(12, 1578654329, NULL, 'Daniel12');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cliente`
--

CREATE TABLE `cliente` (
  `id_cliente` int(11) NOT NULL,
  `email` varchar(40) DEFAULT NULL,
  `telefono` varchar(40) DEFAULT NULL,
  `contacto1` varchar(40) DEFAULT NULL,
  `contacto2` varchar(40) DEFAULT NULL,
  `cuit` varchar(40) DEFAULT NULL,
  `denominacion` varchar(40) DEFAULT NULL,
  `direccion_calle` varchar(40) DEFAULT NULL,
  `direccion_nro` varchar(40) DEFAULT NULL,
  `direccion_cp` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `cliente`
--

INSERT INTO `cliente` (`id_cliente`, `email`, `telefono`, `contacto1`, `contacto2`, `cuit`, `denominacion`, `direccion_calle`, `direccion_nro`, `direccion_cp`) VALUES
(1, 'nicolasherrera_05@hotmail.com', '123123', 'asdas', 'dasda', '213123', 'Tesla Motors Modificado', 'as', '1232', '1231'),
(34, 'dasd', 'lkj', 'lkj', 'lkj', 'lkj', 'Coca Cola', 'l', 'kjl', 'jl'),
(36, 'nicolasherrera_05@hotmail.com', '393847589', 'Miguel Ramirez', 'Daniela Mendez', '30939599', 'Samsung Modificado', 'Derqui', '3030', '1754');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `empleado`
--

CREATE TABLE `empleado` (
  `usuario` varchar(40) NOT NULL,
  `nombre_completo` varchar(40) DEFAULT NULL,
  `password` varchar(40) DEFAULT NULL,
  `dni` int(11) DEFAULT NULL,
  `f_nac` date DEFAULT NULL,
  `tipo_licencia` int(11) DEFAULT NULL,
  `id_rol` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `empleado`
--

INSERT INTO `empleado` (`usuario`, `nombre_completo`, `password`, `dni`, `f_nac`, `tipo_licencia`, `id_rol`) VALUES
('', 'Angel Rodriguesssssssssssssaaaaaaa', '12', 2147483647, '1999-12-12', NULL, 6),
('ale12', 'Alejandro', '12', 12, '2020-12-23', NULL, 2),
('angel12', 'Angel Rodriguez', '12', 12, '2020-12-30', NULL, 4),
('Daniel12', 'aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa', '12', 12, '1999-12-12', 12, 3),
('juan2', 'juan333333333333333', '12', 12, '1999-12-12', NULL, 2),
('Maurod', 'Mauro Dallasera', '12', 12, '1999-12-12', 9, 3),
('nico12', 'Nicolas Herrera', '12', 12, '1986-08-16', NULL, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `mecanico`
--

CREATE TABLE `mecanico` (
  `id_mecanico` int(11) NOT NULL,
  `nombre` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `mecanico`
--

INSERT INTO `mecanico` (`id_mecanico`, `nombre`) VALUES
(1, 'Chirola'),
(2, 'Ramon Puerta');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `posicion`
--

CREATE TABLE `posicion` (
  `id_posicion` int(11) NOT NULL,
  `cor1` varchar(40) DEFAULT NULL,
  `cor2` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `proforma`
--

CREATE TABLE `proforma` (
  `id_proforma` int(11) NOT NULL,
  `id_tractor` int(11) DEFAULT NULL,
  `id_arrastrado` int(11) DEFAULT NULL,
  `id_cliente` int(11) DEFAULT NULL,
  `usuario` varchar(40) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `viaje_origen` varchar(40) DEFAULT NULL,
  `viaje_destino` varchar(40) DEFAULT NULL,
  `viaje_fecha_carga` date DEFAULT NULL,
  `viaje_ETA` date DEFAULT NULL,
  `carga_tipo` varchar(40) DEFAULT NULL,
  `carga_peso` double DEFAULT NULL,
  `carga_tipo_hazard` varchar(40) DEFAULT NULL,
  `carga_temperatura_reefer` varchar(40) DEFAULT NULL,
  `costeo_km_estimados` double DEFAULT NULL,
  `costeo_km_reales` double DEFAULT NULL,
  `costeo_combustible_estimado` double DEFAULT NULL,
  `costeo_combustible_real` double DEFAULT NULL,
  `fecha_partida_real` date DEFAULT NULL,
  `fecha_arribo_real` date DEFAULT NULL,
  `costeo_viaticos_estimado` double DEFAULT NULL,
  `costeo_viaticos_real` double DEFAULT NULL,
  `costeo_peajes_estimado` double DEFAULT NULL,
  `costeo_peajes_real` double DEFAULT NULL,
  `costeo_pesajes_estimado` double DEFAULT NULL,
  `costeo_pesajes_real` double DEFAULT NULL,
  `costeo_extras_estimado` double DEFAULT NULL,
  `costeo_extras_real` double DEFAULT NULL,
  `costeo_hazard_estimado` double DEFAULT NULL,
  `costeo_hazard_real` double DEFAULT NULL,
  `costeo_reefer_estimado` double DEFAULT NULL,
  `costeo_reefer_real` double DEFAULT NULL,
  `costeo_fee_estimado` double DEFAULT NULL,
  `costeo_fee_real` double DEFAULT NULL,
  `estado` varchar(40) DEFAULT 'pendiente',
  `costeo_total_real` double DEFAULT NULL,
  `costeo_total_estimado` double DEFAULT NULL,
  `viaje_ETD` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `proforma`
--

INSERT INTO `proforma` (`id_proforma`, `id_tractor`, `id_arrastrado`, `id_cliente`, `usuario`, `fecha`, `viaje_origen`, `viaje_destino`, `viaje_fecha_carga`, `viaje_ETA`, `carga_tipo`, `carga_peso`, `carga_tipo_hazard`, `carga_temperatura_reefer`, `costeo_km_estimados`, `costeo_km_reales`, `costeo_combustible_estimado`, `costeo_combustible_real`, `fecha_partida_real`, `fecha_arribo_real`, `costeo_viaticos_estimado`, `costeo_viaticos_real`, `costeo_peajes_estimado`, `costeo_peajes_real`, `costeo_pesajes_estimado`, `costeo_pesajes_real`, `costeo_extras_estimado`, `costeo_extras_real`, `costeo_hazard_estimado`, `costeo_hazard_real`, `costeo_reefer_estimado`, `costeo_reefer_real`, `costeo_fee_estimado`, `costeo_fee_real`, `estado`, `costeo_total_real`, `costeo_total_estimado`, `viaje_ETD`) VALUES
(68, 2, 1, 34, 'Maurod', '1999-12-12', 'Argentina', 'Uruguay', '2020-12-25', '0000-00-00', 'granel', 1, 'class', '1', 1, 1e21, 1, 1111111, '2020-12-29', '2020-12-22', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 'FINALIZADO', 1111118, 8, NULL),
(70, 1, 1, 1, 'Daniel12', '2020-11-03', 'Buenos Aires', 'Mar del plata', '2020-11-11', '0000-00-00', 'liquida', 1, 'class', '1', 1, 1010, 1, 50004142, '0010-10-10', '0010-10-10', 1, 12, 1, 12, 1, 12, 1, 12, 1, 12, 1, 12, 1, 12, 'Finalizado', 50005236, NULL, NULL),
(71, 1, 1, 1, 'Maurod', '2020-12-07', 'Rosario', 'Cordoba', '0010-10-10', '2020-12-23', 'liquida', 2000, 'Sclass', '29', 200, 2000, 200, 2000, '2020-12-22', '2020-12-09', 2000, 1, 30000, 11, 40000, 1, 50000, 1, 6000, 1, 7000, 1, 8000, 1, 'FINALIZADO', 2017, 143200, NULL),
(72, 2, 1, 1, 'Maurod', '2020-12-11', 'Buenos Aires', 'Cordoba', '0010-10-10', '2020-12-23', 'granel', 20000, 'class', '20000', 2000, NULL, 1, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 11, NULL, 'pendiente', NULL, 2018, NULL),
(74, 1, 1, 1, 'Daniel12', '2020-12-20', '1', '13', '0001-01-01', '0001-01-01', 'granel', 1, 'class', '1', 1, NULL, 1, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 'pendiente', NULL, 9, NULL),
(75, 1, 1, 1, 'Maurod', '2020-12-01', '1', '1', '2020-12-02', '2020-12-06', 'granel', 1, 'class', '1', 1, 2000, 1, 900, '2020-12-14', '2020-12-15', 1, 3900, 1, 2000, 1, 2000, 1, 1000, 1, 1000, 11, 1000, 12, 1000, 'Finalizado', 14800, 30, '2020-12-04'),
(76, 1, 1, 1, 'Daniel12', '1992-11-10', 'asdasd', 'asdasd', '1111-11-10', '1111-11-11', 'granel', 1000, 'class', '20', 10, NULL, 10, NULL, NULL, NULL, 10, NULL, 10, NULL, 10, NULL, 10, NULL, 10, NULL, 10, NULL, 10, NULL, 'pendiente', NULL, 90, '1111-11-11'),
(77, 3, 1, 36, 'Maurod', '2020-12-08', 'Buenos Aires', 'Mar del plata', '2020-12-18', '2020-12-31', 'granel', 20000, 'Sclass', '15 grados centigrados', 10, NULL, 2000, NULL, NULL, NULL, 2000, NULL, 2000, NULL, 2000, NULL, 200, NULL, 2002, NULL, 200, NULL, 200, NULL, 'pendiente', NULL, 10612, '2020-12-07'),
(78, 3, 1, 36, 'Maurod', '2020-12-08', 'Buenos Aires', 'Mar del plata', '2020-12-23', '2020-12-23', 'granel', 20000, 'class', '20', 2000, NULL, 1, NULL, NULL, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 1, NULL, 'pendiente', NULL, 2008, '2020-12-15');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol`
--

CREATE TABLE `rol` (
  `id_rol` int(11) NOT NULL,
  `descripcion` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `rol`
--

INSERT INTO `rol` (`id_rol`, `descripcion`) VALUES
(1, 'administrador'),
(2, 'supervisor'),
(3, 'chofer'),
(4, 'encargadoDeTaller'),
(5, 'mecanico'),
(6, 'bloqueado');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `service`
--

CREATE TABLE `service` (
  `id_service` int(11) NOT NULL,
  `costo` double DEFAULT NULL,
  `descripcion` varchar(40) DEFAULT NULL,
  `fecha` date DEFAULT NULL,
  `repuesto_utilizado` varchar(40) DEFAULT NULL,
  `id_tractor` int(11) DEFAULT NULL,
  `id_mecanico` int(11) DEFAULT NULL,
  `km_unidad` double DEFAULT NULL,
  `tipo_service` varchar(40) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `service`
--

INSERT INTO `service` (`id_service`, `costo`, `descripcion`, `fecha`, `repuesto_utilizado`, `id_tractor`, `id_mecanico`, `km_unidad`, `tipo_service`) VALUES
(1, 200, 'Cambio de aceite importado', '2019-01-01', 'Motul 20 50 mineral', 2, 2, 200000, 'interno'),
(2, 1321, 'cambio de cubiertas', '2000-12-12', '4 cubiertas 210 40 40', 2, 2, NULL, NULL),
(3, 70000, 'Cambio de tren delantero', '2020-11-12', 'Tren delantero completo', 1, 2, NULL, NULL),
(4, 999, 'Cambio de aros', '1999-12-12', 'Aros', 1, 2, NULL, NULL),
(5, 200, 'Cambio de rulemanes', '1999-12-12', 'rulemanes XXL', 2, 2, NULL, NULL),
(6, 90000, 'Cambio de opticas', '1999-12-12', 'Opticas iveco 3306', 2, 2, 200000, 'interno'),
(7, 20000, 'Cambio de tren delantero Modificado', '2020-12-08', 'Tren delantero completo', 1, 1, 200000, 'interno'),
(8, 200, 'Cambio de aros', '2020-12-16', 'aros', 1, 2, 200000, 'interno');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipo_de_licencia`
--

CREATE TABLE `tipo_de_licencia` (
  `id_tipo_licencia` int(11) NOT NULL,
  `tipo_de_licencia` varchar(40) DEFAULT NULL,
  `descripcion` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tipo_de_licencia`
--

INSERT INTO `tipo_de_licencia` (`id_tipo_licencia`, `tipo_de_licencia`, `descripcion`) VALUES
(1, 'A1', 'Motocicletas'),
(2, 'A2', 'Triciclos y cuatriciclos'),
(5, 'A3', ' Triciclos y cuatriciclos cabinados de cualquier cilindrada '),
(6, 'B1', ' Triciclos y cuatriciclos cabinados de cualquier cilindrada o kilowatts con volante direccional.\r\nClase B'),
(7, 'B2', 'Automóviles, utilitarios, camionetas, vans de uso privado y casas rodantes hasta 3500 kg.'),
(8, 'C1', 'Camiones sin acoplado o casas rodantes motorizadas hasta 24.000 kg.'),
(9, 'C2', 'Camiones sin acoplado o casas rodantes motorizadas hasta 12.000 kg.'),
(10, 'C3', 'Camiones sin acoplado o casas rodantes motorizadas de más de 24.000 kg.'),
(11, 'D1', 'Transporte de pasajeros de hasta 8 plazas.'),
(12, 'D2', 'Transporte de pasajeros de 8 hasta 20 plazas.'),
(13, 'D3', 'Transporte de pasajeros de más de 20 plazas.'),
(14, 'D4', 'Servicio de urgencia, emergencia y similares.'),
(15, 'E1', 'Vehículos con uno o más remolques y/o articulaciones.'),
(16, 'E2', 'Maquinaria especial no agrícola.'),
(17, 'F', 'Adaptación técnica vehicular.'),
(18, 'G1', 'Tractores agrícolas.'),
(19, 'G2', 'Maquinaria especial agrícola.'),
(20, 'G3', 'Tren agrícola.');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tractor`
--

CREATE TABLE `tractor` (
  `id_tractor` int(11) NOT NULL,
  `año_fabricacion` date DEFAULT NULL,
  `nro_motor` varchar(40) DEFAULT NULL,
  `nro_chasis` varchar(40) DEFAULT NULL,
  `marca` varchar(40) DEFAULT NULL,
  `modelo` varchar(40) DEFAULT NULL,
  `patente_tractor` varchar(40) DEFAULT NULL,
  `kilometraje` double DEFAULT NULL,
  `eliminado` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `tractor`
--

INSERT INTO `tractor` (`id_tractor`, `año_fabricacion`, `nro_motor`, `nro_chasis`, `marca`, `modelo`, `patente_tractor`, `kilometraje`, `eliminado`) VALUES
(1, '2020-11-03', '3123', '312312', 'dsadas', 'dasdas', 'AD223CN', 12321, 1),
(2, '1999-10-10', '12314r3r345', 'Mia34mdsakl2', 'Ford', 'Ranger', '833KEY', 1000, 1),
(3, '2020-12-23', '876547364546', 'AM876C8933YY', 'Iveco Modificado', 'X-2000', 'AA990CC', 20000, 0);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `arrastrado`
--
ALTER TABLE `arrastrado`
  ADD PRIMARY KEY (`id_arrastrado`);

--
-- Indices de la tabla `carga`
--
ALTER TABLE `carga`
  ADD PRIMARY KEY (`id_tipo_carga`),
  ADD KEY `carga_proforma` (`id_proforma`);

--
-- Indices de la tabla `carga_combustible`
--
ALTER TABLE `carga_combustible`
  ADD PRIMARY KEY (`id_carga`),
  ADD KEY `cargaCombustible_proforma` (`id_proforma`),
  ADD KEY `posicion_carga` (`id_posicion`);

--
-- Indices de la tabla `celular`
--
ALTER TABLE `celular`
  ADD PRIMARY KEY (`id_celular`),
  ADD UNIQUE KEY `id_chofer` (`id_chofer`),
  ADD KEY `celular_posicion` (`id_posicion`);

--
-- Indices de la tabla `cliente`
--
ALTER TABLE `cliente`
  ADD PRIMARY KEY (`id_cliente`);

--
-- Indices de la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD PRIMARY KEY (`usuario`),
  ADD KEY `empleado_rol` (`id_rol`),
  ADD KEY `tipo_de_licencia` (`tipo_licencia`);

--
-- Indices de la tabla `mecanico`
--
ALTER TABLE `mecanico`
  ADD PRIMARY KEY (`id_mecanico`);

--
-- Indices de la tabla `posicion`
--
ALTER TABLE `posicion`
  ADD PRIMARY KEY (`id_posicion`);

--
-- Indices de la tabla `proforma`
--
ALTER TABLE `proforma`
  ADD PRIMARY KEY (`id_proforma`),
  ADD KEY `proforma_tractor` (`id_tractor`),
  ADD KEY `proforma_arrastrado` (`id_arrastrado`),
  ADD KEY `proforma_cliente` (`id_cliente`),
  ADD KEY `proforma_empleado1` (`usuario`);

--
-- Indices de la tabla `rol`
--
ALTER TABLE `rol`
  ADD PRIMARY KEY (`id_rol`);

--
-- Indices de la tabla `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`id_service`),
  ADD KEY `service_tractor` (`id_tractor`),
  ADD KEY `service_mecanico` (`id_mecanico`);

--
-- Indices de la tabla `tipo_de_licencia`
--
ALTER TABLE `tipo_de_licencia`
  ADD PRIMARY KEY (`id_tipo_licencia`);

--
-- Indices de la tabla `tractor`
--
ALTER TABLE `tractor`
  ADD PRIMARY KEY (`id_tractor`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `arrastrado`
--
ALTER TABLE `arrastrado`
  MODIFY `id_arrastrado` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `carga`
--
ALTER TABLE `carga`
  MODIFY `id_tipo_carga` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `carga_combustible`
--
ALTER TABLE `carga_combustible`
  MODIFY `id_carga` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT de la tabla `celular`
--
ALTER TABLE `celular`
  MODIFY `id_celular` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `cliente`
--
ALTER TABLE `cliente`
  MODIFY `id_cliente` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT de la tabla `mecanico`
--
ALTER TABLE `mecanico`
  MODIFY `id_mecanico` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `posicion`
--
ALTER TABLE `posicion`
  MODIFY `id_posicion` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `proforma`
--
ALTER TABLE `proforma`
  MODIFY `id_proforma` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT de la tabla `rol`
--
ALTER TABLE `rol`
  MODIFY `id_rol` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `service`
--
ALTER TABLE `service`
  MODIFY `id_service` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT de la tabla `tipo_de_licencia`
--
ALTER TABLE `tipo_de_licencia`
  MODIFY `id_tipo_licencia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT de la tabla `tractor`
--
ALTER TABLE `tractor`
  MODIFY `id_tractor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carga`
--
ALTER TABLE `carga`
  ADD CONSTRAINT `carga_proforma` FOREIGN KEY (`id_proforma`) REFERENCES `proforma` (`id_proforma`);

--
-- Filtros para la tabla `carga_combustible`
--
ALTER TABLE `carga_combustible`
  ADD CONSTRAINT `cargaCombustible_proforma` FOREIGN KEY (`id_proforma`) REFERENCES `proforma` (`id_proforma`),
  ADD CONSTRAINT `posicion_carga` FOREIGN KEY (`id_posicion`) REFERENCES `posicion` (`id_posicion`);

--
-- Filtros para la tabla `celular`
--
ALTER TABLE `celular`
  ADD CONSTRAINT `celular_posicion` FOREIGN KEY (`id_posicion`) REFERENCES `posicion` (`id_posicion`),
  ADD CONSTRAINT `chofer_asignado` FOREIGN KEY (`id_chofer`) REFERENCES `empleado` (`usuario`) ON DELETE SET NULL ON UPDATE SET NULL;

--
-- Filtros para la tabla `empleado`
--
ALTER TABLE `empleado`
  ADD CONSTRAINT `empleado_rol` FOREIGN KEY (`id_rol`) REFERENCES `rol` (`id_rol`),
  ADD CONSTRAINT `tipo_de_licencia` FOREIGN KEY (`tipo_licencia`) REFERENCES `tipo_de_licencia` (`id_tipo_licencia`);

--
-- Filtros para la tabla `proforma`
--
ALTER TABLE `proforma`
  ADD CONSTRAINT `proforma_arrastrado` FOREIGN KEY (`id_arrastrado`) REFERENCES `arrastrado` (`id_arrastrado`),
  ADD CONSTRAINT `proforma_cliente` FOREIGN KEY (`id_cliente`) REFERENCES `cliente` (`id_cliente`),
  ADD CONSTRAINT `proforma_empleado1` FOREIGN KEY (`usuario`) REFERENCES `empleado` (`usuario`),
  ADD CONSTRAINT `proforma_tractor` FOREIGN KEY (`id_tractor`) REFERENCES `tractor` (`id_tractor`);

--
-- Filtros para la tabla `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_mecanico` FOREIGN KEY (`id_mecanico`) REFERENCES `mecanico` (`id_mecanico`),
  ADD CONSTRAINT `service_tractor` FOREIGN KEY (`id_tractor`) REFERENCES `tractor` (`id_tractor`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
