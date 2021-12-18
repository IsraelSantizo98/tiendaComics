<?php
    include 'conection.php';
    if(!isset($_POST['buscar'])){
        $_POST['buscar'] = "";
        $buscar = $_POST['buscar'];
    }
    $buscar = $_POST['buscar'];
    $SQL_READ = "SELECT * FROM catalogo WHERE nombre LIKE '.$buscar.'
    OR editorial LIKE '.$buscar.'"; //Parametro de busqueda
    /*$SQL_READ = "SELECT * FROM catalogo WHERE nombre LIKE '%".$buscar."%'
    OR editorial LIKE '%".$buscar."%'"; //Parametro de busqueda*/
    $sql_query = mysqli_query($conection, $SQL_READ);
?>