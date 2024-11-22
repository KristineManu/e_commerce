<?php
// On demarre une session 
session_start();
if (
    isset($_POST["id_tendance"]) && !empty($_POST["id_tendance"])
    && isset($_POST["type"]) && !empty($_POST["type"])
    && isset($_POST["product_name"]) && !empty($_POST["product_name"])
    && isset($_POST["product_description"]) && !empty($_POST["product_description"])
    && isset($_POST["product_price"]) && !empty($_POST["product_price"])
    && isset($_POST["product_pic_1"]) && !empty($_POST["product_pic_1"])
    && isset($_POST["product_pic_2"]) && !empty($_POST["product_pic_2"])

) {
    require_once("connect.php");
    $id_tendance = $_POST["id_tendance"];
    $type = strip_tags($_POST["type"]);
    $product_name = strip_tags($_POST["product_name"]);
    $product_description = strip_tags($_POST["product_description"]);
    $product_price = strip_tags($_POST["product_price"]);
    $product_pic_1 = strip_tags($_POST["product_pic_1"]);
    $product_pic_2 = strip_tags($_POST["product_pic_2"]);

    $sql = "INSERT INTO product (type, id_tendance, product_name, product_description, product_price, product_pic_1, product_pic_2)
VALUES (:type, :id_tendance, :product_name, :product_description, :product_price, :product_pic_1, :product_pic_2)";

    $query = $db->prepare($sql);

    $query->bindValue(":type", $type);
    $query->bindValue(":id_tendance", $id_tendance, PDO::PARAM_INT);
    $query->bindValue(":product_name", $product_name);
    $query->bindValue(":product_description", $product_description);
    $query->bindValue(":product_price", $product_price);
    $query->bindValue(":product_pic_1", $product_pic_1);
    $query->bindValue(":product_pic_2", $product_pic_2);

    $query->execute();

    $_SESSION["message"] = "Article ajouté";
    header("Location: admin_dashboard.php");
} else {
    echo "Veulliez remplir TOUS les formulaires !";
}
