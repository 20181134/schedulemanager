drop database if exists schedule;
create database schedule default character set utf8 collate utf8_general_ci;
grant all on schedule.* to 'admin'@'localhost' identified by 'admin1234';
use schedule;

create table scheduletable (
    id int auto_increment primary key,
    year varchar(4),
    month varchar(2),
    day varchar(2) not null,
    user varchar(30) not null,
    availability text
);