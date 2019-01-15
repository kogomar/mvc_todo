-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Хост: localhost:3306
-- Время создания: Янв 15 2019 г., 09:41
-- Версия сервера: 5.7.24-0ubuntu0.18.04.1
-- Версия PHP: 5.6.39-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `todo`
--

-- --------------------------------------------------------

--
-- Структура таблицы `projects`
--

CREATE TABLE `projects` (
  `id` int(255) NOT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `color` varchar(255) DEFAULT NULL,
  `time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `projects`
--

INSERT INTO `projects` (`id`, `pname`, `color`, `time`) VALUES
(1, 'Update', 'red', '2019-01-11 02:05:04'),
(4, 'Develop', 'orange', '2019-01-13 15:53:59'),
(5, 'Produce', 'blue', '2019-01-13 16:37:21');

-- --------------------------------------------------------

--
-- Структура таблицы `tasks`
--

CREATE TABLE `tasks` (
  `id` int(255) NOT NULL,
  `project_id` int(255) DEFAULT NULL,
  `tname` varchar(255) DEFAULT NULL,
  `priority` int(5) DEFAULT '3',
  `status` int(5) NOT NULL DEFAULT '1',
  `tuser` varchar(255) DEFAULT NULL,
  `end_time` varchar(255) DEFAULT NULL,
  `task_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `tasks`
--

INSERT INTO `tasks` (`id`, `project_id`, `tname`, `priority`, `status`, `tuser`, `end_time`, `task_time`) VALUES
(1, 1, 'Honor', 2, 1, 'user1', '2019-01-15 ', '2019-01-11 00:00:00'),
(2, 1, 'Samsung', 3, 0, 'user1', '2019-01-17', '2019-01-11 00:00:00'),
(3, 2, 'Meizu', 1, 0, 'User2', '2019-01-15', '2019-01-15 00:00:00'),
(7, 1, 'Lenovo', 2, 0, 'Eugene', '2019-01-16', '2019-01-13 15:24:32'),
(8, 1, 'OnePlus', 2, 0, 'Eugene', '2019-01-14', '2019-01-13 17:55:06'),
(9, 5, 'Huawei', 1, 0, 'Eugene', '2019-01-13', '2019-01-13 17:55:20'),
(10, 4, 'Xiaomi', 3, 0, 'Eugene', '2019-01-13', '2019-01-13 17:55:35'),
(11, 1, 'Mototolla', 2, 0, 'Eugene', '2019-01-17 ', '2019-01-14 00:43:29'),
(13, 4, 'Oppo', 2, 0, 'Eugene', '2019-01-30', '2019-01-15 02:32:51');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(255) NOT NULL,
  `login` varchar(255) CHARACTER SET latin1 NOT NULL,
  `pass` varchar(32) CHARACTER SET latin1 NOT NULL,
  `email` varchar(255) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `login`, `pass`, `email`) VALUES
(30, 'admin', '123456', 'admin@gmail.com');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `id_2` (`id`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT для таблицы `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
