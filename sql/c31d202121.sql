-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: localhost
-- Létrehozás ideje: 2022. Jan 20. 13:23
-- Kiszolgáló verziója: 10.3.29-MariaDB-0+deb10u1
-- PHP verzió: 7.4.23

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `c31d202121`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `admin`
--

CREATE TABLE `admin` (
  `user_id` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `Followers`
--

CREATE TABLE `Followers` (
  `user_id` varchar(255) NOT NULL,
  `follower_id` int(255) NOT NULL,
  `followed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `Likes`
--

CREATE TABLE `Likes` (
  `user_id` varchar(255) NOT NULL,
  `follower_id` varchar(255) NOT NULL,
  `liked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `Pictures`
--

CREATE TABLE `Pictures` (
  `user_id` varchar(255) NOT NULL,
  `picture_id` int(255) NOT NULL,
  `picture_name` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `size` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `Users`
--

CREATE TABLE `Users` (
  `user_id` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `followers` int(255) NOT NULL,
  `likes` int(255) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `e-mail` varchar(255) NOT NULL,
  `profile_picture` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`user_id`);

--
-- A tábla indexei `Followers`
--
ALTER TABLE `Followers`
  ADD PRIMARY KEY (`user_id`);

--
-- A tábla indexei `Likes`
--
ALTER TABLE `Likes`
  ADD PRIMARY KEY (`user_id`);

--
-- A tábla indexei `Pictures`
--
ALTER TABLE `Pictures`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `picture_id` (`picture_id`);

--
-- A tábla indexei `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `profile_picture` (`profile_picture`);

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `Users`
--
ALTER TABLE `Users`
  ADD CONSTRAINT `admin` FOREIGN KEY (`user_id`) REFERENCES `admin` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follower` FOREIGN KEY (`user_id`) REFERENCES `Followers` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `likes` FOREIGN KEY (`user_id`) REFERENCES `Likes` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pictures` FOREIGN KEY (`user_id`) REFERENCES `Pictures` (`user_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `profile_picture` FOREIGN KEY (`profile_picture`) REFERENCES `Pictures` (`picture_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
