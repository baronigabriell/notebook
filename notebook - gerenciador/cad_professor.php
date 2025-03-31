<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <title>Cadastro do professor</title>
</head>
<body>
    <main>
        <div class="form">
            <form action="gravar_professor.php" method="post" style="margin-top: 30px;">
                <h1>Cadastro do professor</h1>
                <div class="single-input">
                    <input type="text" name="pro_nome" class="input" required> 
                    <label for="nome" class="label">Nome</label>
                </div>
                <br>
                <div class="single-input">
                    <input type="text" name="pro_sala" class="input" required>
                    <label for="sala" class="label">Sala</label>
                </div>
                <br>
                <div class="single-input">
                    <input type="text" name="pro_materia" class="input" required>
                    <label for="materia" class="label">Matéria</label>
                </div>
                <br>
                <div class="single-input">
                    <input type="submit" value="Enviar" id="button" class="botao">
                </div>
            </form>
            <a href="consulta_professor">
                <button class="botao">Consultar</button>
            </a>
            </div>
    </main>
</body>
</html>
