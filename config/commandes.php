<?php 
  function ajouterProduct($name, $quantity, $price, $img_url, $description)
  {
    if(require("connexion.php"))
    {
      $req = $access->prepare("INSERT INTO product (nom, quantity, price,, img_url, descriptionn) VALUES (?, ?, ?, ?)");

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