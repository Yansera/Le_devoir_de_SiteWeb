<body>
    <?php
/* inclusion de la fonction connectMySQL() */
require_once("./connectMySql.inc.php");
/* Définition de la variable titre pour la page d'accueil */
$titre_page="Liste des séances";
/* Inclusion de l'en-têtre */
include 'header.inc.php';

// Contenu de la page
echo '<body>';
include('menu.inc.php');

// Récupération des données dans la BDD
try {
    $dbh = connectMySQL();
    $data= $dbh->query('SELECT * from messages

    ');
    $dbh = null;
} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    die();
}

// affichage du tableau
echo '<table class="table">
        <thead>
            <tr>
            <th>Eleve</th>
            <th>Enseignant</th>
            <th>Date</th>
            <th>Heure</th>
            <th>Duré</th>
            </tr>
        </thead>
  <tbody>';
foreach ($data as $row) {
 /*   echo '<tr>
        <td>'.date('d/m/Y H:m:s', strtotime($row['msg.timestamp'])).'</td>
        <td>'.$row['msg.nomprenom'].'</td>
        <td>(+33) '.$row['msg.telephone'].'</td>
        <td><a href="mailto:'.$row['msg.email'].'">'.$row['msg.email'].'</a></td>
        <td>'.$row['msg.texte'].'</td>';
        }
    echo '</tr>
  </tbody>
</table>';

include 'footer.inc.php';
*/
?>
</body>
