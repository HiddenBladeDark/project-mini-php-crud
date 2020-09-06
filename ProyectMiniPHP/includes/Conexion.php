<?php

$user="";
$password="root";
$database="phpmysql";
$server="localhost";

$conexion = mysqli_connect("localhost", "root","", "phpmysql");

mysqli_query($conexion, "SET NAMES 'uft8'");



if(!isset($_SESSION))
{
//Iniciar sesion
session_start();
}