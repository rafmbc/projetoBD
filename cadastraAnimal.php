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
                <th>nomeAnimal</th>
                <th>especieAnimal</th>
                <th>sexoAnimal</th>
                <th>idade</th>
                <th>cpfDono</th>
                <th>Confirmar</th>
            </tr>";

            echo "<tr><form name='inserirAnimal' action='insereAnimal.php' method='post'>
            <input type='hidden' name='tabela' value='Animal'>
            <th><input type='text' name='nomeAnimal'></th>
            <th><input type='text' name='especieAnimal'></th>
            <th>
            <select name='sexoAnimal'>
                <option value=''>Selecione sexo</option>
                <option value='M'>M</option>
                <option value='F'>F</option>
            </select>
            </th>
            <th><input type='number' name='idade'></th>
            <th>
                <select name='cpfDono'>
                    <option value=''>Selecione CPF</option>";
    
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
            <th><button type='submit'><img src='imagens/adicionarF.png' width='50' height='50'/></button></th></form>
        </tr></table>";
    

            
        
?>
</br>
</body>

</html>