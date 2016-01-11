<?php 
	include 'header.php';
	include 'dbConfig.php';
	$conn=mysqli_connect($host,$mysql_u,$mysql_p,$mysql_db);
	if($conn)
	{
		$set_row_number=sprintf("set @row_number=0");
		mysqli_query($conn,$set_row_number);
		$query = sprintf("SELECT (@row_number:=@row_number + 1) AS rank,k_id,name from (select a1.k_id,a1.name, a1.level, a1.start_time , count(a2.level) 
		FROM ros_users a1, ros_users a2 
		WHERE a1.level < a2.level OR (a1.level=a2.level AND a1.k_id = a2.k_id) 
		GROUP BY a1.k_id, a1.level 
		ORDER BY a1.level DESC, a1.start_time asc) as ranklist;");
		
		$ros_ranklist=mysqli_query($conn,$query);
		$ranklist=array();
		
		while($ros_rank=mysqli_fetch_assoc($ros_ranklist))
		{
			$ranklist[]=$ros_rank;
			
		}
		
		
		echo json_encode($ranklist);
		mysqli_close($conn);
		
		
	}				