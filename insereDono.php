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
                $cpfDono       = $_POST['cpfDono'];
                $nome     =  $_POST['nome'];
                $telefone       = $_POST['telefone'];
                $endereco = $_POST['endereco']; 
                $tableName    = "clinicaVet.donos";
                $fields       = "cpfDono,nome,telefone,endereco";
                $keyField     = "";
                $dbQueryIns   = new DBQuery($tableName, $fields, $keyField);

                
                $resultSet = $dbQueryIns->insert([$cpfDono,$nome,$telefone,$endereco]);
                echo "<p class='center' style='text-align: center; font-size: 20px;'>Dono cadastrado com sucesso!</p>";
            }
            catch (Exception $err) {
                echo "<p class='center' style='text-align: center; font-size: 20px;'>Erro ao cadastrar dono!</p>";
                    

            }

?>
<form action="./telaInicial.php" method="get" style='text-align: center;'>
    <button type="submit" >Voltar para começo</button>
</form>

</br>
</body>

</html>