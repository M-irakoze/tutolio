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
     <button><img src="images/master-javascript-programming-beginner-friend-design-template-057f79a6b5ce0bbbaf0a2a579865a4fc_screen.jpg">
     <h3>JavaScript Setup & Basics</h3><br>
  
        <p>60M views</p>
    <p>2M Likes</p>
    <p>50k Likes</p></button>
       <button><img src="images/4e29570a-bb6f-4e23-9065-c8d594ab99a9.jpeg">
       <h3>JavaScript Variables & Data Types</h3><br>

        <p>101M views</p>
    <p>31M Likes</p>
    <p>400k Likes</p></button>
         <button><img src="images/Javascript.png">
         <h3>JavaScript Operators</h3><br>
       
        <p>3M views</p>
    <p>3k Likes</p>
    <p>900 Likes</p></button>
           <button><img src="images/JavaScript-Comma-operator-Thumbnail-NoWM-525x310.webp">
           <h3>JavaScript Control Flow</h3><br>
    
        <p>567M views</p>
    <p>10M Likes</p>
    <p>5M Likes</p></button>
    </main></div>
    <div>
    <main>
     <button><img src="images/Javascript guide.webp">
     <h3>JavaScript Loops</h3><br>
  
        <p>7M views</p>
    <p>1M Likes</p>
    <p>90k Likes</p></button>
       <button><img src="images/programmers-using-javascript-programming-language-computer-tiny-people-javascript-language-javascript-engine-js-web-development-concept-bright-vibrant-violet-isolated-illustration_335657-986.avif">
       <h3>JavaScript Functions</h3><br>
        <p>21M views</p>
    <p>4M Likes</p>
    <p>300k Likes</p></button>
         <button><img src="images/BLOG-Images_7-7-2020-03.png">
         <h3>JavaScript Arrays & Objects</h3><br>
          <p>9M views</p>
    <p>2M Likes</p>
    <p>10k Likes</p></button>
           <button><img src="images/Javascript-Programming.jpg">
           <h3>JavaScript ES6+ Features</h3><br>
        <p>11M views</p>
    <p>1M Likes</p>
    <p>100k Likes</p></button>
    </main>

    </div>
</body>
</html>
