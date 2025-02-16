<?php  
$link = require("connect_db.php");   

// Створюємо SQL-запит на вибірку даних з таблиці marks  
$query = "SELECT * FROM marks";  

// Виконуємо запит до бази даних  
$select_marks = mysqli_query($link, $query);   

// Виводимо записи з таблиці  
while ($mark = mysqli_fetch_array($select_marks)) {  
    echo "ID: " . $mark['id'] . "<br>";  
    echo "Прізвище: " . $mark['surname'] . "<br>";  
    echo "Номер білета: " . $mark['ticket_num'] . "<br>";  
    echo "Оцінка: " . $mark['mark'] . "<br>";
    echo '<a href="teacher.php?id=' . $mark['teacher_id'] . '">';  
    echo "Викладач" . "<br>";  
    echo '</a>';
    echo "Предмет: " . $mark['subject'] . "<br>";
    echo "Група: " . $mark['group'] . "<br><br>";  
}  

// Закриваємо з'єднання з базою даних  
mysqli_close($link);  
?>