<?php
if (!isset($con)) {
    include "../conf/connexion.php";
    include '../ajax/pagination.php';
    $con = $conn;
}

?>
<link rel="stylesheet" href="css/style.css" />
<script>
    function load(page) {
        var q = $("#q").val();
        $.ajax({
            url: 'include/paginadousers.php?q=ajax&page=' + page + '&q=' + q,
            success: function(data) {
                $(".outer_div").html(data).fadeIn('slow');

            }
        })
    };

    function search(page) {
        var q = $("#q").val();
        $.ajax({
            type: "GET",
            data: "id=" + id,
            "q": q,
        })
        load(1);
    };
</script>

<div class="container-fluid  outer_div" style="padding:0px;">

    <?php



    if (isset($_GET['id'])) {
        $id = intval($_GET['id']);
        $query = mysqli_query($con, "select * from users where user_id='" . $id . "'");
        $rowusr = mysqli_fetch_array($query);
        $count = $rowusr['user_id'];
    }

    $aColumns = array('user_name'); //Columnas de busqueda
    $sTable = "users";
    $sWhere = "";
    if (isset($_REQUEST['q'])) {
        $q = mysqli_real_escape_string($con, $_REQUEST['q']);
        $sWhere = "WHERE (";
        for ($i = 0; $i < count($aColumns); $i++) {
            $sWhere .= $aColumns[$i] . " LIKE '%" . $q . "%' OR CONCAT(firstname, ' ', lastname) LIKE '%" . $q . "%' OR user_email LIKE '%" . $q . "%' OR";
        }
        $sWhere = rtrim($sWhere, "OR") . ")";
    }

    $sWhere .= " order by user_id desc";

    //pagination variables
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $per_page = 10; //how much records you want to show
    $adjacents  = 4; //gap between pages after number of adjacents
    $offset = ($page - 1) * $per_page;
    //Count the total number of row in your table*/
    $count_query   = mysqli_query($con, "SELECT count(*) AS numrows FROM $sTable  $sWhere");
    $row = mysqli_fetch_array($count_query);
    $numrows = $row['numrows'];
    $total_pages = ceil($numrows / $per_page);
    $reload = '?.php';
    //main query to fetch the data
    $sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
    $query = mysqli_query($con, $sql);


    //loop through fetched data
    //if ($numrows > 0) {
    ?>
    <!------------- Scroll div ------>
    <div class="boxscroll">
        <?php
        //include("CRUD/crudusers/eliminaruser.php");
        ?>
        <table class="table table-bordered">
            <tr style="background-color:  rgb(9, 9, 9, 0.9); color:white ;">
                <th>#</th>
                <th class="row col-3">Nombres</th>
                <th>Usuario</th>
                <th>Email</th>
                <th class="row col-1">Us. Tipo</th>
                <th>Fecha Creacion</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
            <?php
            $number = 0;
            //while($row = mysqli_fetch_array($result))
            //{



            if ($result = ($query)) {
                // while ($row = $result->fetch_assoc()) {
                while ($row = mysqli_fetch_array($result)) {
                    $number++;
                    $userid = $row["user_id"];
                    $name = $row["firstname"];
                    $lastname = $row["lastname"];
                    $username = $row["user_name"];
                    $email = $row["user_email"];
                    $tipo = $row["id_tipo"];
                    $dateadd = $row["date_added"];
                    $status = $row["estado"];
                    $passcifred = $row["user_password_hash"];

                    $perfil = "Invalido";
                    if ($tipo == 1) {
                        $perfil = "Admin";
                    }
                    if ($tipo == 2) {
                        $perfil = "Colaborador";
                    }
                    if ($tipo == 3) {
                        $perfil = "Usuario";
                    }
                    
                    $cargardatos = $userid . "||" . $name . "||" . $lastname . "||" . $username . "||" . $email . "||" . $tipo . "||" . $dateadd . "||" . $status . "||" . $passcifred;



            ?>


                    <tbody id="myTable">
                        <tr>
                            <td><?php echo $number ?></td>
                            <td><?php echo $name . ' ' . $lastname ?></td>
                            <td><?php echo $username ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo $perfil ?></td>
                            <td><?php echo $dateadd ?></td>
                            <td><?php echo $status ?></td>
                            <td align="center" style="font-size: 12px; padding:0;" class="col-1">
                                <div class="btn btn-group row">
                                    <button onclick="ver('<?php echo $cargardatos ?>')" type="button" title="Ver Registro" class="btn btn-secondary  btn-xs" data-toggle="modal" data-target="#leeruser">
                                        <span class="glyphicon glyphicon-eye-open"></span></a>
                                        <button onclick="cargardatoseditar('<?php echo $cargardatos ?>')" type="button" title="Editar Registro" class="btn btn-warning btn-xs" data-toggle="modal" data-target="#editarmodal">
                                            <span class="glyphicon glyphicon-cog"></span></button>
                                        <a class="btn btn-danger  btn-xs" title="Eliminar Registro" href="crudusers/eliminaruser.php?id=<?php echo $userid ?>" onclick="return confirmar('Seguro que desea eliminar este registro?!')">
                                            <span class="glyphicon glyphicon-trash"></span></a>
                                </div>
                            </td>
                        </tr>
                    </tbody>

            <?php
                }
            }



            ?>
        </table>
    </div>

    <div class="d-flex justify-content-center" style="background-color:azure; margin:auto; padding:0px; border-top: 1px solid #ccc">
        <?php

        echo paginate($reload, $page, $total_pages, $adjacents);
        $result->free();
        ?>
    </div>
</div>

<script>
    $(document).ready(function() {
        $("#inlineFormInput").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });

    function cargardatoseditar(cargardatos) {
        arreglo = cargardatos.split("||");
        $('#id').val(arreglo[0])
        $('#nombre').val(arreglo[1])
        $('#apellido').val(arreglo[2])
        $('#usuario').val(arreglo[3])
        $('#email').val(arreglo[4])
        $('#role').val(arreglo[5])
        $('#fecha').val(arreglo[6])
        $('#estado').val(arreglo[7])
        $('#pass').val(arreglo[8])
        $('#id2').val(arreglo[0])
    }

    function ver(cargardatos) {
        array2 = cargardatos.split("||");
        $('#id1').val(array2[0])
        $('#nombre1').val(array2[1])
        $('#apellido1').val(array2[2])
        $('#usuario1').val(array2[3])
        $('#email1').val(array2[4])
        $('#perfil1').val(array2[5])
        $('#fecha1').val(array2[6])
        $('#estado1').val(array2[7])
        $('#pass1').val(array2[8])
    }

    function confirmar(mensaje) {
        return (confirm(mensaje)) ? true : false;
    }
</script>