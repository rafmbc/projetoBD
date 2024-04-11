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

            $idExame   = $_POST['idExame'];
            $tableName  = "clinicaVet.Exame";
            $fields = "idExame,dataExame,horarioExame,tipoExame,observacoes,vetResponsavel,idAnimal,secretariaResponsavel";
            $keyField   = "idExame";
            $dbQuerySea = new DBQuery($tableName, $fields, $keyField);
            $resultSet  = $dbQuerySea->selectByKey($idExame);

            echo "<p class='center' style='text-align: center;'>Atualizando tabela Exame</p>";


            echo "<table class='styled-table'><tr>
                <th>idExame</th>
                <th>dataExame</th>
                <th>horarioExame</th>
                <th>tipoExame</th>
                <th>observacoes</th>
                <th>vetResponsavel</th>
                <th>idAnimal</th>
                <th>secretariaResponsavel</th>
                <th>Confirmar</th>
            </tr>";

            while($exibe = mysqli_fetch_assoc($resultSet)){
                echo "<tr><th>".$exibe['idExame']."</th>
                <form name='alterarExame' action='alterarExame.php' method='post'>
                <input type='hidden' name='tabela' value='Exame'>
                <input type='hidden' name='idExame' value=".$exibe['idExame'].">
                <th><input type='date' name='dataExame' value='".$exibe['dataExame']."'></th>
                <th><input type='time' name='horarioExame' value='".$exibe['horarioExame']."'></th>
                <th><input type='text' name='tipoExame' value='".$exibe['tipoExame']."'></th>
                <th><input type='text' name='observacoes' value='".$exibe['observacoes']."'></th>
                <th><input type='number' name='vetResponsavel' value='".$exibe['vetResponsavel']."'></th>
                <th><input type='number' name='idAnimal' value='".$exibe['idAnimal']."'></th>
                <th><input type='number' name='secretariaResponsavel' value='".$exibe['secretariaResponsavel']."'></th>
                <th><button type='submit'><img src='imagens/confirmarF.png' width='50' height='50'/></button></th></form>
                </tr></table>";
            }

?>

</br>
</body>

</html>