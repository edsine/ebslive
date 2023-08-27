--
-- Table structure for table `departments`
--

/* CREATE TABLE `departments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `department_unit` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `description` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `branch_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci; */

--
-- Dumping data for table `departments`
--

INSERT INTO `departments` (`id`, `name`, `department_unit`, `status`, `description`, `branch_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, NULL, 'General Administration & Services ', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(2, NULL, 'Human Resource Management', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(3, NULL, 'ICT', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(4, NULL, 'Legal', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(5, NULL, 'Investment & Treasury Management', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(6, NULL, 'Finance & Accounts', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(7, NULL, 'Procurement', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(8, NULL, 'Servicom', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(9, NULL, 'Compliance', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(10, NULL, 'Informal Sector', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(11, NULL, 'Risk Management', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(12, NULL, 'Actuarial Planning Research & Development', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(13, NULL, 'Estate & Maintenance', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(14, NULL, 'Social Security Development', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(15, NULL, 'Inspections', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(16, NULL, 'Claims & Compensation', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(17, NULL, 'Health Safety & Environment', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(18, NULL, 'Corporate Affairs', 1, NULL, 2, '2023-05-14 11:56:48', '2023-05-14 11:50:29', NULL),
(19, NULL, 'General', 1, NULL, 2, '2023-05-18 10:08:10', '2023-05-18 10:07:54', NULL),
(20, NULL, 'ED Directorate', 1, NULL, 2, '2023-05-24 11:53:24', '2023-05-24 11:51:33', NULL),
(21, NULL, 'MD Directorate', 1, NULL, 2, '2023-05-24 11:53:24', '2023-05-24 11:51:33', NULL);

/* --
-- Indexes for dumped tables
--

--
-- Indexes for table `departments`
--
ALTER TABLE `departments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `departments_branch_id_foreign` (`branch_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `departments`
--
ALTER TABLE `departments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `departments`
--
ALTER TABLE `departments`
  ADD CONSTRAINT `departments_branch_id_foreign` FOREIGN KEY (`branch_id`) REFERENCES `branches` (`id`) ON DELETE CASCADE;
  COMMIT; */