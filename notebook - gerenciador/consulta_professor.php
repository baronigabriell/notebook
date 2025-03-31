<?php 
include "conectabanco.php"; 

$busca = '';

if (!empty($_POST['pro_nome'])) {
    $busca = $_POST['pro-nome'];
}
?>
<html>
<head>
    <title>Consulta professor</title>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div>
        <form method="POST" action="" style="width: 100%; display: flex; justify-content: center;">
            <div class="box" style="width: 32%; bottom: 0;">
                <div class="single-input">
                    <input type="text" id="alu_nome" name="alu_nome" class="input"  required>
                    <label for="alu_nomex" class="label">Nome do professor</label>
                    <button type="submit" class="pesquisar" style="color: #42d874">
                        @
                    </button>
                </div>
                <?php
                if (!empty($busca)) {
                    echo "<table>";
                    echo "<div>";
                    echo "<tr><th>Nome</th><th>Sala</th><th>Matéria</th></tr>";
                    $query = mysqli_query($conexao, "SELECT pro_nome, pro_sala, pro_materia FROM professor WHERE pro_nome LIKE '%$busca%' GROUP BY 1");
                    if (mysqli_num_rows($query) > 0) {
                        while ($saida = mysqli_fetch_array($query)) {
                            $pro_nome = $saida['pro_nome'];
                            $pro_sala = $saida['pro_sala'];
                            $pro_materia = $saida['pro_materia'];
                            echo "<tr>";
                            echo "<tr>";
                            echo "<td class='titulo'>" . htmlspecialchars($pro_nome) . "</td>";
                            echo "<td class='titulo'>" . htmlspecialchars($pro_sala) . "</td>";
                            echo "<td class='titulo'>" . htmlspecialchars($pro_materia) . "</td>";
                        }
                    } else {
                        echo "<tr><td colspan='5'>Nenhum registro encontrado.</td></tr>";
                    }
                    mysqli_close($conexao);
                    echo "</table>";
                    echo "</div>";
                }
                ?>
            </div>
        </form>
    </div>
</body>
<style>
    body {
        position: relative;
    }
    form {
        margin: 0 0 0;
    }
    div.single-input {
        position: relative;
    }
    div.single-input .input {
        background-color: #323232;
        border-bottom: 2px solid white;
        width: 100%;
        color: white;
        position: relative;
        font-family: poppins;
    }
    div.single-input .label {
        color: white;
        font-family: poppins;
    }
    .box {
        justify-content: space-between;
        background-color: #323232;
        padding: 30px 45px;
        border-radius: 40px 40px 0 0;
        height: 500px;
        align-self: flex-start;
        position: absolute;
        bottom: 0;
        color: black;
    }
    form .pesquisar {
        position: absolute;
        right: 0;
        width: 20px;
        height: 20px;
        padding: 0 0;
        background: transparent;
        border: none;
        cursor: pointer;
        z-index: 1;
        margin: 0 0 0;
    }
    .lupa {
        max-width: 20px;
        max-height: 20px;
        width: auto;
        height: auto;
    }
    .resultado {
        margin-top: 20px;
        padding: 10px;
        background-color: #42d874;
        border-radius: 10px;
        color: black;
        text-align: center;
    }
    table {
        width: 100%;
        margin-top: 20px;
        border-collapse: collapse;
    }
    table th, table td {
        padding: 8px;
        color: white;
        font-family: poppins;
    }
    table th {
        background-color: #42d874;
        text-align: left;
        color: #323232;
        font-family: poppins;
    }
    .deleteButton {
        width: 40px;
        height: 40px;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        gap: 3px;
        background-color: transparent !important;
        border: none;
        border-radius: 8px;
        cursor: pointer;
        transition: all 0.2s;
        position: relative;
        overflow: hidden;
    }
    .deleteButton svg {
        width: 44%;
    }
    .deleteButton:hover {
        background-color: rgb(237, 56, 56) !important;
    }
    .bin path {
        transition: all 0.2s;
    }
    .deleteButton:hover .bin path {
        fill: #fff;
    }
    .deleteButton:active {
        transform: scale(0.98);
    }
    .tooltip {
        --tooltip-color: rgb(41, 41, 41);
        position: absolute;
        top: -40px;
        background-color: var(--tooltip-color);
        color: white;
        border-radius: 5px;
        font-size: 12px;
        padding: 8px 12px;
        font-weight: 600;
        box-shadow: 0px 10px 10px rgba(0, 0, 0, 0.105);
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        transition: all 0.5s;
    }
    .tooltip::before {
        position: absolute;
        width: 10px;
        height: 10px;
        transform: rotate(45deg);
        content: "";
        background-color: var(--tooltip-color);
        bottom: -10%;
    }
    .deleteButton:hover .tooltip {
        opacity: 1;
    }
    
    .container input {
        position: absolute;
        opacity: 0;
        cursor: pointer;
        height: 0;
        width: 0;
    }
    .container {
        display: block;
        position: relative;
        cursor: pointer;
        user-select: none;
        padding: 10px 10px;
        border-radius: 8px;
        transition: all 0.2s;
    }
    .container:hover {
        background-color: #2196F3;
    }
    svg {
        position: relative;
        top: 0;
        left: 0;
        height: 20px;
        width: 20px;
        transition: all 0.3s;
        fill: #666;
    }
    .container:hover #Glyph{
        fill: #fff;
        transform: scale(1.1) rotate(-10deg);
    }
    .container input:checked ~ svg {
        fill: #2196F3;
    }
</style>
</html>