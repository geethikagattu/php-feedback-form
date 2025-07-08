# 📬 PHP Form Handler

This project provides a secure and lightweight **PHP-based backend** for handling HTML form submissions. It can be used to collect data from contact forms, feedback forms, inquiry forms, or any general-purpose web form.

---

## 🌐 Live Demo

🔗 [Try the Form Here](https://geethikagattu.github.io/php-feedback-form/)

> Fill out the form and test how the PHP backend handles submissions!

---


## ✨ Features

- ✅ Handles form submissions via POST
- ✅ Validates and sanitizes user input
- ✅ Sends data to email or stores in a file/database (configurable)
- ✅ Easy to integrate with any frontend form
- ✅ Minimal, secure, and extendable PHP code

---

## 🛠️ Tech Stack

- **HTML** – Frontend form
- **PHP** – Backend processing
- *(Optional)* SMTP or Database for advanced handling

---

## 📂 Project Structure

php-form-handler/
├── index.html # Sample HTML form
├── form-handler.php # PHP backend script
├── thank-you.html # Optional success page
└── README.md # Project documentation

---

## 🧪 How It Works

1. **Frontend Form** sends data via `POST` to `form-handler.php`
2. `form-handler.php`:
   - Validates required fields
   - Sanitizes input (to prevent XSS/injection)
   - Sends email or logs data
3. Redirects to a **thank you** or error page

---

## 📥 Sample HTML Form

<form action="form-handler.php" method="POST">
  <input type="text" name="name" required placeholder="Your Name">
  <input type="email" name="email" required placeholder="Your Email">
  <textarea name="message" required placeholder="Your Message"></textarea>
  <button type="submit">Send</button>
</form>

## 🧾 Sample PHP Handler (form-handler.php)

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $name = htmlspecialchars(trim($_POST["name"]));
  $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
  $message = htmlspecialchars(trim($_POST["message"]));

  $to = "your@email.com";
  $subject = "New Form Submission";
  $body = "Name: $name\nEmail: $email\nMessage:\n$message";

  if (mail($to, $subject, $body)) {
    header("Location: thank-you.html");
  } else {
    echo "Error sending email.";
  }
}
?>

##🛡️ Security Best Practices
Use htmlspecialchars() to avoid XSS

Validate email with filter_var()

Sanitize all inputs

Use CAPTCHA or rate limiting for production use

##🚀 Future Enhancements
Integrate with reCAPTCHA

Add database logging

AJAX submission support

Email templates

##👩‍💻 Author
Geethika Reddy Gattu
B.Tech CSE | SRM University AP
Passionate about building clean and secure web apps

📄 License
This project is open-source and available under the MIT License.
