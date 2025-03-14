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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro do aluno</title>
</head>
<body>
    <form action="gravar_aluno.php" method="post" class="form">
        <h1>Cadastro do aluno</h1>
        <div class="single-input">
            <label for="nome" class="label">Nome</label>
            <input type="text" name="alu_nome" class="input" required>
        </div>
        <br>
        <div class="single-input">
            <label for="sala" class="label">Sala</label>
            <input type="text" name="alu_sala" class="input" required>
        </div>
        <br>
        <div class="single-input">
            <label for="carrinho" class="label">Carrinho</label>
            <select name="alu_car" required>
                <option value="">Selecione o carrinho</option>
                <?php while ($row_car = mysqli_fetch_assoc($resultado_car)) { ?>
                    <option value="<?php echo $row_car['car_numero']; ?>"><?php echo $row_car['car_numero']; ?></option>
                <?php } ?>
            </select>
        </div>
        <br>
        <div class="single-input">
            <label for="notebook" class="label">Notebook</label>
            <select name="alu_not" required>
                <option value="">Selecione o notebook</option>
                <?php while ($row_not = mysqli_fetch_assoc($resultado_not)) { ?>
                    <option value="<?php echo $row_not['not_numero']; ?>"><?php echo $row_not['not_numero']; ?></option>
                <?php } ?>
            </select>
        </div>
        <br>
        <input type="submit" value="Cadastrar" class="botao">
    </form>
</body>
</html>
