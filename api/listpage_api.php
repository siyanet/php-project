<?php
require_once('dbselect.php');


// ... (rest of your code)


$tb_name = "Student";
$results_per_page = 1;

$response = array();

try {
    if (isset($_GET['page'])) {
        $page = $_GET['page'];
    } else {
        $page = 1;
    }
  
    
    $start_from = ($page - 1) * $results_per_page;

    if (isset($_GET['search_text'])) {
        $search = $_GET['search_text'];
        $sql_fetch = "SELECT * FROM $tb_name WHERE deleted_at IS NULL AND first_name = '$search' LIMIT $start_from, $results_per_page";
    } elseif (isset($_GET['school_filter'])) {
        $school_name = $_GET['school_filter'];
        $sql_fetch = "SELECT * FROM $tb_name WHERE deleted_at IS NULL AND school_name = '$school_name' LIMIT $start_from, $results_per_page";
    } else {
        $sql_fetch = "SELECT * FROM $tb_name WHERE deleted_at IS NULL LIMIT $start_from, $results_per_page";
    }
    echo $sql_fetch;
    $result = $conn->query($sql_fetch);

    if ($result->num_rows > 0) {
        $response['data'] = array();
        while ($row = $result->fetch_assoc()) {
            $response['data'][] = array(
                'id' => $row['id'],
                'first_name' => $row['first_name'],
                'middle_name' => $row['middle_name'],
                'last_name' => $row['last_name'],
                'gender' => $row['gender'],
                'grade' => $row['grade'],
                'school_name' => $row['school_name'],
                'reg_date' => $row['reg_date']
            );
        }
    } else {
        $response['error'] = "No available records.";
    }

    $conn->close();
} catch (Exception $e) {
    $response['error'] = $e->getMessage();
}

// Set headers to allow cross-origin resource sharing (CORS)
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json");

// Output JSON response
// Output JSON response


echo json_encode($response);
?>
