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

            $idSecretaria   = $_POST['idSecretaria'];
            $tableName  = "clinicaVet.Secretaria";
            $fields = "idSecretaria,nomeSecretaria,telefoneSecretaria";
            $keyField   = "idSecretaria";
            $dbQuerySea = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQuerySea->selectByKey($idSecretaria);

            echo "<p class='center' style='text-align: center;'>Atualizando tabela Secretaria</p>";


            echo "<table class='styled-table'><tr>
                <th>idSecretaria</th>
                <th>nomeSecretaria</th>
                <th>telefoneSecretaria</th>
                <th>Confirmar</th>
            </tr>";

            while($exibe = mysqli_fetch_assoc($resultSet)){
                echo "<tr><th>".$exibe['idSecretaria']."</th>
                <form name='alterarSecretaria' action='alterarSecretaria.php' method='post'>
                <input type='hidden' name='tabela' value='Secretaria'>
                <input type='hidden' name='idSecretaria' value=".$exibe['idSecretaria'].">
                <th><input type='text' name='nomeSecretaria' value='".$exibe['nomeSecretaria']."'></th>
                <th><input type='number' name='telefoneSecretaria' value='".$exibe['telefoneSecretaria']."'></th>
                <th><button type='submit'><img src='imagens/confirmarF.png' width='50' height='50'.png'/></button></th></form>
                </tr></table>";
            }

?>

</br>
</body>

</html>