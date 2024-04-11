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
        .styled-table tbody tr td form {
            display: flex;
            justify-content: space-around;
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
        $idAnimal = isset($_POST['idAnimal']) ? $_POST['idAnimal'] : '';
        $nomeAnimal = isset($_POST['nomeAnimal']) ? $_POST['nomeAnimal'] : '';
        $especieAnimal = isset($_POST['especieAnimal']) ? $_POST['especieAnimal'] : '';
        $sexoAnimal = isset($_POST['sexoAnimal']) ? $_POST['sexoAnimal'] : '';
        $idade = isset($_POST['idade']) ? $_POST['idade'] : '';
        $cpfDono = isset($_POST['cpfDono']) ? $_POST['cpfDono'] : '';
        
        $tableName = "clinicaVet.Animal";
        $fields = "idAnimal,nomeAnimal,especieAnimal,sexoAnimal,idade,cpfDono";
        $keyField = "";
        $dbQuerySea = new DBQuery($tableName, $fields, $keyField);
        
        $condition = "1"; // Start with a default condition that is always true
        
        // Check and add conditions for each parameter if they are not empty
        if (!empty($idAnimal)) {
            $condition .= " AND idAnimal=".$idAnimal;
        }
        if (!empty($nomeAnimal)) {
            $condition .= " AND nomeAnimal='".$nomeAnimal."'";
        }
        if (!empty($especieAnimal)) {
            $condition .= " AND especieAnimal='".$especieAnimal."'";
        }
        if (!empty($sexoAnimal)) {
            $condition .= " AND sexoAnimal='".$sexoAnimal."'";
        }
        if (!empty($idade)) {
            $condition .= " AND idade=".$idade;
        }
        if (!empty($cpfDono)) {
            $condition .= " AND cpfDono='".$cpfDono."'";
        }
        
        $resultSet = $dbQuerySea->select($condition);
        
        echo "<p class='center' style='text-align: center;'>Atualizando registro da tabela Animal...</p>";
    
        echo "<table class='styled-table'><thead><tr>
            <th>idAnimal</th>
            <th>nomeAnimal</th>
            <th>especieAnimal</th>
            <th>sexoAnimal</th>
            <th>idade</th>
            <th>cpfDono</th>
            <th>AlterarDados</th>
            <th>DeletarAnimal</th>
        </tr></thead><tbody>";
    
        while ($exibe = mysqli_fetch_assoc($resultSet)) {
            echo "<tr>
                <td>".$exibe['idAnimal']."</td>
                <td>".$exibe['nomeAnimal']."</td>
                <td>".$exibe['especieAnimal']."</td>
                <td>".$exibe['sexoAnimal']."</td>
                <td>".$exibe['idade']."</td>
                <td>".$exibe['cpfDono']."</td>
                <td>
                    <form name='alterarDadosAnimal' action='atualizarAnimal.php' method='post'>
                        <input type='hidden' name='tabela' value='Animal'>
                        <input type='hidden' name='idAnimal' value=".$exibe['idAnimal'].">
                        <input type='hidden' name='nomeAnimal' value=".$exibe['nomeAnimal'].">
                        <input type='hidden' name='especieAnimal' value=".$exibe['especieAnimal'].">
                        <input type='hidden' name='sexoAnimal' value=".$exibe['sexoAnimal'].">
                        <input type='hidden' name='idade' value=".$exibe['idade'].">
                        <input type='hidden' name='cpfDono' value=".$exibe['cpfDono'].">
                        <button type='submit'><img src='imagens/modificarF.png' width='50' height='50'/></button>
                    </form>
                </td>
                <td>
                    <form name='deletarAnimal' action='deletarAnimal.php' method='post'>
                        <input type='hidden' name='tabela' value='Animal'>
                        <input type='hidden' name='idAnimal' value=".$exibe['idAnimal'].">
                        <input type='hidden' name='nomeAnimal' value=".$exibe['nomeAnimal'].">
                        <input type='hidden' name='especieAnimal' value=".$exibe['especieAnimal'].">
                        <input type='hidden' name='sexoAnimal' value=".$exibe['sexoAnimal'].">
                        <input type='hidden' name='idade' value=".$exibe['idade'].">
                        <input type='hidden' name='cpfDono' value=".$exibe['cpfDono'].">
                        <button type='submit'><img src='imagens/deletar.png'/></button>
                    </form>
                </td>
            </tr>";
        }
    
        echo "</tbody></table>";
    ?>
</body>
</html>
