<?php
    include 'index.php';
    $buscar = $_POST['buscar'];
    $SQL_READ = "SELECT * FROM catalogo WHERE nombre LIKE '%".$buscar."%'
    OR editorial LIKE '%".$buscar."%'"; //Parametro de busqueda
    $sql_query = mysqli_query($conection, $SQL_READ);
?>