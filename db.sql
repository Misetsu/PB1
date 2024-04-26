set names utf8;
drop database if exists ilove;
create database ilove character set utf8 collate utf8_general_ci;

grant all privileges on ilove.* to Ilove@localhost identified by '11111';

use ilove;

CREATE TABLE question (
    id int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    userid int(255) NOT NULL,
    title varchar(2000) NOT NULL,
    message varchar(2000) NOT NULL,
    selection varchar(50) NOT NULL
);

DROP TABLE IF EXISTS answer;
CREATE TABLE answer (
    id        int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
	userid int(255) NOT NULL,
	text      varchar(2000) NOT NULL,
    ques_id   int(255) NOT NULL,
    FOREIGN KEY (ques_id) REFERENCES question(id)
);

DROP TABLE IF EXISTS userinfo;
CREATE TABLE userinfo (
    userid int(255) NOT NULL AUTO_INCREMENT PRIMARY KEY,
    username  varchar(100) NOT NULL,
    subject   varchar(100) NOT NULL,
    email     varchar(100) NOT NULL,
    password  varchar(100) NOT NULL
);

DROP TABLE IF EXISTS profile;
CREATE TABLE profile (
    userid int(255) NOT NULL PRIMARY KEY,
    age       int(10),
    interest  varchar(200),
    intro     varchar(500)
);
