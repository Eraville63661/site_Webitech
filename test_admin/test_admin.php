<?php 

$servername = "localhost"; //serveur
$username = "root";             //identifiant
$password = "";                 //mot de passe
$dbname = "mon_site";               //nom de la base de données

$conn = new mysqli($servername, $username, $password, $dbname);  //connexion à MySQL

//$sql = "SELECT * FROM avion"; //Requete SQL, 
//$sql = "SELECT * FROM destinantion"; //Requete SQL, 
$sql = "SELECT * FROM utilisateurs where prenom = 'ryan'"; //Requete SQL, 
//$sql = "SELECT * FROM vol"; //Requete SQL, 

if ($conn -> query($sql) == TRUE){}
else
    echo "alert(Erreur d'ajout :" . $sql . "<br>" . $conn->error."')";


$result = $conn->query($sql); //Execution de la requete SQL

if (!isset($_SESSION["id_utilisateur"])){
    if ($result->num_rows > 0) {
        $a = strval($result['id_utilisateur']);
        // echo $result['prenom'];                 
        $_SESSION['id_utilisateur'] = strval($a);//$result['id_utilisateur'];
    }
}

?>

<h1> Renseigne tes informations personnel</h1>
<form action="../admin/admin_addAvion.php" method="post">
    <fieldset>
    <legend>Insertion avions</legend>
        <table>
            <tr>
                <td>Modele</td>
                <td><input type="text" name="model" required></td>
            </tr>
            <tr>
                <td>Nombre de place</td>
                <td><input type="number" name="nb_places" required></td>
            </tr>
            <tr>
                <td><input type="submit" value="Insertion"></td>
                <td><input type="reset" value="Reinitialiser"></td>
            </tr>	
        </table>
    </fieldset>
</form>
</html>