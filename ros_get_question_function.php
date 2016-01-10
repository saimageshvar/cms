<?php
	
	function getQues($conn)
	{
		if($conn)
		{
			$query = sprintf("select level from ros_users where k_id='%s';",$_POST['k_id']);
			$result=mysqli_fetch_assoc(mysqli_query($conn,$query));
			$level=$result['level'];
			$query=sprintf("select level,img_count,img0,img1,img2,img3 from ros_questions where level=%s;",$level);
			$result=mysqli_fetch_assoc(mysqli_query($conn,$query));
			$question=array();
			$question['level']=$result['level'];
			$question['img_count']=$result['img_count'];
			for($i=0;$i<$result['img_count'];$i++)
			{
				$question['img'.$i]=$result['img'.$i];
			}
			
			echo json_encode($question);
			//sending json in post req
			
			$url = '';
			
			$ch = curl_init($url);
			$jsonDataEncoded = json_encode($question);
			curl_setopt($ch, CURLOPT_POST, 1);
			curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonDataEncoded);
			curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json')); 
			$send_result = curl_exec($ch);
			
			
			
		}
	}
?>
