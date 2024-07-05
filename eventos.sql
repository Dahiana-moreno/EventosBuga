-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 17-03-2024 a las 01:35:56
-- Versión del servidor: 10.4.28-MariaDB
-- Versión de PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `eventos`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `eventos`
--

CREATE TABLE `eventos` (
  `id_eventos` int(11) NOT NULL,
  `nombreEvento` varchar(55) NOT NULL,
  `descripcionEvento` varchar(500) NOT NULL,
  `fecha` date NOT NULL,
  `foto` varchar(500) NOT NULL,
  `id_usuario` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `eventos`
--

INSERT INTO `eventos` (`id_eventos`, `nombreEvento`, `descripcionEvento`, `fecha`, `foto`, `id_usuario`) VALUES
(25, 'Concierto en el Parque', 'Disfruta de una noche llena de música en vivo de artistas locales y food trucks con deliciosas opciones gastronómicas.', '2024-03-15', '../img/conciertos1.jpg', 24),
(26, 'Feria de Arte y Artesanía', 'Explora una amplia variedad de obras de arte y artesanías únicas creadas por talentosos artistas locales. Habrá actividades para toda la familia.', '2024-03-16', '../img/standard_52281371778_d3bc692db2_h.jpg.jpg', 24),
(27, 'Carrera de Autos Locales', '¡Siente la emoción mientras los pilotos locales compiten en una carrera de autos llena de velocidad y adrenalina! Habrá música y comida disponible.\r\nSitio de encuentro: Ciudad Motor', '2024-03-23', '../img/gran-turismo-sport.jpg', 24);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuarios`
--

CREATE TABLE `usuarios` (
  `id` int(11) NOT NULL,
  `user` varchar(55) NOT NULL,
  `email` varchar(60) NOT NULL,
  `telefono` int(10) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto` text NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish_ci;

--
-- Volcado de datos para la tabla `usuarios`
--

INSERT INTO `usuarios` (`id`, `user`, `email`, `telefono`, `password`, `foto`) VALUES
(21, 'María López', 'marialopez@example.com', 555, '827ccb0eea8a706c4c34a16891f84e7b', '../img/default.png'),
(22, 'Carlos García', 'carlosgarcia@example.com', 555, '827ccb0eea8a706c4c34a16891f84e7b', '../img/default.jpg'),
(23, 'Ana Martínez', 'anamartinez@example.com', 555, '827ccb0eea8a706c4c34a16891f84e7b', '../img/default.png'),
(24, 'Juan Pérez', 'juanperez@example.com', 555, '827ccb0eea8a706c4c34a16891f84e7b', '../img/default.png');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `eventos`
--
ALTER TABLE `eventos`
  ADD PRIMARY KEY (`id_eventos`);

--
-- Indices de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `eventos`
--
ALTER TABLE `eventos`
  MODIFY `id_eventos` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT de la tabla `usuarios`
--
ALTER TABLE `usuarios`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
