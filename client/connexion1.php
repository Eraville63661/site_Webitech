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


// Vérifie si le formulaire de connexion a été soumis
if (isset($_POST['connect'])) {

    // Récupère les informations d'identification de l'utilisateur
    $identifiant = $_POST['identifiant'];
    $mot_de_passe = $_POST['mot_de_passe'];


    // Vérifie si la connexion à la base de données a réussi
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    // Prépare et exécute la requête SQL pour récupérer les informations de l'utilisateur
    $sql = "SELECT * FROM utilisateurs WHERE identifiant = '$identifiant'" ;
    $result = $conn->query($sql);

    // Vérifie si l'utilisateur existe dans la base de données
    if ($result->num_rows > 0) {
        $data = $result->fetch_assoc();
        // Vérifie si le mot de passe est correct
        if ($data["mot_de_passe"] == $mot_de_passe  ){
        // if (password_verify($mot_de_passe, $data["mot_de_passe"])) {
            //  Authentification réussie
            echo "Connexion effectuée";
            // $_SESSION['identifiant'] = $identifiant;
            // header("Location: accueil.php");
            // exit();
        } else {
            // Mot de passe incorrect
            echo "Mot de passe incorrect";
        }
    } else {
        // Utilisateur non trouvé dans la base de données
        echo "Utilisateur non trouvé";
    }
}

?>