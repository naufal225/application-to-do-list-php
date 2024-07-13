<?php 
require 'functions.php';




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
<body class="font-[Poppins] h-full min-h-screen w-[100%] bg-blue-400 flex justify-center items-center flex-col">
    <header class="w-[100vw] h-[10vh] bg-[#fff] m-0 fixed top-0">
        <nav class="px-20 py-6 flex items-center justify-between h-full">
            <h1 class="font-bold md:text-4xl text-sm">To Do List Application</h1>
            <h2 class="mr-20 md:text-2xl text-sm font-bold">Add Task</h2>
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

    <div class="flex items-center justify-center h-full w-full">
        <div class="bg-white rounded-lg shadow-lg p-6 w-5/12"></div>
    </div>
    

    <script src="js/script.js"></script>
</body>
</html>