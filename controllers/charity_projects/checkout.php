<?php
$heading = "one test";
use core\App ;
use core\Database ;


$db = App::resolve(Database::class);


try {

    $projects = $db->query("
    SELECT project_id,
        short_description,
        photo
    FROM projects 
    WHERE project_id = :project_id and state = 'active'
    ", [
    'project_id' => $_GET['project_id'] 
    ])->findOrFail();
} catch (PDOException $e) {
    error_log($e->getMessage());
    abort(500);
}




$donation = [
    'donation_page' => 'charity_projects_donate' ,
    'cost' => $_GET['cost'] ?? 0,
    'product_id' => $projects['project_id'] ?? 0 ,
    'name' => $projects['name'] ?? 'Campaign Name',
    'description' => $projects['short_description'] ?? 'Campaign Description',
    'image' => $projects['photo'] 
];




require "views/pages/checkout_view.php";

