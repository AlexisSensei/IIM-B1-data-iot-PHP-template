<?php
$db_file = 'data.db';

try {
    $db = new PDO("sqlite:" . $db_file);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Erreur de connexion: " . $e->getMessage();
    exit();
}

// Création de la table si elle n'existe pas
try {
    $db->exec("CREATE TABLE IF NOT EXISTS tasks (id INTEGER PRIMARY KEY, content TEXT NOT NULL, cat TEXT NOT NULL);");
    $db->exec("PRAGMA encoding = 'UTF-8';");
} catch (PDOException $e) {
    echo "Erreur lors de la création de la table: " . $e->getMessage();
}
