<?php
if (!isset($con)) {
    include "../conf/connexion.php";
    include("../conf/sessionstart.php");
    include '../ajax/pagination.php';
    $con = $conn;
}

if (!isset($saludo)) {
    $saludo = $_SESSION["nombrecompleto"];
}

?>
<link rel="stylesheet" href="css/style.css" />
<script>
    function load(page) {
        var q = $("#q").val();
        $.ajax({
            url: 'include/pagoferts.php?q=ajax&page=' + page + '&q=' + q,
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
        $id_documento = intval($_GET['id']);
        $query = mysqli_query($con, "select * from oferts where ID='" . $id_documento . "'");
        $rw_documentos = mysqli_fetch_array($query);
        $count = $rw_documentos['ID'];
    }

    $aColumns = array('tipo'); //Columnas de busqueda
    $sTable = "oferts";
    $sWhere = "";
    if (isset($_REQUEST['q'])) {
        $q = mysqli_real_escape_string($con, $_REQUEST['q']);
        $sWhere = "WHERE (";
        for ($i = 0; $i < count($aColumns); $i++) {
            $sWhere .= $aColumns[$i] . " LIKE '%" . $q . "%' OR descripcion LIKE '%" . $q . "%' OR ";
        }
        $sWhere = substr_replace($sWhere, "", -3);
        $sWhere .= ')';
    }

    $sWhere .= " order by ID DESC";

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
    $reload = 'paginadocs.php';
    //main query to fetch the data
    $sql = "SELECT * FROM  $sTable $sWhere LIMIT $offset,$per_page";
    $query = mysqli_query($con, $sql);



    //CODE LOGIN
    $usuarioLogeadoId = $_SESSION['id']; // Obtener el ID del usuario logeado desde la sesión
    ?>
    <!------------- Scroll div ------>
    <div class="boxscrollpag container">
        <table class="table table-striped">
            <thead>
                <tr style="background-color:  rgb(9, 9, 9, 0.7); color:white; font-size:15px;">
                    <th>Usuario </th>
                    <th >Solicitud</th>
                    <th >Categoria</th>
                    <th>Acciones </th>
                </tr>
            </thead>
            <?php
            $number = 0;
            if ($result = $query) {
                while ($row = mysqli_fetch_array($result)) {
                    $id = $row["ID"];
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
                            <?php
                              if ($saludo == $usuario) {
                            ?>
                                <td style="font-size: 10px; padding:0;" class="col-1">
                                    <div class="btn btn-group row">
                                        <button class="btn btn-warning btn-sm" data-toggle="modal" data-target="#editar" onclick="agregaform('<?php echo $cargardatos ?>')">
                                            <span class="glyphicon glyphicon-edit"></span></button>
                                        </button>
                                        <button class="btn btn-danger btn-sm " onclick="return confirmar(id='<?php echo $id; ?>')">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </div>
                                </td>
                            <?php
                            }
                            ?>

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

    // function cargardatosver(cargardatos) {
    //     array = cargardatos.split("||");
    //     $('#id').val(array[0])
    //     $('#Placa').val(array[1])
    //     $('#nombre').val(array[2])
    //     $('#vence').val(array[3])
    //     $('#notas').val(array[4])
    // }

    // function cargardatoseditar(cargardatos) {
    //     array = cargardatos.split("||");
    //     $('#id_e').val(array[0])
    //     $('#placa_e').val(array[1])
    //     $('#nombre_e').val(array[2])
    //     $('#vence_e').val(array[3])
    //     $('#notas_e').val(array[4])
    // }


    // function confirmar(mensaje) {
    //     return (confirm('Seguro que desea eliminar este registro ?!')) ? true : false;
    // }
</script>