<?php
$servername = "localhost"; //serveur
$username = "root";             //identifiant
$password = "";                 //mot de passe
$dbname = "mon_site";               //nom de la base de données

$conn = new mysqli($servername, $username, $password, $dbname); //connexion à MySQL

// Vérifier si l'utilisateur et l'e-mail existent avant de supprimer l'enregistrement
$sql = "SELECT * FROM utilisateurs WHERE identifiant ='".$_POST["idsuppression"]."' AND email ='".$_POST["email"]."'";
$result = $conn->query($sql);

if (mysqli_num_rows($result) == 1) {
    $sql = "DELETE FROM utilisateurs WHERE identifiant ='".$_POST["idsuppression"]."'";  //Requete SQL de suppression

    if ($conn->query($sql) == TRUE) {  //Execution de la requete SQL
        echo("<script>alert('Suppression du ligne avec succès!')</script>");
        echo("<script>window.location = 'index_suppression.php';</script>");
    } 
    else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo("<script>alert('Identifiant et/ou e-mail incorrect!')</script>");
    echo("<script>window.location = 'index_suppression.php';</script>");
}

$conn->close();  //Fermeture de la connexion
?>