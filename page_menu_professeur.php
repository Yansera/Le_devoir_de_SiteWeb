<!DOCTYPE html>
<html>

    <?php
    session_start();
    ?>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

        <title>menu professeur</title>
    </head>

    <body>

        <?php include 'header_choice.inc.php' ;?>
        <?php if (isset($_SESSION['compte_cree'])){
    echo '<div class="vert centrer">'.$_SESSION['compte_cree'].'</div>';
    echo '<p class="petit-espace"> </p>';
    unset($_SESSION['compte_cree']);}

        if (isset($_SESSION['soutenance_cree'])){
    echo '<div class="vert centrer">'.$_SESSION['soutenance_cree'].'</div>';
    echo '<p class="petit-espace"> </p>';
    unset($_SESSION['soutenance_cree']);}

        if (isset($_SESSION['soutenance_place'])){
    echo '<div class="vert centrer">'.$_SESSION['soutenance_place'].'</div>';
    echo '<p class="petit-espace"> </p>';
    unset($_SESSION['soutenance_place']);}

        if($_SESSION['position']==1){
            echo '<div class="centrer">
                <p class="moyen-espace"> </p>
                <p1>Que voulez-vous faire? </p1>
                <p class="moyen-espace"> </p>
                <p>
                    <a href="Page_liste_seance_prof.php">
                    <button type="submit" class="btn btn-primary bouton-prof">Voir le PLANNING des séances</button>
                    </a>
                    <a href="page_importer_eleve.php">
                        <button type="submit" class="btn btn-primary bouton-prof">Importer des élèves</button>
                    </a>
                </p>
                <p>
                    <a href="page_creation_soutenance.php">
                        <button type="submit" class="btn btn-primary bouton-prof">Créer une séance de soutenances</button>
                    </a>
                    <a href=Page_creation_compte.php>
                        <button type="submit" class="btn btn-primary bouton-prof">Créer un compte professeur</button>
                    </a>
                </p>
            </div>';
        }
        else{
            echo'<p1 class="rouge">Veuillez vous connecter en tant que professeur </p1>';
        }
        ?>

    </body>
