<?php

mb_internal_encoding("UTF-8");
$HOST = "localhost";
$USER = "lucas2";
$PASS = "1234";
$DB= "pene2";

$dato1 = $_POST['nomb'];
$dato2 = $_POST['edad'];
$dato3 = $_POST['mail'];
$dato4 = $_POST['sexo'];

$con = mysqli_connect($HOST,$USER,$PASS,$DB);

mysqli_set_charset($con, 'utf8');

$sql = "INSERT INTO datos (Nombre,Edad,Email,Sexo) VALUES ('$dato1','$dato2','$dato3','$dato4')";

$ins = mysqli_query($con,$sql);

?>