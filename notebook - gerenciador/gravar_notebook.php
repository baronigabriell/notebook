<?php
    include "conectabanco.php";

    $not_num = $_POST["not_num"];
    $not_marca = $_POST ["not_marca"];
    $not_mod = $_POST ["not_mod"]; 
    $not_car = $_POST ["not_car"];



    echo "<br>";
    echo $not_num;
    
    echo "<br>";
    echo $not_marca;
    
    echo "<br>";
    echo $not_mod;

    echo "<br>";
    echo $not_car;


    $query = mysqli_query($conexao, "insert into notebooks (not_numero, not_marca, not_modelo, not_carrinho) values ('$not_num','$not_marca','$not_mod','$not_car');");

    echo("<br>Gravado! Deseja ir a consulta?");
    mysqli_close ($conexao);
?>