<?php
session_start();
echo $_SESSION['type'];
session_unset();
session_destroy();
header("Location:index.php")
?>