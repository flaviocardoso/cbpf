<?php
define('HOST', 'localhost');
define('USER', 'root');
define('PW', '');
define('BD', 'link');

try{
    $PDO = new PDO('mysql:host=' . HOST . ';dbname=' . BD, USER, PW);
}catch (PDOException $e){
    echo 'Erro ' . $e->getMessage();
}