<?php

    require '../models/clienteModel.php';
           
    if (isset($_POST['clValidar'])):   

        $cadastro = new cliente();
        $cadastro->cadastrarCliente();    
    endif;

 


?>