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
        
        if ($connect -> query($verif) == TRUE){

            $result = $connect->query($verif);
            $row = $result->fetch_assoc();

            if($row['role'] == 'admin'){

                $sql = "SELECT * FROM avion where id_avion =" . $_POST['id_avion'];
                $result = $connect->query($sql);
                $row = $result->fetch_assoc();

                $sql = "INSERT INTO vol 
                VALUES (NULL, '" . $_POST['id_avion'] . "', '" . $_POST['depart'].  "', '" . $_POST['arrive'] . "', '" . $_POST['date_dep'] . "', '0', ". $row['nb_places'].")";

                if ($connect -> query($sql) == TRUE){
                    echo("<script>alert('Ajout effectué !')</script>");
                    echo("<script>window.location = '../test_admin/test_admin.php';</script>");
                }
                else
                    echo "Erreur d'ajout :" . $sql . "<br>" . $connect->error;
            }
            else
                echo("<script>alert('Vous n'etes pas administrateur !')</script>");
        }
        
    }
    $connect->close();
?>