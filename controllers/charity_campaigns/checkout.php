<?php
$heading = "one test";
use core\App ;
use core\Database ;


$db = App::resolve(Database::class);




$campaigns = $db->query("select campaign_id , short_description, photo from campaigns where campaign_id = :campaign_id and state = 'active' ", [
  'campaign_id' => $_GET['campaign_id'],
])->findOrFail();


$donation = [
    'donation_page' => 'charity_campaigns_donate' ,
    'cost' => $_GET['cost'] ?? 0,
    'product_id' => $campaigns['campaign_id'] ?? 0 ,
    'name' => $campaigns['name'] ?? 'Campaign Name',
    'description' => $campaigns['short_description'] ?? 'Campaign Description',
    'image' => $campaigns['photo'] 
];




require "views/pages/checkout_view.php";

