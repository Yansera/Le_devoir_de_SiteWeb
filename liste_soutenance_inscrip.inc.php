<?php
require_once("./CoMySQL.inc.php");
/* Définition de la variable titre pour la page d'accueil */
// Contenu de la page
echo '<body>';

// Récupération des données dans la BDD
try {
    $dbh = connectMySQL();
    $data= $dbh->query("SELECT *
                        FROM soutenance_sou
                        INNER JOIN enseignant_ens
                        ON soutenance_sou.sou_ens_id = enseignant_ens.ens_ID
                        WHERE sou_CHOIX = 0");
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "";
    die();
}?>



    <div class="marge_gauche">
        <form method="POST" action="Operation_inscrip.php">
            <?php
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
        $id_sou = $row['sou_ID'];
        echo '
        <tr>


        <td>'.$row['ens_ID'].'</td>
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
        </tr>
        ';
    /*
      /*<div class="form-check form-check-inline">
                <button type="submit" class="btn btn-primary" > choisir </button>
            </div>
            <div class="form-check form-check-inline">
                    <label class="form-check-label">
                        <input class="form-check-input" type="radio" name="choix" id="inlineRadio1" value="'.$id_sou.'" CHECKED/>
                    </label>
                </div>*/
    }
    echo '
</tbody>
</table>
<p class="moyen-espace"> </p>
</body>
</html>
 <button type="submit" class="btn btn-primary"> inscription</button>
            </form>
            <p class="moyen-espace"> </p>
            <a href="Page_menu_eleve.php">
            <button type="submit" class="btn btn-primary">Retournez</button>
            </a>';
    ?>
