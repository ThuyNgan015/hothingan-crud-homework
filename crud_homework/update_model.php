<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require_once('database/database.php');

    $id = $_POST["id"];
    $name = $_POST["name"];
    $age = $_POST["age"];
    $email = $_POST["email"];
    $image_url = $_POST["image_url"];

    updateStudent($id, $name, $age, $email, $image_url);

    // Redirect to index.php after updating the student
    header("Location: index.php");
    exit();
}
?>
