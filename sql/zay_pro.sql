-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- 생성 시간: 21-07-15 03:16
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
-- 테이블 구조 `zay_pro`
--

CREATE TABLE `zay_pro` (
  `ZAY_pro_idx` int(11) NOT NULL COMMENT '상품고유번호',
  `ZAY_pro_cate` varchar(20) CHARACTER SET utf8 NOT NULL COMMENT '상품분류',
  `ZAY_pro_name` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '상품이름',
  `ZAY_pro_pri` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '상품가격',
  `ZAY_pro_bran` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '상품브랜드명',
  `ZAY_pro_desc` text CHARACTER SET utf8 NOT NULL COMMENT '상품설명',
  `ZAY_pro_color` varchar(30) CHARACTER SET utf8 NOT NULL COMMENT '상품색상',
  `ZAY_pro_img_01` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '상품사진1',
  `ZAY_pro_img_02` varchar(50) CHARACTER SET utf8 NOT NULL COMMENT '상품사진2',
  `ZAY_pro_reg` varchar(30) NOT NULL COMMENT '상품 등록일'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 덤프된 테이블의 인덱스
--

--
-- 테이블의 인덱스 `zay_pro`
--
ALTER TABLE `zay_pro`
  ADD PRIMARY KEY (`ZAY_pro_idx`);

--
-- 덤프된 테이블의 AUTO_INCREMENT
--

--
-- 테이블의 AUTO_INCREMENT `zay_pro`
--
ALTER TABLE `zay_pro`
  MODIFY `ZAY_pro_idx` int(11) NOT NULL AUTO_INCREMENT COMMENT '상품고유번호';
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
