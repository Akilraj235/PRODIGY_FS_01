# PHP User Authentication System with Role-Based Access

This repository contains a simple PHP-based user authentication system featuring:

- **User Registration**  
  Securely register new users with username and password hashing using `password_hash()`.

- **User Login**  
  Authenticate users by verifying their credentials with `password_verify()`, using secure prepared statements to prevent SQL injection.

- **Session Management**  
  Store user data in PHP sessions upon successful login for persistent access.

- **Role-Based Access Control**  
  Differentiate users by roles (e.g., `admin` or `user`) and display content accordingly on protected pages.

- **Logout Functionality**  
  Safely terminate user sessions to log out.

- **Clean, Responsive, and Modern UI**  
  User-friendly forms and pages styled with CSS for a professional look.

---

## File Overview

- `config.php` — Database connection and session initialization.
- `register.php` — Handles user registration with input validation, duplicate username check, password hashing, and feedback messages.
- `login.php` — Handles user login with credential verification, session creation, and error display.
- `protected.php` — A page accessible only to logged-in users; shows user info and role-based content.
- `logout.php` — Destroys the session and redirects users to the login page.

---

## How to Use

1. Set up a MySQL database with a `users` table having at least these fields:  
   - `id` (INT, primary key, auto_increment)  
   - `username` (VARCHAR, unique)  
   - `password_hash` (VARCHAR)  
   - `role` (VARCHAR, default to 'user' or 'admin')

2. Update `config.php` with your database credentials.

3. Open `register.php` to create new users.

4. Use `login.php` to authenticate and access `protected.php`.

5. Click "Logout" to end the session.

---

## Security Features

- Uses prepared statements to prevent SQL injection.
- Passwords are hashed using PHP’s `password_hash()` and verified securely.
- Session checks on protected pages to prevent unauthorized access.

---

Feel free to customize and extend this system to fit your needs!

---

## License

This project is open source and available under the MIT License.
