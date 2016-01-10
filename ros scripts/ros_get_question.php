<?php 
	include 'header.php';
	include 'dbConfig.php';
	include 'ros_get_question_function.php';
	$conn=mysqli_connect($host,$mysql_u,$mysql_p,$mysql_db);
	getQues($conn);
	mysqli_close($conn);
	
?>