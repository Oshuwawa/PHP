<?php require_once 'core/dbconfig.php'?>
<?php require_once 'core/models.php'?>
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
    <?php require_once 'core/dbConfig.php'; ?>

    <?php
    $id = $_GET['id'];

    $getDevByID = getDevByID($pdo, $id);

    if ($getDevByID) {
        $in_game_name = $getDevByID['in_game_name'];
        $name = $getDevByID['name'];
        $email = $getDevByID['email'];
        $password = $getDevByID['password'];
        $fav_game = $getDevByID['fav_game'];
        $gamedev_experience = $getDevByID['gamedev_experience'];
        $skill = $getDevByID['skill'];
        $created_at = $getDevByID['created_at'];
    } else {
        echo "Dev not found.";
    }
    ?>

    <h2>Developer Information</h2>

    <table style="width: 50%; margin-top: 50px;">
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
        <tr>
            <td><?php echo $id; ?></td>
            <td><?php echo $in_game_name; ?></td>
            <td><?php echo $name; ?></td>
            <td><?php echo $email; ?></td>
            <td><?php echo $password; ?></td>
            <td><?php echo $fav_game; ?></td>
            <td><?php echo $gamedev_experience; ?></td>
            <td><?php echo $skill; ?></td>
            <td><?php echo $created_at; ?></td>
        </tr>
    </table>

    <form action="core/updateDevInfo.php" method="POST">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <p>
            <label for="In Game Name">In Game Name</label>
            <input type="text" name="In Game Name" value="<?php echo $in_game_name; ?>">
        </p>
        <p>
            <label for="name">Name</label>
            <input type="text" name="name" value="<?php echo $name; ?>">
        </p>
        <p>
            <label for="email">email</label>
            <input type="text" name="email" value="<?php echo $email; ?>">
        </p>
        <p>
            <label for="password">password</label>
            <input type="text" name="password" value="<?php echo $password; ?>">
        </p>
        <p>
            <label for="Favorite game">Favorite game</label>
            <input type="text" name="Favorite game" value="<?php echo $fav_game; ?>">
        </p>
        <p>
            <label for="skills">skills</label>
            <input type="text" name="skills" value="<?php echo $skills; ?>">
        </p>
        <p>
            <label for="experience">experience</label>
            <input type="text" name="experience" value="<?php echo $gamedev_experience; ?>">
        </p>
        <p>
            <label for="created at">created at</label>
            <input type="text" name="created at" value="<?php echo $created_at; ?>">
        </p>
        <p>
            <input type="submit" name="updateDevBtn">
        </p>
    </form>
</body>
</html>