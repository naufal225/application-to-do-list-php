<?php 

$conn = mysqli_connect("localhost","root","","db_todo");

function query($query) {
    global $conn;
    mysqli_query($conn,$query);
    return mysqli_affected_rows($conn);
}

function getAllList() {
    global $conn;
    $query = "SELECT * FROM tbl_list";
    $result = mysqli_query($conn, $query);
    $results = [];
    while ($row = mysqli_fetch_array($result)) {
        $results[] = $row;
    }
    return $results;
}

function getAllListWithIdUser($id) {
    global $conn;
    $query = "SELECT * FROM tbl_list where id_user = $id";
    $result = mysqli_query($conn, $query);
    $results = [];
    while ($row = mysqli_fetch_array($result)) {
        $results[] = $row;
    }
    return $results;
}

function getAllListWithIdUserAndContent($id, $content) {
    global $conn;
    $query = "SELECT * FROM tbl_list where id_user = $id AND konten_list LIKE '%$content%'";
    $result = mysqli_query($conn, $query);
    $results = [];
    while ($row = mysqli_fetch_array($result)) {
        $results[] = $row;
    }
    return $results;
}

function getAllListWithContent($content) {
    global $conn;
    $query = "SELECT * FROM tbl_list where konten_list LIKE '%$content%'";
    $result = mysqli_query($conn, $query);
    $results = [];
    while ($row = mysqli_fetch_array($result)) {
        $results[] = $row;
    }
    return $results;
}

function getAllListWithStatus($status) {
    global $conn;
    $query = "SELECT * FROM tbl_list where status_list = '$status'";
    $result = mysqli_query($conn, $query);
    $results = [];
    while ($row = mysqli_fetch_array($result)) {
        $results[] = $row;
    }
    return $results;
}

function registrasi($data) {
    global $conn;
    $username = htmlspecialchars($data["username"]);
    $password = htmlspecialchars($data["password"]);
    $konfirmasi = htmlspecialchars($data["konfirmasi"]);

    if($password != $konfirmasi) {
        echo "
            <script>
                alert('Password dan konfirmasi password tidak sama!');
            </script>
        ";
        return false;
    }

    // cek apa username tersedia

    $result = mysqli_query($conn, "SELECT username FROM tbl_user WHERE username = '$username'");
    if(mysqli_num_rows($result) > 0) {
        echo "
            <script>
                alert('Username tidak tersedia');
            </script>
        ";
        return false;
    }

    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "INSERT into tbl_user (username, password) values ('$username', '$password')";

    query($query);

    return  mysqli_affected_rows($conn);
}

function addList($data) {
    global $conn;
    $id_user = $_SESSION["jml"];
    $konten_list = htmlspecialchars($data["konten_list"]);
    $status_list = htmlspecialchars($data["status_list"]);
}

?>