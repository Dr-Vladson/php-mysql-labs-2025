<?php
$link = require("../lab1/connect_db.php");

$id = $_GET['id'];
if (!is_numeric($id)) {
    echo "Некоректний ідентифікатор.";
    exit;
}

$query = "SELECT * FROM marks WHERE id = $id";
$result = mysqli_query($link, $query);

if (mysqli_num_rows($result) > 0) {
    $mark_data = mysqli_fetch_array($result);
} else {
    echo "Оцінка не знайдена.";
    exit;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $surname = $_POST['surname'];
    $ticket_num = $_POST['ticket_num'];
    $mark = $_POST['mark'];
    $teacher_id = $_POST['teacher_id'];
    $subject = $_POST['subject'];
    $group = $_POST['group'];
 
    $update_query = "UPDATE marks SET surname = '$surname', ticket_num = '$ticket_num', mark = '$mark',  
                     teacher_id = '$teacher_id', subject = '$subject', `group` = '$group' WHERE id = $id";

    if (mysqli_query($link, $update_query)) {
        echo "Оцінка успішно оновлена.";
        header("Location: page.php");
        exit();
    } else {
        echo "Помилка: " . mysqli_error($link);
    }
}
?>

<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <title>Редагувати оцінку</title>
</head>

<body>
    <h2>Редагувати оцінку</h2>
    <form method="post">
        <label for="surname">Прізвище:</label>
        <input type="text" name="surname" value="<?php echo $mark_data['surname']; ?>" required />
        <br>
        <label for="ticket_num">Номер білета:</label>
        <input type="text" name="ticket_num" value="<?php echo $mark_data['ticket_num']; ?>" required />
        <br>
        <label for="mark">Оцінка:</label>
        <input type="number" name="mark" value="<?php echo $mark_data['mark']; ?>" min="60" max="100" required />
        <br>
        <label for="teacher_id">ID Викладача:</label>
        <input type="number" name="teacher_id" value="<?php echo $mark_data['teacher_id']; ?>" required />
        <br>
        <label for="subject">Предмет:</label>
        <input type="text" name="subject" value="<?php echo $mark_data['subject']; ?>" required />
        <br>
        <label for="group">Група:</label>
        <input type="text" name="group" value="<?php echo $mark_data['group']; ?>" required />
        <br>
        <input type="submit" value="Змінити" />
    </form>
    <br>
    <a href="page.php">Назад до оцінок</a>
</body>

</html>