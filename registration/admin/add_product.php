<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Product</title>
    <!-- Include a CSS file (cursor.css) -->
    <link rel="stylesheet" href="../../public/css/cursor.css">

    <style>
        /* Style page */
        h2 {
            color: #333;
            text-align: center;
            margin-bottom: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        /* Style for input elements */
        input[type="text"],
        input[type="number"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        /* Style button */
        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        /* Style links */
        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007BFF;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>

<body>
    <!-- Body content goes here -->
</body>

</html>

<h2>Ajouter un produit</h2>
<form action="process_add_product.php" method="post" enctype="multipart/form-data">
  <!-- Champ de saisie du nom du produit -->
    <label for="name">Product Name:</label>
    <input type="text" name="name" required><br>

    <!-- Champ de saisie de la quantité -->
    <label for="quantity">Quantity:</label>
    <input type="number" name="quantity" required><br>

    <!-- Champ de saisie du prix -->
    <label for="price">Price:</label>
    <input type="text" name="price" required><br>

    <!-- Champ de saisie pour l'image du produit (JPG uniquement) -->
    <label for="image">Product Image (JPG only):</label>
    <input type="file" name="image" accept=".jpg" required><br>

    <!-- Zone de texte pour la description du produit -->
    <label for="description">Description:</label>
    <textarea name="description" required></textarea><br>

    <!-- Submit button -->
    <input type="submit" value="Add Product">

    <!-- Lien vers l'Admin Superrr -->
    <a href="./Tableau_bord.php">Tableau bord</a>
</form>