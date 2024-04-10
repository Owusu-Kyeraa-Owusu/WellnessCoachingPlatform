DROP DATABASE IF EXISTS Coaching_Platform;
CREATE DATABASE IF NOT EXISTS Coaching_Platform;
USE Coaching_Platform;

CREATE TABLE roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(100) NOT NULL
);

INSERT INTO roles (name) VALUES ('Student'), ('Counselor');

CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    gender ENUM('male', 'female') NOT NULL,
    role_id INT NOT NULL,
    student_id VARCHAR(50) NOT NULL,
    class VARCHAR(50) NOT NULL,
    academic_year VARCHAR(50) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    email VARCHAR(255) NOT NULL,
    profile_picture_path VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    terms_and_conditions TINYINT(1) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (role_id) REFERENCES roles(id)
);

CREATE TABLE resources (
    id INT AUTO_INCREMENT PRIMARY KEY,
    filename VARCHAR(255) NOT NULL,
    filelocation text,
    resource_desc VARCHAR(255)
);

CREATE TABLE appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    phone_number VARCHAR(20) NOT NULL,
    email VARCHAR(100) NOT NULL,
    appointment_date DATE NOT NULL,
    coach VARCHAR(100) NOT NULL,
    appointment_time TIME NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE coach_appointments (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    email VARCHAR(20) NOT NULL,
    student_name VARCHAR(100) NOT NULL,
    appointment_date DATE NOT NULL,
    appointment_time  Time NOT NULL
    
);
