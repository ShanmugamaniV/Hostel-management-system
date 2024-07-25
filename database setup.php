CREATE DATABASE hostel_management;

USE hostel_management;

CREATE TABLE rooms (
    id INT AUTO_INCREMENT PRIMARY KEY,
    room_number VARCHAR(10) NOT NULL,
    type ENUM('single', 'double') NOT NULL,
    status ENUM('available', 'occupied') DEFAULT 'available'
);

CREATE TABLE students (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL,
    room_id INT,
    FOREIGN KEY (room_id) REFERENCES rooms(id)
);

CREATE TABLE payments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    student_id INT,
    amount DECIMAL(10,2),
    date DATE,
    FOREIGN KEY (student_id) REFERENCES students(id)
);