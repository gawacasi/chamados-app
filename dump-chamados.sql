-- --------------------------------------------------------
-- Servidor:                     127.0.0.1
-- Versão do servidor:           8.0.43 - MySQL Community Server - GPL
-- OS do Servidor:               Linux
-- HeidiSQL Versão:              12.8.0.6908
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

-- Copiando dados para a tabela laravel.chamados: ~2 rows (aproximadamente)
INSERT INTO `chamados` (`id`, `user_id`, `title`, `text`, `status`, `deleted_at`, `created_at`, `updated_at`) VALUES
	(7, 1, 'Chamado 2', 'Chamado 2', 'FIN', NULL, '2025-09-04 06:42:25', '2025-09-04 06:43:40'),
	(8, 1, 'Chamado 3', 'Chamado 3', 'DEV', NULL, '2025-09-04 06:43:38', '2025-09-04 06:44:45'),
	(9, 2, 'Chamado 1', 'chamado 2', 'PEN', NULL, '2025-09-04 06:44:34', '2025-09-04 06:44:34');

-- Copiando dados para a tabela laravel.migrations: ~2 rows (aproximadamente)
INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
	(3, '2025_09_02_204058_create_users_table', 1),
	(4, '2025_09_02_204434_create_users_chamados', 1);

-- Copiando dados para a tabela laravel.users: ~2 rows (aproximadamente)
INSERT INTO `users` (`id`, `username`, `password`, `last_login`, `created_at`, `updated_at`, `deleted_at`) VALUES
	(1, 'teste1@teste.com', '$2y$12$SsfvIfAuiStQ46b2KKbRE.4uD9xVgyiKTBnkPBF.AL5n3I/R70wlG', '2025-09-04 06:43:33', '2025-09-03 15:10:50', '2025-09-04 06:43:33', NULL),
	(2, 'teste2@teste.com', '$2y$12$U9j7ILRmXkAgsGwpQRi1DuKvRAMiVVNQQ/s.6pANMljiDC1KFQ5Bm', '2025-09-04 06:43:46', '2025-09-03 15:10:50', '2025-09-04 06:43:46', NULL);

/*!40103 SET TIME_ZONE=IFNULL(@OLD_TIME_ZONE, 'system') */;
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
