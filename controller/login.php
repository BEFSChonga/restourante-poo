<?php
  require '../models/loginModel.php';


// validacao do log-in do funcionario 
if (isset($_POST['validar'])):
    $loga = new logar();
    $valor = $loga->login();
    if($valor){
        if($loga->tipoUsuario()!="Cliente"){
            header('Location:../views/actividades.html');
         }else{
             header('Location:../views/login-gestao.html');
         } 
    }else{

        header('Location:../views/login-gestao.html'); 
    }
endif;  

// validacao do log-in do cliente 
if (isset($_POST['validarCl'])):
    $loga = new logar();
    $valor = $loga->login();
    if($valor){
        if($loga->tipoUsuario()=="Cliente"){
           header('Location:../views/booking.php');
        }else{
            header('Location:../views/login-booking.html');
        }   
    }else{
        header('Location:../views/login-booking.html'); 
    }
endif; 
       
?>