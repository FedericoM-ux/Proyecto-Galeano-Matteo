/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

CREATE DATABASE IF NOT EXISTS `ecommerce_grupo10` /*!40100 DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_uca1400_ai_ci */;
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
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `productos` (`id`, `nombre`, `descripcion`, `precio`, `stock`, `url_imagen`, `secciones`, `genero`, `marca`, `talle`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'Caja Bullpadel', 'Conjunto de Pelotas de la marca Bullpadel', 1000.00, 3, 'images/productos/1781748783_Bolso-bull.PNG', '["productos","mayorista"]', 'unisex', 'bullpadel', NULL, '2026-06-18 05:13:03', '2026-06-18 05:22:10', NULL),
	(2, 'Caja Penn', 'Conjunto de pelotas de la marca Penn', 1000.00, 3, 'images/productos/1781748826_caja-penn.PNG', '["productos","mayorista"]', 'unisex', NULL, NULL, '2026-06-18 05:13:46', '2026-06-18 05:22:10', NULL),
	(3, 'Remera Bullpadel', 'Prenda de vestir para hombres.', 3500.00, 7, 'images/productos/1781749411_remera-bull.PNG', '["inicio","productos"]', 'hombre', 'bullpadel', NULL, '2026-06-18 05:23:31', '2026-06-18 05:23:31', NULL),
	(4, 'Remera', 'Prenda de vestir para hombres.', 3000.00, 3, 'images/productos/1781749457_remera-head.PNG', '["inicio","productos","ofertas"]', 'hombre', NULL, 'm', '2026-06-18 05:24:17', '2026-06-18 05:24:17', NULL),
	(5, 'Remera Babolat Gris', 'Remera de la marca Babolat', 17000.00, 3, 'images/productos/1781750131_remera-babolat-gris.PNG', '["productos","ofertas"]', 'hombre', 'babolat', 'm', '2026-06-18 05:35:31', '2026-06-18 05:37:41', NULL),
	(6, 'Pelotas Rosas', 'Pelotas de tonalidad rosa.', 1200.00, 8, 'images/productos/1781750176_Bolas.PNG', '["inicio","productos"]', 'unisex', NULL, NULL, '2026-06-18 05:36:16', '2026-06-18 05:36:16', NULL),
	(7, 'Paleta Adids X-Treme Lima 2021', 'Paleta del año 2021', 270000.00, 2, 'images/productos/1781750219_Paleta Adids X-Treme Lima 2021.PNG', '["productos"]', NULL, NULL, NULL, '2026-06-18 05:36:59', '2026-06-18 05:37:32', NULL),
	(8, 'Paleta Adidas RX Series Red', 'Paleta edicion Series Red.', 200000.00, 2, 'images/productos/1781750352_Paleta Adids X-Treme Lima 2021.PNG', '["productos","ofertas"]', NULL, 'adidas', NULL, '2026-06-18 05:39:12', '2026-06-18 05:39:12', NULL),
	(9, 'Bolso Babolat Lite Negro', 'Bolso edición Lite Negro', 125000.00, 2, 'images/productos/1781750406_Bolso-babolat.PNG', '["productos","ofertas"]', NULL, 'babolat', NULL, '2026-06-18 05:40:06', '2026-06-18 05:40:06', NULL);

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
	('9pRRd5wLv9mBe9bNVInjPB7CZyjfsDsjHfhxXn0x', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJwS3BiMmJqQkpMRTBlbEFKVUtSenFaOTJsOUxESEd4U3hWZEJ0T1RPIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dhbGVhbm8tbWF0dGVvLWdpdC50ZXN0XC9tYWluIiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX0sInVybCI6eyJpbnRlbmRlZCI6Imh0dHA6XC9cL2dhbGVhbm8tbWF0dGVvLWdpdC50ZXN0XC9wcm9kdWN0b3MifX0=', 1782321875),
	('gbGJIKbNJPkdjBxH0Kd8u4mFgX6o4COV1WSreQlO', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Herd/1.28.0 Chrome/120.0.6099.291 Electron/28.2.5 Safari/537.36', 'eyJfdG9rZW4iOiJqeXJYeU9oOHlvZW1jV3ZzTWVUeXMweEFCNkJtRUZiZ0NKaEt3dGRMIiwiX3ByZXZpb3VzIjp7InVybCI6Imh0dHA6XC9cL2dhbGVhbm8tbWF0dGVvLWdpdC50ZXN0XC8/aGVyZD1wcmV2aWV3Iiwicm91dGUiOm51bGx9LCJfZmxhc2giOnsib2xkIjpbXSwibmV3IjpbXX19', 1782313927),
	('phuta8vpFlTZDkagXSJcH7wLlNx98oKVu5BvCWvE', 3, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/149.0.0.0 Safari/537.36', 'eyJfdG9rZW4iOiJLSXpSeDRZQkRUZWhocjd1NUVidEZ2aDNtV0xMYXF4QmFKWVRuZGNRIiwiX2ZsYXNoIjp7Im9sZCI6W10sIm5ldyI6W119LCJfcHJldmlvdXMiOnsidXJsIjoiaHR0cDpcL1wvZ2FsZWFuby1tYXR0ZW8tZ2l0LnRlc3RcL3Byb2R1Y3RvcyIsInJvdXRlIjoicHJvZHVjdG9zLmluZGV4In0sImxvZ2luX3dlYl81OWJhMzZhZGRjMmIyZjk0MDE1ODBmMDE0YzdmNThlYTRlMzA5ODlkIjozfQ==', 1781751063);

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
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ventas_cabecera` (`id`, `fecha_venta`, `user_id`, `estado`, `total`, `created_at`, `updated_at`) VALUES
	(1, '2026-06-18 05:22:10', 5, 'confirmado', 3000.00, '2026-06-18 05:21:53', '2026-06-18 05:22:10');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

INSERT INTO `ventas_detalle` (`id`, `venta_id`, `producto_id`, `cantidad`, `precio_unitario`, `subtotal`, `created_at`, `updated_at`) VALUES
	(1, 1, 1, 2, 1000.00, 2000.00, '2026-06-18 05:21:53', '2026-06-18 05:21:53'),
	(2, 1, 2, 1, 1000.00, 1000.00, '2026-06-18 05:22:04', '2026-06-18 05:22:04');

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
