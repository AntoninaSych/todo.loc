-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Хост: 127.0.0.1
-- Час створення: Січ 20 2017 р., 12:55
-- Версія сервера: 5.6.17
-- Версія PHP: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- База даних: `todo`
--

-- --------------------------------------------------------

--
-- Структура таблиці `tasks`
--

CREATE TABLE IF NOT EXISTS `tasks` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `date_create` date NOT NULL,
  `last_modify` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=10 ;

--
-- Дамп даних таблиці `tasks`
--

INSERT INTO `tasks` (`id`, `id_user`, `title`, `description`, `date_create`, `last_modify`) VALUES
(1, 5, 'Написать todo list 9090', '1. Авторизация пользователя1\r\n2. Регистрация пользователя1\r\n3. Список задач, составленных пользователем1\r\n4. Редактирование задач1\r\n5. Добавление задач1\r\n6. Удаление задач1', '2017-01-17', '2017-01-19'),
(2, 5, 'Написать  todo list', '1. Авторизация пользователя\r\n2. Регистрация пользователя\r\n3. Список задач, составленных пользователем\r\n4. Редактирование задач\r\n5. Добавление задач\r\n6. Удаление задач', '2017-01-17', '2017-01-19'),
(8, 5, 'main', ' kjljl', '2017-01-19', '2017-01-19'),
(9, 5, 'opopop', ' hgfhgfh', '2017-01-19', '0000-00-00');

-- --------------------------------------------------------

--
-- Структура таблиці `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `login` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=7 ;

--
-- Дамп даних таблиці `users`
--

INSERT INTO `users` (`id`, `login`, `password`, `date`, `email`) VALUES
(1, 'test1', '1', '2017-01-16', 'antoninasych@gmail.com'),
(2, 'test2', 'ad0234829205b9033196ba818f7a872b', '0000-00-00', 'antoninasych@gmail.com'),
(3, 'test3', 'c4ca4238a0b923820dcc509a6f75849b', '2017-01-17', 'antonsych@gmail.com'),
(4, 'login', 'd56b699830e77ba53855679cb1d252da', '2017-01-17', 'login@gmail.com'),
(5, 'test', '098f6bcd4621d373cade4e832627b4f6', '2017-01-17', 'test@gmail.com'),
(6, 'Anton', 'dd93247a247c559e1050296f0ec86a23', '2017-01-19', 'antoninasych@gmail.com');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
