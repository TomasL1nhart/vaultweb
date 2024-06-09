<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Nimbus+Sans+L:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/styles2.css">
    <title>Disk</title>
    <link rel="icon" type="image/x-icon" href="img/main.ico">
</head>
<body>
<nav class="menu">
        <img src="img/logo.png" alt="logo" class="logo-img">
        <div class="menu-button">
            <a href="disk.php">Disk</a>
        </div>
        <div class="menu-button">
            <a href="upload.php">Nahrát modely</a>
        </div>
        <div class="menu-button">
            <a href="index.html#about">O nás</a>
        </div>
    </nav>
    <div class="container">
    <h3>Tvůj Disk</h3>
        <?php
        $directory = "Uploads/"; // Assuming your files are in this directory
        $files = glob($directory . "*");
        
        foreach($files as $file) {
            $filename = basename($file);
            $upload_time = date("Y-m-d H:i:s", filemtime($file)); // Get upload time
            $file_extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION)); // Get file extension
            
            echo "<div class='file-box" . ($file_extension == 'mp4' ? ' video' : '') . "'>";
            echo "<div class='file-details'>";
            if ($file_extension == 'mp4') {
                echo "<div class='video-container'><video controls><source src='$file' type='video/mp4'>Your browser does not support the video tag.</video></div>";
            } else {
                echo "<div class='download-link'><a href='$file' download>Stáhnout</a></div>"; // Download link
            }
            echo "<div class='file-name'>" . (strlen($filename) > 18 ? substr($filename, 0, 18) . '..' : $filename) . "</div>";
            echo "<div class='upload-time'>Uploaded: " . $upload_time . "</div>";
            echo "</div>";
            echo "</div>";
        }
        ?>
    </div>
    <footer class="footer">
        <h4>Vault Web</h4>
        <p>Vytvořeno v 2024</p>
    </footer>
</body>
</html>