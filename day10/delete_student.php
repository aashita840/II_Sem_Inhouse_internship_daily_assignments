<?php
include("db.php");

// Check if ID is provided
if (!isset($_GET['id'])) {
    header("Location: students.php");
    exit();
}

$id = (int)$_GET['id'];

// Check if student exists
$stmt = $conn->prepare("SELECT * FROM students WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows == 0) {
    header("Location: students.php");
    exit();
}

$stmt->close();

// Delete student
$delete = $conn->prepare("DELETE FROM students WHERE id = ?");
$delete->bind_param("i", $id);

if ($delete->execute()) {
    header("Location: students.php?msg=deleted");
    exit();
} else {
    echo "<h3>Error deleting student!</h3>";
}

$delete->close();
$conn->close();
?>