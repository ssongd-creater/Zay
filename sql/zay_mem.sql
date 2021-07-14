-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 21-07-12 08:33
-- 서버 버전: 10.4.19-MariaDB
-- PHP 버전: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 데이터베이스: `test`
--

-- --------------------------------------------------------

--
-- 테이블 구조 `zay_mem`
--

CREATE TABLE `zay_mem` (
  `ZAY_mem_idx` int(11) DEFAULT NULL COMMENT '고유번호',
  `ZAY_mem_id` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '회원 아이디',
  `ZAY_mem_name` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '회원 이름',
  `ZAY_mem_email` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '회원 이메일',
  `ZAY_mem_pf` varchar(100) CHARACTER SET utf8 NOT NULL COMMENT '회원 프로필 사진',
  `ZAY_mem_pass` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '회원 비밀번호',
  `ZAY_mem_regi_day` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '회원 가입일'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
