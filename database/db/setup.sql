

INSERT INTO `product_service_categories` (`id`, `name`, `type`, `chart_account_id`, `color`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Travel', 'product & service', 0, 'BLUE', 1, '2023-10-23 12:45:47', '2023-10-23 12:45:47'),
(2, 'Bank', 'liability', 1, 'BLUE', 1, '2023-10-23 12:52:37', '2023-10-23 12:52:37'),
(3, 'Maintenance Sales', 'income', 2, 'RED', 1, '2023-10-23 13:18:28', '2023-10-23 13:18:28'),
(4, 'Rent Or Lease', 'expense', 3, 'Gold', 1, '2023-10-23 13:50:47', '2023-10-23 13:52:32');



INSERT INTO `product_service_units` (`id`, `name`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'KG', 1, '2023-10-23 12:59:08', '2023-10-23 12:59:08'),
(2, 'Meter', 1, '2023-10-23 12:59:17', '2023-10-23 12:59:17'),
(3, 'Inch', 1, '2023-10-23 12:59:28', '2023-10-23 12:59:28');


INSERT INTO `settings` (`id`, `name`, `value`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'storage_setting', 'local', 1, '2023-10-24 08:42:04', '2023-10-23 23:00:00'),
(2, 'company_name', 'PGL Nigeria Limited', 1, '2023-10-25 13:58:39', '2023-10-25 13:58:39'),
(3, 'company_email', 'admin@nsitf.gov.ng', 1, '2023-10-25 13:59:27', '2023-10-25 13:59:27'),
(4, 'company_address', 'No. 6, Adeleye Cresent, Off Usman Sariki road', 1, '2023-10-25 14:02:09', '2023-10-24 23:00:00'),
(6, 'company_city', 'Utako', 1, '2023-10-25 14:06:36', '2023-10-25 14:06:36'),
(7, 'company_state', 'Abuja', 1, '2023-10-25 14:06:36', '2023-10-25 14:06:36'),
(8, 'company_zipcode', '54545', 1, '2023-10-25 14:08:40', '2023-10-25 14:08:40'),
(9, 'company_country', 'Nigeria', 1, '2023-10-25 14:09:08', '2023-10-25 14:09:08'),
(10, 'company_telephone', '0908 008 7168', 1, '2023-10-25 14:09:44', '2023-10-25 14:09:44'),
(11, 'registration_number', 'CAC434545445', 1, '2023-10-25 14:11:13', '2023-10-25 14:11:13');


INSERT INTO `taxes` (`id`, `name`, `rate`, `created_by`, `created_at`, `updated_at`) VALUES
(1, 'Generator', '2', 1, '2023-10-23 12:36:18', '2023-10-23 12:36:18'),
(2, 'Food', '5', 1, '2023-10-23 12:36:52', '2023-10-23 12:36:52');

