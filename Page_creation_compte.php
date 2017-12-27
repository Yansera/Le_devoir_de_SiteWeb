<?php include 'CoMySQL.inc.php';?>

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

            <p class="moyen-espace"> </p>

            <!--<div id="centrer"> -->
            <div class="marge_gauche">
                <?php if (isset($_SESSION['crea_erreur'])){
    unset($_SESSION['crea_erreur']);}
                ?>
                <form method="POST" action="Page_validation_creation_compte.php">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Nom :</label>
                        <input class="form-control" id="nom" name="nom" aria-describedby="emailHelp" placeholder="Nom">
                        <?php if (isset($_SESSION['erreur_chaine_nom'])){
    echo '<small class="rouge">'.$_SESSION['erreur_chaine_nom'].'</small>';
    unset($_SESSION['erreur_chaine_nom']);}
                    ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Prénom :</label>
                        <input class="form-control" id="nom" name="prenom" aria-describedby="emailHelp" placeholder="Prénom">
                        <?php if (isset($_SESSION['erreur_chaine_prenom'])){
    echo '<small class="rouge">'.$_SESSION['erreur_chaine_prenom'].'</small>';
    unset($_SESSION['erreur_chaine_prenom']);}
                    ?>
                    </div>
                    <div class="petit-espace"> </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Groupe :</label>
                        <small id="emailHelp" class="form-text text-muted">Si vous êtes enseignant, passez cette étape !</small>
                        <select class="form-control form-control-sm" name="groupe">
                            <option>1</option>
                            <option>2</option>
                            <option>3</option>
                            <option>4</option>
                            <option>5</option>
                            <option>6</option>
                            <option>7</option>
                            <option>8</option>
                            <option>9</option>
                            <option>10</option>
                            <option>11</option>
                            <option>12</option>
                            <option>13</option>
                            <option>14</option>
                            <option>15</option>
                        </select>
                        <small id="emailHelp" class="form-text text-muted"></small>
                    </div>

                    <div class="form-group">
                        <label for="exampleInputEmail1">Identifiant :</label>
                        <input class="form-control" id="identifiant" name="identifiant" aria-describedby="emailHelp" placeholder="Identifiant">
                        <?php if (isset($_SESSION['erreur_chaine_id'])){
    echo '<small class="rouge">'.$_SESSION['erreur_chaine_id'].'</small>';
    unset($_SESSION['erreur_chaine_id']);}
                    ?>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Mot de passe :</label>
                        <input type="password" class="form-control" name="mdp" id="exampleInputPassword1" placeholder="Mot de passe">
                        <?php if (isset($_SESSION['erreur_chaine_mdp'])){
    echo '<small class="rouge">'.$_SESSION['erreur_chaine_mdp'].'</small>';
    unset($_SESSION['erreur_chaine_mdp']);}
                    ?>
                    </div>
                        <button type="submit" class="btn btn-primary">Envoyer</button>
                </form>
            </div>
        </body>

    </html>
