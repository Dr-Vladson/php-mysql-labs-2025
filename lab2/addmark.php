<?php
$link = require("../lab1/connect_db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = $_POST['surname'];
    $ticket_num = $_POST['ticket_num'];
    $mark = $_POST['mark'];
    $teacher_id = $_POST['teacher_id'];
    $subject = $_POST['subject'];
    $group = $_POST['group'];

    $insert_query = "INSERT INTO marks (surname, ticket_num, mark, teacher_id, subject, `group`)   
                     VALUES ('$surname', '$ticket_num', '$mark', '$teacher_id', '$subject', '$group')";

    if (mysqli_query($link, $insert_query)) {
        echo "Оцінка успішно додана.";
    } else {
        echo "Помилка: " . mysqli_error($link);
    }
}
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Додати оцінку</title>
</head>

<body>
    <h2>Додати нову оцінку</h2>
    <form method="post">
        <label for="surname">Прізвище:</label>
        <input type="text" name="surname" required />
        <br>
        <label for="ticket_num">Номер білета:</label>
        <input type="text" name="ticket_num" required />
        <br>
        <label for="mark">Оцінка:</label>
        <input type="number" name="mark" min="60" max="100" required />
        <br>
        <label for="teacher_id">ID Викладача:</label>
        <input type="number" name="teacher_id" required />
        <br>
        <label for="subject">Предмет:</label>
        <input type="text" name="subject" required />
        <br>
        <label for="group">Група:</label>
        <input type="text" name="group" required />
        <br>
        <input type="submit" value="Додати" />
    </form>
    <br>
    <a href="page.php">Назад до оцінок</a>
</body>

</html>