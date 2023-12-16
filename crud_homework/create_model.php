<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('database/database.php');

    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $image_url = $_POST["image_url"];

    createStudent($name, $age, $email, $image_url);

    // Redirect to index.php after creating the student
    header("Location: index.php");
    exit();
}
?>
