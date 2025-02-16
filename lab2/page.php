<?php  
$link = require("../lab1/connect_db.php");   
 
$query = "SELECT * FROM marks ORDER BY mark DESC";  

$select_marks = mysqli_query($link, $query);   

echo '<a href="addmark.php">Додати нову оцінку</a><br><br>'; 
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
    echo '<a href="editmark.php?id=' . $mark['id'] . '">Редагувати оцінку</a><br>';
}  
 
mysqli_close($link);  
?>