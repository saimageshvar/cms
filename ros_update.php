<?php
	include 'ros_uploadImage.php';
	include'dbConfig.php';
	$count=rmv_ws($_POST["count"]);
	$level=rmv_ws($_POST["level"]);
	$answer=rmv_ws($_POST["answer"]);
	$url_hint=rmv_ws($_POST["url_hint"]);
	$clue=rmv_ws($_POST["clue"]);
	//db access
	$conn=mysqli_connect($host,$mysql_u,$mysql_p,$mysql_db);
	if($conn)
	{
		$query = sprintf("update ros_questions set answer='%s',url_hint='%s',img_count=%s,clues='%s' where level=%s;",$answer,$url_hint,$count,$clue,$level);
		
		if (!mysqli_query($conn,$query)) 
		{
			$message  = 'Invalid query: ' . mysql_error() . "\n";
			$message .= 'Whole query: ' . $query;
			die($message);
		}	
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
	
	for($i=0;$i < $count;$i++)
	upload($level."_".$i,$level,$conn,$i);
	mysqli_close($conn);
	//echo "<meta http-equiv='refresh' content='0;index.php'/>";
	
?>