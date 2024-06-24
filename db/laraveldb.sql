-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 23, 2024 at 08:20 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `laraveldb`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `date` date NOT NULL,
  `status` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `subject_id`, `class_id`, `student_name`, `subject_name`, `class_name`, `email`, `first_name`, `last_name`, `phone_number`, `date`, `status`, `created_at`, `updated_at`) VALUES
(1, 4, 1, 2, 'Monday kalid', 'English', 'Primary 1', 'mondaykalid593@gmail.com', 'Monday', 'kalid', '0932383838', '2024-06-17', 'Attended', '2024-06-18 07:17:19', '2024-06-18 07:17:19'),
(3, 6, 1, 2, 'Rose Mary', 'English', 'Primary 1', 'rosemary@gmail.com', 'Rose', 'Mary', '093832822', '2024-06-17', 'Attended', '2024-06-18 07:18:55', '2024-06-18 07:18:55'),
(4, 8, 1, 2, 'John Paul', 'English', 'Primary 1', 'johnpaul@gmail.com', 'John', 'Paul', '0937838822', '2024-06-17', 'Attended', '2024-06-18 07:19:16', '2024-06-18 07:19:16'),
(5, 4, 4, 2, 'Monday kalid', 'Science', 'Primary 1', 'mondaykalid593@gmail.com', 'Monday', 'kalid', '0932383838', '2024-06-17', 'Attended', '2024-06-18 07:19:40', '2024-06-18 07:20:18'),
(6, 7, 2, 2, 'Susan Mike', 'Math', 'Primary 1', 'sudanmike@gmail.com', 'Susan', 'Mike', '093288383', '2024-06-18', 'Attended', '2024-06-18 07:20:02', '2024-06-18 07:20:02'),
(7, 5, 4, 2, 'Sabir Juma', 'Science', 'Primary 1', 'sabirjuma@gmail.com', 'Sabir', 'Juma', '09382828', '2024-06-18', 'Attended', '2024-06-18 07:21:34', '2024-06-18 07:21:34');

-- --------------------------------------------------------

--
-- Table structure for table `class_models`
--

CREATE TABLE `class_models` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `class_models`
--

INSERT INTO `class_models` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Senior 1', '2024-05-28 13:18:14', '2024-06-20 19:34:06'),
(2, 'Senior 2', '2024-06-01 07:18:15', '2024-06-20 19:34:17'),
(3, 'Senior 3', '2024-06-01 07:18:36', '2024-06-20 19:34:32'),
(4, 'Senior 4', '2024-06-01 07:18:48', '2024-06-20 19:35:26');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `exam_date` date DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `exam_date`, `created_at`, `updated_at`) VALUES
(1, 'Mid First Term', '2024-08-02', '2024-06-16 06:22:48', '2024-06-16 06:24:06'),
(2, 'Final First Term', '2024-07-03', '2024-06-16 06:23:37', '2024-06-16 06:23:37'),
(3, 'Mid Second Term', '2024-09-25', '2024-06-16 06:24:31', '2024-06-16 06:24:31'),
(4, 'Final Second Term', '2024-07-02', '2024-06-16 06:24:52', '2024-06-16 06:24:52'),
(5, 'Mid Third Term', '2024-07-04', '2024-06-16 06:25:08', '2024-06-16 06:25:35'),
(6, 'Final Third Term', '2024-07-03', '2024-06-16 06:25:22', '2024-06-16 06:25:22');

-- --------------------------------------------------------

--
-- Table structure for table `exam_scores`
--

