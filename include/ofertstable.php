<?php
if (!isset($con)) {
    include "../conf/connexion.php";
    include '../ajax/pagination.php';
    $con = $conn;
}

?>
<link rel="stylesheet" href="css/style.css" />
<style>
    #myTable{
        margin: 0 auto;
        width: 80%;
        height: 100%;
    }


</style>
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
        $query = mysqli_query($con, "select * from oferts");
        $rowusr = mysqli_fetch_array($query);
        $count = $rowusr['usuario'];
    }

    $aColumns = array('usuario'); //Columnas de busqueda
    $sTable = "oferts";
    $sWhere = "";
    if (isset($_REQUEST['q'])) {
        $q = mysqli_real_escape_string($con, $_REQUEST['q']);
        $sWhere = "WHERE (";
        for ($i = 0; $i < count($aColumns); $i++) {
            $sWhere .= $aColumns[$i] . " LIKE '%" . $q . "%' OR CONCAT(descripcion, ' ', lastname) LIKE '%" . $q . "%' OR user_email LIKE '%" . $q . "%' OR";
        }        $sWhere = rtrim($sWhere, "OR") . ")";
    }

    $sWhere .= " order by usuario desc";
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
        <table class="table table-striped" id="myTable">
            <tr>
                <th scope="row">Usuario</th>
                <th scope="row">Descripcion</th>
                <th scope="row">Tipo</th>
            </tr>
            <?php
            $number = 0;
            //while($row = mysqli_fetch_array($result))
            //{

            if ($result = ($query)) {
                // while ($row = $result->fetch_assoc()) {
                while ($row = mysqli_fetch_array($result)) {
                    $usuario = $row["usuario"];
                    $descripcion = $row["descripcion"];
                    $tipo = $row["tipo"];
                    $cargardatos =  $usuario . "||" . $descripcion . "||" . $tipo;
            ?>
                    <tbody id="myTable">
                        <tr>
                            <td><?php echo $usuario ?></td>
                            <td><?php echo $descripcion ?></td>
                            <td><?php echo $tipo ?></td>
                                                  </tr>
                    </tbody>

            <?php
                }
            }

            ?>
        </table>
    </div>

    <div class="d-flex justify-content-center" style="background-color:white; margin:auto; padding:0px; border-top: 1px solid #ccc">
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
        $('#usuario').val(arreglo[0])
        $('#descripcion').val(arreglo[1])
        $('#tipo').val(arreglo[2])
    }

    function ver(cargardatos) {
        array2 = cargardatos.split("||");
        $('#usuario1').val(array2[0])
        $('#descripcion1').val(array2[1])
        $('#tipo1').val(array2[2])
    }

    function confirmar(mensaje) {
        return (confirm(mensaje)) ? true : false;
    }
</script>