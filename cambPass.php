
<?php

    if(!file_exists("sesionaux.txt"))
    {
        echo "<script>
                alert('Debe iniciar sesión para acceder a la plataforma');
                window.location = 'index.html';
            </script>";
    }

?>

<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>RRHH | WorkSpot</title>

  <!-- Custom fonts for this template -->
  <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

  <!-- Custom styles for this template -->
  <link href="css/sb-admin-2.min.css" rel="stylesheet">

  <!-- Custom styles for this page -->
  <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

</head>

<body id="page-top">
  
  <?php
        $file = fopen("sesionaux.txt","r");
    
            $line = fgets($file);
            
            $datos = explode(",", $line);
            
            $nombre = $datos[0];
            
            $apellido = $datos[1];
                
            $legajo = $datos[2];
            
            $password = $datos[3];
            
            $rol = $datos[4];
            
            $celular = $datos[5];
            
            $mail = $datos[6];
            
            $puesto = $datos[7];
            
            fclose($file);
    
    ?>
    

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
          MENÚ
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item">
        <a class="nav-link" href="tables.php"
         >
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Tabla empleados</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider">


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
          <i class="fas fa-fw fa-cog"></i>
          <span>Ajustes de empleado</span>
        </a>
        <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">OPCIONES</h6>
            <a class="collapse-item"  data-toggle="modal" data-target="#exampleModal" href="#">Agregar recibo</a>
            <a class="collapse-item"  data-toggle="modal" data-target="#exampleModal2" href="#">Editar datos</a>
            <a class="collapse-item"  data-toggle="modal" data-target="#exampleModal3" href="#">Agregar empleado</a>
            <a class="collapse-item"  data-toggle="modal" data-target="#exampleModal4" href="#">Eliminar empleado</a>
          </div>
        </div>
      </li>
      

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar recibo de sueldo</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <p class="text-center">Ingrese legajo del empleado</p>
            <form action="agregarRecibo.php" method="post" class="text-center">
                <input type="numer" name="legajo">
            <div class="modal-footer">
            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cerrar">
            <input type="submit" class="btn btn-primary" value="Confirmar">
          </div>
            </form>
          </div>
          </div>
        </div>
      </div>
    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Editar datos de empleado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
           <p class="text-center">Ingrese legajo del empleado</p>
            <form action="agregarDato.php" method="post" class="text-center">
                <input type="numer" name="legajo">
            <div class="modal-footer">
            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cerrar">
            <input type="submit" class="btn btn-primary" value="Confirmar">
          </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      
    <div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Agregar nuevo empleado</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="agregarEmpleado.php" method="POST">
               <div class="container">
                <div class="row">
                    <div class="col-6 col-md-6">
                        <input type="text" placeholder="Nombre" name="nombre" required>
                        <input type="numer" placeholder="Legajo" name="legajo" required>
                        <input type="number" placeholder="Celular" name="celular" required>
                        <input type="mail" placeholder="Correo electrónico" name="mail" required>
                    </div>
                    <div class="col-6 col-md-6">
                        <input type="text" placeholder="Apellido" required name="apellido">
                        <label for="rol">Rol dentro de la empresa</label>
                        <select name="rol" id="rol">
                            <option value="0">CAJERO</option>
                            <option value="1">SUPERVISOR</option>
                            <option value="2">COORDINADOR</option>
                            <option value="3">RRHH</option>
                        </select>
                    </div>
                </div>
                </div>
          <div class="modal-footer">
            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cerrar">
            <input type="submit" class="btn btn-primary" value="Confirmar">
            </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      
        <style>
        
            input
            {
                margin-bottom: 1vh;
            }
            
        </style>
    <div class="modal fade" id="exampleModal4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Eliminar empleado de la empresa</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <p class="text-center">Ingrese legajo del empleado</p>
            <form action="eliminar.php" method="post" class="text-center">
                <input type="numer" name="legajo">
            <div class="modal-footer">
            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cerrar">
            <input type="submit" class="btn btn-primary" value="Confirmar">
          </div>
            </form>
          </div>
        </div>
      </div>
    </div>  

      <!-- Nav Item - Utilities Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
          <i class="fas fa-fw fa-wrench"></i>
          <span>Acciones</span>
        </a>
        <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
          <div class="bg-white py-2 collapse-inner rounded">
            <h6 class="collapse-header">Acciones</h6>
            <a class="collapse-item"  data-toggle="modal" data-target="#exampleModal5" href="#">Enviar aviso</a>
          </div>
        </div>
      </li>
      
      <div class="modal fade" id="exampleModal5" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Enviar aviso a empleados</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action="avisos.php" method="post" class="text-center">
               <div class="container">
                <label for="titulo">Título</label>   
                <input type="text" name="titulo" required>
               </div>
               <div class="container">
                <label for="titulo">Subtítulo</label>   
                <input type="text" name="subtitulo" required>
               </div>
               <div class="container">
                <label for="titulo">Cuerpo</label>   
                <textarea name="cuerpo" id="cuerpo" cols="30" rows="5"></textarea>
               </div>
            <div class="modal-footer">
            <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Cerrar">
            <input type="submit" class="btn btn-primary" value="Confirmar">
          </div>
            </form>
          </div>
        </div>
      </div>
    </div>
      

      <!-- Divider -->
      <hr class="sidebar-divider">

      <!-- Heading -->


      <!-- Nav Item - Pages Collapse Menu -->
      <li class="nav-item">
        <a class="nav-link collapsed" href="actMovimientos.php" aria-expanded="true" aria-controls="collapsePages">
          <i class="fas fa-fw fa-folder"></i>
          <span>Últimos movimientos</span>
        </a>
      </li>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <form class="form-inline">
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
              <i class="fa fa-bars"></i>
            </button>
          </form>

          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <h3>WorkSpot</h3>
            </div>
          </form>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $nombre." ".$apellido; ?></span>
                <i class="fas fa-user"></i>
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="#">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Perfil
                </a>
                <a class="dropdown-item" href="cambPass.php">
                  <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cambiar contraseña
                </a>
                <a class="dropdown-item" href="actMovimientos.php">
                  <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                  Últimos movimientos
                </a>
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Cerrar sesión
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->
        
        <?php
          
          $file = fopen("sesionaux.txt", "r");
          
          while(!feof($file))
          {
            $line = fgets($file);
              
            $datos = explode(",", $line);
              
                $nombre = $datos[0];
            
                $apellido = $datos[1];

                $legajo = $datos[2];

                $password = $datos[3];

                $rol = $datos[4];

                $celular = $datos[5];

                $mail = $datos[6];

                $puesto = $datos[7];
          }
          
          fclose($file);
        ?>

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-2 text-gray-800">Cambiar mi contraseña</h1>
          <p class="mb-4">Para poder cambiar la contraseña, el correo electrónico debe estar verificado, caso contrario, se le pedirá un mail para que pueda ser verificado</p>

          <!-- DataTales Example -->
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Datos</h6>
            </div>
            <div class="card-body">
              <div class="container">
                 <div class="text-center">
                    <div class="row">
                        <div class="col-0 col-md-4"><h2><?php echo $nombre." ".$apellido?></h2><svg width="15em" height="15em" viewBox="0 0 16 16" class="bi bi-file-person" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
                          <path fill-rule="evenodd" d="M12 1H4a1 1 0 0 0-1 1v10.755S4 11 8 11s5 1.755 5 1.755V2a1 1 0 0 0-1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H4z"/>
                          <path fill-rule="evenodd" d="M8 10a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
                        </svg></div>
                        <div class="col-12 col-md-8">
                        <form action="validacionMail.php" method="post">
                        <div class="container">
                        <input type="text" name="nombre" value="<?php echo $nombre?>" readonly>
                        <input type="text" value="<?php echo $apellido?>" name="apellido" readonly>
                        </div>
                        <div class="container">
                        <input type="text"  value="<?php echo $legajo?>" name="legajo" readonly>
                        <input type="mail" name="mail" value="<?php echo $mail?>" required>
                        </div>
                        <div class="container">
                            <p>Contraseña nueva <input type="password" name="pass1" required></p>
                        </div>
                        <div class="container">
                            <p>Repetir contraseña nueva <input type="password" name="pass2" required></p>                            
                        </div>
                        <div class="container">
                        <input type="submit" value="Guardar cambios" class="btn btn-success">
                        </div>
                        </form>
                        </div>
                    </div> 
                 </div> 
              </div>
            </div>
          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
    <style>
        input
        {
            margin: 3vh auto;
        }
    </style>
      <!-- Button trigger modal -->

    
    
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; WorkSpot 2020</span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <!-- Logout Modal-->
  <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Seguro que desea salir?</h5>
          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">Si no presionó en "Guardar cambios", la contraseña no se guardará</div>
        <div class="modal-footer">
          <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
          <a class="btn btn-primary" href="login.html">Salir</a>
        </div>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script> 

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/datatables/jquery.dataTables.min.js"></script>
  <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/datatables-demo.js"></script>
  

</body>

</html>
