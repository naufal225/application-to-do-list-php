<?php 
require "functions.php";

session_start();

if(!isset($_SESSION['login'])) {
    header("Location:login.php");
    exit();
}

if(isset($_SESSION['username'])) {
    $id = $_SESSION['username'];
    $result = mysqli_query($conn, "SELECT * FROM tbl_user where username = '$id'");
    $row = mysqli_fetch_assoc($result);
    $username = $row['username'];
    $id = $row['id_user'];
} elseif(isset($_COOKIE['jml'])) {
    $id = $_COOKIE['jml'];
    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id_user = $id");
    $row = mysqli_fetch_assoc($result);
    $username = $row["username"];
    $id = $row['id_user'];
}

$s = isset($_GET['s']) ? $_GET['s'] : '';
$lists = getAllListWithIdUserAndContent($id, $s);

$no = 1;

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
<body class="font-[Poppins] h-full min-h-screen w-full bg-blue-400 flex justify-center items-center flex-col">
    <header class="w-full md:h-10vh xs:h-5vh bg-white m-0 fixed top-0">
        <nav class="px-5 py-3 md:px-10 md:py-6 flex items-center justify-between h-full">
            <h1 class="font-bold md:text-4xl text-md sm:mt-3">To Do List Application</h1>
            <h2 class="md:mr-20 md:text-2xl text-md font-400">Hello, <?= $username ?></h2>
            <div class="menu md:hidden">
                <i class='bx bx-menu text-2xl'></i>
                <i class='bx bx-x text-2xl hidden' ></i>
            </div>
            <div class="flex items-center justify-between h-full min-w-fit md:inline-block hidden">
                <form action="logout.php">
                    <button class="bg-red-200 hover:bg-red-400 md:py-2 md:px-5 md:text-lg text-sm py-1 px-3 font-bold flex items-center justify-between gap-4 rounded-lg transition duration-100">
                        Log Out
                        <i class='bx bx-log-in'></i>
                    </button>
                </form>
            </div>
            <div class="menu-button absolute left-0 top-[6vh] h-16 bg-white w-full flex justify-center items-center md:hidden hidden">
                <form action="logout.php">
                    <button class="bg-red-200 hover:bg-red-400 md:py-2 md:px-5 md:text-lg text-sm py-1 px-3 font-bold flex items-center justify-between gap-4 rounded-lg transition duration-100">
                        Log Out
                        <i class='bx bx-log-in'></i>
                    </button>
                </form>
            </div>
        </nav>
    </header>

    <!-- CARD -->
    <div class="flex items-center justify-center max-h-7/12 w-full mt-20">
        <div class="bg-white rounded-lg shadow-lg p-1 md:p-6 w-[90%] h-11/12 md:w-8/12 md:h-100">
            <h2 class="text-2xl font-bold mb-2">Your To Do List</h2>
            <form action="" method="get" class="">
                <input class="min-w-52 w-10/12 m-3 p-3 border-2 border-grey-500" type="text" name="s" id="task" placeholder="Search Your Task">
                <button type="submit" name class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-lg ml-2 transition duration-100">Search</button>
            </form>
            <a href="add.php" type="submit" class="inline-block mb-6 my-2 bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-lg ml-2 transition duration-100">Add Task</a>
            <!-- Pembungkus tabel dengan kelas Tailwind CSS -->
            <div class="max-h-64 overflow-y-auto">
                <table class="w-full border-2 border-grey-500 relative">
                    <thead class="sticky top-0 left-0 right-0">
                        <tr class="bg-blue-300">
                            <th>No.</th>
                            <th>Task</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <?php foreach($lists as $list): ?>
                            <?php if($no % 2 == 0): ?>
                                <tr class="bg-blue-100">
                                    <td>
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $list['konten_list'] ?>
                                    </td>
                                    <td>
                                        <?= $list['status_list'] == "done" ? "Done" : "Haven't done yet" ?>
                                    </td>
                                    <td>
                                        <?php if($list['status_list'] != "done"): ?>
                                            <a href="done.php?id=<?= $list['id_list']?>" class="text-blue-500 hover:text-blue-700">Done</a> |
                                        <?php endif; ?>
                                        <a href="delete.php?id=<?= $list['id_list']?>" onclick="return confirm('Are you sure?')" class="text-red-500 hover:text-red-700">Delete</a>
                                    </td>
                                </tr>
                            <?php else: ?>
                                <tr>
                                    <td>
                                        <?= $no++ ?>
                                    </td>
                                    <td>
                                        <?= $list['konten_list'] ?>
                                    </td>
                                    <td>
                                        <?= $list['status_list'] == "done" ? "Done" : "Haven't done yet" ?>
                                    </td>
                                    <td>
                                        <?php if($list['status_list'] != "done"): ?>
                                            <a href="done.php?id=<?= $list['id_list']?>" class="text-blue-500 hover:text-blue-700">Done</a> |
                                        <?php endif; ?>
                                        <a href="delete.php?id=<?= $list['id_list']?>" onclick="return confirm('Are you sure?')" class="text-red-500 hover:text-red-700">Delete</a>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- END CARD -->

    <script src="js/script.js"></script>
</body>
</html>
