<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>File Upload</title>
</head>
<body>
    
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <!-- input file -->
         <input type="file" name="myfile">
         <input type="submit" name="submit">
    </form>
    
</body>
</html>