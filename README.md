<<<<<<< HEAD
# DengueAlertPh

A comprehensive web platform for dengue awareness, prevention, and community support in the Philippines.

## Features

- **User Authentication**: Secure login/registration with email verification
- **Admin Dashboard**: Content management system for updating website content
- **Dynamic Content**: Home, Awareness, Statistics, and Contact pages with database-driven content
- **Responsive Design**: Modern UI with glassmorphism effects
- **Password Recovery**: OTP-based password reset functionality

## Setup Instructions

### 1. Database Setup

1. Create a MySQL database named `database_ini`
2. Import the `database_ine.sql` file into your database, or run the setup script:
   ```bash
   php setup_database.php
   ```

### 2. File Structure

- `index.php` - Home page (dynamic content)
- `awareness.php` - Awareness and prevention information
- `stats.php` - Statistics and trends
- `contact.php` - Contact information
- `Auth/` - Authentication and admin directory
  - `index.php` - Login page
  - `register.php` - User registration
  - `dashboard.php` - Admin content management
  - `db.php` - Database configuration

### 3. Admin Access

1. Register a new user account at `Auth/register.php`
2. Verify your email using the OTP sent to your email
3. Login at `Auth/index.php`
4. Access the admin dashboard at `Auth/dashboard.php`

### 4. Content Management

From the admin dashboard, you can:

- Edit homepage content and welcome messages
- Update awareness and prevention information
- Modify statistics and data displays
- Change contact information and support details

All content supports HTML formatting for rich text display.

## Technologies Used

- PHP 8.2+
- MySQL/MariaDB
- HTML5/CSS3
- PHPMailer for email functionality

## Security Features

- Password hashing with bcrypt
- OTP-based email verification
- Session-based authentication
- SQL injection prevention with prepared statements
- XSS protection with input sanitization
=======
Dengue Alert PH

Dengue Alert PH is a web-based public health awareness platform designed to educate communities about dengue fever prevention, symptoms, and safety measures in the Philippines. The system aims to promote health awareness and help reduce dengue cases through accessible and easy-to-understand information.

Built using PHP, MySQL, JavaScript, HTML, and CSS, the platform delivers dynamic content and database-driven features that support information management and user interaction.

The website provides:

Dengue awareness and educational content
Prevention tips based on DOH (Department of Health) guidelines
Information on mosquito breeding prevention
Public health safety reminders and awareness campaigns

This project demonstrates full-stack web development skills, combining backend database integration with a responsive frontend design to deliver an informative and user-friendly experience.

🔗 Live Website: https://denguealert.page.gd/
>>>>>>> 6785f328e0540433af3cc30a468f7f66c26d8d50
