<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index.php</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <div class="content">
        <?php
        include "nav-bar.php";
        ?>

        <div id="gallery">
            <?php
            include "connect.php";
            ?>
        </div>
    </div>
    <div class="upload">
        <form action="upload.php" method="POST" enctype="multipart/form-data">
            <input type="file" name="file" class="choose-file">
            <input type="text" name="sound-name">
            <button type="submit" name="submit" class="submit">Upload</button>
        </form>

    </div>
</body>

</html>