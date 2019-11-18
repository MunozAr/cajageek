-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 28-08-2017 a las 17:48:07
-- Versión del servidor: 10.1.13-MariaDB
-- Versión de PHP: 5.5.37

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `prom_2017`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE PROCEDURE `sp_delete_deletedata` (IN `v_table` VARCHAR(200), IN `v_conditional_fields` TEXT)  BEGIN

	SET @VV_CONSDINAM = CONCAT('DELETE FROM ',v_table,' WHERE ',v_conditional_fields);
	PREPARE SENTENCIA FROM @VV_CONSDINAM;
	EXECUTE SENTENCIA;

END$$

CREATE PROCEDURE `sp_insert_adddata` (IN `v_table` VARCHAR(200), IN `v_add_fields` LONGTEXT, IN `v_add_values` LONGTEXT)  BEGIN
	SET @VV_CONSDINAM = CONCAT('INSERT INTO ',v_table,'(',v_add_fields,') VALUES (',v_add_values,')');
	PREPARE SENTENCIA FROM @VV_CONSDINAM;
	EXECUTE SENTENCIA;
END$$

CREATE PROCEDURE `sp_select_getdata` (IN `v_fields` LONGTEXT, IN `v_body` LONGTEXT)  BEGIN
	SET @VV_CONSDINAM = CONCAT('SELECT ',v_fields,' FROM ',v_body);
	PREPARE SENTENCIA FROM @VV_CONSDINAM;
	EXECUTE SENTENCIA;
END$$

CREATE PROCEDURE `sp_update_updatedata` (IN `v_table` VARCHAR(200), IN `v_update_fields` LONGTEXT, IN `v_conditional_fields` TEXT)  BEGIN
	SET @VV_CONSDINAM = CONCAT('UPDATE ',v_table,' SET ',v_update_fields,' WHERE ',v_conditional_fields);
	PREPARE SENTENCIA FROM @VV_CONSDINAM;
	EXECUTE SENTENCIA;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `categoria_id` int(11) NOT NULL,
  `categoria_posicion` int(11) DEFAULT NULL,
  `categoria_nameimagen` varchar(150) DEFAULT NULL,
  `categoria_categoria` int(11) DEFAULT NULL,
  `tipo_id` varchar(150) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`categoria_id`, `categoria_posicion`, `categoria_nameimagen`, `categoria_categoria`, `tipo_id`) VALUES
(2, 1, 'Categoria1', 1, 'Category1'),
(3, 2, 'Categoriaprueba', 1, 'Category2'),
(4, 3, 'Categoria3', 1, 'Category3');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `galeria`
--

CREATE TABLE `galeria` (
  `galeria_id` int(11) NOT NULL,
  `galeria_orden` int(11) DEFAULT NULL,
  `galeria_titulo` varchar(100) DEFAULT NULL,
  `galeria_imagen` varchar(100) DEFAULT NULL,
  `galeria_activo` int(11) DEFAULT NULL,
  `galeria_titulo_ingles` varchar(100) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `producto_id` int(11) NOT NULL,
  `producto_orden` int(11) DEFAULT NULL,
  `producto_nombre` varchar(100) DEFAULT NULL,
  `producto_descripcion` text,
  `producto_imagen` varchar(100) DEFAULT NULL,
  `producto_archivo` varchar(100) DEFAULT NULL,
  `producto_activo` int(11) DEFAULT NULL,
  `producto_nombre_ingles` varchar(100) DEFAULT NULL,
  `producto_descripcion_ingles` text,
  `producto_archivo_ingles` varchar(100) DEFAULT NULL,
  `subcategoria_id` int(11) DEFAULT NULL,
  `categoria_id` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `tema_id` int(11) NOT NULL,
  `tema_opcion` int(11) DEFAULT NULL,
  `tema_nombre` varchar(150) DEFAULT NULL,
  `tema_activo` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`tema_id`, `tema_opcion`, `tema_nombre`, `tema_activo`) VALUES
(1, 1, 'Tema de Intranet', 1);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`categoria_id`),
  ADD KEY `FI_categoria_posicion` (`categoria_posicion`),
  ADD KEY `FI_categoria_nameimagen` (`categoria_nameimagen`),
  ADD KEY `FI_categoria_categoria` (`categoria_categoria`),
  ADD KEY `FI_categoria_tipo_id` (`categoria_tipo_id`);

--
-- Indices de la tabla `galeria`
--
ALTER TABLE `galeria`
  ADD PRIMARY KEY (`galeria_id`),
  ADD KEY `FI_galeria_orden` (`galeria_orden`),
  ADD KEY `FI_galeria_titulo` (`galeria_titulo`),
  ADD KEY `FI_galeria_imagen` (`galeria_imagen`),
  ADD KEY `FI_galeria_activo` (`galeria_activo`),
  ADD KEY `FI_galeria_titulo_ingles` (`galeria_titulo_ingles`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `FI_producto_orden` (`producto_orden`),
  ADD KEY `FI_producto_nombre` (`producto_nombre`),
  ADD KEY `FI_producto_imagen` (`producto_imagen`),
  ADD KEY `FI_producto_archivo` (`producto_archivo`),
  ADD KEY `FI_producto_activo` (`producto_activo`),
  ADD KEY `FI_producto_nombre_ingles` (`producto_nombre_ingles`),
  ADD KEY `FI_producto_archivo_ingles` (`producto_archivo_ingles`),
  ADD KEY `FI_subcategoria_id` (`subcategoria_id`),
  ADD KEY `FI_categoria_id` (`categoria_id`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`tema_id`),
  ADD KEY `FI_tema_opcion` (`tema_opcion`),
  ADD KEY `FI_tema_nombre` (`tema_nombre`),
  ADD KEY `FI_tema_activo` (`tema_activo`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT de la tabla `galeria`
--
ALTER TABLE `galeria`
  MODIFY `galeria_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
  MODIFY `tema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
