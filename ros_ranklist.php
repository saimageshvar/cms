<?php 
	include 'header.php';
	include 'dbConfig.php';
	$conn=mysqli_connect($host,$mysql_u,$mysql_p,$mysql_db);
	if($conn)
	{
		$query = sprintf("SELECT a1.k_id, a1.level, a1.start_time , count(a2.level) Rank 
		FROM ros_users a1, ros_users a2 
		WHERE a1.level < a2.level OR (a1.level=a2.level AND a1.k_id = a2.k_id) 
		GROUP BY a1.k_id, a1.level 
		ORDER BY a1.level DESC, a1.start_time asc;");
		
		$ros_ranklist=mysqli_query($conn,$query);
		$ranklist=array();
		
		while($ros_rank=mysqli_fetch_assoc($ros_ranklist))
		{
			$ranklist[]=$ros_rank;
			
		}
		
		
		echo json_encode($ranklist);
		mysqli_close($conn);
		
		
	}			