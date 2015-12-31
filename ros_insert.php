<?php
	include 'ros_uploadImage.php';
	include 'dbConfig.php';
	$count=rmv_ws($_POST["count"]);
	$level=rmv_ws($_POST["level"]);
	$answer=rmv_ws($_POST["answer"]);
	$url_hint=rmv_ws($_POST["url_hint"]);
	$clue=rmv_ws($_POST["clue"]);
	
	//db access
	$conn=mysqli_connect("$host","$mysql_u","$mysql_p","$mysql_db");
	//$conn=mysqli_connect($hostname,$username,$password,$dbname);
	
	if($conn)
	{
		$query = sprintf("insert into ros_questions values(%s,'%s','%s',%s,'%s',null,null,null,null);",$level,$answer,$url_hint,$count,$clue);
		
		if (!mysqli_query($conn,$query)) 
		{
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
		}
		$i=0;
		for(;$i < $count;$i++)
		{
			$status=upload($level."_".$i,$level,$conn,$i);
			switch($status)
			{
				case 0 : echo "<script type='text/javascript'>alert('File is not an image')</script>";
						 break 2;
				
				case 1 : echo "<script type='text/javascript'>alert('Image already exists')</script>";
						 break 2;
						 
				case 2 : echo "<script type='text/javascript'>alert('Image size exceeds 25MB')</script>";
						 break 2;
						 
				case 3 : echo "<script type='text/javascript'>alert('Invalid image format')</script>";
						 break 2;
			}
		}
		if($i==$count)
			echo "<script type='text/javascript'>alert('Image uploaded successfully')</script>";
		mysqli_close($conn);
		echo "<meta http-equiv='refresh' content='0;index.php'/>";
	}	
						//removing whitespace
			function rmv_ws($value)
			{
				global $flag;
				$value=trim($value);
				if($value=="" && $flag==true)
				{
					echo "You have entered a blank space.<br/><br/>";
					global $flag;
					$flag=false;
				}
				return $value;
			}
			
			
			
?>