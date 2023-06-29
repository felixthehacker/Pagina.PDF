-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 01-01-2013 a las 12:39:22
-- Versión del servidor: 10.1.38-MariaDB
-- Versión de PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `pdf`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `descargas`
--

CREATE TABLE `descargas` (
  `id` int(11) NOT NULL,
  `nombre_usuario` varchar(255) NOT NULL,
  `codigo_de_libro` int(11) NOT NULL,
  `fecha` date NOT NULL,
  `hora` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `descargas`
--

INSERT INTO `descargas` (`id`, `nombre_usuario`, `codigo_de_libro`, `fecha`, `hora`) VALUES
(1, 'admin', 0, '2023-06-27', '13:45:33');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `libros`
--

CREATE TABLE `libros` (
  `codigo_de_libro` varchar(20) NOT NULL,
  `titulo` varchar(255) NOT NULL,
  `autor` varchar(255) NOT NULL,
  `descripcion` text NOT NULL,
  `url` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `libros`
--

INSERT INTO `libros` (`codigo_de_libro`, `titulo`, `autor`, `descripcion`, `url`) VALUES
('16878687949912', 'El Caballero de la Armadura Oxidada', 'Robert Fishter', 'un libro de aventura', 'pdf_files/el-caballero-de-la-armadura-oxidada-robert-fisher.pdf'),
('16878702489683', 'El principito', 'Antoine de Saint-ExupÃ©ry', 'El principito es una novela corta y la obra mÃ¡s famosa del escritor y aviador francÃ©s Antoine de Saint-ExupÃ©ry.â€‹', 'pdf_files/el principito.pdf'),
('16878703027341', '48 LEYES DEL PODER', 'Robert Greene', 'Las 48 leyes del poder â€”tÃ­tulo en inglÃ©s: The 48 Laws of Powerâ€” es el primer libro del escritor estadounidense Robert Greene, publicado originalmente en 1998', 'pdf_files/[PD] Libros - 48 leyes del Poder.pdf'),
('16878703491017', 'Planilandia', 'Edwin Abbott Abbott', 'Flatland: A Romance of Many Dimensions, traducida al espaÃ±ol como Planilandia: Una novela de muchas dimensiones, â€‹ es una novela satÃ­rica de 1884 escrita por Edwin Abbott Abbott bajo el seudÃ³nimo \"A Square\" â€‹', 'pdf_files/Abbott, Edwin A. - Planilandia.pdf');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `registro`
--

CREATE TABLE `registro` (
  `id` int(11) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `libro` varchar(200) NOT NULL,
  `hora` varchar(30) NOT NULL,
  `fecha` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `registro`
--

INSERT INTO `registro` (`id`, `nombre`, `libro`, `hora`, `fecha`) VALUES
(29, 'urser', 'caballero', '2023-06-27', '17:44:39'),
(30, 'urser', 'El Caballero de la Armadura Oxidada', '2023-06-27', '17:45:01');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `usuario`
--

CREATE TABLE `usuario` (
  `id` int(6) NOT NULL,
  `usuario` varchar(30) NOT NULL,
  `clave` varchar(30) NOT NULL,
  `tipo` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Volcado de datos para la tabla `usuario`
--

INSERT INTO `usuario` (`id`, `usuario`, `clave`, `tipo`) VALUES
(17, 'felix', 'Eclips31675738', 'usuario'),
(18, 'admin', 'admin', 'administrador'),
(19, 'luis', 'heumacaco', 'usuario'),
(20, 'juan', 'acosta', 'usuario'),
(21, 'urser', 'urser', 'usuario');

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `descargas`
--
ALTER TABLE `descargas`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `libros`
--
ALTER TABLE `libros`
  ADD PRIMARY KEY (`codigo_de_libro`);

--
-- Indices de la tabla `registro`
--
ALTER TABLE `registro`
  ADD PRIMARY KEY (`id`);

--
-- Indices de la tabla `usuario`
--
ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `descargas`
--
ALTER TABLE `descargas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT de la tabla `registro`
--
ALTER TABLE `registro`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT de la tabla `usuario`
--
ALTER TABLE `usuario`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
