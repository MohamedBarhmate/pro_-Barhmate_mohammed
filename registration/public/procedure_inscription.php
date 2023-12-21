<?php
require_once('../../config/connexion.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Vérifiez champs vides
    $required_fields = ['user_name', 'email', 'pwd', 'street_name', 'street_nb', 'city', 'province', 'zip_code', 'country'];
    $errors = [];

    foreach ($required_fields as $field) {
        if (empty($_POST[$field])) {
            $errors[] = "The '$field' field is required.";
        }
    }

    if (!empty($errors)) {
        //Redirection avec messages d'erreur
        $error_message = implode("<br>", $errors);
        header("Location: inscription.php?error=$error_message");
        exit();
    }

    // Recevoir les données du formulaire
    $user_name = $_POST['user_name'];
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];
    $street_name = $_POST['street_name'];
    $street_nb = $_POST['street_nb'];
    $city = $_POST['city'];
    $province = $_POST['province'];
    $zip_code = $_POST['zip_code'];
    $country = $_POST['country'];

    // Hachage du mot de passe
    $hashed_password = password_hash($pwd, PASSWORD_DEFAULT);

    // Insertion du nouvel utilisateur dans la table 'user'
    $sql_user = "INSERT INTO `user` (`user_name`, `email`, `pwd`, `role_id`) 
                 VALUES ('$user_name', '$email', '$hashed_password', 3)";

    if (mysqli_query($conn, $sql_user)) {
        // Obtenez l'ID de l'utilisateur nouvellement enregistré
        $user_id = mysqli_insert_id($conn);

        // Insérer l'adresse dans la table 'adresse'
        $sql_address = "INSERT INTO `address` (`street_name`, `street_nb`, `city`, `province`, `zip_code`, `country`)
                        VALUES ('$street_name', '$street_nb', '$city', '$province', '$zip_code', '$country')";

        if (mysqli_query($conn, $sql_address)) {
            // Obtenez l'ID de l'adresse nouvellement enregistrée
            $address_id = mysqli_insert_id($conn);

            // Mettre à jour l'ID d'adresse dans la table "user"
            $sql_update_user = "UPDATE `user` SET `billing_address_id` = $address_id, `shipping_address_id` = $address_id
                                WHERE `id` = $user_id";

            if (mysqli_query($conn, $sql_update_user)) {
                header("Location: login.php");
            } else {
                echo "Error updating user with address ID: " . mysqli_error($conn);
            }
        } else {
            echo "Error inserting address: " . mysqli_error($conn);
        }
    } else {
        echo "Error registering user: " . mysqli_error($conn);
    }
} else {
    echo "Access not allowed";
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>