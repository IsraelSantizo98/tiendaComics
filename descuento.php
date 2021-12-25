<?php
    include 'php/conection.php';
    $idDescuento = $_GET['codDescuento'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" crossorigin="crossorigin" as="font">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans&family=PT+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <title>MangaGT</title>
</head>
<body>
    <header>
        <div class="barra">
            <a href="index.php">
                <h1 class="centrar-texto logo_nombre no-margin">Manga<span class="logo__bold">GT</span></h1>
            </a>
            <nav>
                <ul class="menu">
                    <li><a href="#" class="link">Catalogo</a></li>
                    <li><a href="ofertas.html" class="link">Ofertas</a></li>
                    <li><a href="#" class="link">Cuenta</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="contenedor section">
        <main class="contenido-producto">
            <?php
                $instruction = "SELECT * FROM oferta
                INNER JOIN catalogo ON oferta.FK_catalogo = catalogo.idCatalogo
                INNER JOIN categoria ON oferta.FK_categoria = categoria.idCategoria
                INNER JOIN precio ON oferta.FK_precio = precio.idPrecio
                INNER JOIN saga ON oferta.FK_saga = saga.idSaga
                WHERE idOferta = '$idDescuento'";
                $query = mysqli_query($conection, $instruction);
                while($row = mysqli_fetch_assoc($query)){
            ?>
            <div class="producto__imagen">
                <picture>
                    <img src="<?= $row['portada']?>" alt="Chainsaw Man V1" class="imgH">
                </picture>
            </div>
            <div class="producto__descripcion">
                <h2 class="no-margin"><?= $row['nombre']?></h2>
                <span>Volumen <?= $row['volumen']?></span>
                <p class="centrar-texto"><?= $row['descripcion']?></p>
            </div>
            <div class="producto__badge">
                <p class="centrar-texto">
                    <span class="capsulas badge"><?= $row['genero']?></span>
                    <span class="capsulas badge"><?= $row['genero']?></span>
                    <span class="capsulas badge"><?= $row['genero']?></span>
                </p>
            </div>
            <div class="producto__precio">
                <p class="centrar-texto">Existencia <?= $row['existencia']?></>
                <p class="centrar-texto">Q<?= $row['precioNormal']?>.00</>
                <div class="producto__comprar">
                    <a href="#" class="btn btn-primario">Comprar</a>
                </div>
            </div>
            <?php
                }
            ?>
        </main>
        <div class="section producto__detalle border-top">
            <h2 class="centrar-texto">Detalles del producto</h2>
            <ul class="centrar-texto">
                <li>Tipo de producto: <span class="texto-bold">Individuales</span></li>
                <li>Categorías: <span class="texto-bold">Mangas</span></li>
                <li>Marca: <span class="texto-bold"><?= $row['nombreEdi']?></span></li>
                <!-- <li>Autor(es): <span class="texto-bold">Tatsuki Fujimoto</span></li> -->
                <li>Número de páginas: <span><?= $row['paginas']?></span></li>
                <li>Encuadernación: <span class="texto-bold"><?= $row['tipoPasta']?></span></li>
                <li>Fecha de lanzamiento: <span class="texto-bold"><?= $row['fechaLanzamiento']?></span></li>
            </ul>
        </div>
        <div class="producto__recomendados section">
            <h2>Recomendados</h2>
            <div class="contenido__recomendados">
                <div class="producto">
                    <div class="recomendado__imagen">
                        <picture>
                            <img src="img/blackcover1.jpg" alt="VOl1">
                        </picture>
                    </div>
                </div> <!-- /recomendado -->
                <div class="producto">
                    <div class="recomendado__imagen">
                        <picture>
                            <img src="img/onepunch1.jpg" alt="VOl1">
                        </picture>
                    </div>
                </div> <!-- /recomendado -->
                <div class="producto">
                    <div class="recomendado__imagen">
                        <picture>
                            <img src="img/kimetsu1.jpg" alt="VOl1">
                        </picture>
                    </div>
                </div> <!-- /recomendado -->
                <div class="producto">
                    <div class="recomendado__imagen">
                        <picture>
                            <img src="img/jujutsu1.jpg" alt="VOl1">
                        </picture>
                    </div>
                </div> <!-- /recomendado -->
            </div>
        </div>
    </div>
    <footer class="footer section">
        <div class="contenedor">
            <div class="barra">
                <a href="index.html">
                    <h1 class="centrar-texto logo__nombre">Manga<span class="logo__bold">GT</span></h1>
                </a>
                <nav>
                    <ul class="menu">
                        <li><a href="#" class="link">Catalogo</a></li>
                        <li><a href="#" class="link">Ofertas</a></li>
                        <li><a href="#" class="link">Cuenta</a></li>
                    </ul>
                </nav>
            </div>
        </div>
    </footer>
</body>
</html>