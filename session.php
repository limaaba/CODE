<?php
session_start();
require_once "dbconfig.php";

if (!isset($_SESSION['userid'])) {
    header('location: index.php');
    exit;
}

$sql = "SELECT * FROM tbladmin WHERE id = ?";
$query = $dbh->prepare($sql);
$query->execute([$_SESSION['userid']]);
$row = $query->fetch(PDO::FETCH_OBJ);

if ($row) {

       $userresult = $row->username;
   
} else {
}
?>