-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
<<<<<<< HEAD
-- Tiempo de generación: 23-11-2020 a las 19:33:33
=======
-- Tiempo de generación: 23-11-2020 a las 15:35:39
>>>>>>> b539ef0ebaabedb4fca0c8b6c5ce458c6c7bec9a
-- Versión del servidor: 10.4.14-MariaDB
-- Versión de PHP: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_just`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `categoria`
--

CREATE TABLE `categoria` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`, `imagen`) VALUES
(1, 'Aromaterapia', 'images/categorias/Aromaterapia.png'),
(2, 'Manos', 'images/categorias/Manos.png'),
(4, 'Rostro', 'images/categorias/Rostro.png'),
(5, 'Cuerpo', 'images/categorias/Cuerpo.png'),
(12, 'Labios', 'images/categorias/Labios.png'),
(13, 'Piernas', 'images/categorias/Piernas.png'),
<<<<<<< HEAD
(23, 'Cabello', 'images/categorias/5fb978202f739.jpg'),
(24, 'test', 'images/categorias/5fbbd71686d95.jpg');
=======
(23, 'Cabello', 'images/categorias/5fb978202f739.jpg');
>>>>>>> b539ef0ebaabedb4fca0c8b6c5ce458c6c7bec9a

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `comentario`
--

CREATE TABLE `comentario` (
  `id` int(11) NOT NULL,
  `descripcion` text NOT NULL,
  `puntaje` int(11) NOT NULL,
  `id_producto` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `comentario`
--

INSERT INTO `comentario` (`id`, `descripcion`, `puntaje`, `id_producto`, `id_usuario`) VALUES
(1, 'hola', 4, 13, 1),
(2, 'chau', 3, 15, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producto`
--

CREATE TABLE `producto` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) NOT NULL,
  `tamano` int(11) NOT NULL,
  `precio` double NOT NULL,
  `id_categoria` int(11) NOT NULL,
  `imagen` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `tamano`, `precio`, `id_categoria`, `imagen`) VALUES
(13, 'Aceite Esencial de Bergamota', 'Gotas de Felicidad. ', 100, 2500, 1, ''),
(14, 'Aceite Esencial de Limón', 'Inspiración.', 10, 500, 1, ''),
(15, 'Aceite Esencial de Naranja', 'Anti-conflicto.', 10, 200, 1, ''),
(16, 'Crema de Malva para el Rostro', 'Confort extra para pieles sensibles.', 50, 100, 4, ''),
(30, 'Desmaquillante Micelar Vital Just', 'Desmaquillante sin enjuague y a base de agua', 150, 400, 4, ''),
(31, 'Mascarilla Purificante de Moambe Amarillo', 'Cuidado anti-acné. Piel limpia y fresca todos los días.', 50, 500, 4, ''),
(32, 'Crema de Manzanilla para Manos', 'Protección y rejuvenecimiento', 100, 700, 2, ''),
(33, 'Hand Gel - Gel para manos con Naranja y Flores de Tilo', 'Crema protectora que concentra las propiedades reconfortantes y relajantes de la manzanilla.', 50, 800, 2, ''),
(34, 'Crema para Labios de Caléndula', 'Cuidado Labial', 50, 400, 12, ''),
(35, 'Crema para el Contorno de Labios', 'con Edelweiss y Alga de la Nieve', 50, 300, 12, ''),
(36, 'Pedibalm - Loción para Piernas', 'Reconforta las piernas cansadas', 150, 500, 13, ''),
(37, 'Bálsamo - Loción Corporal con Árnica y Hamamelis', 'Alivio instantáneo siempre a mano', 400, 1000, 5, ''),
(38, 'Crema de Tea Tree, Manuca y Rosalina', 'Regenera', 150, 500, 5, ''),
(39, 'Loción Cremosa Corporal de Almendras', 'Confort para tu piel seca y desnutrida', 250, 2000, 5, ''),
(40, 'Sun Care - Protector Solar FPS 25', 'Protege', 150, 400, 5, ''),
(47, 'gato', 'asdsa', 40, 400, 5, 'images/productos/5fb978a13e98a.jpg');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
<<<<<<< HEAD
  `permiso` tinyint(1) NOT NULL,
  `nombre` varchar(255) NOT NULL
=======
  `permiso` tinyint(1) NOT NULL
>>>>>>> b539ef0ebaabedb4fca0c8b6c5ce458c6c7bec9a
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

<<<<<<< HEAD
INSERT INTO `usuario` (`id`, `email`, `password`, `permiso`, `nombre`) VALUES
(1, 'admin@admin.com', '$2y$10$1jhHiVoMM04c02wBpo4Mz.ezj5w41Pw48W4tvDXsTDwdxOjVqbmfC', 1, 'Administrador'),
(5, 'agus@gmail.com', '$2y$10$V6.pv3aBJuTyUNQAkLuZO.lh/RPEtojvQqP2URdzzD5sNEZJ7bYyW', 1, 'Agustina Notti'),
(6, 'fede@fede.com', '$2y$10$lU158IXDGfXMQvuQke8S1.fR.Rj9P1uObFmfls3Wy37/Vg5j0KAiW', 0, 'Federico Aceto');
=======
INSERT INTO `usuario` (`id`, `email`, `password`, `permiso`) VALUES
(1, 'admin@admin.com', '$2y$10$1jhHiVoMM04c02wBpo4Mz.ezj5w41Pw48W4tvDXsTDwdxOjVqbmfC', 1),
(5, 'agus@gmail.com', '$2y$10$V6.pv3aBJuTyUNQAkLuZO.lh/RPEtojvQqP2URdzzD5sNEZJ7bYyW', 1),
(6, 'fede@fede.com', '$2y$10$lU158IXDGfXMQvuQke8S1.fR.Rj9P1uObFmfls3Wy37/Vg5j0KAiW', 0);
>>>>>>> b539ef0ebaabedb4fca0c8b6c5ce458c6c7bec9a

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_producto` (`id_producto`,`id_usuario`),
  ADD KEY `id_usuario` (`id_usuario`);

--
-- Indices de la tabla `producto`
--
ALTER TABLE `producto`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK_id_categoria` (`id_categoria`) USING BTREE;

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `categoria`
--
ALTER TABLE `categoria`
<<<<<<< HEAD
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
=======
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
>>>>>>> b539ef0ebaabedb4fca0c8b6c5ce458c6c7bec9a

--
-- AUTO_INCREMENT de la tabla `comentario`
--
ALTER TABLE `comentario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `comentario`
--
ALTER TABLE `comentario`
  ADD CONSTRAINT `comentario_ibfk_1` FOREIGN KEY (`id_producto`) REFERENCES `producto` (`id`),
  ADD CONSTRAINT `comentario_ibfk_2` FOREIGN KEY (`id_usuario`) REFERENCES `usuario` (`id`);

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
