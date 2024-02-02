-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Фев 02 2024 г., 15:09
-- Версия сервера: 8.0.30
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `db_shop`
--

-- --------------------------------------------------------

--
-- Структура таблицы `admins`
--

CREATE TABLE `admins` (
  `id` int NOT NULL,
  `login` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `pass` varchar(255) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `admins`
--

INSERT INTO `admins` (`id`, `login`, `pass`) VALUES
(1, 'admin', '123');

-- --------------------------------------------------------

--
-- Структура таблицы `buyer`
--

CREATE TABLE `buyer` (
  `id` int NOT NULL,
  `name` text COLLATE utf8mb4_general_ci NOT NULL,
  `tel` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `buyer`
--

INSERT INTO `buyer` (`id`, `name`, `tel`, `address`, `date`) VALUES
(12, 'Фарков Дмитрий', '89526172925', 'Борисова 24', '2023-05-12 10:14:48'),
(13, 'Поликарп', '89576171864', 'Инджастис', '2023-05-12 10:15:40');

-- --------------------------------------------------------

--
-- Структура таблицы `buy_products`
--

CREATE TABLE `buy_products` (
  `buy_id` int NOT NULL,
  `buyer_id` int NOT NULL,
  `products_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `buy_products`
--

INSERT INTO `buy_products` (`buy_id`, `buyer_id`, `products_id`) VALUES
(3, 12, 2),
(4, 12, 3);

-- --------------------------------------------------------

--
-- Структура таблицы `cart`
--

CREATE TABLE `cart` (
  `cart_id` int NOT NULL,
  `cart_id_products` int DEFAULT NULL,
  `cart_price` int DEFAULT NULL,
  `cart_datetime` datetime DEFAULT NULL,
  `cart_ip` varchar(100) COLLATE utf8mb4_general_ci NOT NULL,
  `cart_count` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `cart`
--

INSERT INTO `cart` (`cart_id`, `cart_id_products`, `cart_price`, `cart_datetime`, `cart_ip`, `cart_count`) VALUES
(114, 1, 19700, NULL, '127.0.0.1', NULL),
(115, 3, 16950, NULL, '127.0.0.1', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `category_product` varchar(20) COLLATE utf8mb4_general_ci NOT NULL,
  `Name` text COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `category`
--

INSERT INTO `category` (`id`, `category_product`, `Name`) VALUES
(1, 'sunglasses', 'Солнцезащитные очки'),
(2, 'eyeglass_frames', 'Оправы для зрения'),
(3, 'collectible', 'Коллекционные');

-- --------------------------------------------------------

--
-- Структура таблицы `table_products`
--

CREATE TABLE `table_products` (
  `products_id` int NOT NULL,
  `title` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image_1` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `image_2` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `price` int NOT NULL,
  `old_price` int DEFAULT NULL,
  `country` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sale` int NOT NULL DEFAULT '0',
  `seo_words` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `main_description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `datetime` datetime DEFAULT NULL,
  `category_product` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT NULL,
  `category_id` int NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Дамп данных таблицы `table_products`
--

INSERT INTO `table_products` (`products_id`, `title`, `image_1`, `image_2`, `price`, `old_price`, `country`, `sale`, `seo_words`, `main_description`, `datetime`, `category_product`, `category_id`) VALUES
(1, 'Flair', 'flair/1.jpg', 'flair/2.jpg', 19700, 25400, 'Germany', 0, '', '<ul>\n<li>Линзы: HMC+•UV400•Пластиковые </li>\n\n<li>Длина линз: 5 см</li>\n<li>Длина переносицы: 1,3 см</li>\n<li>Длина дужек: 12,5 см</li>\n<li>Высота оправы: 5 см</li>\n<li>Ширина оправы: 12,5 см</li>\n\n<li>В комплекте: бамбуковый и льняной чехол, чистящее жидкость-спрей и салфетка, а также отвертка.</li>\n</ul>', '2023-04-07 09:16:49', 'sunglasses', 0),
(2, 'Pierre Cardin', 'Pierre_Cardin/1.jpg', 'Pierre_Cardin/2.jpg', 17800, 0, 'Italy 1980s', 0, '', '', '2023-04-07 09:18:59', 'sunglasses', 0),
(3, 'Roberto Zeno italy hand Made', 'Roberto_Zeno_italy_hand_Made/1.jpg', 'Roberto_Zeno_italy_hand_Made/2.jpg', 16950, 0, 'Italy 1980s', 1, '', '', '2023-04-07 09:21:33', 'sunglasses', 0),
(4, 'Marc_John', 'Marc_John/1.jpg', 'Marc_John/2.jpg', 5900, 9900, 'Milano 2000', 1, '', '', '2023-04-08 09:33:50', 'sunglasses', 0),
(5, 'Valentine', 'valentine/1.jpg', 'valentine/2.jpg', 5950, 0, 'France 1980s', 0, '', '', '2023-04-14 10:44:46', 'eyeglass_frames', 0);

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `buyer`
--
ALTER TABLE `buyer`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `buy_products`
--
ALTER TABLE `buy_products`
  ADD PRIMARY KEY (`buy_id`);

--
-- Индексы таблицы `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`);

--
-- Индексы таблицы `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `table_products`
--
ALTER TABLE `table_products`
  ADD PRIMARY KEY (`products_id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `admins`
--
ALTER TABLE `admins`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT для таблицы `buyer`
--
ALTER TABLE `buyer`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT для таблицы `buy_products`
--
ALTER TABLE `buy_products`
  MODIFY `buy_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT для таблицы `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=119;

--
-- AUTO_INCREMENT для таблицы `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT для таблицы `table_products`
--
ALTER TABLE `table_products`
  MODIFY `products_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
