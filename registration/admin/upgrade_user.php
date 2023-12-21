<?php
// Start a session
session_start();

// Vérifiez si l'utilisateur est authentifié
if (!isset($_SESSION['user_id'])) {
    // Redirection vers la page de connexion si l'utilisateur n'est pas authentifié
    header("Location: ../auth/login.php");
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

// Vérifiez si l'ID utilisateur à mettre à jour est fourni
if (isset($_GET['user_id'])) {
    // Get the user ID from the URL
    $user_id = $_GET['user_id'];

    //Connectez-vous à la base de données (ajustez le chemin en fonction de la structure de vos fichiers)
    require_once('../../config/connexion.php');

    // Requête pour mettre à jour le rôle de l'utilisateur en « admin »
    $update_query = "UPDATE `user` SET `role_id` = 1 WHERE `id` = $user_id";
    $result = mysqli_query($conn, $update_query);

    // Vérifiez si la mise à jour a réussi
    if ($result) {
        // Redirection vers le tableau de bord après une mise à jour réussie
        header("Location: Tableau_bord.php");
    } else {
        // Afficher un message d'erreur en cas de problème avec la mise à jour de la base de données
        echo "Error updating user role: " . mysqli_error($conn);
    }

    // Fermer la connexion à la base de données
    mysqli_close($conn);
} else {
    // Afficher un message si l'ID utilisateur n'est pas fourni
    echo "User ID not provided.";
}
?>