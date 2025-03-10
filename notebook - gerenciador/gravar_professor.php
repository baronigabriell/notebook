<?php
    include "conectabanco.php";

    $pro_nome = $_POST["pro_nome"];
    $pro_sala = $_POST ["pro_sala"];
    $pro_materia = $_POST ["pro_materia"];



    echo "<br>";
    echo $pro_nome;
    
    echo "<br>";
    echo $pro_sala;
    
    echo "<br>";
    echo $pro_materia;



    $query = mysqli_query($conexao, "insert into professor (pro_nome, pro_sala, pro_materia) values ('$pro_nome','$pro_sala','$pro_materia');");

    echo("<br>Gravado! Deseja ir a consulta?");
    mysqli_close ($conexao);
?>