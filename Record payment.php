<?php
include 'db.php';

if (isset($_POST['submit'])) {
    $student_id = $_POST['student_id'];
    $amount = $_POST['amount'];
    $date = $_POST['date'];

    $stmt = $pdo->prepare("INSERT INTO payments (student_id, amount, date) VALUES (?, ?, ?)");
    $stmt->execute([$student_id, $amount, $date]);
    echo "Payment recorded successfully!";
}
?>

<form method="post">
    Student ID: 
    <select name="student_id">
        <?php
        $students = $pdo->query("SELECT * FROM students")->fetchAll();
        foreach ($students as $student) {
            echo "<option value=\"{$student['id']}\">{$student['name']}</option>";
        }
        ?>
    </select>
    Amount: <input type="number" step="0.01" name="amount" required>
    Date: <input type="date" name="date" required>
    <button type="submit" name="submit">Record Payment</button>
</form>