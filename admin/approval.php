<?php
// Mock data for demonstration
$messages = [
    ['id' => 1, 'message' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.', 'image' => 'image1.jpg', 'video' => 'video1.mp4'],
    ['id' => 2, 'message' => 'Nulla facilisi. Donec sit amet lacinia justo.', 'image' => 'image2.jpg', 'video' => 'video2.mp4'],
    ['id' => 3, 'message' => 'Praesent id massa et odio eleifend lobortis.', 'image' => 'image3.jpg', 'video' => 'video3.mp4']
];

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['approve'])) {
        // Handle approval logic
        $messageId = $_POST['message_id'];
        echo "Message with ID $messageId has been approved.";
    } elseif (isset($_POST['reject'])) {
        // Handle rejection logic
        $messageId = $_POST['message_id'];
        echo "Message with ID $messageId has been rejected.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Approval</title>
    <style>
        .message {
            border: 1px solid #ccc;
            margin-bottom: 20px;
            padding: 10px;
        }
    </style>
</head>
<body>
    <h2>Approval</h2>
    <?php foreach ($messages as $message) : ?>
        <div class="message">
            <p><strong>Message ID:</strong> <?php echo $message['id']; ?></p>
            <p><strong>Message:</strong> <?php echo $message['message']; ?></p>
            <p><strong>Image:</strong> <img src="<?php echo $message['image']; ?>" alt="Image"></p>
            <p><strong>Video:</strong> <video width="320" height="240" controls><source src="<?php echo $message['video']; ?>" type="video/mp4">Your browser does not support the video tag.</video></p>
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <input type="hidden" name="message_id" value="<?php echo $message['id']; ?>">
                <button type="submit" name="approve">Approve</button>
                <button type="submit" name="reject">Reject</button>
            </form>
        </div>
    <?php endforeach; ?>
</body>
</html>
