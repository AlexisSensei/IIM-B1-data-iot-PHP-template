<?php
require 'config.php';
// Get one random task
$query = $db->query("SELECT * FROM tasks ORDER BY RANDOM() LIMIT 1;");
$task = $query->fetch(PDO::FETCH_ASSOC);

echo json_encode($task);
