<?php 
require "functions.php";

session_start();

if(!isset($_SESSION['login'])) {
    header("Location:login.php");
    exit();
}

if(isset($_SESSION['username'])) {
    $id = $_SESSION['username'];
    $result = mysqli_query($conn, "SELECT username FROM tbl_user where username = '$id'");
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
} else {
    $id = $_COOKIE['jml'];
    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id_user = $id");
    $row = mysqli_fetch_assoc($result);
    $username = $row["username"];
}

$lists = getAllList();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>To Do List</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body class="font-[Poppins] min-h-screen w-full bg-[black]">
    <header class="w-full h-[10vh] bg-[#fff] m-0">
        <nav class="px-20 py-6 flex items-center justify-between h-full">
            <h1 class="font-bold text-4xl">To Do List Application</h1>
            <h2 class="mr-20 text-2xl font-400">Hello, <?= $username ?></h2>
            <div class="flex items-center justify-between h-full min-w-fit">
                <form action="logout.php">
                    <button class="bg-red-200 py-2 px-5 font-bold flex items-center justify-between gap-4 rounded-lg">
                        Log Out
                        <i class='bx bx-log-in'></i>
                    </button>
                </form>
            </div>
        </nav>
    </header>

    <script src="js/script.js"></script>
</body>
</html>