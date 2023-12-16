<?php
/**
 * Connect to database
 */
function db() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "web_a";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    return $conn;
}

/**
 * Create new student record
 */
function createStudent($name, $age, $email, $image_url) {
    $conn = db();
    $stmt = $conn->prepare("INSERT INTO student (name, age, email, profile) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("siss", $name, $age, $email, $image_url);

    $stmt->execute();

    $stmt->close();
    $conn->close();
}

/**
 * Get all data from table student
 */
function selectAllStudents() {
    $conn = db();
    $result = $conn->query("SELECT * FROM student");
    $conn->close();
    
    return $result;
}

/**
 * Get only one record by id 
 */
function selectOneStudent($id) {
    $conn = db();
    $stmt = $conn->prepare("SELECT * FROM student WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    $result = $stmt->get_result()->fetch_assoc();
    
    $stmt->close();
    $conn->close();

    return $result;
}

/**
 * Delete student by id
 */
function deleteStudent($id) {
    $conn = db();
    $stmt = $conn->prepare("DELETE FROM student WHERE id = ?");
    $stmt->bind_param("i", $id);
    $stmt->execute();
    
    $stmt->close();
    $conn->close();
}

/**
 * Update students
 */
function updateStudent($id, $name, $age, $email, $image_url) {
    $conn = db();
    $stmt = $conn->prepare("UPDATE student SET name = ?, age = ?, email = ?, profile = ? WHERE id = ?");
    $stmt->bind_param("sissi", $name, $age, $email, $image_url, $id);
    $stmt->execute();
    
    $stmt->close();
    $conn->close();
}
?>
