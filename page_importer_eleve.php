<!DOCTYPE html>
<html>

    <?php
    session_start();
    ?>

    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="main.css">
        <link rel="stylesheet" href="bootstrap.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">

        <title>importer élève</title>
    </head>

    <body>
        <?php include 'header_choice.inc.php' ;?>

        <p class="espace"> </p>

        <!--<div id="centrer"> -->
        <div class="marge_gauche">
            <form method="POST" action="Page_validation_importer.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Nom :</label>
                    <input class="form-control" id="nom" aria-describedby="emailHelp" placeholder="Nom de l'élève" name="nom">
                    <?php if (isset($_SESSION['erreur_chaine_nom'])){
    echo '<small class="rouge">'.$_SESSION['erreur_chaine_nom'].'</small>';
    unset($_SESSION['erreur_chaine_nom']);}
                    ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Prénom :</label>
                    <input class="form-control" id="prenom" aria-describedby="emailHelp" placeholder="Prénom de l'élève" name="prenom">
                    <?php if (isset($_SESSION['erreur_chaine_prenom'])){
    echo '<small class="rouge">'.$_SESSION['erreur_chaine_prenom'].'</small>';
    unset($_SESSION['erreur_chaine_prenom']);}
                    ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Groupe :</label>
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
                    <label for="exampleInputEmail1">Soutenance :</label>
                    <?php
                    try {
                        $dbh = connectMySQL();
                        $id=$_SESSION['id'];
                        $data= $dbh->query("SELECT *
                        FROM soutenance_sou
                        INNER JOIN enseignant_ens
                        ON soutenance_sou.sou_ens_id = enseignant_ens.ens_ID
                        WHERE sou_CHOIX = 0 AND enseignant_ens.ens_ID='$id' ");
                        $dbh = null;
                    } catch (PDOException $e) {
                        print "Erreur !: " . $e->getMessage() . "";
                        die();
                    }

                    // affichage du tableau
                    echo '<table class="table">
        <thead>
            <tr>
            <th>Enseignant</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Duree</th>
            <th>CHOIX</th>
            </tr>
        </thead>
  <tbody>';


                    foreach ($data as $row) {
                        $id_sou=$row['sou_ID'];
                        echo '<tr>
        <td>'.$row['ens_NOM'].'</td>
        <td>'.$row['sou_DATE'].'</td>
        <td>'.$row['sou_HEURE'].'</td>
        <td>'.$row['sou_DUREE'].'</td>
        <td>
        <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="choix" id="inlineRadio1" value="'.$id_sou.'" CHECKED/>
                    </label>
                </div>
            </td>
        </tr>';
                    }
                    echo '
</tbody>
</table>
</body>
</html>';
                    ?>

                </div>

                <button type="submit" class="btn btn-primary">Créer</button>
            </form>
        </div>
    </body>

</html>
