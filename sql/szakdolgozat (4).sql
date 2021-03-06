-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Gép: 127.0.0.1
-- Létrehozás ideje: 2022. Feb 24. 12:50
-- Kiszolgáló verziója: 10.4.21-MariaDB
-- PHP verzió: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Adatbázis: `szakdolgozat`
--

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `admin`
--

CREATE TABLE `admin` (
  `users_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `favourite`
--

CREATE TABLE `favourite` (
  `users_id` int(255) NOT NULL,
  `favorited_picture_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `followers`
--

CREATE TABLE `followers` (
  `users_id` int(255) NOT NULL,
  `follower_id` int(255) NOT NULL,
  `followed` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `likes`
--

CREATE TABLE `likes` (
  `users_id` int(255) NOT NULL,
  `liker_id` int(255) NOT NULL,
  `liked` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `pictures`
--

CREATE TABLE `pictures` (
  `users_id` int(255) NOT NULL,
  `picture_id` int(255) NOT NULL,
  `picture_name` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `size` int(255) NOT NULL,
  `formats` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `pictures`
--

INSERT INTO `pictures` (`users_id`, `picture_id`, `picture_name`, `category`, `size`, `formats`) VALUES
(53, 41, 'pictures/default.jpg', '0', 141436, 'jpeg'),
(53, 42, 'pictures/Képernyőfelvétel (179).png', '0', 517610, 'png'),
(53, 43, 'pictures/Képernyőfelvétel (180).png', '0', 364240, 'png'),
(53, 44, 'pictures/Képernyőfelvétel (178).png', '0', 431405, 'png');

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `profile_pics`
--

CREATE TABLE `profile_pics` (
  `users_id` int(255) NOT NULL,
  `picture_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `profile_pics`
--

INSERT INTO `profile_pics` (`users_id`, `picture_id`) VALUES
(53, 41);

-- --------------------------------------------------------

--
-- Tábla szerkezet ehhez a táblához `users`
--

CREATE TABLE `users` (
  `users_id` int(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `pw` varchar(255) NOT NULL,
  `premium` tinyint(1) NOT NULL,
  `followers` int(255) NOT NULL,
  `likes` int(255) NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- A tábla adatainak kiíratása `users`
--

INSERT INTO `users` (`users_id`, `username`, `pw`, `premium`, `followers`, `likes`, `gender`, `email`) VALUES
(47, 'Xx_DemonSlayer69_xX', '174a3f4fa44c7bb22b3b6429cb4ea44c', 0, 0, 0, 0, 'uwu@owo.com'),
(50, 'ceg', '6226f7cbe59e99a90b5cef6f94f966fd', 0, 0, 0, 0, 'fustos.lorant10@gmail.com'),
(53, 'asd', '7815696ecbf1c96e6894b779456d330e', 0, 0, 0, 0, 'asd@sh.com');

--
-- Indexek a kiírt táblákhoz
--

--
-- A tábla indexei `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`users_id`);

--
-- A tábla indexei `favourite`
--
ALTER TABLE `favourite`
  ADD KEY `favourite_pic` (`favorited_picture_id`),
  ADD KEY `favouriter` (`users_id`);

--
-- A tábla indexei `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`users_id`),
  ADD KEY `follower_id` (`follower_id`);

--
-- A tábla indexei `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `liker_id` (`liker_id`);

--
-- A tábla indexei `pictures`
--
ALTER TABLE `pictures`
  ADD PRIMARY KEY (`picture_id`),
  ADD KEY `user` (`users_id`);

--
-- A tábla indexei `profile_pics`
--
ALTER TABLE `profile_pics`
  ADD PRIMARY KEY (`users_id`),
  ADD UNIQUE KEY `picture_id` (`picture_id`);

--
-- A tábla indexei `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`users_id`);

--
-- A kiírt táblák AUTO_INCREMENT értéke
--

--
-- AUTO_INCREMENT a táblához `admin`
--
ALTER TABLE `admin`
  MODIFY `users_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `favourite`
--
ALTER TABLE `favourite`
  MODIFY `favorited_picture_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `followers`
--
ALTER TABLE `followers`
  MODIFY `users_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `likes`
--
ALTER TABLE `likes`
  MODIFY `users_id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT a táblához `pictures`
--
ALTER TABLE `pictures`
  MODIFY `picture_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT a táblához `profile_pics`
--
ALTER TABLE `profile_pics`
  MODIFY `users_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT a táblához `users`
--
ALTER TABLE `users`
  MODIFY `users_id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- Megkötések a kiírt táblákhoz
--

--
-- Megkötések a táblához `admin`
--
ALTER TABLE `admin`
  ADD CONSTRAINT `admin` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_pic` FOREIGN KEY (`favorited_picture_id`) REFERENCES `pictures` (`picture_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `favouriter` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followed` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `follower` FOREIGN KEY (`follower_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `likes`
--
ALTER TABLE `likes`
  ADD CONSTRAINT `liked` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `liker` FOREIGN KEY (`liker_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `pictures`
--
ALTER TABLE `pictures`
  ADD CONSTRAINT `user` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Megkötések a táblához `profile_pics`
--
ALTER TABLE `profile_pics`
  ADD CONSTRAINT `profilep` FOREIGN KEY (`picture_id`) REFERENCES `pictures` (`picture_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userpic` FOREIGN KEY (`users_id`) REFERENCES `users` (`users_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
