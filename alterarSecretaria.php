<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">



</head>

<style>
    body {
        display: flex;
        min-height: 100vh;
        flex-direction: column;
        font-family: Arial, sans-serif;
    }
    header {
        background-color: #114232;
        color: white;
        padding: 10px 0;
        text-align: center;
        font-family: 'Trebuchet MS';
    }
    .center {
    text-align: center;
    a {
            color: inherit; 
            text-decoration: none; 
        }

      
        a:hover {
            text-decoration: underline;
        }

       
        a:active {
            color: inherit;
            text-decoration: none; 
    }
}
</style>


<body >
<header>
    <h1><a href="telainicial.php">Clínica Veterinária PoliAnimais</a></h1>
</header>

</br>
<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/clinicaVet/SQL/DBQuery.class.php';

        $idSecretaria = $_POST['idSecretaria'];
        $nomeSecretaria = $_POST['nomeSecretaria'];
        $telefoneSecretaria = $_POST['telefoneSecretaria'];
        
        $mysqli = new mysqli("localhost", "root", "", "clinicaVet");
        
        if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
        }
        
        $stmt = $mysqli->prepare("UPDATE Secretaria SET nomeSecretaria=?, telefoneSecretaria=? WHERE idSecretaria=?");
        
        if (!$stmt) {
            die("Error in prepared statement: " . $mysqli->error);
        }
        
        // Bind parameters to the prepared statement
        $stmt->bind_param("sii", $nomeSecretaria, $telefoneSecretaria, $idSecretaria);
        
        if ($stmt->execute()) {
            echo "<p class='center' style='text-align: center;'>Secretaria atualizado!</p>";
        } else {
            echo "<p class='center' style='text-align: center;'>Erro ao atualizar Secretaria: " . $stmt->error . "</p>";
        }
        
        // Close the statement and database connection
        $stmt->close();
        $mysqli->close();
    

?>
<form action="./telaInicial.php" method="get" style='text-align: center;'>
    <button type="submit" >Voltar para começo</button>
</form>
</br>


</body>

</html>