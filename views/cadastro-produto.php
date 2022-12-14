<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Restaurante - DDJEF-Paladar</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="" name="description">

    <!-- Favicon -->
    <link href="../assets/img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600&family=Nunito:wght@600;700;800&family=Pacifico&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../assets/lib/animate/animate.min.css" rel="stylesheet">
    <link href="../assets/lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../assets/lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="../assets/css/style.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
 
</head>

<body>
    <div class="container-xxl bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem;" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Navbar & Hero Start -->
        <div class="container-xxl position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark px-4 px-lg-5 py-3 py-lg-0">
                <a href="" class="navbar-brand p-0">
                    <h1 class="text-primary m-0"><i class="fa fa-utensils me-3"></i>Restaurante - DDJEF-Paladar</h1>
                    <!-- <img src="img/logo.png" alt="Logo"> -->
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-0 pe-4">
                        <a href="../index.html" class="nav-item nav-link">Home</a>
                        <a href="actividades.html" class="nav-item nav-link">Voltar</a>
                        <a href="menu.html" class="nav-item nav-link">Menu</a>
                    </div>
                    
                </div>
            </nav>
    
<hr>
<hr>
        <!-- cadastrar si -->
            <div style="background-color: rgb(70, 51, 51); text-align:center;">
                  <h2 id="fazerReJ"  style=" color: white;">Cadastrar Produtos</h2>
            </div>    
        <div style="margin-left: 15%; margin-right: 15%; ">

          
            <form class="row g-3" method="POST" enctype="multipart/form-data" action="../controller/produto.php" >
                <div class="col-md-4">
                  <label for="validationDefault01" class="form-label">Nome do Produto</label>
                  <input type="text" class="form-control" id="validationDefault01" placeholder="Mucapata" name="nome" required>
                </div>
                <div class="col-md-4">
                  <label for="validationDefault02" class="form-label">Codigo</label>
                  <input type="text" class="form-control" id="validationDefault02" placeholder="MC" name="codigo" required>
                </div>

              
                <div class="col-md-6">
                  <label for="validationDefault03" class="form-label" >Categoria</label>
                  
                  <select class="form-select" id="select1" name="categoria">
                    <option value="Pratos  de Entrada ">Pratos  de Entrada </option>
                    <option value="Bebidas com Alcool">Bebidas com Alcool</option>
                    <option value="Bebidas sem alcool">Bebidas sem Alcool</option>
                    <option value="Sobremesas">Sobremesas</option>
                    <option value="Aperitivos">Aperitivos</option>
                 </select>

                </div>
                <div class="col-md-3">
                  <label for="validationDefault015" class="form-label"> Preço</label>
                  <input type="number" class="form-control" id="validationDefault015" name="preco" required>
                </div>
                <div class="col-12">
                    <label for="inputAddress" class="form-label">Descrição</label>
                    <input type="text" class="form-control" id="inputAddress" placeholder="Frango Grelhado na brazza" name="descricao" style="width: 75%;" >
                </div>
                <div class="col-md-3">
                    <label for="validationDefault015" class="form-label">Quantidades</label>
                    <input type="number" class="form-control" id="validationDefault015" name="quantidades" required>
                </div>
                <div class="col-md-3">
                    <h6>Carregar Imagem do Produto</h6>
                    <p>
                        <input type="file" name="fileToUpload" >
                    </p>
                </div>
                <div class="col-12">
                  <button class="btn btn-primary" type="submit" name="submit">Cadastrar Produto</button>
                </div>
              </form>
        </div>

        <hr>
        
                <?php
                require '../models/produtoModel.php';
                     $cadastrados = new Produto();
                     $num= $cadastrados->exibirProdutos();
                ?>
        <hr>
        </div>
         <!-- Footer Start -->
         <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
            <div class="container py-5">
                <div class="row g-5">
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
                        <a class="btn btn-link" href=""> Sobre Nós</a>
                        <a class="btn btn-link" href="">Contactos </a>
                        <a class="btn btn-link" href="">Reserva</a>
                        <a class="btn btn-link" href="">Políticas</a>
                        <a class="btn btn-link" href="">Termos e Condiçoes</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Contact</h4>
                        <p class="mb-2"><i class="fa fa-map-marker-alt me-3"></i>Katembe, Maputo, MOZ</p>
                        <p class="mb-2"><i class="fa fa-phone-alt me-3"></i>+258 86 988 3834</p>
                        <p class="mb-2"><i class="fa fa-envelope me-3"></i>djefpaladar@gmail.com</p>
                        <div class="d-flex pt-2">
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-twitter"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-facebook-f"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-youtube"></i></a>
                            <a class="btn btn-outline-light btn-social" href=""><i class="fab fa-linkedin-in"></i></a>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Opening</h4>
                        <h5 class="text-light fw-normal">Domingo - Sabado</h5>
                        <p>09AM - 09PM</p>
                        <h5 class="text-light fw-normal">Domingo</h5>
                        <p>10AM - 08PM</p>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <h4 class="section-title ff-secondary text-start text-primary fw-normal mb-4">Novidades</h4>
                        <p>Dolor amet sit justo amet elitr clita ipsum elitr est.</p>
                        <div class="position-relative mx-auto" style="max-width: 400px;">
                            <input class="form-control border-primary w-100 py-3 ps-4 pe-5" type="text" placeholder="Your email">
                            <button type="button" class="btn btn-primary py-2 position-absolute top-0 end-0 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="copyright">
                    <div class="row">
                        <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                            &copy; <a class="border-bottom" href="#">Your Site Name</a>, All Right Reserved. 
			
							 <a class="border-bottom" href="https://htmlcodex.com">HTML Codex</a><br><br>
                            <a class="border-bottom" href="https://themewagon.com" target="_blank">ThemeWagon</a>
                        </div>
                        <div class="col-md-6 text-center text-md-end">
                            <div class="footer-menu">
                                <a href="">Home</a>
                                <a href="">Cookies</a>
                                <a href="">Ajuda</a>
                               
                            </div>
                        </div>
                    </div>
                </div>
            </div>`
        </div>
        <!-- Footer Fim -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/lib/wow/wow.min.js"></script>
    <script src="../assets/lib/easing/easing.min.js"></script>
    <script src="../assets/lib/waypoints/waypoints.min.js"></script>
    <script src="../assets/lib/counterup/counterup.min.js"></script>
    <script src="../assets/lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="../assets/lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="../assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
 
</body>

</html>