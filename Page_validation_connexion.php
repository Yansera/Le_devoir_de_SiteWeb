<?php include 'CoMySQL.inc.php';
session_start();
?>

    <!DOCTYPE html>
    <html>
    <?php include 'header_choice.inc.php' ;?>

        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
            <link rel="stylesheet" href=main.css>

            <title>Soutenance ESIGELEC</title>
        </head>

        <body>
            <h1><?php if (!empty($_GET['msg'])) echo base64_decode($_GET['msg']); ?></h1>
            <?php
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
                        echo "Bienvenue ";
                        $_SESSION['position']=0;
                        $_SESSION['id']=$_POST['identifiant'];
                        $conn_name=connectMySQL();
                        $stmt1_name= $conn_name->query("SELECT el_PRENOM FROM eleve_el WHERE el_ID= '$id'");
                        $row_name = $stmt1_name->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['prenom'] = $row_name['el_PRENOM'];
                        echo htmlspecialchars($row_name['el_PRENOM']);
                        echo " ";
                        $stmt1_name= $conn_name->query("SELECT el_NOM FROM eleve_el WHERE el_ID= '$id'");
                        $row_name = $stmt1_name->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['nom'] = $row_name['el_NOM'];
                        echo htmlspecialchars($row_name['el_NOM']);
                        echo "<br>Vous allez être redirigé";

                        header("refresh:3;url=index.php");
                    }
                }

                else if ($_POST['el/ens']=='enseignant'){
                    $stmt2->execute();
                    $row2 = $stmt2->fetch(PDO::FETCH_ASSOC);
                    if (!$stmt2->execute()) {
                    echo "Echec lors de l’exécution de la requête : (" . $stmt->errno . ") " . $stmt->error;
                }
                    if (password_verify($_POST['mot-de-passe'], $row2['ens_MDP'])){
                        echo "Bienvenue ";
                        $_SESSION['position']=1;
                        $_SESSION['id']=$_POST['identifiant'];
                        $conn_name=connectMySQL();
                        $stmt2_name= $conn_name->query("SELECT ens_PRENOM FROM enseignant_ens WHERE ens_ID= '$id'");
                        $row_name = $stmt2_name->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['prenom'] = $row_name['ens_PRENOM'];
                        echo htmlspecialchars($row_name['ens_PRENOM']);
                        echo " ";
                        $stmt2_name= $conn_name->query("SELECT ens_NOM FROM enseignant_ens WHERE ens_ID= '$id'");
                        $row_name = $stmt2_name->fetch(PDO::FETCH_ASSOC);
                        $_SESSION['nom'] = $row_name['ens_NOM'];
                        echo htmlspecialchars($row_name['ens_NOM']);
                        echo "<br>Vous allez être redirigé";
                        header("refresh:3;url=page_menu_professeur.php");
                    }
                }
            }
        }

        ?>
        </body>

    </html>
