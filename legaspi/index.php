<?php require_once 'core/dbConfig.php'; ?>
<?php require_once 'core/models.php' ; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Developer Registration Form</title>
    <style>
        body {
            font-family: Arial;
        }

        input {
            font-size: 1.5em;
            height: 50px;
            width: 200px;
        }
    </style>
</head>
<body>
    <h3>Welcome to the Developer Management System. Input your details here to register</h3>
    <form action="core/handleForms.php" method="POST">
        <p>
            <label for="id">ID</label>
            <input type="text" name="ID">
        </p>
        <p>
            <label for="in_game_name">In Game Name</label>
            <input type="text" name="in_game_name">
        </p>
        <p>
            <label for="email">email</label>
            <input type="text" name="email">
        </p>
        <p>
            <label for="password">Password</label>
            <input type="text" name="password">
        </p>
        <p>
            <label for="fav_game">favorite game</label>
            <input type="text" name="fav_game">
        </p>
        <p>
            <label for="skills">skills</label>
            <input type="text" name="skills">
        </p>
        <p>
            <label for="experience">experience</label>
            <input type="text" name="experience">
        </p>
        <p>
            <label for="created at">created at</label>
            <input type="timestamp" name="created at">
        </p>
        <p>
            <input type="submit" name="insertNewDevBtn">
        </p>
    </form>
    <table style="width:50%; margin-top: 50px;">
    <tr>
        <th>ID</th>
        <th>IGN</th>
        <th>Name</th>
        <th>Email</th>
        <th>Password</th>
        <th>Favorite Game</th>
        <th>Skills</th>
        <th>Experience</th>
        <th>Created at</th>
    </tr>

    <?php $seeAllDevRecords = seeAllDevRecords($pdo); ?>
    <?php foreach ($seeAllDevRecords as $row) { ?>
        <tr>
            <td><?php echo $row['id']; ?></td>
            <td><?php echo $row['in_game_name']; ?></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['fav_game']; ?></td>
            <td><?php echo $row['skills']; ?></td>
            <td><?php echo $row['gamedev_experience']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
                <a href="editdev.php?id=<?php echo $row['id'];?>">Edit</a>
                <a href="deletedev.php?id=<?php echo $row['id'];?>">Delete</a>
            </td>
        </tr>
    <?php } ?>

</table>
</body>
</html>