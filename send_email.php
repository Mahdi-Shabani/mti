<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // دریافت اطلاعات از فرم و جلوگیری از حملات XSS با استفاده از تابع htmlspecialchars
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $message = htmlspecialchars(trim($_POST['message']));

    // ایمیل مقصد (ایمیل صحیح خودتان را وارد کنید)
    $to = "mahdishabani.ai2000@gmail.com"; // ایمیل صحیح خودتان
    $subject = "Contact Form Submission from: $name";
    $body = "Name: $name\nEmail: $email\n\nMessage:\n$message";

    // بررسی صحت ایمیل ارسال‌کننده
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $headers = "From: $email" . "\r\n" .
            "Reply-To: $email" . "\r\n" .
            "X-Mailer: PHP/" . phpversion();

        // ارسال ایمیل
        if (mail($to, $subject, $body, $headers)) {
            echo "Message sent successfully!";
        } else {
            echo "Failed to send message. Please try again later.";
        }
    } else {
        echo "Invalid email address. Please enter a valid email.";
    }
}
?>