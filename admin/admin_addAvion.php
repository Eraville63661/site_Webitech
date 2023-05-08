<?php
    session_start();
    $srvname = "localhost";
    $usrname = "root";
    $psw = "";
    $dbname = "mon_site";

    $connect = new mysqli($srvname, $usrname, $psw, $dbname);

    if ($connect->connect_error) {
        die("Connexion échouée : " . $connect->connect_error);
    }

    if(isset($_SESSION['id_utilisateur'])){

        $verif = "SELECT role from utilisateurs where id_utilisateur = '".$_SESSION['id_utilisateur']."'";
        
        if ($connect->query($verif) == TRUE){

            $result = $connect->query($verif);
            $row = $result->fetch_assoc();

            if($row['role'] === 'admin'){

                $sql = "INSERT INTO avion 
                VALUES (NULL, '" . $_POST['model'] . "', '" . $_POST['nb_places'] . "')";

                if ($connect -> query($sql) == TRUE){
                    echo("<script>alert('Ajout effectué !')</script>");
                    echo("<script>window.location = '../test_admin/test_admin.php';</script>");
                }else
                    echo "Erreur d'ajout :" . $sql . "<br>" . $connect->error;
            }
            else
                echo("<script>alert('Vous n'etes pas administrateur !')</script>");          
        }
    }
    $connect->close();
?>