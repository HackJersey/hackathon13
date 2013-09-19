<?php
session_start();
session_unset();

$_SESSION["valid_user"]=false;
session_destory();
Header("Location:index.php");
?>