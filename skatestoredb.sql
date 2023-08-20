-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Servidor: 127.0.0.1
-- Tiempo de generación: 03-01-2022 a las 03:31:09
-- Versión del servidor: 10.4.20-MariaDB
-- Versión de PHP: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de datos: `skatestoredb`
--

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `cartitem`
--

CREATE TABLE `cartitem` (
  `id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `ShopCartID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `cartitem`
--

INSERT INTO `cartitem` (`id`, `amount`, `ProductID`, `ShopCartID`, `StatusID`) VALUES
(9, 2, 2, 16, 5),
(10, 2, 2, 16, 5),
(11, 2, 1, 16, 5),
(12, 2, 2, 16, 5),
(13, 2, 1, 16, 5),
(14, 5, 2, 16, 5),
(18, 1, 1, 18, 5),
(19, 3, 2, 18, 5),
(20, 6, 1, 18, 5),
(23, 1, 2, 19, 3),
(25, 1, 4, 16, 5),
(28, 2, 1, 17, 3),
(29, 1, 5, 17, 3),
(30, 1, 3, 17, 3),
(31, 1, 2, 17, 3),
(32, 1, 4, 17, 3),
(33, 1, 5, 19, 3),
(34, 1, 4, 19, 3),
(36, 4, 2, 22, 5),
(37, 1, 3, 23, 5),
(38, 1, 3, 19, 5),
(39, 1, 8, 25, 3),
(40, 1, 7, 25, 5),
(41, 1, 7, 24, 3),
(42, 1, 2, 24, 5),
(43, 1, 3, 20, 3),
(44, 1, 1, 28, 3),
(45, 1, 1, 32, 3),
(46, 1, 3, 37, 3),
(47, 1, 1, 37, 3),
(48, 1, 1, 38, 3),
(49, 1, 2, 38, 3),
(50, 1, 8, 39, 3),
(51, 6, 6, 40, 3),
(52, 1, 1, 42, 3),
(54, 2, 3, 27, 3),
(55, 2, 2, 44, 3),
(56, 10, 4, 45, 3),
(57, 3, 5, 43, 3),
(58, 3, 2, 43, 3),
(59, 2, 6, 46, 3),
(62, 1, 2, 29, 3),
(63, 1, 8, 29, 3),
(64, 1, 7, 29, 3),
(65, 1, 8, 48, 3),
(66, 1, 6, 47, 3),
(67, 1, 4, 57, 3),
(68, 1, 2, 57, 3),
(69, 1, 8, 57, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `paymethod`
--

CREATE TABLE `paymethod` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `paymethod`
--

INSERT INTO `paymethod` (`ID`, `Name`, `StatusID`) VALUES
(1, 'Efectivo', 1),
(2, 'Credito', 1),
(3, 'Debito', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `product`
--

CREATE TABLE `product` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Price` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Stock` int(11) NOT NULL,
  `ImageURL` varchar(400) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Description` varchar(400) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `ProducttypeID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `product`
--

INSERT INTO `product` (`ID`, `Name`, `Price`, `Stock`, `ImageURL`, `Description`, `ProducttypeID`, `StatusID`) VALUES
(1, 'Lija Skate', '3500', 12, 'https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSovhboZmWGInHSjRByO2KqRlWcAk_-i27FlA&usqp=CAU', 'Maecenas consectetur ultricies mi vel venenatis. Curabitur risus tellus, congue non tellus at.', 5, 1),
(2, 'Pack 8 Rodamientos', '15000', 5, 'https://contents.mediadecathlon.com/p5796/k$4b946a603445107d9395aadca4d8306c/set-8-rodamientos-patines-skateboard-scooter-abec-7.jpg?&f=452x452', 'Maecenas consectetur ultricies mi vel venenatis. Curabitur risus tellus, congue non tellus at.', 3, 1),
(3, 'Tabla Skate 8.25 Pro Blank', '25000', 9, 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcS35e8QFpws_M0rMUpP4aXhw0gQt6vmpPq1a8LXZjlFkVoI6EQS025GsGlj8hgvd3tuXoAFyFazHo8AB5_q6Sb_CGDM9C1SNFiR2mnL_6i20DWUBQhaUzGx&usqp=CAE', 'LAMINATES TABLA DE SKATE PROFESIONAL BLANK ALTA CALIDAD', 4, 1),
(4, 'LLave Skate en T Jigsaw', '8000', 47, 'https://http2.mlstatic.com/D_NQ_NP_929127-MLC32986333927_112019-O.webp', 'Herramienta en forma de T marca Jigsaw color negro', 6, 1),
(5, 'Trucks Industial White and Black', '38000', 25, 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcT3Ij2k_5gw7RmTt7-fe6bhn0BviGg9Db8txMbxLG4v3WrTNlPGhR3vbwwIKIQfF8_QCgNAEYneFoIDjZ7G1coqHaTTeIJ1fLLxOFBcmcQKF0QGC4PIZYH2&usqp=CAE', 'INDUSTRIAL TRUCKS 5.5 / GUARANTEED FOR LIFE / Livianos & Resistentes .', 2, 1),
(6, 'Tabla Skate 8.25 Madera Karma', '34000', 8, 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcQ38dHgXn-VIW0Fyyl0FHPavDZZAQW_XGCVIcLqWm-0cEmLYgqMYUnFABufzBOmrtCJ8_vLlNwzVCH6wK_q03uhe4FCu72YAXKmfJ8P55rJKSxY1RUQmMqKxw&usqp=CAE', 'Tabla de Skate Profesional Madera KARMA 8.25\" Deck\r\n\r\n* Madera KARMA skateboards deck por Madera.\r\n* KARMA Deck Model\r\n* Cóncavo Hiperkick\r\n* Construcción de Maple 7 capas.\r\n* Anchura: 8.25 x 32\"', 4, 1),
(7, 'Tabla Skate South Force Alien', '40000', 5, 'https://encrypted-tbn2.gstatic.com/shopping?q=tbn:ANd9GcSDdZXC05SCNdDLdYC13X510kicEnyV7xHjEcd81BFfNnFjNObgySsN2NiHNKS3VS-AYiBV7WFJYGufZw2KMoQ-pUngROvzJ8D9skPJCrejSdfrY8-CqBC9yw&usqp=CAE', 'TABLAK SKATEBOARD PROFESIONAL\r\nMARCA SOUTH FORCE\r\nMODELO : ALIEN\r\nMEDIDA : 8,125X32\r\nHIGH CONCAVO\r\nMATERIAL : 100% MAPLE CANADIENSE\r\nTABLA INCLUYE LIJA', 4, 1),
(8, 'Lija Skate Omo Jigsaw Microperforada Calidad', '6700', 45, 'https://encrypted-tbn1.gstatic.com/shopping?q=tbn:ANd9GcTflljEkbAgJXbRKvIjmFrOoZ19tVez1_bToWjZwVUNX3YDaDOFCcLr_1lDzv3nDHdPwohtRW_obBQLlIPbhGYm5k8eRd0xizNIIdyKZCs&usqp=CAE', 'Lija Skate JIGSAW Microperforada Alta Calidad OMO.\r\n\r\n- Omo Model\r\n- Griptape Alta Calidad.\r\n- Excelente y Duradero Grano de Agarre.\r\n- OS800.\r\n- High Quality Sticky Adhesive.\r\n- Ultra Silicon Carbide.\r\n- Excelente Agarre.\r\n- Dimensiones: 9x33\".\r\n- MicroPerfored Technology\r\n- Producto Profesional.', 5, 1),
(9, 'Tabla Skate Madera Balloon', '34000', 8, 'https://http2.mlstatic.com/D_NQ_NP_644950-MLC47874353239_102021-O.webp', 'TABLA DE SKATE PROFESIONAL MADERA SKATEBOARD BALLOON 8.13X32\"\r\n\r\nMODELO: BALLOON 8.13.\r\nMARCA: MADERA SB.\r\nANCHO: 8.13”\r\nLARGO: 32\"\r\nCONCAVO: MEDIO / HALFKICK\r\nCONSTRUCCIÓN: 7 CAPAS\r\n100% HARD ROCK CANADIAN MAPLE.', 4, 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `producttype`
--

CREATE TABLE `producttype` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `producttype`
--

INSERT INTO `producttype` (`ID`, `Name`, `StatusID`) VALUES
(1, 'Ruedas', 1),
(2, 'Trucks', 1),
(3, 'Rodamientos', 1),
(4, 'Tabla', 1),
(5, 'Lija', 1),
(6, 'Llave', 1);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `saledetail`
--

CREATE TABLE `saledetail` (
  `ID` int(11) NOT NULL,
  `DateTime` datetime NOT NULL,
  `Neto` int(11) NOT NULL,
  `IVA` int(11) NOT NULL,
  `Total` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ShopCartID` int(11) NOT NULL,
  `PayMethod_ID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `saledetail`
--

INSERT INTO `saledetail` (`ID`, `DateTime`, `Neto`, `IVA`, `Total`, `UserID`, `ShopCartID`, `PayMethod_ID`, `StatusID`) VALUES
(9, '2021-12-27 22:04:41', 93000, 17670, 110670, 10, 17, 1, 3),
(10, '2021-12-27 23:17:26', 60000, 11400, 71400, 10, 22, 1, 3),
(11, '2021-12-27 23:20:35', 25000, 4750, 29750, 10, 23, 1, 3),
(12, '2021-12-27 23:22:19', 61000, 11590, 72590, 12, 19, 1, 3),
(13, '2021-12-27 23:23:47', 6700, 1273, 7973, 12, 25, 1, 3),
(14, '2021-12-27 23:26:38', 40000, 7600, 47600, 10, 24, 1, 3),
(15, '2021-12-27 23:30:30', 25000, 4750, 29750, 13, 20, 1, 3),
(16, '2021-12-27 23:30:56', 3500, 665, 4165, 13, 28, 1, 3),
(17, '2021-12-27 23:38:34', 3500, 665, 4165, 15, 32, 1, 3),
(18, '2021-12-27 23:42:17', 28500, 5415, 33915, 17, 37, 1, 3),
(19, '2021-12-27 23:42:28', 18500, 3515, 22015, 17, 38, 1, 3),
(20, '2021-12-27 23:42:37', 6700, 1273, 7973, 17, 39, 1, 3),
(21, '2021-12-27 23:42:52', 204000, 38760, 242760, 17, 40, 1, 3),
(22, '2021-12-28 01:30:42', 3500, 665, 4165, 18, 42, 1, 3),
(23, '2021-12-28 03:31:18', 50000, 9500, 59500, 10, 27, 1, 3),
(24, '2021-12-28 03:31:39', 30000, 5700, 35700, 10, 44, 1, 3),
(25, '2021-12-28 03:38:51', 80000, 15200, 95200, 10, 45, 1, 3),
(26, '2021-12-28 04:13:26', 387000, 73530, 460530, 18, 43, 3, 3),
(27, '2021-12-28 11:51:58', 68000, 12920, 80920, 10, 46, 3, 3),
(28, '2021-12-28 13:11:45', 61700, 11723, 73423, 13, 29, 3, 3),
(29, '2021-12-28 15:31:52', 6700, 1273, 7973, 10, 48, 1, 3),
(30, '2021-12-28 16:22:38', 34000, 6460, 40460, 18, 47, 2, 3),
(31, '2021-12-28 16:23:13', 29700, 5643, 35343, 18, 57, 1, 3);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `shopcart`
--

CREATE TABLE `shopcart` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `shopcart`
--

INSERT INTO `shopcart` (`ID`, `UserID`, `StatusID`) VALUES
(16, 9, 6),
(17, 10, 3),
(18, 11, 6),
(19, 12, 3),
(20, 13, 3),
(22, 10, 3),
(23, 10, 3),
(24, 10, 3),
(25, 12, 3),
(26, 12, 6),
(27, 10, 3),
(28, 13, 3),
(29, 13, 3),
(30, 14, 6),
(31, 14, 6),
(32, 15, 3),
(33, 15, 6),
(34, 15, 6),
(35, 16, 6),
(36, 16, 6),
(37, 17, 3),
(38, 17, 3),
(39, 17, 3),
(40, 17, 3),
(41, 17, 6),
(42, 18, 3),
(43, 18, 3),
(44, 10, 3),
(45, 10, 3),
(46, 10, 3),
(47, 18, 3),
(48, 10, 3),
(49, 13, 6),
(56, 10, 6),
(57, 18, 3),
(58, 18, 6),
(59, 27, 6),
(60, 28, 6);

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `status`
--

CREATE TABLE `status` (
  `ID` int(11) NOT NULL,
  `Name` varchar(45) COLLATE utf8_spanish2_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `status`
--

INSERT INTO `status` (`ID`, `Name`) VALUES
(1, 'Enable'),
(2, 'Disable'),
(3, 'Bought'),
(4, 'Eliminated'),
(5, 'Added'),
(6, 'Pending'),
(7, 'Admin'),
(8, 'Client'),
(9, 'Test');

-- --------------------------------------------------------

--
-- Estructura de tabla para la tabla `user`
--

CREATE TABLE `user` (
  `ID` int(11) NOT NULL,
  `Username` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Password` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Email` varchar(45) COLLATE utf8_spanish2_ci NOT NULL,
  `Description` varchar(100) COLLATE utf8_spanish2_ci DEFAULT NULL,
  `Phone` int(11) DEFAULT NULL,
  `StatusID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_spanish2_ci;

--
-- Volcado de datos para la tabla `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `Email`, `Description`, `Phone`, `StatusID`) VALUES
(1, 'Admin', '1234', 'Admin@skate.cl', 'Hoy amaneci re ido', 666, 7),
(2, 'guest', '??@?@??', '??@?@??', NULL, NULL, 2),
(3, 'client', '1234', 'client@skateshop.cl', NULL, NULL, 8),
(9, 'Gust', '1234', 'Gus@skateshop.cl', 'Ndeaaas', 2147483647, 8),
(10, 'pive', '1234', 'pive@skatestore.cl', 'Este pive', 666, 8),
(11, 'peter', '1234', 'peter@skatestore.cl', 'Da lo mismo', 666, 8),
(12, 'ghg', '1234', '', 'nininini', NULL, 8),
(13, 'Pedro', '1234', 'peuro@il', 'jajajaajja re loco', 666, 8),
(14, 'Joj', '1234', 'Joj@skate.cl', 'Fine', 666, 8),
(15, 'Ahoy', '33', 'ajojj@outlook.com', ' Ndea', 9999, 8),
(16, 'Lalo', '11', 'lalo@landa.cl', 'g', 777, 8),
(17, 'Ñem', '33', '121@ss', 'efe', 323, 8),
(18, 'Elle', '1234', 'asjdjsa@jajsj', 'Ndeaaaa', 666, 8),
(27, 'JEEJ', '1', 'asdsa@daasd', 'adasd', 4344, 8),
(28, 'lalala', '1234', 'joj@joj', 'OKOKOKOKOKOKO', NULL, 8);

--
-- Índices para tablas volcadas
--

--
-- Indices de la tabla `cartitem`
--
ALTER TABLE `cartitem`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_Añadir al carrito_Product1_idx` (`ProductID`),
  ADD KEY `fk_Añadir al carrito_ShopCart1_idx` (`ShopCartID`),
  ADD KEY `fk_AddToCar_Status1_idx` (`StatusID`);

--
-- Indices de la tabla `paymethod`
--
ALTER TABLE `paymethod`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_PayMethod_Status1_idx` (`StatusID`);

--
-- Indices de la tabla `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Product_Product_type1_idx` (`ProducttypeID`),
  ADD KEY `fk_Product_Status1_idx` (`StatusID`);

--
-- Indices de la tabla `producttype`
--
ALTER TABLE `producttype`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Product_type_Status1_idx` (`StatusID`);

--
-- Indices de la tabla `saledetail`
--
ALTER TABLE `saledetail`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_Sale_Status1_idx` (`StatusID`),
  ADD KEY `fk_Sale_ShopCart1_idx` (`ShopCartID`),
  ADD KEY `fk_SaleDetails_PayMethod1_idx` (`PayMethod_ID`),
  ADD KEY `fk_SaleDetails_User1_idx` (`UserID`);

--
-- Indices de la tabla `shopcart`
--
ALTER TABLE `shopcart`
  ADD PRIMARY KEY (`ID`),
  ADD KEY `fk_ShopCart_User1_idx` (`UserID`),
  ADD KEY `fk_ShopCart_Status1_idx` (`StatusID`);

--
-- Indices de la tabla `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`ID`);

--
-- Indices de la tabla `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`ID`),
  ADD UNIQUE KEY `username_UNIQUE` (`Username`),
  ADD KEY `fk_User_Status1_idx` (`StatusID`);

--
-- AUTO_INCREMENT de las tablas volcadas
--

--
-- AUTO_INCREMENT de la tabla `cartitem`
--
ALTER TABLE `cartitem`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=70;

--
-- AUTO_INCREMENT de la tabla `paymethod`
--
ALTER TABLE `paymethod`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT de la tabla `product`
--
ALTER TABLE `product`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `producttype`
--
ALTER TABLE `producttype`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT de la tabla `saledetail`
--
ALTER TABLE `saledetail`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT de la tabla `shopcart`
--
ALTER TABLE `shopcart`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT de la tabla `status`
--
ALTER TABLE `status`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT de la tabla `user`
--
ALTER TABLE `user`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- Restricciones para tablas volcadas
--

--
-- Filtros para la tabla `cartitem`
--
ALTER TABLE `cartitem`
  ADD CONSTRAINT `fk_AddToCar_Status1` FOREIGN KEY (`StatusID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Añadir al carrito_Product1` FOREIGN KEY (`ProductID`) REFERENCES `product` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Añadir al carrito_ShopCart1` FOREIGN KEY (`ShopCartID`) REFERENCES `shopcart` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `paymethod`
--
ALTER TABLE `paymethod`
  ADD CONSTRAINT `fk_PayMethod_Status1` FOREIGN KEY (`StatusID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_Product_Product_type1` FOREIGN KEY (`ProducttypeID`) REFERENCES `producttype` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Product_Status1` FOREIGN KEY (`StatusID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `producttype`
--
ALTER TABLE `producttype`
  ADD CONSTRAINT `fk_Product_type_Status1` FOREIGN KEY (`StatusID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `saledetail`
--
ALTER TABLE `saledetail`
  ADD CONSTRAINT `fk_SaleDetails_PayMethod1` FOREIGN KEY (`PayMethod_ID`) REFERENCES `paymethod` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_SaleDetails_User1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Sale_ShopCart1` FOREIGN KEY (`ShopCartID`) REFERENCES `shopcart` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_Sale_Status1` FOREIGN KEY (`StatusID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `shopcart`
--
ALTER TABLE `shopcart`
  ADD CONSTRAINT `fk_ShopCart_Status1` FOREIGN KEY (`StatusID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_ShopCart_User1` FOREIGN KEY (`UserID`) REFERENCES `user` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Filtros para la tabla `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_User_Status1` FOREIGN KEY (`StatusID`) REFERENCES `status` (`ID`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
