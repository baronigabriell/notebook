

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link rel="stylesh
    eet" href="../css/style.css">
    <style>
        body {
            font-family: 'Poppins', sans-serif;
        }
        #resultados {
            color: white;
            background-color: #323232;
            width: 980px;
            margin: 80px auto;
            display: flex;
            flex-direction: column;
            overflow-y: auto; 
        }
        table {
            width: 100%; 
            border-collapse: collapse; 
        }

        th, td {
            border: 1px solid #323232;
            padding: 8px; 
            text-align: left; 
        }

        th {
            background-color: #42d874; 
            color:  #323232;
        }
        #botao-retirada{
            font-family: poppins;
            font-size: 15px;
            background-color: #323232;
            border-radius: 10px;
            border: 1px solid white;
            color: white;
        }
        #botao-retirada:hover{
            background-color: #42d874;
            border: 1px solid #42d874;
            color: white;
            cursor: pointer;
            transition: all 0.2s ease-in;
        }
        #botao-retirada:not(:hover){
            background-color: #323232;
            transition: all 0.2s ease-in;
        }
    </style>
</head>

<?php
$conn = mysqli_connect("localhost", "root", "", "notebook");

if (!$conn) {
    die("Falha na conexão: " . mysqli_connect_error());
}

date_default_timezone_set('UTC');

$query_retiradas = "SELECT retirada_id, alu_codigo, alu_nome, alu_sala, not_car, not_num, hora_retirada, hora_devolucao FROM retiradas";
$resultado_retiradas = mysqli_query($conn, $query_retiradas);

if (isset($_POST['devolver'])) {
    $retirada_id = $_POST['retirada_id'];
    $hora_devolucao = date('d/m/Y H:i:s', strtotime('-3 hours')); 

    $query_devolucao = "UPDATE retiradas SET hora_devolucao = '$hora_devolucao' WHERE retirada_id = '$retirada_id'";
    
    if (mysqli_query($conn, $query_devolucao)) {
        echo "Devolução registrada com sucesso!";
    } else {
        echo "Erro ao registrar devolução: " . mysqli_error($conn);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Retiradas Registradas</title>
</head>
<body>
    <main>
        <br>
        <table id="resultados">
            <tr>
                <th>Hora da retirada</th>
                <th>Nome do ano</th>
                <th>Sala</th>
                <th>Carro</th>
                <th>Número do notebook</th>
                <th>Hora da <datalist></datalist>evolução</th>
                <th>Devolução</th>
            </tr>
            <?php while ($row = mysqli_fetch_assoc($resultado_retiradas)): ?>
            <tr>
                <td><?php echo $row['hora_retirada']; ?></td>
                <td><?php echo $row['alu_nome']; ?></td>
                <td><?php echo $row['alu_sala']; ?></td>
                <td><?php echo $row['not_car']; ?></td>
                <td><?php echo $row['not_num']; ?></td>
                <td><?php echo $row['hora_devolucao'] ?? 'Não devolvido'; ?></td>
                <td>
                    <form action="" method="post">
                        <input type="hidden" name="retirada_id" value="<?php echo $row['retirada_id']; ?>">
                        <input type="submit" name="devolver" id="botao-retirada" value="Registrar devolução">
                    </form>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </main>
</body>
</html>

<?php
mysqli_close($conn);
?>

