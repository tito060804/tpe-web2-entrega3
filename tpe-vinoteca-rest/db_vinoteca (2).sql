-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 14-10-2024 a las 19:05:14
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `db_vinoteca`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cepa`
--

CREATE TABLE `cepa` (
  `id_cepa` int(11) NOT NULL,
  `nombre_cepa` varchar(100) NOT NULL,
  `aroma` varchar(45) DEFAULT NULL,
  `maridaje` varchar(45) DEFAULT NULL,
  `textura` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `cepa`
--

INSERT INTO `cepa` (`id_cepa`, `nombre_cepa`, `aroma`, `maridaje`, `textura`) VALUES
(1, 'Malbec', 'Presencia de frutos rojos como moras, frambue', 'pastas con salsas a base de tomate, carnes as', 'cuerpo importante y sabor persistente en boca'),
(2, 'Syrah', 'Se caracteriza por un aroma afrutado que recu', 'Carnes rojas y de caza', 'En boca es fresco, de estructura media y text'),
(3, 'Sauvignon blanc', 'Toques de grosellas, melón verde, pomelo o fr', 'Ideal para acompañar mariscos, carnes blancas', 'Son vinos secos, con poco cuerpo y con aroma '),
(4, 'Merlot', 'Aromas a Frambuesas, guindas y especias como ', 'Ideal para acompañar pastas y pizzas', 'Se caracteriza por su textura suave en el pal'),
(5, 'Chardonnay', 'Perfil cremoso con aroma a avellanas, miel y ', 'Acompañar con mariscos, pescado, carnes blanc', 'Es fresco, con una leve sensación de dulzura,');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `db_vinos`
--

CREATE TABLE `db_vinos` (
  `id_vino` int(11) NOT NULL,
  `nombre_vino` varchar(100) NOT NULL,
  `cepa` int(11) DEFAULT NULL,
  `tipo` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `db_vinos`
--

INSERT INTO `db_vinos` (`id_vino`, `nombre_vino`, `cepa`, `tipo`) VALUES
(1, 'luigi bosca', 1, 'tinto'),
(2, 'hermandad', 1, 'tinto'),
(3, 'DON VALENTIN LACRADO', 3, 'vino blanco');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `email` varchar(45) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `email`, `password`) VALUES
(1, 'webadmin', 'admin'),
(2, 'tito@gmail.com', '1234');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cepa`
--
ALTER TABLE `cepa`
  ADD PRIMARY KEY (`id_cepa`);

--
-- Indices de la tabla `db_vinos`
--
ALTER TABLE `db_vinos`
  ADD PRIMARY KEY (`id_vino`),
  ADD KEY `cepa` (`cepa`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cepa`
--
ALTER TABLE `cepa`
  MODIFY `id_cepa` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT de la tabla `db_vinos`
--
ALTER TABLE `db_vinos`
  MODIFY `id_vino` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `db_vinos`
--
ALTER TABLE `db_vinos`
  ADD CONSTRAINT `db_vinos_ibfk_1` FOREIGN KEY (`cepa`) REFERENCES `cepa` (`id_cepa`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
