<?php
$conn = mysqli_connect("localhost", "root", "", "notebook");

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $not_num = $_POST['not_num'];
    $not_marca = $_POST['not_marca'];
    $not_mod = $_POST['not_mod'];
    $not_car = $_POST['not_car'];
    $not_status = 'disponivel'; 

    $query = "INSERT INTO notebooks (not_numero, not_marca, not_modelo, not_carrinho, not_status) 
              VALUES ('$not_num', '$not_marca', '$not_mod', '$not_car', '$not_status')";

    if (mysqli_query($conn, $query)) {
        echo "Notebook cadastrado com sucesso!";
    } else {
        echo "Erro ao cadastrar o notebook: " . mysqli_error($conn);
    }

    mysqli_close($conn);
}
?>