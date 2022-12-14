<?php

interface produtoCrud {
    public function cadastrarProdutos();
    public function verificarProduto();
    public function caregarImagem();
    public function exibirProdutos();

    
 }


 class Produto  implements produtoCrud{
      
        function cadastrarProdutos (){
            require '../config/connexao.php'; 
            $nome= $_POST['nome'];
            $codigo=$_POST['codigo'];  
            $categoria= $_POST['categoria'];
            $preco=$_POST['preco']; 
            $descricao= $_POST['descricao'];
            $quantidades= $_POST['quantidades'];
            //verificar se o nome do produto existe
            $cadastro = new produto();
            $num= $cadastro->verificarProduto();
            if($num> 0):
                //produto existente
                return false;
            else:  
                $nomeFicheiro=$cadastro->caregarImagem();
                    //verificar se a imagem foi caregada
                if($nomeFicheiro!="false"){                  
                    mysqli_query ($connet,"INSERT INTO produtos (`id`,`nome`,`codigo`, `categoria`, `preco`,`descricao`, `quantidades`, `nomeFicheiro`) 
                    VALUES (NULL,'$nome','$codigo','$categoria','$preco','$descricao','$quantidades','$nomeFicheiro')"); 
                    return true;
                }else{
                    return false;
                }
                //utilizador nao existente             
            endif;
        }

         
        function verificarProduto(){
            require '../config/connexao.php';
            $nome= $_POST['nome'];
            $sql="SELECT nome FROM produtos WHERE  produtos.nome='$nome'";
            $resultado = mysqli_query ($connet, $sql);
            $n=mysqli_num_rows($resultado);
            return $n;
        }

        
        function caregarImagem (){
            $nome= $_POST['nome'];
            $target_dir = "../assets/Img-Prod/";
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            $fileName = $nome.date('Ymd').'_' . time() . '-'.'.' . $imageFileType; ///add
            echo $fileName;
            // ver se a imagem eh verdadeira
            if(isset($_POST["submit"])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                // "Ficheiro nao eh imagem.";
                return "false";
                $uploadOk = 0;
            }
            }

            // ver espaco
            if ($_FILES["fileToUpload"]["size"] > 50000000) {
                    return "false";
            $uploadOk = 0;
            }

            // formatos permitidos
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
            && $imageFileType != "gif" ) {
                return "false";
            $uploadOk = 0;
            }
            // ver se pode ser caregado
            if ($uploadOk == 0) {
                echo "Sorry, your file was not uploaded.";
                return "false";
            // caregar a img
            } else {
                if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_dir.$fileName)) {
                    return $fileName;
                } else {
                    //"Sorry, teve um problema;
                    return "false";
                }
            }
        }


        function exibirProdutos (){
                    require '../config/connexao.php';
                    $sql="SELECT * FROM produtos;";
                    $resultadospp = mysqli_query ($connet, $sql);
                    while ($dadosss = mysqli_fetch_assoc($resultadospp)) {                    
                        ?>
                        <div style='background-color:#0f172b;  border-radius: 15px; margin-left: 10%; '>       
                            <br>
                                   <h2 style='color:white;'> <?php echo $dadosss['codigo']." | ".$dadosss['nome']; ?></h2>
                                    <?php echo $dadosss['categoria']." | ".$dadosss['preco']." Mt"; ?>
                            <br>
                                    <img src="../assets/Img-Prod/<?php echo $dadosss['nomeFicheiro'];?>" alt="" style="width: 15%; hieght: 50px;">         
                            <br>
                                    <?php echo $dadosss['descricao']; ?>
                            <br>
                            <div>
                            <form action="../controller/produto.php" method="POST">
                                <input class="esconde" type="text" name="apagarProdutoInput" value="<?php echo $dadosss['id'];?>" style="width: 0%;">
                                <input type="submit" value="Apaga" name="apagarPoduto" style="width: 20%;">
                            </form>  
                            </div>
                            <br>
                        </div>
                            <hr>
                        <?php
                    }           
        }


        function apagarProduto (){
            require '../config/connexao.php';
            $apagarPoduto= $_POST['apagarProdutoInput'];         
            $resultados=mysqli_query ($connet,"DELETE FROM produtos WHERE produtos.id='$apagarPoduto'");
                return true;  
        }


    }






    class Vendas extends Produto{

               //////////
         // produtos na carinha operacoes de compra, vendas
        // function exibirProdutosParaVendaCaixa 
        function exibirProdutos(){
            require '../config/connexao.php';
            $sql="SELECT * FROM produtos;";
            $resultadospp = mysqli_query ($connet, $sql);
            while ($dadosss = mysqli_fetch_assoc($resultadospp)) {            
                ?>
                <div style='background-color:#0f172b;  border-radius: 15px; margin-left: 10%; color:white;'>       
                    <br>
                           <h4 style='color:white;'> <?php echo $dadosss['codigo']." | ".$dadosss['nome']; ?></h4>         
                    <br>
                            <img src="../assets/Img-Prod/<?php echo $dadosss['nomeFicheiro'];?>" alt="" style="width: 15%; hieght: 50px;">
                            <?php echo $dadosss['categoria']." | ".$dadosss['preco']." Mt"; ?>
                            <?php echo $dadosss['descricao']; ?> 
                    <div>
                    <form action="../controller/produto.php" method="POST">
                        <input class="esconde" type="text" name="anexarProdutoId" value="<?php echo $dadosss['id'];?>" style="width: 0%;">
                        <input type="number" value="1" name="quantidades" >
                        <input type="submit" value="Anexar na Carinha" name="anexarPodutoVenda" style="width: 15%;">
                    </form>  
                    </div>
                    <br>
                </div>
                    <hr>
                <?php
            }

   
        }

              /////////////////
        //anexar para venda
        //function anexarProdutoCompra ()
        function anexarVendas (){
            require '../config/connexao.php';
            //session_start(); 
            $anexarProdutoId= $_POST['anexarProdutoId']; 
            $quantidades = $_POST["quantidades"];
            $dataTempo= date('Y-m-d').'_' . time();
            $resultads= mysqli_query ($connet,"INSERT INTO vendas (`id`,`anexarProdutoId`,`quantidades`, `dataTempo`,`estado`) 
            VALUES (NULL,'$anexarProdutoId','$quantidades','$dataTempo','Na Carimha')"); 
               // return  $id_usuario; 
        }
       
   

        //////////////////////////
        //carinha para Vendas 
       // function exibirProdutosDaCarinhaVendas ()
        function exibirProdutosDaCarinha(){
            //session_start();
            require '../config/connexao.php';
           // $id_usuario = $_SESSION["id_usuario"];
      
            $sql="SELECT * FROM vendas INNER JOIN produtos ON produtos.id=vendas.anexarProdutoId WHERE vendas.estado='Na Carimha'; ";/* WHERE encomenda.id_usuario='$id_usuario';";*/
            $resultadospp = mysqli_query ($connet, $sql);
          
            while ($dadosss = mysqli_fetch_assoc($resultadospp)) {
                ?>
                <div style='background-color:orange;  border-radius: 15px; margin-left: 10%; '>       
                    <br>
                           <h4> <?php echo $dadosss['codigo']." | | ".$dadosss['nome']; ?></h4>
                            <?php echo $dadosss['categoria']." | | ".$dadosss['preco']." Mt"." | | Unidades:".$dadosss['quantidades']."<br>"; ?>
                  
                            <?php echo $dadosss['descricao']; ?>
                    <br>
                    <div>
                    <form action="../controller/produto.php" method="POST">
                        <input class="esconde" type="text" name="apagarAnexoProdutoId" value="<?php echo $dadosss['dataTempo'];?>" style="width: 0%;">
                        <input type="submit" value="Apagar" name="apagarAnexoVendas" style="width: 20%;">
                    </form>  
                    </div>
                    <br>
                </div>
                  <br>
                <?php
            }

           
        }

            //////////////////////
          //apagarAnexoProdutoId na carinha de venda
          //function apagarProdutoAnexoVendas ()
          function apagarAnexoProduto(){
            require '../config/connexao.php';
            $apagarAnexoProdutoId= $_POST['apagarAnexoProdutoId'];         
            $resultados=mysqli_query ($connet,"DELETE FROM vendas WHERE vendas.dataTempo='$apagarAnexoProdutoId'");
                return true; 
        }

        ////////////////////////
        //finalizarr a compra, vendas
        function efectuarCompra (){
            require '../config/connexao.php';
            $resultados=mysqli_query ($connet,"UPDATE vendas SET `estado`='Processado' WHERE vendas.`estado`='Na Carimha'");
           // return true; 

        }

         //vendas 
        function vender (){
            require '../config/connexao.php';
            $anexarProdutoId= $_POST['anexarProdutoId']; 
            $quantidades = $_SESSION["quantidades"];
            $dataTempo= date('Y-m-d').'_' . time();
            $resultads= mysqli_query ($connet,"INSERT INTO vendas (`id`,`anexarProdutoId`,`quantidades`, `dataTempo`,`estado`) 
            VALUES (NULL,'$anexarProdutoId','$quantidades','$dataTempo','Na Carimha')");  
        }




          // O funcionario pode ver os seu produtos vendidos
    function exibirProdutosVendidos(){
        //session_start();
        require '../config/connexao.php';
       // $id_usuario = $_SESSION["id_usuario"];
  
        $sql="SELECT * FROM vendas INNER JOIN produtos ON produtos.id=vendas.anexarProdutoId WHERE vendas.estado='Processado';";/* WHERE encomenda.id_usuario='$id_usuario';";*/
        $resultadosppp = mysqli_query ($connet, $sql);
      
        while ($dadossss = mysqli_fetch_assoc($resultadosppp)) {
            ?>
            <div style='background-color:orange;  border-radius: 15px; margin-left: 10%; '>       
                <br>
                       <h4> <?php echo $dadossss['codigo']." | | ".$dadossss['nome']; ?></h4>
                        <?php echo $dadossss['categoria']." | | ".$dadossss['preco']." Mt"; ?>
              
                        <?php echo $dadossss['descricao']; ?>
                <br>
              
                <br>
            </div>
              <br>
            <?php
        }
   }
}















class Ecomendas extends Produto{
    
    // produtos na carinha operacoes de compra, 
   // function exibirProdutosParaCompra ()
    function exibirProdutos(){
        require '../config/connexao.php';
        $sql="SELECT * FROM produtos;";
        $resultadospp = mysqli_query ($connet, $sql);
        while ($dadosss = mysqli_fetch_assoc($resultadospp)) {            
            ?>
            <div style='background-color:#0f172b;  border-radius: 15px; margin-left: 10%; color:white;'>       
                <br>
                       <h4 style='color:white;'> <?php echo $dadosss['codigo']." | ".$dadosss['nome']; ?></h4>         
                <br>
                        <img src="../assets/Img-Prod/<?php echo $dadosss['nomeFicheiro'];?>" alt="" style="width: 15%; hieght: 50px;">
                        <?php echo $dadosss['categoria']." | ".$dadosss['preco']." Mt"; ?>
                        <?php echo $dadosss['descricao']; ?> 
                <div>
                <form action="../controller/produto.php" method="POST">
                    <input class="esconde" type="text" name="anexarProdutoId" value="<?php echo $dadosss['id'];?>" style="width: 0%;">
                    <input type="submit" value="Anexar na Carinha" name="anexarPoduto" style="width: 15%;">
                </form>  
                </div>
                <br>
            </div>
                <hr>
            <?php
        }


    }
      

   //function anexarProdutoCarinha() 
   function anexarEcomendas(){
        require '../config/connexao.php';
        session_start(); 
        $anexarProdutoId= $_POST['anexarProdutoId']; 
        $id_usuario = $_SESSION["id_usuario"];
        $dataTempo= date('Y-m-d').'_' . time();
        $resultads= mysqli_query ($connet,"INSERT INTO pedidos (`id`,`anexarProdutoId`,`id_usuario`, `dataTempo`,`estado`) 
        VALUES (NULL,'$anexarProdutoId','$id_usuario','$dataTempo','Pendente')"); 
            return  $id_usuario; 
    }

    //apagarAnexoProdutoId
    //function apagarProdutoAnexo ()
    function apagarAnexoEncomendas(){
        require '../config/connexao.php';
        $apagarAnexoProdutoId= $_POST['apagarAnexoProdutoId'];         
        $resultados=mysqli_query ($connet,"DELETE FROM pedidos WHERE pedidos.dataTempo='$apagarAnexoProdutoId'");
            return true; 
    }
    function exibirProdutosDaCarinha (){
        //session_start();
        require '../config/connexao.php';
       // $id_usuario = $_SESSION["id_usuario"];
  
        $sql="SELECT * FROM pedidos INNER JOIN produtos ON produtos.id=pedidos.anexarProdutoId;";/* WHERE encomenda.id_usuario='$id_usuario';";*/
        $resultadospp = mysqli_query ($connet, $sql);
      
        while ($dadosss = mysqli_fetch_assoc($resultadospp)) {
            ?>
            <div style='background-color:orange;  border-radius: 15px; margin-left: 10%; '>       
                <br>
                       <h4> <?php echo $dadosss['codigo']." | | ".$dadosss['nome']; ?></h4>
                        <?php echo $dadosss['categoria']." | | ".$dadosss['preco']." Mt"; ?>
              
                        <?php echo $dadosss['descricao']; ?>
                <br>
                <div>
                <form action="../controller/produto.php" method="POST">
                    <input class="esconde" type="text" name="apagarAnexoProdutoId" value="<?php echo $dadosss['dataTempo'];?>" style="width: 0%;">
                    <input type="submit" value="Apagar" name="apagarAnexo" style="width: 20%;">
                </form>  
                </div>
                <br>
            </div>
              <br>
            <?php
        }
    }

        // encomendados
        //function GravarProdutosEncomendados ()
        function efectuarEncomendados (){
            //session_start();
             require '../config/connexao.php';
             //$id_usuario = $_SESSION["id_usuario"];
       
             $sql="SELECT * FROM pedidos INNER JOIN produtos ON produtos.id=pedidos.anexarProdutoId;";/* WHERE encomenda.id_usuario='$id_usuario';";*/
             $resultadospp = mysqli_query ($connet, $sql);
             $i=0;
              require '../config/connexao.php';
             while ($dadosss = mysqli_fetch_assoc($resultadospp)) {
                if($i==0){
                    //session_start(); 
                   $id_usuario = $dadosss['id_usuario'];
                    $data= $_POST["data"]; 
                    $tempo = $_POST["tempo"];
                    $pedidoEspecial = $_POST["pedidoEspecial"];
                    $resultads= mysqli_query ($connet,"INSERT INTO encomenda (`id`,`id_usuario`,`data`, `tempo`,`pedidoEspecial`,`estado`) 
                    VALUES (NULL,'$id_usuario','$data','$tempo','$pedidoEspecial','Enviado')"); 
                    
                    $i++;
                }

                 ?>
                 <div >       
                        <?php   
                                $id_usuario= $dadosss['id_usuario']; 
                                $nome= $dadosss['nome'];
                                $codigo=$dadosss['codigo'];  
                                $categoria= $dadosss['categoria'];
                                $preco=$dadosss['preco']; 
                                $descricao= $dadosss['descricao'];
                            
                                //inserir fados na tabela vendas
                                mysqli_query ($connet,"INSERT INTO encomendados (`id`,`id_usuario`,`nome`,`codigo`, `categoria`, `preco`,`descricao`, `formaCompra`) 
                                VALUES (NULL,'$id_usuario','$nome','$codigo','$categoria','$preco','$descricao','Encomenda')"); 
                        
                        ?>
                 </div>
                 <?php
             }
             
            mysqli_query ($connet,"TRUNCATE `restourante_db`.`pedidos`");
            
         }
 

        
     // O cliente pode ver os seu produtos ecomendados
    function exibirProdutosEncomendados(){
        //session_start();
        require '../config/connexao.php';
       // $id_usuario = $_SESSION["id_usuario"];
  
        $sql="SELECT * FROM `encomendados`;";/* WHERE encomenda.id_usuario='$id_usuario';";*/
        $resultadosppp = mysqli_query ($connet, $sql);
      
        while ($dadossss = mysqli_fetch_assoc($resultadosppp)) {
            ?>
            <div style='background-color:orange;  border-radius: 15px; margin-left: 10%; '>       
                <br>
                       <h4> <?php echo $dadossss['codigo']." | | ".$dadossss['nome']; ?></h4>
                        <?php echo $dadossss['categoria']." | | ".$dadossss['preco']." Mt"; ?>
              
                        <?php echo $dadossss['descricao']; ?>
                <br>
              
                <br>
            </div>
              <br>
            <?php
        }

   }
}
   
   




class CozinhaInf {
        function exibirProdutosEncomendados(){
        //session_start();
        require '../config/connexao.php';
       // $id_usuario = $_SESSION["id_usuario"];
  
        $sql="SELECT * FROM `encomendados` WHERE encomendados.formaCompra='Encomenda';";
        $resultadosppp = mysqli_query ($connet, $sql);
      
        while ($dadossss = mysqli_fetch_assoc($resultadosppp)) {
            ?>
            <div style='background-color:orange;  border-radius: 15px; margin-left: 10%; '>       
                <br>
                       <h4> <?php echo $dadossss['codigo']." | | ".$dadossss['nome']; ?></h4>
                        <?php echo $dadossss['categoria']." | | ".$dadossss['preco']." Mt"; ?>
              
                        <?php echo $dadossss['descricao']; ?>
                <br>
                <div>
                <form action="../controller/produto.php" method="POST">
                    <input class="esconde" type="text" name="idEncomenda" value="<?php echo $dadosss['id'];?>" style="width: 0%;">
                    <input type="submit" value="Preparado" name="apagarInfEncomend" style="width: 20%;">
                </form>  
                </div>
              
                <br>
            </div>
              <br>
            <?php
        }
    }
    
    function encomendasInfoCozinha (){
        require '../config/connexao.php';
        $idEncomenda= $_POST["idEncomenda"]; 
        $resultados=mysqli_query ($connet,"UPDATE encomendados SET `formaCompra`='Pronto' WHERE encomendados.`id`='$idEncomenda'");
       // return true; 

    }



    function exibirProdutosVendidos(){
        //session_start();
        require '../config/connexao.php';
       // $id_usuario = $_SESSION["id_usuario"];
  
        $sql="SELECT * FROM vendas INNER JOIN produtos ON produtos.id=vendas.anexarProdutoId WHERE vendas.estado='Processado';";/* WHERE encomenda.id_usuario='$id_usuario';";*/
        $resultadosppp = mysqli_query ($connet, $sql);
      
        while ($dadossss = mysqli_fetch_assoc($resultadosppp)) {
            ?>
            <div style='background-color:orange;  border-radius: 15px; margin-left: 10%; '>       
                <br>
                       <h4> <?php echo $dadossss['codigo']." | | ".$dadossss['nome']; ?></h4>
                        <?php echo $dadossss['categoria']." | | ".$dadossss['preco']." Mt"; ?>
              
                        <?php echo $dadossss['descricao']; ?>
                <br>
                <div>
                <form action="../controller/produto.php" method="POST">
                    <input class="esconde" type="text" name="dataTempo" value="<?php echo $dadosss['dataTempo'];?>" style="width: 0%;">
                    <input type="submit" value="Preparado"  name="apagarInfRequiz" style="width: 20%;">
                </form>  
                </div>
                <br>
            </div>
              <br>
            <?php
        }
   }

   function vendasInfoCozinha (){
    require '../config/connexao.php';
    $dataTempo= $_POST["dataTempo"]; 
    $resultados=mysqli_query ($connet,"UPDATE vendas SET `estado`='Pronto' WHERE vendas.`dataTempo`='$dataTempo'");
   // return true; 

    }
   




}


            


?>
