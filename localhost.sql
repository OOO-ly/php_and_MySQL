-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- 생성 시간: 21-03-09 23:51
-- 서버 버전: 8.0.22
-- PHP 버전: 8.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `tnj_tutorial`
--
CREATE DATABASE IF NOT EXISTS `tnj_tutorial` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `tnj_tutorial`;

-- --------------------------------------------------------

--
-- 테이블 구조 `author`
--

CREATE TABLE `author` (
  `id` int NOT NULL,
  `name` varchar(30) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profile` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `password` varchar(40) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `author`
--

INSERT INTO `author` (`id`, `name`, `profile`, `password`) VALUES
(1, 'lee', 'junior dev', 'eerrddff#$#$'),
(2, 'lee4', '백엔드 ', '1234'),
(32, 'e4e', 'llall', '1234'),
(75, 'e1234', '1234', '1234'),
(105, 'e123123123', '', '12344'),
(155, 'test1', '테스트계정입니다.1', '1234'),
(157, 'erdf55', '', '123ee'),
(158, 'erdf44', '', '123ee'),
(183, '123ee', '33', '33'),
(184, 'ert4455', 'hello world', '1234'),
(185, 'ert123', '1234', '1234'),
(186, '210222_test', '2월22일 테스트', '1234'),
(187, 'test', '테스터', 'qwer1111');

-- --------------------------------------------------------

--
-- 테이블 구조 `topic`
--

CREATE TABLE `topic` (
  `id` int NOT NULL,
  `title` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created` datetime NOT NULL,
  `author_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `topic`
--

INSERT INTO `topic` (`id`, `title`, `description`, `created`, `author_id`) VALUES
(5, 'Mysql ', 'MySQL is...', '2021-02-01 12:08:23', 1),
(6, 'sql ', 'sql is...', '2021-02-01 12:15:16', 1),
(43, '1234', '1234', '2021-02-03 11:22:07', 1),
(47, '회원별 권한 test', 'test', '2021-02-03 14:52:54', 2),
(48, 'modify fy', 'modify fy', '2021-02-03 15:04:51', 1),
(49, '테스트', '테스트합니다.', '2021-02-08 17:27:57', 5),
(50, '네비게이션 바 만들기', 'flex를 이용한 상단 nav_bar 만들기', '2021-02-10 11:54:37', 1);

-- --------------------------------------------------------

--
-- 테이블 구조 `topic2`
--

CREATE TABLE `topic2` (
  `id` int NOT NULL,
  `title` varchar(45) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci,
  `created` datetime NOT NULL,
  `author_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- 테이블의 덤프 데이터 `topic2`
--

INSERT INTO `topic2` (`id`, `title`, `description`, `created`, `author_id`) VALUES
(1, '메인페이지 로그인 페이지 만들기', '현재 진행중', '2021-02-10 11:55:54', 1),
(2, 'nav-bar 만들기', 'flex를 이용해 완성', '2021-02-10 11:56:50', 1),
(3, '글 최신순 정렬하기', 'order by created asc\r\n로 변경할 예정', '2021-02-10 12:00:32', 1),
(4, '글 최신순 정렬하기', 'order by created asc\r\n로 변경할 예정', '2021-02-10 12:00:56', 1);

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `uniq_name` (`name`);

--
-- 테이블의 인덱스 `topic`
--
ALTER TABLE `topic`
  ADD PRIMARY KEY (`id`);

--
-- 테이블의 인덱스 `topic2`
--
ALTER TABLE `topic2`
  ADD PRIMARY KEY (`id`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `author`
--
ALTER TABLE `author`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=189;

--
-- 테이블의 AUTO_INCREMENT `topic`
--
ALTER TABLE `topic`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- 테이블의 AUTO_INCREMENT `topic2`
--
ALTER TABLE `topic2`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
