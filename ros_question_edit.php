		<?php
			include 'header.php';
			include 'dbConfig.php';

			$conn=mysqli_connect($host,$mysql_u,$mysql_p,$mysql_db);
			
			if($conn)
			{
				$query = sprintf("select * from ros_questions where level=%s;",$_GET['level']);
				$result=mysqli_query($conn,$query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row=mysqli_fetch_assoc($result))
					{
						$count=$row['img_count'];
						$level=$row['level'];
					?>
					<div class="row">
					<div class="col-md-3"></div>
					<div class="col-md-6">
					<div class="row">
					<div class="col-md-2">
						<h4>Level<br><br><br>
						Answer<br><br>
						Url Hint<br><br><br>
						Clue <br><br><br>
						Count<br><br><br>
						</h4>
					</div>
					<div class="col-md-10">

					<form method="post" action="index.php" enctype="multipart/form-data">
						<input type="hidden" id="hiddenCount" value="<?php echo $count ?>" />
						<input type="number"  class="form-control" name="level" id="level" value="<?php echo $row['level'] ?>" required  readonly/> <br />
						<input type="text" name="answer" class="form-control"  value="<?php echo $row['answer'] ?>" required /> <br />
						<input type="text" name="url_hint"  class="form-control" value="<?php echo $row['url_hint'] ?>" required /> <br />
						<input type="text" name="clue" class="form-control" value="<?php echo $row['clues'] ?>" required /> <br />
						 <input type="number" name="count"  class="form-control" id="count" value="<?php echo $row['img_count'] ?>" min="0" max="4" onchange="generate(this.value)" required /> <br />
						 <input type="text" name="ros_edit_question" value="yes" hidden /> <br />						
						
						<?php
							$query=sprintf("select img0,img1,img2,img3 from ros_questions where level=".$level.";");
							$urls=mysqli_query($conn,$query);
							$img_path="";
							$url=mysqli_fetch_assoc($urls);
							for($i=0;$i< $count;$i++)
							{
							$serv="localhost/k!/cms/";	
							?>
							
							<img id="<?php echo 'i'.$level.'_'.$i ?>" src="<?php echo $img_path.$url['img'.$i] ?>" height="75" width="75" />
							<input type="file" name="<?php echo $level.'_'.$i ?>"  id="<?php echo $level.'_'.$i ?>"/>
							<input  type="button" value="remove" id="<?php echo 'b'.$level.'_'.$i ?>" onclick="rem('<?php echo $level.'_'.$i ?>','<?php echo '/'.$url['img'.$i] ?>','<?php echo $level ?>','<?php echo $i ?>'); "/>
							<input  type="hidden" id="img_url" value="'<?php echo $img_path.$url['img'.$i] ?>'" />
							<br/>
							
							<?php	
							}
							
						}
					?>
					<br />
					<span id="fooBar">&nbsp;</span>
					<br />
					<center>
					<a href="index.php"><button class="btn btn-primary"  >cancel</button>
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </a>
           
					<input class="btn btn-primary" type="submit" value="update">
					</center>
					
				</form>
						
					</div>
					</div>

				</div>
					<div  class="col-md-3"></div>

				<script>
					function rem(name,url,level,id)
					{
						
						$("#"+name).remove();
						$("#b"+name).remove();
						$("#i"+name).remove();
						var cnt=document.getElementById("hiddenCount").value;
						cnt=cnt-1;
						document.getElementById("count").value=cnt;
						document.getElementById("hiddenCount").value=cnt;
						window.location="ros_deleteImage.php?url="+url+"&level="+level+"&id="+id+"&count="+cnt;
						
					}
				</script>
				
				<script>
					function generate(count)
					{
						$("#fooBar").empty();
						var level=document.getElementById("level").value;
						var old_count=document.getElementById("hiddenCount").value;
						//count=count-old_count;
						for(i=old_count;i<count;i++)
						{
							var element = document.createElement("input");
							element.setAttribute("type", "file");
							element.setAttribute("name", level+"_"+i);
							element.setAttribute("required","true");						
							var foo = document.getElementById("fooBar");
							foo.appendChild(element);
						}
					}
				</script>
				<?php	
				}
				mysqli_close($conn);	
			}
		?>
