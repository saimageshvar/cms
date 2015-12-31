<?php
	include 'dbConfig.php';
	$k_id=$_POST["kid"];
	//$k_id="10002FE3";
	$conn=mysqli_connect("$host","$mysql_u","$mysql_p","$mysql_db");
	$block_user=sprintf("update ros_users set blocked=true where k_id='%s'",$k_id);
	if(mysqli_query($conn,$block_user))
		echo "blocked";
	mysqli_close($conn);
		//echo "<meta http-equiv='refresh' content='0;index.php'/>";
?>