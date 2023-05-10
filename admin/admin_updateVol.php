modif destination, avion

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

                $sql = "SELECT max(id_vol) as id_vol FROM vol";
                $result = $connect->query($sql);
                $row = $result->fetch_assoc();
                
                for ($i = 0; $i <= $row['id_vol']; $i++){
                    if(isset($_POST["id_".$i])){
                        $id = $i;
                        $i = $row;
                    }
                }

                $sql = "UPDATE vol 
                SET depart = '".$_POST["depart_".$id.'"']."', 
                arrive = '".$_POST["arrive_".$id.'"']."',
                id_avion = '".$_POST["id_avion_".$id.'"']."' 
                WHERE id_vol ='".$id."'";

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