<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Orders</title>
    <link rel="stylesheet" href="../../public/css/cursor.css">
    <style>
        /* Styles  page layout and search form */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        h1,
        h2 {
            /* Style  sections de titre */
            background-color: #007BFF;
            color: #fff;
            padding: 10px;
            text-align: center;
        }

        form {
            /* Styles  search form */
            width: 50%;
            margin: 20px auto;
            padding: 15px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            /* Styles  labels */
            display: block;
            margin-bottom: 8px;
        }

        input[type="text"] {
            /* Styles  text input fields */
            width: 100%;
            padding: 8px;
            margin-bottom: 15px;
            box-sizing: border-box;
        }

        button {
            /* Styles search button */
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            /* Hover effect pour le bouton de recherche */
            background-color: #0056b3;
        }

        .dashboard-link {
            /* Styles tableau bord link */
            display: block;
            text-align: center;
            margin-top: 10px;
            padding: 10px 15px;
            color: #fff;
            background-color: #28a745;
            text-decoration: none;
            border-radius: 4px;
        }

        .dashboard-link:hover {
            /* Hover effect tableau bord link */
            background-color: #218838;
        }

        hr {
            /* Styles horizontal rule */
            margin: 20px 0;
            border: 0;
            border-top: 1px solid #ddd;
        }

        h2 {
            /* Styles for secondary headings */
            margin-top: 20px;
        }

        /* Styles for bold labels */
        Order ID,
        Reference,
        Date,
        Total,
        User ID {
            font-weight: bold;
        }
    </style>
</head>

<body>
    <h1>Ordres de Recherche</h1>
    <span style="color: red; font-weight: bold;">Remarque : Écrivez « ord » et cliquez sur « Rechercher » pour voir toutes les commandes.</span>

    <!-- Search Form -->
    <form action="view_search_orders.php" method="post">
        <label for="search_ref">Search by Reference:</label>
        <input type="text" name="search_ref" required>
        <button type="submit">Search</button>
    </form>

    <!-- Tableau bord Link -->
    <a class="dashboard-link" href="./Tableau_bord.php">Tableau bord</a>
</body>

</html>

<?php
// Start a session
session_start();

// Vérifiez si l'utilisateur est authentifié
if (!isset($_SESSION['user_id'])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas authentifié
    header("Location: ../public/login.php");
    exit();
}

// Récupérer le rôle utilisateur de la session
$user_role = $_SESSION['user_role'];

// Vérifiez si l'utilisateur a le rôle d'administrateur
if ($user_role != 1) {
    // Redirection vers la page d'accueil si l'utilisateur n'est pas administrateur
    header("Location: ../../index.php");
    exit();
}

// Exiger le fichier de configuration de la base de données
require_once('../../config/connexion.php');

// Gérer la recherche de commandes
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer et désinfecter la référence de recherche
    $search_ref = mysqli_real_escape_string($conn, $_POST['search_ref']);

    // Requête pour rechercher les commandes contenant la référence fournie
    $search_query = "SELECT * FROM `user_order` WHERE `ref` LIKE '%$search_ref%'";
    $search_result = mysqli_query($conn, $search_query);

    if ($search_result) {
        // Afficher les résultats de la recherche
        echo "<h2>Search Results</h2>";
        while ($order = mysqli_fetch_assoc($search_result)) {
            echo "Order ID: " . $order['id'] . "<br>";
            echo "Reference: " . $order['ref'] . "<br>";
            echo "Date: " . $order['date'] . "<br>";
            echo "Total: $" . $order['total'] . "<br>";
            echo "User ID: " . $order['user_id'] . "<br>";
            echo "<hr>";
        }
    } else {
        echo "Error in search: " . mysqli_error($conn);
    }
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>