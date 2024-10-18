<?php

require_once 'dbConfig.php';
require_once 'models.php';

if (isset($_POST['insertNewDevBtn'])) {
    // Get form values and trim spaces
    $id = generateUniqueId();
    $in_game_name = isset($_POST['in_game_name']) ? trim($_POST['in_game_name']) : null;
    $name = isset($_POST['name']) ? trim($_POST['name']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;
    $fav_game = isset($_POST['fav_game']) ? trim($_POST['fav_game']) : null;
    $skills = isset($_POST['skills']) ? trim($_POST['skills']) : null;
    $gamedev_experience = isset($_POST['gamedev_experience']) ? trim($_POST['gamedev_experience']) : null;
    $created_at = isset($_POST['created_at']) ? trim($_POST['created_at']) : null;

    // Check if all fields are filled
    if (!empty($id) && !empty($in_game_name) && !empty($name) && !empty($email) && !empty($password) && !empty($fav_game) && !empty($skills) && !empty($gamedev_experience) && !empty($created_at)) {
        // Insert the data into the database
        $query = insertIntoDevRecords($pdo, $id, $in_game_name, $name, $email, $password, $fav_game, $skills, $gamedev_experience, $created_at);
        
        if ($query) {
            header("Location: ../index.php");
        } else {
            echo "Insertion failed";
        }
    } else {
        echo "Make sure that no fields are empty.";
    }
}

if (isset($_POST['editDevBtn'])) {
    $id = $_GET['id'];
    $in_game_name = isset($_POST['in_game_name']) ? trim($_POST['in_game_name']) : null;
    $name = isset($_POST['name']) ? trim($_POST['name']) : null;
    $email = isset($_POST['email']) ? trim($_POST['email']) : null;
    $password = isset($_POST['password']) ? trim($_POST['password']) : null;
    $fav_game = isset($_POST['fav_game']) ? trim($_POST['fav_game']) : null;
    $skills = isset($_POST['skills']) ? trim($_POST['skills']) : null;
    $gamedev_experience = isset($_POST['gamedev_experience']) ? trim($_POST['gamedev_experience']) : null;
    $created_at = isset($_POST['created_at']) ? trim($_POST['created_at']) : null;

    // Check if all fields are filled
    if (!empty($id) && !empty($in_game_name) && !empty($name) && !empty($email) && !empty($password) && !empty($fav_game) && !empty($skills) && !empty($gamedev_experience) && !empty($created_at)) {
        // Update the data in the database
        $query = updateADev($pdo, $id, $in_game_name, $name, $email, $password, $fav_game, $skills, $gamedev_experience, $created_at);

        if ($query) {
            header("Location: ../index.php");
        } else {
            echo "Update failed";
        }
    } else {
        echo "Make sure that no fields are empty";
    }
}

if (isset($_POST['deleteDevBtn'])) {
    $query = deleteADev($pdo, $_GET['id']);

    if ($query) {
        header("Location: ../index.php");
    } else {
        echo "Deletion failed";
    }
}

