<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
        .styled-table {
            width: 100%;
            border-collapse: collapse;
            margin: 25px 0;
            font-size: 0.9em;
            font-family: sans-serif;
            min-width: 400px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
        }
        .styled-table thead tr th,
        .styled-table tbody tr td {
            padding: 12px 15px;
            text-align: center;
            vertical-align: middle;
            border-bottom: 1px solid #dddddd;
        }
        .styled-table tbody tr:nth-of-type(even) {
            background-color: #f3f4f6;
        }
        .styled-table tbody tr:last-of-type {
            border-bottom: 2px solid #009879;
        }
        .styled-table tbody tr td form button {
            background: none;
            border: none;
            cursor: pointer;
            padding: 0;
        }
    </style>
</head>
<body>
    <header>
        <h1><a href="telainicial.php">Clínica Veterinária PoliAnimais</a></h1>
    </header>
    <br>
    <?php
        require $_SERVER['DOCUMENT_ROOT'] . '/clinicaVet/SQL/DBQuery.class.php';
        $cpfDono = isset($_POST['cpfDono']) ? $_POST['cpfDono'] : '';
        $nome = isset($_POST['nome']) ? $_POST['nome'] : '';
        $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
        $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
        
        $tableName = "clinicaVet.Donos";
        $fields = "cpfDono,nome,telefone,endereco";
        $keyField = "";
        $dbQuerySea = new DBQuery($tableName, $fields, $keyField);
        
        $condition = "1"; 
        
        if (!empty($cpfDono)) {
            $condition .= " AND cpfDono=".$cpfDono;
        }
        if (!empty($nome)) {
            $condition .= " AND nome='".$nome."'";
        }
        if (!empty($telefone)) {
            $condition .= " AND telefone='".$telefone."'";
        }
        if (!empty($endereco)) {
            $condition .= " AND endereco='".$endereco."'";
        }
        
        $resultSet = $dbQuerySea->select($condition);
        
        echo "<p class='center' style='text-align: center;'>Atualizando registro da tabela Donos...</p>";
    
        echo "<table class='styled-table'><thead><tr>
            <th>cpfDono</th>
            <th>nome</th>
            <th>telefone</th>
            <th>endereco</th>
            <th>AlterarDados</th>
            <th>DeletarDono</th>
        </tr></thead><tbody>";
    
        while ($exibe = mysqli_fetch_assoc($resultSet)) {
            echo "<tr>
                <td>".$exibe['cpfDono']."</td>
                <td>".$exibe['nome']."</td>
                <td>".$exibe['telefone']."</td>
                <td>".$exibe['endereco']."</td>
                <td>
                    <form name='alterarDadosDono' action='atualizarDono.php' method='post'>
                        <input type='hidden' name='tabela' value='Dono'>
                        <input type='hidden' name='cpfDono' value=".$exibe['cpfDono'].">
                        <input type='hidden' name='nome' value=".$exibe['nome'].">
                        <input type='hidden' name='telefone' value=".$exibe['telefone'].">
                        <input type='hidden' name='endereco' value=".$exibe['endereco'].">
                        <button type='submit'><img src='imagens/modificarF.png' width='50' height='50' alt='Modificar'></button>
                    </form>
                </td>
                <td>
                    <form name='deletarDono' action='deletarDono.php' method='post'>
                        <input type='hidden' name='tabela' value='Dono'>
                        <input type='hidden' name='cpfDono' value=".$exibe['cpfDono'].">
                        <input type='hidden' name='nome' value=".$exibe['nome'].">
                        <input type='hidden' name='telefone' value=".$exibe['telefone'].">
                        <input type='hidden' name='endereco' value=".$exibe['endereco'].">
                        <button type='submit'><img src='imagens/deletar.png' alt='Deletar'></button>
                    </form>
                </td>
            </tr>";
        }
    
        echo "</tbody></table>";
    ?>
</body>
</html>
