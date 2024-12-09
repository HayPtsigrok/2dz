-- phpMyAdmin SQL Dump
-- version 5.1.2
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Дек 09 2024 г., 22:56
-- Версия сервера: 5.7.24
-- Версия PHP: 8.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `grup`
--

-- --------------------------------------------------------

--
-- Структура таблицы `zaivka`
--

CREATE TABLE `zaivka` (
  `id` int(11) NOT NULL,
  `marka` varchar(150) DEFAULT NULL,
  `model` varchar(150) DEFAULT NULL,
  `god` varchar(4) DEFAULT NULL,
  `vidrabot` varchar(150) DEFAULT NULL,
  `opisanie` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `zaivka`
--

INSERT INTO `zaivka` (`id`, `marka`, `model`, `god`, `vidrabot`, `opisanie`) VALUES
(1, '11', '11', NULL, '11', '11'),
(2, '21', '21', '21', '21', '21');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `zaivka`
--
ALTER TABLE `zaivka`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `zaivka`
--
ALTER TABLE `zaivka`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
