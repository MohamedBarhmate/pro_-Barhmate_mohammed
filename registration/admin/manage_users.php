<?php
session_start();

// Vérifiez si l'utilisateur est authentifié
if (!isset($_SESSION['user_id'])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas authentifié
    header("Location: ../produit/login.php");
    exit();
}

// Récupérer le rôle de l'utilisateur à partir de la session
$user_role = $_SESSION['user_role'];

// Vérifiez si l'utilisateur a le rôle d'administrateur
if ($user_role != 1) {
    // Redirection vers la page d'accueil si l'utilisateur n'est pas administrateur
    header("Location: ../../index.php");
    exit();
}

// Affichez simplement la liste des utilisateurs pour l'instant
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Manage Users</title>
    <link rel="stylesheet" href="../../public/css/cursor.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h2 {
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #fff;
        }

        th,
        td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        tr:hover {
            background-color: #f5f5f5;
        }

        a {
            text-decoration: none;
            text-align: center;
            color: #007BFF;
            display: block;
            margin-top: 10px;
            padding: 8px;
            background-color: #fff;
            border: 1px solid #007BFF;
            border-radius: 4px;
            transition: background-color 0.3s, color 0.3s;
        }

        a:hover {
            background-color: #007BFF;
            color: #fff;
        }
    </style>

</head>

<body>
    <h2>User List</h2>
    <a href="./Tableau_bord.php">Tableau_bord</a>

    <?php
    // Connectez-vous à la base de données (ajustez le chemin en fonction de la structure de vos fichiers)
    require_once('../../config/connexion.php');

    // Requête pour obtenir la liste des utilisateurs
    $sql = "SELECT `id`, `user_name`, `email` FROM `user`";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        // Afficher la liste des utilisateurs
        echo "<table border='1'>
                <tr>
                    <th>User ID</th>
                    <th>Username</th>
                    <th>Email</th>
                    <th>Action</th>
                </tr>";

        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>
                    <td>{$row['id']}</td>
                    <td>{$row['user_name']}</td>
                    <td>{$row['email']}</td>
                    <td><a href='upgrade_user.php?user_id={$row['id']}'>Admin</a>  <a href='delete_user.php?user_id={$row['id']}'>Delete</a></td>
                </tr>";
        }

        echo "</table>";

        // Libérer le jeu de résultats
        mysqli_free_result($result);
    } else {
        echo "Error: " . mysqli_error($conn);
    }

    // Fermer la connexion à la base de données
    mysqli_close($conn);
    ?>
</body>

</html>