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
                $sql = "UPDATE utilisateur 
                SET role = '".$_POST["role"]."' 
                WHERE id_utilisateur ='".$_POST["id_utilisateur"]."'";

                if ($connect -> query($sql) == TRUE)
                    echo "alert('Mise à jour effectué !')";
                else
                    echo "Erreur de modification :" . $sql . "<br>" . $connect->error;
            }
        }
    }
    $connect->close();
?>