<?php
require_once 'dbselect.php';

$tb_name = "Student";
$results_per_page = 1;



$api_url = '../api/listpage_api.php'; // Replace with the actual API URL


if (isset($_GET['search_text'])) {
    $api_url .= '?search_text=' . urlencode($_GET['search_text']);
} elseif (isset($_GET['school_filter'])) {
    $api_url .= '?school_filter=' . urlencode($_GET['school_filter']);
}
if (isset($_GET['page'])) {
    $page = $_GET['page'];
    $api_url .= '?page=' . $page;
}



try {
    // Fetch data from the API
    $api_data = file_get_contents($api_url);
    $api_response = json_decode($api_data, true);

    // Populate the list on the page
    if (isset($api_response['data']) && is_array($api_response['data'])) {
        foreach ($api_response['data'] as $item) {
            echo "<tr>";
            echo "<td>" . $item['id'] . "</td>";
            echo "<td>" . $item['first_name'] . "</td>";
            echo "<td>" . $item['middle_name'] . "</td>";
            echo "<td>" . $item['last_name'] . "</td>";
            echo "<td>" . $item['gender'] . "</td>";
            echo "<td>" . $item['grade'] . "</td>";
            echo "<td>" . $item['school_name'] . "</td>";
            echo "<td>" . $item['reg_date'] . "</td>";
            echo "<td>";
            echo "<a href='../view/detail_view.php?id=" . $item['id'] . "'><i class='fas fa-info-circle'></i></a>";
            echo "<a href='../view/edit_view.php?id=" . $item['id'] . "'><i class='fa fa-edit'></i></a>";
            echo "<span>";
            echo "<form method='POST' action='../model/delete_recorde.php'>";
            echo "<input type='hidden' value='" . $item['id'] . "' name='student-id'>";
            echo "<a href='#'><button type='submit' name='delete_button' class='btn-sm button-danger custom-inline-button'><i class='fas fa-trash-alt'></i></button></a>";
            echo "</span>";
            echo "</td>";
            echo "</tr>";
        }
    } elseif (isset($api_response['error'])) {
        echo "<tr><td colspan='9' style='text-align: center;'>" . $api_response['error'] . "</td></tr>";
    }
} catch (Exception $e) {
    echo "<tr><td colspan='9' style='text-align: center;'>" . $e->getMessage() . "</td></tr>";
}
?>

