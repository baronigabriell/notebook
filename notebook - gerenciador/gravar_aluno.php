<?php
    include "conectabanco.php";

    $alu_nome = $_POST["alu_nome"];
    $alu_sala = $_POST ["alu_sala"];


    echo "<br>";
    echo $alu_nome;
    
    echo "<br>";
    echo $alu_sala;

    $query = mysqli_query($conexao, "insert into aluno (alu_nome, alu_sala) values ('$alu_nome','$alu_sala');");

    echo("<br>Gravado! Deseja ir a consulta?");
    mysqli_close ($conexao);
?>