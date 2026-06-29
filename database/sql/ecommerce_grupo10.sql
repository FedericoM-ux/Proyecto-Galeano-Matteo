/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `ecommerce_grupo10` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci */;
USE `ecommerce_grupo10`;

CREATE TABLE IF NOT EXISTS `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` bigint(20) NOT NULL,
  PRIMARY KEY (`key`),
  KEY `cache_locks_expiration_index` (`expiration`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `consultas` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `motivo` varchar(255) NOT NULL,
  `consulta` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `consultas` (`id`, `nombre`, `email`, `motivo`, `consulta`, `created_at`, `updated_at`) VALUES
	(1, 'Fede Matteo', 'federicoomatteo@gmail.com', 'Producto Defectuoso', 'Cierta paleta que compre, al utilizar el mismo día que me llego, se rompio.', '2026-06-18 05:15:39', '2026-06-18 05:15:39');

CREATE TABLE IF NOT EXISTS `failed_jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`id`),
  UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `job_batches` (
  `id` varchar(255) NOT NULL,
  `nombre` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `jobs` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) unsigned NOT NULL,
  `reserved_at` int(10) unsigned DEFAULT NULL,
  `available_at` int(10) unsigned NOT NULL,
  `created_at` int(10) unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `jobs_queue_index` (`queue`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;


CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '0001_01_01_000001_create_cache_table', 1),
	(2, '0001_01_01_000002_create_jobs_table', 1),
	(3, '2026_05_13_191610_create_productos_table', 1),
	(4, '2026_05_15_181050_create_rols_table', 1),
	(5, '2026_05_15_181106_create_usuarios_table', 1),
	(6, '2026_06_10_150052_create_sessions_table', 1),
	(7, '2026_06_10_153649_create_ventas_cabecera_table', 1),
	(8, '2026_06_10_153736_create_ventas_detalle_table', 1),
	(9, '2026_06_17_080450_add_deleted_at_to_productos_table', 1),
	(10, '2026_06_17_105115_add_filtros_to_productos_table', 1),
	(11, '2026_06_17_220128_create_consultas_table', 1);

CREATE TABLE IF NOT EXISTS `productos` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` text DEFAULT NULL,
  `precio` decimal(8,2) NOT NULL,
  `stock` int(10) unsigned NOT NULL DEFAULT 0,
  `url_imagen` varchar(255) DEFAULT NULL,
  `secciones` varchar(255) DEFAULT NULL,
  `genero` varchar(255) DEFAULT NULL,
  `marca` varchar(255) DEFAULT NULL,
  `talle` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `url_imagen`, `secciones`, `genero`, `marca`, `talle`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Caja de Pelotas Bullpadel', 'Conjunto de Pelotas de la marca Bullpadel.', 250000.00, 2, 'images/productos/1781748783_Bolso-bull.PNG', '["productos","mayorista"]', 'unisex', 'bullpadel', NULL, '2026-06-18 05:13:03', '2026-06-29 03:38:41', NULL),
	(2, 'Caja de Pelotas Penn', 'Conjunto de pelotas de la marca Penn.', 150000.00, 3, 'images/productos/1781748826_caja-penn.PNG', '["productos","mayorista"]', 'unisex', NULL, NULL, '2026-06-18 05:13:46', '2026-06-25 21:35:00', NULL),
	(3, 'Remera Bullpadel', 'Prenda de vestir para hombres.', 45000.00, 7, 'images/productos/1781749411_remera-bull.PNG', '["inicio","productos"]', 'hombre', 'bullpadel', 'm', '2026-06-18 05:23:31', '2026-06-25 21:21:36', NULL),
	(4, 'Remera', 'Prenda de vestir para hombres.', 13000.00, 0, 'images/productos/1781749457_remera-head.PNG', '["inicio","productos","ofertas"]', 'hombre', NULL, 'm', '2026-06-18 05:24:17', '2026-06-25 22:05:10', NULL),
	(5, 'Remera Babolat Gris', 'Remera de la marca Babolat.', 17000.00, 3, 'images/productos/1781750131_remera-babolat-gris.PNG', '["productos","ofertas"]', 'hombre', 'babolat', 'm', '2026-06-18 05:35:31', '2026-06-25 21:19:31', NULL),
	(6, 'Pelotas Rosas', 'Pelotas de tonalidad rosa.', 16000.00, 8, 'images/productos/1781750176_Bolas.PNG', '["inicio","productos"]', 'unisex', NULL, NULL, '2026-06-18 05:36:16', '2026-06-25 21:29:46', NULL),
	(7, 'Paleta Adids X-Treme Lima 2021', 'Paleta del año 2021.', 270000.00, 2, 'images/productos/1781750219_Paleta Adids X-Treme Lima 2021.PNG', '["productos"]', NULL, NULL, NULL, '2026-06-18 05:36:59', '2026-06-25 21:19:03', NULL),
	(8, 'Paleta Adidas RX Series Red', 'Paleta edicion Series Red.', 200000.00, 2, 'images/productos/1782406939_red.PNG', '["productos","ofertas"]', NULL, 'adidas', NULL, '2026-06-18 05:39:12', '2026-06-25 20:02:19', NULL),
	(9, 'Bolso Babolat Lite Negro', 'Bolso edición Lite Negro.', 125000.00, 2, 'images/productos/1781750406_Bolso-babolat.PNG', '["productos","ofertas"]', NULL, 'babolat', NULL, '2026-06-18 05:40:06', '2026-06-25 21:19:25', NULL),
	(10, 'Paleta Babolat Stima Energy', 'Paleta de la marca Babolat, diseño Stima Energy.', 420000.00, 2, 'images/productos/1782410948_paleta babolat.PNG', '["productos"]', 'unisex', 'babolat', NULL, '2026-06-25 21:09:08', '2026-06-25 21:09:08', NULL),
	(11, 'Bolso Adidas', 'Bolso de la marca Adidas.', 150000.00, 10, 'images/productos/1782411480_bolso-adidas.PNG', '["productos"]', 'unisex', 'adidas', NULL, '2026-06-25 21:18:00', '2026-06-25 21:19:15', NULL),
	(12, 'Zapatillas Adidas Crazyquick Amarillo', 'Zapatillas de la marca Adidas edición Crazyquick Amarillo.', 180000.00, 3, 'images/productos/1782411534_zapatilla-adidas.PNG', '["productos"]', 'hombre', 'adidas', 'm', '2026-06-25 21:18:54', '2026-06-25 21:18:54', NULL),
	(13, 'Short Babolat Aero', 'Short de la marca Babolat estilo Aero.', 40000.00, 9, 'images/productos/1782411652_short-babolat.PNG', '["productos"]', 'hombre', 'babolat', 'm', '2026-06-25 21:20:52', '2026-06-25 21:20:52', NULL),
	(14, 'Media Bullpadel', 'Medias de la marca Bullpadel.', 8500.00, 3, 'images/productos/1782411751_media-bull.PNG', '["productos"]', 'mujer', 'bullpadel', 's', '2026-06-25 21:22:31', '2026-06-25 21:22:31', NULL),
	(15, 'Grip Blanco', 'Grip de tonalidad blanca.', 4500.00, 0, 'images/productos/1782412249_grip-blanco.PNG', '["productos","ofertas"]', 'unisex', NULL, NULL, '2026-06-25 21:30:49', '2026-06-25 22:05:22', NULL),
	(16, 'Grip Negro', 'Grip de tonalidad negra.', 5000.00, 5, 'images/productos/1782412286_grip-negro.PNG', '["productos","ofertas"]', 'unisex', NULL, NULL, '2026-06-25 21:31:26', '2026-06-25 21:31:26', NULL),
	(17, 'Grip Winar', 'Grip de la marca Winar.', 5500.00, 9, 'images/productos/1782412334_grip-winar.PNG', '["productos","ofertas"]', 'unisex', NULL, NULL, '2026-06-25 21:32:14', '2026-06-25 21:32:14', NULL),
	(18, 'Grip Relieve', 'Grip de la marca Relieve.', 4000.00, 6, 'images/productos/1782412358_grip-relieve.PNG', '["productos"]', 'unisex', NULL, NULL, '2026-06-25 21:32:38', '2026-06-25 21:32:38', NULL),
	(19, 'Bolso Bullpadel', 'Bolso de la marca Bullpadel.', 210000.00, 7, 'images/productos/1782412424_bolso-bull.PNG', '["productos"]', 'mujer', 'bullpadel', NULL, '2026-06-25 21:33:44', '2026-06-25 21:33:44', NULL),
	(20, 'Caja de Pelotas Xtrust', 'Conjunto de Pelotas de la marca Xtrust.', 210000.00, 11, 'images/productos/1782412481_caja-xtrust.PNG', '["productos","mayorista"]', 'unisex', NULL, NULL, '2026-06-25 21:34:41', '2026-06-25 21:34:41', NULL);

CREATE TABLE IF NOT EXISTS `roles` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `descripcion` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roles_nombre_unique` (`nombre`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `roles` (`id`, `nombre`, `descripcion`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'admin', 'Administrador del sistema', '2026-06-18 04:49:29', '2026-06-18 04:49:29', NULL),
	(2, 'cliente', 'Cliente del ecommerce', '2026-06-18 04:49:29', '2026-06-18 04:49:29', NULL);

CREATE TABLE IF NOT EXISTS `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) unsigned DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `sessions_user_id_index` (`user_id`),
  KEY `sessions_last_activity_index` (`last_activity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
	('j2nZSvc1FFKpid1DARiO9hpg9wBRE3PvxcbAttSo', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJmbFZxMWcwRkkxSkVPMmEyaXkyTUhtTkYzOFBmY0hQOGxuZUlKaVZ0IiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dhbGVhbm8tbWF0dGVvLWdpdC50ZXN0XC8/aGVyZD1wcmV2aWV3Iiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1782690206),
	('TGbSbtlFzKmk9JkjYWfMLfBTuBwiHbKeLFqpDFpK', 5, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJ1dE9jdGlRN0xtaVMwdUdUNHpQU0tRWEthcUF6QnBqb1oybDFvWjVJIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dhbGVhbm8tbWF0dGVvLWdpdC50ZXN0XC9jdWVudGFcL2NvbXByYXMiLCJyb3V0ZSI6ImN1ZW50YS5jb21wcmFzIn0sIl9mbGFzaCI6eyJvbGQiOltdLCJuZXciOltdfSwibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiOjV9', 1782695107);

CREATE TABLE IF NOT EXISTS `usuarios` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `nombre` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `rol_id` bigint(20) unsigned NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `usuarios_email_unique` (`email`),
  KEY `usuarios_rol_id_foreign` (`rol_id`),
  CONSTRAINT `usuarios_rol_id_foreign` FOREIGN KEY (`rol_id`) REFERENCES `roles` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `usuarios` (`id`, `nombre`, `email`, `password`, `rol_id`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(2, 'Test User', 'test@example.com', '$2y$12$vybGvQAIjyZAoQrJD8n58OjvLDAeyjBfxoiJGQitg.mpBwm3/UDH2', 2, NULL, '2026-06-18 04:49:29', '2026-06-18 04:49:29', NULL),
	(3, 'Roman', 'romangale1706@gmail.com', '$2y$12$m7Pm18LbebiIwpN2paBuUeICbTNRNFhm72cSwiB3GlNbyIEmdBRZS', 1, NULL, '2026-06-18 04:49:51', '2026-06-18 04:49:51', NULL),
	(5, 'Fede', 'federicoomatteo@gmail.com', '$2y$12$7v7KafvLlH0SeQF2Z3QYaOq//EoyH5eGMsI2ySYhSMZV.Ouw0Tuh6', 2, NULL, '2026-06-18 05:19:17', '2026-06-18 05:19:17', NULL);

CREATE TABLE IF NOT EXISTS `ventas_cabecera` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `fecha_venta` timestamp NULL DEFAULT NULL,
  `user_id` bigint(20) unsigned NOT NULL,
  `estado` varchar(255) NOT NULL DEFAULT 'carrito',
  `total` decimal(10,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_cabecera_user_id_foreign` (`user_id`),
  CONSTRAINT `ventas_cabecera_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `usuarios` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ventas_cabecera` (`id`, `fecha_venta`, `user_id`, `estado`, `total`, `created_at`, `updated_at`) VALUES
	(1, '2026-06-18 05:22:10', 5, 'confirmado', 3000.00, '2026-06-18 05:21:53', '2026-06-18 05:22:10'),
	(2, '2026-06-25 22:05:10', 5, 'confirmado', 39000.00, '2026-06-25 21:55:14', '2026-06-25 22:05:10'),
	(3, '2026-06-25 22:05:22', 5, 'confirmado', 54000.00, '2026-06-25 22:05:21', '2026-06-25 22:05:22'),
	(4, '2026-06-29 03:38:41', 5, 'confirmado', 250000.00, '2026-06-29 03:38:36', '2026-06-29 03:38:41');

CREATE TABLE IF NOT EXISTS `ventas_detalle` (
  `id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `venta_id` bigint(20) unsigned NOT NULL,
  `producto_id` bigint(20) unsigned NOT NULL,
  `cantidad` int(11) NOT NULL,
  `precio_unitario` decimal(10,2) NOT NULL,
  `subtotal` decimal(10,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `ventas_detalle_venta_id_foreign` (`venta_id`),
  KEY `ventas_detalle_producto_id_foreign` (`producto_id`),
  CONSTRAINT `ventas_detalle_producto_id_foreign` FOREIGN KEY (`producto_id`) REFERENCES `productos` (`id`),
  CONSTRAINT `ventas_detalle_venta_id_foreign` FOREIGN KEY (`venta_id`) REFERENCES `ventas_cabecera` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ventas_detalle` (`id`, `venta_id`, `producto_id`, `cantidad`, `precio_unitario`, `subtotal`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 2, 1000.00, 2000.00, '2026-06-18 05:21:53', '2026-06-18 05:21:53'),
	(2, 1, 2, 1, 1000.00, 1000.00, '2026-06-18 05:22:04', '2026-06-18 05:22:04'),
	(3, 2, 4, 3, 13000.00, 39000.00, '2026-06-25 22:05:08', '2026-06-25 22:05:08'),
	(4, 3, 15, 12, 4500.00, 54000.00, '2026-06-25 22:05:21', '2026-06-25 22:05:21'),
	(5, 4, 1, 1, 250000.00, 250000.00, '2026-06-29 03:38:36', '2026-06-29 03:38:36');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
