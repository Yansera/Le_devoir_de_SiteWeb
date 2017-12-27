<?php include 'CoMySQL.inc.php';
session_start();


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
$mdp_dangereux=$_POST['mot-de-passe'];

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

if($_SESSION['crea_erreur']==TRUE){
    header("location:Page_connexion.php");
}
else{
    if (!empty($_POST)) {
        if ($id = $_POST['identifiant']) {
            $conn1=connectMySQL();

            $stmt1 = $conn1->prepare("SELECT el_MDP FROM eleve_el WHERE el_ID= :identifiant ");
            if (!($stmt1 = $conn1->prepare("SELECT el_MDP FROM eleve_el WHERE el_ID= :identifiant "))) {
                echo "Echec de la préparation : (" . $pdo->connect_errno . ") " . $pdo->connect_error;
            }

            $conn2=connectMySQL();
            $stmt2 = $conn2->prepare("SELECT ens_MDP FROM enseignant_ens WHERE ens_ID= :identifiant");
            if (!($stmt2 = $conn2->prepare("SELECT ens_MDP FROM enseignant_ens WHERE ens_ID= :identifiant"))) {
                echo "Echec de la préparation : (" . $pdo->connect_errno . ") " . $pdo->connect_error;
            }

            //affectation
            $stmt1->bindParam(':identifiant', $id, PDO::PARAM_STR);
            $stmt2->bindParam(':identifiant', $id, PDO::PARAM_STR);

            //execution
            if ($_POST['el/ens'] == 'eleve'){
                $stmt1->execute();
                $row1 = $stmt1->fetch(PDO::FETCH_ASSOC);
                if (!$stmt1->execute()) {
                    echo "Echec lors de l’exécution de la requête : (" . $stmt->errno . ") " . $stmt->error;
                }
                if (password_verify($_POST['mot-de-passe'], $row1['el_MDP'])){

                    $_SESSION['position']=0;
                    $_SESSION['id']=$_POST['identifiant'];
                    $conn_name=connectMySQL();
                    $stmt1_name= $conn_name->query("SELECT el_PRENOM FROM eleve_el WHERE el_ID= '$id'");
                    $row_name = $stmt1_name->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['prenom'] = $row_name['el_PRENOM'];

                    $stmt1_name= $conn_name->query("SELECT el_NOM FROM eleve_el WHERE el_ID= '$id'");
                    $row_name = $stmt1_name->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['nom'] = $row_name['el_NOM'];
                    header("location:page_menu_eleve.php");
                }
                else{
                    header("location:Page_connexion.php");
                    $_SESSION['mauvais_champ']="Le mot de passe ou l'identifiant est erroné";
                }
            }



            else if ($_POST['el/ens']=='enseignant'){
                $stmt2->execute();
                $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                if (!$stmt2->execute()) {
                    echo "Echec lors de l’exécution de la requête : (" . $stmt->errno . ") " . $stmt->error;
                }
                if (password_verify($_POST['mot-de-passe'], $row2['ens_MDP'])){
                    $_SESSION['position']=1;
                    $_SESSION['id']=$_POST['identifiant'];
                    $conn_name=connectMySQL();
                    $stmt2_name= $conn_name->query("SELECT ens_PRENOM FROM enseignant_ens WHERE ens_ID= '$id'");
                    $row_name = $stmt2_name->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['prenom'] = $row_name['ens_PRENOM'];
                    $stmt2_name= $conn_name->query("SELECT ens_NOM FROM enseignant_ens WHERE ens_ID= '$id'");
                    $row_name = $stmt2_name->fetch(PDO::FETCH_ASSOC);
                    $_SESSION['nom'] = $row_name['ens_NOM'];
                    header("location:page_menu_professeur.php");
                }
                else{
                    header("location:Page_connexion.php");
                    $_SESSION['mauvais_champ']="Le mot de passe ou l'identifiant est erroné";
                }
            }
        }
    }
}

?>
