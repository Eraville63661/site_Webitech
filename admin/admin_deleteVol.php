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

                $sql = "DELETE FROM reservation WHERE id_vol = '" . $_POST['id_vol'] . "'";

                if ($connect -> query($sql) == TRUE){
                    $sql = "DELETE FROM vol WHERE id_vol = '" . $_POST['id_vol'] . "'";

                    if ($connect -> query($sql) == TRUE)
                        echo "alert('Suppression des réservations et du vol effectué !')";
                    else
                        echo "Erreur de suppression du vol :" . $sql . "<br>" . $connect->error;
                }
                else
                    echo "Erreur de suppression des réservations :" . $sql . "<br>" . $connect->error;
            }
        }
    }
    $connect->close();
?>