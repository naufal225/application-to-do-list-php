<?php 
require 'functions.php';

if(isset($_POST['submit'])) {
    if(registrasi($_POST) > 0) {
        echo "<script>
            alert('Pendaftaran berhasil! Silahkan login.');
            document.location.href = 'login.php';
        </script>";
    } else {
        echo "<script>
            alert('Pendaftaran gagal!');
        </script>"; 
    }
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
     
    <div class="w-3/12 min-h-[65vh] bg-white rounded-lg flex flex-col justify-evenly items-center mx-auto">
        <h1 class="text-4xl font-bold mb-5 mt-5">Registerasi</h1>
        <form action="" method="post" class="w-full max-w-sm">
            <div class="mb-4 ml-7">
                <input class="p-2 w-full md:w-80 rounded border border-gray-300" type="text" name="username" id="username" placeholder="Username" required>
            </div>
            <div class="mb-4 ml-7">
                <input class="p-2 w-full md:w-80 rounded border border-gray-300" type="password" name="password" id="password" placeholder="Password" required>
            </div>
            <div class="mb-4 ml-7">
                <input class="p-2 w-full md:w-80 rounded border border-gray-300" type="password" name="konfirmasi" id="konfirmasi" placeholder="Konfirmasi Password" required>
            </div>
            <button type="submit" name="submit" class="md:w-9/12 mt-3 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded ml-11">Daftar</button>
        </form>
        <div class="">
            <span>Sudah punya akun? </span><a href="login.php" class="text-blue-500 hover:text-blue-700">Login</a>
        </div>
    </div>


    <script src="js/script.js"></script>
</body>
</html>