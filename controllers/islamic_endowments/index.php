<?php
use core\App ;
use core\Database ;
$db = App::resolve(Database::class);


$page = "islamic_endowments_index" ;

try {
    // Fetch categories for filtering
    $categories = $db->query("SELECT category_id, name FROM categories")->fetchAll();

    // Get search and filter inputs from $_GET
    $search = $_GET['search'] ?? '';
    $filter = $_GET['filter'] ?? 'all';

    // Base Query
    $query = "SELECT * FROM endowments WHERE 1=1";
    $params = [];

    // 🔎 Add Search Filter
    if (!empty($search)) {
        $query .= " AND MATCH(name, short_description, full_description) AGAINST (:search IN NATURAL LANGUAGE MODE)";
        $params['search'] = $search;
    }

    // 🎯 Add Category Filter (if a valid category is selected)
    if ($filter !== 'all' && is_numeric($filter)) {
        $query .= " AND category_id = :category_id";
        $params['category_id'] = $filter;
    }
    if (isset($_GET['submit']) && $_GET['submit'] == "foryou") {
        $query .= " AND u.user_id = :user_id";
        $params['user_id'] = $_SESSION['user']['id'];
    }


    // 👌 Finalize Query
    $query .= " ORDER BY name ASC;";

    // Execute the query
    $islamic_endowments = $db->query($query, $params)->fetchAll();

} catch (PDOException $e) {
    error_log($e->getMessage());
    $_SESSION['error'] = "حدث خطأ أثناء جلب البيانات";
    header("Location: /endowments");
    exit();
}



require "views/pages/islamic_endowments/index_view.php";


?>