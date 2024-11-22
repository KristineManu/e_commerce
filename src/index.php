<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>S&M</title>
  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
  <!-- Optional Bootstrap Theme CSS -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap-theme.min.css">
</head>
<link rel="stylesheet" href="./style.css">
</head>

<body>


  <?php
  include './element/navbar.php';
  ?>

  <section class="section_carousel">
    <div class="contenaire">
      <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <a href="catalogue_tendance.php?id_tendance=2"><img class="d-block w-100" src="./img/product/cuisine-_1_.avif" alt="First slide"></a>
            <div class="carousel-caption d-none d-md-block">
              <h1>Optimisez Chaque Espace de Votre Cuisine</h1>
              <p>Profitez d’un rangement optimisé et de solutions gain de place pour une cuisine toujours en ordre.</p>
            </div>
          </div>
          <div class="carousel-item">
            <a href="catalogue_tendance.php?id_tendance=3"><img class="d-block w-100" src="./img/product/pexels-brett-sayles-1708601.avif
            " alt="Second slide"></a>
            <div class="carousel-caption d-none d-md-block">
              <h1>Noël en Confort et en Style</h1>
              <p>Préparez votre maison pour les fêtes ! Profitez de -20% sur nos meubles de salon pour une ambiance chaleureuse.</p>
            </div>
          </div>
          <div class="carousel-item">
            <a href="catalogue_tendance.php?id_tendance=1"><img class="d-block w-100" src="./img/product/m4.avif" alt="Third slide"></a>
            <div class="carousel-caption d-none d-md-block">
              <h1>Qualité et Élégance pour Votre Intérieur</h1>
              <p>Collection exclusive de meubles contemporains, pour tous les goûts et budgets.</p>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
      </div>
    </div>
  </section>


  <section class="products">
      <p>Toujours plus proche de vos besoins</p>
      <div Name="products_grid__container">
        
          <div class="products_grid-container" key={id}>
            <div class="grid_items" data-aos="zoom-in">
              <img src={img} alt={category} />
              <p class="title">{category}</p>
            </div>
          </div>

       
      </div>
    </section>
  

  <?php
  include './element/footer.php';
  ?>

  <!-- Bootstrap JS, Popper.js, and jQuery -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>




</body>

</html>


<script src="script.js"></script>
</body>

</html>