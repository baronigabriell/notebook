<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro do professor</title>
</head>
<body>
    <form action="gravar_professor.php" method="post">
        <h1>Cadastro do carrinho</h1>
        <label for="nome">Nome</label>
        <input type="text" name="pro_nome">
        <br>
        <label for="sala">Sala</label>
        <input type="text" name="pro_sala">
        <br>
        <label for="materia">Matéria</label>
        <input type="text" name="pro_materia">
        <br>
        <a href="gravar_professor.php">
            <input type="submit" value="Enviar" id="button">
        </a>
    </form>
</body>
</html>