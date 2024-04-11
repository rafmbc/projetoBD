<!DOCTYPE html>
<html lang="pt-BR">

<head>
    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Projeto para disciplina PCS 3621 - Banco de Dados 1</title>
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
    <h1>Projeto para disciplina PCS 3621 - Banco de Dados 1</h1>
    <p>Tema: Sistema de gerenciamento de clínica veterinária</p>
    <p>Como usar: Para utilizar, baixe o software XAMPP, dê um start no Apache e MySQL.</p>
    <p>Caso algum erro ocorra, vá até <a href="http://localhost/phpmyadmin/">http://localhost/phpmyadmin/</a> -&gt; crie uma nova db com o nome clinicaVet e rode o arquivo contido em clinicaVet.sql na pasta SQL no terminal SQL, após isso acesse <a href="http://localhost/clinicaVet/telainicial.php">http://localhost/clinicaVet/telainicial.php</a></p>
    <form action="./telaInicial.php" method="get" style='text-align: center;'>
    <button type="submit" >Voltar para começo</button>
</form>
</body>


</html>
