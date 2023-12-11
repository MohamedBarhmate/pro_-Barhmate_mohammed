<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Inscription - MonoShop</title>
</head>
<body>
<br>
<br>
<h3 style="text-align: center">Formulaire d'inscription</h3>
<div class="container" style="display: flex; justify-content: start-end">
    <div class="row">
        <div class="col-md-10">
        <form action="procedure_inscription.php" method="post">
        <!-- Fields for the 'user' table -->
        <label for="user_name">Username:</label>
        <input type="text" name="user_name">
        <br>
        <label for="email">Email:</label>
        <input type="email" name="email">
        <br>
        <label for="pwd">Password:</label>
        <input type="password" name="pwd">
        <br>

        <!-- Additional fields for the 'address' table -->
        <label for="street_name">Street Name:</label>
        <input type="text" name="street_name">
        <br>
        <label for="street_nb">Street Number:</label>
        <input type="text" name="street_nb">
        <br>
        <label for="city">City:</label>
        <input type="text" name="city">
        <br>
        <label for="province">Province:</label>
        <input type="text" name="province">
        <br>
        <label for="zip_code">Zip Code:</label>
        <input type="text" name="zip_code">
        <br>
        <label for="country">Country:</label>
        <input type="text" name="country">
        <br>

        <input type="submit" value="Register">
        <a href="../../index.php">Home</a>

        <?php
        // Display error messages if they exist
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            echo "<p style='color:red'>$error</p>";
        }
        ?>
    </form>

        </div>
    </div>
</div>
    
</body>
</html>

