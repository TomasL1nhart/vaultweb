<?php
include('config.php');
if(isset($_POST['submit'])) {
$file_name = $_FILES['image']['name'];
$tempname = $_FILES['image']['tmp_name'];
$folder = 'Uploads/'.$file_name;

$query = mysqli_query($con, "Insert into models (file) values ('$file_name')");
if(move_uploaded_file($tempname, $folder)) {
echo "<h2>File uploaded successfully</h2>"; 
} else {
echo "<h2>File uploaded successfully</h2>";
}
}
?>

<!DOCTYPE html>
<html lang="en"><head>
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
              <input type="file" name="image" id="file-input" />
              <button type="submit" name="submit">Submit</button>
            </form>
          </div>
        <h3>Přetáhni nebo Vyhledej</h3>
    </div>
    <script src="script.js"></script>
</body>
</html>