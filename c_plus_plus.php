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
     <button><img src="images/c-code-on-dark-background-600nw-1896170293.webp">
     <h3>C++ Setup & Basics</h3><br>
    <p>22M Views</p>
    <p>450K Likes</p>
    <p>40K</p></button>

</button>
       <button><img src="images/d558121d-19e3-44b5-a26a-8aa8ceffc081.png">
       <h3>C++ Variables & Data Types</h3><br>
     <p>15M Views</p>
    <p>160K Likes</p>
    <p>14K</p></button>
         <button><img src="images/612.jpg">
         <h3>C++ Operators</h3><br>
       <p>5M Views</p>
    <p>60K Likes</p>
    <p>4K</p></button>
           <button><img src="images/484f9e3a-c88e-455e-86ba-09716fa26905.png">
           <h3>C++ Control Flow</h3><br>
 <p>89M Views</p>
    <p>220K Likes</p>
    <p>40K</p></button>
    </main></div>
    <div>
    <main>
     <button><img src="images/C++_basic_programme.png">
     <h3>C++ Standard Template Library (STL)</h3><br>
     <p>32M Views</p>
    <p>450K Likes</p>
    <p>12K</p></button>
       <button><img src="images/hq720.jpg">
       <h3>C++ Pointers & Memory Management</h3><br>
    <p>90M Views</p>
    <p>80K Likes</p>
    <p>2K</p></button>
         <button><img src="images/png-transparent-the-c-programming-language-webassembly-computer-programming-quot-class-computer-program-smiley-thumbnail.png">
         <h3>C++ Object-Oriented Programming (OOP)</h3><br>
     <p>15M Views</p>
    <p>360K Likes</p>
    <p>94K</p></button>
           <button><img src="images/d5c376fa4207.jpg">
           <h3>C++ Arrays & Strings</h3><br>
        <p>5M Views</p>
    <p>60K Likes</p>
    <p>4K</p></button>
    </main>

    </div>
</body>
</html>
