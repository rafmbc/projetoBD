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
</style>


</script>

<body >
<header>
    <h1><a href="telainicial.php">Clínica Veterinária PoliAnimais</a></h1>
</header>

</br>
<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/clinicaVet/SQL/DBQuery.class.php';

    $idExame = $_POST['idExame'];
    
    $mysqli = new mysqli("localhost", "root", "", "clinicaVet"); // Adjust database name if needed
    
    if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
    }

    $sql = "DELETE FROM Exame WHERE idExame=?";
    
    $stmt = $mysqli->prepare($sql);
    
    if (!$stmt) {
        die("Error in prepared statement: " . $mysqli->error);
    }
    

    $stmt->bind_param("i", $idExame); 
    
    if ($stmt->execute()) {
        echo "<p class='center'>Exame deletado com sucesso!</p>";
    } else {
        echo "<p class='center'>Erro ao deletar exame: " . $stmt->error . "</p>";
    }
    
    $stmt->close();
    $mysqli->close();
    

?>
<form action="./telaInicial.php" method="get" style='text-align: center;'>
    <button type="submit" >Voltar para começo</button>
</form>
</br>

</body>

</html>