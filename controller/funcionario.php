<?php

    require '../models/funcionarioModel.php';
       $cadastro = new funcionario();      
    if (isset($_POST['fcCadastro'])):   
      
        $cadastro->cadastrarFncionario();    
    endif;


    if (isset($_POST['apagarFuncionario'])):   
    
        $value=$cadastro->apagarFuncionario();  
        if($value){
            header('Location:../views/actividades.html'); 
        }else{
            header('Location:../views/cadastro-fucionario.php');
        }
    endif;


?>