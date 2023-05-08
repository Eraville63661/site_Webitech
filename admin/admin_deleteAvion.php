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
            $row0 = $result->fetch_assoc();
            if($row0['role'] == 'admin'){

                $sql = "SELECT id_vol FROM vol WHERE id_avion = '" . $_POST['id'] . "'"; //Est-ce que je trouve un vol avec mon avion ?
                $result = $connect->query($sql);
                if ($result->num_rows > 0) {//Si oui, je supprime les réservations et le vol

                    while($row1 = $result->fetch_assoc()){
                        $sql = "DELETE FROM reservation WHERE id_vol = '" . $row1['id_vol'] . "'";

                        if ($connect->query($sql)  == TRUE){
                            $sql = "DELETE FROM vol WHERE id_vol = '" . $row1['id_vol'] . "'";

                            if ($connect -> query($sql) == TRUE){
                                $sql = "DELETE FROM avion WHERE id_avion = '" . $_POST['id'] . "'";

                                if ($connect -> query($sql) == TRUE){
                                    echo "<script>alert('Suppression des réservations, du vol et de l'avion effectué !')</script>";
                                    echo("<script>window.location = '../test_admin/test_admin.php';</script>");
                                }
                                else
                                    echo "<script>alert('Erreur de suppression de l'avion :" . $sql . "<br>" . $connect->error."')</script>";

                            }else
                                echo "<script>alert('Erreur de suppression du vol :" . $sql . "<br>" . $connect->error."')</script>";

                        }
                    }

                } else { //Sinon je ne supprime que l'avion
                    $sql = "DELETE FROM avion WHERE id_avion = '" . $_POST['id'] . "'";
                    if ($connect -> query($sql) == TRUE){
                        echo "<script>alert('Suppression des réservations, du vol et de l'avion effectué !')</script>";
                        echo("<script>window.location = '../test_admin/test_admin.php';</script>");
                    }
                    else
                        echo "<script>alert('Erreur de suppression de l'avion :" . $sql . "<br>" . $connect->error."')</script>";
                }
            }
            else
                echo "<script>alert('Vous n'etes pas administrateur !')</script>";
        }
    }
    $connect->close();
?>