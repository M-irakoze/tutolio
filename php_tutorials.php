<?php
require_once 'config/connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Programming Tutorials Platform</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <!-- Header with course list -->
    <header>
        <h1>Programming Tutorials Recommendation Platform</h1>
        <nav>
            <ul class="course-list">
                <?php
                // Fetch all courses from database
                $sql = "SELECT * FROM courses ORDER BY course_name ASC";
                $result = $conn->query($sql);

                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<li><a href='course.php?course_id={$row['course_id']}'>{$row['course_name']}</a></li>";
                    }
                } else {
                    // Fallback if database is empty
                       echo "<li><a href='python.php'>Python</a></li>";
                    echo "<li><a href='java.php'>Java</a></li>";
                    echo "<li><a href='javascript.php'>JavaScript</a></li>";
                    echo "<li><a href='php_tutorials.php'>PHP</a></li>";
                    echo "<li><a href='c_plus_plus.php'>C++</a></li>";
                }
                ?>
            </ul>
        </nav>
    </header><br>
<div>
    <main>
     <button><img src="images/php-programming-language.jpg">
     <h3>PHP Setup & Basics</h3><br>
     <p>20M Views</p>
    <p>12K Likes</p>
    <p>2K Comments</p></button>

</button>
       <button><img src="images/PHP.jpg">
       <h3>PHP Variables & Data Types</h3><br>
     <p>34M Views</p>
    <p>200K Likes</p>
    <p>12K Comments</p></button>
         <button><img src="images/13-500x300.webp">
         <h3>PHP Operators</h3><br>
      <p>12M Views</p>
    <p>520K Likes</p>
    <p>12K Comments</p></button>
           <button><img src="images/maxresdefault (1).jpg">
           <h3>PHP Database Connectivity (MySQL)</h3><br>
        <p>90M Views</p>
    <p>420K Likes</p>
    <p>82K Comments</p></button>
    </main></div>
    <div>
    <main>
     <button><img src="images/istockphoto-2166409525-640x640.jpg">
     <h3>PHP Sessions & Cookies</h3><br>
     <p>9M Views</p>
    <p>12K Likes</p>
    <p>670 Comments</p></button>
       <button><img src="images/61l7JXYwDQL.jpg">
       <h3>PHP Forms & User Input</h3><br>
    <p>56M Views</p>
    <p>700K Likes</p>
    <p>52K Comments</p></button>
         <button><img src="images/71J9xo-NrLL.jpg">
         <h3>PHP Arrays & Strings</h3><br>
        <p>2M Views</p>
    <p>20K Likes</p>
    <p>2K Comments</p></button>
           <button><img src="images/1_tYHle58D5AA3jqnQmjTkAg.webp">
           <h3>PHP Functions</h3><br>
        <p>80M Views</p>
    <p>20M Likes</p>
    <p>1M comments</p></button>
    </main>

    </div>
</body>
</html>
