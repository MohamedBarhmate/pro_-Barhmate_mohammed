<?php 
function getAdmin($email, $pwd){
  
  if(require("connexion.php")){

    $req = $access->prepare("SELECT * FROM user WHERE email=?");

    $req->execute();

    if($req->rowCount() == 1){
      
      $data = $req->fetchAll(PDO::FETCH_OBJ);

      foreach($data as $i){
        $mail = $i->email;
        $mdp = $i->motdepasse;
      }

      if($mail == $email AND $mdp == $password)
      {
        return $data;
      }
      else{
          return false;
      }

    }

  }

}

function getuser($user_name, $email, $pwd, $fname, $lname)
{
  if(require("connexion.php"))
  {
    $req = $access->prepare("INSERT INTO user VALUES (NULL,?,?,?,?,?,'','','',3)");

    $req->execute(array($user_name, $email, $pwd, $fname, $lname));

    return true;

    $req->closeCursor();
  }
}
  function ajouterProduct($name, $quantity, $price, $img_url, $description)
  {
    if(require("connexion.php"))
    {
      $req = $access->prepare("INSERT INTO product (name, quantity, price, img_url, descriptionn) VALUES ($name, $quantity, $price, $img_url, $description)");

      $req->execute(array($name, $quantity, $price, $img_url, $description));

      $req->closeCursor();
    }
  }

function afficherProduct()
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM product ORDER BY id DESC");

        $req->execute();

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}
function getProduit($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("SELECT * FROM product WHERE id=?");

        $req->execute(array($id));

        $data = $req->fetchAll(PDO::FETCH_OBJ);

        return $data;

        $req->closeCursor();
	}
}
function supprimerProduct($id)
{
	if(require("connexion.php"))
	{
		$req=$access->prepare("DELETE FROM product WHERE id=?");

		$req->execute(array($id));

		$req->closeCursor();
	}
}

?>