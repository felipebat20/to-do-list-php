<?php 
session_start();

$_SESSION['user_id'] = 1;

$db = new PDO('mysql:dbname=todo;host=localhost', 'root', '');

// Lidar com isso de outra maneira
if(!isset($_SESSION['user_id']))
    die("Você não está logado!");
?>