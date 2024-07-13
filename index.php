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
} else {
    $id = $_COOKIE['jml'];
    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE id_user = $id");
    $row = mysqli_fetch_assoc($result);
    $username = $row["username"];
    $id = $row['id_user'];
}

$lists = getAllListWithIdUser($id);

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
<body class="font-[Poppins] h-full min-h-screen w-[100%] bg-blue-400 flex justify-center items-center flex-col">
    <header class="w-[100vw] h-[10vh] bg-[#fff] m-0 fixed top-0">
        <nav class="px-20 py-6 flex items-center justify-between h-full">
            <h1 class="font-bold md:text-4xl text-sm">To Do List Application</h1>
            <h2 class="mr-20 md:text-2xl text-sm font-400">Hello, <?= $username ?></h2>
            <div class="flex items-center justify-between h-full min-w-fit">
                <form action="logout.php">
                    <button class="bg-red-200 hover:bg-red-400 py-2 px-5 font-bold flex items-center justify-between gap-4 rounded-lg transition duration-100">
                        Log Out
                        <i class='bx bx-log-in'></i>
                    </button>
                </form>
            </div>
        </nav>
    </header>

    <!-- CARD -->
    <div class="flex items-center justify-center h-300 w-full">
        <div class="bg-white rounded-lg shadow-lg p-6 w-8/12 max-h-100">
            <h2 class="text-2xl font-bold mb-2">Your To Do List</h2>
            <form action="" method="post" class="">
                <input class="min-w-52 w-10/12 m-3 p-3 border-2 border-grey-500" type="text" name="task" id="task" placeholder="Search Your Task" required>
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-lg ml-2  transition duration-100">Seach</button>
            </form>
            <a href="add.php" type="submit" class="inline-block mb-6 my-2 bg-blue-500 hover:bg-blue-700 text-white py-2 px-4 rounded-lg ml-2  transition duration-100">Add Task</a>
            <table class="w-full border-2 border-grey-500 max-h-300 overflow-scroll">
                <thead>
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
                                    <a href="done.php?id=<?= $list['id_list']?>" class="text-blue-500 hover:text-blue-700">Done</a> | 
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
                                        <a href="done.php?id=<?= $list['id_list']?>" class="text-blue-500 hover:text-blue-700">Done</a> | 
                                        <a href="delete.php?id=<?= $list['id_list']?>" onclick="return confirm('Are you sure?')" class="text-red-500 hover:text-red-700">Delete</a>
                                    </td>
                                </tr>
                        <?php endif;?>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
    <!-- END CARD -->

    <script src="js/script.js"></script>
</body>
</html>