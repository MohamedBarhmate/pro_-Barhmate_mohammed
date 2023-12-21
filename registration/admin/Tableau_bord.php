<?php
session_start();

// Vérifiez si l'utilisateur est authentifié
if (!isset($_SESSION['user_id'])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas authentifié
    header("Location: ../public/login.php");
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

//Si l'utilisateur est un administrateur, affichez le tableau de bord d'administration
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard</title>
    <!-- Include a CSS file (cursor.css) -->
    <link rel="stylesheet" href="">

    <style>
        /* Style page */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Style for the unordered list */
        ul {
            list-style-type: none;
            padding: 0;
            text-align: center;
        }

        /* Style for list items */
        li {
            margin: 10px 0;
        }

        /* Style for links */
        a {
            display: block;
            padding: 10px;
            background-color: #007BFF;
            color: #fff;
            text-decoration: none;
            border-radius: 8px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #0056b3;
        }
    </style>

</head>

<body>
    <h2>Welcome to the Admin SUPERRR </h2>

    <!-- Menu de navigation utilisant une liste non ordonnée -->
    <ul>
        <li><a href="../../index.php">Home</a></li>
        <li><a href="add_product.php">Add Product</a></li>
        <li><a href="manage_users.php">User List</a></li>
        <li><a href="view_search_orders.php">Order List</a></li>
        <li><a href="../public/logout.php">Log out</a></li>
    </ul>
</body>

</html>