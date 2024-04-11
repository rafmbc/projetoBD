<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Exames por Animal</title>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
    }

    th, td {
        border: 1px solid #dddddd;
        text-align: left;
        padding: 8px;
    }

    th {
        background-color: #f2f2f2;
    }
</style>
</head>
<body>
<h1>Pesquisar Exames por Animal</h1>
    <form action="examesPorAnimal.php" method="post">
        <label for="idAnimal">Digite o ID do animal:</label>
        <input type="text" id="idAnimal" name="idAnimal">
        <input type="submit" value="Buscar Exames">
    </form>
    <hr>
<?php
    // Verifique se o ID do animal foi enviado pelo formulário
    if (isset($_POST['idAnimal'])) {
        // Obtenha o ID do animal da entrada do usuário
        $idAnimal = $_POST['idAnimal'];
        
        // Conecte-se ao banco de dados
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "clinicaVet";

        $conn = new mysqli($servername, $username, $password, $dbname);

        // Verifique a conexão
        if ($conn->connect_error) {
            die("Conexão falhou: " . $conn->connect_error);
        }

        // Consulta SQL para obter os exames do animal com o ID informado
        $stmt = $mysqli->prepare("SELECT * FROM Exame WHERE idAnimal = $idAnimal");
        if (!$stmt) {
            die("Error in prepared statement: " . $mysqli->error);
        }
        $stmt->bind_param("i", $idAnimal);

        echo "<h2>Exames do Animal ID: $idAnimal</h2>";

        if ($result->num_rows > 0) {
            echo "<table>
                    <tr>
                        <th>ID do Exame</th>
                        <th>Descrição</th>
                        <th>Data do Exame</th>
                    </tr>";
            // Exibir dados de cada exame encontrado
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>".$row["idExame"]."</td>
                        <td>".$row["descricao"]."</td>
                        <td>".$row["dataExame"]."</td>
                      </tr>";
            }
            echo "</table>";
        } else {
            echo "<p>Nenhum exame encontrado para o animal com ID $idAnimal.</p>";
        }

        // Fechar a conexão com o banco de dados
        $conn->close();
    } 
    ?>
    </body>
    </html>
 
