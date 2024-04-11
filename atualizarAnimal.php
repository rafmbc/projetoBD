<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">>
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

            $idAnimal   = $_POST['idAnimal'];
            $tableName  = "clinicaVet.Animal";
            $fields     = "idAnimal, nomeAnimal, especieAnimal, sexoAnimal, idade, cpfDono";
            $keyField   = "idAnimal";
            $dbQuerySea = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQuerySea->selectByKey($idAnimal);

            echo "<p class='center' style='text-align: center;'>Atualizando tabela Animal</p>";


            echo "<table class='styled-table'><tr>
                <th>idAnimal</th>
                <th>nomeAnimal</th>
                <th>especieAnimal</th>
                <th>sexoAnimal</th>
                <th>idade</th>
                <th>cpfDono</th>
                <th>Confirmar</th>
            </tr>";

            while($exibe = mysqli_fetch_assoc($resultSet)){
                echo "<tr><th>".$exibe['idAnimal']."</th>
                <form name='alterarAnimal' action='alterarAnimal.php' method='post'>
                <input type='hidden' name='tabela' value='Animal'>
                <input type='hidden' name='idAnimal' value=".$exibe['idAnimal'].">
                <th><input type='text' name='nomeAnimal' value='".$exibe['nomeAnimal']."'></th>
                <th><input type='text' name='especieAnimal' value='".$exibe['especieAnimal']."'></th>
                <th>
                <select name='sexoAnimal'>
                    <option value=''>Selecione sexo</option>
                    <option value='M'>M</option>
                    <option value='F'>F</option>
                </select>
                </th>
                <th><input type='number' name='idade' value='".$exibe['idade']."'></th>
                <th>
                <select name='cpfDono'>
                    <option value=''>".$exibe['cpfDono']."</option>";
    
                $mysqli = new mysqli("localhost", "root", "", "clinicaVet");
                
                if ($mysqli->connect_error) {
                    die("Connection failed: " . $mysqli->connect_error);
                }
                
                $sql = "SELECT cpfDono FROM Donos";
                $result = $mysqli->query($sql);
                
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<option value='{$row['cpfDono']}'>{$row['cpfDono']}</option>";
                    }
                } else {
                    echo "<option value=''>Não há CPFs</option>";
                }
                
                $mysqli->close();
                
                echo "</select>
                </th>
                <th><button type='submit'><img src='imagens/confirmarF.png' width='50' height='50'/></button></th></form>
                </tr></table>";
            }

?>

</br>
</body>

</html>