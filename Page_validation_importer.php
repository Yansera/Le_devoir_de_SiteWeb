<?php include 'CoMySQL.inc.php';

$conn=connectMySQL();

/* On instancie une variable de session pour la gestion des erreurs. Au départ le formulaire est considéré comme valide */
$_SESSION['crea_erreur']=FALSE;

/* On récupère le contenu du champ nom dans la variable $_POST['nom'] (car le champ du formulaire contient l'attribut name="nom")
Le contenu pouvant contenir des éléments dangereux, on valide qu'il ne contient que des caractères alphanumériques, espaces et des tirets. */

function validerNom($nomATester) {
    //Retourne FALSE s'il contient autre chose que des caractères autorisés, ou la chaine.
    return preg_match('/[^a-zA-Z\s]+/', $nomATester) ? FALSE : $nomATester;
}

// récupération du nom depuis le formulaire
$nom_dangereux=$_POST['nom'];
$prenom_dangereux=$_POST['prenom'];

$nom_securise=filter_var($nom_dangereux, FILTER_CALLBACK, array('options' => 'validerNom'));

if ($nom_securise==FALSE){
    // on indique qu'il y a au moins cette erreur pour que l'utilisateur corrige sa saisie
    $_SESSION['crea_erreur']=TRUE;
    // on indique le problème pour permettre à l'utilisateur de faire sa correction
    $_SESSION['erreur_chaine_nom']='Le champ ne doit contenir que des lettres, des chiffres, des tirets et des espaces';
}

$prenom_securise=filter_var($prenom_dangereux, FILTER_CALLBACK, array('options' => 'validerNom'));

if ($prenom_securise==FALSE){
    // on indique qu'il y a au moins cette erreur pour que l'utilisateur corrige sa saisie
    $_SESSION['crea_erreur']=TRUE;
    // on indique le problème pour permettre à l'utilisateur de faire sa correction
    $_SESSION['erreur_chaine_prenom']='Le champ ne doit contenir que des lettres, des chiffres, des tirets et des espaces';
}

if($_SESSION['crea_erreur']==TRUE){
    header("location:Page_importer_eleve.php");
}
else{
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$id_sou = $_POST['choix'];

$_SESSION['soutenance_place']="Votre soutenance a bien été placée !";

$stmt_name= $conn->query("SELECT el_ID FROM eleve_el WHERE el_PRENOM='$prenom'");
$row_name=$stmt_name->fetch(PDO::FETCH_ASSOC);
$id_el=$row_name['el_ID'];

$conn->query("UPDATE soutenance_sou SET sou_el_ID='$id_el', sou_CHOIX='1' WHERE sou_ID='$id_sou' ");
header("location:Page_menu_professeur.php");
}
?>
