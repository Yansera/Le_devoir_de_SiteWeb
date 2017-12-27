<?php
require_once("./CoMySQL.inc.php");
/* Définition de la variable titre pour la page d'accueil */
// Contenu de la page
echo '<body>';

// Récupération des données dans la BDD
try {
    $dbh = connectMySQL();
    $data= $dbh->query('SELECT * from seance_sea');
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "";
    die();
}


// affichage du tableau
echo '<table class="table">
       <div class="centrer">
        <thead>
            <tr>
            <th>TITRE</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Duree</th>
            </tr>
        </thead>
        </div>
  <tbody>';
foreach ($data as $row) {
        echo '<tr>
        <td>'.$row['sea_TITRE'].'</td>
        <td>'.$row['sea_DATE'].'</td>
        <td>'.$row['sea_HEURE'].'</td>
        <td>'.$row['sea_DUREE'].'</td>
        </tr>';
    }
    echo '
  </tbody>
</table></body>

    </html>';

    ?>
