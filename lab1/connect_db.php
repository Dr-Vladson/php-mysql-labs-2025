<?php  
// Створення з'єднання з сервером  
$link = mysqli_connect("localhost", "root", "");  
if ($link) {  
    echo "З'єднання з сервером встановлено", "<br>";  
} else {  
    echo "Немає з'єднання з сервером";  
} 

// Вибір БД  
$db = "StudentsMarksDB";  
$select = mysqli_select_db($link, $db);  
if ($select) {  
    echo "Базу успішно вибрано", "<br>";  
} else {  
    echo "База не вибрана";  
} 

return $link;  