<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Registration Form</title>
  <link rel="stylesheet" href="">
  <style>
@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500;600;700&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
body{
  min-height: 100vh;
  width: 50%;
  text-align: center;
  background: #009579;
}
.container{
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%,-50%);
  max-width: 430px;
  width: 100%;
  background: #fff;
  border-radius: 7px;
  box-shadow: 0 5px 10px rgba(0,0,0,0.3);
}
.container .registration{
  display: none;
}
#check:checked ~ .registration{
  display: block;
}

#check{
  display: none;
}
.container .form{
  padding: 2rem;
}
.form header{
  font-size: 2rem;
  font-weight: 500;
  text-align: center;
  margin-bottom: 1.5rem;
}
 .form input{
   height: 60px;
   width: 100%;
   padding: 0 15px;
   font-size: 17px;
   margin-bottom: 1.3rem;
   border: 1px solid #ddd;
   border-radius: 6px;
   outline: none;
 }
 .form input:focus{
   box-shadow: 0 1px 0 rgba(0,0,0,0.2);
 }
.form a{
  font-size: 16px;
  color: #009579;
  text-decoration: none;
}
.form a:hover{
  text-decoration: underline;
}
.form input.button{
  color: #fff;
  background: #009579;
  font-size: 1.2rem;
  font-weight: 500;
  letter-spacing: 1px;
  margin-top: 1.7rem;
  cursor: pointer;
  transition: 0.4s;
}
.form input.button:hover{
  background: #006653;
}
.signup{
  font-size: 17px;
  text-align: center;
}
.signup label{
  color: #009579;
  cursor: pointer;
}
.signup label:hover{
  text-decoration: underline;
}
  </style>
</head>
<body>
    <div class="registration form">
      <header>Signup</header>
      <form action="procedure_inscription.php" method="post">
        <!-- Champs de la table 'user' -->
        <input type="text" name="user_name" placeholder="Enter Votre UserName">
        <input type="email" name="email" placeholder="Enter Votre email">
        <input type="password" name="pwd" placeholder="Enter Votre Mot de passe">
        <!-- Champs supplémentaires pour la table 'adresse' -->
        <input type="text" name="street_name" placeholder="Enter Votre Street Name">
        <input type="text" name="street_nb" placeholder="Enter Votre Street Number">
        <input type="text" name="city" placeholder="Enter Votre City">
        <input type="text" name="province" placeholder="Enter Votre Province">
        <input type="text" name="zip_code" placeholder="Enter Votre Zip Code">
        <input type="text" name="country" placeholder="Enter Votre Country">
        <input type="submit" value="Register">
        <a href="../../index.php">Home</a>
        <?php
        // Afficher les messages d'erreur s'ils existent
        if (isset($_GET['error'])) {
            $error = $_GET['error'];
            echo "<p style='color:red'>$error</p>";
        }
        ?>
    </form>
      <div class="signup">
        <span class="signup">Already have an account?
         <label for="check">Login</label>
        </span>
      </div>
    </div>
  </div>

</body>
</html>