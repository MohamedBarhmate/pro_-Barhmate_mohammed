<?php
require_once('../../config/connexion.php');

session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_name = $_POST['user_name'];
    $password = $_POST['pwd'];

    // Récupérer les données utilisateur de la base de données en fonction du nom d'utilisateur fourni
    $sql = "SELECT * FROM `user` WHERE `user_name` = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 's', $user_name);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);

    if ($result) {
        $user = mysqli_fetch_assoc($result);

        // Vérifiez si le mot de passe correspond
        if ($user && password_verify($password, $user['pwd'])) {
            // Le mot de passe est correct, démarrez la session et stockez l'ID utilisateur et le rôle
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['user_role'] = $user['role_id'];

            // Redirection basée sur le rôle de l'utilisateur
            if ($user['role_id'] == 1) { // Admin
                header("Location: ../admin/Tableau_bord.php");
            } else {
                header("Location: profil.php");
            }
            exit();
        } else {
            // Redirection avec un message d'erreur
            header("Location: login.php?error=Invalid username or password");
            exit();
        }
    } else {
        // Redirection avec un message d'erreur
        header("Location: login.php?error=Database error");
        exit();
    }
} else {
    // Redirection avec un message d'erreur
    header("Location: login.php?error=Access not allowed");
    exit();
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>