<?php
// Include database connection
require_once 'config/connection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Programming Tutorials Platform</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        header {
            background: #333;
            color: #fff;
            padding: 15px;
        }
        header h1 {
            margin: 0;
        }
        nav ul {
            list-style: none;
            padding: 0;
        }
        nav ul li {
            display: inline-block;
            margin-right: 15px;
        }
        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
        main {
            display: flex;
            flex-wrap: wrap;
            margin: 20px;
        }
        button {
            display: inline-block;
            margin: 10px;
            text-align: center;
            border: none;
            background: #2222;
            padding: 10px;
            cursor: pointer;
            width: 420px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
        }
        button img {
            display: block;
            width: 400px;
            height: 310px;
            
        }
        button h3 {
            margin: 8px 0 4px;
            font-size: 16px;
            color: #222;
            display: inline-block;
        }
        button p {
            margin: 2px 0;
            font-size: 14px;
            color: black;
            display: inline-block;
        }
       
    </style>
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
                    echo "<li>No courses found</li>";
                }
                ?>
            </ul>
        </nav>
    </header><br>

    <div>
        <main>
            <?php
            // Fetch lessons for Python (course_id = 1)
            $sql = "SELECT * FROM lessons WHERE course_id=1";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<button>";
                    echo "<img src='images/{$row['image_path']}' alt='{$row['lesson_title']}'>";
                    echo "<h3>{$row['lesson_title']}</h3><br>";
                    echo "<p>{$row['views']} Views</p>";
                    echo "<p>{$row['likes']} Likes</p>";
                    echo "<p>{$row['comments']} Comments</p>";
                    echo "</button>";
                }
            } else {
                echo "No lessons found.";
            }
            ?>
        </main>
    </div>
</body>
</html>
