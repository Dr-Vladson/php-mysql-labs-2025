<?php
$teacher_id = $_GET['id'];

if (!is_numeric($teacher_id)) {
    echo "Некоректний ідентифікатор викладача.";
    echo '<br><a href="page.php">Назад</a>';
    exit;
}

$link = require("connect_db.php");

$query = "SELECT * FROM teacher WHERE id = $teacher_id";
$result = mysqli_query($link, $query);


if (mysqli_num_rows($result) > 0) {
    $teacher = mysqli_fetch_array($result);
    echo "ID: " . $teacher['id'] . "<br>";
    echo "ПІБ: " . $teacher['name'] . "<br>";
    echo "Позиція: " . $teacher['position'] . "<br>";
} else {
    echo "Викладача з таким ідентифікатором не знайдено.";
}

echo '<br><a href="page.php">Назад</a>';

mysqli_close($link);
?>