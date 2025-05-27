<?php
$heading = "one test";

use core\App;
use core\Database;


$db = App::resolve(Database::class);
if(!isset($_SESSION['user']) || $_SESSION['user']['user_type'] != 'admin' || $_SESSION['user']['user_type'] != 'manager'
 || $_SESSION['user']['user_id'] != $_POST['user_id'])  header("Location: /home_view");
try {
    $db->query(
        "DELETE FROM users WHERE user_id = :user_id",
        [
            'user_id' => $_POST['user_id']
        ]
    );
} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}


header("Location: " . $_SERVER["HTTP_REFERER"]);
