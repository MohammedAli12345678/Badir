<?php
$heading = "one test";
use core\App ;
use core\Database ;


$db = App::resolve(Database::class);



try {
    $endowments =$db->query( "
    SELECT endowment_id,
        short_description,
        photo
    FROM endowments 
    where endowment_id = :endowment_id and state = 'active';",[
    'endowment_id' => $_GET['endowment_id'],
    ])->findOrFail();
 
} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}



$donation = [
    'donation_page' => 'islamic_endowments_donate' ,
    'cost' => $_GET['cost'] ?? 0,
    'product_id' => $endowments['endowment_id'] ?? 0 ,
    'name' => $endowments['name'] ?? 'Campaign Name',
    'description' => $endowments['short_description'] ?? 'Campaign Description',
    'image' => $endowments['photo'] 
];




require "views/pages/checkout_view.php";

