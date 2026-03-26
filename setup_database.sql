-- Database setup script for Programming Tutorials Platform
-- Compatible with TiDB and MySQL

-- Create database if it doesn't exist
CREATE DATABASE IF NOT EXISTS tutorials_platform 
CHARACTER SET utf8mb4 
COLLATE utf8mb4_unicode_ci;

USE tutorials_platform;

-- Create courses table
CREATE TABLE IF NOT EXISTS courses (
    course_id INT AUTO_INCREMENT PRIMARY KEY,
    course_name VARCHAR(255) NOT NULL UNIQUE,
    description TEXT,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    INDEX idx_course_name (course_name)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Create lessons table
CREATE TABLE IF NOT EXISTS lessons (
    lesson_id INT AUTO_INCREMENT PRIMARY KEY,
    course_id INT NOT NULL,
    lesson_title VARCHAR(255) NOT NULL,
    description TEXT,
    youtube_url VARCHAR(500),
    image_path VARCHAR(255),
    views INT DEFAULT 0,
    likes INT DEFAULT 0,
    comments INT DEFAULT 0,
    duration_minutes INT,
    difficulty_level ENUM('beginner', 'intermediate', 'advanced') DEFAULT 'beginner',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    FOREIGN KEY (course_id) REFERENCES courses(course_id) ON DELETE CASCADE,
    INDEX idx_course_lessons (course_id),
    INDEX idx_lesson_title (lesson_title),
    INDEX idx_difficulty (difficulty_level)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- Insert sample data (optional - remove for production)
INSERT IGNORE INTO courses (course_id, course_name, description) VALUES
(1, 'Python', 'Learn Python programming from basics to advanced concepts'),
(2, 'Java', 'Master Java programming and object-oriented principles'),
(3, 'JavaScript', 'Explore JavaScript for web development'),
(4, 'PHP', 'Build dynamic web applications with PHP'),
(5, 'C++', 'Learn C++ programming and system development');

-- Insert sample lessons (optional - remove for production)
INSERT IGNORE INTO lessons (lesson_id, course_id, lesson_title, youtube_url, image_path, views, likes, comments, duration_minutes, difficulty_level) VALUES
-- Python lessons
(1, 1, 'Beginner''s Guide to Python', 'https://youtube.com/watch?v=example1', 'Blue-Red-Modern-Youtube-Thumbnail-1.png', 1200000, 300000, 12000, 45, 'beginner'),
(2, 1, 'Python Setup & Basics', 'https://youtube.com/watch?v=example2', 'maxresdefault.jpg', 5000000, 200000, 300000, 30, 'beginner'),
(3, 1, 'Variables & Data Types', 'https://youtube.com/watch?v=example3', 'Red-Modern-Programming-YouTube-Thumbnail.webp', 2200000, 1200, 900, 25, 'beginner'),

-- Java lessons
(4, 2, 'Java Setup & Environment', 'https://youtube.com/watch?v=example4', 'Java_Programming_Cover.jpg', 12000000, 10000, 199, 40, 'beginner'),
(5, 2, 'Java Syntax & Basics', 'https://youtube.com/watch?v=example5', '6da78c99-1a19-4637-a357-8098871bc3e1.png', 67000000, 6000000, 2000, 35, 'beginner'),

-- JavaScript lessons
(6, 3, 'JavaScript Setup & Basics', 'https://youtube.com/watch?v=example6', 'master-javascript-programming-beginner-friend-design-template-057f79a6b5ce0bbbaf0a2a579865a4fc_screen.jpg', 60000000, 2000000, 50000, 50, 'beginner'),
(7, 3, 'JavaScript Variables & Data Types', 'https://youtube.com/watch?v=example7', '4e29570a-bb6f-4e23-9065-c8d594ab99a9.jpeg', 101000000, 31000000, 400000, 40, 'beginner'),

-- PHP lessons
(8, 4, 'PHP Setup & Basics', 'https://youtube.com/watch?v=example8', 'php-programming-language.jpg', 20000000, 12000, 2000, 35, 'beginner'),
(9, 4, 'PHP Variables & Data Types', 'https://youtube.com/watch?v=example9', 'PHP.jpg', 34000000, 200000, 12000, 30, 'beginner'),

-- C++ lessons
(10, 5, 'C++ Setup & Basics', 'https://youtube.com/watch?v=example10', 'c-code-on-dark-background-600nw-1896170293.webp', 22000000, 450000, 40000, 45, 'beginner'),
(11, 5, 'C++ Variables & Data Types', 'https://youtube.com/watch?v=example11', 'd558121d-19e3-44b5-a26a-8aa8ceffc081.png', 15000000, 160000, 14000, 35, 'beginner');

-- Create indexes for better performance (TiDB specific optimizations)
CREATE INDEX IF NOT EXISTS idx_courses_created ON courses(created_at);
CREATE INDEX IF NOT EXISTS idx_lessons_created ON lessons(created_at);
CREATE INDEX IF NOT EXISTS idx_lessons_popularity ON lessons(views DESC, likes DESC);

-- Show table structure
SHOW TABLES;
DESCRIBE courses;
DESCRIBE lessons;
