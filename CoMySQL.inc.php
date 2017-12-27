<?php

session_start();
function connectMySQL() {
    try {
        $pdo = new PDO("mysql:host=localhost;dbname=bddgr0810","gr0810rf3u","eUaQzsRi");
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch (PDOException $e) {
        echo "Erreur !: " . $e->getMessage();
        die();
    }
    return $pdo;
}
?>
