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

<div id="consCenter"><br/><form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>">
    <label for="consulta">Consultar funcionários:</label>
    <select id="consulta" name="consulta">
        <option value="">Escolha a tabela</option>
        <option value="Veterinario">Veterinario</option>
        <option value="Secretaria">Secretaria</option>
    </select>
    <input type="submit" name="procurar" value="procurar">
</form></div>

<div id="tableCons">
    <table>
        
    <?php
        require $_SERVER['DOCUMENT_ROOT'] . '/clinicaVet/SQL/DBQuery.class.php';

        $tabela = (!empty($_POST) ? $_POST['consulta'] : "");

        switch($tabela){
            case 'Veterinario':
                $tableName  = "clinicaVet.".$tabela;
                $fields     = "crmv, nomeVeterinario, tipoEspecializacao, telefone";
                $keyField   = "crmv";
                $dbquery3   = new DBQuery($tableName, $fields, $keyField);
                $resultSet  = $dbquery3->select("1 = 1");

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
                    <th>Atualizar</th>
                    <th>Deletar</th>
                </tr>";

                while($exibe = mysqli_fetch_assoc($resultSet)){
                    echo "<tr>
                            <th>".$exibe['crmv']."</th>
                            <th>".$exibe['nomeVeterinario']."</th>
                            <th>".$exibe['tipoEspecializacao']."</th>
                            <th>".$exibe['telefone']."</th>
                            <th><form name='atualizarVeterinario' action='atualizarVeterinario.php' method='post'>
                            <input type='hidden' name='tabela' value='Veterinario'>
                            <input type='hidden' name='crmv' value=".$exibe['crmv'].">
                            <input type='hidden' name='nomeVeterinario' value=".$exibe['nomeVeterinario'].">
                            <input type='hidden' name='tipoEspecializacao' value=".$exibe['tipoEspecializacao'].">
                            <input type='hidden' name='telefone' value=".$exibe['telefone'].">
                            <button type='submit'><img src='imagens/modificarF.png' width='50' height='50'/></button></form></th>
                            <th><form name='deletarVeterinario' action='deletarVeterinario.php' method='post'>
                            <input type='hidden' name='tabela' value='Veterinario'>
                            <input type='hidden' name='crmv' value=".$exibe['crmv'].">
                            <input type='hidden' name='nomeVeterinario' value=".$exibe['nomeVeterinario'].">
                            <input type='hidden' name='tipoEspecializacao' value=".$exibe['tipoEspecializacao'].">
                            <input type='hidden' name='telefone' value=".$exibe['telefone'].">
                            <button type='submit'><img src='imagens/deletar.png'/></button></form></th>
                        </tr>";
                }
                echo "</table>";
                echo "<div class='center'><form name='cadastrarVeterinario' action='cadastrarVeterinario.php' method='post'>
                <input type='hidden' name='tabela' value='".$tabela."'>
                <button type='submit'><img src='imagens/adicionarF.png' width='50' height='50'/></button></form></div>";
                break;
            case 'Secretaria':
                $tableName  = "clinicaVet.".$tabela;
                $fields     = "idSecretaria, nomeSecretaria, telefoneSecretaria";
                $keyField   = "idSecretaria";
                $dbquery3   = new DBQuery($tableName, $fields, $keyField);
                $resultSet  = $dbquery3->select("1 = 1");

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
                    <th>idSecretaria</th>
                    <th>nomeSecretaria</th>
                    <th>telefoneSecretaria</th>
                    <th>Atualizar</th>
                    <th>Deletar</th>
                </tr>";

                while($exibe = mysqli_fetch_assoc($resultSet)){
                    echo "<tr>
                            <th>".$exibe['idSecretaria']."</th>
                            <th>".$exibe['nomeSecretaria']."</th>
                            <th>".$exibe['telefoneSecretaria']."</th>
                            <th><form name='atualizarSecretaria' action='atualizarSecretaria.php' method='post'>
                            <input type='hidden' name='tabela' value='Secretaria'>
                            <input type='hidden' name='idSecretaria' value=".$exibe['idSecretaria'].">
                            <input type='hidden' name='nomeSecretaria' value=".$exibe['nomeSecretaria'].">
                            <input type='hidden' name='telefoneSecretaria' value=".$exibe['telefoneSecretaria'].">
                            <button type='submit'><img src='imagens/modificarF.png' width='50' height='50'/></button></form></th>
                            <th><form name='deletarSecretaria' action='deletarSecretaria.php' method='post'>
                            <input type='hidden' name='tabela' value='Secretaria'>
                            <input type='hidden' name='idSecretaria' value=".$exibe['idSecretaria'].">
                            <input type='hidden' name='nomeSecretaria' value=".$exibe['nomeSecretaria'].">
                            <input type='hidden' name='telefoneSecretaria' value=".$exibe['telefoneSecretaria'].">
                            <button type='submit'><img src='imagens/deletar.png'/></button></form></th>
                        </tr>";
                }
                echo "</table>";
                echo "<div class='center'><form name='cadastrarSecretaria' action='cadastrarSecretaria.php' method='post'>
                <input type='hidden' name='tabela' value='".$tabela."'>
                <button type='submit'><img src='imagens/adicionarF.png' width='50' height='50'/></button></form></div>";
                break;
        }
    ?>
        
    <br/>
</div>

</body>

</html>