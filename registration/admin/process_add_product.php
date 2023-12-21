<?php
// Inclure le fichier de configuration de la base de données
require_once('../../config/connexion.php');

// Vérifiez si la méthode de requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupérer les données de la requête POST
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];
    $description = $_POST['description'];

    // Gérer le téléchargement de l'image
    $targetDir = "../../public/img/";
    $targetFile = $targetDir . basename($_FILES["image"]["name"]);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    // Vérifiez si le fichier est une image JPG
    if ($imageFileType != "jpg") {
        echo "Only JPG files are allowed.";
        exit();
    }

    // Déplacez le fichier dans le dossier images
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $targetFile)) {
        // Insérez le nouveau produit dans la base de données
        $imgPath = "public/img/" . basename($_FILES["image"]["name"]);
        $insertQuery = "INSERT INTO `product` (`name`, `quantity`, `price`, `img_url`, `description`, `img_path`) VALUES ('$name', $quantity, $price, '$imgPath', '$description', '$targetFile')";
        $result = mysqli_query($conn, $insertQuery);

        // Vérifiez si l'insertion a réussi
        if ($result) {
            // Redirection vers le tableau de bord après un ajout réussi
            header("Location: Tableau_bord.php");
        } else {
            // Afficher un message d'erreur en cas de problème d'insertion dans la base de données
            echo "Error adding the product: " . mysqli_error($conn);
        }
    } else {
        // Afficher un message d'erreur en cas de problème avec le téléchargement de l'image
        echo "Error uploading the image.";
    }
} else {
    // Afficher un message si l'accès n'est pas autorisé
    echo "Access not allowed.";
}

// Fermer la connexion à la base de données
mysqli_close($conn);
?>