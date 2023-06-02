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
    <div class="boxscrollpag">
        <?php
        //include("CRUD/crudusers/eliminaruser.php");
        ?>
        <table class="table table-striped">
            <div class="row">
            <tr style="background-color:  rgb(9, 9, 9, 0.7); color:white; font-size:15px;">
                    <th class="col-1 text-center"># Pag</th>
                    <th class="col-3 ">Nombres</th>
                    <th class="col-1 ">Usuario</th>
                    <th class="col-2 ">Email</th>
                    <th class="col-1  text-center">Us. Tipo</th>
                    <th class="col-2 ">Fecha Creacion</th>
                    <th class="col-1  text-center">Estado</th>
                    <th class="col-1  text-center">Acciones</th>
                </tr>
            </div>
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
                        $perfil = "Auditor";
                    }
                    if ($tipo == 3) {
                        $perfil = "Inspector";
                    }

                    $cargardatos = $userid . "||" . $name . "||" . $lastname . "||" . $username . "||" . $email . "||" . $tipo . "||" . $dateadd . "||" . $status . "||" . $passcifred;



            ?>


                    <tbody id="myTable">
                        <tr>
                            <td align="center"><?php echo $number ?></td>
                            <td><?php echo $name . ' ' . $lastname ?></td>
                            <td><?php echo $username ?></td>
                            <td><?php echo $email ?></td>
                            <td><?php echo $perfil ?></td>
                            <td><?php echo $dateadd ?></td>
                            <td align="center"><?php echo $status ?></td>
                            <td style="font-size: 10px; padding:0;" class="col-1">
                                    <div class="btn btn-group row">
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editar" onclick="agregaform('<?php echo $cargardatos ?>')">
                                            <span class="glyphicon glyphicon-edit"></span></button>
                                        </button>
                                        <button class="btn btn-danger btn-sm " onclick="return confirmar(id='<?php echo $userid; ?>')">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
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

    <div class="text-center">
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
</script>