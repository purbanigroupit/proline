<?php
session_start();
include 'config.php';
?>

<?php
// Your database connection code goes here

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $recipientName = $_POST['recipient_name'];
    $lineNo = $_POST['line_no'];
    $messageText = $_POST['message_text'];
  
    // Perform database insertion here

    // For example, using MySQLi:
    $conn = new mysqli('localhost', 'root', '', 'registration');
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO `line_issues` (`RECIPIENT`, `LINENO`, `MESSAGE`) VALUES ('$recipientName', '$lineNo', '$messageText')";
    
    if ($conn->query($sql) === TRUE) {
        echo "Data saved successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
