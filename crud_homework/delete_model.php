<?php
if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    require_once('database/database.php');

    $id = $_GET["id"];

    deleteStudent($id);

    // Redirect to index.php after deleting the student
    header("Location: index.php");
    exit();
}
?>
