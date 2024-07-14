<?php 
require "functions.php";

$id_list = $_GET['id'];

if (filter_var($id_list, FILTER_VALIDATE_INT) === false) {
    header('Location:something.php');
}

$query = "DELETE FROM tbl_list WHERE id_list = '$id_list'";
query($query);

header("Location: index.php");
