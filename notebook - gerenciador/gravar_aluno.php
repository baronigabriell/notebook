<?php
    include "conectabanco.php";

    $alu_nome = $_POST["alu_nome"];
    $alu_sala = $_POST ["alu_sala"];
    $alu_car = $_POST ["alu_car"]; 
    $alu_not = $_POST ["alu_not"]; 


    echo "<br>";
    echo $alu_nome;
    
    echo "<br>";
    echo $alu_sala;
    
    echo "<br>";
    echo $alu_car;

    echo "<br>";
    echo $alu_not;

    $query = mysqli_query($conexao, "insert into aluno (alu_nome, alu_sala, alu_carrinho, alu_notebook) values ('$alu_nome','$alu_sala','$alu_car','$alu_not');");

    echo("<br>Gravado! Deseja ir a consulta?");
    mysqli_close ($conexao);
?>