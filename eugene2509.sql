-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 08 2018 г., 14:29
-- Версия сервера: 10.0.32-MariaDB-0+deb8u1
-- Версия PHP: 7.1.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `eugene2509`
--

-- --------------------------------------------------------

--
-- Структура таблицы `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `title` varchar(32) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `content` text NOT NULL,
  `category_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `updated_by` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `article_tag`
--

CREATE TABLE `article_tag` (
  `id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `tag_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `auth_assignment`
--

CREATE TABLE `auth_assignment` (
  `item_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_assignment`
--

INSERT INTO `auth_assignment` (`item_name`, `user_id`, `created_at`) VALUES
('admin', '1', 1516369475),
('subscriber', '2', 1516396001),
('editor', '2', 1516396014);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item`
--

CREATE TABLE `auth_item` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `type` smallint(6) NOT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `rule_name` varchar(64) COLLATE utf8_unicode_ci DEFAULT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item`
--

INSERT INTO `auth_item` (`name`, `type`, `description`, `rule_name`, `data`, `created_at`, `updated_at`) VALUES
('admin', 1, NULL, NULL, NULL, 1516369460, 1516369460),
('author', 1, NULL, NULL, NULL, 1516369460, 1516369460),
('editor', 1, NULL, NULL, NULL, 1516369460, 1516369460),
('manageCategory', 2, 'Manage category', NULL, NULL, 1516369460, 1516369460),
('manageComment', 2, 'Manage comment', NULL, NULL, 1516369460, 1516369460),
('managePost', 2, 'Manage blog', NULL, NULL, 1516369460, 1516369460),
('manageUser', 2, 'Manage user', NULL, NULL, 1516369460, 1516369460),
('subscriber', 1, NULL, NULL, NULL, 1516369460, 1516369460);

-- --------------------------------------------------------

--
-- Структура таблицы `auth_item_child`
--

CREATE TABLE `auth_item_child` (
  `parent` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `child` varchar(64) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `auth_item_child`
--

INSERT INTO `auth_item_child` (`parent`, `child`) VALUES
('admin', 'editor'),
('admin', 'manageUser'),
('author', 'managePost'),
('editor', 'author'),
('editor', 'manageCategory'),
('editor', 'manageComment');

-- --------------------------------------------------------

--
-- Структура таблицы `auth_rule`
--

CREATE TABLE `auth_rule` (
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `data` blob,
  `created_at` int(11) DEFAULT NULL,
  `updated_at` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(32) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, 'Everydays', '2018-01-21 21:47:46', '0000-00-00 00:00:00'),
(5, 'Food', '2018-01-20 16:51:02', '0000-00-00 00:00:00'),
(4, 'IT', '2018-01-20 14:49:01', '0000-00-00 00:00:00'),
(7, 'Education', '2018-01-25 12:13:23', '0000-00-00 00:00:00'),
(8, 'Furniture', '2018-01-25 12:13:46', '0000-00-00 00:00:00'),
(9, 'Drinks', '2018-01-25 12:13:59', '0000-00-00 00:00:00'),
(10, 'Clothers', '2018-01-25 12:14:34', '0000-00-00 00:00:00'),
(11, 'Emotions', '2018-01-25 12:15:59', '0000-00-00 00:00:00'),
(12, 'Home, house', '2018-01-25 12:16:38', '0000-00-00 00:00:00'),
(13, 'Transport', '2018-01-25 12:17:11', '0000-00-00 00:00:00'),
(14, 'Phrases', '2018-01-25 12:19:50', '0000-00-00 00:00:00'),
(15, 'Work', '2018-01-30 14:30:49', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Структура таблицы `dictionary`
--

CREATE TABLE `dictionary` (
  `id` int(11) NOT NULL,
  `word` varchar(64) NOT NULL,
  `translate` varchar(64) NOT NULL,
  `image` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `category_id` int(20) DEFAULT NULL,
  `type` int(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `dictionary`
--

INSERT INTO `dictionary` (`id`, `word`, `translate`, `image`, `description`, `category_id`, `type`, `created_at`) VALUES
(6, 'access', 'доступ', 'access_20180121000153.jpg', 'допустили девушку в магазин ACCESSуар', 4, 1, '2018-01-23 15:00:37'),
(2, 'window', 'окно', 'window_20180121000126.jpg', 'Windows операционная система', 4, 1, '2018-01-25 12:17:40'),
(3, 'wireless', 'беспроводной', 'wireless_20180121000110.jpg', 'Если едите вы в лес интернет там wireless', 4, 3, '2018-01-25 12:18:01'),
(4, 'world wide web', 'всемирная сеть интернет', 'world wide web_20180121000137.jpg', 'www волки ', 4, 1, '2018-01-25 12:18:24'),
(5, 'accept', 'принимать', 'accept_20180121000147.jpg', 'принимать лекарство орACCEPT', 4, 2, '2018-01-25 12:18:32'),
(7, 'advanced', 'расширенный', 'advanced_20180121000155.jpg', 'версия yii2 не базовая, а advanced', 4, 3, '2018-01-25 12:18:42'),
(8, 'agree', 'соглашаться ', 'agree_20180121000110.jpg', '(agree)бы вкусные, согласен?', 6, 2, '2018-01-25 12:22:50'),
(9, 'amount of data', 'объём данных', 'amount of data_20180121000119.jpg', 'amountin такие большие как data', 14, 1, '2018-01-25 12:20:12'),
(10, 'application', 'приложение', 'application_20180121000130.jpg', 'детская (applica)ция  на тему компьютерных приложений', 4, 1, '2018-01-25 12:20:23'),
(11, 'boot', 'запуск, начальная загрузка', 'boot_20180121000139.jpg', 'ногой (boot)снул компьютер и он запустился', 4, 1, '2018-01-25 12:20:33'),
(14, 'onion', 'лук', 'onion_20180121000153.jpg', 'Он и Он (onion)', 5, 1, '2018-01-25 12:20:41'),
(15, 'decide', 'решать', NULL, '', 6, 2, '2018-01-25 12:22:14'),
(16, 'think, thought', 'думать', NULL, '', 6, 2, '2018-01-24 21:26:37'),
(17, 'joke', 'шутка', NULL, '', 6, 1, '2018-01-25 12:20:53'),
(18, 'found', 'находить', NULL, '404 not found', 6, 2, '2018-01-25 12:21:03'),
(19, 'envy', 'зависть', NULL, '', 6, 1, '2018-01-25 12:21:17'),
(20, 'some', 'некоторый', NULL, '', 6, 3, '2018-01-24 21:25:03'),
(21, 'adjective', 'прилагательное (какой? какая? какие?)', NULL, '', 6, 1, '2018-01-25 12:10:29'),
(22, 'adverb', 'признак предмета, действия(«где?», «когда?», «куда?», «как?»)', NULL, '', 6, 1, '2018-01-25 12:10:16'),
(23, 'want', 'хотеть', NULL, '', 6, 2, '2018-01-25 12:21:43'),
(24, 'ask', 'просить, спрашивать', NULL, '', 6, 2, '2018-01-25 13:14:03'),
(25, 'pear', 'груша', NULL, '', 5, 1, '2018-01-25 20:17:51'),
(26, 'feel', 'чувствовать', NULL, '', 6, 2, '2018-01-25 20:21:22'),
(27, 'terrible ', 'ужасный', NULL, '', 11, 3, '2018-01-25 20:55:06'),
(28, 'appreciate', 'ценить', NULL, '', 6, 2, '2018-01-30 14:29:59'),
(29, 'patience', 'терпение', NULL, 'пэйшенс', 11, 1, '2018-01-31 12:19:09');

-- --------------------------------------------------------

--
-- Структура таблицы `migration`
--

CREATE TABLE `migration` (
  `version` varchar(180) NOT NULL,
  `apply_time` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `migration`
--

INSERT INTO `migration` (`version`, `apply_time`) VALUES
('m000000_000000_base', 1516369446),
('m140506_102106_rbac_init', 1516369454),
('m170907_052038_rbac_add_index_on_auth_assignment_user_id', 1516369454),
('m171215_094823_create_user_table', 1516369447),
('m171215_101714_create_category_table', 1516369447),
('m171215_101948_create_article_table', 1516369447),
('m171215_140205_create_tag_table', 1516369447),
('m171215_140505_create_article_tag_table', 1516369447),
('m180119_124857_dictionary', 1516369447);

-- --------------------------------------------------------

--
-- Структура таблицы `tag`
--

CREATE TABLE `tag` (
  `id` int(11) NOT NULL,
  `name` varchar(64) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Структура таблицы `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `auth_key` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `password_hash` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password_reset_token` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` smallint(6) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `last_active` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Дамп данных таблицы `user`
--

INSERT INTO `user` (`id`, `username`, `auth_key`, `password_hash`, `password_reset_token`, `email`, `status`, `created_at`, `updated_at`, `last_active`) VALUES
(1, 'admin', '7bRPn_zBAhgwUdnAXYar-KgRr7cwBqIn', '$2y$13$wB6XOjw1xJzy76klYxTzGOD.U2XXMnANpnjqSGsiGy33At0vyJYy2', NULL, 'admin@gmail.com', 10, '2018-02-01 13:43:19', '2018-02-01 13:43:19', '2018-02-01 15:43:19'),
(2, 'Lizaveta', 'WPZKc3HGdDA0sPPsLHBgrVdAPP4XEJz2', '$2y$13$S48H2V0FLmFyw6bD7Ciu3ulkg3i0KKkZrdLHjZT7FbSUw6TH9Ssl6', NULL, 'lizabonka@gmail.com', 10, '2018-01-31 13:45:13', '2018-01-31 13:45:13', '2018-01-31 15:45:13');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_index` (`created_by`,`updated_by`,`category_id`),
  ADD KEY `fk_article_category` (`category_id`),
  ADD KEY `fk_article_user_updated_by` (`updated_by`);

--
-- Индексы таблицы `article_tag`
--
ALTER TABLE `article_tag`
  ADD PRIMARY KEY (`id`),
  ADD KEY `article_tag_index` (`article_id`,`tag_id`),
  ADD KEY `fk_article_tag_tag` (`tag_id`);

--
-- Индексы таблицы `auth_assignment`
--
ALTER TABLE `auth_assignment`
  ADD PRIMARY KEY (`item_name`,`user_id`),
  ADD KEY `auth_assignment_user_id_idx` (`user_id`);

--
-- Индексы таблицы `auth_item`
--
ALTER TABLE `auth_item`
  ADD PRIMARY KEY (`name`),
  ADD KEY `rule_name` (`rule_name`),
  ADD KEY `idx-auth_item-type` (`type`);

--
-- Индексы таблицы `auth_item_child`
--
ALTER TABLE `auth_item_child`
  ADD PRIMARY KEY (`parent`,`child`),
  ADD KEY `child` (`child`);

--
-- Индексы таблицы `auth_rule`
--
ALTER TABLE `auth_rule`
  ADD PRIMARY KEY (`name`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `dictionary`
--
ALTER TABLE `dictionary`
  ADD PRIMARY KEY (`id`),
  ADD KEY `idx_dictionary_categortId` (`category_id`);

--
-- Индексы таблицы `migration`
--
ALTER TABLE `migration`
  ADD PRIMARY KEY (`version`);

--
-- Индексы таблицы `tag`
--
ALTER TABLE `tag`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Индексы таблицы `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `password_reset_token` (`password_reset_token`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `article_tag`
--
ALTER TABLE `article_tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT для таблицы `dictionary`
--
ALTER TABLE `dictionary`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
--
-- AUTO_INCREMENT для таблицы `tag`
--
ALTER TABLE `tag`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT для таблицы `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
