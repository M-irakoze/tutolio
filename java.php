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
     <button><img src="images/Java_Programming_Cover.jpg">
     <h3>Java Setup & Environment</h3><br>
      <p>12M Views</p>
    <p>10K Likes</p>
    <p>199 Comments</p></button>

</button>
       <button><img src="images/6da78c99-1a19-4637-a357-8098871bc3e1.png">
       <h3>Java Syntax & Basics</h3><br>
        <p>67M Views</p>
    <p>6M Likes</p>
    <p>2k Comments</p></button>
         <button><img src="images/thumbnail.webp">
         <h3>Java Variables & Data Types</h3><br>
             <p>21M Views</p>
    <p>900K Likes</p>
    <p>9k Comments</p></button>
           <button><img src="images/gettyimages-2156032425-640x640.jpg">
           <h3>Java Object-Oriented Programming (OOP)</h3><br>
         <p>1M Views</p>
    <p>1 Likes</p>
    <p>100 Comments</p></button>
    </main></div>
    <div>
    <main>
     <button><img src="images/Fundamentals-of-Java-Programming.png">
     <h3>Java Frameworks & Libraries (Intro)</h3><br>
        <p>9M Views</p>
    <p>900K Likes</p>
    <p>9k Comments</p></button>
       <button><img src="images/sddefault.jpg">
       <h3>Java Exception Handling</h3><br>
         <p>12M Views</p>
    <p>799k Likes</p>
    <p>144 Comments</p></button>
         <button><img src="images/desktop-wallpaper-java-programming-logo-thumbnail.jpg">
         <h3>Java Arrays & Collections</h3><br>
          <p>2M Views</p>
    <p>43k Likes</p>
    <p>1.2k Comments</p></button>
           <button><img src="images/91SNCj6qPLL.jpg">
           <h3>Java Loops</h3><br>
        <p>90M Views</p>
    <p>10K Likes</p>
    <p>2k Comments</p></button>
    </main>

    </div>
</body>
</html>
