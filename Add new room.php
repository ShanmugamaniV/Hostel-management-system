<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $room_number = $_POST['room_number'];
    $type = $_POST['type'];

    $stmt = $pdo->prepare("INSERT INTO rooms (room_number, type) VALUES (?, ?)");
    $stmt->execute([$room_number, $type]);
    echo "Room added successfully!";
}
?>

<form method="post">
    Room Number: <input type="text" name="room_number" required>
    Type: 
    <select name="type">
        <option value="single">Single</option>
        <option value="double">Double</option>
    </select>
    <button type="submit" name="submit">Add Room</button>
</form>