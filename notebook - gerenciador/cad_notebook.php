<?php
$conn = mysqli_connect("localhost", "root", "", "notebook");

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

$query_car = "SELECT car_numero FROM carrinho"; 

$resultado_car = mysqli_query($conn, $query_car);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do notebook</title>
</head>
<body>
    <form action="gravar_notebook.php" method="post">
        <h1>Cadastro do carrinho</h1>
        <label for="numero">Número</label>
        <input type="text" name="not_num">
        <br>
        <label for="marca">Marca</label>
        <input type="text" name="not_marca">
        <br>
        <label for="modelo">Modelo</label>
        <input type="text" name="not_mod">
        <br>
        <label for="carrinho">Carrinho</label>
        <select name="not_car" required>
            <option value="">Selecione o carrinho</option>
            <?php while ($row_car = mysqli_fetch_assoc($resultado_car)) { ?>
                <option value="<?php echo $row_car['car_numero']; ?>"><?php echo $row_car['car_numero']; ?></option>
            <?php } ?>
        </select>
        <br>
        <a href="gravar_notebook.php">
            <input type="submit" value="Enviar" id="button">
        </a>
    </form>
</body>
</html>