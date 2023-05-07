<?php 
// si la variable globale "$_SESSION['user_id']" existe <=> utilisateur est connecté
//=> supprimer la variable en utilisant unset() <=> l'utilisateur est déconnecté et toutes les informations 
//stocker dans $_SESSION seront supprimées 
if(isset($_SESSION['user_id'])){
	unset($_SESSION['user_id']);
//utilisateur connecté
//utilisateur déconnecté
//ceci peut etre utile pour s'assurer que l'utilisateur ne peut plus accéder à des fonctionnalités réservées aux UserConnectées

//=> déconnecter un utilisateur en supprimant sa variable $_SESSION['user_id']
}


      $pseudo = "Gravenilec";
      $age =18;
      $email = "mehdi@gmail.com"

?>

<!DOCTYPE html>
<html>
<head>
      <title>Titre</title>
</head>
<body>
    <p>Nom : <?= $pseudo; ?> </p>
    <p>age : <?=$age; ?> </p>
    <p>email : <?=$email; ?> </p>

      <form method="post">
               <input type="text" name="pseudo" id="pseudo" placeholder="Entrer votre Identifiant" required><br/> 
               <input type="text" name="age" id="age" placeholder="Entrer votre age" required><br/>
               <input type="text" name="email" id="email" placeholder="Entrer votre email" required><br/>
               <input type="submit" name="formsend" id="formsend">
      </form>

      <?php
         if(isset($_POST['formsend'])){
             $pseudo = $_POST['pseudo'];
             $age = $_POST['age'];
             $email = $_POST['email'];

            if(!empty($pseudo) && !empty($age) && !empty($email)){
                echo "Votre pseudo : ".$pseudo . "<br/>";
                echo "Votre age : ".$_POST['age']. "<br/>";
                echo "Votre email : ".$_POST['email'].  "<br/>";

            }
         echo "Fomulaire send !";
         }
      ?>
</body>
</html>




