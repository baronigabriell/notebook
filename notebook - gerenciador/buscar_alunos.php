<?php
$conn = mysqli_connect("localhost", "root", "", "notebook");
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$sala = $_POST['sala'];

$query = "SELECT alu_nome FROM aluno WHERE alu_sala = '$sala'";
$resultado = mysqli_query($conn, $query);

echo '<option value="">Selecione um aluno</option>';
while ($row = mysqli_fetch_assoc($resultado)) {
    echo '<option value="'.$row['alu_nome'].'">'.$row['alu_nome'].'</option>';
}
?>
