<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do carrinho</title>
</head>
<body>
    <form action="gravar_car.php" method="post">
        <h1>Cadastro do carrinho</h1>
        <label for="numero">Número</label>
        <input type="text" name="car_num" id="car_num">
        <br>
        <label for="voltagem">Voltagem</label>
        <input type="text" name="car_volt">
        <br>
        <label for="capacidade">Capacidade</label>
        <input type="text" name="car_cap">
        <br>
        <a href="gravar_car.php">
            <input type="submit" value="Enviar" id="button">
        </a>
    </form>
</body>
</html>