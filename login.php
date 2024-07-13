<?php 
require 'functions.php';

session_start();

if(isset($_COOKIE['jml']) && isset($_COOKIE['lmj'])) {
    $id = $_COOKIE['jml'];
    $username = $_COOKIE['lmj'];
    $result = mysqli_query($conn, "SELECT * FROM tbl_user where id_user = $id");
    $row = mysqli_fetch_assoc($result);
    if(hash("sha256", $row["username"]) == $username) {
        $_SESSION['login'] = true;
        header("Location:index.php");
        exit();
    }
}

if(isset($_SESSION['login'])) {
    header("Location: index.php");
    exit();
}

if(isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM tbl_user WHERE username = '$username'");
    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if(password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;
            $_SESSION['username'] = $username;  

            if(isset($_POST['remember'])) {
                setcookie('jml', $row["id_user"], time() + (7 * 24 * 60 * 60));
                setcookie('lmj', hash("sha256", $row["username"]), time() + (7 * 24 * 60 * 60));
            }

            header("Location:index.php");
            exit();
        }
    }

    $error = true;
}


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
<body class="font-[Poppins] min-h-screen w-full bg-[black] flex justify-center items-center">
     
    <div class="md:w-3/12 sm:w-10/12 min-h-[60vh] bg-white rounded-lg flex flex-col justify-evenly items-center mx-auto">
        <h1 class="text-4xl font-bold mb-5 mt-5">Login</h1>
        <form action="" method="post" class="w-full max-w-sm">
            <?php if(isset($error)):?>
                <p class="italic text-red-500 ml-7 my-2">Username atau password salah</p>
            <?php endif;?>
            <div class="mb-4 ml-7">
                <input class="p-2 w-50 md:w-80 rounded border border-gray-300" type="text" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="mb-4 ml-7">
                <input class="p-2 w-50 md:w-80 rounded border border-gray-300" type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="mb-4 flex items-center ml-9">
                <input class="mr-2" type="checkbox" name="remember" id="remember">
                <label for="remember">Remember Me</label>
            </div>
            <button type="submit" name="submit" class="md:w-9/12 mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-11">Login</button>
        </form>
        <div class="">
            <span>Belum punya akun? </span><a href="register.php" class="text-blue-500 hover:text-blue-700">Daftar</a>
        </div>
    </div>



    </div>


    <script src="js/script.js"></script>
</body>
</html>