<?php
require "functions.php";

$id_list = $_GET['id'];

if (filter_var($id, FILTER_VALIDATE_INT) === false) {
    die("Invalid ID");
}

$query = "UPDATE tbl_list SET status_list = 'done' WHERE id_list = '$id_list'";
query($query);

header("Location: index.php");
exit;