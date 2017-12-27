<?php
require_once("./CoMySQL.inc.php");
/* Définition de la variable titre pour la page d'accueil */
// Contenu de la page
echo '<body>';

$id = $_SESSION['id'];

// Récupération des données dans la BDD
try {
    $dbh = connectMySQL();
    $data= $dbh->query("SELECT *
                        FROM soutenance_sou
                        INNER JOIN enseignant_ens
                        ON soutenance_sou.sou_ens_id = enseignant_ens.ens_ID
                        WHERE sou_CHOIX = 1 AND sou_el_ID = '$id'");
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
            </tr>
        </thead>
  <tbody>';
foreach ($data as $row) {
        echo '<tr>
        <td>'.$row['ens_NOM'].'</td>
        <td>'.$row['sou_DATE'].'</td>
        <td>'.$row['sou_HEURE'].'</td>
        <td>'.$row['sou_DUREE'].'</td>
        </tr>';
    }
    echo '
  </tbody>
</table>
</body>
<a href="Page_menu_eleve.php">
                    <button type="submit" class="btn btn-primary">Retournez</button>
                </a>

</html>';

    ?>
