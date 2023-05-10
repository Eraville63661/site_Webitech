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
            $result = $connect->query($verif);
            $row = $result->fetch_assoc();
            echo "2";
            if($row['role'] == 'admin'){

                $sql = "SELECT max(id_utilisateur) as id_utilisateur FROM utilisateurs";
                $result = $connect->query($sql);
                $row = $result->fetch_assoc();
                
                for ($i = 0; $i <= $row['id_utilisateur']; $i++){
                    if(isset($_POST["modif_".$i])){
                        $id = $i;
                        $i = $row;
                    }
                }

                if ($_POST["role_".$id] == "admin")
                    $newrole = "client";
                else
                    $newrole = "admin";
                
                $sql = "UPDATE utilisateurs 
                SET role = '".$newrole."' 
                WHERE id_utilisateur ='".$id."'";

                if ($connect -> query($sql) == TRUE){
                    echo "<script>alert('Mise à jour effectué !')</script>";
                    echo("<script>window.location = '../test_admin/test_admin.php';</script>");
                }else
                    echo "Erreur de modification :" . $sql . "<br>" . $connect->error;
            }
            
        }

    }
    $connect->close();
?>