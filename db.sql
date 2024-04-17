set names utf8;
drop database if exists ilove;
create database ilove character set utf8 collate utf8_general_ci;

grant all privileges on ilove.* to Ilove@localhost identified by '11111';

# データベースshopを使用する
use shop;

CREATE TABLE `question` (
  `id` int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `title` varchar(2000) NOT NULL,
  `text` varchar(2000) NOT NULL,
  `anser` varchar(2000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;


INSERT INTO `kari` (`title`,`text`,`anser`) VALUES
('a','b','c')