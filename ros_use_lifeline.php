<?php 
	include 'header.php';
	include 'dbConfig.php';
	include 'ros_get_question_function.php';
	$con=mysqli_connect($host,$mysql_u,$mysql_p,$mysql_db);
	if($con)
	{
		$query = sprintf("update ros_users set level=level+1 where k_id='%s' and level < 10;",$_POST['k_id']);
		mysqli_query($con,$query);
		getQues($con);
		mysqli_close($con);
	}
?>