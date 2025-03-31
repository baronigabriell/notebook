<head>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
<?php
$conn = mysqli_connect("localhost", "root", "", "notebook");

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

date_default_timezone_set('America/Sao_Paulo');
$hora_retirada = date('d/m/Y H:i:s'); 

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alu_nome = $_POST['alu_nome'] ?? '';
    $alu_sala = $_POST['alu_sala'] ?? '';  
    $not_car = $_POST['not_car'] ?? ''; 
    $not_num = $_POST['not_num'] ?? ''; 

    echo "<div class='retirada-confirmada'>";
    echo "<h1 ><b>Retirada gravada com sucesso!</b></h1>";
    echo "<p><b>Nome do aluno:</b> $alu_nome</p>";
    echo "<p><b>Sala:</b> $alu_sala</p>";
    echo "<p><b>Carro:</b> $not_car</p>";
    echo "<p><b>Número do notebook:</b> $not_num</p>";
    echo "<p><b>Hora da retirada:</b> $hora_retirada</p>";
    echo "<center>";
    echo "<br>";
    echo "<p>Deseja consultar as retiradas?</p>";
    echo "<a href='tabela_aluno.php'><input type='submit' value='Consultar' class='botao'></a>";
    echo "</center>";
    echo "</div>";


    if ($alu_nome && $alu_sala && $not_car && $not_num) {
        $query_alu_codigo = "SELECT alu_codigo FROM aluno WHERE alu_nome LIKE '$alu_nome'";
        $result_alu_codigo = mysqli_query($conn, $query_alu_codigo);

        if (!$result_alu_codigo) {
            echo "Erro na consulta: " . mysqli_error($conn);
        }

        $row_alu_codigo = mysqli_fetch_assoc($result_alu_codigo);
        if ($row_alu_codigo) {
            $alu_codigo = $row_alu_codigo['alu_codigo'];

            // Atualizando a inserção para incluir alu_nome
            $query = "INSERT INTO retiradas (alu_codigo, alu_nome, alu_sala, not_car, not_num, hora_retirada) 
                      VALUES ('$alu_codigo', '$alu_nome', '$alu_sala', '$not_car', '$not_num', '$hora_retirada')";

            if (mysqli_query($conn, $query)) {
            } else {
                echo "Erro ao registrar retirada: " . mysqli_error($conn);
            }
        } else {
            echo "Aluno não encontrado!";
        }
    } else {
        echo "Todos os campos devem ser preenchidos!";
    }
}

mysqli_close($conn);
?>
</body>
<style>
    body {
        display: flex;
        justify-content: center; 
        align-items: center; /* Centraliza verticalmente */
        height: 100vh; /* Altura da tela inteira */
        margin: 0; /* Remove margens padrão */
    }
    h1{
        color: white;
    }
    .retirada-confirmada{
        background-color: #323232;
        position: absolute;
        font-family: poppins;
        color: white;
        padding: 50px;
        border-radius: 90px;
    }
    a{
        text-decoration: none;
    }
</style>

