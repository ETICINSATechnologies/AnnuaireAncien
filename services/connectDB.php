<?php
$servername = "localhost";
$dbname = "annuaire_ancien";
$dsn = 'mysql:host=' . $servername . ';dbname=' . $dbname . ';charset=utf8';
$username = "root";
$password = "root";

try
{
    $bdd = new PDO($dsn, $username, $password);
    array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION);
} catch (Exception $exception)
{
    die('erreur : ' . $exception->getMessage());
}
