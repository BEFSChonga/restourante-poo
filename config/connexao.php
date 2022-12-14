
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $db_name ="restourante_db";

    $connet= mysqli_connect ( $servername,$username, $password,$db_name);
    if(mysqli_connect_error()):
        echo "Falha de Conexao: ".mysqli_connect_error();
    endif;
?>
