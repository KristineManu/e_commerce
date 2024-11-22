<?php
if (isset($_GET["id"]) && !empty($_GET["id"])) {
    require_once("connect.php");
    // echo $_GET["id"];
    $id = strip_tags($_GET["id"]);
    $sql = "SELECT * FROM product WHERE id = :id";
    $query = $db->prepare($sql);
    // on accroche la valeur id de la reqêtte a celle de la variable $id
    $query->bindValue(":id", $id, PDO::PARAM_INT);
    $query->execute();
    $user = $query->fetch();
    // on verifie si l'utilisateur existe
    if (!$user) {
        header("Location: index.php");
    } else {
        require_once("disconnect.php");
    }
    // print_r($user);
} else {
    header("Location: index.php");
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $user["product_name"] ?></title>
</head>

<body>
<section>
    <div class="admin_user">
    <h1>Le Produit : <?= $user["product_name"] ?></h1>
    <div class="user"><?= " id_tendance : " .  $user["id_tendance"]
            . "<br><br>"
            . "type : " . $user["type"]
            . "<br><br>"
            . " product_name : " . $user["product_name"]
            . "<br><br>"
            . " product_description : " . $user["product_description"]
            . "<br><br>"
            . " product_price : " . $user["product_price"]
            . "<br><br>"
            . "  " . "<img src=" .  $user["product_pic_1"] . " width='225px' height='300px' alt=''>"
            . "   " . "<img src=" . $user["product_pic_2"] . " width='225px' height='300px' alt=''>"
            . "<br><br>"

        ?></div>
    <a  class="dashboard-btn" href="admin_dashboard.php">Retour</a>
    </div>
</section>
</body>

</html>