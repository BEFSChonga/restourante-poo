<?php
    interface clienteCrud {
       public function cadastrarCliente();
       public function verificarUsuario();

    }


    class cliente implements clienteCrud {

        function cadastrarCliente (){
            require '../config/connexao.php';
            session_start();  
            $nome= $_POST['nome'];
            $apelido=$_POST['apelido'];  
            $distrito= $_POST['distrito'];
            $bairro=$_POST['bairro']; 
            $address= $_POST['address'];
            $zip=$_POST['zip']; 
            $email= $_POST['email'];
            $usuario= $_POST['usuario'];
            $senha=$_POST['senha'];  
            $cadastro = new cliente();
            $num= $cadastro->verificarUsuario();
            //verificar seo utilizador existente
            if($num> 0):
                //utilizador existente
                header('Location:../views/cadastro-booking.html'); 
            else:
                //utilizador nao existente
                mysqli_query ($connet,"INSERT INTO utilizador (`id`,`usuario`, `senha`, `permissao`) 
                VALUES (NULL,'$usuario','$senha','Cliente')");  
                $id_utilizador= $cadastro->caregarId();
                mysqli_query ($connet,"INSERT INTO dadoscliente (`id`,`id_utilizador`,`nome`, `apelido`, `distrito`,`bairro`, `address`, `zip`,`email`) 
                VALUES (NULL,'$id_utilizador','$nome','$apelido','$distrito','$bairro','$address','$zip','$email')"); 
                header('Location:../views/login-booking.html'); 
            endif;    
        }

        function apagarCliente(){

        }
         
        function verificarUsuario(){
            require '../config/connexao.php';
            $usuario= $_POST['usuario'];
            $sql="SELECT usuario FROM utilizador WHERE  utilizador.usuario='$usuario'";
            $resultado = mysqli_query ($connet, $sql);
            $n=mysqli_num_rows($resultado);
            return $n;
        }


        function caregarId(){
            require '../config/connexao.php';
            $usuario= $_POST['usuario'];
            $sql="SELECT id FROM utilizador WHERE  utilizador.usuario='$usuario'";
            $resultados = mysqli_query ($connet, $sql);
            $dados=mysqli_fetch_array($resultados);
            $id_utilizad=$dados['id'];
            return  $id_utilizad;
        }

        

    }
            

?>