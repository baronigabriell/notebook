<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro do carrinho</title>
</head>
<body>
    <main>
        <form action="gravar_car.php" method="post" class="form" style="margin-top: 30px;">
            <h1>Cadastro do carrinho</h1>
            <div class="single-input">
                <input type="text" name="car_num" id="car_num" class="input" required>
                <label for="numero" class="label">Número</label>
            </div>
            <br>
            <div class="single-input">
                <input type="text" name="car_volt" class="input" required>
                <label for="voltagem" class="label">Voltagem</label>
            </div>
            <br>
            <div class="single-input">
                <input type="text" name="car_cap" class="input" required>
                <label for="capacidade" class="label">Capacidade</label>
            </div>
            <br>
            <div class="single-input">
                <input type="submit" value="Enviar" id="button" class="botao">
            </div>
        </form>
    </main>
</body>
</html>
