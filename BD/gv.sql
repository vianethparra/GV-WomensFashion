--
-- Database: `gv`
--

-- --------------------------------------------------------

CREATE TABLE `articulo` (
  `id_articulo` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `categoria` int(11) NOT NULL,
  `precio` decimal(10,2) NOT NULL,
  `stock` int(11) NOT NULL,
  `descripcion` varchar(2000) NOT NULL,
  `vendido` int(11) NOT NULL DEFAULT '0',
  `calificacion` int(11) NOT NULL DEFAULT '0',
  `contador` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `articulo` (`id_articulo`, `nombre`, `categoria`, `precio`, `stock`, `descripcion`, `vendido`, `calificacion`, `contador`, `created_at`, `updated_at`) VALUES
(1, 'Abrigo negro', 1, '740.00', 82, 'abc', 0, 0, 1, '2016-11-12 21:47:51', '2016-11-12 12:01:28'),
(2, 'Bluson', 1, '1815.00', 33, 'c', 0, 0, 1, '2016-11-13 22:02:23', '2016-11-12 12:01:28'),
(3, 'Abrigo casual', 1, '1532.00', 78, 'b', 0, 0, 1, '2016-11-12 12:01:28', '2016-11-12 12:01:28'),
(4, 'Sudadera hombros', 1, '205.00', 57, 'c', 0, 0, 1, '2016-11-13 21:33:41', '2016-11-12 12:01:28'),
(5, 'Vestido alas', 1, '174.00', 51, 'd', 0, 0, 1, '2016-11-12 12:01:28', '2016-11-12 12:01:28'),
(6, 'Vestido corto', 1, '1854.00', 79, 'e', 0, 0, 1, '2016-11-12 12:01:28', '2016-11-12 12:01:28'),
(7, 'Conjunto falta', 1, '737.00', 85, 'f', 0, 0, 1, '2016-11-12 12:01:28', '2016-11-12 12:01:28'),
(8, 'Sueter', 1, '199.00', 57, 'g', 0, 0, 1, '2016-11-12 12:01:28', '2016-11-12 12:01:28'),
(9, 'Bluson rojo', 1, '1479.00', 12, 'h', 0, 0, 1, '2016-11-12 12:01:28', '2016-11-12 12:01:28'),
(10, 'Vestido noche', 1, '771.00', 44, 'i', 0, 0, 1, '2016-11-12 12:01:28', '2016-11-12 12:01:28'),
(11, 'Conjunto Adidas', 1, '288.00', 14, 'j', 0, 0, 1, '2016-11-12 12:01:28', '2016-11-12 12:01:28'),
(12, 'Juego lenceria', 1, '973.00', 84, 'l', 0, 0, 1, '2016-11-12 12:01:28', '2016-11-12 12:01:28'),
(13, 'Vestido con mangas', 1, '928.00', 25, 'k', 0, 0, 1, '2016-11-12 12:01:28', '2016-11-12 12:01:28'),
(14, 'Conjunto sport', 1, '1014.00', 9, 'm', 0, 0, 1, '2016-11-12 12:01:28', '2016-11-12 12:01:28'),
(15, 'Chaqueta', 1, '1111.00', 16, 'n', 0, 0, 1, '2016-11-12 12:01:28', '2016-11-12 12:01:28'),
(16, 'Abrigo', 1, '384.00', 54, 'o', 0, 0, 1, '2016-11-12 12:01:28', '2016-11-12 12:01:28'),
(17, 'Saco rojo', 1, '616.00', 83, 'p', 0, 0, 1, '2016-11-12 12:01:28', '2016-11-12 12:01:28'),
(18, 'Vestido casual', 1, '1203.00', 77, 'q', 0, 0, 1, '2016-11-12 12:01:28', '2016-11-12 12:01:28'),
(19, 'Conjunto sudadera', 1, '1456.00', 92, 'r', 0, 0, 1, '2016-11-12 12:01:28', '2016-11-12 12:01:28'),
(20, 'Vestido', 1, '950.00', 60, 's', 0, 0, 1, '2016-11-12 12:01:28', '2016-11-12 12:01:28'),
(21, 'Botines', 2, '2986.00', 155, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(22, 'Zapatillas', 2, '4822.00', 172, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(23, 'Zapatillas brillo', 2, '4901.00', 109, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(24, 'Botas', 2, '1850.00', 129, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(25, 'Tennis', 2, '4003.00', 141, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(26, 'Zapatillas', 2, '4647.00', 195, 'descripcion', 0, 0, 1, '2016-11-13 20:24:18', '2016-11-13 02:35:39'),
(27, 'Zapatillas punta', 2, '1161.00', 114, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(28, 'Pantunflas lobo', 2, '821.00', 49, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(29, 'Zapatitos', 2, '3253.00', 67, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(30, 'Zapatitos abiertos', 2, '4150.00', 61, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(31, 'Zapatitos black', 2, '869.00', 14, 'descripcion', 0, 0, 1, '2016-11-13 20:24:47', '2016-11-13 02:35:39'),
(32, 'Zapatillas altas', 2, '1996.00', 149, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(33, 'Huarachitos', 2, '3254.00', 41, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(34, 'Tennis', 2, '4256.00', 155, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(35, 'Tennis altos', 2, '2911.00', 1, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(36, 'Pantunflas', 2, '2802.00', 47, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(37, 'Zapatillas botas', 2, '1412.00', 72, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(38, 'Tennis KN', 2, '2797.00', 27, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(39, 'Huarachitos brillo', 2, '2805.00', 57, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(40, 'Botas altas', 2, '1674.00', 142, 'descripcion', 0, 0, 1, '2016-11-13 02:35:39', '2016-11-13 02:35:39'),
(41, 'Bolso', 3, '1266.00', 47, 'descripcion', 0, 0, 1, '2016-11-13 02:38:05', '2016-11-13 02:38:05'),
(42, 'Bolsa', 3, '1712.00', 52, 'descripcion', 0, 0, 1, '2016-11-13 02:38:05', '2016-11-13 02:38:05'),
(43, 'Bolso mano', 3, '1450.00', 124, 'descripcion', 0, 0, 1, '2016-11-13 02:38:05', '2016-11-13 02:38:05'),
(44, 'Bolsa grande', 3, '4482.00', 122, 'descripcion', 0, 0, 1, '2016-11-13 02:38:05', '2016-11-13 02:38:05'),
(45, 'Reloj brillo', 3, '3608.00', 124, 'descripcion', 0, 0, 1, '2016-11-13 02:38:05', '2016-11-13 02:38:05'),
(46, 'Reloj importado', 3, '3477.00', 29, 'descripcion', 0, 0, 1, '2016-11-13 02:38:05', '2016-11-13 02:38:05'),
(47, 'Reloj cuadro pequeno', 3, '875.00', 78, 'descripcion', 0, 0, 1, '2016-11-13 02:38:05', '2016-11-13 02:38:05'),
(48, 'Reloj circular pequeno', 3, '4578.00', 101, 'descripcion', 0, 0, 1, '2016-11-13 02:38:06', '2016-11-13 02:38:06'),
(49, 'Pulsera pavoreal', 3, '4575.00', 114, 'descripcion', 0, 0, 1, '2016-11-13 02:38:06', '2016-11-13 02:38:06'),
(50, 'Aretes diamantes', 3, '2932.00', 98, 'descripcion', 0, 0, 1, '2016-11-13 02:38:06', '2016-11-13 02:38:06'),
(51, 'Collar perlas', 3, '4498.00', 136, 'descripcion', 0, 0, 1, '2016-11-13 02:38:06', '2016-11-13 02:38:06'),
(52, 'Aretes largos', 3, '3533.00', 121, 'descripcion', 0, 0, 1, '2016-11-13 02:38:06', '2016-11-13 02:38:06'),
(53, 'Juego anillos', 3, '1944.00', 184, 'descripcion', 0, 0, 1, '2016-11-13 02:38:06', '2016-11-13 02:38:06'),
(54, 'Juego collar', 3, '1720.00', 126, 'descripcion', 0, 0, 1, '2016-11-13 04:19:49', '2016-11-13 02:38:06'),
(55, 'Aretes esfera', 3, '3190.00', 192, 'descripcion', 0, 0, 1, '2016-11-13 02:38:06', '2016-11-13 02:38:06'),
(56, 'Pulsera esferas', 3, '2783.00', 94, 'descripcion', 0, 0, 1, '2016-11-13 02:38:06', '2016-11-13 02:38:06'),
(57, 'Anillo diamantes', 3, '2818.00', 137, 'descripcion', 0, 0, 1, '2016-11-13 02:38:06', '2016-11-13 02:38:06'),
(58, 'Collar cruz', 3, '229.00', 73, 'descripcion', 0, 0, 1, '2016-11-13 02:38:06', '2016-11-13 02:38:06'),
(59, 'Anillo acabado', 3, '3200.00', 51, 'descripcion', 0, 0, 1, '2016-11-13 02:38:06', '2016-11-13 02:38:06'),
(60, 'Pulsera oro/diamantes', 3, '4500.00', 190, 'descripcion', 0, 0, 1, '2016-11-13 02:38:06', '2016-11-13 02:38:06');

-- --------------------------------------------------------

CREATE TABLE `carrito` (
  `id_carrito` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `cantidad` int(11) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

CREATE TABLE `categoria` (
  `id_categoria` int(11) NOT NULL,
  `categoria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


INSERT INTO `categoria` (`id_categoria`, `categoria`) VALUES
(1, 'ropa'),
(2, 'calzado'),
(3, 'accesorio');

-- --------------------------------------------------------

CREATE TABLE `comentario` (
  `id_comentario` int(11) NOT NULL,
  `id_articulo` int(11) NOT NULL,
  `usuario` varchar(50) NOT NULL,
  `comentario` varchar(2000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `comentario` (`id_comentario`, `id_articulo`, `usuario`, `comentario`, `created_at`, `updated_at`) VALUES
(1, 1, 'Luis E.', 'Muy buen producto, me encanto', '2016-11-12 21:40:06', '0000-00-00 00:00:00'),
(2, 1, 'Parra Parra', 'Oie , si quiero perdir dos mas, hago otro pedido?', '2016-11-13 10:52:30', '2016-11-13 10:52:30'),
(3, 1, 'Tercero', 'Bueno, pues parece que ya quedo', '2016-11-13 11:13:05', '2016-11-13 11:13:05');

-- --------------------------------------------------------

CREATE TABLE `pedido` (
  `id_pedido` int(11) NOT NULL,
  `id_usuario` int(11) NOT NULL,
  `total` decimal(10,2) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `pedido` (`id_pedido`, `id_usuario`, `total`, `created_at`, `updated_at`) VALUES
(1, 2, '200.00', '2016-11-09 16:01:34', '0000-00-00 00:00:00'),
(2, 2, '3630.00', '2016-11-14 05:02:29', '2016-11-14 05:02:29');

-- --------------------------------------------------------

CREATE TABLE `tipo` (
  `id_tipo` int(11) NOT NULL,
  `tipo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tipo` (`id_tipo`, `tipo`) VALUES
(1, 'admin'),
(2, 'user');

-- --------------------------------------------------------

CREATE TABLE `usuario` (
  `id_usuario` int(11) NOT NULL,
  `nombre` varchar(100) NOT NULL,
  `correo` varchar(100) NOT NULL,
  `contrasena` varchar(20) NOT NULL,
  `tipo` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `usuario` (`id_usuario`, `nombre`, `correo`, `contrasena`, `tipo`, `created_at`, `updated_at`) VALUES
(1, 'root', 'leo_spider2@hotmail.com', '12345', 1, '2016-11-09 16:39:58', '0000-00-00 00:00:00'),
(2, 'luis', 'luis@hotmail.com', '12345', 2, '2016-11-09 16:01:15', '0000-00-00 00:00:00'),
(3, 'Victor Gallardo', 'shinigv@gmail.com', 'contra', 2, '2016-11-14 00:46:05', '2016-11-14 00:46:05');

ALTER TABLE `articulo`
  ADD PRIMARY KEY (`id_articulo`),
  ADD KEY `categoria` (`categoria`);

ALTER TABLE `carrito`
  ADD PRIMARY KEY (`id_carrito`),
  ADD KEY `id_articulo` (`id_articulo`);

ALTER TABLE `categoria`
  ADD PRIMARY KEY (`id_categoria`);

ALTER TABLE `comentario`
  ADD PRIMARY KEY (`id_comentario`),
  ADD KEY `id_articulo` (`id_articulo`);

ALTER TABLE `pedido`
  ADD PRIMARY KEY (`id_pedido`),
  ADD KEY `id_usuario` (`id_usuario`);

ALTER TABLE `tipo`
  ADD PRIMARY KEY (`id_tipo`);

ALTER TABLE `usuario`
  ADD PRIMARY KEY (`id_usuario`),
  ADD KEY `tipo` (`tipo`);

ALTER TABLE `articulo`
  MODIFY `id_articulo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

ALTER TABLE `carrito`
  MODIFY `id_carrito` int(11) NOT NULL AUTO_INCREMENT;

ALTER TABLE `comentario`
  MODIFY `id_comentario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE `pedido`
  MODIFY `id_pedido` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE `usuario`
  MODIFY `id_usuario` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
