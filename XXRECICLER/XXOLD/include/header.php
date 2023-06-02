<!--HEADER-- ->
<meta charset="utf-8">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

< !-- CSS Style- ->
<link rel="stylesheet" href="css/style.css" />
< !-- CSS  - ->
<link rel="shortcut icon" href="images/CIR1.png"> -->
<!--HEADER--->
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<!-- CSS Style-->
<link rel="stylesheet" href="bootstrap4/css/bootstrap.min.css" />
<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css" />
<link rel="stylesheet" href="css/style.css" />

<link href="bootstrap/fonts/glyphicons-halflings-regular.eot" rel="stylesheet">
  <link href="bootstrap/fonts/glyphicons-halflings-regular.svg" rel="stylesheet">
  <link href="bootstrap/fonts/glyphicons-halflings-regular.ttf" rel="stylesheet">
  <link href="bootstrap/fonts/glyphicons-halflings-regular.woff" rel="stylesheet">
<!-- JS -->
<script src="ajax/libs/jquery.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
<!-- Icono -->
<link rel="shortcut icon" href="images/cirpro.png">

<?php
if (isset($spinner))
{
?>
<!---INICIO de spinner-------------->
<script>
    function showSpinner() {
        var spinner = document.getElementById("spinner");
        spinner.style.display = "block";
    }

    function hideSpinner() {
        var spinner = document.getElementById("spinner");
        spinner.style.display = "none";
    }

    window.onload = function() {
        showSpinner();
    };
</script>
<style>
    #spinner {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        z-index: 9999;
        border: 16px solid #f3f3f3;
        border-top: 16px solid #3498db;
        border-radius: 50%;
        width: 120px;
        height: 120px;
        animation: spin 2s linear infinite;
    }

    @keyframes spin {
        0% {
            transform: rotate(0deg);
        }

        100% {
            transform: rotate(360deg);
        }
    }
</style>

<?php
}
?>
<!---END spinner-------------->
<!--FIN HEADER--->