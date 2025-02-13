# 📝 NoteKeeper

## 📌 Overview
**NoteKeeper** is a lightweight, secure, and easy-to-use note-taking application built using **PHP, MySQL, HTML, Tailwind CSS, and JavaScript**. It allows users to **create, edit, delete, and organize** their notes with ease.

## 🚀 Features
- ✍️ **Create, Edit, and Delete Notes**
- 🔍 **Search and Filter Notes**
- 📂 **Organize Notes with Categories/Tags**
- 🔒 **Secure User Authentication (Register/Login)**
- ☁️ **Cloud Sync Across Devices**
- 🎨 **Minimalist and Responsive UI**
- 📜 **Dark Mode (Coming Soon!)**

## 🛠️ Built With
- **Backend:** PHP (OOP, PDO)
- **Frontend:** HTML, Tailwind CSS, JavaScript
- **Database:** MySQL
- **Frameworks & Libraries:** 
  - PHP PDO for secure database interactions
  - Tailwind CSS for styling
  - JavaScript for interactivity

## 📂 Project Structure
```
NoteKeeper/
│── assets/                 # Static files (CSS, JS, Images)
│   ├── css/                # Stylesheets
│   ├── js/                 # JavaScript files (toast, validation, etc.)
│   ├── images/             # App images and icons
│── controllers/            # PHP controllers (Auth, Notes)
│── includes/               # Config files (DB connection, session management)
│── models/                 # PHP models (User, Note)
│── views/                  # UI pages (Dashboard, Login, Register, Notes)
│   ├── notes/              # Note-related views (Create, Edit, Delete)
│── index.php               # Main entry point
│── routes.php              # Routing logic
│── README.md               # Documentation
│── database.sql            # MySQL database schema
```

## 🎯 How to Install & Run
### **1️⃣ Clone the Repository**
```sh
git clone https://github.com/yourusername/NoteKeeper.git
cd NoteKeeper
```

### **2️⃣ Setup Database**
- Import the `database.sql` file into your MySQL database.
- Configure the database connection in `includes/connection.php`:
```php
$host = 'localhost';
$dbname = 'notekeeper';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";
$db = new PDO($dsn, $username, $password);
```

### **3️⃣ Start Local Server**
```sh
php -S localhost:8000
```
- Open `http://localhost:8000` in your browser.

## ❓ FAQ

**Q: Can I contribute?**  
A: Absolutely! Fork this repository, make your improvements, and create a pull request.

## 🤝 Contributing
1. Fork the project.
2. Create a branch (`feature-new`).
3. Commit your changes.
4. Push to your forked repository.
5. Create a Pull Request.

## 📜 License
This project is licensed under the **MIT License**.

---

Enjoy NoteKeeper! 🚀😊  
Let me know if you need any modifications or additions! 🎉
