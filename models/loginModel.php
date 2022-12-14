<?php

interface logarCrud {
    public function login();
    
 }


 class logar implements logarCrud {

    function login(){
        require '../config/connexao.php';
        session_start();      
            $usuario= $_POST['usuario'];
            $senha=$_POST['senha'];    
            if(empty($usuario) or empty($senha)):
                return false; 
            else:   
                    $sql="SELECT usuario FROM utilizador WHERE  utilizador.usuario='$usuario'";
                    $resultado = mysqli_query ($connet, $sql);
                    $n=mysqli_num_rows($resultado);
                    if($n> 0):
                            $sql="SELECT usuario,senha,id FROM utilizador WHERE  utilizador.usuario='$usuario' AND utilizador.senha='$senha'";
                            $resultados = mysqli_query ($connet, $sql);
                            $n2=mysqli_num_rows($resultados);
                            if( $n2 == 1):
                                $dados=mysqli_fetch_array($resultados);
                                session_start();
                                $_SESSION['logado']=true;
                                $_SESSION["id_usuario"]=$dados['id'];
                                return true; 
                            else:
                                return false; 
                            endif;
                    else:
                      return false;       
                    endif;   
                
            endif;     
    }


    function tipoUsuario (){
        require '../config/connexao.php';
        $usuario= $_POST['usuario'];
        $senha=$_POST['senha']; 
        $sql="SELECT permissao FROM utilizador WHERE  utilizador.usuario='$usuario' AND utilizador.senha='$senha'";
        $resultados = mysqli_query ($connet, $sql);  
        $dadoss=mysqli_fetch_array($resultados);
        return $dadoss['permissao'];   
    }


    function tipoId (){
        require '../config/connexao.php';
        $usuario= $_POST['usuario'];
        $senha=$_POST['senha']; 
        $sql="SELECT id FROM utilizador WHERE  utilizador.usuario='$usuario' AND utilizador.senha='$senha'";
        $resultados = mysqli_query ($connet, $sql);  
        $dadoss=mysqli_fetch_array($resultados);
        return $dadoss['id'];     
    }
}

?>