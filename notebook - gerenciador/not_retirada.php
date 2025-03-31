<?php
$conn = mysqli_connect("localhost", "root", "", "notebook");
if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

// Buscar todas as salas
$query_salas = "SELECT DISTINCT alu_sala FROM aluno";
$resultado_salas = mysqli_query($conn, $query_salas);

// Buscar todos os carrinhos
$query_car = "SELECT car_numero FROM carrinho";
$resultado_car = mysqli_query($conn, $query_car);
?>

<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>Retirada de Notebook</title>
</head>
<body>
    <main>
        <form action="gravar_retirada.php" method="post" class="form">
            <h1>Retirada de Notebook</h1>

            <!-- Select da Sala -->
            <div class="single-input">
                <label for="sala" class="label" style="margin-bottom: 20px;">Sala</label>
                <select name="alu_sala" id="alu_sala" required>
                    <option value="">Selecione a sala</option>
                    <?php while ($row_sala = mysqli_fetch_assoc($resultado_salas)) { ?>
                        <option value="<?= $row_sala['alu_sala']; ?>"><?= $row_sala['alu_sala']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <!-- Select do Aluno -->
            <div class="single-input">
                <label for="aluno" class="label" style="margin-bottom: 20px;">Aluno</label>
                <select name="alu_nome" id="alu_nome" required>
                    <option value="">Selecione um aluno</option>
                </select>
            </div>

            <!-- Select do Carrinho -->
            <div class="single-input">
                <label for="carrinho" class="label" style="margin-bottom: 20px;">Carrinho</label>
                <select name="not_car" id="not_car" required>
                    <option value="">Selecione o carrinho</option>
                    <?php while ($row_car = mysqli_fetch_assoc($resultado_car)) { ?>
                        <option value="<?= $row_car['car_numero']; ?>"><?= $row_car['car_numero']; ?></option>
                    <?php } ?>
                </select>
            </div>

            <!-- Select do Notebook -->
            <div class="single-input">
                <label for="notebook" class="label" style="margin-bottom: 20px;">Notebook</label>
                <select name="not_num" id="not_num" required>
                    <option value="">Selecione um notebook</option>
                </select>
            </div>

            <div class="single-input">
                <input type="submit" value="Retirar" class="botao">
            </div>
        </form>
    </main>

    <script>
        $(document).ready(function() {
            // Atualizar alunos ao selecionar a sala
            $('#alu_sala').change(function() {
                var sala = $(this).val();
                $.ajax({
                    url: 'buscar_alunos.php',
                    type: 'POST',
                    data: { sala: sala },
                    success: function(response) {
                        $('#alu_nome').html(response);
                    }
                });
            });

            // Atualizar notebooks ao selecionar o carrinho
            $('#not_car').change(function() {
                var carrinho = $(this).val();
                $.ajax({
                    url: 'buscar_notebooks.php',
                    type: 'POST',
                    data: { carrinho: carrinho },
                    success: function(response) {
                        $('#not_num').html(response);
                    }
                });
            });
        });
    </script>
</body>
</html>
