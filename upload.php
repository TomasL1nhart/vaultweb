<?php
// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME);


    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind the data
    $stmt = $conn->prepare("INSERT INTO files (file_name, file_path) VALUES (?, ?)");
    $stmt->bind_param("ss", $file_name, $file_path);

    // Variables to store file data
    $file_name = $_FILES['file']['name'];
    $file_path = "uploads/" . basename($_FILES['file']['name']); // Change 'uploads/' to your desired folder

    // Move uploaded file to the desired location
    if (move_uploaded_file($_FILES['file']['tmp_name'], $file_path)) {
        // Insert file details into the database
        if ($stmt->execute()) {
            echo "File uploaded successfully.";
        } else {
            echo "Error: " . $stmt->error;
        }
    } else {
        echo "Error uploading file.";
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>
