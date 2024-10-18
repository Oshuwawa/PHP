<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        input {
            font-size: 1.5em;
            height: 50px;
            width: 200px;
        }

        table {
            width: 50%;
            margin-top: 50px;
            border: 1px solid black;
        }

        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Are you sure you want to delete this user?</h1>

    <?php require_once 'core/dbConfig.php'; ?>
    <?php require_once 'core/models.php'; ?>

    <?php
    $id = $_GET['id'];
    $getDevById = getDevById($pdo, $id);
    ?>

    <form action="core/handleForms.php?id=<?php echo $id; ?>" method="POST">
        <div class="devContainer" style="border-style: solid; font-family: 'Arial';">
            <p>IGN: <?php echo $getDevById['in_game_name']; ?></p>
            <p>Name: <?php echo $getDevById['name']; ?></p>
            <p>Email</Em>: <?php echo $getDevById['email']; ?></p>
            <p>Password: <?php echo $getDevById['password']; ?></p>
            <p>Favorite game: <?php echo $getDevById['fav_game']; ?></p>
            <p>Skills: <?php echo $getDevById['skills']; ?></p>
            <p>Experience: <?php echo $getDevById['gamedev_experience']; ?></p>
            <p>Created At: <?php echo $getDevById['created_at']; ?></p>
            <input type="submit" name="deleteStudentBtn" value="Delete">
        </div>
    </form>
</body>
</html>