<?php
$conn = mysqli_connect("localhost", "root", "", "notebook");
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$carrinho = $_POST['carrinho'];

$query = "SELECT not_numero FROM notebooks WHERE not_carrinho = '$carrinho'";
$resultado = mysqli_query($conn, $query);

echo '<option value="">Selecione um notebook</option>';
while ($row = mysqli_fetch_assoc($resultado)) {
    echo '<option value="'.$row['not_numero'].'">'.$row['not_numero'].'</option>';
}
?>
