<?php
    $srvname = "localhost";
    $usrname = "root";
    $psw = "";
    $dbname = "mon_site";

    $connect = new mysqli($srvname, $usrname, $psw, $dbname);

    if(isset($_SESSION['id_utilisateur'])){

        $verif = "SELECT role from utilisateurs where id_utilisateur = '".$_SESSION['id_utilisateur']."'";
        
        if ($connect -> query($verif) == TRUE){
            $result = $connect->query($verif);
            
            if($result['role'] == 'admin'){

                $sql = "SELECT max(id_utilisateur) as id_utilisateur FROM utilisateur";
                $result = $connect->query($sql);
                $row = $result->fetch_assoc();
                
                for ($i = 0; $i <= $row['id_utilisateur']; $i++){
                    if(isset($_POST["id_".$i])){
                        $id = $i;
                        $i = $row;
                    }
                }

                $sql = "UPDATE utilisateur 
                SET role = '".$_POST["role_".$id.'"']."' 
                WHERE id_utilisateur ='".$id."'";

                if ($connect -> query($sql) == TRUE)
                    echo "<script>alert('Mise à jour effectué !')</script>";
                else
                    echo "Erreur de modification :" . $sql . "<br>" . $connect->error;
            }
        }
    }
    $connect->close();
?>