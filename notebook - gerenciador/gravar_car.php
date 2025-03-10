<?php
    include "conectabanco.php";

    $car_num = $_POST["car_num"];
    $car_volt = $_POST ["car_volt"];
    $car_cap = $_POST ["car_cap"]; 



    echo "<br>";
    echo $car_num;
    
    echo "<br>";
    echo $car_volt;
    
    echo "<br>";
    echo $car_cap;


    $query = mysqli_query($conexao, "insert into carrinho (car_numero, car_voltagem, car_capacidade) values ('$car_num','$car_volt','$car_cap');");

    echo("<br>Gravado! Deseja ir a consulta?");
    mysqli_close ($conexao);
?>