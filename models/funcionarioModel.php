<?php
      interface funcionarioCrud {
        public function cadastrarFncionario();
        public function verificarUsuario();
        public function exibirFuncionarios();
        public function apagarFuncionario();
        
     }
 
 
     class funcionario implements funcionarioCrud {

        function cadastrarFncionario (){
            require '../config/connexao.php';
            session_start(); 
            $nome= $_POST['nome'];
            $apelido=$_POST['apelido'];  
            $cidade= $_POST['cidade'];
            $distrito=$_POST['distrito']; 
            $address= $_POST['address'];
            $nacionalidade= $_POST['nacionalidade'];
            $email=$_POST['email']; 
            $permissao= $_POST['permissao'];
            $usuario= $_POST['usuario'];
            $senha=$_POST['senha']; 
            $cadastro = new funcionario();
            $num= $cadastro->verificarUsuario();
            if($num> 0):
                //utilizador existente
                header('Location:../views/cadastro-fucionario.html'); 
            else:
                //utilizador nao existente
                mysqli_query ($connet,"INSERT INTO utilizador (`id`,`usuario`, `senha`, `permissao`) 
                VALUES (NULL,'$usuario','$senha','$permissao')");  
                //caregar id
                $id_utilizador= $cadastro->caregarId();
                mysqli_query ($connet,"INSERT INTO dadosfuncionario (`id`,`id_utilizador`,`nome`, `apelido`, `cidade`,`distrito`, `address`, `nacionalidade`,`email`) 
                VALUES (NULL,'$id_utilizador','$nome','$apelido','$cidade','$distrito','$address','$nacionalidade','$email')"); 
                header('Location:../views/actividades.html'); 
            endif;
            $up_dir = $path. '../assets/Img-Prod'; 
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



        function exibirFuncionarios (){
            require '../config/connexao.php';
            $sql="SELECT * FROM dadosfuncionario INNER JOIN utilizador WHERE utilizador.id=dadosfuncionario.id_utilizador;";
            $resultadosp = mysqli_query ($connet, $sql);
            while ($dadosss = mysqli_fetch_assoc($resultadosp)) {
                ?>
                <div style='background-color:rgba(13, 168,55, 0.979);  border-radius: 15px; margin-left: 10%; '>       
                    <br>    <h4>Funcionario</h4>
                           <h6> <?php echo "Nome: ".$dadosss['nome']." ".$dadosss['apelido']; ?></h6>
                            <?php echo "Noc: ".$dadosss['nacionalidade']." | |  Cidade: ".$dadosss['cidade']; ?>
                    <br>
                            <?php echo "Dist: ".$dadosss['distrito']." | | Adress: ".$dadosss['address']; ?>  
                    <br>
                             <?php echo "Perm: ".$dadosss['permissao']." | |  Email: ".$dadosss['email']; ?>
                    <br>
                    <div>
                    <form action="../controller/funcionario.php" method="POST">
                        <input class="esconde" type="text" name="apagarFuncionarioDados" value="<?php echo $dadosss['nome'];?>" style="width: 0%;">
                        <input class="esconde" type="text" name="apagarFuncionarioUser" value="<?php echo $dadosss['id_utilizador'];?>" style="width: 0%;">
                        <input type="submit" value="Apaga" name="apagarFuncionario" style="width: 20%;">
                    </form>  
                    </div>
                    <br>
                </div>
                    <hr><hr><hr>
                <?php
        }  
    }


        function apagarFuncionario (){
            require '../config/connexao.php';
            $apagarFuncionarioUser= $_POST['apagarFuncionarioUser'];  
            $apagarFuncionarioDados= $_POST['apagarFuncionarioDados']; 
            $resultados=mysqli_query ($connet,"DELETE FROM dadosfuncionario WHERE dadosfuncionario.nome='$apagarFuncionarioDados'");
            $resultado=mysqli_query ($connet,"DELETE FROM utilizador WHERE utilizador.id='$apagarFuncionarioUser'");
            return true; 

        }

    }
            
   
?>