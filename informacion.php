<?php
    session_start(); // Iniciar la sesión para acceder a los datos guardados
    // Verificar si el usuario está autenticado
    if(!isset($_SESSION['usuario'])) {
        // Si no está autenticado, redirigir a la página de login
        header('Location: consulta.php');
        exit;
    }

    // Verificar si los datos del usuario están en la sesión
    if (isset($_SESSION['usuario'])) {
        $usuario = $_SESSION['usuario']; // Obtener los datos del usuario desde la sesión

        // Mostrar solo los campos seleccionados
        // echo "Nombre: " . $usuario['nombre'] . "<br>";
        // echo "Paquete: " . $usuario['paquete'] . "<br>";
        // echo "Velocidad de Paquete: " . $usuario['velocidad_paquete'] . "<br>";
        // echo "Velocidad Medida: " . $usuario['velocidad_medida'] . "<br>";
        // echo "Jitter: " . $usuario['jitter'] . "<br>";
        // echo "Latencia: " . $usuario['latencia'] . "<br>";
        // echo "Disponibilidad: " . $usuario['disponibilidad'] . "<br>";
        
    } else {
        // echo "No se encontraron datos del usuario. Asegúrate de haber iniciado sesión correctamente.";
        header('Location: consulta.php');
        exit;
    }

    // Ojo: Si es necesario, puedes limpiar la sesión después de mostrar los datos si no la necesitas más.
    unset($_SESSION['usuario']); // Eliminar los datos del usuario de la sesión si ya no se van a usar
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <link rel="icon" type="image/svg+xml" href="images/icono.svg" />
      <title>QoS - Informacion</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">

      <!-- DX ADD -->
      <link href="ruta-a-tu-carpeta/font/bootstrap-icons.css" rel="stylesheet">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

      <link rel="stylesheet" href="css/indicadores.css">

      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="css/responsive.css">
      <!-- fevicon -->
      <link rel="icon" href="images/fevicon.png" type="image/gif" />
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->
   </head>
   <!-- body -->
   <body class="main-layout">
      <!-- loader  -->
      <div class="loader_bg">
         <div class="loader"><img src="images/loading.gif" alt="#" /></div>
      </div>
      <!-- end loader -->
      <!-- header -->
      <header>
         <!-- header inner -->
         <div class="header">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col logo_section">
                     <div class="full">
                        <div class="center-desk">
                           <div class="logo">
                              <a href="index.php"><img src="images/logo2.jpg" alt="#" /></a>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="col-xl-9 col-lg-9 col-md-9 col-sm-9">
                     <div class="header_information">
                        <nav class="navigation navbar navbar-expand-md navbar-dark ">
                           <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample04" aria-controls="navbarsExample04" aria-expanded="false" aria-label="Toggle navigation">
                           <span class="navbar-toggler-icon"></span>
                           </button>
                           <div class="collapse navbar-collapse" id="navbarsExample04">
                              <ul class="navbar-nav mr-auto">
                                 <li class="nav-item active">
                                    <a class="nav-link dx-id-noindex" href="index.php"> Inicio  </a>
                                 </li> 
                                 <li class="nav-item">
                                    <a class="nav-link dx-id-noindex" href="nosotros.php">Nosotros</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link dx-id-noindex" href="contacto.php">Contactanos</a>
                                 </li>
                                 <li class="nav-item">
                                    <a class="nav-link dx-id-index" href="consulta.php">Consultas</a>
                                 </li>
                              </ul>
                              <!-- <div class="sign_btn"><a href="consulta.php">Consultas</a></div> -->
                           </div>
                        </nav>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- end header inner -->
      <!-- end header -->

      <section class="container">
        <div class="titlepage inf-titulo">
            <h2 style="text-transform: uppercase;">BIENVENIDO <?php  echo $usuario['nombre'];?> 	&#128075;</h2>
            <span></span>
        </div>
      </section>

      <div id="about"  class="about">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-7">
                  <div class="titlepage">
                     <h2>Detalles del Servicio de Internet</h2>
                     <span></span>
                     <p>En esta página podrás visualizar los resultados detallados de tu servicio de Internet, incluyendo información sobre la velocidad de conexión, jitter, latencia y disponibilidad. Aquí encontrarás un resumen claro y accesible para conocer el estado actual de tu servicio y su rendimiento</p>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="about_img">
                    <figure><img src="images/consulta.png" alt="#"/></figure>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- end header -->

      <!-- INDICADORES -->
      <section class="container">
        <div class="dx-container">
            <div class="titlepage">
                <h2>DETALLES &#x1F50D;</h2>
                <span></span>
             </div>
            <div class="dx-informacion">
                <p>Estimado/a <span><?php echo $usuario['nombre']; ?></span>, usted ha contratado el plan de <span>$<?php echo $usuario['paquete']; ?></span> dolares que ofrece una velocidad de <span><?php echo $usuario['velocidad_paquete']; ?> Mbps</span>. Durante la evaluación de su servicio, se registró una velocidad de conexión de <span><?php echo $usuario['velocidad_medida']; ?> Mbps</span>, clasificada como excelente. Además, se detectó un jitter de <span><?php echo $usuario['jitter']; ?> ms</span> y una latencia de <span><?php echo $usuario['latencia']; ?> ms</span>, ambos considerados excelentes. Finalmente, su servicio presenta una disponibilidad aceptable del <span><?php echo $usuario['disponibilidad']; ?>%</span>.</p>
            </div>
            <div class="dx-tarjeta">
                <div class="bodyx"><!-- INDICADORE VELOCIDAD 1111111111111111-->
                    <h2>Velocidad</h2>
                    <a class="cardx human-resourcesx" >
                         <div class="overlayx"></div>
                      <div class="circlex">
                         
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="40" height="40" stroke-width="2">
                            <path d="M4 19l16 0"></path>
                            <path d="M4 15l4 -6l4 2l4 -5l4 4"></path>
                          </svg>
                    
                      </div>
                      <p><?php  echo $usuario ['velocidad_medida']; ?>  [Mbps]</p>
                      
                    </a>
                </div> <!-- INDICADORES end -->
                <div class="bodyx"><!-- INDICADORE VELOCIDAD 1222222222222222222-->
                    <h2>Jitter</h2>
                    <a class="cardx human-resourcesx" >
                         <div class="overlayx"></div>
                      <div class="circlex">
                         
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="40" height="40" stroke-width="2"> <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path> <path d="M12 12l-3 2"></path> <path d="M12 7v5"></path> </svg> 
                    
                      </div>
                      <p><?php  echo $usuario ['jitter']; ?>  [ms]</p>
                      
                    </a>
                </div> <!-- INDICADORES end -->

                <div class="bodyx"><!-- INDICADORE VELOCIDAD 3333333333333333333333333333-->
                    <h2>Latencia</h2>
                    <a class="cardx human-resourcesx">
                         <div class="overlayx"></div>
                      <div class="circlex">
                         
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="40" height="40" stroke-width="2"> <path d="M6 18l0 -3"></path> <path d="M10 18l0 -6"></path> <path d="M14 18l0 -9"></path> <path d="M18 18l0 -12"></path> </svg> 
                    
                      </div>
                      <p><?php  echo $usuario ['latencia']; ?>  [ms]</p>
                      
                    </a>
                </div> <!-- INDICADORES end -->

                <div class="bodyx"><!-- INDICADORE VELOCIDAD 4444444444444-->
                    <h2>Disponibilidad</h2>
                    <a class="cardx human-resourcesx" >
                         <div class="overlayx"></div>
                      <div class="circlex">
                         
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="40" height="40" stroke-width="2">
                            <path d="M19.5 7a9 9 0 0 0 -7.5 -4a8.991 8.991 0 0 0 -7.484 4"></path>
                            <path d="M11.5 3a16.989 16.989 0 0 0 -1.826 4"></path>
                            <path d="M12.5 3a16.989 16.989 0 0 1 1.828 4"></path>
                            <path d="M19.5 17a9 9 0 0 1 -7.5 4a8.991 8.991 0 0 1 -7.484 -4"></path>
                            <path d="M11.5 21a16.989 16.989 0 0 1 -1.826 -4"></path>
                            <path d="M12.5 21a16.989 16.989 0 0 0 1.828 -4"></path>
                            <path d="M2 10l1 4l1.5 -4l1.5 4l1 -4"></path>
                            <path d="M17 10l1 4l1.5 -4l1.5 4l1 -4"></path>
                            <path d="M9.5 10l1 4l1.5 -4l1.5 4l1 -4"></path>
                          </svg>
                    
                      </div>
                      <p><?php  echo $usuario ['disponibilidad']; ?>  [%]</p>
                      
                    </a>
                </div> <!-- INDICADORES end -->
             

                
            </div>
        </div>
      </section>
    <!-- INDICADORES end -->

    <section class="container">
        <div class="dx-container informacion-consulta">
            <div class="titlepage">
                <h2>INFORMACIÓN &#8505;</h2>
                <p>Aquí tienes los rangos basados en estándares comunes para evaluar la calidad del servicio de Internet:</p>
                <span></span>
             </div>
            <div>
                <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
                    <div class="container py-5">
                        <div class="row g-0">
                            <!-- Jitter Card -->
                            <div class="col-lg-3 wow slideInUp" data-wow-delay="0.6s">
                                <div class="bg-light rounded">
                                    <div class="border-bottom py-4 px-5 mb-4">
                                        <h4 class="mb-1" style="color: #2d8703;">Jitter</h4>
                                        <small class="">[ms]</small>
                                    </div>
                                    <div class="dx-inf p-5 pt-0">
                                        <div class="d-flex justify-content-between mb-3">
                                            <p>Excelente: </br><span>≤ 10 ms.</span></p>
                                            <i class="fa fa-check pt-1" style="color: #2d8703;"></i>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <p>Aceptable: </br><span>Entre 10 ms y 30 ms.</span></p>
                                            <i class="fa fa-info-circle pt-1" style="color: #ffd900;"></i>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <p>Deficiente:</br><span>> 30 ms.</span></p>
                                            <i class="fa fa-times text-danger pt-1"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Velocidad Card -->
                            <div class="col-lg-3 wow slideInUp" data-wow-delay="0.3s">
                                <div class="bg-white rounded shadow position-relative" style="z-index: 1;">
                                    <div class="border-bottom py-4 px-5 mb-4">
                                        <h4 class="mb-1" style="color: #2d8703;">Velocidad</h4>
                                        <small class="">[Mbps]</small>
                                    </div>
                                    <div class="dx-inf p-5 pt-0">
                                        <div class="d-flex justify-content-between mb-3">
                                            <p>Excelente: </br><span>≥ 95% de la velocidad contratada.</span></p>
                                            <i class="fa fa-check pt-1" style="color: #2d8703;"></i>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <p>Aceptable: </br><span>Entre el 80% y el 95% de la velocidad contratada.</span></p>
                                            <i class="fa fa-info-circle pt-1" style="color: #ffd900;"></i>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <p>Deficiente:</br><span>< 80% de la velocidad contratada.</span></p>
                                            <i class="fa fa-times text-danger pt-1"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Latencia Card -->
                            <div class="col-lg-3 wow slideInUp" data-wow-delay="0.9s">
                                <div class="bg-light rounded">
                                    <div class="border-bottom py-4 px-5 mb-4">
                                        <h4 class="mb-1" style="color: #2d8703;">Latencia</h4>
                                        <small class="">[ms]</small>
                                    </div>
                                    <div class="dx-inf p-5 pt-0">
                                        <div class="d-flex justify-content-between mb-3">
                                            <p>Excelente: </br><span>≤ 30 ms.</span></p>
                                            <i class="fa fa-check pt-1" style="color: #2d8703;"></i>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <p>Aceptable: </br><span>Entre 30 ms y 100 ms.</span></p>
                                            <i class="fa fa-info-circle pt-1" style="color: #ffd900;"></i>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <p>Deficiente:</br><span>> 100 ms</span></p>
                                            <i class="fa fa-times text-danger pt-1"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- Nueva Tarjeta -->
                            <div class="col-lg-3 wow slideInUp" data-wow-delay="1.2s">
                                <div class="bg-light rounded">
                                    <div class="border-bottom py-4 px-5 mb-4">
                                        <h4 class="mb-1" style="color: #2d8703;">Disponibilidad</h4>
                                        <small class="">[%]</small>
                                    </div>
                                    <div class="dx-inf p-5 pt-0">
                                        <div class="d-flex justify-content-between mb-3">
                                            <p>Excelente:</br><span>≥ 96.7%.</span></p>
                                            <i class="fa fa-check pt-1" style="color: #2d8703;"></i>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <p>Aceptable:</br><span>Entre 80% y 96.7%.</span></p>
                                            <i class="fa fa-info-circle pt-1" style="color: #ffd900;"></i>
                                        </div>
                                        <div class="d-flex justify-content-between mb-3">
                                            <p>Deficiente:</br><span>< 80%.</span></p>
                                            <i class="fa fa-times text-danger pt-1"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


           <!-- Footer Start -->
            <div class="container-fluid bg-footer2 text-light wow fadeInUp" data-wow-delay="0.1s">
               <div class="container">
                  <div class="row gx-5">
                     <div class="col-lg-4 col-md-6 footer-about">
                           <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-footer p-4">
                              <a href="index.php" class="navbar-brand">
                                 <h1 class="m-0 text-white"><i class="fas fa-user-tie me-2"></i>QoS</h1>
                              </a>
                              <p class="mt-3 mb-4">🌐 Esta aplicación permite a los usuarios de Megared conocer los parámetros técnicos de su servicio de internet, como velocidad y calidad (QoS). 📊 Garantiza transparencia para que siempre estés informado sobre lo que incluye tu paquete de internet. 🚀</p>
                           </div>
                     </div>
                     <div class="col-lg-8 col-md-6">
                           <div class="row gx-5">
                              <div class="col-lg-4 col-md-12 pt-5 mb-5">
                                 <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                       <h3 class="text-light mb-0">Contacto</h3>
                                 </div>
                                 <div class="d-flex mb-2">
                                       <i class="bi bi-geo-alt me-2" style="color: #00ff55;"></i>
                                       <p class="mb-0">Av. Independencia y Calle Quito, Piñas, Ecuador</p>
                                 </div>
                                 <div class="d-flex mb-2">
                                       <i class="bi bi-envelope-open me-2" style="color: #00ff55;"></i>
                                       <p class="mb-0">comunicacion@megared.ec</p>
                                 </div>
                                 <div class="d-flex mb-2">
                                       <i class="bi bi-telephone me-2" style="color: #00ff55;"></i>
                                       <p class="mb-0">+59399 722 6079</p>
                                 </div>
                                 <div class="d-flex mt-3">
                                       <a class="btn btn-success btn-square me-2" href="https://megared.ec" target="_blank"><i class="fas fa-globe"></i></a>
                                       <a class="btn btn-success btn-square me-2" href="https://www.facebook.com/MEGAred.ec" target="_blank"><i class="fab fa-facebook-f fw-normal"></i></a>
                                       <a class="btn btn-success btn-square me-2" href="https://www.instagram.com/megared.ec" target="_blank"><i class="fab fa-instagram fw-normal"></i></a>
                                       
                                 </div>
                              </div>
                              <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                                 <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                       <h3 class="text-light mb-0">Enlaces Rápidos</h3>
                                 </div>
                                 <div class="link-animated d-flex flex-column justify-content-start">
                                       <a class="text-light mb-2" href="index.php"><i class="bi bi-arrow-right me-2" style="color: #00ff55;"></i>Inicio</a>
                                       <a class="text-light mb-2" href="nosotros.php"><i class="bi bi-arrow-right me-2" style="color: #00ff55;"></i>Nosotros</a>
                                       <a class="text-light mb-2" href="contacto.php"><i class="bi bi-arrow-right me-2" style="color: #00ff55;"></i>Contactanos</a>
                                       <a class="text-light mb-2" href="consulta.php"><i class="bi bi-arrow-right me-2" style="color: #00ff55;"></i>Consultas</a>
                                 </div>
                              </div>
                              <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                                 <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                       <h3 class="text-light mb-0">Links</h3>
                                 </div>
                                 <div class="link-animated d-flex flex-column justify-content-start">
                                       <a class="text-light mb-2" href="https://megared.ec" target="_blank"><i class="bi bi-arrow-right me-2" style="color: #00ff55;"></i>Visitar Sitio</a>
                                       <a class="text-light mb-2" href="https://www.facebook.com/MEGAred.ec" target="_blank"><i class="bi bi-arrow-right me-2" style="color: #00ff55;"></i>Facebook</a>
                                       <a class="text-light mb-2" href="https://www.instagram.com/megared.ec" target="_blank"><i class="bi bi-arrow-right me-2" style="color: #00ff55;"></i>Instagram</a>
                                 </div>
                              </div>
                           </div>
                     </div>
                  </div>
               </div>
         </div>
         <div class="container-fluid text-white" style="background: #051c01;">
               <div class="container text-center">
                  <div class="row justify-content-center">
                     <div class="col-lg-8 col-md-6">
                           <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                              <p class="mb-0">Todos los derechos reservados. &copy; 2025 | Daniel Cabrera</p>
                           </div>
                     </div>
                  </div>
               </div>
         </div>
         <!-- Footer End -->
     
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>


      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    
      <!-- sidebar -->
      <script src="js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>

      <script>
         var myCarousel = new bootstrap.Carousel(document.getElementById('header-carousel'), {
           interval: 100000, // 10 seconds
           ride: 'carousel'
         });
       </script>
   </body>
</html>

