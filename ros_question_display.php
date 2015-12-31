<?php
			@session_start();
/*			if(isset($_SESSION["k_id"]))
				echo "<p align='right'>Welcome ".$_SESSION["name"]."</p>";
			else
				echo "<p align='right'><a href='register.php'>Register</a></p>";

*/
			include 'dbConfig.php';
			$conn=mysqli_connect($host,$mysql_u,$mysql_p,$mysql_db);
			//$conn=mysqli_connect($hostname,$username,$password,$dbname);
			
			if($conn)
			{

				$query = sprintf("select level,answer,url_hint,img_count,clues from ros_questions;");
				$result=mysqli_query($conn,$query) or die ("query error");
				if(mysqli_num_rows($result) > 0)
				{
					echo "<table class='table 	' ><tr><th>Level</th><th>Answer</th><th>Url Hint</th><th>Clue</th><th>Image Url</th><th>Edit</th><th>Delete</th></tr>";
					
					while($row=mysqli_fetch_assoc($result))
					{
						$count=$row['img_count'];
						$level=$row['level'];
						echo "<tr>";
						echo "<td rowspan='".$count."'>".$row['level']."</td>";
						echo "<td rowspan='".$count."'>".$row['answer']."</td>";
						echo "<td rowspan='".$count."'>".$row['url_hint']."</td>";
						echo "<td rowspan='".$count."'>".$row['clues']."</td>";
								
						$flag=false;
						$i=0;
						$sql=sprintf("select img0,img1,img2,img3 from ros_questions where level=%s;",$level);
						$urls=mysqli_query($conn,$sql);
						$url=mysqli_fetch_assoc($urls);
						while($i < $count)
						{
							
							if($flag==true)
							{
								echo "<tr>";
							}
							echo "<td>".$url['img'.$i] ."</td>";
							if($flag==false)
							{
								echo "<td rowspan='".$count."'><a href='ros_question_edit.php?level=".$level."'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a></td>";		
								echo "<td rowspan='".$count."'><a href='ros_question_delete.php?level=".$level."'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>";		
								echo "</tr>";
								$flag=true;
							}
							$i++;
						}
						echo "</tr>";
					}
					echo "</table>";
				}
				
				
				mysqli_close($conn);	
			}
		?>