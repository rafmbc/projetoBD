<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Clínica Veterinária PoliAnimais</title>
<style>
    /* Resetting default margin and padding for all elements */
    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        background-color: #F7F6BB; /* Light orange background color */
    }
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
    .container {
        flex: 1;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .grid {
        display: grid;
        grid-template-columns: repeat(3, 1fr);
        grid-gap: 20px;
    }
    .btn {
        width: 150px;
        height: 150px;
        font-size: 18px;
        font-weight: bold; 
        text-align: center;
        background-color: rgba(0, 0, 0, 0.5); 
        color: white; 
        border: 2px solid black;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .btn:hover {
        background-color: rgba(0, 0, 0, 0.7); 
    }

    .btn {
        display: flex;
        justify-content: center; 
        align-items: center; 
    }
</style>
</head>
<body>
<header>
    <h1>Clínica Veterinária PoliAnimais</a></h1>
</header>

    <div class="container">
    <div class="grid">
        <?php
        // Loop to generate 3x3 grid of square buttons
        for ($i = 1; $i <= 9; $i++) {
            switch ($i) {
                case 1:
                    echo '<a id="btn' . $i . '" class="btn" href="cadastraAnimal.php"><img src="imagens/dogPlus.png" style="width: 50px; height: 50px;">Cadastrar Animal</a>';
                    break;
                case 2:
                    echo '<a id="btn' . $i . '" class="btn" href="cadastraDono.php"><img src="imagens/personPlus.png" style="width: 50px; height: 50px;">Cadastrar Dono</a>';
                    break;
                case 3:
                    echo '<a id="btn' . $i . '" class="btn" href="marcaExame.php"><img src="imagens/examePlus.png" style="width: 50px; height: 50px;">Marcar Exame</a>';
                    break;
                case 5:
                    echo '<a id="btn' . $i . '" class="btn"><img src="imagens/paw.png" style="width: 50px; height: 50px;"></a>';
                    break;
                case 4:
                    echo '<a id="btn' . $i . '" class="btn" href="consultarExame.php"><img src="imagens/exameEdit.png" style="width: 50px; height: 50px;">Consultar/Editar Exame específico</a>';
                    break;
                case 6:
                    echo '<a id="btn' . $i . '" class="btn" href="consultarDono.php"><img src="imagens/personEdit.png" style="width: 50px; height: 50px;">Consultar/Editar Dono</a>';
                    break;
                case 7:
                    echo '<a id="btn' . $i . '" class="btn" href="consultarAnimal.php"><img src="imagens/dogEdit.png" style="width: 50px; height: 50px;">Consultar/Editar Animal</a>';
                    break;
                case 8:
                    echo '<a id="btn' . $i . '" class="btn" href="consultarFuncionarios.php"><img src="imagens/funcc.png" style="width: 40px; height: 40px;">Consultar empregados</a>';
                    break;
                case 9:
                    echo '<a id="btn' . $i . '" class="btn" href="detalhes.php"><img src="imagens/info.png" style="width: 50px; height: 50px;">Sobre Nós</a>';
                    break;
                default:
                    echo '<button id="btn' . $i . '" class="btn">Button ' . $i . '</button>';
                    break;
            }
            // Add styling for each button
            echo '<style>#btn' . $i . ' { text-align: center; }</style>';
        }
        ?>
    </div>
    </div>

</body>
</html>
