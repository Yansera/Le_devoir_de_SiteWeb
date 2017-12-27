<?php include 'CoMySQL.inc.php';
?>

<!DOCTYPE html>
<html>
    <?php include 'header_choice.inc.php' ;?>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

        <title>Soutenance ESIGELEC</title>
    </head>

    <body>
        <p class="espace"> </p>

        <?php if (isset($_SESSION['crea_erreur'])){
    unset($_SESSION['crea_erreur']);}
        if (isset($_SESSION['compte_cree'])){
            echo '<div class="vert centrer">'.$_SESSION['compte_cree'].'</div>';
            echo '<p class="petit-espace"> </p>';
    unset($_SESSION['compte_cree']);}
        if (isset($_SESSION['mauvais_champ'])){
            echo '<div class="rouge centrer">'.$_SESSION['mauvais_champ'].'</div>';
            echo '<p class="petit-espace"> </p>';
            unset($_SESSION['mauvais_champ']);}
        ?>

        <div class="marge_gauche">
            <form method="POST" action="Page_validation_connexion2.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Identifiant :</label>
                    <input class="form-control" id="nom" name="identifiant" aria-describedby="emailHelp" placeholder="Identifiant">
                    <?php if (isset($_SESSION['erreur_chaine_id'])){
    echo '<small class="rouge">'.$_SESSION['erreur_chaine_id'].'</small>';
    unset($_SESSION['erreur_chaine_id']);}
                    ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Mot de Passe :</label>
                    <input type="password" class="form-control" name="mot-de-passe" id="exampleInputPassword1" placeholder="Mot de passe">
                    <?php if (isset($_SESSION['erreur_chaine_mdp'])){
    echo '<small class="rouge">'.$_SESSION['erreur_chaine_mdp'].'</small>';
    unset($_SESSION['erreur_chaine_mdp']);}
                    ?>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="el/ens" id="inlineRadio1" value="eleve" CHECKED/> Elève
                    </label>
                </div>
                <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="el/ens" id="inlineRadio2" value="enseignant"> Enseignant
                    </label>
                </div>
                <div class="petit-espace"> </div>
                <button type="submit" class="btn btn-primary">Envoyer</button>
            </form>
        </div>
    </body>

</html>
