<?php
include('../../config/database.php');
session_start();

if (!isset($_SESSION['user_id'])) {
    // Rediriger vers la page de connexion ou gérer les accès non autorisés
    header("Location: ../auth/login.php");
    exit();
}

$conn = $GLOBALS['conn'];

// Obtenir des informations sur l'utilisateur
$user_id = $_SESSION['user_id'];

//Obtenir des informations sur l'adresse de livraison à partir de la base de données
$sql = "SELECT u.*, a.* FROM `user` u
        JOIN `address` a ON u.shipping_address_id = a.id
        WHERE u.id = $user_id";
$result = mysqli_query($conn, $sql);

if ($result && mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);

    // Obtenir des informations sur l'adresse de livraison
    $street_name = $row['street_name'];
    $street_nb = $row['street_nb'];
    $city = $row['city'];
    $province = $row['province'];
    $zip_code = $row['zip_code'];
    $country = $row['country'];
} else {
    // Gérer le cas où les informations d'adresse ne peuvent pas être obtenues
    header("Location: failure.php?error=address");
    exit();
}

// Récupérer les produits du panier
$cart_products = $_SESSION['cart'];

// Calculer le prix total en fonction des produits dans le panier
$total_price = 0;
foreach ($cart_products as $product) {
    $total_price += $product['quantity'] * $product['price'];
}

// Insérer dans la table user_order
$sql_insert_order = "INSERT INTO `user_order` (`ref`, `date`, `total`, `user_id`) VALUES ('$order_reference', NOW(), $total_price, $user_id)";
$result_insert_order = mysqli_query($conn, $sql_insert_order);

if (!$result_insert_order) {
    // Gérer l'erreur lors de l'insertion dans la table user_order
    header("Location: failure.php?error=order");
    exit();
}

// Obtenez l'ID de commande à utiliser si nécessaire
$order_id = mysqli_insert_id($conn);

// Effacer les variables de session
unset($_SESSION['cart']);

// Redirection vers la page de réussite
header("Location: success.php");
exit();
?>