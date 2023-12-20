<?php
// Inclure le fichier de configuration de la base de données
require_once('../../config/connexion.php');

session_start();

// Redirection vers la page de connexion si l'utilisateur n'est pas authentifié
if (!isset($_SESSION['user_id'])) {
    header("Location: login.php");
    exit();
}

// Récupérer l'ID utilisateur de la session
$user_id = $_SESSION['user_id'];

// Obtenir des informations utilisateur à partir de la base de données
$sql = "SELECT * FROM `user` WHERE `id` = $user_id";
$result = mysqli_query($conn, $sql);
$user = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>User Profile</title>
    <link rel="stylesheet" href="">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        h2 {
            color: #333;
            text-align: center;
            padding-top: 40px;
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
            max-width: 400px;
            width: 100%;
            text-align: center;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        input {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #007BFF;
            color: #fff;
            cursor: pointer;
        }

        a {
            display: block;
            text-align: center;
            margin-top: 10px;
            color: #007BFF;
            text-decoration: none;
        }

        a:last-child {
            padding-bottom: 30px;
        }

        a:hover {
            text-decoration: underline;
        }

        img {
            border-radius: 50%;
            margin-bottom: 10px;
        }

        .error {
            color: red;
        }
    </style>

</head>

<body>
    <h2>User Profile</h2>
    <form action="process_update_profile.php" method="post" enctype="multipart/form-data">
        <!-- Afficher les informations utilisateur et ajouter des champs de formulaire -->
        <img src="../../public/images/avatar.jpg" alt="Default Profile Picture" width="100">
        <br>
        <label for="user_name">Username:</label>
        <input type="text" name="user_name" value="<?php echo $user['user_name']; ?>" readonly>
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email" value="<?php echo $user['email']; ?>">
        <br>
        <label for="fname">First Name:</label>
        <input type="text" name="fname" value="<?php echo $user['fname']; ?>">
        <br>
        <label for="lname">Last Name:</label>
        <input type="text" name="lname" value="<?php echo $user['lname']; ?>">
        <br>
        <input type="submit" value="Save">
        <?php
        // Afficher les messages d'erreur s'ils existent
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            echo "<p class='error'>$error</p>";
        }
        ?>
    </form>
    <a href="./logout.php">Log out</a>
    <a href="../../index.php">Home</a>
</body>

</html>