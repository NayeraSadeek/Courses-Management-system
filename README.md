# Course Management System

## </> Overview

The Course Management System is a web application developed using Laravel, designed to facilitate the management of courses, user registration, and enrollment. This system provides a seamless experience for both students and instructors (doctors) to interact with course offerings.

## ✨ Features

- **User  Authentication**: 
  - Secure registration and login functionality for users.

- **Course Management**:
  - View a list of available courses.
  - Enroll in courses as a student.
  - Each course displays the instructor (doctor) teaching it.

- **Doctor Management**:
  - Access a section to view doctors and the courses they teach.

- **CRUD Operations**:
  - Perform Create, Read, Update, and Delete operations for courses and user profiles.

- **Responsive Design**:
  - Built-in CSS framework for a responsive and user-friendly interface.

## 💻Technologies Used

- **Backend**: Laravel
- **Database**: MySQL
- **Frontend**: Built-in CSS framework (e.g., Bootstrap, Tailwind CSS)
- **Version Control**: Git

## 📂 Requirements

- PHP >= 8.1
- Composer
- MySQL (or any supported database)
- laravel Framework
  
## ⚙️ Installation
1-Clone Repository
git clone 
 https://github.com/NayeraSadeek/Courses-Managment-system
 
 2-Install dependencies
composer install
npm install
npm run dev

3-Copy .env and generate app key
cp .env.example .env
php artisan key:generate

4-Configure .env
Edit your .env file and set your database credentials:
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3307
DB_DATABASE=learn
DB_USERNAME=root
DB_PASSWORD=

5-Run migrations
php artisan migrate

6-Serve the application
php artisan serve
Visit:http://127.0.0.1:8000/users
##⚙️⚙️🤖💻🛠️
