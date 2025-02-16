<?php
$link = require("../lab1/connect_db.php");

$teacher_id = $_GET['id'];

if (!is_numeric($teacher_id)) {
    echo "Некоректний ідентифікатор викладача.";
    exit;
}

$delete_marks_query = "DELETE FROM marks WHERE teacher_id = $teacher_id";
mysqli_query($link, $delete_marks_query);

$delete_teacher_query = "DELETE FROM teacher WHERE id = $teacher_id";
mysqli_query($link, $delete_teacher_query);

mysqli_close($link);
header("Location: page.php");
exit();
?>