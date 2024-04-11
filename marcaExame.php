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

    echo "<p class='center' style='text-align: center;'>Inserindo registro da tabela Animal...</p>";
            echo "<style>
            .styled-table {
                width: 100%;
                border-collapse: collapse;
                margin: 25px 0;
                font-size: 0.9em;
                font-family: sans-serif;
                min-width: 400px;
                box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
            }
            .styled-table thead tr th {
                padding: 12px 15px;
                text-align: center;
                font-weight: bold;
                vertical-align: middle;
                border-bottom: 1px solid #dddddd;
                background-color: #f3f4f6;
            }
            .styled-table tbody tr td {
                padding: 12px 15px;
                text-align: center;
                vertical-align: middle;
                border-bottom: 1px solid #dddddd;
            }
            .styled-table tbody tr:last-of-type td {
                border-bottom: 0;
            }
            .styled-table tbody tr:nth-of-type(even) {
                background-color: #f3f4f6;
            }
            .styled-table tbody tr:last-of-type {
                border-bottom: 2px solid #009879;
            }
        </style>";
            echo "<table class='styled-table'><tr>
                <th>dataExame</th>
                <th>horarioExame</th>
                <th>tipoExame</th>
                <th>observacoes</th>
                <th>vetResponsavel</th>
                <th>idAnimal</th>
                <th>secretariaResponsavel</th>
                <th>Confirmar</th>
            </tr>";

            echo "<tr><form name='marcarExame' action='marcarExame.php' method='post'>
            <input type='hidden' name='tabela' value='Exame'>
            <th><input type='date' name='dataExame'></th>
            <th><input type='time' name='horarioExame'></th>
            <th><input type='text' name='tipoExame'></th>
            <th><input type='text' name='observacoes'></th>
            <th>
                <select name='vetResponsavel'>
                    <option value=''>Selecione Veterinario</option>";
    
            $mysqli = new mysqli("localhost", "root", "", "clinicaVet");
    
            if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
            }
    
            $sql = "SELECT nomeVeterinario, crmv FROM Veterinario";
            $result = $mysqli->query($sql);
    
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['crmv']}'>{$row['nomeVeterinario']}</option>";
            }
            } else {
                echo "<option value=''>Não há veterinários</option>";
            }
    
            $mysqli->close();
    
            echo "</select>

            </th>

                <th>
                <select name='idAnimal'>
                    <option value=''>Selecione Animal</option>";
    
            $mysqli = new mysqli("localhost", "root", "", "clinicaVet");
    
            if ($mysqli->connect_error) {
            die("Connection failed: " . $mysqli->connect_error);
            }
    
            $sql = "SELECT nomeAnimal, idAnimal FROM Animal";
            $result = $mysqli->query($sql);
    
            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    echo "<option value='{$row['idAnimal']}'>{$row['nomeAnimal']}</option>";
            }
            } else {
                echo "<option value=''>Não há animais</option>";
            }
    
            $mysqli->close();
    
            echo "</select>

            </th>


            </th>

            <th>
            <select name='secretariaResponsavel'>
                <option value=''>Selecione pessoa da secretaria</option>";

        $mysqli = new mysqli("localhost", "root", "", "clinicaVet");

        if ($mysqli->connect_error) {
        die("Connection failed: " . $mysqli->connect_error);
        }

        $sql = "SELECT nomeSecretaria, idSecretaria FROM Secretaria";
        $result = $mysqli->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='{$row['idSecretaria']}'>{$row['nomeSecretaria']}</option>";
        }
        } else {
            echo "<option value=''>Não há pessoas da secretaria</option>";
        }

        $mysqli->close();

        echo "</select>

        </th>
            
            <th><button type='submit'><img src='imagens/adicionarF.png' width='50' height='50'/></button></th></form>
        </tr></table>";
    

            
        
?>
</br>
</body>

</html>