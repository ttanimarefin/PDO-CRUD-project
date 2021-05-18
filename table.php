<?php

$dsn='mysql:host=localhost;dbname=Project1';

$connection=new PDO($dsn,'root','');

$connection->query("create table teachers(
    id int(11) auto_increment primary key,
    name varchar(30) not null,
    email varchar(30),
    Phone(15),
)");