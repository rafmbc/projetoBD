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

            $cpfDono   = $_POST['cpfDono'];
            $tableName  = "clinicaVet.Donos";
            $fields     = "cpfDono, nome, telefone, endereco";
            $keyField   = "cpfDono";
            $dbQuerySea = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQuerySea->selectByKey($cpfDono);

            echo "<p class='center' style='text-align: center;'>Atualizando tabela Donos</p>";


            echo "<table class='styled-table'><tr>
                <th>cpfDono</th>
                <th>nome</th>
                <th>telefone</th>
                <th>endereco</th>
                <th>Confirmar</th>
            </tr>";

            while($exibe = mysqli_fetch_assoc($resultSet)){
                echo "<tr><th>".$exibe['cpfDono']."</th>
                <form name='alterarDono' action='alterarDono.php' method='post'>
                <input type='hidden' name='tabela' value='Donos'>
                <input type='hidden' name='cpfDono' value=".$exibe['cpfDono'].">
                <th><input type='text' name='nome' value='".$exibe['nome']."'></th>
                <th><input type='number' name='telefone' value='".$exibe['telefone']."'></th>
                <th><input type='text' name='endereco' value='".$exibe['endereco']."'></th>

                <th><button type='submit'><img src='imagens/confirmarF.png' width='50' height='50'/></button></th></form>
                </tr></table>";
            }

?>

</br>
</body>

</html>