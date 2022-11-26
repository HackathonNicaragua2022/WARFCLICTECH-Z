<?php
session_start();
    unset($_SESSION["s_usuario"]);
    unset($_SESSION["INSS"]);
    unset($_SESSION["IDDOCTOR"]);
session_destroy();
header("Location:../index.php");
?>