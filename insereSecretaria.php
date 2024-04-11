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

<body>
<header>
    <h1><a href="telainicial.php">Clínica Veterinária PoliAnimais</a></h1>
</header>

</br>
<?php
    require $_SERVER['DOCUMENT_ROOT'] . '/clinicaVet/SQL/DBQuery.class.php';

    try {
        $conn = new mysqli('localhost', 'root', '', 'clinicaVet');
    
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }
    
        $nomeSecretaria = $_POST['nomeSecretaria'];
        $telefoneSecretaria = $_POST['telefoneSecretaria'];

        $stmt = $conn->prepare("INSERT INTO Secretaria (nomeSecretaria, telefoneSecretaria) VALUES (?, ?)");
        $stmt->bind_param("si", $nomeSecretaria, $telefoneSecretaria);
        $stmt->execute();
    
        echo "<p class='center' style='text-align: center; font-size: 20px;'>Secretaria cadastrado com sucesso!</p>";
    
        $stmt->close();
        $conn->close();
    } catch (Exception $err) {
        echo $err;
        echo "<p class='center' style='text-align: center; font-size: 20px;'>Erro ao cadastrar secretaria!</p>";
    }
?>
<form action="./telaInicial.php" method="get" style='text-align: center;'>
    <button type="submit" >Voltar para começo</button>
</form>

</br>
</body>

</html>