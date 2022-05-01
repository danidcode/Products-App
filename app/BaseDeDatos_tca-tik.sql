
SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

--
-- Base de datos: `tca_tik`
--
CREATE DATABASE IF NOT EXISTS `tca_tik` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `tca_tik`;
-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `category`
--

CREATE TABLE `category` (
  `CategoryID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Volcado de datos para la tabla `category`
--

INSERT INTO `category` (`CategoryID`, `Name`) VALUES
(1, 'PANTALÓN'),
(2, 'CAMISA'),
(3, 'JERSEY'),
(4, 'CHAQUETA');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `almacenes`
--


CREATE TABLE `almacenes` (
  `AlmacenID` int(11) NOT NULL,
  `Ubicacion` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

ALTER TABLE `almacenes`
  ADD PRIMARY KEY (`AlmacenID`);
--
-- Volcado de datos para la tabla `almacenes`
--

INSERT INTO `almacenes` (`AlmacenID` ,`Ubicacion`)
VALUES
  (1,"Ceuta"),
  (2,"Murcia"),
  (3,"Pamplona"),
  (4,"Santander"),
  (5,"Valladolid");


--
-- Estructura de tabla para la tabla `products`
--

CREATE TABLE `products` (
  `ProductID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Price` decimal(10,2) NOT NULL,
  `Observaciones` varchar(50) NOT NULL,
  `CategoryID` int(11) NOT NULL,
  `AlmacenID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


-- --------------------------------------------------------
--
-- Volcado de datos para la tabla `products`
--

INSERT INTO `products` (`ProductID`, `Name`, `Price`, `Observaciones`, `CategoryID`, `AlmacenID`) VALUES
(1, 'Loop 501 Talla S', '100.00','Nueva Temporada' , 1, 2 ),
(2, 'Loop 501 Talla M', '100.00', 'Temporada de invierno', 1,5),
(3, 'Loop Talla S', '25.00', 'Nueva Temporada' , 2,5),
(4, 'Loop Talla M', '25.00', 'Temporada de invierno', 2, 2),
(5, 'Jersey Rojo Talla S', '110.00','Nueva Temporada' , 3, 2),
(6, 'Jersey Rojo Talla S',  '150.00', 'Casual', 3,5),
(7, 'Jersey Verde Talla S',  '150.00', 'Casual', 3, 2),
(8, 'Jersey Verde Talla M',  '150.00', 'Temporada de invierno',3,4),
(9, 'Jersey Rojo Talla M', '150.00', 'Temporada de invierno',3, 2),
(10, 'Trousers Blue Talla S', '225.00','Casual', 1,1),
(11, 'Trousers Blue Talla M',  '225.00', 'Casual', 1,5),
(12, 'Trousers Red Talla S', '225.00','Temporada de invierno', 1,4),
(13, 'Trousers Red Talla M',  '225.00', 'Casual', 1,4),
(14, 'Jacket Red Talla XL', '225.00', 'Casual', 1,3),
(15, 'Camisa Purple Talla S',  '75.00','Nueva Temporada' , 2,5),
(16, 'Camisa Iris Talla L', '75.00', 'Nueva Temporada' , 2,3),
(17, 'Jacket Cyan M',  '250.00','Temporada de invierno', 4,1),
(18, 'Jacket Cyan L', '250.00', 'Nueva Temporada' , 4,1),
(19, 'Jacket Cyan XL',  '250.00', 'Temporada de invierno', 4,3),
(20, 'Jacket Cyan XXL',  '250.00', 'Temporada de invierno', 4,1);
--
-- Indices de la tabla `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`CategoryID`);

--
-- Indices de la tabla `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`ProductID`),
  ADD KEY `FK_PRODUCTS_CATEGORY_CATEGORY` (`CategoryID`);

-- Claves fóraneas que referencian a categoría y almacenes

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `products`
--
ALTER TABLE `products`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `product`
--
ALTER TABLE `products`
  ADD CONSTRAINT `FK_PRODUCT_CATEGORY_CATEGORY` FOREIGN KEY (`CategoryID`) REFERENCES `category` (`CategoryID`) ON DELETE CASCADE ON UPDATE CASCADE;

  ALTER TABLE `products`
  ADD CONSTRAINT `FK_PRODUCT_ALMACEN_ALMACEN` FOREIGN KEY (`AlmacenID`) REFERENCES `almacenes` (`AlmacenID`) ON DELETE CASCADE ON UPDATE CASCADE;



