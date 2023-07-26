<!DOCTYPE html>
<html lang="en">
<?php
	
require "conexion.php";
	
session_start();
if (!isset($_SESSION['username'])) {
  // Redirect the user to the home page
  header('Location: index.php');
  exit;
}
	$query5 = "SELECT * FROM handtriage.VistaTriage ORDER BY fechaLectura DESC LIMIT 1";
	$resultado5 = mysqli_query($conexion, $query5);
	$fila5 = mysqli_fetch_assoc($resultado5);
	$RNombre = $fila5['Nombre'];
									$RSexo = $fila5['Sexo'];
									$RRitmoCardiaco = $fila5['RitmoCardiaco'];
									$RConcOxigeno = $fila5['ConcOxigeno'];
									$RTemperatura = $fila5['Temperatura'];
									$RfechaLectura = $fila5['fechaLectura'];
?>
	

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>HandTriage</title>

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
				
				
				
                
                <div class="sidebar-brand-text mx-3">HandTriage <sup>1.1</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="dashboard.php">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Administracion
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="triageData.php" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Consultar datos</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Informacion de:</h6>
                        <a class="collapse-item" href="pacientes.php">Pacientes</a>
                    </div>
                </div>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            

            <!-- Divider -->
           

            <!-- Nav Item - Pages Collapse Menu -->
  

            <!-- Nav Item - Charts -->
            

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="usuarios.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Usuarios</span></a>
            </li>
			
			<li class="nav-item">
                <a class="nav-link" href="triageData.php">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Triage</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->


        </ul>
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                    <!-- Sidebar Toggle (Topbar) -->
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                        <i class="fa fa-bars"></i>
                    </button>

                    <!-- Topbar Search -->
                    

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                        <li class="nav-item dropdown no-arrow d-sm-none">
                            <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-search fa-fw"></i>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                                aria-labelledby="searchDropdown">
                                <form class="form-inline mr-auto w-100 navbar-search">
                                    <div class="input-group">
                                        <input type="text" class="form-control bg-light border-0 small"
                                            placeholder="Search for..." aria-label="Search"
                                            aria-describedby="basic-addon2">
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button">
                                                <i class="fas fa-search fa-sm"></i>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </li>

                        <!-- Nav Item - Alerts -->
                        

                        <!-- Nav Item - Messages -->
                        

                        <div class="topbar-divider d-none d-sm-block"></div>

                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><strong><?php echo $_SESSION['username']; ?> </strong></span>
                                <img class="img-profile rounded-circle"
                                    src="img/undraw_profile.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">

                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="index.php"  >
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Salir
                                </a>
                            </div>
                        </li>

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                        <a href="#" onclick="window.print()" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i
                                class="fas fa-download fa-sm text-white-50"></i>Imprimir estadisticas</a>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Pacientes Registrados</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
												
												<?php
												$query = "SELECT COUNT(*) AS total FROM Pacientes";
												$resultado = mysqli_query($conexion, $query);
												$fila = mysqli_fetch_assoc($resultado);
												$totalPacientes = $fila['total'];
												echo $totalPacientes
												?>
												
												
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-wheelchair fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Datos procesados</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">
											<?php
												$query = "SELECT COUNT(*) AS total FROM Triage";
												$resultado = mysqli_query($conexion, $query);
												$fila = mysqli_fetch_assoc($resultado);
												$totalPacientes = $fila['total'];
												echo $totalPacientes
												?>
											</div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-stethoscope fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Earnings (Monthly) Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-danger shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-dark text-uppercase mb-1">
                                                Ultima medición</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $RfechaLectura ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-heartbeat fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pending Requests Card Example -->
                        <div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                                Ultimo paciente analizado</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo $RNombre ?></div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user-md fa-2x text-gray-300"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->

                    <div class="row">

                        <!-- Area Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Estado general de pacientes (Oxigenacion en sangre)</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                      
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
									
									<?php
									// Realizar la consulta SQL para obtener los datos del gráfico
									$query4 = "SELECT * from estadoGeneralOxigeno";
									$resultado4 = mysqli_query($conexion, $query4);
									$fila4 = mysqli_fetch_assoc($resultado4);
									$TotalBajo2 = $fila4['Peligro_Hipoxemia'];
									$TotalNormal2 = $fila4['Normal'];
									$TotalPeligroso2 = $fila4['Peligro_Hiperoxemia'];
									?>
									<script>
									// Definir una variable JavaScript y asignarle el valor desde PHP
									var Tbajo2 = "<?php echo $TotalBajo2; ?>";
									var Tnormal2 = "<?php echo $TotalNormal2; ?>";
									var Tpeligroso2 = "<?php echo $TotalPeligroso2; ?>";	

									
								</script>
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart2"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-dark"></i> Hiperoxemia
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Normal
                                        </span>
										<span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> Hipoxemia
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Pie Chart -->
                        <div class="col-xl-6 col-lg-6">
                            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Estado general de pacientes (Ritmo Cardiaco)</h6>
                                    <div class="dropdown no-arrow">
                                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink"
                                            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                        </a>
                                      
                                    </div>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
									
									<?php
									// Realizar la consulta SQL para obtener los datos del gráfico
									$query3 = "SELECT * from estadoGeneral";
									$resultado3 = mysqli_query($conexion, $query3);
									$fila3 = mysqli_fetch_assoc($resultado3);
									$TotalBajo = $fila3['Bajo'];
									$TotalNormal = $fila3['Normal'];
									$TotalAlto = $fila3['Alto'];
									$TotalPeligroso = $fila3['Peligroso'];
									?>
									<script>
									// Definir una variable JavaScript y asignarle el valor desde PHP
									var Tbajo = "<?php echo $TotalBajo; ?>";
									var Tnormal = "<?php echo $TotalNormal; ?>";
									var Talto = "<?php echo $TotalAlto; ?>";
									var Tpeligroso = "<?php echo $TotalPeligroso; ?>";	

									
								</script>
                                    <div class="chart-pie pt-4 pb-2">
                                        <canvas id="myPieChart"></canvas>
                                    </div>
                                    <div class="mt-4 text-center small">
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-dark"></i> Riesgo de infarto
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-danger"></i> Taquicardia
                                        </span>
                                        <span class="mr-2">
                                            <i class="fas fa-circle text-success"></i> Normal
                                        </span>
										<span class="mr-2">
                                            <i class="fas fa-circle text-warning"></i> Bradicardia
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
								<?php
									// Realizar la consulta SQL para obtener los datos del gráfico
									
									
								?>
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Ultimos datos registrados</h6>
                                </div>
                                <div class="card-body">
                                    <h4 class="small font-weight-bold"><strong>Paciente</strong>: <span><?php echo $RNombre ?></span></h4>
									<h4 class="small font-weight-bold"><strong>Sexo</strong>: <span><?php echo $RSexo ?></span></h4>
									<h4 class="small font-weight-bold"><strong>Fecha de lectura</strong>: <span><?php echo $RfechaLectura ?></span></h4>
									<hr>
                                    <h4 class="small font-weight-bold">Ritmo cardiaco<span
                                            class="float-right"><?php echo $RRitmoCardiaco ?> BPMs</span></h4>
                                    <div class="progress mb-4">
									<?php if($RRitmoCardiaco < 60 ){ ?>	
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $RRitmoCardiaco ?>% "
                                            aria-valuenow="40" aria-valuemin="50" aria-valuemax="140"></div>
									<?php }elseif($RRitmoCardiaco > 60 &&  $RRitmoCardiaco < 100 ){ ?>
										<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $RRitmoCardiaco ?>%"
                                            aria-valuenow="40" aria-valuemin="50" aria-valuemax="140"></div>
									<?php }elseif($RRitmoCardiaco > 101 &&  $RRitmoCardiaco < 150 ){ ?>
										
										<div class="progress-bar bg-warning" role="progressbar" style="width: <?php echo $RRitmoCardiaco ?>% "
                                            aria-valuenow="40" aria-valuemin="50" aria-valuemax="140"></div>
									<?php }elseif($RRitmoCardiaco > 150 ){ ?>
										<div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $RRitmoCardiaco ?>%"
                                            aria-valuenow="40" aria-valuemin="50" aria-valuemax="140"></div>
									<?php } ?>	
                                    </div>
                                    <h4 class="small font-weight-bold">Concentracion de Oxigeno<span
                                            class="float-right"><?php echo $RConcOxigeno ?> %</span></h4>
                                    <div class="progress mb-4">
									<?php if($RConcOxigeno < 80 ){ ?>		
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $RConcOxigeno ?>%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
									<?php }elseif($RConcOxigeno > 90  &&  $RConcOxigeno < 98){ ?>	
										<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $RConcOxigeno ?>%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
									<?php }elseif($RConcOxigeno > 99){ ?>
										<div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $RConcOxigeno ?>%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="100"></div>
									<?php } ?>	
                                    </div>
                                    <h4 class="small font-weight-bold">Temperatura<span
                                            class="float-right"><?php echo $RTemperatura ?> °C</span></h4>
                                    <div class="progress mb-4">
									<?php if($RTemperatura < 36.5 ){ ?>	
                                        <div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $RTemperatura ?>%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
									<?php }elseif($RTemperatura > 36.5  &&  $RTemperatura < 37.5){ ?>
										<div class="progress-bar bg-success" role="progressbar" style="width: <?php echo $RTemperatura ?>%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="100"></div>
									<?php }elseif($RTemperatura > 37.5 ){ ?>
										<div class="progress-bar bg-danger" role="progressbar" style="width: <?php echo $RTemperatura ?>%"
                                            aria-valuenow="80" aria-valuemin="0" aria-valuemax="40"></div>
									<?php } ?>	
                                    </div>
								<?php if($RTemperatura < 36.5  ){ ?>	
									<div class="alert alert-danger" role="alert">
									  ¡Paciente con signos de Hipotermia!
									</div>
								<?php } ?>
								<?php if($RTemperatura  > 37.5  ){ ?>	
									<div class="alert alert-danger" role="alert">
									  ¡Paciente con signos de Fiebre!
									</div>
								<?php } ?>
								<?php if($RConcOxigeno  < 80  ){ ?>	
									<div class="alert alert-danger" role="alert">
									  ¡Paciente con signos de Hipoxemia!
									</div>
								<?php } ?>
								<?php if($RConcOxigeno  > 99  ){ ?>	
									<div class="alert alert-danger" role="alert">
									  ¡Paciente con signos de Hiperoxemia!
									</div>
								<?php } ?>
								<?php if($RRitmoCardiaco < 60){ ?>	
									<div class="alert alert-danger" role="alert">
									  ¡Paciente con signos de Bradicardia!
									</div>
								<?php } ?>
								<?php if($RRitmoCardiaco > 150){ ?>	
									<div class="alert alert-danger" role="alert">
									  ¡Paciente con signos de Infarto Cardiaco!
									</div>
								<?php } ?>
								<?php if($RRitmoCardiaco > 101 &&  $RRitmoCardiaco < 150){ ?>	
									<div class="alert alert-warning" role="alert">
									  ¡Paciente con sintomas de tension alta!
									</div>
								<?php } ?>	
                                </div>
                            </div>

                            <!-- Color System -->
                            

                        </div>

                        <div class="col-lg-6 mb-4">

                            <!-- Illustrations -->
                            

                            <!-- Approach -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Datos de utilidad&nbsp;</h6>
                                </div>
                                <div class="card-body">
                                    <p><strong>Frecuencia cardíaca en tiempo real:</strong> La aplicación proporciona la frecuencia cardíaca actualizada del paciente, lo que permite a los profesionales de la salud monitorear de cerca el ritmo cardíaco y detectar cualquier anomalía o fluctuación significativa.</p>

