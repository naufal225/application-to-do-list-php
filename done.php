<?php
require "functions.php";

$id_list = $_GET['id'];

if (filter_var($id_list, FILTER_VALIDATE_INT) === false) {
    header('Location:something.php');
}

$query = "UPDATE tbl_list SET status_list = 'done' WHERE id_list = '$id_list'";
query($query);

header("Location: index.php");
exit;