CREATE TABLE `exam_scores` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `exam_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_id` bigint(20) UNSIGNED DEFAULT NULL,
  `subject_id` bigint(20) UNSIGNED DEFAULT NULL,
  `class_id` bigint(20) UNSIGNED DEFAULT NULL,
  `student_name` varchar(255) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `score` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exam_scores`
--

INSERT INTO `exam_scores` (`id`, `exam_id`, `student_id`, `subject_id`, `class_id`, `student_name`, `subject_name`, `class_name`, `email`, `first_name`, `last_name`, `phone_number`, `score`, `created_at`, `updated_at`) VALUES
(1, NULL, 4, 1, 1, 'Monday kalid', 'English', 'Senior 1', 'mondaykalid593@gmail.com', 'Monday', 'kalid', '0932383838', 50, '2024-06-18 03:19:47', '2024-06-23 22:40:11'),
(2, NULL, 4, 2, 1, 'Monday kalid', 'Math', 'Senior 1', 'mondaykalid593@gmail.com', 'Monday', 'kalid', '0932383838', 60, '2024-06-18 03:23:59', '2024-06-23 22:40:40'),
(3, NULL, 4, 3, 2, 'Monday kalid', 'CRE', 'Senior 2', 'mondaykalid593@gmail.com', 'Monday', 'kalid', '0932383838', 75, '2024-06-18 03:35:01', '2024-06-23 22:40:50'),
(4, NULL, 4, 4, 1, 'Monday kalid', 'Agriculture', 'Senior 1', 'mondaykalid593@gmail.com', 'Monday', 'kalid', '0932383838', 52, '2024-06-18 03:35:35', '2024-06-23 22:41:11'),
(5, NULL, 5, 1, 1, 'Sabir Juma', 'English', 'Senior 1', 'sabirjuma@gmail.com', 'Sabir', 'Juma', '09382828', 70, '2024-06-18 03:44:42', '2024-06-23 22:52:22'),
(6, NULL, 5, 2, 2, 'Sabir Juma', 'Math', 'Primary 1', 'sabirjuma@gmail.com', 'Sabir', 'Juma', '09382828', 79, '2024-06-18 03:45:00', '2024-06-18 03:45:00'),
(7, NULL, 4, 6, 1, 'Monday kalid', 'Chemistry', 'Senior 1', 'mondaykalid593@gmail.com', 'Monday', 'kalid', '0932383838', 58, '2024-06-18 03:45:23', '2024-06-23 22:42:38'),
(8, NULL, 5, 6, 1, 'Sabir Juma', 'Chemistry', 'Senior 1', 'sabirjuma@gmail.com', 'Sabir', 'Juma', '09382828', 70, '2024-06-18 03:45:41', '2024-06-23 22:54:34'),
(9, NULL, 5, 4, 2, 'Sabir Juma', 'Science', 'Primary 1', 'sabirjuma@gmail.com', 'Sabir', 'Juma', '09382828', 69, '2024-06-18 03:46:04', '2024-06-18 03:46:04'),
(10, NULL, 6, 1, 2, 'Rose Mary', 'English', 'Primary 1', 'rosemary@gmail.com', 'Rose', 'Mary', '093832822', 43, '2024-06-18 03:46:27', '2024-06-18 03:46:27'),
(11, NULL, 6, 2, 2, 'Rose Mary', 'Math', 'Primary 1', 'rosemary@gmail.com', 'Rose', 'Mary', '093832822', 42, '2024-06-18 03:46:44', '2024-06-18 03:46:44'),
(12, NULL, 6, 4, 1, 'Rose Mary', 'Agriculture', 'Senior 1', 'rosemary@gmail.com', 'Rose', 'Mary', '093832822', 78, '2024-06-18 03:47:02', '2024-06-23 22:58:19'),
(13, NULL, 6, 2, 1, 'Rose Mary', 'Math', 'Senior 1', 'rosemary@gmail.com', 'Rose', 'Mary', '093832822', 10, '2024-06-18 03:47:21', '2024-06-23 22:58:41'),
(14, NULL, 7, 1, 2, 'Susan Mike', 'English', 'Primary 1', 'sudanmike@gmail.com', 'Susan', 'Mike', '093288383', 29, '2024-06-18 03:47:39', '2024-06-18 03:47:39'),
(15, NULL, 7, 2, 2, 'Susan Mike', 'Math', 'Primary 1', 'sudanmike@gmail.com', 'Susan', 'Mike', '093288383', 44, '2024-06-18 03:47:56', '2024-06-18 03:47:56'),
(16, NULL, 7, 4, 2, 'Susan Mike', 'Agriculture', 'Senior 2', 'sudanmike@gmail.com', 'Susan', 'Mike', '093288383', 70, '2024-06-18 03:48:15', '2024-06-23 23:01:32'),
(17, NULL, 7, 9, 1, 'Susan Mike', 'Biology', 'Senior 1', 'sudanmike@gmail.com', 'Susan', 'Mike', '093288383', 51, '2024-06-18 03:48:55', '2024-06-23 23:01:46'),
(19, NULL, 4, 6, 1, 'Monday kalid', 'Chemistry', 'Senior 1', 'mondaykalid593@gmail.com', 'Monday', 'kalid', '0932383838', 80, '2024-06-23 22:41:36', '2024-06-23 22:41:36'),
(20, NULL, 4, 7, 1, 'Monday kalid', 'Physics', 'Senior 1', 'mondaykalid593@gmail.com', 'Monday', 'kalid', '0932383838', 80, '2024-06-23 22:41:58', '2024-06-23 22:41:58'),
(21, NULL, 4, 8, 1, 'Monday kalid', 'History', 'Senior 1', 'mondaykalid593@gmail.com', 'Monday', 'kalid', '0932383838', 90, '2024-06-23 22:51:07', '2024-06-23 22:51:07'),
(22, NULL, 4, 9, 1, 'Monday kalid', 'Biology', 'Senior 1', 'mondaykalid593@gmail.com', 'Monday', 'kalid', '0932383838', 80, '2024-06-23 22:51:36', '2024-06-23 22:51:36'),
(23, NULL, 5, 2, 1, 'Sabir Juma', 'Math', 'Senior 1', 'sabirjuma@gmail.com', 'Sabir', 'Juma', '09382828', 67, '2024-06-23 22:52:49', '2024-06-23 22:52:49'),
(24, NULL, 5, 3, 1, 'Sabir Juma', 'CRE', 'Senior 1', 'sabirjuma@gmail.com', 'Sabir', 'Juma', '09382828', 75, '2024-06-23 22:53:18', '2024-06-23 22:53:18'),
(25, NULL, 5, 4, 1, 'Sabir Juma', 'Agriculture', 'Senior 1', 'sabirjuma@gmail.com', 'Sabir', 'Juma', '09382828', 57, '2024-06-23 22:55:57', '2024-06-23 22:55:57'),
(26, NULL, 5, 7, 1, 'Sabir Juma', 'Physics', 'Senior 1', 'sabirjuma@gmail.com', 'Sabir', 'Juma', '09382828', 67, '2024-06-23 22:56:25', '2024-06-23 22:56:25'),
(27, NULL, 5, 8, 1, 'Sabir Juma', 'History', 'Senior 1', 'sabirjuma@gmail.com', 'Sabir', 'Juma', '09382828', 69, '2024-06-23 22:56:54', '2024-06-23 22:56:54'),
(28, NULL, 5, 9, 1, 'Sabir Juma', 'Biology', 'Senior 1', 'sabirjuma@gmail.com', 'Sabir', 'Juma', '09382828', 80, '2024-06-23 22:57:23', '2024-06-23 22:57:23'),
(29, NULL, 6, 3, 1, 'Rose Mary', 'CRE', 'Senior 1', 'rosemary@gmail.com', 'Rose', 'Mary', '093832822', 78, '2024-06-23 22:59:22', '2024-06-23 22:59:22'),
(30, NULL, 6, 6, 1, 'Rose Mary', 'Chemistry', 'Senior 1', 'rosemary@gmail.com', 'Rose', 'Mary', '093832822', 76, '2024-06-23 23:00:11', '2024-06-23 23:00:11'),
(31, NULL, 6, 7, 1, 'Rose Mary', 'Physics', 'Senior 1', 'rosemary@gmail.com', 'Rose', 'Mary', '093832822', 66, '2024-06-23 23:00:32', '2024-06-23 23:00:32'),
(32, NULL, 6, 8, 1, 'Rose Mary', 'History', 'Senior 1', 'rosemary@gmail.com', 'Rose', 'Mary', '093832822', 55, '2024-06-23 23:00:57', '2024-06-23 23:00:57'),
(33, NULL, 6, 9, 1, 'Rose Mary', 'Biology', 'Senior 1', 'rosemary@gmail.com', 'Rose', 'Mary', '093832822', 55, '2024-06-23 23:01:19', '2024-06-23 23:01:19');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `lessons`
--

CREATE TABLE `lessons` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `weekday` date NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL,
  `schclass` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `teacher` varchar(255) NOT NULL,
  `teacher_name` varchar(255) DEFAULT NULL,
  `subject_name` varchar(255) DEFAULT NULL,
  `class_name` varchar(255) DEFAULT NULL,
  `room` varchar(255) NOT NULL,
  `school_year` varchar(255) NOT NULL,
  `term` varchar(255) NOT NULL,
  `class_size` int(11) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `lessons`
--

INSERT INTO `lessons` (`id`, `title`, `description`, `weekday`, `start_time`, `end_time`, `schclass`, `subject`, `teacher`, `teacher_name`, `subject_name`, `class_name`, `room`, `school_year`, `term`, `class_size`, `created_at`, `updated_at`) VALUES
(1, 'Sets', 'Sets', '2024-06-22', '22:09:00', '23:00:00', '1', '1', '1', 'Daddy Shaban', 'English', 'Senior 1', '1', '2024-05-31T07:22:19.276Z', '1', 45, '2024-06-22 20:53:24', '2024-06-22 20:53:24'),
(3, 'Pollination', 'types of pollination', '2024-06-22', '04:10:00', '03:10:00', '3', '1', '2', 'Kalid Shaban', 'English', 'Senior 3', '1', '2024', '1', 0, '2024-06-22 21:10:50', '2024-06-22 21:10:50'),
(4, 'Pural an Singular', 'Pural an Singular', '2024-05-14', '08:30:00', '09:10:00', '3', '3', '9', 'Modi Mike', 'SST', 'Senior 3', '1', '2024', '1', 0, '2024-06-22 21:25:17', '2024-06-22 21:25:17'),
(5, 'Algebra', 'Add, multiplication , subraction', '2024-04-28', '20:10:00', '21:00:00', '2', '2', '2', 'Kalid Shaban', 'Math', 'Senior 2', '1', '2024-01-01T00:00:00.000Z', '1', 0, '2024-06-23 14:55:27', '2024-06-23 21:19:50'),
(6, 'Square', 'Square area', '2024-04-28', '21:10:00', '22:10:00', '1', '2', '2', 'Kalid Shaban', 'Math', 'Senior 1', '1', '2024-06-23T13:07:27.953Z', '1', 0, '2024-06-23 20:08:33', '2024-06-23 21:20:09'),
(7, 'Singular', 'singurla into details', '2024-05-25', '23:10:00', '12:20:00', '1', '1', '9', 'Modi Mike', 'English', 'Senior 1', '1', '2024-06-23T14:02:33.611Z', '1', 0, '2024-06-23 21:03:28', '2024-06-23 21:03:28'),
(8, 'Vacabulary words', 'Vacabulary words', '2024-06-04', '10:12:00', '19:10:00', '1', '1', '9', 'Modi Mike', 'English', 'Senior 1', '1', '2024-06-23T14:06:59.179Z', '1', 0, '2024-06-23 21:08:41', '2024-06-23 21:08:41'),
(9, 'Factorios', 'Examples of Factorios', '2024-04-28', '14:10:00', '15:20:00', '1', '2', '1', 'Daddy Shaban', 'Math', 'Senior 1', '1', '2024-06-23T14:20:12.066Z', '1', 0, '2024-06-23 21:21:21', '2024-06-23 21:21:21'),
(10, 'Logarithm', 'Logarithm', '2024-05-29', '22:10:00', '23:10:00', '1', '2', '9', 'Modi Mike', 'Math', 'Senior 1', '1', '2024-06-23T14:31:58.426Z', '1', 0, '2024-06-23 21:35:49', '2024-06-23 21:35:49'),
(11, 'perniters', 'Examples', '2024-06-01', '22:10:00', '23:40:00', '1', '2', '2', 'Kalid Shaban', 'Math', 'Senior 1', '1', '2024-06-23T14:35:52.864Z', '1', 0, '2024-06-23 21:37:15', '2024-06-23 21:37:15');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_01_11_055546_create_products_table', 1),
(6, '2024_05_28_003758_create_class_models_table', 2),
(7, '2024_05_28_182958_create_lessons_table', 3),
(8, '2024_05_29_222939_create_lessons_table', 4),
(9, '2024_06_15_085924_create_userdatas_table', 5),
(10, '2016_06_01_000001_create_oauth_auth_codes_table', 6),
(11, '2016_06_01_000002_create_oauth_access_tokens_table', 6),
(12, '2016_06_01_000003_create_oauth_refresh_tokens_table', 6),
(13, '2016_06_01_000004_create_oauth_clients_table', 6),
(14, '2016_06_01_000005_create_oauth_personal_access_clients_table', 6),
(15, '2024_06_15_145301_create_users_table', 7),
(16, '2024_06_15_145619_create_users_table', 8),
(17, '2024_06_15_202211_create_subjects_table', 9),
(18, '2024_06_15_220129_create_exams_table', 10),
(19, '2024_06_15_230852_create_exams_table', 11),
(20, '2024_06_15_234326_create_exam_scores_table', 12),
(21, '2024_06_16_074644_add_class_id_to_exam_scores', 13),
(22, '2024_06_16_201537_create_exam_scores_table', 14),
(23, '2024_06_17_195412_create_exam_scores_table', 15),
(24, '2024_06_17_220136_create_attendance_table', 16),
(25, '2024_06_18_001029_create_attendances_table', 17),
(26, '2024_06_21_150212_create_lessons_table', 18),
(27, '2024_06_22_090455_create_lessons_table', 19);

-- --------------------------------------------------------

--
-- Table structure for table `oauth_access_tokens`
--

CREATE TABLE `oauth_access_tokens` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_auth_codes`
--

