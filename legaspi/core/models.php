<?php

require_once 'dbConfig.php';

function insertIntoDevRecords($pdo, $id, $in_game_name, $name, $email, $password, $fav_game, $skills, $gamedev_experience, $created_at) {
    $sql = "INSERT INTO developers (id, in_game_name, name, email, password, fav_game, skills, gamedev_experience, created_at) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";

    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execute([$id, $in_game_name, $name, $email, $password, $fav_game, $skills, $gamedev_experience, $created_at]);

    if ($executeQuery) {
        return true;
    } else {
        // Handle errors here, e.g., log the error or throw an exception
        return false;
    }
}
function seeAllDevRecords($pdo) {
    $sql = "SELECT * FROM developers";
    $stmt = $pdo->prepare($sql);
    $executeQuery = $stmt->execute();
    if ($executeQuery){
        return $stmt->fetchAll();
    }
}
function getDevByID($pdo, $id){
    $sql = "SELECT * FROM developers WHERE id = ?";
    $stmt = $pdo->prepare($sql);
    if ($stmt->execute([$id])){
        return $stmt->fetch();
    }
}
function updateADev($pdo, $id, $in_game_name, $name, $email, $password, $fav_game, $skills, $gamedev_experience, $created_at) {
    $sql = "UPDATE developers SET in_game_name = ?, name = ?, email = ?, password = ?, fav_game = ?, skills = ?, gamedev_experience = ?, created_at = ? WHERE id = ?";

    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execute([$in_game_name, $name, $email, $password, $fav_game, $skills, $gamedev_experience, $created_at, $id]);

    if ($executeQuery) {
        return true;
    } else {
        // Handle errors here, e.g., log the error or throw an exception
        return false;
    }
}
function deleteADev($pdo, $id) {
    $sql = "DELETE FROM developers WHERE id = ?";
    $stmt = $pdo->prepare($sql);

    $executeQuery = $stmt->execute([$id]);

    if ($executeQuery) {
        return true;
    } else {
        // Handle errors here, e.g., log the error or throw an exception
        return false;
    }
}
function generateUniqueId() {
    // Generate a random string of characters
    $randomString = bin2hex(random_bytes(16));

    // Add a timestamp to ensure uniqueness
    $timestamp = time();

    // Combine the random string and timestamp
    $uniqueId = $randomString . $timestamp;

    return $uniqueId;
}
?>