<?php include 'CoMySQL.inc.php';

$conn=connectMySQL();


    $id = $_SESSION['id'];
    $id_sou = $_POST['choix'];

$_SESSION['soutenance_place']="Votre soutenance a bien été placée !";

// Récupération des données dans la BDD

try {
    $dbh = connectMySQL();
    $data= $dbh->query("UPDATE soutenance_sou
                        SET sou_el_ID='$id', sou_CHOIX=1
                        WHERE sou_ID='$id_sou' ");
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "";
    header("location:Page_menu_eleve.php");
}
    header("location:Page_menu_eleve.php");
?>
