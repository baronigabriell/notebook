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
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro do notebook</title>
</head>
<body>
    <main>
        <form action="gravar_notebook.php" method="post" class="form">
            <h1>Cadastro do notebook</h1>
            
            <div class="single-input">
            <input type="text" name="not_num" class="input" required>
                <label for="numero" class="label">Número</label>
            </div>
            <br>
            <div class="single-input">
                <input type="text" name="not_marca" class="input" required> 
                <label for="marca" class="label">Marca</label>
            </div>
            <br>
            <div class="single-input">
                <input type="text" name="not_mod" class="input" required>
                <label for="modelo" class="label">Modelo</label>
            </div>
            <br>
            <div class="single-input">
                <label for="carrinho" class="label" style="margin-bottom: 20px;">Carrinho</label>
                <select name="not_car"  required>
                    <br>
                    <option value="">Selecione o carrinho</option>
                    <?php while ($row_car = mysqli_fetch_assoc($resultado_car)) { ?>
                        <option value="<?php echo $row_car['car_numero']; ?>"><?php echo $row_car['car_numero']; ?></option>
                    <?php } ?>
                </select>
            </div>
            
            <div class="single-input">
                <input type="submit" value="Enviar" id="button" class="botao">
            </div>
        </form>
    </main>
</body>
</html>