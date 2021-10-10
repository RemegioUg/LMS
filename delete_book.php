<?php
	require_once 'connection.php';
	if (isset($_GET['book'])) {
		echo '<script>alert("Are you sure you want to delete")</script>';
		$con->query("DELETE FROM `book` WHERE `ISBN` = '$_GET[book]'") or die();
		$con->query("DELETE FROM `issued_book_details` WHERE `Book_ID` = '$_GET[book]'") or die();

		header("location: Admin.php");
		$con->close();
	}
	
?>


