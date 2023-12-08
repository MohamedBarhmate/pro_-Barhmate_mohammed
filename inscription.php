<?php
// session_start();

include "config/commandes.php";

// if(isset($_SESSION['userxXJppk45hPGu']))
// {
//     if(!empty($_SESSION['userxXJppk45hPGu']))
//     {
//         header("Location: client/");
//     }
// }



?>
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
<h3 style="text-align: center">Formulaire d'inscription</h3>
<div class="container" style="display: flex; justify-content: start-end">
    <div class="row">
        <div class="col-md-10">
        <form method="post"style="padding: 12px 50px">
            <div class="mb-3">
                
                <label for="nom" class="form-label">Nom</label>
                <input type="name" placeholder="Entrer votre nom"  name="nom" class="form-control" style="width: 350%;" >
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prenom</label>
                <input type="name" placeholder="Entrer votre prenom" name="prenom" class="form-control" style="width: 350%;" >
            </div>
            <div class="mb-3">
                <label for="text" class="form-label">Nom utilisateur</label>
                <input type="text" placeholder="Entrer votre Nom utilisateur" name="Nom_Utilisateur" class="form-control" style="width: 350%;" >
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" placeholder="Entrer votre email" name="email" class="form-control" style="width: 350%;" >
            </div>
            <div class="mb-3">
                <label for="motdepasse" class="form-label">Mot de passe</label>
                <input type="password" placeholder="Entrer votre Mot de passe" name="motdepasse" class="form-control" style="width: 350%;">
            </div>
            <br>
            <input type="submit" name="envoyer" class="btn btn-info" value="Envoyer">
        </form>

        </div>
    </div>
</div>
    
</body>
</html>

<?php

if(isset($_POST['envoyer']))
{
    if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['Nom_Utilisateur']) AND !empty($_POST['email']))
    {
        $nom = htmlspecialchars(strip_tags($_POST['nom'])) ;
        $prenom = htmlspecialchars(strip_tags($_POST['prenom']));
        $Nom_Utilisateur = htmlspecialchars(strip_tags($_POST['Nom_Utilisateur']));
        $email = htmlspecialchars(strip_tags($_POST['email']));
        $motdepasse = htmlspecialchars(strip_tags($_POST['motdepasse']));

        $user = getuser($user_name, $email, $pwd, $fname, $lname);

        if($user){
            // $_SESSION['userxXJppk45hPGu'] = $user;
            header('Location: index.php');
        }else{
            echo "Compte non créer !";
        }
    }

}

?>