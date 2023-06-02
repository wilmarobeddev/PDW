<?php
$rutaimage = "images/logobanner.png";
?>
<!----DIV BANNER 
usuarios 
1= Administrador
2= Prestador De Servicio
3= Contratista
--->
<div class="container-fluid" style="background-color: rgb(23, 32, 42, 0.99); padding:10px; border-bottom:solid orange 3px;">
      <div class="row">
            <a class="col-1" style="margin:0;" title="Home" href="home.php"> <img src="<?php echo $rutaimage ?>" width="85"> </a>


            <div class="btn-group justify-content-center col" role="group" aria-label="Button group with nested dropdown" style="margin:auto; margin-left:15%;">

                  <?php
                  if (!isset($_SESSION['loginuser']) || empty($_SESSION['loginuser']) || $_SESSION['rol'] == 2) {
                  ?>
                       
                  <a type="button" class="btn btn-secondary" style="color:white;" href="?.php">
                        <span style="padding:3px;" class="glyphicon glyphicon-th-list"></span>Domicilios
                  </a>
                  <a type="button" class="btn btn-secondary" style="color:white;" href="?.php">
                        <span style="padding:3px;" class="glyphicon glyphicon-th-list"></span>Instalacion
                  </a>
                  <a type="button" class="btn btn-secondary" style="color:white;" href="?.php">
                        <span style="padding:3px;" class="glyphicon glyphicon-th-list"></span>Mundanzas
                  </a>
                  <?php
                  }
                  ?>
                  <?php
                  if (!isset($_SESSION['loginuser']) || empty($_SESSION['loginuser']) || $_SESSION['rol'] == 1) {
                  ?>
                        <a type="button" class="btn btn-secondary" style="color:white;" href="users.php">
                              <span style="padding:3px;" class="glyphicon glyphicon-user"></span>Usuarios
                        </a>
                       
                  <?php
                  }
                  ?>
                   <a type="button" class="btn btn-secondary" style="color:white;" href="oferts.php">
                              <span style="padding:3px;" class="glyphicon glyphicon-list-alt"></span>Ofertas
                        </a>
                  <div class="btn-group" role="group">
                        <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                              <span style="padding:3px;" class="glyphicon glyphicon-th-list"></span>Mis preferencias
                        </button>
                        <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                              <a class="dropdown-item" href="?.php">
                                    <span style="padding:3px;" class="glyphicon glyphicon-tag"></span>
                                    Historial de servicios</a>
                              <a class="dropdown-item" href="?.php">
                                    <span style="padding:3px;" class="glyphicon glyphicon-tag"></span>
                                    Mejor Calificados</a>
                        </div>
                  </div>
            </div>
            
            <div class="container col-3">
                  <div class="btn btn-group" style="margin:auto; padding-right:0;">

                        <a type="button" title="Home" class="btn btn-warning" style="color:white;" href="home.php">
                              <span style="padding:1px;" class="glyphicon glyphicon-home"></span> Inicio
                        </a>

                        <div class="btn-group" role="group">
                              <button id="btnGroupDrop1" type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span style="padding:1px;" class="glyphicon glyphicon-cog"></span> Configuracion
                              </button>
                              <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">


                                    <?php
                                    //if (!isset($_SESSION['loginuser']) || empty($_SESSION['loginuser']) || $_SESSION['rol'] == 1) {
                                    ?> 
                                          <a class="dropdown-item" href="info.php">
                                                <span style="padding:3px;" class="glyphicon glyphicon-info-sign"></span>
                                                Ayuda</a>
                                    <?php
                                    //}
                                    ?>

                                    <a class="dropdown-item" href="profile.php">
                                          <span style="padding:3px;" class="glyphicon glyphicon-user"></span>
                                          <?php
                                          $saludo = $_SESSION["nombrecompleto"];
                                          echo $saludo;
                                          ?></a>
                                    <a class="dropdown-item" href="conf/logout.php">
                                          <span style="padding:3px;" class="glyphicon glyphicon-off"></span>
                                          Salir</a>
                              </div>
                        </div>

                  </div>
            </div>


      </div>
</div>
<!----FIN DE DIV BANNER --->