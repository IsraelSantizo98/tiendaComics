<?php
    include 'php/conection.php';
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
    <header class="principal">
        <div class="barra">
            <a href="index.php">
                <h1 class="centrar-texto logo_nombre no-margin">Manga<span class="logo__bold">GT</span></h1>
            </a>
            <nav>
                <ul class="menu">
                    <li><a href="catalogo.php" class="link">Catalogo</a></li>
                    <li><a href="ofertas.php" class="link">Ofertas</a></li>
                    <li><a href="cuenta.php" class="link">Cuenta</a></li>
                </ul>
            </nav>
            <form action="catalogo.php" method="POST">
                <input type="text" name="buscar">
                <input type="submit" value="Buscar">
            </form>
        </div>
        <div class="header__texto">
            <h2 class="no-margin">Lo más te gusta en un mismo lugar</h2>
            <p class="no-margin">Todo del mundo del Manga</p>
        </div>
    </header>
    <div class="contenedor">
        <h2 class="centrar-texto ">Ultimos Ingresados</h2>
        <main class="contenido-principal section">
            <?php
                $instruccion = "Select * FROM catalogo ORDER BY nombre, volumen ASC limit 6";
                $query = mysqli_query($conection, $instruccion);
                while ($row = mysqli_fetch_assoc($query)){?>
                    <div class="producto">
                <div class="producto__imagen">
                    <picture>
                        <a href="producto.html">
                            <img src="<?= $row['portada']?>" alt="Chainsaw Man V1" class="imgH">
                        </a>
                    </picture>
                    <h3 class="no-margin"><?= $row ['nombre']?> #<?= $row['volumen']?></h3>
                    <p class="no-margin"><?= $row['volumen']?></p>
                    <p class="no-margin">Q<?= $row['precio']?>.00</p>
                    <p><?= $row['idCatalogo']?></p>
                </div>
            </div>
            <?php    
                }
            ?>
        </main>    
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