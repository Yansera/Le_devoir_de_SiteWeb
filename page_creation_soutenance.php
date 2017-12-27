<!DOCTYPE html>

<?php
session_start();
?>

    <html>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <title>Créer un examen</title>
    </head>

    <body>

        <?php include 'header_choice.inc.php'; ?>

            <p class="moyen-espace"> </p>

            <!--<div id="centrer"> -->
            <form method="POST" action="Page_validation_creation_soutenance.php">
                <div class="marge_gauche">

                    <?php if (isset($_SESSION['crea_erreur'])){
    unset($_SESSION['crea_erreur']);}
                ?>
                    <div class="form-group">
                        <label class="gras">Titre :</label>
                        <input class="form-control" id="nom" name="titre" aria-describedby="emailHelp" placeholder="Intitulé de la soutenance">
                        <?php if (isset($_SESSION['erreur_chaine_titre'])){
    echo '<small class="rouge">'.$_SESSION['erreur_chaine_titre'].'</small>';
    unset($_SESSION['erreur_chaine_titre']);}
                    ?>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1" class="gras">Date :</label>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Jour :</label>
                            <input class="form-control" name="jour" aria-describedby="emailHelp">
                            <?php if (isset($_SESSION['erreur_chaine_jour'])){
    echo '<small class="rouge">'.$_SESSION['erreur_chaine_jour'].'</small>';
    unset($_SESSION['erreur_chaine_jour']);}
                    ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Mois :</label>
                            <input class="form-control" name="mois" aria-describedby="emailHelp">
                            <?php if (isset($_SESSION['erreur_chaine_mois'])){
    echo '<small class="rouge">'.$_SESSION['erreur_chaine_mois'].'</small>';
    unset($_SESSION['erreur_chaine_mois']);}
                    ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Année :</label>
                            <input class="form-control" name="annee" aria-describedby="emailHelp">
                            <?php if (isset($_SESSION['erreur_chaine_annee'])){
    echo '<small class="rouge">'.$_SESSION['erreur_chaine_annee'].'</small>';
    unset($_SESSION['erreur_chaine_annee']);}
                    ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Heure :</label>
                            <input class="form-control" name="heure" aria-describedby="emailHelp">
                            <?php if (isset($_SESSION['erreur_chaine_heure'])){
    echo '<small class="rouge">'.$_SESSION['erreur_chaine_heure'].'</small>';
    unset($_SESSION['erreur_chaine_heure']);}
                    ?>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Minute :</label>
                            <input class="form-control" name="minute" aria-describedby="emailHelp">
                            <?php if (isset($_SESSION['erreur_chaine_minute'])){
    echo '<small class="rouge">'.$_SESSION['erreur_chaine_minute'].'</small>';
    unset($_SESSION['erreur_chaine_minute']);}
                    ?>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1" class="gras">Durée totale de la séance (en minutes) :</label>
                        <input class="form-control" name="duree" id="exampleInputPassword1">
                        <?php if (isset($_SESSION['erreur_chaine_duree'])){
    echo '<small class="rouge">'.$_SESSION['erreur_chaine_duree'].'</small>';
    unset($_SESSION['erreur_chaine_duree']);}
                    ?>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputPassword1" class="gras">Durée d'une soutenance (en minutes) :</label>
                        <input class="form-control" name="duree_sou" id="exampleInputPassword1">
                        <?php if (isset($_SESSION['erreur_chaine_duree_sou'])){
    echo '<small class="rouge">'.$_SESSION['erreur_chaine_duree_sou'].'</small>';
    unset($_SESSION['erreur_chaine_duree_sou']);}
                    ?>
                    </div>

                    <a href="Page_validation_creation_soutenance.php">
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                    </a>
                </div>
            </form>
    </body>

    </html>
