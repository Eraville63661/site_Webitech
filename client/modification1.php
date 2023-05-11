
<?php
$servername = "localhost"; //serveur
$username = "root";             //identifiant
$password = "";                 //mot de passe
$dbname = "mon_site";               //nom de la base de données

$conn = new mysqli($servername, $username, $password, $dbname); //connexion à MySQL

$sql = "UPDATE utilisateurs
        SET nom = '".$_POST['nom']."', prenom = '".$_POST['prenom']."',
                age = '".$_POST['age']."', nationalite = '".$_POST['nationalite']."', 
                pays_naissance = '".$_POST['pays_naissance']."', ville_naissance = '".$_POST['ville_naissance']."', adresse = '".$_POST['adresse']."', 
                mot_de_passe = '".$_POST['mot_de_passe']."', numero_de_passeport = '".$_POST['numero_de_passeport']."', role = '".$_POST['role']."', numero_tel = '".$_POST['numero_tel']."', email = '".$_POST['email']."'
		        WHERE identifiant = '".$_POST["idmodification1"]."'";

                if ($conn->query($sql) === TRUE) {
                    if ($conn->affected_rows > 0) {
                        echo("<script>alert('Modification de la ligne avec succès!')</script>");
                        echo("<script>window.location = 'acceuil1.html';</script>");
                    } else {
                        echo("<script>alert('Identifiant non trouvé dans la base de données!')</script>");
                        echo("<script>window.location = 'index_modification1.html';</script>");
                    }
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
                }

$conn->close();  //Fermeture de la connexion
?> 