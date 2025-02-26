<?php  
$link = require("../lab1/connect_db.php");   

$results = null;  
if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
    // Пошук за точною назвою групи
    if (isset($_POST['search_group'])) {  
        $group_name = mysqli_real_escape_string($link, $_POST['group_name']);  
        $query = "SELECT * FROM marks WHERE `group` = '$group_name' ORDER BY mark DESC";  
        $results = mysqli_query($link, $query);  
    }  

    // Пошук за шаблоном імені  
    else if (isset($_POST['search_surname'])) {  
        $surname = mysqli_real_escape_string($link, $_POST['surname']);  
        $query = "SELECT * FROM marks WHERE surname LIKE '%$surname%' ORDER BY mark DESC";  
        $results = mysqli_query($link, $query);  
    }  

    // Пошук за діапазоном оцінок  
    else if (isset($_POST['search_range'])) {  
        $min_mark = (int)$_POST['min_mark'];  
        $max_mark = (int)$_POST['max_mark'];  
        $query = "SELECT * FROM marks WHERE mark BETWEEN $min_mark AND $max_mark ORDER BY mark DESC";  
        $results = mysqli_query($link, $query);  
    }  
}  

?>  

<!DOCTYPE html>  
<html lang="uk">  
<head>  
    <meta charset="UTF-8">  
    <title>Пошук оцінок</title>  
</head>  
<body>  
    <h1>Пошук оцінок</h1>  
     
    <form method="POST">  
        <h2>Пошук за точною назвою групи</h2>  
        <input type="text" name="group_name" placeholder="Введіть точну назву групи" required>  
        <button type="submit" name="search_group">Пошук</button>  
    </form>  
 
    <form method="POST">  
        <h2>Пошук за шаблоном імені</h2>  
        <input type="text" name="surname" placeholder="Введіть шаблон прізвища" required>  
        <button type="submit" name="search_surname">Пошук</button>  
    </form>  
 
    <form method="POST">  
        <h2>Пошук за діапазоном оцінок</h2>  
        <input type="number" name="min_mark" min="60" max="100" placeholder="Мінімальна оцінка" required>  
        <input type="number" name="max_mark" min="60" max="100" placeholder="Максимальна оцінка" required>  
        <button type="submit" name="search_range">Пошук</button>  
    </form>  

    <div>  
        <h2>Результати пошуку:</h2>  
        <?php if (isset($results) && mysqli_num_rows($results) > 0): ?>  
            <?php while ($mark = mysqli_fetch_array($results)) { ?>  
                <div>  
                    <p>ID: <?php echo $mark['id']; ?></p>  
                    <p>Прізвище: <?php echo $mark['surname']; ?></p>  
                    <p>Номер білета: <?php echo $mark['ticket_num']; ?></p>  
                    <p>Оцінка: <?php echo $mark['mark']; ?></p>   
                    <p>Предмет: <?php echo $mark['subject']; ?></p>  
                    <p>Група: <?php echo $mark['group']; ?></p> 
                </div>  
            <?php } ?>  
        <?php else: ?>  
            <p>Нічого не знайдено за заданим критерієм.</p>  
        <?php endif; ?>  
    </div>  

    <?php   
    mysqli_close($link);  
    ?>  
</body>  
</html>  