<?php 
    $sevidor = "127.0.0.1";
    $usuario = "root";
    $senha = "";
    $bancoDados = "notebook";

    $conexao = mysqli_connect($sevidor,$usuario, $senha, $bancoDados) or die ("Problemas ao conectar");
?>