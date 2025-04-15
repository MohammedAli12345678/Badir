<?php

use core\Validator;
use core\Authenticator;
use core\App;
use core\Database;
use phpDocumentor\Reflection\Location;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';
$config = require 'config.php';

$heading = "Create test";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  //validate the data
  $address = htmlspecialchars($_POST['address'] ?? '');
  $message = htmlspecialchars($_POST['descripe_problem'] ?? '');
  $email = filter_var($_POST['email'] ?? '', FILTER_SANITIZE_EMAIL);
  $_SESSION['user_email'] = $email;
  $db = App::resolve(Database::class);
  // $errors = [];

  $_SESSION['user_data'] = $_POST;
  $_SESSION['file'] = $_FILES['photo'];

  if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $error = urlencode("البريد الإلكتروني غير صالح");
    header("Location:/users_create_view?error={$error}");
    exit();
  }

  $user = $db->query('SELECT * FROM users WHERE email = :email', ['email' => $email])->fetch();

  if ($user) {
    $error = urlencode("البريد الإلكتروني مسجل بالفعل");
    header("Location:/users_create_view?error={$error}");
    exit();
  }
  sendEmail($config, $email, $message);
} elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {

  // Check if the user is logged in and has a session
  $email = $_SESSION['user_data']['email'] ?? '';
  $message = $_SESSION['user_data']['descripe_problem'] ?? '';
  $address = $_SESSION['user_data']['address'] ?? '';


  sendEmail($config, $email, $message);
}



function sendEmail($config, $email, $message) // this function sends the email
{


  try {



    // I will uncomment this code later, please don't delete it, it is important for the future...
    // we will make the user request to send the email again, after five minutes if it's trying more than once

    // cheak if the email is valid
    //  if (isset($_SESSION['code_expiry']) && time() < $_SESSION['code_expiry']) {
    //   $remaining = $_SESSION['code_expiry'] - time();
    //   $minutes = floor($remaining / 60);
    //   $seconds = $remaining % 60;
    //   $timeLeft = "$minutes دقيقة و $seconds ثانية";

    //   die("لا يمكنك إعادة الإرسال الآن. يرجى الانتظار $timeLeft قبل إعادة المحاولة.");
    // }


    // if there is a code in the session, unset it
    unset($_SESSION['verification_code']);
    unset($_SESSION['code_expiry']);

    //  create code Verification
    $verification_code = rand(100000, 999999);
    $_SESSION['verification_code'] = $verification_code;
    $_SESSION['code_expiry'] = time() + 300; // five minutes expiry time

    $mail = new PHPMailer(true);

    // srvice provider which sends the email 
    $mail->isSMTP();
    $mail->SMTPAuth = true;
    $mail->Host = $config['phpmailer']['mail_host'];
    $mail->Port = $config['phpmailer']['mail_port'];
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Username = $config['phpmailer']['mail_username'];
    $mail->Password = $config['phpmailer']['mail_password'];
    $fromemail = $config['phpmailer']['mail_from'];
    $mail->setFrom($fromemail, "Badir Charity");
    $mail->addAddress($email);
    $mail->isHTML(true);
    $mail->Subject = "تفعيل حسابك في منصة بادر";
    $mail->CharSet = 'UTF-8'; //UTF-8
    $mail->Body = "
  <html>
  <head>
      <title>رسالة من بادر الخيرية</title>
      <style>
          body {
              font-family: 'Arial', sans-serif;
              background-color: #f9f9f9;
              margin: 0;
              padding: 0;
          }
  
            .email-container {
              background: #ffffff;
              padding: 30px;
              max-width: 600px;
              margin: 20px auto;
              border-radius: 10px;
              box-shadow: 0 4px 12px rgba(0, 0, 0, 0.05);
              border-top: 5px solid #00A7B5;
            }
  
          .email-header {
              text-align: center;
              margin-bottom: 20px;
          }
  
          .email-header img {
              max-width: 140px;
              margin-bottom: 10px;
          }
  
          .email-header h3 {
              color: #00A7B5;
              font-size: 24px;
              margin: 0;
          }
  
          .email-content {
              font-size: 16px;
              line-height: 1.7;
              color: #333;
              margin-bottom: 20px;
          }
  
          .email-content p {
              margin: 12px 0;
              text-align: right;
          }
  
          .email-content strong {
              color: #00A7B5;
          }
  
          .verification-code {
              background-color: #e2f8fa;
              padding: 12px;
              border-radius: 6px;
              color: #00A7B5;
              font-weight: bold;
              font-size: 18px;
              text-align: center;
              margin-top: 10px;
          }
  
          .email-footer {
              text-align: center;
              font-size: 12px;
              color: #A0A0A0;
              margin-top: 30px;
              border-top: 1px solid #eee;
              padding-top: 15px;
          }
  
          .email-footer p {
              margin: 5px 0;
          }
  
          .email-footer a {
              color: #00A7B5;
              text-decoration: none;
          }
              .vcode{
              text-align: center;
              
              }
  
      </style>
  </head>
  <body>
      <div class='email-container'>
          <div class='email-header'>
              <img src='https://i.postimg.cc/kMV8zNyC/bader.png' alt='Badir Charity Logo'>
              <h3>رسالة جديدة من بادر الخيرية</h3>
          </div>
          <div class='email-content'>
              <p> $email <strong>:مرحباً بك عزيزي المستخدم</strong></p>
              <p><strong> أنت على بعد خطوة واحدة من تفعيل حسابك في منصة بادر الخيرية</strong><br>" . nl2br($message) . "</p>
              <hr>
              <p class='vcode'><strong>:رمز التحقق الخاص بك</strong></p>
              <div class='verification-code'>$verification_code</div>
          </div>
          <div class='email-footer'>
              <p>&copy; " . date('Y') . " بادر الخيرية - جميع الحقوق محفوظة</p>
              <p>:تواصل معنا <br><a href='mailto:badir.charity.org@gmail.com'>support@badir.org</a></p>
          </div>
      </div>
  </body>
  </html>
  ";


    if ($mail->send()) {

      // $_SESSION['success'] = "تم إرسال الكود بنجاح، تحقق من بريدك.";


      header("Location: /users_verification_view?sent=success");
      exit();
    } else {
      die("فشل في إرسال البريد: " . $mail->ErrorInfo);
    }
  } catch (Exception $e) {
    die("خطأ في الإرسال: " . $e->getMessage());
  } catch (PDOException $e) {
    die("حدث خطأ أثناء الحفظ: " . $e->getMessage());
  }
}
