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

// Vérifiez si l'ID utilisateur à supprimer est fourni
if (isset($_GET['user_id'])) {
    $user_id = $_GET['user_id'];

    // Connectez-vous à la base de données (ajustez le chemin en fonction de la structure de vos fichiers)
    require_once('../../config/connexion.php');

    // Requête pour supprimer l'utilisateur
    $delete_query = "DELETE FROM `user` WHERE `id` = $user_id";
    
    // Exécuter la requête de suppression
    $result = mysqli_query($conn, $delete_query);

    // Vérifiez si la suppression a réussi
    if ($result) {
        header("Location: Tableau_bord.php");
    } else {
        echo "Error deleting user: " . mysqli_error($conn);
    }

    // Fermer la connexion à la base de données
    mysqli_close($conn);
} else {
    echo "User ID not provided.";
}
?>