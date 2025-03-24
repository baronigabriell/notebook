<?php
    $sevidor = "127.0.0.1";
    $usuario = "root";
    $senha = "";
    $bancoDados = "urna";

    $conexao = mysqli_connect($sevidor, $usuario, $senha, $bancoDados) or die ("Problemas ao conectar");

    $sql = "SELECT c.can_partido as PARTIDO, c.can_nome as CANDIDATO, COUNT(v.vot_vot) as TOTAL_DE_VOTOS
    FROM voto v, candidato c
    WHERE v.vot_vot = c.can_numero
    GROUP BY c.can_nome
    ORDER BY TOTAL_DE_VOTOS DESC";
    $result = mysqli_query($conexao, $sql);
    $totalRows = mysqli_num_rows($result);
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
    <title>Resultado de Votos</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        #resultados {
            color: black;
            border: solid 1px #363636;
            padding: 40px;
            border-radius: 20px;
            width: 500px;
            margin: 80px auto;
            display: flex;
            flex-direction: column;
            overflow-y: auto; 
        }
        .partido {
            color: #808080;
            text-align: left;
        }
        .nome-votos {
            display: flex;
            justify-content: space-between;
            align-items: baseline;
        }
        .nome-candidato {
            flex-grow: 1;
            margin-bottom: 8px;
        }
        .votos {
            min-width: 100px;
            text-align: right;
        }
        hr {
            width: 100%;
            border: solid 1px #707070;
            border-radius: 10px;
            margin-top: 10px;
            margin-bottom: 10px;
        }
        .ranking {
            padding: 5px;
            color: white;
            text-align: center;
            border-radius: 10px;
            font-size: 15px;
        }
        .ranking-1 { background-color: #0EAD69; } 
        .ranking-2 { background-color: #0EAD69; }
        .ranking-3 { background-color: #0EAD69; } 
    </style>
</head>
<header>
    <h1>APURAÇÃO</h1>
</header>
<body>
    <div id="resultados">
        <?php
        if ($totalRows > 0) {
            $contador = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $contador++;
                echo "<div class='candidato'>";
                echo "<div class='partido'>" . $row["PARTIDO"] . "</div>";
                echo "<div class='nome-votos'>";
                echo "<span class='nome-candidato'>" . $row["CANDIDATO"] . "</span>";
                echo "<span class='votos'>" . $row["TOTAL_DE_VOTOS"] . " voto(s)</span>";
                echo "</div>";
                if ($contador == 1) {
                    echo "<span class='ranking ranking-1'>1º lugar</span>";
                } elseif ($contador == 2) {
                    echo "<span class='ranking ranking-2'>2º lugar</span>";
                } elseif ($contador == 3) {
                    echo "<span class='ranking ranking-3'>3º lugar</span>";
                }

                if ($contador < $totalRows) {
                    echo "<hr>";
                }
                echo "</div>";
            }
        } 
        mysqli_close($conexao);
        ?>
    </div>
</body>
</html>