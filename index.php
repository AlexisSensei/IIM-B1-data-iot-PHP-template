<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>To-do List</title>
</head>
<body>
    <h1>To-do List</h1>
    <form action="actions.php" method="post">
        <input type="hidden" name="action" value="add">
        <input type="text" name="content" placeholder="Nouveau contenu">
        <input type="submit" value="Ajouter">
    </form>

    <ul>
        <?php
        require 'config.php';
        $query = $db->query("SELECT * FROM tasks;");
        $tasks = $query->fetchAll(PDO::FETCH_ASSOC);

        foreach ($tasks as $task) {
            echo "<li>";
            echo $task['content'];
            echo " - " . $task['cat'];
            echo ' <a href="actions.php?action=delete&id=' . $task['id'] . '">Supprimer</a>';
            echo "</li>";
        }
        ?>
    </ul>
</body>
</html>