<?php 

$servername = "localhost"; //serveur
$username = "root";             //identifiant
$password = "";                 //mot de passe
$dbname = "mon_site";               //nom de la base de données

$conn = new mysqli($servername, $username, $password, $dbname);  //connexion à MySQL

$sql = "SELECT * FROM avion"; //Requete SQL, 
$sql = "SELECT * FROM destinantion"; //Requete SQL, 
$sql = "SELECT * FROM utilisateurs"; //Requete SQL, 
$sql = "SELECT * FROM vol"; //Requete SQL, 

$result = $conn->query($sql); //Execution de la requete SQL


?>

<!DOCTYPE html>
<!--  
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

  -->



<html>
<head><title>Inscription</title></head>
<body>

<h1> Renseigne tes informations personnel</h1>
<form action="insertion.php" method="post">
<fieldset>

<legend>Insertion dans la base de donn&eacute;es</legend>
<table>
<tr>
   <td>identifiant</td>
   <td><input type="text" name="identifiant" required></td>
</tr>
<tr>
   <td>Mot de passe</td>
   <td><input type="text" name="mot_de_passe" required></td>
</tr>
<tr>
   <td>email</td>
   <td><input type="text" name="email" required></td>
</tr>
<tr>
   <td>Nom</td>
   <td><input type="text" name="nom" required></td>
</tr>
<tr>
   <td>Prenom</td>
   <td><input type="text" name="prenom" required></td>
</tr>
<tr>
   <td>Age</td>
   <td><input type="text" name="age" required></td>
</tr>
<tr>
   <td>Nationalite</td>
   <td><input type="text" name="nationalite" required></td>
</tr>
<tr>
   <td>Pays de naissance</td>
   <td><input type="text" name="pays_naissance" required></td>
</tr>
<tr>
   <td>Ville de naissance</td>
   <td><input type="text" name="ville_naissance" required></td>
</tr>
<tr>
   <td>Adresse</td>
   <td><input type="text" name="adresse" required></td>
</tr>
<tr>
   <td>Numero de passeport</td>
   <td><input type="text" name="numero_de_passeport" required></td>
</tr>
<tr>
   <td>Telephone</td>
   <td><input type="text" name="numero_tel" required></td>
</tr>
<tr>
   <td>Role</td>
   <td><input type="text" name="role" required></td>
</tr>



<!--  
<tr>
   <label for="choisir un carburant">Choisir un carburant:</label>
    <select name="carburant" id="carburant">
    <option value="">choisir un carburant</option>
    <option value="diesel">diesel</option>
    <option value="essence">essence</option>
    <option value="G.P.L">G.P.L</option>
    <option value="electrique">electrique</option>

</select>
</tr> 
-->
<tr>
	<td><input type="submit" value="Insertion"></td>
	<td><input type="reset" value="Reinitialiser"></td>
</tr>	
</table>
</fieldset>
</form>