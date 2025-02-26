<?php  
$link = require("../lab1/connect_db.php");   

// Підрахунок всіх записів у таблиці оцінок (marks)  
$query_total_marks = "SELECT COUNT(id) AS total_marks FROM marks";  
$result_total_marks = mysqli_query($link, $query_total_marks);  
$row_total_marks = mysqli_fetch_assoc($result_total_marks);  
$total_marks = $row_total_marks['total_marks'];  
mysqli_free_result($result_total_marks);  

// Підрахунок всіх записів у таблиці викладачів (teacher)  
$query_total_teachers = "SELECT COUNT(id) AS total_teachers FROM teacher";  
$result_total_teachers = mysqli_query($link, $query_total_teachers);  
$row_total_teachers = mysqli_fetch_assoc($result_total_teachers);  
$total_teachers = $row_total_teachers['total_teachers'];  
mysqli_free_result($result_total_teachers);  

// Підрахунок записів за поточний місяць у таблиці оцінок  
$date_array = getdate();
$begin_date = date("Y-m-d", mktime(0, 0, 0, $date_array['mon'], 1, $date_array['year']));  
$end_date = date("Y-m-d", mktime(0, 0, 0, $date_array['mon'] + 1, 0, $date_array['year']));  

$query_marks_current_month = "SELECT COUNT(id) AS marks_current_month FROM marks WHERE created >= '$begin_date' AND created <= '$end_date'";  
$result_marks_current_month = mysqli_query($link, $query_marks_current_month);  
$row_marks_current_month = mysqli_fetch_assoc($result_marks_current_month);  
$marks_current_month = $row_marks_current_month['marks_current_month'];  
mysqli_free_result($result_marks_current_month);  

// Підрахунок записів за поточний місяць у таблиці викладачів  
$query_teachers_current_month = "SELECT COUNT(id) AS teachers_current_month FROM teacher WHERE created >= '$begin_date' AND created <= '$end_date'";  
$result_teachers_current_month = mysqli_query($link, $query_teachers_current_month);  
$row_teachers_current_month = mysqli_fetch_assoc($result_teachers_current_month);  
$teachers_current_month = $row_teachers_current_month['teachers_current_month'];  
mysqli_free_result($result_teachers_current_month);  

// Остання записана оцінка  
$query_last_mark = "SELECT * FROM marks ORDER BY created DESC LIMIT 1";  
$result_last_mark = mysqli_query($link, $query_last_mark);  
$last_mark = mysqli_fetch_assoc($result_last_mark);  
mysqli_free_result($result_last_mark);  

// Найактивніший викладач
$query_most_linked_teacher = "  
SELECT teacher.id, teacher.name, COUNT(marks.id) AS mark_count   
FROM teacher   
LEFT JOIN marks ON marks.teacher_id = teacher.id   
GROUP BY teacher.id   
ORDER BY mark_count DESC   
LIMIT 1";  
$result_most_linked_teacher = mysqli_query($link, $query_most_linked_teacher);  
$most_linked_teacher = mysqli_fetch_assoc($result_most_linked_teacher);  
mysqli_free_result($result_most_linked_teacher); 
  
echo "<h2>Статистика веб-сайту</h2>";  
echo "Зроблено записів у таблиці оцінок: $total_marks<br>";  
echo "Зроблено записів у таблиці викладачів: $total_teachers<br>";  
echo "Записів за поточний місяць у таблиці оцінок: $marks_current_month<br>";  
echo "Записів за поточний місяць у таблиці викладачів: $teachers_current_month<br>";  
echo "Остання записана оцінка: ID: " . $last_mark['id'] . ", Прізвище: " . $last_mark['surname'] . ", Оцінка: " . $last_mark['mark'] . "<br>";   
echo "Викладач з найбільшою кількістю пов'язаних оцінок: " . $most_linked_teacher['name'] . " (ID: " . $most_linked_teacher['id'] . "), кількість оцінок: " . $most_linked_teacher['mark_count'] . "<br>";  

mysqli_close($link);  
?>  