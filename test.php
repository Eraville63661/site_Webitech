<?php
session_start();

// Vérifie si le formulaire a été soumis
if(isset($_POST['formsend'])){

    // Récupère les informations du formulaire
    $identifiant = $_POST['identifiant'];
    $email = $_POST['email'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Vérifie si les champs sont vides
    if(empty($identifiant) || empty($email) || empty($new_password) || empty($confirm_password)) {
        die("Veuillez remplir tous les champs.");
    }

    // Vérifie si le nouveau mot de passe correspond à la confirmation du mot de passe
    if($new_password !== $confirm_password) {
        die("Les mots de passe ne correspondent pas.");
    }

    // Connexion à la base de données
    include 'database.php'; // Remplacer par le nom de votre fichier de connexion à la base de données
    
    // Vérifie si la connexion à la base de données a réussi
    if ($conn->connect_error) {
        die("Connexion échouée : " . $conn->connect_error);
    }

    // Prépare la requête SQL pour mettre à jour le mot de passe de l'utilisateur
    $sql = "UPDATE utilisateurs SET  nom = nom, prenom = prenom,
    age = age, nationalite = nationalite, 
    pays_naissance = pays_de_naissance, ville_naissance = ville de naissance, adresse = adresse, 
    mot_de_passe = mot_de_passe, numero_de_passeport = numero_de_passeport, role = role, numero_tel = '".$_POST['numero_tel']."', email = '".$_POST['email']."'
    WHERE identifiant = '".$_POST["idmodification1"]."'";




    // Prépare la requête SQL en utilisant une instruction préparée pour éviter les injections SQL
    if($stmt = $conn->prepare($sql)) {
        // Lie les paramètres à la requête SQL
        $stmt->bind_param("sss", $new_password, $identifiant, $email);

        // Exécute la requête SQL
        if($stmt->execute()) {
            echo "Le mot de passe a été modifié avec succès.";
        } else {
            echo "Erreur lors de la modification du mot de passe : " . $stmt->error;
        }

        // Ferme l'instruction préparée
        $stmt->close();
    } else {
        echo "Erreur lors de la préparation de la requête SQL : " . $conn->error;
    }

    // Ferme la connexion à la base de données
    $conn->close();
}
?>