-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2020 a las 02:11:49
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
  `nombre` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `categoria`
--

INSERT INTO `categoria` (`id`, `nombre`) VALUES
(1, 'Aromaterapia'),
(2, 'Manos'),
(4, 'Rostro'),
(5, 'Cuerpo'),
(12, 'Labios'),
(13, 'Piernas');

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
  `id_categoria` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `producto`
--

INSERT INTO `producto` (`id`, `nombre`, `descripcion`, `tamano`, `precio`, `id_categoria`) VALUES
(13, 'Aceite Esencial de Bergamota', 'Gotas de Felicidad. ', 10, 250, 1),
(14, 'Aceite Esencial de Limón', 'Inspiración.', 10, 500, 1),
(15, 'Aceite Esencial de Naranja', 'Anti-conflicto.', 10, 200, 1),
(16, 'Crema de Malva para el Rostro', 'Confort extra para pieles sensibles.', 50, 1000, 4),
(30, 'Desmaquillante Micelar Vital Just', 'Desmaquillante sin enjuague y a base de agua', 150, 400, 4),
(31, 'Mascarilla Purificante de Moambe Amarillo', 'Cuidado anti-acné. Piel limpia y fresca todos los días.', 50, 500, 4),
(32, 'Crema de Manzanilla para Manos', 'Protección y rejuvenecimiento', 100, 700, 2),
(33, 'Hand Gel - Gel para manos con Naranja y Flores de Tilo', 'Crema protectora que concentra las propiedades reconfortantes y relajantes de la manzanilla.', 50, 800, 2),
(34, 'Crema para Labios de Caléndula', 'Cuidado Labial', 50, 400, 12),
(35, 'Crema para el Contorno de Labios', 'con Edelweiss y Alga de la Nieve', 50, 300, 12),
(36, 'Pedibalm - Loción para Piernas', 'Reconforta las piernas cansadas', 150, 500, 13),
(37, 'Bálsamo - Loción Corporal con Árnica y Hamamelis', 'Alivio instantáneo siempre a mano', 400, 1000, 5),
(38, 'Crema de Tea Tree, Manuca y Rosalina', 'Regenera', 150, 500, 5),
(39, 'Loción Cremosa Corporal de Almendras', 'Confort para tu piel seca y desnutrida', 250, 2000, 5),
(40, 'Sun Care - Protector Solar FPS 25', 'Protege', 150, 400, 5);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(11) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `email`, `password`) VALUES
(1, 'admin@admin.com', '$2y$10$enp6enczpu04ta6eUk6nZe8l0N78kUeluiKt9ECXiZ2CDAXr7rsLS');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `categoria`
--
ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT de la tabla `producto`
--
ALTER TABLE `producto`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `producto`
--
ALTER TABLE `producto`
  ADD CONSTRAINT `producto_ibfk_1` FOREIGN KEY (`id_categoria`) REFERENCES `categoria` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
