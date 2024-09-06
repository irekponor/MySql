<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $pwd = $_POST["pwd"];
    $email = $_POST["email"];

    try {
        require_once "dbh-inc.php";

        $query = "UPDATE users SET username = :username, pwd = :pwd, email = :email WHERE id = 2;";

        $stmt = $pdo->prepare($query);

        $stmt->bindParam(":username", $username);
        $stmt->bindParam(":pwd", $pwd);
        $stmt->bindParam(":email", $email);

        $stmt->execute();

        $pdo = null;
        $stmt = null;

        header("Location: index.php");

        die();
    } catch (PDOException $e) {
        die("Query Failed:" . $e->getMessage());
    }
} else {
    header("Location: index.php");
}
