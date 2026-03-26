<?php
require_once 'config/connection.php';

// Define $course_name by default to avoid "undefined variable" error
$course_name = "Unknown Course";

if (isset($_GET['course_id'])) {
    $course_id = intval($_GET['course_id']);

    // Get course name
    $course_sql = "SELECT course_name FROM courses WHERE course_id = $course_id";
    $course_result = $conn->query($course_sql);
    if ($course_result && $course_result->num_rows > 0) {
        $course_name = $course_result->fetch_assoc()['course_name'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Learning Tutorials Platform</title>
    <link rel="stylesheet" href="css/style.css">
    <style>
        html, body {
            height: 100%;
            margin: 0;
        }

        body {
            display: flex;
            flex-direction: column;
            background-color: grey;
            font-family: Arial, sans-serif;
        }

        header {
            background: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
            font-size: 24px;
        }

        nav ul.course-list {
            list-style: none;
            padding: 0;
            margin: 15px 0 0 0;
            display: flex;
            justify-content: center;
            flex-wrap: wrap;
        }

        nav ul.course-list li {
            margin: 0 15px;
        }

        nav ul.course-list li a {
            color: #fff;
            text-decoration: none;
            font-weight: bold;
            transition: color 0.3s;
        }

        nav ul.course-list li a:hover {
            color: #ff9800;
        }

        button {
            width: 409px;
            height: 400px;
            border-radius: 12px;
            background-color: #2222;
            margin: 10px;
            text-align: center;
            cursor: pointer;
        }

        img {
            width: 390px;
            height: 274px;
        }

        p {
            display: inline-block;
            padding: 15px;
        }

        main {
            flex: 1; /* pushes footer down */
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        footer {
            background: #333;
            color: #fff;
            text-align: center;
            padding: 15px;
        }

        /* Slideshow styles */
        .slideshow-container {
            max-width: 1000px;
            position: relative;
            margin: 20px auto;
        }

        .mySlides {
            display: none;
        }

        .slideshow-container img {
            width: 1600px;
            height: 670px;
            border-radius: 8px;
            margin-left: -290px;
            
        }

        .fade {
            animation-name: fade;
            animation-duration: 1.5s;
        }

        @keyframes fade {
            from {opacity: .4} 
            to {opacity: 1}
        }

        .dot {
            height: 15px;
            width: 15px;
            margin: 0 2px;
            background-color: #bbb;
            border-radius: 50%;
            display: inline-block;
            transition: background-color 0.6s ease;
        }

        .active {
            background-color: #717171;
        }
    </style>
</head>
<body>
    <header>
        <h1>Welcome to learning tutorials platform</h1>
        <nav>
            <ul class="course-list">
                <?php
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

    <?php if (!isset($_GET['course_id'])): ?>
    <!-- Slideshow Section (Homepage only) -->
    <div class="slideshow-container">
        <div class="mySlides fade">
            <img src="images/Tutorlin-Template-Next.js-Thumbnail.webp" alt="Slide 1">
        </div>

        <div class="mySlides fade">
            <img src="images/e-learning-system-with-digital-technology-icons-gears-representing-science-global-access-learning-graduation-highlighting-innovation-smart-learning-development-online-education-platforms-free-photo.jpg" alt="Slide 2">
        </div>

        <div class="mySlides fade">
            <img src="images/istockphoto-1282548044-612x612.jpg" alt="Slide 3">
        </div>
    </div>

    <div style="text-align:center">
        <span class="dot"></span> 
        <span class="dot"></span> 
        <span class="dot"></span> 
    </div>
    <?php endif; ?>

    <main>
     <?php
if (isset($_GET['course_id'])) {
    $course_id = intval($_GET['course_id']);
    $lesson_sql = "SELECT * FROM lessons WHERE course_id = $course_id";
    $lesson_result = $conn->query($lesson_sql);

    if ($lesson_result->num_rows > 0) {
        echo "<h2 style='text-align:center;color:white;'>Available Tutorials for {$course_name}</h2>";
        echo "<div style='display:flex;flex-wrap:wrap;justify-content:center;'>";
        while ($row = $lesson_result->fetch_assoc()) {
            echo "<a href='{$row['youtube_url']}' target='_blank'>";
            echo "<button>";
            echo "<img src='images/{$row['image_path']}' alt='{$row['lesson_title']}'>";
            echo "<h3>{$row['lesson_title']}</h3><br>";
            echo "<p>{$row['views']} Views</p>";
            echo "<p>{$row['likes']} Likes</p>";
            echo "<p>{$row['comments']} Comments</p>";
            echo "</button>";
            echo "</a>";
        }
        echo "</div>";
    } else {
        echo "<p style='text-align:center;color:white;'>No tutorials found for this course.</p>";
    }
}
?>
    </main>

    <footer>
        <p>&copy; <?php echo date("Y"); ?> Learning Tutorials Platform. All rights reserved.</p>
    </footer>

    <!-- Slideshow Script -->
    <?php if (!isset($_GET['course_id'])): ?>
    <script>
    let slideIndex = 0;
    showSlides();

    function showSlides() {
        let i;
        let slides = document.getElementsByClassName("mySlides");
        let dots = document.getElementsByClassName("dot");
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
        }
        slideIndex++;
        if (slideIndex > slides.length) {slideIndex = 1}    
        for (i = 0; i < dots.length; i++) {
            dots[i].className = dots[i].className.replace(" active", "");
        }
        slides[slideIndex-1].style.display = "block";  
        dots[slideIndex-1].className += " active";
        setTimeout(showSlides, 3000); // Change image every 3 seconds
    }
    </script>
    <?php endif; ?>
</body>
</html>
