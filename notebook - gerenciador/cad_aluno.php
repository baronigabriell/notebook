<?php
$conn = mysqli_connect("localhost", "root", "", "notebook");

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$query_car = "SELECT car_numero FROM carrinho"; 
$query_not = "SELECT not_numero FROM notebooks";

$resultado_car = mysqli_query($conn, $query_car);
$resultado_not = mysqli_query($conn, $query_not);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro do aluno</title>
</head>
<body>
    <form action="gravar_aluno.php" method="post">
        <h1>Cadastro do aluno</h1>
        <label for="nome">Nome</label>
        <input type="text" name="alu_nome" required>
        <br>
        <label for="sala">Sala</label>
        <input type="text" name="alu_sala" required>
        <br>
        <label for="carrinho">Carrinho</label>
        <select name="alu_car" required>
            <option value="">Selecione o carrinho</option>
            <?php while ($row_car = mysqli_fetch_assoc($resultado_car)) { ?>
                <option value="<?php echo $row_car['car_numero']; ?>"><?php echo $row_car['car_numero']; ?></option>
            <?php } ?>
        </select>
        <br>
        <label for="notebook">Notebook</label>
        <select name="alu_not" required>
            <option value="">Selecione o notebook</option>
            <?php while ($row_not = mysqli_fetch_assoc($resultado_not)) { ?>
                <option value="<?php echo $row_not['not_numero']; ?>"><?php echo $row_not['not_numero']; ?></option>
            <?php } ?>
        </select>
        <br>
        <input type="submit" value="Cadastrar" id="button">
    </form>
</body>
</html>
