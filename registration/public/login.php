
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Login - MonoShop</title>
</head>
<body>
<br>
<br>
<br>
<br>

<div class="container" style="display: flex; justify-content: start-end">
    <div class="row">
        <div class="col-md-10">
        <h2>Login</h2>
        <form action="procedure_login.php" method="post">
        <!-- Add login form fields -->
        <label for="user_name">Username:</label>
        <input type="text" name="user_name">
        <br>
        <label for="pwd">Password:</label>
        <input type="password" name="pwd">
        <br>
        <input type="submit" value="Login">
        </form>
    <a href="../../index.php">Home</a>

    <?php
    // Display error messages if they exist
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
        echo "<p class='error'>$error</p>";
    }
    ?>
        </form>

        </div>
    </div>
</div>
    
</body>
</html>






