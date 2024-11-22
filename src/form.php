<!DOCTYPE html>
<html lang="fr">

<head>
    <link rel="stylesheet" href="style.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
</head>

<body>
    <?php
    include './element/navbar.php';
    ?>
    <div class="conteneur_login">
        <div class="conteneur_form_form">
            <h1>AJOUTER UN ARTICLE: </h1>
            <form action="create.php" method="post">
                <select name="type" id="type" required>
                    <option value="">Sélectionnez un type de produit</option>
                    <option>canapé d'angle</option>
                    <option>canapé droit</option>
                    <option>canapé 2place</option>
                    <option>table</option>
                    <option>meuble télé</option>
                    <option>buffet</option>
                    <option>miroir</option>
                    <option>vase</option>
                    <option>affiche et poster</option>
                </select>

                <label for="id_tendance">Categorie:</label>
                <select name="id_tendance" required>
                    <option value="">Sélectionnez une categorie</option>
                    <?php
                    require_once("connect.php");
                    // Assumez que la connexion à la base de données est déjà établie
                    $sql = "SELECT id, tendance_name FROM tendance";
                    $query = $db->query($sql);
                    while ($tendance = $query->fetch(PDO::FETCH_ASSOC)) {
                        echo "<option value=\"{$tendance['id']}\">{$tendance['tendance_name']}</option>";
                    }
                    ?>
                </select>

                <label for="product_name">Nom du produit:</label>

                <input type="text" name="product_name" required>

                <label for="product_description">Description du produit:</label>

                <input type="text" name="product_description" required>

                <label for="product_price">Prix:</label>

                <input type="text" name="product_price" required>

                <label for="product_pic_1">Photo 1:</label>

                <input type="text" name="product_pic_1" required>

                <label for="product_pic_2">Photo 2:</label>

                <input type="text" name="product_pic_2" required>

                <br>
                <button class="login-btn">Ajouter</button>
            </form>

            <br>
            <button class="login-btn"><a href="admin_dashboard.php">Retour</a></button>
            <?php
            // print_r($_POST);
            ?>
        </div>
    </div>
</body>

</html>