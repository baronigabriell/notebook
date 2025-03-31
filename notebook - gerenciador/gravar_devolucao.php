<?php
$conn = mysqli_connect("localhost", "root", "", "notebook");

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

date_default_timezone_set('America/Sao_Paulo');
$hora_retirada = date('H:i:s');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $alu_nome = $_POST['alu_nome'] ?? '';
    $alu_sala = $_POST['alu_sala'] ?? '';
    $not_car = $_POST['not_car'] ?? '';
    $not_num = $_POST['not_num'] ?? '';

    if ($alu_nome && $alu_sala && $not_car && $not_num) {
        $query_alu_codigo = "SELECT alu_codigo FROM aluno WHERE alu_nome = '$alu_nome'";
        $result_alu_codigo = mysqli_query($conn, $query_alu_codigo);
        $row_alu_codigo = mysqli_fetch_assoc($result_alu_codigo);
        $alu_codigo = $row_alu_codigo['alu_codigo'];

        if ($alu_codigo) {
            $query = "INSERT INTO retiradas (alu_codigo, alu_nome, alu_sala, not_car, not_num, hora_retirada) 
                      VALUES ('$alu_codigo', '$alu_nome', '$alu_sala', '$not_car', '$not_num', '$hora_retirada')";

            if (mysqli_query($conn, $query)) {
                echo "Retirada registrada com sucesso!";
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
