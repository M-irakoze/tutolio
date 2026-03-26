<?php
// Utility functions for the tutorials platform

/**
 * Get all courses from database
 * @param mysqli $conn Database connection
 * @return array Array of courses
 */
function getAllCourses($conn) {
    $sql = "SELECT * FROM courses ORDER BY course_name ASC";
    $result = $conn->query($sql);
    $courses = [];
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $courses[] = $row;
        }
    }
    
    return $courses;
}

/**
 * Get lessons for a specific course
 * @param mysqli $conn Database connection
 * @param int $course_id Course ID
 * @return array Array of lessons
 */
function getLessonsByCourse($conn, $course_id) {
    $sql = "SELECT * FROM lessons WHERE course_id = ? ORDER BY lesson_title ASC";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $lessons = [];
    
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $lessons[] = $row;
        }
    }
    
    $stmt->close();
    return $lessons;
}

/**
 * Get course name by ID
 * @param mysqli $conn Database connection
 * @param int $course_id Course ID
 * @return string Course name
 */
function getCourseName($conn, $course_id) {
    $sql = "SELECT course_name FROM courses WHERE course_id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $course_id);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $course_name = $result->fetch_assoc()['course_name'];
    } else {
        $course_name = "Unknown Course";
    }
    
    $stmt->close();
    return $course_name;
}

/**
 * Generate navigation menu HTML
 * @param mysqli $conn Database connection
 * @param string $current_page Current page for highlighting
 * @return string HTML navigation menu
 */
function generateNavigation($conn, $current_page = '') {
    $courses = getAllCourses($conn);
    $nav_html = '<ul class="course-list">';
    
    if (!empty($courses)) {
        foreach($courses as $course) {
            $active_class = ($current_page == 'course.php' && isset($_GET['course_id']) && $_GET['course_id'] == $course['course_id']) ? 'active' : '';
            $nav_html .= "<li><a href='course.php?course_id={$course['course_id']}' class='$active_class'>{$course['course_name']}</a></li>";
        }
    } else {
        // Fallback navigation
        $fallback_links = [
            ['python.php', 'Python'],
            ['java.php', 'Java'],
            ['javascript.php', 'JavaScript'],
            ['php_tutorials.php', 'PHP'],
            ['c_plus_plus.php', 'C++']
        ];
        
        foreach($fallback_links as $link) {
            $active_class = ($current_page == $link[0]) ? 'active' : '';
            $nav_html .= "<li><a href='{$link[0]}' class='$active_class'>{$link[1]}</a></li>";
        }
    }
    
    $nav_html .= '</ul>';
    return $nav_html;
}
?>
