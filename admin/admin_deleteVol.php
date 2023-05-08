<?php
session_start();
    $srvname = "localhost";
    $usrname = "root";
    $psw = "";
    $dbname = "mon_site";

    $connect = new mysqli($srvname, $usrname, $psw, $dbname);

    if(isset($_SESSION['id_utilisateur'])){

        $verif = "SELECT role from utilisateurs where id_utilisateur = '".$_SESSION['id_utilisateur']."'";
        
        if ($connect -> query($verif) == TRUE){

            $sql = "SELECT max(id_vol) as id_vol FROM vol";
            $result = $connect->query($sql);
            $row = $result->fetch_assoc();
            
            for ($i = 0; $i <= $row['id_vol']; $i++){
                if(isset($_POST["supp_".$i])){
                    $id = $i;
                    $i = $row;
                }
            }

            $result = $connect->query($verif);
            $row0 = $result->fetch_assoc();
            if($row0['role'] == 'admin'){

                $sql = "DELETE FROM reservation WHERE id_vol = " . $id;
                if ($connect -> query($sql) == TRUE){

                    $sql = "DELETE FROM vol WHERE id_vol = " . $id;
                    if ($connect -> query($sql) == TRUE){
                        echo "<script>alert('Suppression des réservations et du vol effectué !')</script>";
                        echo("<script>window.location = '../test_admin/test_admin.php';</script>");
                    }
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