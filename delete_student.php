<?php
require_once 'connection.php';
$con->query("DELETE FROM `student` WHERE `Reg_No` = '$_GET[student]'") or die();
$con->query("DELETE FROM `issued_book_details` WHERE `Student_ID` = '$_GET[student]'") or die();
header('location: Students.php');
?>

