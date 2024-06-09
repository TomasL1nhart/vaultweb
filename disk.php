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
        <a href="index.html">
            <img src="img/logo.svg" alt="logo" class="logo-img">
        </a>        
        <div class="hamburger" onclick="toggleMenu(true)">
            &#9776;
        </div>
        <div class="menu-buttons" id="menuButtons">
            <div class="menu-button">
                <a href="disk.php">Disk</a>
            </div>
            <div class="menu-button">
                <a href="upload.php">Nahrát modely</a>
            </div>
            <div class="menu-button">
                <a href="index.html#about" onclick="hideMenu()">O nás</a>
            </div>
        </div>
    </nav>

    <script>
        function toggleMenu(toggle) {
            var menuButtons = document.getElementById("menuButtons");
            if (toggle !== undefined) {
                menuButtons.classList.toggle("active", toggle);
            } else {
                menuButtons.classList.toggle("active");
            }
        }

        function hideMenu() {
            var menuButtons = document.getElementById("menuButtons");
            menuButtons.classList.remove("active");
        }
    </script>
    
    <div class="container">
        <br><br>
        <h3>Tvůj Disk</h3>
        <?php
        $directory = "Uploads/";
        $files = glob($directory . "*");
    
            foreach($files as $file) {
                $filename = basename($file);
                $upload_time = date("Y-m-d H:i:s", filemtime($file));
                ?>
                <div class="file-box">
                    <div class="file-details">
                        <img src="img/folder.svg" alt="Folder Icon" class="folder-icon">
                        <hr>
                        <div class="file-name"><?php echo (strlen($filename) > 15 ? substr($filename, 0, 15) . '..' : $filename); ?></div>
                        <div class="upload-time">Nahráno: <?php echo $upload_time; ?></div>
                        <div class="download-link"><a href="<?php echo $file; ?>" download>Stáhnout</a></div>
                    </div>
                </div>
                <?php
            }
            ?>          
    </div>
    </div>
    <footer class="footer">
        <h4>Vault Web</h4>
        <p>Vytvořeno v 2024</p>
    </footer>
</body>
</html>