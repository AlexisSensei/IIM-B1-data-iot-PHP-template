<?php
require 'config.php';
$content = "Un envoi depuis mon objet connecté";
$colors = array('red', 'green', 'blue', 'yellow', 'purple');
$cat = $colors[array_rand($colors)];
$query = $db->prepare("INSERT INTO tasks (content, cat) VALUES (:content, :cat);");
$query->bindParam(':content', $content);
$query->bindParam(':cat', $cat);
$query->execute();