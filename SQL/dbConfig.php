<?php 
    
    $databaseHost   = "localhost";
    $databaseUser   = "root"; 
    $databasePass   = "";
    $databasePort   = "3306";
    $databaseSchema = "clinicaVet";
    $databaseCharset= "UTF8MB4";
    $databaseConnection = mysqli_connect($databaseHost, $databaseUser, $databasePass, $databaseSchema) OR die("Houve um problema na conexão com o banco de dados. Código de erro: " . mysqli_connect_error());

?>
