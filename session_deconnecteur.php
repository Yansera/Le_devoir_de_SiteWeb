<?php session_start();
    session_destroy();
    if(isset($_COOKIE[session_name()])) {
            setcookie(session_name(),'',time()-3600);
    }
    $_SESSION = array();
    exit(header('Location: Page_validation_connexion.php?msg=' . urlencode(base64_encode("Vous êtes bien déconnecté !"))));
?>
