<?php 
require "functions.php";

$id_list = $_GET['id'];

if (filter_var($id, FILTER_VALIDATE_INT) === false) {
    die("Invalid ID");
}

$query = "DELETE FROM tbl_list WHERE id_list = '$id_list'";
query($query);

header("Location: index.php");
