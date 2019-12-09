-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 09-12-2019 a las 22:47:08
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.2.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `cajageek`
--

DELIMITER $$
--
-- Procedimientos
--
CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_delete_deletedata` (IN `v_table` VARCHAR(200), IN `v_conditional_fields` TEXT)  BEGIN

	SET @VV_CONSDINAM = CONCAT('DELETE FROM ',v_table,' WHERE ',v_conditional_fields);
	PREPARE SENTENCIA FROM @VV_CONSDINAM;
	EXECUTE SENTENCIA;

END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_get_allproducts` (IN `limite` INT(11), IN `offsetn` INT(11))  NO SQL
SELECT * FROM productos LIMIT limite OFFSET offsetn$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_insert_adddata` (IN `v_table` VARCHAR(200), IN `v_add_fields` LONGTEXT, IN `v_add_values` LONGTEXT)  BEGIN
	SET @VV_CONSDINAM = CONCAT('INSERT INTO ',v_table,'(',v_add_fields,') VALUES (',v_add_values,')');
	PREPARE SENTENCIA FROM @VV_CONSDINAM;
	EXECUTE SENTENCIA;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_getdata` (IN `v_fields` LONGTEXT, IN `v_body` LONGTEXT)  BEGIN
	SET @VV_CONSDINAM = CONCAT('SELECT ',v_fields,' FROM ',v_body);
	PREPARE SENTENCIA FROM @VV_CONSDINAM;
	EXECUTE SENTENCIA;
END$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_select_getdatatocategory` (IN `categoria_id` INT(11))  NO SQL
SELECT tipos.tipo_nombre,tipos.tipo_detalle,productos.* from productos,tipos where tipos.tipo_id = productos.tipo_id AND productos.categoria_id = categoria_id GROUP BY productos.producto_id$$

CREATE DEFINER=`root`@`localhost` PROCEDURE `sp_update_updatedata` (IN `v_table` VARCHAR(200), IN `v_update_fields` LONGTEXT, IN `v_conditional_fields` TEXT)  BEGIN
	SET @VV_CONSDINAM = CONCAT('UPDATE ',v_table,' SET ',v_update_fields,' WHERE ',v_conditional_fields);
	PREPARE SENTENCIA FROM @VV_CONSDINAM;
	EXECUTE SENTENCIA;
END$$

DELIMITER ;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `banners`
--

CREATE TABLE `banners` (
  `banner_id` int(11) NOT NULL,
  `banner_nombre` varchar(500) NOT NULL,
  `banner_imagen` varchar(500) NOT NULL,
  `banner_link` text NOT NULL,
  `banner_activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `banners`
--

INSERT INTO `banners` (`banner_id`, `banner_nombre`, `banner_imagen`, `banner_link`, `banner_activo`) VALUES
(1, 'Prueba banner', 'banner.jpg', 'http://localhost/xampp/cajageek/categorias.php?categoria=Caballeros%20del%20Zodiaco&id=1', 1),
(2, 'Prueba banner 2', 'banner.jpg', 'http://google.com.pe', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categorias`
--

CREATE TABLE `categorias` (
  `categoria_id` int(11) NOT NULL,
  `categoria_nombre` varchar(250) NOT NULL,
  `categoria_foto` varchar(150) NOT NULL,
  `categoria_detalle` text NOT NULL,
  `categoria_activo` int(11) NOT NULL,
  `categoria_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `categorias`
--

INSERT INTO `categorias` (`categoria_id`, `categoria_nombre`, `categoria_foto`, `categoria_detalle`, `categoria_activo`, `categoria_fecha`) VALUES
(1, 'Caballeros del Zodiaco', 'pruebacategoria.png', 'Prueba de que tiene un detalle', 1, '2019-11-27 17:42:39'),
(2, 'Videogames', 'pruebacategoria.png', 'Esto es un detalle de videogames', 1, '2019-11-27 17:43:50'),
(3, 'Series Retro', 'pruebacategoria.png', 'Series Retro', 1, '2019-11-27 17:44:26');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `producto_id` int(11) NOT NULL,
  `producto_nombre` varchar(500) NOT NULL,
  `producto_identificador` varchar(500) NOT NULL,
  `producto_foto` varchar(350) NOT NULL,
  `producto_precio` varchar(45) NOT NULL,
  `producto_descuento` varchar(45) NOT NULL,
  `producto_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `categoria_id` int(11) NOT NULL,
  `tipo_id` int(11) NOT NULL,
  `producto_activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`producto_id`, `producto_nombre`, `producto_identificador`, `producto_foto`, `producto_precio`, `producto_descuento`, `producto_fecha`, `categoria_id`, `tipo_id`, `producto_activo`) VALUES
