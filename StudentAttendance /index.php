<?php
require 'crud.php';
$student = new Student();

if (isset($_POST['add'])) {
    $student->addStudent([
        'name' => $_POST['name'],
        'attendance' => $_POST['attendance']
    ]);
}

if (isset($_POST['update'])) {
    $student->updateStudent($_POST['id'], [
        'name' => $_POST['name'],
        'attendance' => $_POST['attendance']
    ]);
}

if (isset($_GET['delete'])) {
    $student->deleteStudent($_GET['delete']);
    header("Location: index.php"); 
    exit;
}

$students = $student->getStudents();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Student Attendance</title>
</head>
<body>
    <h2>Add Student</h2>
    <form method="POST">
        Name: <input type="text" name="name" required>
        Attendance: 
        <select name="attendance" required>
            <option value="Present">Present</option>
            <option value="Absent">Absent</option>
        </select>
        <button type="submit" name="add">Add</button>
    </form>

    <h2>Students List</h2>
    <table border="1" cellpadding="5">
        <tr><th>ID</th><th>Name</th><th>Attendance</th><th>Action</th></tr>
        <?php foreach ($students as $s): ?>
            <tr>
                <td><?= $s['id'] ?></td>
                <td><?= $s['name'] ?></td>
                <td><?= $s['attendance'] ?></td>
                <td>
                    <form method="POST" style="display:inline;">
                        <input type="hidden" name="id" value="<?= $s['id'] ?>">
                        <input type="text" name="name" value="<?= $s['name'] ?>">
                        <select name="attendance">
                            <option value="Present" <?= $s['attendance']=="Present" ? "selected" : "" ?>>Present</option>
                            <option value="Absent" <?= $s['attendance']=="Absent" ? "selected" : "" ?>>Absent</option>
                        </select>
                        <button type="submit" name="update">Update</button>
                    </form>
                    <a href="index.php?delete=<?= $s['id'] ?>" onclick="return confirm('Delete student?')">Delete</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
