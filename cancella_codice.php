<?php
require("connessione.php");

$id = $_GET['id'];

// Prepare and execute the SQL query to delete the record with the given ID
$stmt = $conn->prepare("DELETE FROM snippets WHERE id = ?");
$stmt->bind_param("i", $id);
if ($stmt->execute()) {
  // If the deletion is successful, redirect to the codici.php page
    header("Location: codici.php");
    exit();
} else {
  // If there is an error deleting the record, display an error message
    echo "Error deleting record: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>

