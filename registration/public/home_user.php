<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title> home user </title>
  <!---Custom Css!--->
  <link rel="stylesheet" href="">
  <style>
  @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap');
*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}
.container{
  width: 100%;
  height: 100vh;
  background: #2192ff;
  display: flex;
  align-items: center;
  justify-content: center;
}
nav{
  background: #fff;
  border-radius: 9px;
  padding: 30px;
  box-shadow: 0 5px 20px rgba(0,0,0,0.4);
}
nav ul li{
  display: inline-block;
  list-style: none;
  font-size: 2rem;
  padding: 0 10px;
  margin: 0 20px;
  cursor: pointer;
  position: relative;
}
nav ul li:after{
  content: '';
  width: 0;
  height: 3px;
  background: #2192ff;
  position: absolute;
  left: 0;
  bottom: -10px;
  transition: 0.5s;
}
nav ul li:hover::after{
  width:100%;
}
</style>

</head>
<body>
  <div class="container">
    <nav>
      <ul>
      <a href="profil.php"><li>update profil</li></a>
      <a href="change_password.php"><li>changer password</li></a>
      <a href="../admin/add_product.php"><li> produits </li></a>
      <a href="logout.php"><li>Se déconnecter</li></a>
      </ul>
    </nav>
  </div>
</body>
</html>