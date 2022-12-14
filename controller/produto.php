<?php

    require '../models/produtoModel.php';
    $cadastro = new Produto();  
    $vendasOgj = new Vendas();
    $ecomendasObj = new Ecomendas();
    $vendasOgj31 = new CozinhaInf();

    if (isset($_POST['submit'])):   
       // $cadastro = new produto();
        $value=$cadastro->cadastrarProdutos();  
        if($value){
            header('Location:../views/actividades.html'); 
        }else{
            header('Location:../views/cadastro-produto.php');
        }
    endif;
  
    if (isset($_POST['apagarPoduto'])):   
      //  $cadastro = new produto();
        $value=$cadastro->apagarProduto();  

        if($value){
            header('Location:../views/actividades.html'); 
        }else{
            header('Location:../views/cadastro-produto.php');
        }
    endif;


    
    if (isset($_POST['apagarAnexo'])):   
      //  $cadastro = new produto();
        $value=$ecomendasObj->apagarAnexoEncomendas();  

        if($value){
            header('Location:../views/booking.php'); 
        }else{
            header('Location:../views/booking.php');
        }
    endif;


    if (isset($_POST['anexarPoduto'])):   
        //$cadastro = new produto();
        $ecomendasObj->anexarEcomendas();  
        header('Location:../views/booking.php'); 
    endif;



    if (isset($_POST['anexarPodutoVenda'])):   
        //$cadastro = new produto();
        $vendasOgj->anexarVendas ();  
        header('Location:../views/vendas.php'); 
    endif;

    if (isset($_POST['encomenda'])):   
        //$cadastro = new produto();
        $ecomendasObj->efectuarEncomendados ();  
        header('Location:../views/booking.php'); 
    endif;

   
    
    if (isset($_POST['apagarAnexoVendas'])):   
        //$cadastro = new produto();
        $vendasOgj->apagarAnexoProduto();  
        header('Location:../views/vendas.php'); 
    endif;
    
    if (isset($_POST['comprarAgora'])):   
        //$cadastro = new produto();
        $vendasOgj->efectuarCompra();  
        header('Location:../views/vendas.php'); 
    endif;

    
    if (isset($_POST['apagarInfRequiz'])):   
        //$cadastro = new produto();
        $vendasOgj31->vendasInfoCozinha();  
        header('Location:../views/infCozinha.php'); 
    endif;
    
    if (isset($_POST['apagarInfEncomend'])):   
        //$cadastro = new produto();
        $vendasOgj31->encomendasInfoCozinha();  
        header('Location:../views/infCozinha.php'); 
    endif;
?>