(1, ' Dragon Shiryu armadura v1 ', 'Caballero de bronce clásico ', 'broncesikkiv.jpg', '20', '5', '2019-12-09 20:07:12', 1, 1, 1),
(2, 'Dragon Shiryu armadura v2', 'Caballero de bronce clásico', '20191209174009.jpg', '20', '0', '2019-12-09 20:10:06', 1, 1, 1),
(3, 'Dragon Shiryu Chibi\r\n', 'Caballero de bronce chibi', '', '20', '0', '2019-12-09 16:05:15', 1, 1, 1),
(4, 'Dokho de Libra', 'Caballero dorado clásico', '', '20', '0', '2019-12-09 16:05:12', 1, 1, 1),
(5, 'Dios del bosque', 'Gibli', '', '20', '4', '2019-12-09 16:05:10', 2, 1, 1),
(6, 'Tortugas ninja', 'Serie retro', '', '20', '0', '2019-12-09 16:05:08', 3, 1, 1),
(7, 'Cuadro Zelda', 'Cuadro Zelda', '', '25', '0', '2019-12-09 16:05:06', 3, 2, 1),
(8, 'Prueba 2', 'Prueba 2', '', '20', '0', '2019-12-09 16:05:03', 2, 3, 1),
(9, 'Prueba 3', 'Prueba 3', '', '25', '0', '2019-12-09 16:05:01', 3, 3, 1),
(10, 'Prueba 4', 'Prueba 4', '', '30', '0', '2019-12-09 16:05:25', 3, 1, 1),
(11, 'Prueba 5', 'Prueba 5', 'broncesikkiv.jpg', '10', '9', '2019-12-09 20:07:16', 1, 2, 1),
(13, 'Prueba cms', 'Prueba cms', '20191209174009.jpg', '35', '0', '0000-00-00 00:00:00', 1, 3, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto_detalle`
--

CREATE TABLE `producto_detalle` (
  `pdetalle_id` int(11) NOT NULL,
  `pdetalle_descripcion` text NOT NULL,
  `pdetalle_caracteristicas` text NOT NULL,
  `pdetalle_fotos` text NOT NULL,
  `pdetalle_tamanos` varchar(500) NOT NULL,
  `pdetalle_colores` varchar(500) NOT NULL,
  `pdetalle_precios` varchar(500) NOT NULL,
  `pdetalle_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `producto_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `producto_detalle`
--

INSERT INTO `producto_detalle` (`pdetalle_id`, `pdetalle_descripcion`, `pdetalle_caracteristicas`, `pdetalle_fotos`, `pdetalle_tamanos`, `pdetalle_colores`, `pdetalle_precios`, `pdetalle_fecha`, `producto_id`) VALUES
(1, 'Esto es una descripción', 'Tamano: 10 ,15,12', 'detalle.jpg,detalle.jpg,detalle.jpg,detalle.jpg,detalle.jpg,detalle.jpg,detalle.jpg,detalle.jpg,detalle.jpg,detalle.jpg,detalle.jpg', '11 onzas,15 onzas,16 onzas,18 onzas', 'Blanco,Negro,Multicolor', '20,25,28,36', '2019-11-26 17:24:19', 1),
(2, 'Texto id 2', 'Texto id 2', 'foto1,foto2,foto3', '11 onzas,15 onzas,16 onzas,36 onzas', 'Blanco,Negro', '20,25,30,36', '2019-11-25 17:41:30', 2),
(3, 'Dragon Shiryu Chibi', 'Dragon Shiryu Chibi', 'foto1,foto2,foto3', '11 onzas,15 onzas,16 onzas,36 onzas', 'Blanco,Negro', '20,25,28,36', '2019-11-25 17:41:36', 3),
(4, 'Dokho de Libra', 'Dokho de Libra', 'foto1,foto2,foto3', '11 onzas,15 onzas,16 onzas,36 onzas', 'Blanco,Negro', '20,25,28,36', '2019-11-25 17:41:39', 4),
(5, '	\r\nDios del bosque', '	\r\nDios del bosque', 'foto1,foto2,foto3', '11 onzas,15 onzas,16 onzas,36 onzas', 'Blanco,Negro', '20,25,28,36', '2019-11-25 17:41:42', 5),
(6, 'Tortugas ninja', 'Tortugas ninja', 'foto1,foto2,foto3', '11 onzas,15 onzas,16 onzas,36 onzas', 'Blanco,Negro', '20,25,28,36', '2019-11-25 17:41:45', 6),
(7, 'Cuadro de Zelda', 'Cuadro de Zelda', 'foto1,foto2,foto3', '30x30cm,40x40cm', '', '25,35', '2019-11-25 17:45:20', 7);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tema`
--

CREATE TABLE `tema` (
  `tema_id` int(11) NOT NULL,
  `tema_opcion` int(11) NOT NULL,
  `tema_nombre` varchar(150) NOT NULL,
  `tema_activo` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tema`
--

INSERT INTO `tema` (`tema_id`, `tema_opcion`, `tema_nombre`, `tema_activo`) VALUES
(1, 1, 'Tema de Intranet', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `tipos`
--

CREATE TABLE `tipos` (
  `tipo_id` int(11) NOT NULL,
  `tipo_nombre` varchar(500) NOT NULL,
  `tipo_detalle` text NOT NULL,
  `tipo_activo` int(11) NOT NULL,
  `tipo_fecha` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Volcado de datos para la tabla `tipos`
--

INSERT INTO `tipos` (`tipo_id`, `tipo_nombre`, `tipo_detalle`, `tipo_activo`, `tipo_fecha`) VALUES
(1, 'Taza', 'Esto es el detalle de una taza', 1, '2019-11-19 15:52:50'),
(2, 'Cuadros', 'Texto de Cuadros', 1, '2019-11-19 16:07:32'),
(3, 'Gadget', 'Texto de Gadget', 1, '2019-11-19 16:08:10');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`banner_id`);

--
-- Indices de la tabla `categorias`
--
ALTER TABLE `categorias`
  ADD PRIMARY KEY (`categoria_id`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`producto_id`),
  ADD KEY `fk_productos_categorias_idx` (`categoria_id`),
  ADD KEY `fk_productos_tipos1_idx` (`tipo_id`);

--
-- Indices de la tabla `producto_detalle`
--
ALTER TABLE `producto_detalle`
  ADD PRIMARY KEY (`pdetalle_id`),
  ADD KEY `fk_producto_detalle_productos1_idx` (`producto_id`);

--
-- Indices de la tabla `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`tema_id`);

--
-- Indices de la tabla `tipos`
--
ALTER TABLE `tipos`
  ADD PRIMARY KEY (`tipo_id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `banners`
--
ALTER TABLE `banners`
  MODIFY `banner_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT de la tabla `categorias`
--
ALTER TABLE `categorias`
  MODIFY `categoria_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `producto_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT de la tabla `producto_detalle`
--
ALTER TABLE `producto_detalle`
  MODIFY `pdetalle_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT de la tabla `tema`
--
ALTER TABLE `tema`
  MODIFY `tema_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `tipos`
--
ALTER TABLE `tipos`
  MODIFY `tipo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `fk_productos_categorias` FOREIGN KEY (`categoria_id`) REFERENCES `categorias` (`categoria_id`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_productos_tipos1` FOREIGN KEY (`tipo_id`) REFERENCES `tipos` (`tipo_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producto_detalle`
--
ALTER TABLE `producto_detalle`
  ADD CONSTRAINT `fk_producto_detalle_productos1` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`producto_id`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