<p><strong>Niveles de oxígeno en sangre:</strong> La aplicación muestra los niveles de oxígeno en la sangre del paciente en tiempo real. Esto es especialmente útil para evaluar la capacidad de oxigenación y detectar posibles problemas respiratorios o insuficiencia de oxígeno.</p>

<p><strong>Alertas de valores anormales:</strong> HandTriage envía alertas inmediatas cuando los datos biométricos, como la frecuencia cardíaca o los niveles de oxígeno, se encuentran fuera de los rangos normales. Esto permite una respuesta rápida y atención médica adecuada en situaciones críticas.</p>

<p><strong>Tendencias y gráficos históricos:</strong> La aplicación registra y muestra las tendencias y gráficos históricos de los datos biométricos del paciente. Esto permite a los profesionales de la salud evaluar el progreso a lo largo del tiempo y hacer comparaciones para identificar patrones o cambios significativos.</p>

<p><strong>Recopilación de datos ambientales:</strong> Además de los datos biométricos, HandTriage recopila información ambiental, como la temperatura y la calidad del aire circundante. Estos datos proporcionan un contexto adicional para evaluar la salud del paciente y detectar posibles factores ambientales que puedan influir en su bienestar.</p>
                                  
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>HandTriage &copy; areandina.edu.co 2023</span>
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
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
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
    <script src="vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="js/demo/chart-area-demo.js"></script>
    <script src="js/demo/chart-pie-demo.js"></script>

</body>

</html>