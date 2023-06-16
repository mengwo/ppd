<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// action.php

$connect = new PDO("mysql:host=localhost;dbname=ppa_db", "root", "");

if (isset($_POST["action"]) && $_POST["action"] === 'fetch') {
    $order_column = array('id', 'ctrlno', 'dtecrt', 'dte', 'tme', 'dept', 'dtype', 'snd', 'sub', 'req', 'act', 'stat', 'filenme');

    $main_query = "SELECT id, ctrlno, dtecrt, dte, tme, dept, dtype, snd, sub, req, act, stat, filenme FROM entries ";

    $search_query = 'WHERE dte <= :current_date';

    $params = array(':current_date' => date('Y/m/d'));

    if (isset($_POST["start_date"], $_POST["end_date"]) && $_POST["start_date"] !== '' && $_POST["end_date"] !== '') {
        $start_date = $_POST["start_date"];
        $end_date = $_POST["end_date"];
        $search_query .= ' AND DATE(dte) >= :start_date AND DATE(dte) <= :end_date';
        $params['start_date'] = $start_date;
        $params['end_date'] = $end_date;
    }

    if (isset($_POST["search"]["value"]) && $_POST["search"]["value"] !== '') {
        $search_value = '%' . $_POST["search"]["value"] . '%';
        $search_query .= ' AND (id LIKE :search_value OR ctrlno LIKE :search_value OR dtecrt LIKE :search_value OR dte LIKE :search_value OR tme LIKE :search_value OR dept LIKE :search_value OR dtype LIKE :search_value OR snd LIKE :search_value OR sub LIKE :search_value OR req LIKE :search_value OR act LIKE :search_value OR stat LIKE :search_value OR filenme LIKE :search_value)';
        $params['search_value'] = $search_value;
    }

    $order_by_query = "";
    if (isset($_POST["order"])) {
        $order_column_index = $_POST['order']['0']['column'];
        $order_dir = $_POST['order']['0']['dir'];
        $order_by_query = 'ORDER BY ' . $order_column[$order_column_index] . ' ' . $order_dir;
    } else {
        $order_by_query = 'ORDER BY dte DESC';
    }

    // Pagination parameters
    $page = intval($_POST['start']) / intval($_POST['length']) + 1; // Current page number
    $limit = intval($_POST['length']); // Number of records per page
    $offset = ($page - 1) * $limit; // Offset for the query
    $limit_query = "LIMIT $offset, $limit";


    $query = $main_query . $search_query . ' ' . $order_by_query . ' ' . $limit_query;
    $statement = $connect->prepare($main_query . $search_query . ' ' . $order_by_query);

    $statement->execute($params);
    $filtered_rows = $statement->rowCount();

    // Count query
    $count_query = "SELECT COUNT(*) as count FROM ($main_query $search_query) as subquery";
    $statement = $connect->prepare($count_query);
    $statement->execute($params);
    $row = $statement->fetch(PDO::FETCH_ASSOC);
    $total_rows = $row['count'];

    $statement = $connect->prepare($query);
    $statement->execute($params);
    $result = $statement->fetchAll(PDO::FETCH_ASSOC);

    $data = array();
    foreach ($result as $row) {
        $sub_array = array();
        $sub_array[] = '<span class="ctrlno">' . $row["ctrlno"] . '</span>';
        $sub_array[] = '<span class="dtecrt">' . $row["dtecrt"] . '</span>';
        $sub_array[] = '<span class="dte">' . $row["dte"] . '</span>';
        $sub_array[] = '<span class="tme">' . $row["tme"] . '</span>';
        $sub_array[] = '<span class="dept">' . $row["dept"] . '</span>';
        $sub_array[] = '<span class="dtype">' . $row["dtype"] . '</span>';
        $sub_array[] = '<span class="snd">' . $row["snd"] . '</span>';
        $sub_array[] = '<span class="sub">' . $row["sub"] . '</span>';
        $sub_array[] = '<span class="req">' . $row["req"] . '</span>';
        $sub_array[] = '<span class="act">' . $row["act"] . '</span>';
        $sub_array[] = '<span class="pend-bg">' . $row["stat"] . '</span>';
        $sub_array[] = '<td>
            <button onclick="opendupdate()" class="btn btn-secondary" id="myButton" name="upctrlno">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
                    <path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                </svg>
            </button>
        </td>';
        $data[] = $sub_array;
    }

    $response = array(
        "draw" => intval($_POST["draw"]),
        "recordsTotal" => $total_rows,
        "recordsFiltered" => $filtered_rows,
        "data" => $data
    );

    echo json_encode($response);

} elseif (isset($_POST["action"]) && $_POST["action"] === 'update') {
    // Handle the update action here

    // Retrieve the updated data from the request
    $ctrlno = $_POST["ctrlno"];
    // Retrieve other updated fields as needed

    // Perform the update operation using the $ctrlno and other updated fields

    // Prepare the response
    $response = array(
        "status" => "success",
        "message" => "Data updated successfully."
    );

    echo json_encode($response);
}
?>