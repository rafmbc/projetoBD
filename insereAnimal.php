<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

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
    
        $nomeAnimal = $_POST['nomeAnimal'];
        $especieAnimal = $_POST['especieAnimal'];
        $sexoAnimal = $_POST['sexoAnimal'];
        $idade = $_POST['idade'];
        $cpfDono = $_POST['cpfDono'];
    
        $stmt = $conn->prepare("INSERT INTO Animal (nomeAnimal, especieAnimal, sexoAnimal, idade, cpfDono) VALUES (?, ?, ?, ?, ?)");
        $stmt->bind_param("sssis", $nomeAnimal, $especieAnimal, $sexoAnimal, $idade, $cpfDono);
        $stmt->execute();
    
        echo "<p class='center' style='text-align: center; font-size: 20px;'>Animal cadastrado com sucesso!</p>";
    
        $stmt->close();
        $conn->close();
    } catch (Exception $err) {
        echo $err;
        echo "<p class='center' style='text-align: center; font-size: 20px;'>Erro ao cadastrar animal!</p>";
    }
?>
<form action="./telaInicial.php" method="get" style='text-align: center;'>
    <button type="submit" >Voltar para começo</button>
</form>

</br>
</body>

</html>