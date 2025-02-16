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

$query = "CREATE TABLE Teacher (  
    id INT NOT NULL AUTO_INCREMENT,  
    name VARCHAR(100) NOT NULL,  
    position VARCHAR(50) NOT NULL,  
    PRIMARY KEY (id)  
)"; 

// Виконання запиту  
if (mysqli_query($link, $query)) {  
    echo "Створено таблицю Teacher";  
} else {  
    echo "Помилка створення таблиці: " . mysqli_error($link);  
}  

// Закриття з'єднання  
mysqli_close($link);  
?>