<?php
session_start();
if (!isset($_SESSION["username"])) {
    header("Location: ../403.php");
    exit();
}
