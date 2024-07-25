<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $name = $_POST['name'];
    $room_id = $_POST['room_id'];

    $stmt = $pdo->prepare("INSERT INTO students (name, room_id) VALUES (?, ?)");
    $stmt->execute([$name, $room_id]);
    echo "Student registered successfully!";
}
?>

<form method="post">
    Student Name: <input type="text" name="name" required>
    Room ID: 
    <select name="room_id">
        <?php
        $rooms = $pdo->query("SELECT * FROM rooms WHERE status = 'available'")->fetchAll();
        foreach ($rooms as $room) {
            echo "<option value=\"{$room['id']}\">{$room['room_number']}</option>";
        }
        ?>
    </select>
    <button type="submit" name="submit">Register Student</button>
</form>