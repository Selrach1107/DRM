<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Announcement</title>
</head>
<body>
    <h2>Add Announcement</h2>
    <form action="upload.php" method="post" enctype="multipart/form-data">
        <div>
            <label for="message">Message:</label><br>
            <textarea id="message" name="message" rows="4" cols="50"></textarea>
        </div>
        <div>
            <label for="image">Upload Image:</label><br>
            <input type="file" id="image" name="image">
        </div>
        <div>
            <label for="video">Upload Video:</label><br>
            <input type="file" id="video" name="video">
        </div>
        <div>
            <button type="submit" name="submit">Upload Announcement</button>
        </div>
    </form>
</body>
</html>
