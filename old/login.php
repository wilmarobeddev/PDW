<!DOCTYPE html>
<html lang="en">
<?php
include("include/header.php");
$rutaimg = "images/icono.png"
?>

<body class="bodylogin">
      <?php
      if (isset($_POST['sublogin'])) {
            include("conf/validarlogin.php");
      }

      require("conf/connexion.php");
      include("crudusers/registroauto.php");
      include("crudusers/procesauserauto.php");
      ?>

      <div class="container-fluid " style="width:600px; padding:0px; margin-top:2%; margin-right:3%;">


            <div class="container-fluid" style=" background-color:transparent; color:black; margin:auto; padding:5px; margin-bottom:0px;">
                  <?php if (isset($_POST["sublogin"])) {    ?>
                        <div class="alert alert-danger" role="alert">
                              <button type="button" class="close" data-dismiss="alert">&times;</button>
                              <?php if ($message != "") {
                                    echo $message;
                              } ?>
                        </div>
                  <?php
                  } ?>
                  <div class="row" style="padding:0;">
                        <div class="col col-sm-4"></div>
                        <img class="col img" src="<?php echo $rutaimg; ?>" style="margin:auto; width: 20px;;">
                        <div class="col col-sm-4"></div>
                  </div>
                  <form method="post" accept-charset="utf-8" name="frmUser" autocomplete="off" role="form" class="form-signin row">
                        <!---<img class="col-3" src="< ?php echo $rutaimg; ?>" style="width: 200px; margin:auto; padding:8px;"> -->

                        <div class="row" style="color:black; margin:auto; padding:18px; width: 450px; background-color:rgb(255,255,255, 0.9);">
                              <div class="col-12">
                                    <label class="row justify-content-start" style="margin:auto;">User o email :</label>
                                    <input class="form-control" placeholder="Aqui tu usuario" name="userName" type="text" required>
                              </div>

                              <div class="col-12 form"><br>
                                    <label class="row justify-content-start" style="margin:auto;">Password :</label>
                                    <input class="form-control" placeholder="Contraseña" name="password" type="password" required> <br>

                                    <button type="submit" class="btn btn-warning" name="sublogin" id="sublogin">Iniciar Sesión</button>

                                    <!---<div style="display:flex; align-items:center;">
                                         <input type="checkbox" name="connected" class="form-check-input" id="connected">
                                           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                          <label for="connected" class="form-check-label">Mantenerme conectado</label> 
                                    </div> --->
                                    <hr>
                              </div>

                              <div class="container w-100 my-3">
                                    <div class="row">
                                          <div class="col">
                                                <button class="btn btn-outline-primary w-100 my-1">
                                                      <div class="row align-items-center">
                                                            <div class="col-6 d-none d-md-block">
                                                                  <img src="images/fb.png" width="32" alt="">&nbsp;<a href="https://www.facebook.com/login"> Autenticarme con facebook </a>
                                                            </div>



                                                      </div>
                                                </button>
                                          </div>
                                          <div class="col">
                                                <button class="btn btn-outline-danger w-100 my-1">
                                                      <div class="row align-items-center">
                                                            <div class="col-6 d-none d-md-block">
                                                                  <img src="images/google.png" width="32" alt="">&nbsp;<a href="https://accounts.google.com/signin"> Autenticarme con Google </a>
                                                            </div>
                                                      </div>
                                                </button>
                                          </div>
                                    </div>
                                    <div class="my-3">
                                          <span>No tienes cuenta? <button type="button" class="btn btn-xs btn-secondary" data-toggle="modal" data-target="#nuevo">Regístrate</button></span>
                                          <br>
                                          <span><a href="#">Recuperar clave de acceso</a></span>
                                    </div>
                              </div>
                        </div>
                  </form>

            </div>
            <!---< ?php include("include/footer.php") ?> --->
      </div><!-- /container -->
</body>


</html>