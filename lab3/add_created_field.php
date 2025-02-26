<?php  
$link = require("../lab1/connect_db.php");  

// Додавання поля 'created' до таблиці 'marks'  
$query_add_created_marks = "ALTER TABLE marks ADD created DATETIME DEFAULT '2025-01-01 00:00:00'";  
if (mysqli_query($link, $query_add_created_marks)) {  
    echo "Поле 'created' успішно додано до таблиці 'marks'.<br>";  
} else {  
    echo "Помилка при додаванні поля 'created' до таблиці 'marks': " . mysqli_error($link) . "<br>";  
}  

// Додавання поля 'created' до таблиці 'teacher'  
$query_add_created_teacher = "ALTER TABLE teacher ADD created DATETIME DEFAULT '2025-01-01 00:00:00'";  
if (mysqli_query($link, $query_add_created_teacher)) {  
    echo "Поле 'created' успішно додано до таблиці 'teacher'.<br>";  
} else {  
    echo "Помилка при додаванні поля 'created' до таблиці 'teacher': " . mysqli_error($link) . "<br>";  
}  

// Закриття з'єднання з базою даних  
mysqli_close($link);  
?>  