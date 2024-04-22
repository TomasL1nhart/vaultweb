<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "garbage/";
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Check if file already exists
    if (file_exists($target_file)) {
        $errorMessage = "Sorry, file already exists.";
        echo json_encode(['error' => $errorMessage]);
        exit();
    }

    // Check file size
    if ($_FILES["file"]["size"] > 500000) {
        $errorMessage = "Sorry, your file is too large.";
        echo json_encode(['error' => $errorMessage]);
        exit();
    }

    // Allow certain file formats
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        $errorMessage = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        echo json_encode(['error' => $errorMessage]);
        exit();
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $errorMessage = "Sorry, your file was not uploaded.";
        echo json_encode(['error' => $errorMessage]);
        exit();
    } else {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            $successMessage = "The file " . htmlspecialchars(basename($_FILES["file"]["name"])) . " has been uploaded.";
            echo json_encode(['success' => $successMessage]);
            exit();
        } else {
            $errorMessage = "Sorry, there was an error uploading your file.";
            echo json_encode(['error' => $errorMessage]);
            exit();
        }
    }
} else {
    // If not a POST request, redirect to upload.html
    header("Location: upload.html");
    exit();
}
?>
