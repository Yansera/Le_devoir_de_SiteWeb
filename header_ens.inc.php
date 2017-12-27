<?php require_once 'CoMySQL.inc.php';
?>

    <header>
        <a href="index.php">
            <p id="banniere"><em>Soutenance ESIGELEC</em></p>
        </a>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <?php if($_SESSION['position']==1){
    echo '<a class="navbar-brand" href="page_menu_professeur.php">Ma page</a>';
}
        else{
            echo '<a class="navbar-brand" href="index.php">Ma page</a>';
        }
        ?>


                <div  id="navbarSupportedContent">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href=session_deconnecteur.php>Se déconnecter</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link">
                                <?php
                        echo $_SESSION['prenom'];
                        echo '  ';
                        echo $_SESSION['nom'];
                        ?>
                            </a>
                        </li>
                    </ul>
                </div>
        </nav>
    </header>
