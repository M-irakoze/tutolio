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
     <button><img src="images/Blue-Red-Modern-Youtube-Thumbnail-1.png">
     <h3>Beginner's Guide to Python</h3><br>
    <p>1.2M Views</p>
    <p>300k Likes</p>
    <p>12k Comments</p>

</button>
       <button><img src="images/maxresdefault.jpg">
       <h3>Python Setup & Basics</h3><br>
    <p>5M Views</p>
    <p>200k Likes</p>
    <p>300k Comments</p></button>
         <button><img src="images/Red-Modern-Programming-YouTube-Thumbnail.webp">
         <h3>Variables & Data Types</h3><br>
        <p>2.2M Views</p>
    <p>1.2k Likes</p>
    <p>900 comments</p></button>
           <button><img src="images/8dcebedf391f14ac629a9c51d944e990.jpg">
           <h3>Python Workflow Illustration</h3><br>
        <p>8.1M Views</p>
    <p>2M Likes</p>
    <p>700K Comments</p></button>
    </main></div>
    <div>
    <main>
     <button><img src="images/Python_image.jpg">
     <h3>Python Control Flow</h3><br>
    <p>9M Views</p>
    <p>600k Likes</p>
    <p>8k Comments</p></button>
       <button><img src="images/Red-Modern-Programming-YouTube-Thumbnail-min-1024x576.webp">
       <h3> Python Modules & Libraries</h3><br>
    <p>12M Views</p>
    <p>2M Likes</p>
    <p>200k Comments</p></button>
         <button><img src="images/python-programming-language-programing-workflow-260nw-1846209262.webp">
         <h3>Python Projects</h3><br>
        <p>100M</p>
    <p>40M Likes</p>
    <p>1M Comments</p></button>
           <button><img src="images/client-side-python-thumbnail.png">
           <h3>Python Input & Strings</h3><br>
        <p>1M views</p>
    <p>200K likes</p>
    <p>1k Comments</p></button>
    </main>

    </div>
</body>
</html>
