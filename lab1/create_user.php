<?php  
// Створення з'єднання з сервером  
$link = mysqli_connect("localhost", "root", "");  
if ($link) {  
    echo "З'єднання з сервером встановлено", "<br>";  
} else {  
    echo "Немає з'єднання з сервером";  
}   

// Формування SQL-запиту для створення нового користувача 'admin'  
$query = "GRANT ALL PRIVILEGES ON *.* TO 'admin'@'localhost'   
IDENTIFIED BY 'admin_password'   
WITH GRANT OPTION"; 

// Виконання запиту  
if (mysqli_query($link, $query)) {  
    echo "Користувача 'admin' успішно створено з глобальними привілеями.";  
} else {  
    echo "Помилка створення користувача: " . mysqli_error($link);  
}  

// Закриття з'єднання  
mysqli_close($link);  