<?php
session_start();
require_once("connect.php");

if ($_SESSION['admin'] !== 1) {
    header("Location: index.php");
}

$sql = "SELECT * FROM users";
// On prépare la requêtte
$query = $db->prepare($sql);

// $query->bindValue(":id", $admin, PDO::PARAM_INT);
// on execute la requêtte
$query->execute();
// on recupère les données sous forme de tableau associatif
$users = $query->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>users</title>
</head>

<body>
    <section class="admin_dashboard">
        <?php
        include './element/navbar.php';
        ?>

        <h1 class="article_dashboard">Base client</h1>





        <button class="dashboard-btn dashboard-btn_1"><a href="logout.php">Déconnexion</a></button>

        <button class="dashboard-btn dashboard-btn_1"><a href="admin_dashboard.php">Dashboard</a></button>

        <table class="tb3">
            <thead>
                <th>id</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>email</th>
                <th> Supprimer </th>

            </thead>
            <tbody>

                <?php
                // pour chaque utilisateur recupéré dans $users on affiche une nouvelle ligne dans la table html
                foreach ($users as $u) {
                    // chaque utillisateur de la table $users sera identifié dans le foreach en tant que $user
                ?>
                    <tr>
                        <td><?= $u["id"] ?></td>
                        <td><?= $u["first_name"] ?></td>
                        <td><?= $u["last_name"] ?></td>
                        <td><?= $u["email"] ?></td>
                        <td>
                            <a href="delete_client.php?id=<?= $u["id"] ?>"><img src="img/icon/trash.png" height="25px" alt="Supprimer"></a>
                        </td>
                    </tr>
                <?php
                }

                ?>

                <div>
                    <button class="dashboard-btn"><a href="inscription.php">Ajouter un client</a></button>

                    <br>
                    <br>
                </div>
            </tbody>
        </table>
    </section>
</body>

</html>