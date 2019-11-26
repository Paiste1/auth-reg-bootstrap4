<?php
$conn = mysqli_connect('localhost', 'root', '') or die('Ошибка подключения к БД');
if(!$conn) die(mysqli_connect_error());

mysqli_set_charset($conn, 'utf8');

$sql = 'CREATE DATABASE IF NOT EXISTS `users`';
mysqli_query($conn,$sql );
mysqli_close($conn);

$conn = mysqli_connect('localhost', 'root', '', 'users') or die('Ошибка подключения к БД #2');
if(!$conn) die(mysqli_connect_error());

$crTable = "CREATE TABLE `users` ( 
                `id` INT(11) NOT NULL AUTO_INCREMENT , 
                `username` VARCHAR(255) NOT NULL , 
                `email` VARCHAR(255) NOT NULL , 
                `password` VARCHAR(255) NOT NULL , 
                `active` TINYINT(1) NOT NULL , 
                PRIMARY KEY (`id`), 
                UNIQUE (`username`)) 
            ENGINE = InnoDB;";

mysqli_query($conn, $crTable);