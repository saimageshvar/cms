<?php
	
	include 'dbConfig.php';
	$url=$_GET['url'];
	$level=$_GET['level'];
	$id=$_GET['id'];
	$count=$_GET['count'];
	unlink(".".substr($url,0));
	$remove=sprintf("update ros_questions set img%s=null,img_count=img_count-1 where level=%s",$id,$level);
	//$conn=mysqli_connect($hostname,$username,$password,$dbname);
	mysqli_query($con,$remove);
	for($i=$id;$i<$count;$i++)
	{
		$update=sprintf("update ros_questions set img%s=REPLACE (img%s, '_%s', '_%s') where level=%s",$i,$i+1,$i+1,$i,$level);
		mysqli_query($con,$update);
		$select=sprintf("select img%s,img%s from ros_questions where level=%s",$i,$i+1,$level);
		$img=mysqli_fetch_assoc(mysqli_query($con,$select));
		$j=$i+1;
		echo rename ($img['img'.$j],$img['img'.$i]);
		//echo $img['img'.$j];
		//echo $img['img'.$i];
		//$img_extension = pathinfo();
		
	}
	$update=sprintf("update ros_questions set img%s=null where level=%s",$count,$level);
		mysqli_query($con,$update);
	header("location:javascript://history.go(-1)");
	//echo "done";
	
	
	
	
?>