CREATE TABLE `oauth_auth_codes` (
  `id` varchar(100) NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `scopes` text DEFAULT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `oauth_clients`
--

CREATE TABLE `oauth_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `secret` varchar(100) DEFAULT NULL,
  `provider` varchar(255) DEFAULT NULL,
  `redirect` text NOT NULL,
  `personal_access_client` tinyint(1) NOT NULL,
  `password_client` tinyint(1) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_clients`
--

INSERT INTO `oauth_clients` (`id`, `user_id`, `name`, `secret`, `provider`, `redirect`, `personal_access_client`, `password_client`, `revoked`, `created_at`, `updated_at`) VALUES
(1, NULL, 'Laravel Personal Access Client', 'MzuJNae1yZ60Ale8FRL6G1OUX5QknVuswWXo5a3U', NULL, 'http://localhost', 1, 0, 0, '2024-06-15 21:04:35', '2024-06-15 21:04:35');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_personal_access_clients`
--

CREATE TABLE `oauth_personal_access_clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `client_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `oauth_personal_access_clients`
--

INSERT INTO `oauth_personal_access_clients` (`id`, `client_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2024-06-15 21:04:36', '2024-06-15 21:04:36');

-- --------------------------------------------------------

--
-- Table structure for table `oauth_refresh_tokens`
--

CREATE TABLE `oauth_refresh_tokens` (
  `id` varchar(100) NOT NULL,
  `access_token_id` varchar(100) NOT NULL,
  `revoked` tinyint(1) NOT NULL,
  `expires_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `token` varchar(64) NOT NULL,
  `abilities` text DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `image` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'English', '2024-06-16 04:42:07', '2024-06-16 04:43:14'),
(2, 'Math', '2024-06-16 04:43:24', '2024-06-16 04:43:24'),
(3, 'CRE', '2024-06-16 04:43:35', '2024-06-23 22:35:20'),
(4, 'Agriculture', '2024-06-16 04:43:47', '2024-06-23 22:35:39'),
(6, 'Chemistry', '2024-06-23 22:36:09', '2024-06-23 22:36:09'),
(7, 'Physics', '2024-06-23 22:36:19', '2024-06-23 22:36:19'),
(8, 'History', '2024-06-23 22:36:36', '2024-06-23 22:36:36'),
(9, 'Biology', '2024-06-23 22:36:56', '2024-06-23 22:36:56');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` varchar(255) DEFAULT NULL,
  `first_name` varchar(255) DEFAULT NULL,
  `last_name` varchar(255) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `phone_number` varchar(255) DEFAULT NULL,
  `token` varchar(255) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `department_id` bigint(20) UNSIGNED DEFAULT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `username`, `password`, `role`, `first_name`, `last_name`, `date_of_birth`, `address`, `phone_number`, `token`, `joining_date`, `department_id`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, NULL, 'daddyshaban593@gmail.com', 'daddyshaban593', 'simple100', 'teacher', 'Daddy', 'Shaban', '2000-06-20', 'james', '098347373', 'AtfFu2qCy5Z04mICe31GUbXTWQexVdErzwBSV99ssHNyisNk11Y0C8gP5zca', '2024-06-15', 2, NULL, '2024-06-15 21:59:00', '2024-06-16 02:00:40'),
(2, NULL, 'kalidshaban593@gmail.com', 'kalidshaban593', 'simple100', 'teacher', 'Kalid', 'Shaban', '1991-06-19', 'Jinja', '09383822342', 'RyZ0dINhLjOaXQzABxCCTkn69UT5JnfFf3aZ9Lll9uGcyiFwVGBVM8SbwlkZ', '2024-06-14', 2, NULL, '2024-06-16 01:59:05', '2024-06-16 01:59:05'),
(3, NULL, 'mandelashaban593@gmail.com', 'mandelashaban593', 'simple100', 'admin', 'Mandela', 'Shaban', '2002-06-21', 'Mbale', '092338838', 'ufmGqQsMpNp8muOyJ6QcOjGEBjcuBjh9Egww6lCcAkR5enxcipMC50VEZbeM', '2024-06-19', 2, NULL, '2024-06-16 02:00:06', '2024-06-16 02:00:06'),
(4, NULL, 'mondaykalid593@gmail.com', 'mondaykalid593', 'simple100', 'student', 'Monday', 'kalid', '2009-06-14', 'Mbarara', '0932383838', 'dec88HQtoxDgzV2dUBIcl2zLsiU4ACnUThX3z1rWXo2bfVZMhawLj80gnu47', '2024-06-20', 2, NULL, '2024-06-16 02:02:47', '2024-06-16 02:02:47'),
(5, NULL, 'sabirjuma@gmail.com', 'sabirjuma', 'simple100', 'student', 'Sabir', 'Juma', '2024-06-16', 'Gudele', '09382828', 'JnMiJLFuw9kybBtTJJm4bSnGKsT5CHG4B5xKUar2iJNXgGTS3HQXywtbV7wm', '2024-06-15', 3, NULL, '2024-06-16 02:04:12', '2024-06-16 02:04:12'),
(6, NULL, 'rosemary@gmail.com', 'rosemary', 'simple100', 'student', 'Rose', 'Mary', '2010-06-15', 'Aweil', '093832822', 'enb8XQAWF3KAxXd5RFENaYjCk6chJ0YRywou49vcJQBER9xnmiUdwgzWq7ny', '2024-07-02', 3, NULL, '2024-06-16 02:06:19', '2024-06-16 02:06:19'),
(7, NULL, 'sudanmike@gmail.com', 'susanmike', 'simple100', 'student', 'Susan', 'Mike', '2013-06-15', 'Juba', '093288383', 'ByrTFBGjY5XO5pkGyikCsCMFucxK8HgwxS7NnMYR01TOVdwz7G6Kh5IZjbi5', '2024-06-21', 3, NULL, '2024-06-16 02:08:09', '2024-06-16 02:08:09'),
(8, NULL, 'johnpaul@gmail.com', 'johnpaul', 'simple100', 'student', 'John', 'Paul', '1993-06-12', 'Thongping', '0937838822', 'C6sMLwi0nC077noxsDVr6J7vXRscjU5Wrf1d6EgCOi3rlpCdMJmbjRtZpQpW', '2024-06-20', 3, NULL, '2024-06-16 02:09:37', '2024-06-16 02:09:37'),
(9, NULL, 'modimike@gmail.com', 'modimike', 'modimike', 'teacher', 'Modi', 'Mike', '1993-06-14', 'Guri', '0987777755', 'eYD6ucapDKlHqUpTcs9gtApqTdJJguuO3JbNgcRW82Vg6ENir6dCY7dohlnV', '2024-06-19', 4, NULL, '2024-06-16 02:11:20', '2024-06-16 02:11:20'),
(10, NULL, 'josemorino@gmail.com', 'josemorino', 'simple100', 'teacher', 'Jose', 'Morino', '1992-06-15', 'Munuki', '092828334', 'SfZg7ZFRNGMeBfq2Wm7VjOEOIY0Oik20mdsnpkMdGjcgo7GJVWzsrPMlnwfj', '2024-06-03', 4, NULL, '2024-06-16 02:12:37', '2024-06-16 02:12:37');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `class_models`
--
ALTER TABLE `class_models`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `exam_scores`
--
ALTER TABLE `exam_scores`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `lessons`
--
ALTER TABLE `lessons`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_access_tokens`
--
ALTER TABLE `oauth_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_access_tokens_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_auth_codes`
--
ALTER TABLE `oauth_auth_codes`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_auth_codes_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_clients_user_id_index` (`user_id`);

--
-- Indexes for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `oauth_refresh_tokens`
--
ALTER TABLE `oauth_refresh_tokens`
  ADD PRIMARY KEY (`id`),
  ADD KEY `oauth_refresh_tokens_access_token_id_index` (`access_token_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `class_models`
--
ALTER TABLE `class_models`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `exam_scores`
--
ALTER TABLE `exam_scores`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `lessons`
--
ALTER TABLE `lessons`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `oauth_clients`
--
ALTER TABLE `oauth_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `oauth_personal_access_clients`
--
ALTER TABLE `oauth_personal_access_clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
