<?php
    $srvname = "localhost";
    $usrname = "root";
    $psw = "";
    $dbname = "mon_site";

    $connect = new mysqli($srvname, $usrname, $psw, $dbname);

    if(isset($_SESSION['id_utilisateur'])){

        $verif = "SELECT role from utilisateur where id_utilisateur = '".$_SESSION['id_utilisateur']."'";
        
        if ($connect -> query($verif) == TRUE){
            $result = $connect->query($verif);
            if($result['role'] == 'admin'){

                $sql = "INSERT INTO avion 
                VALUES (NULL, '" . $_POST['model'] . "', '" . $_POST['nb_places'] . "', '" . $_POST['nb_places_max'] . "')";

                if ($connect -> query($sql) == TRUE)
                    echo "alert('Ajout effectué !')";
                else
                    echo "Erreur d'ajout :" . $sql . "<br>" . $connect->error;
            }
        }
    }
    $connect->close();
?>