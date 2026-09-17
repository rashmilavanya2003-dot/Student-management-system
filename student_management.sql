```sql
-- ==========================================
-- STUDENT MANAGEMENT SYSTEM DATABASE
-- ==========================================


-- Create the database
CREATE DATABASE IF NOT EXISTS student_management;


-- Select the database
USE student_management;


-- ==========================================
-- STUDENTS TABLE
-- ==========================================

CREATE TABLE IF NOT EXISTS students (

    id INT AUTO_INCREMENT PRIMARY KEY,

    full_name VARCHAR(100) NOT NULL,

    username VARCHAR(50) NOT NULL UNIQUE,

    email VARCHAR(100) NOT NULL,

    password VARCHAR(255) NOT NULL

);


-- ==========================================
-- COURSES TABLE
-- ==========================================

CREATE TABLE IF NOT EXISTS courses (

    id INT AUTO_INCREMENT PRIMARY KEY,

    course_code VARCHAR(20) NOT NULL UNIQUE,

    course_name VARCHAR(100) NOT NULL,

    lecturer_name VARCHAR(100) NOT NULL

);


-- ==========================================
-- ATTENDANCE TABLE
-- ==========================================

CREATE TABLE IF NOT EXISTS attendance (

    id INT AUTO_INCREMENT PRIMARY KEY,

    student_id INT NOT NULL,

    course_id INT NOT NULL,

    attended INT DEFAULT 0,

    total_classes INT DEFAULT 0,

    FOREIGN KEY (student_id)
        REFERENCES students(id)
        ON DELETE CASCADE,

    FOREIGN KEY (course_id)
        REFERENCES courses(id)
        ON DELETE CASCADE

);


-- ==========================================
-- SAMPLE COURSES
-- ==========================================

INSERT INTO courses
(course_code, course_name, lecturer_name)
VALUES
('CS101', 'Programming Fundamentals', 'Mr. Silva'),
('CS102', 'Database Systems', 'Ms. Perera'),
('CS103', 'Data Structures', 'Dr. Fernando'),
('MAT101', 'Discrete Mathematics', 'Dr. Kumar');


-- ==========================================
-- END OF DATABASE
-- ==========================================
```
