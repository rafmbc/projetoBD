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
        $idExame = isset($_POST['idExame']) ? $_POST['idExame'] : '';
        $dataExame = isset($_POST['dataExame']) ? $_POST['dataExame'] : '';
        $horarioExame = isset($_POST['horarioExame']) ? $_POST['horarioExame'] : '';
        $tipoExame = isset($_POST['tipoExame']) ? $_POST['tipoExame'] : '';
        $observacoes = isset($_POST['observacoes']) ? $_POST['observacoes'] : '';
        $vetResponsavel = isset($_POST['vetResponsavel']) ? $_POST['vetResponsavel'] : '';
        $idAnimal = isset($_POST['idAnimal']) ? $_POST['idAnimal'] : '';
        $secretariaResponsavel = isset($_POST['secretariaResponsavel']) ? $_POST['secretariaResponsavel'] : '';
        
        $tableName = "clinicaVet.Exame";
        $fields = "idExame,dataExame,horarioExame,tipoExame,observacoes,vetResponsavel,idAnimal,secretariaResponsavel";
        $keyField = "";
        $dbQuerySea = new DBQuery($tableName, $fields, $keyField);
        
        $condition = "1"; 
        
        if (!empty($idExame)) {
            $condition .= " AND idExame=".$idExame;
        }
        if (!empty($dataExame)) {
            $condition .= " AND dataExame=".$dataExame;
        }
        if (!empty($horarioExame)) {
            $condition .= " AND horarioExame='".$horarioExame."'";
        }
        if (!empty($tipoExame)) {
            $condition .= " AND tipoExame='".$tipoExame."'";
        }
        if (!empty($observacoes)) {
            $condition .= " AND observacoes='".$observacoes."'";
        }
        if (!empty($vetResponsavel)) {
            $condition .= " AND vetResponsavel=".$vetResponsavel;
        }
        if (!empty($idAnimal)) {
            $condition .= " AND idAnimal='".$idAnimal."'";
        }
        if (!empty($secretariaResponsavel)) {
            $condition .= " AND secretariaResponsavel='".$secretariaResponsavel."'";
        }
        
        $resultSet = $dbQuerySea->select($condition);
        
        echo "<p class='center' style='text-align: center;'>Atualizando registro da tabela Exame...</p>";
    
        echo "<table class='styled-table'><thead><tr>
            <th>idExame</th>
            <th>dataExame</th>
            <th>horarioExame</th>
            <th>tipoExame</th>
            <th>observacoes</th>
            <th>vetResponsavel</th>
            <th>idAnimal</th>
            <th>secretariaResponsavel</th>
            <th>AlterarDados</th>
            <th>DeletarAnimal</th>
        </tr></thead><tbody>";
    
        while($exibe = mysqli_fetch_assoc($resultSet)){
            echo "<tr>
                <td>".$exibe['idExame']."</td>
                <td>".$exibe['dataExame']."</td>
                <td>".$exibe['horarioExame']."</td>
                <td>".$exibe['tipoExame']."</td>
                <td>".$exibe['observacoes']."</td>
                <td>".$exibe['vetResponsavel']."</td>
                <td>".$exibe['idAnimal']."</td>
                <td>".$exibe['secretariaResponsavel']."</td>
                <td>
                    <form name='alterarDadosExame' action='atualizarExame.php' method='post'>
                        <input type='hidden' name='tabela' value='Exame'>
                        <input type='hidden' name='idExame' value=".$exibe['idExame'].">
                        <input type='hidden' name='dataExame' value=".$exibe['dataExame'].">
                        <input type='hidden' name='horarioExame' value=".$exibe['horarioExame'].">
                        <input type='hidden' name='tipoExame' value=".$exibe['tipoExame'].">
                        <input type='hidden' name='observacoes' value=".$exibe['observacoes'].">
                        <input type='hidden' name='vetResponsavel' value=".$exibe['vetResponsavel'].">
                        <input type='hidden' name='idAnimal' value=".$exibe['idAnimal'].">
                        <input type='hidden' name='secretariaResponsavel' value=".$exibe['secretariaResponsavel'].">
                        <button type='submit'><img src='imagens/modificarF.png' width='50' height='50' alt='Modificar'></button>
                    </form>
                </td>
                <td>
                    <form name='deletarExame' action='deletarExame.php' method='post'>
                        <input type='hidden' name='tabela' value='Exame'>
                        <input type='hidden' name='idExame' value=".$exibe['idExame'].">
                        <input type='hidden' name='dataExame' value=".$exibe['dataExame'].">
                        <input type='hidden' name='horarioExame' value=".$exibe['horarioExame'].">
                        <input type='hidden' name='tipoExame' value=".$exibe['tipoExame'].">
                        <input type='hidden' name='observacoes' value=".$exibe['observacoes'].">
                        <input type='hidden' name='vetResponsavel' value=".$exibe['vetResponsavel'].">
                        <input type='hidden' name='idAnimal' value=".$exibe['idAnimal'].">
                        <input type='hidden' name='secretariaResponsavel' value=".$exibe['secretariaResponsavel'].">
                        <button type='submit'><img src='imagens/deletar.png' alt='Deletar'></button>
                    </form>
                </td>
            </tr>";
        }
    
        echo "</tbody></table>";
    ?>
    <br>
</body>
</html>
