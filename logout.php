<?php 
session_start();
session_unset();
session_destroy();

setcookie("jml", "", time() - 3600);
setcookie("lmj", "", time() - 3600);

header("Location: login.php");
exit();

?>