<?php 
    session_start();

$servername = "localhost"; //serveur
$username = "root";             //identifiant
$password = "";                 //mot de passe
$dbname = "mon_site";               //nom de la base de données

$conn = new mysqli($servername, $username, $password, $dbname);  //connexion à MySQL

$listeAvion = "SELECT * FROM avion"; //Requete SQL, 
$listeDest = "SELECT * FROM destination"; //Requete SQL, 
$sql = "SELECT * FROM utilisateurs where prenom = 'ryan'"; //Requete SQL, 
$listeVol = "SELECT * FROM vol where termine = 0"; //Requete SQL, 

if ($conn -> query($sql) == TRUE)
    $result = $conn->query($sql); //Execution de la requete SQL
else
    echo "alert(Erreur d'ajout :" . $sql . "<br>" . $conn->error."')";


// Stockage de l'id_utilisateur / ou / identifiant (a voir)

unset($_SESSION["id_utilisateur"]);

if (!isset($_SESSION["id_utilisateur"])){
    if ($result->num_rows == 1) {                              
        $row = $result->fetch_assoc();
        $_SESSION['id_utilisateur'] = $row['id_utilisateur'];   
    }
}

?>

<head>
<style>
    #tableau {
      border: 1px solid black;
      table-layout: fixed;
    }
    #case{
      border: 1px solid black;
      padding: 8px;
      text-align: left;
    }
  </style>
</head>
<h1> Renseigne tes informations</h1>
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
<!-- ////////////////////////////////////////////////////////////////////-->

<form action="../admin/admin_addVol.php" method="post">
    <fieldset>
    <legend>Insertion vol</legend>
        <table>
            <tr>
                <td>Avion</td>
                <td><select name="id_avion" required>
                <?php
                    $resultAvion = $conn->query($listeAvion);
                    if ($resultAvion->num_rows > 0) {                                 
                        while($row = $resultAvion->fetch_assoc()) {
                            echo "<option value=".$row["id_avion"].">"	;
                            echo $row["id_avion"]."-".$row["model"];
                            echo"</option>";
                        }
                    }
                    
                ?>
                </td>
            </tr>
            <tr>
                <td>En départ de :</td>
                <td><select name="depart">
                <option value="">--Please choose an option--</option>
                <?php
                    $resultDest = $conn->query($listeDest);
                    // print_r($resultDest);
                    if ($resultDest->num_rows > 0) {                                 
                        while($row = $resultDest->fetch_assoc()) {
                            echo "<option>"	;
                            echo $row["ville"];
                            echo"</option>";
                        }
                    }
                    
                ?>
                </td>

            </tr>

            <tr>
                <td>Arrivé à :</td>
                <td><select name="arrive">
                <option value="">--Please choose an option--</option>
                <?php
                    $resultDest = $conn->query($listeDest);
                    if ($resultDest->num_rows > 0) {                                 
                        while($row = $resultDest->fetch_assoc()) {
                                echo "<option>"	;
                                echo $row["ville"];
                                echo"</option>";
                        }
                    }
                ?>
                </td>
            </tr>

            <tr>
                <td>Date de départ :</td>
                <td>
                    <input type="date" name ="date_dep">
                </td>
            </tr>

            <tr>
                <td><input type="submit" value="Insertion"></td>
                <td><input type="reset" value="Reinitialiser"></td>
            </tr>	
        </table>
    </fieldset>
</form>
<!-- ////////////////////////////////////////////////////////////////////-->


<form action="../admin/admin_deleteAvion.php" method="post">
    <fieldset>
    <legend>Delete avion</legend>
        <table id ="tableau">

            <tr>
                <th id ="case">ID</th>
                <th id ="case">Modele</th>
                <th id ="case">Nombre de places</th>
                <th id ="case">Suppression</th>
            </tr>

            <?php
                $resultAvion = $conn->query($listeAvion);
                if ($resultAvion->num_rows > 0) {                                 
                    while($row = $resultAvion->fetch_assoc()) {
                        echo '<tr>';
                            echo "<td id ='case'>".$row["id_avion"]."</td>";
                            echo "<td id ='case'>".$row["model"]."</td>";
                            echo "<td id ='case'>".$row["nb_places"]."</td>";
                            echo "<td id ='case'>
                            <input type='hidden' name='id' value=".$row["id_avion"].">
                            <button type='submit' name = 'id_".$row["id_avion"]."'>Supprimer</button></td>";
                        echo '</tr>';
                    }
                }
            ?>	
        </table>
    </fieldset>
</form>



<!-- ////////////////////////////////////////////////////////////////////-->
<form method="post"> <!--action="../admin/admin_deleteVol.php"-->
<fieldset>
    <legend>Delete vol</legend>
        <table id ="tableau">

            <tr>
                <th id ="case">ID avion</th>
                <th id ="case">Depart</th>
                <th id ="case">Arrivé</th>
                <th id ="case">Date de départ</th>
                <th id ="case">Nombre de place libre</th>
                <th id ="case">Action</th>
            </tr>

            <?php
                $resultVol = $conn->query($listeVol);
                if ($resultVol->num_rows > 0) {                                 
                    while($row = $resultVol->fetch_assoc()) {
                        echo '<tr>';
                            echo "<td id ='case'>".$row["id_vol"]."</td>";
                            echo "<td id ='case'>".$row["id_avion"]."</td>";
                            echo "<td id ='case'>".$row["depart"]."</td>";
                            echo "<td id ='case'>".$row["arrive"]."</td>";
                            echo "<td id ='case'>".$row["date_dep"]."</td>";
                            echo "<td id ='case'>".$row["nb_places_libre"]."</td>";
                            echo "<td id ='case'>
                            <input type='hidden' name='id' value=".$row["id_vol"].">
                            <button type='submit' name='supp_".$row["id_vol"]."' formaction='../admin/admin_deleteVol.php'>Supprimer</button>
                            <button type='submit' name='modif_".$row["id_vol"]."' formaction='../admin/admin_finDeVol.php'>Cloturer le vol</button></td>";
                        echo '</tr>';
                    }
                }
            ?>	
        </table>
    </fieldset>
</form>

</html>