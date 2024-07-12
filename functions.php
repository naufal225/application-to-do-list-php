<?php 

$conn = mysqli_connect("localhost","root","","db_todo");

function getAllList() {
    global $conn;
    $query = "SELECT * FROM tbl_list";
    $result = mysqli_query($conn, $query);
    $results = [];
    while ($row = mysqli_fetch_array($result)) {
        $results[] = $row;
    }
    return $results;
}

function getAllListWithIdUser($id) {
    global $conn;
    $query = "SELECT * FROM tbl_list where id_user = $id";
    $result = mysqli_query($conn, $query);
    $results = [];
    while ($row = mysqli_fetch_array($result)) {
        $results[] = $row;
    }
    return $results;
}

function getAllListWithContent($content) {
    global $conn;
    $query = "SELECT * FROM tbl_list where konten_list LIKE '%$content%'";
    $result = mysqli_query($conn, $query);
    $results = [];
    while ($row = mysqli_fetch_array($result)) {
        $results[] = $row;
    }
    return $results;
}

function getAllListWithStatus($status) {
    global $conn;
    $query = "SELECT * FROM tbl_list where status_list = '$status'";
    $result = mysqli_query($conn, $query);
    $results = [];
    while ($row = mysqli_fetch_array($result)) {
        $results[] = $row;
    }
    return $results;
}

?>