<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="Style.css">
    <link rel="icon" type="image/png" href="../img/LogoTECGO_STORE.png">
    <link href='https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../Nav/stylee.css">
    <title>Categorias</title>
</head>
<body>
    <div include-html="../Nav/nav.php"></div>
    <nav class="sidebar">
        <header>
            <i class='bx bx-chevron-right toggle'></i>
        </header>
        <div class="menu-bar">
            <div class="menu">
                <ul class="menu-links">
                    <li><a href="#">Tipos de categoría</a></li>
                    <li class="nav-link"><a href="../Categoria/Audio&Sonido.php"><i class='bx bx-volume-full'></i><span>Audio & Sonido</span></a></li>
                    <li class="nav-link"><a href="../Categoria/AcceCab.php"><i class='bx bx-plug'></i><span>Accesorios & Cables</span></a></li>
                    <li class="nav-link"><a href="../Categoria/Computadoras.php"><i class='bx bx-laptop'></i><span>Computadoras</span></a></li>
                    <li class="nav-link"><a href="../Categoria/Componentes.php"><i class='bx bx-cog'></i><span>Componentes</span></a></li>
                    <li class="nav-link"><a href="../Categoria/Monitores.php"><i class='bx bx-desktop'></i><span>Monitores</span></a></li>
                    <li class="nav-link"><a href="../Categoria/Perifericos.php"><i class='bx bx-mouse'></i><span>Periféricos</span></a></li>
                    <li class="nav-link"><a href="../Categoria/ProEle.php"><i class='bx bx-shield'></i><span>Protección Electrónica</span></a></li>
                    <li class="nav-link"><a href="../Categoria/Redes.php"><i class='bx bx-network-chart'></i><span>Redes</span></a></li>
                    <li class="nav-link"><a href="../Categoria/Servidores.php"><i class='bx bx-server'></i><span>Servidores</span></a></li>
                    <li class="nav-link"><a href="../Categoria/Software.php"><i class='bx bx-package'></i><span>Software</span></a></li>
                    <li class="nav-link"><a href="../Categoria/Celulares.php"><i class='bx bx-mobile'></i><span>Celulares & Tablets</span></a></li>
                    <li class="nav-link"><a href="../Categoria/Tv.php"><i class='bx bx-tv'></i><span>TV & Proyectores</span></a></li>
                </ul>
            </div>
        </div>
    </nav>

    <section class="home">
        <div class="text">Audio & Sonido</div>
        <div class="categories">
            <?php
            include('../db.php'); // Cambia la conexión a db.php

            if (!$pdo) {
                die("Error de conexión a la base de datos");
            }

            // Consultar todos los productos
            $query = "SELECT * FROM productos";
            try {
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            } catch (PDOException $e) {
                die("Error en la consulta: " . $e->getMessage());
            }

            foreach ($productos as $row) { 
                $imagePath = "../images/Au" . htmlspecialchars($row['id']) . ".webp";
                ?>
                <div class="category">
                    <img src="<?php echo $imagePath; ?>" alt="<?php echo htmlspecialchars($row['nombre']); ?>">
                    <span><?php echo htmlspecialchars($row['nombre']); ?></span>
                    <span class="price">$<?php echo htmlspecialchars($row['precio']); ?></span>
                    <button class="add-to-cart" data-id="<?php echo htmlspecialchars($row['id']); ?>">
                        <i class='bx bx-cart'></i> Añadir al carrito
                    </button>
                </div>
            <?php } ?>
            
        </div>
    </section>

    <script src="../Categoria/Script.js"></script>
    <script src="../js/NAV.js"></script>
</body>
</html>
