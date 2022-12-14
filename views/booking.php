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
                        <a href="../index.html" class="nav-item nav-link">Voltar</a>
                        <a href="#menu1" class="nav-item nav-link">Menu</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle active" data-bs-toggle="dropdown">Paginas</a>
                            <div class="dropdown-menu m-0">
                                <a href="#contactos" class="dropdown-item">Contactos</a>
                            </div>
                        </div>
                    </div>
                    <a href="#idPedido" class="btn btn-primary py-2 px-4">Faça Uma Encomenda</a>
                </div>
            </nav>

            <div class="container-xxl py-5 bg-dark hero-header mb-5">
                
            </div>
        </div>
        <!--Pedido Efectuados  -->
        <hr>
        <a href="pedidosEfectudos.php" class="btn btn-primary py-2 px-4">Pedido Efectuados</a>
        
        <hr>
        <!-- Lista de produtos-->
        <div class="container-xxl py-5 px-0 wow fadeInUp" data-wow-delay="0.1s">
            <div class="row g-0">
                <div class="col-md-6">
                    <div class="container-xxl py-5">
                        <div class="container">
                            <div class="text-center wow fadeInUp" data-wow-delay="0.1s">
                                <h5 class="section-title ff-secondary text-center text-primary fw-normal">Food Menu</h5>
                                <h1 class="mb-5">Items Na Carinha</h1>
                            </div>
                            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.1s">
                                
                                <div class="tab-content">
                                    <div id="tab-1" class="tab-pane fade show p-0 active">
                                        <div class="row g-4">
                                            
                                        <div class="limitesDiv">
                                            <?php
                                               require '../models/produtoModel.php';
                                               $ecomendasObj1 = new Ecomendas();
                                              //  $carinda = new produto();
                                                $ecomendasObj1->exibirProdutosDaCarinha();
                                            ?> 

                                        </div>                       
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-md-6 bg-dark d-flex align-items-center">
                    <div class="p-5 wow fadeInUp" data-wow-delay="0.2s">
                        <h5 class="section-title ff-secondary text-start text-primary fw-normal">Encomenadas</h5>
                        <h1 class="text-white mb-4" id="idPedido">Registe a Sua Encomenada</h1> 
                        <form action="../controller/produto.php" method="POST">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <div class="form-floating date" id="date3" data-target-input="nearest">
                                        <input type="date" class="form-control datetimepicker-input" id="datetime" name="data" required />
                                        <label for="datetime">Data</label>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                        <div class="form-floating">
                                                <input type="time" class="form-control datetimepicker-input" id="select1" name="tempo" placeholder="Time" data-target="#date3" data-toggle="timepicker" required/>
                                        <label for="select1">Tempo</label>
                                      </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-floating">
                                        <textarea class="form-control" placeholder="Special Request" id="message" style="height: 100px"  name="pedidoEspecial"  required></textarea>
                                        <label for="message">Pedido Especial</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100 py-3" type="submit" name="encomenda" >Encomendar Agora</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="">
        <h3 id="menu1" >Produtos Disponives para Compra</h3> 
                        <div style=" margin-left: 30%;">
                                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                                    <li class="nav-item">
                                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill" href="#tab-1">
                                            <i class="fa fa-coffee fa-2x text-primary"></i>
                                            <div class="ps-3">
                                                <small class="text-body">Popular</small>
                                                <h6 class="mt-n1 mb-0">Breakfast</h6>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-2">
                                            <i class="fa fa-hamburger fa-2x text-primary"></i>
                                            <div class="ps-3">
                                                <small class="text-body">Special</small>
                                                <h6 class="mt-n1 mb-0">Launch</h6>
                                            </div>
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                                            <i class="fa fa-utensils fa-2x text-primary"></i>
                                            <div class="ps-3">
                                                <small class="text-body">Lovely</small>
                                                <h6 class="mt-n1 mb-0">Dinner</h6>
                                            </div>
                                        </a>
                                    </li>
                                </ul> 
                        </div>                 
                <?php
                        //$cadastrados = new produto();
                        $num= $ecomendasObj1->exibirProdutos();
                    ?> 
        </div>
     <hr>
        

 <!-- Footer Start -->
 <div class="container-fluid bg-dark text-light footer pt-5 mt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-3 col-md-6">
                <h4 id="contactos" class="section-title ff-secondary text-start text-primary fw-normal mb-4">Company</h4>
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
<!-- Footer Inicio -->

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
</body>

</html>