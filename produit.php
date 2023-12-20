<?php
session_start();

// Initialisez le panier s'il n'existe pas
if (!isset($_SESSION['cart'])) {
    $_SESSION['cart'] = [];
}

// Gestion de l'ajout au panier
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_to_cart'])) {
    // Obtenez les détails du produit et ajoutez-le au panier
    $productId = $_POST['product_id'];
    $productName = $_POST['product_name'];
    $productPrice = $_POST['product_price'];

    // Vérifiez si le produit est déjà dans le panier
    $productInCart = false;
    foreach ($_SESSION['cart'] as &$cartItem) {
        if ($cartItem['id'] === $productId) {
            $cartItem['quantity'] += 1; // Augmenter la quantité
            $productInCart = true;
            break;
        }
    }
    unset($cartItem); // Libérer la référence explicite

    // Si le produit n'est pas dans le panier, ajoutez-le
    if (!$productInCart) {
        $_SESSION['cart'][] = [
            'id' => $productId,
            'name' => $productName,
            'price' => $productPrice,
            'quantity' => 1,
        ];
    }

    // Afficher une alerte indiquant que l'élément a été ajouté
    echo '<script>alert("Item has been added to the cart!");</script>';
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iherb boutique</title>
    <link rel="stylesheet" href="./public/css/cursor.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            background-color: #f8f9fa;
        }

        header {
            background-color: #343a40;
            color: white;
            padding: 15px;
            text-align: center;
        }

        nav {
            display: flex;
            justify-content: space-around;
            list-style-type: none;
            padding: 0;
            margin: 0;
            background-color: #343a40;
        }

        nav a {
            text-decoration: none;
            color: white;
            padding: 10px;
        }

        main {
            max-width: 1200px;
            margin: 20px auto;
            padding-bottom: 30px;
        }

        .cat-container {
            display: flex;
            flex-wrap: wrap;
            justify-content: space-around;
            padding-top: 20px;
            padding-bottom: 20px;
        }

        .cat-item img {
            width: 100%;
            max-height: 200px;
            object-fit: cover;
            border-bottom: 1px solid #ddd;
            padding-top: 20px;
            border-radius: 20px;
        }

        .cat-item-details {
            padding: 10px;
        }

        form {
            display: flex;
            justify-content: center;
            margin-top: 10px;
        }

        button {
            background-color: #007bff;
            color: white;
            padding: 8px 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #343a40;
            color: white;
            text-align: center;
            padding: 15px;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
<?php include 'registration/header/header.php'; ?>
<main>
    <h1>Bienvenue dans la boutique du iherb</h1>

    <div class="cat-container">
        <?php
        // Récupérez la liste des images de chats dans le répertoire images
        $catImages = glob('public/img/*.jpg');

        foreach ($catImages as $catImage) {
            // Obtenez le nom du fichier (sans le chemin)
            $catName = pathinfo($catImage, PATHINFO_FILENAME);
            ?>

            <div class="cat-item">
                <img src="<?= $catImage ?>" alt="<?= $catName ?>">
                <p><?= $catName ?></p>

                <!-- Ajouter un formulaire avec des champs masqués pour envoyer les détails du produit -->
                <form method="post">
                    <input type="hidden" name="product_id" value="<?= $catName ?>">
                    <input type="hidden" name="product_name" value="<?= $catName ?>">
                    <input type="hidden" name="product_price" value="19.99">
                    <button type="submit" name="add_to_cart">Add to Cart</button>
                </form>
            </div>
        <?php } ?>
    </div>
</main>

<?php //include 'includes/footer.php'; ?>

</body>
</html>