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

// récupération du nom depuis le formulaire
$id_dangereux=$_POST['identifiant'];
$mdp_dangereux=$_POST['mdp'];
$nom_dangereux=$_POST['nom'];
$prenom_dangereux=$_POST['prenom'];


// validation du nom avec la fonction validerNom
$id_securise=filter_var($id_dangereux, FILTER_CALLBACK, array('options' => 'validerNom'));

// si $nom_securise contient FALSE, le formulaire n'est pas valide
if ($id_securise==FALSE){
    // on indique qu'il y a au moins cette erreur pour que l'utilisateur corrige sa saisie
    $_SESSION['crea_erreur']=TRUE;
    // on indique le problème pour permettre à l'utilisateur de faire sa correction
    $_SESSION['erreur_chaine_id']="Le champ ne doit contenir que des lettres, des chiffres, des tirets et des espaces";
}

$mdp_securise=filter_var($mdp_dangereux, FILTER_CALLBACK, array('options' => 'validerNom'));

if ($mdp_securise==FALSE){
    // on indique qu'il y a au moins cette erreur pour que l'utilisateur corrige sa saisie
    $_SESSION['crea_erreur']=TRUE;
    // on indique le problème pour permettre à l'utilisateur de faire sa correction
    $_SESSION['erreur_chaine_mdp']='Le champ ne doit contenir que des lettres, des chiffres, des tirets et des espaces';
}

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
    header("location:Page_creation_compte.php");
}
else{
$nom1 = $_POST['nom'];
$prenom1 = $_POST['prenom'];
$id1 = $_POST['identifiant'];
$mdp1 = password_hash($_POST['mdp'], PASSWORD_DEFAULT);
$groupe1 = $_POST['groupe'];

$_SESSION['compte_cree']="Votre compte a bien été créé !";
    if($_SESSION['position']==NULL){
        $conn->query("INSERT INTO eleve_el(el_ID,el_NOM,el_PRENOM,el_MDP,el_GROUPE) VALUES ('$id1','$nom1','$prenom1','$mdp1','$groupe1')");
        header("location:Page_connexion.php");
    }
else if($_SESSION['position']==1){
    $conn->query("INSERT INTO enseignant_ens(ens_ID,ens_NOM,ens_PRENOM,ens_MDP) VALUES ('$id1','$nom1','$prenom1','$mdp1')");
    header("location:Page_menu_professeur.php");
}
}
?>
