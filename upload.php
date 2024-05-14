<?php
include('config.php');

if(isset($_POST['submit'])) {
    $file_name = $_FILES['model']['name'];
    $tempname = $_FILES['model']['tmp_name'];
    $folder = 'Uploads/' . basename($file_name);
    
    $allowed_extensions = array('obj', 'fbx', 'glbf');
    $file_extension = pathinfo($file_name, PATHINFO_EXTENSION);
    if(!in_array(strtolower($file_extension), $allowed_extensions)) {
        echo "<h4>Toto nejde nahrát, špatný formát. Jenom OBJ, FBX, GLBF soubory jsou povoleny.</h4>";
        exit;
    }

    if ($_FILES['model']['error'] !== UPLOAD_ERR_OK) {
        echo "<h4>An error occurred during file upload. Please try again.</h4>";
        exit;
    }

    if(move_uploaded_file($tempname, $folder)) {
        $query = mysqli_query($con, "INSERT INTO models (file) VALUES ('$file_name')");
        if ($query) {
            echo "<h4>File uploaded successfully and database updated.</h4>";
        } else {
            echo "<h4>Failed to update the database.</h4>";
        }
    } else {
        echo "<h4>Failed to upload the file. Please check the folder permissions.</h4>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nimbus+Sans+L:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles3.css">
    <title>Upload</title>
    <link rel="icon" type="image/x-icon" href="img/main.ico">
</head>
<body>
    <div class="container">
        <input type="checkbox" id="hamburger">
        <label for="hamburger">
            &#9776;
        </label>
        <h2>Nahrát nový Model</h2>
        <div class="image-container">
            <img src="img/upload.svg" alt="uploading" id="image" />
            <form id="uploadForm" method="post" enctype="multipart/form-data">
              <input type="file" name="model" id="file-input" />
              <button type="submit" name="submit">Submit</button>
            </form>
          </div>
        <h3>Přetáhni nebo Vyhledej</h3>
    </div>
    <script src="script.js"></script>
</body>
</html>
