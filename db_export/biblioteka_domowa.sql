-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 26 Maj 2023, 04:00
-- Wersja serwera: 10.4.27-MariaDB
-- Wersja PHP: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `biblioteka_domowa`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `books`
--

CREATE TABLE `books` (
  `id_book` int(10) UNSIGNED NOT NULL,
  `title` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `author_name` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `author_lastname` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `release_date` varchar(4) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `join_date` date NOT NULL,
  `category_id` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `shelf_nr` int(11) NOT NULL,
  `bookstand_nr` int(11) NOT NULL,
  `shelf_letter` varchar(1) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `category` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `categories`
--

INSERT INTO `categories` (`id`, `category`) VALUES
(1, 'Horror');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `users`
--

CREATE TABLE `users` (
  `id_user` int(100) UNSIGNED NOT NULL,
  `user_name` varchar(30) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(60) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Zrzut danych tabeli `users`
--

INSERT INTO `users` (`id_user`, `user_name`, `email`, `password`, `created_at`) VALUES
(1, 'u1', 'u1@wp.pl', '$argon2id$v=19$m=65536,t=4,p=1$Yk9tdUFJdVBNZzF1MURHbg$Qk+wnC', '2023-05-21 22:55:56'),
(2, 'u2', 'u2@po.pl', '$argon2id$v=19$m=65536,t=4,p=1$dzhUWnJ5ZXVMOXlkakVyZA$9FYVGh', '2023-05-21 23:09:12'),
(3, 'u3', 'u3@po.pl', '$argon2id$v=19$m=65536,t=4,p=1$ckwwNFlKVFlRRFVhdk4xVw$efRLHK', '2023-05-21 23:14:17'),
(4, 'u5Oó', 'u5@po.pl', '$argon2id$v=19$m=65536,t=4,p=1$VVZFcWV4dmZEZHRQYUhJSg$oOpjoi', '2023-05-24 01:33:41');

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id_book`);

--
-- Indeksy dla tabeli `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeksy dla tabeli `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `books`
--
ALTER TABLE `books`
  MODIFY `id_book` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT dla tabeli `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(100) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
