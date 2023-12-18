<?php
require_once('../../config/connexion.php');

session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $user_id = $_SESSION['user_id'];

    //Obtenir les données du formulaire
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    // Validez que tous les champs sont remplis
    if (empty($user_name) || empty($email) || empty($fname) || empty($lname)) {
        $error_message = "All fields must be filled.";
        header("Location: profil.php?error=$error_message");
        exit();
    }

    // Mettre à jour les informations utilisateur dans la base de données
    $sql = "UPDATE `user` 
            SET `user_name` = '$user_name', `email` = '$email', `fname` = '$fname', `lname` = '$lname' 
            WHERE `id` = $user_id";

    if (mysqli_query($conn, $sql)) {
        header("Location: profil.php");
    } else {
        $error_message = "Error updating profil: " . mysqli_error($conn);
        header("Location: profil.php?error=$error_message");
        exit();
    }
} else {
    echo "Access not allowed";
}

mysqli_close($conn);
?>