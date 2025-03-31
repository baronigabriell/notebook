<?php
$conn = mysqli_connect("localhost", "root", "", "notebook");

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

date_default_timezone_set('America/Sao_Paulo'); // Define o fuso horário
$hora_retirada = date('H:i:s'); // Obtém a hora atual

// Exibe a hora de retirada para verificar
echo "Hora da retirada: $hora_retirada<br>";

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Recebe os dados do formulário
    $alu_nome = $_POST['alu_nome'] ?? '';
    $alu_sala = $_POST['alu_sala'] ?? '';  // Sala do aluno
    $not_car = $_POST['not_car'] ?? '';  // Carrinho
    $not_num = $_POST['not_num'] ?? '';  // Notebook

    echo "alu_nome: " . $alu_nome . "<br>";
    echo "not_car: " . $not_car . "<br>";
    echo "not_num: " . $not_num . "<br>";
    echo "hora_retirada: " . $hora_retirada . "<br>";

    // Verificar se todos os campos foram preenchidos
    if ($alu_nome && $alu_sala && $not_car && $not_num) {
        // Buscar o codigo do aluno com base no nome
        $query_alu_codigo = "SELECT alu_codigo FROM aluno WHERE alu_nome = '$alu_nome'";
        $result_alu_codigo = mysqli_query($conn, $query_alu_codigo);
        $row_alu_codigo = mysqli_fetch_assoc($result_alu_codigo);
        $alu_codigo = $row_alu_codigo['alu_codigo'];

        // Verifica se o aluno foi encontrado
        if ($alu_codigo) {
            // A consulta para inserir os dados na tabela de retiradas
            $query = "INSERT INTO retiradas (alu_codigo, alu_sala, not_car, not_num, hora_retirada) 
                      VALUES ('$alu_codigo', '$alu_sala', '$not_car', '$not_num', '$hora_retirada')";

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

// Buscar carrinhos (exemplo de consulta)
$query_car = "SELECT car_numero FROM carrinho";
$resultado_car = mysqli_query($conn, $query_car);

// Buscar alunos da sala selecionada
$alu_sala_selecionada = $_POST['alu_sala'] ?? '';
$query_alunos = "SELECT alu_nome FROM aluno WHERE alu_sala = '$alu_sala_selecionada'";
$resultado_alunos = mysqli_query($conn, $query_alunos);

// Buscar notebooks do carrinho selecionado
$not_car_selecionado = $_POST['not_car'] ?? '';
$query_notebooks = "SELECT not_numero FROM notebooks WHERE not_carrinho = '$not_car_selecionado'";
$resultado_notebooks = mysqli_query($conn, $query_notebooks);

mysqli_close($conn);
?>