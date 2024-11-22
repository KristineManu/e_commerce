<?php
session_start();
require_once("connect.php");

if (!isset($_SESSION['admin']) || $_SESSION['admin'] !== 1) {
    header("Location: index.php");
    exit;
}

$sql = "SELECT * FROM product";
// On prépare la requêtte
$query = $db->prepare($sql);

// $query->bindValue(":id", $admin, PDO::PARAM_INT);
// on execute la requêtte
$query->execute();
// on recupère les données sous forme de tableau associatif
$product = $query->fetchAll(PDO::FETCH_ASSOC);

$sql = "SELECT * FROM tendance";
// On prépare la requêtte
$query = $db->prepare($sql);

// $query->bindValue(":id", $admin, PDO::PARAM_INT);
// on execute la requêtte
$query->execute();
// on recupère les données sous forme de tableau associatif
$tendance = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dashboard</title>
</head>

<body>
    <section class="admin_dashboard">
        <?php
        include './element/navbar.php';
        ?>

        <h1 class="article_dashboard">DASHBOARD</h1>





        <a href="index.php"><button class="dashboard-btn dashboard-btn_1">Déconnexion</button></a>

        <a href="base_client.php"><button class="dashboard-btn dashboard-btn_1">Base clients</button></a>



        <?php
        if (!empty($_SESSION["message"])) {
            echo "<p>" . $_SESSION["message"] . "</p>";
            $_SESSION["message"] = "";
        }
        ?>
        <br>
        <table class="tb1">
            <thead>
                <th>id</th>
                <th>tendance_name</th>
                <th>Modifier</th>
            </thead>
            <tbody>

                <?php
                // pour chaque utilisateur recupéré dans $users on affiche une nouvelle ligne dans la table html
                foreach ($tendance as $tend) {
                    // chaque utillisateur de la table $users sera identifié dans le foreach en tant que $user
                ?>
                    <tr>
                        <td><?= $tend["id"] ?></td>
                        <td><?= $tend["tendance_name"] ?></td>

                        <td>
                            <a href="update_tendance.php?id=<?= $tend["id"] ?>"><img src="img/icon/pen.png" height="25px" alt="modifier"></a>
                        </td>
                    </tr>
                <?php
                }

                ?>

                <div>
                <a href="form_tendance.php"><button class="dashboard-btn">Ajouter une tendance</button></a>

                    <br>
                    <br>

                </div>
            </tbody>
        </table>

        <table class="tb2">
            <thead>
                <th>id</th>
                <th>id_tendance</th>
                <th>type</th>
                <th>product_name</th>
                <th>product_description</th>
                <th>product_price</th>
                <th>product_pic_1</th>
                <th>product_pic_2</th>
                <th>Voir</th>
                <th>Modifier</th>
                <th>Supprimer</th>


            </thead>
            <tbody>

                <?php
                // pour chaque utilisateur recupéré dans $users on affiche une nouvelle ligne dans la table html
                foreach ($product as $prod) {
                    // chaque utillisateur de la table $users sera identifié dans le foreach en tant que $user
                ?>
                    <tr>
                        <td><?= $prod["id"] ?></td>
                        <td><?= $prod["id_tendance"] ?></td>
                        <td><?= $prod["type"] ?></td>
                        <td><?= $prod["product_name"] ?></td>
                        <td><?= $prod["product_description"] ?></td>
                        <td><?= $prod["product_price"] ?></td>
                        <td><?= $prod["product_pic_1"] ?></td>
                        <td><?= $prod["product_pic_2"] ?></td>

                        <td>
                            <a href="user.php?id=<?= $prod["id"] ?>"><img src="img/icon/pngegg.png" height="25px" alt=""></a>
                            </dt>
                        <td>
                            <a href="update.php?id=<?= $prod["id"] ?>"><img src="img/icon/pen.png" height="25px" alt=""></a>
                        </td>
                        <td>
                            <a href="delete.php?id=<?= $prod["id"] ?>"><img src="img/icon/trash.png" height="25px" alt=""></a>

                        </td>
                    </tr>
                <?php
                }

                ?>

                <div>

                <a classe="deco" href="form.php"><button class="dashboard-btn">Ajouter un produit</button></a>
                    <br>
                    <br>

                </div>
            </tbody>
        </table>
    </section>
</body>

</html>