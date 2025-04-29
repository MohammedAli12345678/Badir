<?php

use core\App;
use core\Database;
use models\User;

$db  = App::resolve(Database::class);



$errors = [];


if (empty($_POST['email'])) {
    $errors['email'] = "الرجاء إدخال البريد الإلكتروني";
}

if (empty($_POST['password'])) {
    $errors['password'] = "الرجاء إدخال كلمة المرور";
}


if (! Validator::email($_POST['email'])) {
    $errors['email'] = "ليسى البريد الإلكتروني صحيح";
}
if (! Validator::string($_POST['password'])) {
    $errors['password'] = "ليسى كلمة المرور صحيحة";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors ;
    header("Location:" . $_SERVER["HTTP_REFERER"]);
    exit();
}
try {
    $user = $db->query("select * from users where email = :email ; ", [
        "email" => $_POST['email']
    ])->fetch();
} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}

if ($user) {
    if (password_verify($_POST['password'], $user['password'])) {
        logIn($user);
        header("Location: /");
        exit();
    }else{
        $errors['password'] = "لا يوجد كلمة مرور مطابقة لهذا";
    }
}else {
    $errors['email'] = "لا يوجد بريد إلكتروني مطابق لهذا";
}



$_SESSION['errors'] = $errors ;
header("Location:" . $_SERVER["HTTP_REFERER"]);
exit();



