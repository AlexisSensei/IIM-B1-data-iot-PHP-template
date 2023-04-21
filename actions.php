<?php
require 'config.php';

if(isset($_POST['action'])) {
    $action = $_POST['action'];
} else {
    $action = $_GET['action'];
}
switch ($action) {
    case 'add':
        $content = $_POST['content'];
        $colors = array('red', 'green', 'blue', 'yellow', 'purple');
        $cat = $colors[array_rand($colors)];
        $query = $db->prepare("INSERT INTO tasks (content, cat) VALUES (:content, :cat);");
        $query->bindParam(':content', $content);
        $query->bindParam(':cat', $cat);
        $query->execute();
        break;

    case 'delete':
        $id = $_GET['id'];
        $query = $db->prepare("DELETE FROM tasks WHERE id = :id;");
        $query->bindParam(':id', $id);
        $query->execute();
        break;
}

header('Location: index.php');