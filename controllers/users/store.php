
<?php

// die(" وصلنا لـ store.php");

if (session_status() === PHP_SESSION_NONE) {
  session_start();
}

use core\App;
use core\Database;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

  $db = App::resolve(Database::class);

  $data = $_SESSION['user_data'];
  

  $errors = [];
  // cheak if the code is empty
  $entered_code = $_POST['verification_code'];
  $saved_code = $_SESSION['verification_code'];
  $code_expiry = $_SESSION['code_expiry'];
  $current_time = time();
  //  cheak if the code is expired
  if ($current_time > $code_expiry) {
    $_SESSION['error'] = "كود التحقق منتهي الصلاحية. يرجى إعادة الإرسال.";
    session_destroy();
    header("Location: /users_verification_view?error = " . urlencode("كود التحقق منتهي الصلاحية. يرجى إعادة الإرسال."));
    exit();
  }

  // cheak if the code is correct
  if ($entered_code != $saved_code) {
    $_SESSION['error'] = "رمز التحقق غير صحيح.";
    header("Location: /users_verification_view?error = " . urlencode("رمز التحقق غير صحيح."));
    exit();
  }

  //  get the user data from the sessionn
  if ($entered_code === $saved_code) {
    if ($_SESSION['process_type'] === 'register') {
      $data = $_SESSION['user_data'];
      // dd($_SESSION['verification_code']);


      // cheak if the email is already used
      $query = $db->query('SELECT * FROM users WHERE email = :email', [
        'email' => filter_var($data['email'], FILTER_SANITIZE_EMAIL)
      ])->fetch();


      if ($query) {
        $errors['email'] = "البريد الإلكتروني مستخدم مسبقًا.";
      }

      if (!empty($errors)) {
        $_SESSION['errors'] = $errors ;
        header("Location:" . $_SERVER["HTTP_REFERER"]);
        exit();
      }

      // $_FILES['photo'] = $_SESSION['file'];
      try {
        // require('controllers/parts/image_loader.php');
        $db->query(
          "INSERT INTO users (
                username,
                password,
                photo,
                email,
                type,
                country,
                city,
                street,
                phone,
                notifications
                -- verification_code,
                -- code_expiry
            ) VALUES (
                :username,
                :password,
                :photo,
                :email,
                :type,
                :country,
                :city,
                :street,
                :phone,
                :notifications
                -- :verification_code,
                -- :code_expiry

            )",
          [
            'username' => htmlspecialchars($data['username']),
            'password' => password_hash($data['password'], PASSWORD_BCRYPT),
            'photo' => $filenamenew ?? $data['photo'] ?? "user.png",
            'email' => filter_var($data['email'], FILTER_SANITIZE_EMAIL),
            'type' => 'normal',
            'country' =>  htmlspecialchars($data['country']),
            'city' =>  htmlspecialchars($data['city']),
            'street' => htmlspecialchars($data['street']),
            'phone' => filter_var($data['phone'], FILTER_SANITIZE_STRING),
            'notifications' => isset($data['notifications']) ? 1 : 0
            // 'verification_code' => $_SESSION['verification_code'],
            // 'code_expiry' => $_SESSION['code_expiry'],
          ]
        );

        //get the user from the database
        $user = $db->query('SELECT * FROM users WHERE email = :email', [
          'email' => $data['email']
        ])->fetch();

        // 

        login($user);

        // clear the session data
        unset($_SESSION['user_data'], $_SESSION['photo'], $_SESSION['verification_code'], $_SESSION['code_expiry'], $_SESSION['file']);

        // redirect to the home page
        $_SESSION['success'] = "تم إنشاء الحساب بنجاح. مرحبًا بك في موقعنا!";
        header("Location: /");
        exit();
      } catch (PDOException $e) {
        error_log($e->getMessage());
        abort(500);
      }
    } elseif ($_SESSION['process_type'] === 'change_password') {

      $data = $_SESSION['change_password_data'];
      // $email = $_SESSION['user_email'];
      $new_password = $data['new_password'];
      $confirm_password = $data['confirm_password'];

      // cheak if the email is already used
      $query = $db->query('SELECT * FROM users WHERE email = :email', [
        'email' => filter_var($data['email'], FILTER_SANITIZE_EMAIL)
      ])->fetch();

      if (!empty($errors)) {
        $_SESSION['errors'] = $errors;
        header("Location:" . $_SERVER["HTTP_REFERER"]);
        exit();
      }


      try {
        // require('controllers/parts/image_loader.php');

        $db->query(
          "UPDATE users SET password = :password WHERE email = :email",
          [
            'password' => password_hash($new_password, PASSWORD_BCRYPT),
            'email' => filter_var($data['email'], FILTER_SANITIZE_EMAIL)
          ]

        );


        //get the user from the database
        $user = $db->query('SELECT * FROM users WHERE email = :email', [
          'email' => $data['email']
        ])->fetch();

        login($user);

        // clear the session data
        unset($_SESSION['user_email'], $_SESSION['new_password'], $_SESSION['confirm_password'], $_SESSION['verification_code'], $_SESSION['code_expiry'], $_SESSION['file']);

        // redirect to the home page
        $_SESSION['success'] = "تم تغيير كلمة المرور بنجاح. مرحبًا بك في موقعنا!";
        $success = urlencode("تم تغيير كلمة المرور بنجاح. مرحبًا بك في موقعنا!");
        header("Location: /?success=$success");
        exit();
      } catch (PDOException $e) {
        error_log($e->getMessage());
        abort(500);
      }
    } else {
      $error = urlencode("حدث خطأ أثناء تغيير الباسورد .");
      header("Location: /?error=$error");
    }
  } else {
    $error = urlencode(" هناك خطأ في استقبال الكود .");
    header("Location: /verification_code?error=$error");
  }
} else {
  $error = urlencode(" خطأ في الطلب  .");
  header("Location: /?error=$error");
}
