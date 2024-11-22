<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tendance</title>
  <link rel="stylesheet" href="../style.css">
</head>

<body>

  <?php
  include './element/navbar.php';
  ?>

  <section>
    <div class="contenaire_tendance">
      <div class="contenaire_photo">
        <a href="../catalogue_tendance.php?id_tendance=2"><img src="./img/product/meuble_table.avif" height="688px" width="520px" alt="table"></a>
        <a href="../catalogue_tendance.php?id_tendance=3"><img src="./img/product/déco_lustre.avif" height="688px" width="520px" alt="lustre"></a>
        <a href="../catalogue_tendance.php?id_tendance=1"><img src="./img/product/Canapé_1.avif" height="688px" width="520px" alt="canapé"></a>
        <a href="../catalogue_tendance.php?id_tendance=14"><img src="./img/product/tapis_1.avif" height="688px" width="520px" alt="canapé"></a>
      </div>
    </div>
  </section>
  <?php
  include './element/footer.php';
  ?>



  <script src="./script.js"></script>
</body>


</html>