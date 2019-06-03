-- --------------------------------------------------------
-- 主机:                           127.0.0.1
-- Server version:               5.7.17-log - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL 版本:                  10.1.0.5464
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping data for table chat_mis.admin_menu: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_menu` DISABLE KEYS */;
INSERT INTO `admin_menu` (`id`, `parent_id`, `order`, `title`, `icon`, `uri`, `permission`, `created_at`, `updated_at`) VALUES
	(1, 0, 1, '首页', 'fa-bar-chart', '/', NULL, NULL, '2018-12-23 10:58:24'),
	(2, 0, 6, '系统管理', 'fa-tasks', NULL, NULL, NULL, '2018-12-23 10:59:58'),
	(3, 2, 7, '管理员', 'fa-users', 'auth/users', NULL, NULL, '2018-12-23 10:59:58'),
	(4, 2, 8, '角色', 'fa-user', 'auth/roles', NULL, NULL, '2018-12-23 10:59:58'),
	(5, 2, 9, '权限', 'fa-ban', 'auth/permissions', NULL, NULL, '2018-12-23 10:59:58'),
	(6, 2, 10, '菜单', 'fa-bars', 'auth/menu', NULL, NULL, '2018-12-23 10:59:58'),
	(7, 2, 11, '操作日志', 'fa-history', 'auth/logs', NULL, NULL, '2018-12-23 10:59:58');
/*!40000 ALTER TABLE `admin_menu` ENABLE KEYS */;

-- Dumping data for table chat_mis.admin_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_permissions` DISABLE KEYS */;
INSERT INTO `admin_permissions` (`id`, `name`, `slug`, `http_method`, `http_path`, `created_at`, `updated_at`) VALUES
	(1, 'All permission', '*', '', '*', NULL, NULL),
	(2, 'Dashboard', 'dashboard', 'GET', '/', NULL, NULL),
	(3, 'Login', 'auth.login', '', '/auth/login\r\n/auth/logout', NULL, NULL),
	(4, 'User setting', 'auth.setting', 'GET,PUT', '/auth/setting', NULL, NULL),
	(5, 'Auth management', 'auth.management', '', '/auth/roles\r\n/auth/permissions\r\n/auth/menu\r\n/auth/logs', NULL, NULL),
	(6, '用户管理', 'users', '', '/users*', '2018-12-23 11:00:19', '2018-12-23 11:00:19'),
	(7, '商品管理', 'products', '', '/products*', '2018-12-23 11:00:28', '2018-12-23 11:00:28'),
	(8, '订单管理', 'orders', '', '/orders*', '2018-12-23 11:00:38', '2018-12-23 11:00:38'),
	(9, '优惠券管理', 'coupon_codes', '', '/coupon_codes*', '2018-12-23 11:00:47', '2018-12-23 11:00:47');
/*!40000 ALTER TABLE `admin_permissions` ENABLE KEYS */;

-- Dumping data for table chat_mis.admin_roles: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_roles` DISABLE KEYS */;
INSERT INTO `admin_roles` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
	(1, 'Administrator', 'administrator', '2018-12-23 10:58:08', '2018-12-23 10:58:08'),
	(2, '运营', 'operator', '2018-12-23 11:01:07', '2018-12-23 11:01:07');
/*!40000 ALTER TABLE `admin_roles` ENABLE KEYS */;

-- Dumping data for table chat_mis.admin_role_menu: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_role_menu` DISABLE KEYS */;
INSERT INTO `admin_role_menu` (`role_id`, `menu_id`, `created_at`, `updated_at`) VALUES
	(1, 2, NULL, NULL);
/*!40000 ALTER TABLE `admin_role_menu` ENABLE KEYS */;

-- Dumping data for table chat_mis.admin_role_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_role_permissions` DISABLE KEYS */;
INSERT INTO `admin_role_permissions` (`role_id`, `permission_id`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL),
	(2, 2, NULL, NULL),
	(2, 3, NULL, NULL),
	(2, 4, NULL, NULL),
	(2, 5, NULL, NULL),
	(2, 6, NULL, NULL),
	(2, 7, NULL, NULL),
	(2, 8, NULL, NULL),
	(2, 9, NULL, NULL);
/*!40000 ALTER TABLE `admin_role_permissions` ENABLE KEYS */;

-- Dumping data for table chat_mis.admin_role_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_role_users` DISABLE KEYS */;
INSERT INTO `admin_role_users` (`role_id`, `user_id`, `created_at`, `updated_at`) VALUES
	(1, 1, NULL, NULL),
	(2, 2, NULL, NULL);
/*!40000 ALTER TABLE `admin_role_users` ENABLE KEYS */;

-- Dumping data for table chat_mis.admin_users: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_users` DISABLE KEYS */;
INSERT INTO `admin_users` (`id`, `username`, `password`, `name`, `avatar`, `remember_token`, `created_at`, `updated_at`) VALUES
	(1, 'admin', '$2y$10$uP5kSG7ywotGQfO/uImu.eTlCZvMThECrK169myN82Gnh7WgDYhpO', 'Administrator', NULL, '2DMbrtEdZzHhkYYcU6Xr0kgca3iu5DCQ7C9v5eSHABKTf183iEZyIOJwLaEy', '2018-12-23 10:58:08', '2018-12-23 10:58:08'),
	(2, 'operator', '$2y$10$RqnVs6GjOCZblP8iG6EgbeB8z/8QEJvA4WwzP3z1zwzLDjhlYVcwy', '运营', NULL, NULL, '2018-12-23 11:01:23', '2018-12-23 11:01:23');
/*!40000 ALTER TABLE `admin_users` ENABLE KEYS */;

-- Dumping data for table chat_mis.admin_user_permissions: ~0 rows (approximately)
/*!40000 ALTER TABLE `admin_user_permissions` DISABLE KEYS */;
/*!40000 ALTER TABLE `admin_user_permissions` ENABLE KEYS */;

-- Dumping data for table chat_mis.migrations: ~3 rows (approximately)
/*!40000 ALTER TABLE `migrations` DISABLE KEYS */;
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(1, '2014_10_12_000000_create_users_table', 1),
	(2, '2014_10_12_100000_create_password_resets_table', 1),
	(3, '2016_01_04_173148_create_admin_tables', 1);
/*!40000 ALTER TABLE `migrations` ENABLE KEYS */;

-- Dumping data for table chat_mis.password_resets: ~0 rows (approximately)
/*!40000 ALTER TABLE `password_resets` DISABLE KEYS */;
/*!40000 ALTER TABLE `password_resets` ENABLE KEYS */;

-- Dumping data for table chat_mis.users: ~0 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
