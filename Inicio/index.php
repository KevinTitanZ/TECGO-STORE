<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ../Login/login.php");
    exit();
}
?>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Carousel and Products Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../Nav/stylee.css">
  <link rel="icon" type="image/png" href="../img/LogoTECGO_STORE.png">
  <link rel="stylesheet" href="estilos.css">
  
  <!-- Incluir jQuery y jQuery UI -->
  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>
<body>
  <div id="weather" class="hidden toggle-weather">
    <div id="weather-data">Datos...</div>
</div>
<header> <div include-html="../Nav/nav.php"></div></header>
  <div id="carouselExampleCaptions" class="carousel slide" data-bs-ride="carousel" data-bs-interval="3000">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../img/tabet.png" class="d-block mx-auto" alt="...">
        <div class="carousel-caption d-none d-md-block">    
        </div>
      </div>
      <div class="carousel-item">
        <img src="../img/laptop.png" class="d-block mx-auto" alt="...">
        <div class="carousel-caption d-none d-md-block">       
        </div>
      </div>
      <div class="carousel-item">
        <img src="../img/celular.png" class="d-block mx-auto" alt="...">
        <div class="carousel-caption d-none d-md-block">    
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>

  <!-- Products Section -->
  <div class="container my-5">
    <h2 class="text-center mb-4">Otros Productos</h2>
    <div class="row">
      <div class="col-md-4 mb-4">
        <div class="product-card">
          <img src="../img/monitor4k.jpg" alt="Product 1" class="img-fluid">
          <h5>Product 1</h5>
          <p>$20.00</p>
          <a href="#" class="btn btn-primary">Buy Now</a>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="product-card">
          <img src="../img/raton.jpg" alt="Product 2" class="img-fluid">
          <h5>Product 2</h5>
          <p>$25.00</p>
          <a href="#" class="btn btn-primary">Buy Now</a>
        </div>
      </div>
      <div class="col-md-4 mb-4">
        <div class="product-card">
          <img src="../img/auriculares.jpg" alt="Product 3" class="img-fluid">
          <h5>Product 3</h5>
          <p>$30.00</p>
          <a href="#" class="btn btn-primary">Buy Now</a>
        </div>
      </div>
    </div>
  </div>

 
<!-- Footer -->
<footer class="footer">
  <div class="accordion" id="accordionExample">
    <div class="accordion-item fade-in">
      <h2 class="accordion-header" id="headingOne">
        <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
         
         <h5 class="text-center">Misión</h5> 
        </button>
      </h2>
      <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <label for="">Proveer a nuestros clientes con una amplia gama de productos electrónicos de alta calidad a través de una experiencia de compra en línea confiable y conveniente. Nos dedicamos a ofrecer productos innovadores, un excelente servicio al cliente y precios competitivos, todo mientras fomentamos una cultura de sostenibilidad y responsabilidad social.</label>
        </div>
      </div>
    </div>
    <div class="accordion-item fade-in">
      <h2 class="accordion-header" id="headingTwo">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
         <h5 class="text-center">Visión</h5> 
        </button>
      </h2>
      <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
        <div class="accordion-body">
         <label for="">Ser la tienda en línea líder en el mercado de productos electrónicos, reconocida por nuestra capacidad para anticipar y satisfacer las necesidades de nuestros clientes mediante tecnología de punta y un servicio excepcional. Aspiramos a transformar la experiencia de compra en línea, estableciendo un estándar de excelencia en calidad, innovación y satisfacción del cliente</label>
        </div>
      </div>
    </div>
    <div class="accordion-item fade-in">
      <h2 class="accordion-header" id="headingThree">
        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          <h5 class="text-center">Integrantes</h5> 
   
        </button>
      </h2>
      <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
        <div class="accordion-body">
        <ul>
          <li>Ordoñez Kevin</li>
          <li>Guaman Jhon</li>
          <li>Quintero Helem</li>
        </ul>
        </div>
      </div>
    </div>
  </div>
  <p>&copy; 2024 Grupo. &middot; <a href="#">Privacy</a> &middot; <a href="#">Terms</a></p>
</footer>

<script src="https://kit.fontawesome.com/91728c998d.js" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../js/NAV.js"></script>
  <script src="script.js"></script>

 
</body> <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>