<?php
$servername = "localhost";      //serveur
$username = "root";             //identifiant
$password = "";                 //mot de passe
$dbname = "mon_site";               //nom de la base de données

$conn = new mysqli($servername, $username, $password, $dbname);  //connexion à MySQL

$sql = "INSERT INTO utilisateurs VALUES (NULL, '".$_POST['identifiant']."', '".$_POST['mot_de_passe']."', 
'".$_POST['email']."', '".$_POST['nom']."', '".$_POST['prenom']."', 
'".$_POST['age']."', '".$_POST['nationalite']."', '".$_POST['pays_naissance']."', 
'".$_POST['ville_naissance']."', '".$_POST['adresse']."', '".$_POST['numero_de_passeport']."', '".$_POST['numero_tel']."', '".$_POST['role']."')"; //Requete SQL

if ($conn->query($sql) == TRUE) {  //Execution de la requete SQL
    echo("<script>alert('Nouvel enregistrement créé avec succès!')</script>");
    echo("<script>window.location = 'inscription.php';</script>");
} 
else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();  //Fermeture de la connexion
?> 