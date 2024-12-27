<?php 
// Activar la visualización de errores
// ini_set('display_errors', 1);
// ini_set('display_startup_errors', 1);
// error_reporting(E_ALL);

   //IMPORTAR LIBRERIAS
   require 'includes/config/db_conectar.php';
   // $db = conectarDB();
   session_start(); // Iniciar la sesión


    $errores = [];
    try {
         $db = conectarDB(); // Esto ya maneja la excepción si no se conecta
 
    if($_SERVER['REQUEST_METHOD'] === 'POST') {
      //      echo "<pre>";
      //      var_dump($_POST);
      //      echo "</pre>";

      //EXTRACION DE LAS VARIABLES
      $usuario = mysqli_real_escape_string($db,  $_POST['usuario']);

      //CONTROL DE ERRORES
      if(!$usuario) {
         $errores[] = "El nombre de usuario es obligatorio";
      }

      if(empty($errores)) {
         // REVISA SI EL USUARIO EXISTE

         // $query = "SELECT * FROM usuarios WHERE nombre = '$usuario' ";
         $query = "SELECT nombre, paquete, velocidad_paquete, velocidad_medida, jitter, latencia, disponibilidad FROM usuarios WHERE nombre = '$usuario' ";
         $resultado = mysqli_query($db, $query);

         if( $resultado->num_rows ) {
            //REVISA SI EL NOMBRE ES CORRECTO

            $usuario = mysqli_fetch_assoc($resultado);

            // Guardar los datos necesarios en la sesión
            $_SESSION['usuario'] = [
               'nombre' => $usuario['nombre'],
               'paquete' => $usuario['paquete'],
               'velocidad_paquete' => $usuario['velocidad_paquete'],
               'velocidad_medida' => $usuario['velocidad_medida'],
               'jitter' => $usuario['jitter'],
               'latencia' => $usuario['latencia'],
               'disponibilidad' => $usuario['disponibilidad']
            ];

            // El usuario existe
            // Puedes redirigir a otra página ("pagina.php")
            header('Location: informacion.php');
            exit;

         }else {
            // El usuario no existe
            $errores[] = "El Usuario no existe";
            }
      } else {
         $errores[] = "Error en la Base de Datos";
      }
   }
} catch (Exception $e) {
   $db = null; // Asegurarse de que $db sea null en caso de error
   $errores[] = "Error al conectar con la base de datos.";
}
   // Cerrar la conexión
  
   
   if ($db) {
      mysqli_close($db); //CIERRA LA BASE DE DATOS
  }
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
      <title>QoS - Consulta</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">

      <!-- DX ADD -->
      <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
      <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" href="css/style.css">
      <link rel="stylesheet" href="css/indicadores.css">
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
      <div class="msg-alerta">
            <?php foreach($errores as $error): ?>
               <div class="errorx">
                  <div class="error__icon">
                     <svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" height="24" fill="none"><path fill="#393a37" d="m13 13h-2v-6h2zm0 4h-2v-2h2zm-1-15c-1.3132 0-2.61358.25866-3.82683.7612-1.21326.50255-2.31565 1.23915-3.24424 2.16773-1.87536 1.87537-2.92893 4.41891-2.92893 7.07107 0 2.6522 1.05357 5.1957 2.92893 7.0711.92859.9286 2.03098 1.6651 3.24424 2.1677 1.21325.5025 2.51363.7612 3.82683.7612 2.6522 0 5.1957-1.0536 7.0711-2.9289 1.8753-1.8754 2.9289-4.4189 2.9289-7.0711 0-1.3132-.2587-2.61358-.7612-3.82683-.5026-1.21326-1.2391-2.31565-2.1677-3.24424-.9286-.92858-2.031-1.66518-3.2443-2.16773-1.2132-.50254-2.5136-.7612-3.8268-.7612z"></path></svg>
                  </div>
                  <div class="error__title"><?php echo $error;?></div>
                  <div class="error__close"><svg xmlns="http://www.w3.org/2000/svg" width="20" viewBox="0 0 20 20" height="20"><path fill="#393a37" d="m15.8333 5.34166-1.175-1.175-4.6583 4.65834-4.65833-4.65834-1.175 1.175 4.65833 4.65834-4.65833 4.6583 1.175 1.175 4.65833-4.6583 4.6583 4.6583 1.175-1.175-4.6583-4.6583z"></path></svg></div>
               </div>
            <?php endforeach; ?>
            </div>

      <div id="about"  class="about">
         <div class="container">
            <div class="row d_flex">
               <div class="col-md-7">
                  <div class="titlepage">
                     <h2>Consulta de Servicio de Internet</h2>
                     <span></span>
                     <p>En esta página podrás consultar de manera sencilla el servicio de Internet que has contratado, incluyendo las principales características como velocidad, jitter, latencia y disponibilidad. Obtendrás indicadores claros sobre la calidad de tu conexión, permitiéndote verificar su estado y desempeño de forma rápida y transparente.</p>
                  </div>
               </div>
               <div class="col-md-5">
                  <div class="about_img">
                     <div class="dx-formulario">
                        <!-- <form class="form_main" action="/php/buscar_usuario.php" method="POST"> -->
                        <form class="form_main"  method="POST">
                           <p class="heading">Panel de Consulta</p>
                           <div class="inputContainer">
                              <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" width="24" height="24" stroke-width="2"> <path d="M12 12m-9 0a9 9 0 1 0 18 0a9 9 0 1 0 -18 0"></path> <path d="M12 10m-3 0a3 3 0 1 0 6 0a3 3 0 1 0 -6 0"></path> <path d="M6.168 18.849a4 4 0 0 1 3.832 -2.849h4a4 4 0 0 1 3.834 2.855"></path> </svg> 
                           <input placeholder="Nombre" id="usuario" class="inputField" type="text" name="usuario" required>
                           </div>
                        <button id="button">Consultar</button>
                           <div class="signupContainer">
                              <p>Por favor, ingrese su Nombre y Apellido </p>
                           </div>
                        </form>
               
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>

      <!-- end header -->

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

         <!-- Aquí se mostrarán los resultados -->
        <div id="resultado"></div>
     
      <!-- Javascript files-->
      <script src="js/jquery.min.js"></script>
      <script src="js/popper.min.js"></script>
      <script src="js/bootstrap.bundle.min.js"></script>
      <script src="js/jquery-3.0.0.min.js"></script>
      <script src="js/no_reload.js"></script>


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