<?php
session_start();
include 'CoMySQL.inc.php';

$conn=connectMySQL();

/* On instancie une variable de session pour la gestion des erreurs. Au départ le formulaire est considéré comme valide */
$_SESSION['crea_erreur']=FALSE;

/* On récupère le contenu du champ nom dans la variable $_POST['nom'] (car le champ du formulaire contient l'attribut name="nom")
Le contenu pouvant contenir des éléments dangereux, on valide qu'il ne contient que des caractères alphanumériques, espaces et des tirets. */

function validerNom($nomATester) {
    //Retourne FALSE s'il contient autre chose que des caractères autorisés, ou la chaine.
    return preg_match('/[^a-zA-Z\s]+/', $nomATester) ? FALSE : $nomATester;
}

$titre_dangereux = $_POST['titre'];
$jour_dangereux = $_POST['jour'];
$mois_dangereux = $_POST['mois'];
$annee_dangereux = $_POST['annee'];
$heure_dangereux = $_POST['heure'];
$minute_dangereux = $_POST['minute'];
$duree_dangereux = $_POST['duree'];

// validation du nom avec la fonction validerNom
$titre_securise=filter_var($titre_dangereux, FILTER_CALLBACK, array('options' => 'validerNom'));

// si $nom_securise contient FALSE, le formulaire n'est pas valide
if ($titre_securise==FALSE){
    // on indique qu'il y a au moins cette erreur pour que l'utilisateur corrige sa saisie
    $_SESSION['crea_erreur']=TRUE;
    // on indique le problème pour permettre à l'utilisateur de faire sa correction
    $_SESSION['erreur_chaine_titre']="Le champ ne doit contenir que des lettres, des chiffres, des tirets et des espaces";
}

$jour_securise=filter_var($jour_dangereux, FILTER_VALIDATE_INT);

if ($jour_securise==FALSE){
    // on indique qu'il y a au moins cette erreur pour que l'utilisateur corrige sa saisie
    $_SESSION['crea_erreur']=TRUE;
    // on indique le problème pour permettre à l'utilisateur de faire sa correction
    $_SESSION['erreur_chaine_jour']='Le champ ne doit contenir que des chiffres';
}

$mois_securise=filter_var($mois_dangereux, FILTER_VALIDATE_INT);

if ($mois_securise==FALSE){
    // on indique qu'il y a au moins cette erreur pour que l'utilisateur corrige sa saisie
    $_SESSION['crea_erreur']=TRUE;
    // on indique le problème pour permettre à l'utilisateur de faire sa correction
    $_SESSION['erreur_chaine_mois']='Le champ ne doit contenir que des chiffres';
}

$annee_securise=filter_var($annee_dangereux, FILTER_VALIDATE_INT);

if ($annee_securise==FALSE){
    // on indique qu'il y a au moins cette erreur pour que l'utilisateur corrige sa saisie
    $_SESSION['crea_erreur']=TRUE;
    // on indique le problème pour permettre à l'utilisateur de faire sa correction
    $_SESSION['erreur_chaine_annee']='Le champ ne doit contenir que des chiffres';
}

$heure_securise=filter_var($heure_dangereux, FILTER_VALIDATE_INT);

if ($heure_securise==FALSE){
    // on indique qu'il y a au moins cette erreur pour que l'utilisateur corrige sa saisie
    $_SESSION['crea_erreur']=TRUE;
    // on indique le problème pour permettre à l'utilisateur de faire sa correction
    $_SESSION['erreur_chaine_heure']='Le champ ne doit contenir que des chiffres';
}

$minute_securise=filter_var($minute_dangereux, FILTER_VALIDATE_INT);

if ($minute_securise==FALSE){
    // on indique qu'il y a au moins cette erreur pour que l'utilisateur corrige sa saisie
    $_SESSION['crea_erreur']=TRUE;
    // on indique le problème pour permettre à l'utilisateur de faire sa correction
    $_SESSION['erreur_chaine_minute']='Le champ ne doit contenir que des chiffres';
}

$duree_securise=filter_var($duree_dangereux, FILTER_VALIDATE_INT);

if ($duree_securise==FALSE){
    // on indique qu'il y a au moins cette erreur pour que l'utilisateur corrige sa saisie
    $_SESSION['crea_erreur']=TRUE;
    // on indique le problème pour permettre à l'utilisateur de faire sa correction
    $_SESSION['erreur_chaine_duree']='Le champ ne doit contenir que des chiffres';
}

if($_SESSION['crea_erreur']==TRUE){
    header("location:Page_creation_soutenance.php");
}

else{
$titre = $_POST['titre'];
$jour = $_POST['jour'];
$mois = $_POST['mois'];
$annee = $_POST['annee'];
$heure = $_POST['heure'];
$minute = $_POST['minute'];
$duree = $_POST['duree'];
$duree_sou = $_POST['duree_sou'];
$id = $_SESSION['id'];

$nb_sou = floor($duree/$duree_sou);
$duree_minute=$duree_sou;
$duree_heure=0;
$duree_sou_heure=0;
while($duree>=60){
    $duree=$duree-60;
    $duree_heure=$duree_heure+1;
}
while($duree_sou>=60){
    $duree_sou=$duree_sou-60;
    $duree_sou_heure=$duree_sou_heure+1;
}


$_SESSION['soutenance_cree']="Votre séance a bien été créée !";

$conn->query("INSERT INTO seance_sea(sea_TITRE,sea_ens_ID,sea_DATE,sea_HEURE,sea_DUREE,sea_DUREE_SOU) VALUES ('$titre','$id','$annee-$mois-$jour','$heure:$minute:00','$duree_heure:$duree:00','$duree_sou_heure:$duree_sou:00')");


for ($i = 0; $i < $nb_sou; $i++) {
    $data= $conn->query("SELECT *
                        FROM soutenance_sou");
    foreach ($data as $row) {
                        $id_sou=$row['sou_ID'];
    }
    $id_sou=$id_sou+1;
$conn->query("INSERT INTO soutenance_sou(sou_ID,sou_ens_ID,sou_el_ID,sou_DATE,sou_HEURE,sou_DUREE,sou_CHOIX) VALUES ('$id_sou','$id','0','$annee-$mois-$jour','$heure:$minute:00','$duree_sou_heure:$duree_sou:00','0')");
if($minute+$duree_minute < 60){
    $minute=$minute+$duree_minute;
}
    else{
        $minute=$minute+$duree_minute-60;
        $heure=$heure+1;
    }
}
header("location:page_menu_professeur.php");
}
?>
