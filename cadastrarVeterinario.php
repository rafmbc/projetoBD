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

    echo "<p class='center' style='text-align: center;'>Inserindo registro da tabela Veterinario...</p>";
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
                <th>crmv</th>
                <th>nomeVeterinario</th>
                <th>tipoEspecializacao</th>
                <th>telefone</th>
            </tr>";

            echo "<tr><form name='inserirVeterinario' action='insereVeterinario.php' method='post'>
            <input type='hidden' name='tabela' value='Veterinario'>
            <th><input type='number' name='crmv'></th>
            <th><input type='text' name='nomeVeterinario'></th>
            <th>
                <select name='tipoEspecializacao'>
                    <option value=''>Selecione Especializacao</option>
                    <option value='Pequenos Animais'>Pequenos Animais</option>
                    <option value='Exóticos'>Exóticos</option>
                    <option value='Peixes'>Peixes</option>
                </select>
            </th>
            <th><input type='number' name='telefone'></th>
            <th><button type='submit'><img src='imagens/adicionarF.png' width='50' height='50'/></button></th></form>
        </tr></table>";
    

            
        
?>
</br>
</body>

</html>