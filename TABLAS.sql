-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-11-2023 a las 22:37:18
-- Versión del servidor: 10.4.27-MariaDB
-- Versión de PHP: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `bdm3`
--
CREATE DATABASE IF NOT EXISTS `bdm3` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `bdm3`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `carrito`
--

CREATE TABLE `carrito` (
  `ID_CARRITO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `CANTIDAD` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `ID_CATEGORIA` int(11) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`ID_CATEGORIA`, `NOMBRE`, `ID_USUARIO`) VALUES
(1, 'Cocina', 1),
(2, 'Artes', 1),
(3, 'Hogar', 1),
(4, 'Mascotas', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `direccion_usuario`
--

CREATE TABLE `direccion_usuario` (
  `ID_DIRECCION_USUARIO` int(11) NOT NULL,
  `DIRECCION` varchar(255) NOT NULL,
  `PAIS` varchar(255) NOT NULL,
  `CIUDAD` varchar(255) NOT NULL,
  `ESTADO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `factura`
--

CREATE TABLE `factura` (
  `ID_FACTURA` int(11) NOT NULL,
  `PRECIO_SUBTOTAL` float NOT NULL,
  `PRECIO_TOTAL` float NOT NULL,
  `FECHA` date NOT NULL,
  `ID_METODO_PAGO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `ID_ORDEN_COMPRA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `imagenes`
--

CREATE TABLE `imagenes` (
  `ID_IMAGENES` int(11) NOT NULL,
  `RUTA_IMAGEN` varchar(255) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `imagenes`
--

INSERT INTO `imagenes` (`ID_IMAGENES`, `RUTA_IMAGEN`, `ID_PRODUCTO`) VALUES
(1, '../ZRECURSOS/IMAGENES_PRODUCTOS/pablo.jpg', 19),
(2, '../ZRECURSOS/IMAGENES_PRODUCTOS/pngtree-landscapes-wallpaper-images-picture-image_3021437.jpg', 19),
(3, '../ZRECURSOS/IMAGENES_PRODUCTOS/_b5fa45c0-f4d8-4d66-bb8b-4273303de166.jpg', 19),
(4, '../ZRECURSOS/IMAGENES_PRODUCTOS/pablo.jpg', 20),
(5, '../ZRECURSOS/IMAGENES_PRODUCTOS/pngtree-landscapes-wallpaper-images-picture-image_3021437.jpg', 20),
(6, '../ZRECURSOS/IMAGENES_PRODUCTOS/_b5fa45c0-f4d8-4d66-bb8b-4273303de166.jpg', 20),
(7, '../ZRECURSOS/IMAGENES_PRODUCTOS/pablo.jpg', 21),
(8, '../ZRECURSOS/IMAGENES_PRODUCTOS/pngtree-landscapes-wallpaper-images-picture-image_3021437.jpg', 21),
(9, '../ZRECURSOS/IMAGENES_PRODUCTOS/_b5fa45c0-f4d8-4d66-bb8b-4273303de166.jpg', 21),
(10, '../ZRECURSOS/IMAGENES_PRODUCTOS/000 Samaritan TB sample.jpg', 22),
(11, '../ZRECURSOS/IMAGENES_PRODUCTOS/000 Samaritan TB sample.jpg', 23),
(12, '../ZRECURSOS/IMAGENES_PRODUCTOS/logo.png', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista`
--

CREATE TABLE `lista` (
  `ID_LISTA` int(11) NOT NULL,
  `NOMBRE_LISTA` varchar(255) NOT NULL,
  `DESCRIPCION` varchar(255) NOT NULL,
  `ESTADO` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `lista_foranea`
--

CREATE TABLE `lista_foranea` (
  `ID_LISTA_FORANEA` int(11) NOT NULL,
  `ID_LISTA` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `metodo_pago`
--

CREATE TABLE `metodo_pago` (
  `ID_METODO_PAGO` int(11) NOT NULL,
  `NOMBRE` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_compra`
--

CREATE TABLE `orden_compra` (
  `ID_ORDEN_COMPRA` int(11) NOT NULL,
  `SUBTOTAL` float NOT NULL,
  `TOTAL` float NOT NULL,
  `ID_CARRITO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `orden_compra2`
--

CREATE TABLE `orden_compra2` (
  `ID_ORDEN_COMPRA` int(11) NOT NULL,
  `ID_USUARIO` int(11) NOT NULL,
  `PRODUCTOS` longtext CHARACTER SET utf8mb4 COLLATE utf8mb4_bin NOT NULL CHECK (json_valid(`PRODUCTOS`)),
  `SUBTOTAL` float NOT NULL,
  `TOTAL` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `orden_compra2`
--

INSERT INTO `orden_compra2` (`ID_ORDEN_COMPRA`, `ID_USUARIO`, `PRODUCTOS`, `SUBTOTAL`, `TOTAL`) VALUES
(0, 18, '[{\"ID_PRODUCTO\":\"1\",\"NOMBRE\":\"papas\",\"PRECIO\":\"20.5\"},{\"ID_PRODUCTO\":\"24\",\"NOMBRE\":\"asadsad\",\"PRECIO\":\"1900\"},{\"ID_PRODUCTO\":\"24\",\"NOMBRE\":\"asadsad\",\"PRECIO\":\"1900\"},{\"ID_PRODUCTO\":\"24\",\"NOMBRE\":\"asadsad\",\"PRECIO\":\"1900\"},{\"ID_PRODUCTO\":\"24\",\"NOMBRE\":\"asadsad\",\"PRECIO\":\"1900\"},{\"ID_PRODUCTO\":\"22\",\"NOMBRE\":\"adas\",\"PRECIO\":\"12\"},{\"ID_PRODUCTO\":\"21\",\"NOMBRE\":\"pp\",\"PRECIO\":\"566\"},{\"ID_PRODUCTO\":\"22\",\"NOMBRE\":\"adas\",\"PRECIO\":\"12\"},{\"ID_PRODUCTO\":\"20\",\"NOMBRE\":\"nuevo2\",\"PRECIO\":\"20.5\"},{\"ID_PRODUCTO\":\"21\",\"NOMBRE\":\"pp\",\"PRECIO\":\"566\"},{\"ID_PRODUCTO\":\"22\",\"NOMBRE\":\"adas\",\"PRECIO\":\"12\"}]', 8809, 8809),
(0, 20, '[{\"ID_PRODUCTO\":\"1\",\"NOMBRE\":\"papas\",\"PRECIO\":\"20.5\"},{\"ID_PRODUCTO\":\"24\",\"NOMBRE\":\"asadsad\",\"PRECIO\":\"1900\"},{\"ID_PRODUCTO\":\"24\",\"NOMBRE\":\"asadsad\",\"PRECIO\":\"1900\"},{\"ID_PRODUCTO\":\"24\",\"NOMBRE\":\"asadsad\",\"PRECIO\":\"1900\"},{\"ID_PRODUCTO\":\"24\",\"NOMBRE\":\"asadsad\",\"PRECIO\":\"1900\"},{\"ID_PRODUCTO\":\"22\",\"NOMBRE\":\"adas\",\"PRECIO\":\"12\"},{\"ID_PRODUCTO\":\"21\",\"NOMBRE\":\"pp\",\"PRECIO\":\"566\"},{\"ID_PRODUCTO\":\"22\",\"NOMBRE\":\"adas\",\"PRECIO\":\"12\"},{\"ID_PRODUCTO\":\"20\",\"NOMBRE\":\"nuevo2\",\"PRECIO\":\"20.5\"},{\"ID_PRODUCTO\":\"21\",\"NOMBRE\":\"pp\",\"PRECIO\":\"566\"},{\"ID_PRODUCTO\":\"22\",\"NOMBRE\":\"adas\",\"PRECIO\":\"12\"}]', 8809, 8809),
(0, 21, '[{\"ID_PRODUCTO\":\"1\",\"NOMBRE\":\"papas\",\"PRECIO\":\"20.5\"},{\"ID_PRODUCTO\":\"24\",\"NOMBRE\":\"asadsad\",\"PRECIO\":\"1900\"},{\"ID_PRODUCTO\":\"24\",\"NOMBRE\":\"asadsad\",\"PRECIO\":\"1900\"},{\"ID_PRODUCTO\":\"24\",\"NOMBRE\":\"asadsad\",\"PRECIO\":\"1900\"},{\"ID_PRODUCTO\":\"24\",\"NOMBRE\":\"asadsad\",\"PRECIO\":\"1900\"},{\"ID_PRODUCTO\":\"22\",\"NOMBRE\":\"adas\",\"PRECIO\":\"12\"},{\"ID_PRODUCTO\":\"21\",\"NOMBRE\":\"pp\",\"PRECIO\":\"566\"},{\"ID_PRODUCTO\":\"22\",\"NOMBRE\":\"adas\",\"PRECIO\":\"12\"},{\"ID_PRODUCTO\":\"20\",\"NOMBRE\":\"nuevo2\",\"PRECIO\":\"20.5\"},{\"ID_PRODUCTO\":\"21\",\"NOMBRE\":\"pp\",\"PRECIO\":\"566\"},{\"ID_PRODUCTO\":\"22\",\"NOMBRE\":\"adas\",\"PRECIO\":\"12\"}]', 8809, 8809),
(0, 22, '[{\"ID_PRODUCTO\":\"1\",\"NOMBRE\":\"papas\",\"PRECIO\":\"20.5\"},{\"ID_PRODUCTO\":\"24\",\"NOMBRE\":\"asadsad\",\"PRECIO\":\"1900\"},{\"ID_PRODUCTO\":\"24\",\"NOMBRE\":\"asadsad\",\"PRECIO\":\"1900\"},{\"ID_PRODUCTO\":\"24\",\"NOMBRE\":\"asadsad\",\"PRECIO\":\"1900\"},{\"ID_PRODUCTO\":\"24\",\"NOMBRE\":\"asadsad\",\"PRECIO\":\"1900\"},{\"ID_PRODUCTO\":\"22\",\"NOMBRE\":\"adas\",\"PRECIO\":\"12\"},{\"ID_PRODUCTO\":\"21\",\"NOMBRE\":\"pp\",\"PRECIO\":\"566\"},{\"ID_PRODUCTO\":\"22\",\"NOMBRE\":\"adas\",\"PRECIO\":\"12\"},{\"ID_PRODUCTO\":\"20\",\"NOMBRE\":\"nuevo2\",\"PRECIO\":\"20.5\"},{\"ID_PRODUCTO\":\"21\",\"NOMBRE\":\"pp\",\"PRECIO\":\"566\"},{\"ID_PRODUCTO\":\"22\",\"NOMBRE\":\"adas\",\"PRECIO\":\"12\"}]', 8809, 8809);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos`
--

CREATE TABLE `productos` (
  `ID_PRODUCTO` int(11) NOT NULL,
  `NOMBRE` varchar(30) NOT NULL,
  `DESCRIPCION` varchar(50) NOT NULL,
  `FK_IMAGENES` int(11) DEFAULT NULL,
  `VIDEO` varchar(100) NOT NULL,
  `FK_CATEGORIA` int(11) NOT NULL,
  `PRECIO` float NOT NULL,
  `CANTIDAD` int(11) NOT NULL,
  `VALORACION` varchar(30) NOT NULL,
  `ESTADO` int(11) NOT NULL,
  `CANTIDAD_VENDIDOS` int(11) NOT NULL,
  `FK_COMENTARIOS` int(11) DEFAULT NULL,
  `ID_USUARIO` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `productos`
--

INSERT INTO `productos` (`ID_PRODUCTO`, `NOMBRE`, `DESCRIPCION`, `FK_IMAGENES`, `VIDEO`, `FK_CATEGORIA`, `PRECIO`, `CANTIDAD`, `VALORACION`, `ESTADO`, `CANTIDAD_VENDIDOS`, `FK_COMENTARIOS`, `ID_USUARIO`) VALUES
(1, 'papas', 'bolsa de papas chidas las mas chidas ', NULL, '', 1, 20.5, 100, 'SIN VALORACION', 1, 0, NULL, 1),
(19, 'nuevo', 'nuevo', NULL, '', 1, 20.5, 100, 'SIN VALORACION', 1, 0, NULL, 16),
(20, 'nuevo2', 'Producto nuevo2 para navidad', NULL, '', 3, 20.5, 100, 'SIN VALORACION', 1, 0, NULL, 16),
(21, 'pp', 'pppppp descripcion generica', NULL, '', 4, 566, 100, 'SIN VALORACION', 1, 0, NULL, 4),
(22, 'adas', 'asdasd', NULL, '', 1, 12, 1, 'SIN VALORACION', 1, 0, NULL, 17),
(23, 'adas', 'asdasd', NULL, '', 1, 12, 1, 'SIN VALORACION', 1, 0, NULL, 17),
(24, 'asadsad', 'asdasdaasd', NULL, '', 1, 1900, 14, 'SIN VALORACION', 0, 0, NULL, 17);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `productos_ordenados`
--

CREATE TABLE `productos_ordenados` (
  `ID_PRODUCTOS_ORDENADOS` int(11) NOT NULL,
  `ID_PRODUCTO` int(11) NOT NULL,
  `ID_ORDEN_COMPRA` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `rol_usuario`
--

CREATE TABLE `rol_usuario` (
  `ID_ROL_USUARIO` int(11) NOT NULL,
  `DESCRIPCION` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `rol_usuario`
--

INSERT INTO `rol_usuario` (`ID_ROL_USUARIO`, `DESCRIPCION`) VALUES
(1, 'ADMIN'),
(2, 'COMPRADOR'),
(3, 'VENDEDOR');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `ID_USUARIO` int(11) NOT NULL,
  `CORREO` varchar(30) NOT NULL,
  `CONTRASEÑA` varchar(30) NOT NULL,
  `NOMBRE_USUARIO` varchar(50) NOT NULL,
  `NOMBRE_PERSONAL` varchar(50) NOT NULL,
  `FECHA_NACIMIENTO` date NOT NULL,
  `SEXO` varchar(30) NOT NULL,
  `IMAGEN` varchar(255) NOT NULL,
  `ROL` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`ID_USUARIO`, `CORREO`, `CONTRASEÑA`, `NOMBRE_USUARIO`, `NOMBRE_PERSONAL`, `FECHA_NACIMIENTO`, `SEXO`, `IMAGEN`, `ROL`) VALUES
(1, 'pepe@gmail.com', '123', 'pepe', 'pepe perez', '2023-09-29', 'otro', '', 1),
(4, 'xdarksx.514@gmail.com', '123', 'dariotrd', ' dario tirado', '2001-04-09', 'masculino', '', 3),
(9, 'ASD@DF.COM', 'asd', 'ASD', 'ASD', '2023-08-27', 'masculino', '', 3),
(16, 'pablo22@gmail.com', 'Pablo123@', 'pablo22', 'pablo', '2023-10-01', 'masculino', '../ZRECURSOS/IMAGENES/pablo.jpg', 1),
(17, 'carlosrayado2013@gmail.com', 'Carlos123!', 'carlos', 'Carlos Valdes', '2023-11-25', 'masculino', '../ZRECURSOS/IMAGENES/PicsArt_05-14-10.06.34.png', 1),
(18, 'carlosrayado2010@live.com.mx', 'Carlos123!', 'carlos2', 'Carlos Aaron Valdes Hernandez', '2023-11-19', 'masculino', '../ZRECURSOS/IMAGENES/000 Samaritan TB sample.jpg', 2),
(19, 'carlos@gmail.com', 'Neymar123!', 'neymar', 'neymar', '2023-11-10', 'masculino', '../ZRECURSOS/IMAGENES/logo.png', 1),
(20, 'carlos2@gmail.com', 'Neymar123!', 'Neymar1', 'neymar', '2023-11-18', 'masculino', '../ZRECURSOS/IMAGENES/logo.png', 2),
(21, 'pedro@gmail.com', 'Pedro123!', 'pedro', 'pedro', '2023-11-23', 'masculino', '../ZRECURSOS/IMAGENES/000 Samaritan TB sample.jpg', 2),
(22, 'pedro1@gmail.com', 'Pedro123!', 'Pedro1', 'pedro1', '2023-11-16', 'masculino', '../ZRECURSOS/IMAGENES/000 Samaritan TB sample.jpg', 2);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD PRIMARY KEY (`ID_CARRITO`),
  ADD KEY `CARRITO_USUARIO` (`ID_USUARIO`),
  ADD KEY `CARRITO_PRODUCTO` (`ID_PRODUCTO`);

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`ID_CATEGORIA`),
  ADD KEY `CATEGORIA_USUARIO` (`ID_USUARIO`);

--
-- Indices de la tabla `direccion_usuario`
--
ALTER TABLE `direccion_usuario`
  ADD PRIMARY KEY (`ID_DIRECCION_USUARIO`),
  ADD KEY `DIRECCION_USUARIO` (`ID_USUARIO`);

--
-- Indices de la tabla `factura`
--
ALTER TABLE `factura`
  ADD PRIMARY KEY (`ID_FACTURA`),
  ADD KEY `FACTURA_METODO_P` (`ID_METODO_PAGO`),
  ADD KEY `FACTURA_USUARIO` (`ID_USUARIO`),
  ADD KEY `FACTURAORD_COMPRA` (`ID_ORDEN_COMPRA`);

--
-- Indices de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD PRIMARY KEY (`ID_IMAGENES`),
  ADD KEY `IMAGEN_PRODUCTO` (`ID_PRODUCTO`);

--
-- Indices de la tabla `lista`
--
ALTER TABLE `lista`
  ADD PRIMARY KEY (`ID_LISTA`),
  ADD KEY `USUARIO_LISTA` (`ID_USUARIO`);

--
-- Indices de la tabla `lista_foranea`
--
ALTER TABLE `lista_foranea`
  ADD PRIMARY KEY (`ID_LISTA_FORANEA`),
  ADD KEY `FORANEA_LISTA` (`ID_LISTA`),
  ADD KEY `FORANEA_PRODUCTO` (`ID_PRODUCTO`);

--
-- Indices de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  ADD PRIMARY KEY (`ID_METODO_PAGO`);

--
-- Indices de la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
  ADD PRIMARY KEY (`ID_ORDEN_COMPRA`),
  ADD KEY `ORDEN_CARRITO` (`ID_CARRITO`);

--
-- Indices de la tabla `productos`
--
ALTER TABLE `productos`
  ADD PRIMARY KEY (`ID_PRODUCTO`),
  ADD KEY `PRODUCTO_USUARIO` (`ID_USUARIO`),
  ADD KEY `PRODUCTO_CATEGORIA` (`FK_CATEGORIA`);

--
-- Indices de la tabla `productos_ordenados`
--
ALTER TABLE `productos_ordenados`
  ADD PRIMARY KEY (`ID_PRODUCTOS_ORDENADOS`),
  ADD KEY `ORDENADOS_PRODUCTO` (`ID_PRODUCTO`);

--
-- Indices de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  ADD PRIMARY KEY (`ID_ROL_USUARIO`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`ID_USUARIO`),
  ADD KEY `USUARIO_ROL` (`ROL`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `carrito`
--
ALTER TABLE `carrito`
  MODIFY `ID_CARRITO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
  MODIFY `ID_CATEGORIA` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `direccion_usuario`
--
ALTER TABLE `direccion_usuario`
  MODIFY `ID_DIRECCION_USUARIO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `factura`
--
ALTER TABLE `factura`
  MODIFY `ID_FACTURA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `imagenes`
--
ALTER TABLE `imagenes`
  MODIFY `ID_IMAGENES` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT de la tabla `lista`
--
ALTER TABLE `lista`
  MODIFY `ID_LISTA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `lista_foranea`
--
ALTER TABLE `lista_foranea`
  MODIFY `ID_LISTA_FORANEA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `metodo_pago`
--
ALTER TABLE `metodo_pago`
  MODIFY `ID_METODO_PAGO` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
  MODIFY `ID_ORDEN_COMPRA` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `productos`
--
ALTER TABLE `productos`
  MODIFY `ID_PRODUCTO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT de la tabla `productos_ordenados`
--
ALTER TABLE `productos_ordenados`
  MODIFY `ID_PRODUCTOS_ORDENADOS` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT de la tabla `rol_usuario`
--
ALTER TABLE `rol_usuario`
  MODIFY `ID_ROL_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `ID_USUARIO` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `carrito`
--
ALTER TABLE `carrito`
  ADD CONSTRAINT `carrito_ibfk_1` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`),
  ADD CONSTRAINT `carrito_ibfk_2` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `productos` (`ID_PRODUCTO`);

--
-- Filtros para la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD CONSTRAINT `CATEGORIA_USUARIO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `direccion_usuario`
--
ALTER TABLE `direccion_usuario`
  ADD CONSTRAINT `DIRECCION_USUARIO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `factura`
--
ALTER TABLE `factura`
  ADD CONSTRAINT `FACTURAORD_COMPRA` FOREIGN KEY (`ID_ORDEN_COMPRA`) REFERENCES `orden_compra` (`ID_ORDEN_COMPRA`),
  ADD CONSTRAINT `FACTURA_METODO_P` FOREIGN KEY (`ID_METODO_PAGO`) REFERENCES `metodo_pago` (`ID_METODO_PAGO`),
  ADD CONSTRAINT `FACTURA_USUARIO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `imagenes`
--
ALTER TABLE `imagenes`
  ADD CONSTRAINT `IMAGEN_PRODUCTO` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `productos` (`ID_PRODUCTO`);

--
-- Filtros para la tabla `lista`
--
ALTER TABLE `lista`
  ADD CONSTRAINT `USUARIO_LISTA` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `lista_foranea`
--
ALTER TABLE `lista_foranea`
  ADD CONSTRAINT `FORANEA_LISTA` FOREIGN KEY (`ID_LISTA`) REFERENCES `lista` (`ID_LISTA`),
  ADD CONSTRAINT `FORANEA_PRODUCTO` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `productos` (`ID_PRODUCTO`);

--
-- Filtros para la tabla `orden_compra`
--
ALTER TABLE `orden_compra`
  ADD CONSTRAINT `ORDEN_CARRITO` FOREIGN KEY (`ID_CARRITO`) REFERENCES `carrito` (`ID_CARRITO`);

--
-- Filtros para la tabla `productos`
--
ALTER TABLE `productos`
  ADD CONSTRAINT `PRODUCTO_CATEGORIA` FOREIGN KEY (`FK_CATEGORIA`) REFERENCES `categoria` (`ID_CATEGORIA`),
  ADD CONSTRAINT `PRODUCTO_USUARIO` FOREIGN KEY (`ID_USUARIO`) REFERENCES `usuario` (`ID_USUARIO`);

--
-- Filtros para la tabla `productos_ordenados`
--
ALTER TABLE `productos_ordenados`
  ADD CONSTRAINT `ORDENADOS_ORDEN` FOREIGN KEY (`ID_PRODUCTOS_ORDENADOS`) REFERENCES `orden_compra` (`ID_ORDEN_COMPRA`),
  ADD CONSTRAINT `ORDENADOS_PRODUCTO` FOREIGN KEY (`ID_PRODUCTO`) REFERENCES `productos` (`ID_PRODUCTO`);

--
-- Filtros para la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD CONSTRAINT `USUARIO_ROL` FOREIGN KEY (`ROL`) REFERENCES `rol_usuario` (`ID_ROL_USUARIO`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;