<?php  
// Створення з'єднання з сервером  
$link = mysqli_connect("localhost", "root", "");  
if ($link) {  
    echo "З'єднання з сервером встановлено", "<br>";  
} else {  
    echo "Немає з'єднання з сервером";  
}  

// Створити БД StudentsMarksDB  
// Спочатку формування запиту на створення  
$db = "StudentsMarksDB";  
$query = "CREATE DATABASE IF NOT EXISTS $db"; 

// Під час реалізації запиту на створення. Важлива послідовність аргументів функції: з'єднання з сервером, SQL-запит.  
$create_db = mysqli_query($link, $query);  
if ($create_db) {  
    echo "База даних $db успішно створена";  
} else {  
    echo "База не створена";  
}  
?>