<?php
session_start();
require_once("connect.php");

if (!isset($_GET["id"]) || empty($_GET["id"])) {
    header("Location: index.php");
    exit;
}

$sql = "SELECT * FROM product WHERE id = :id";
$id = $_GET["id"];
$query = $db->prepare($sql);

$query->bindValue("id", $id, PDO::PARAM_INT);

$query->execute();

$product = $query->fetch();

if (!$product) {

    http_response_code(404);
    echo "Article inexistant";
    exit;
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>page_produit</title>

</head>

<?php
include './element/navbar.php';
?>

<body>
    <section>
        <article class="product">
            <div class="pic1">
        
                <img  src="<?= $product["product_pic_1"] ?>" width="500px" height="370px" alt="">
            </div>
            <div class="pic2">
                <img src="<?= $product["product_pic_2"] ?>" width="500px" height="370px" alt="">
            </div>
            <div class="product_description">
                <h2><?= $product["product_name"] ?></h2>
                <p class="price"><?= $product["product_price"] ?></p>
                <button class="bouton bouton_long">Ajouter aux panier</button>
                <p class="description"><?= $product["product_description"] ?></p>
              
                   
            </div>
        </article>
            
    </section>
</body>

<?php
include './element/footer.php';
?>

</body>

</html>