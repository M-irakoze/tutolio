# Programming Tutorials Platform

A clean, well-structured PHP application for displaying programming tutorials with proper separation of concerns.


```php

$servername = "localhost";
$username = "root";   // change if needed
$password = "";       // change if needed
$dbname = "tutorials_platform";


<?php
$servername = "localhost";
$username = "root";   // change if needed
$password = "";       // change if needed
$dbname = "tutorials_platform";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>

```


## Project Structure

```
tutolio/
├── config/
│   └── connection.php          # Database configuration
├── css/
│   └── style.css              # Main stylesheet
├── images/                    # All image assets (44 files)
├── php/
│   └── functions.php          # Utility functions and reusable logic
├── includes/                  # For future includes (currently empty)
├── templates/                 # For future templates (currently empty)
├── index.php                  # Main homepage
├── course.php                 # Dynamic course listing page
├── python.php                 # Python tutorials page
├── java.php                   # Java tutorials page
├── javascript.php             # JavaScript tutorials page
├── php_tutorials.php          # PHP tutorials page
├── c_plus_plus.php            # C++ tutorials page
└── README.md                 # This documentation
```

## Architecture Philosophy

**Root-Level Application Files:**
- Main application pages (index.php, course.php, etc.) are in the root directory
- These are the primary user-facing pages that handle HTTP requests directly
- Each contains the HTML structure and page-specific logic

**php/ Directory for Logic:**
- Contains reusable functions (functions.php) and utility code
- Separates business logic from presentation
- Ready for additional helper classes and API endpoints

**Other Directories:**
- `config/` - Configuration files (database connection)
- `css/` - Stylesheets and design assets  
- `images/` - All image files and media assets
- `includes/` - For future reusable components
- `templates/` - For future template files

## Features

- **Clean Architecture**: Proper separation between application pages and business logic
- **Maintainable Code**: Well-organized with utility functions in php/ folder
- **Responsive Design**: Modern CSS styling
- **Database Integration**: MySQL database connectivity with prepared statements
- **Multiple Courses**: Support for Python, Java, JavaScript, PHP, and C++
- **Reusable Functions**: Common database operations abstracted into functions

## Access Points

- **Main Application**: `http://localhost/tutolio/` (index.php)
- **Course Pages**: `http://localhost/tutolio/course.php?course_id=X`
- **Specific Tutorials**: 
  - `http://localhost/tutolio/python.php`
  - `http://localhost/tutolio/java.php`
  - `http://localhost/tutolio/javascript.php`
  - `http://localhost/tutolio/php_tutorials.php`
  - `http://localhost/tutolio/c_plus_plus.php`

## Database Setup

1. Create a database named `tutorials_platform`
2. Create `courses` and `lessons` tables
3. Update database credentials in `config/connection.php` if needed

## Available Functions (php/functions.php)

- `getAllCourses($conn)` - Retrieve all courses
- `getLessonsByCourse($conn, $course_id)` - Get lessons for specific course
- `getCourseName($conn, $course_id)` - Get course name by ID
- `generateNavigation($conn, $current_page)` - Generate navigation HTML

## Migration Notes

This project has been properly restructured with:
- **Main pages at root level** for direct web access
- **Business logic in php/ folder** for proper separation of concerns
- **All relative paths updated** to work with the new structure
- **Utility functions created** for code reusability
- **Clean naming conventions** (php_tutorials.php, c_plus_plus.php)

The application maintains full functionality while providing a much cleaner, more maintainable structure suitable for future development.
