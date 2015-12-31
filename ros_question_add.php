		<center><h2> Add New Question</h2></center><br>
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8">				
				<form method="post" action="ros_insert.php?update=false" enctype="multipart/form-data">
					 <input class="form-control"  placeholder="Level" type="number" name="level" id="level" min="1" required /> <br />
					 <input class="form-control" type="text" placeholder="Answer" name="answer" required /> <br />
					 <input  class="form-control"type="text" placeholder="Url Hint" name="url_hint" required /> <br />
					 <input  class="form-control"type="text" placeholder="Clue" name="clue"  required /> <br />
					 <input  class="form-control" type="number" placeholder="Count" name="count" id="count" onchange="generate(this.value)" min="0" max="4" required /> 
					 <p class="help-block">Maximum only 4 images.</p>
					<span id="fooBar">&nbsp;</span>
					<br>
					 <center><button type="submit"  class="btn btn-default">Submit</button>
					 </center>
				</form>	
			</div>
			<div class="col-md-2"></div>
		</div>

		<script>
			function generate(count)
			{
				$("#fooBar").empty();
				var level=document.getElementById("level").value;
				for(i=0;i<count;i++)
				{
					var element = document.createElement("input");
					element.setAttribute("type", "file");
					element.setAttribute("name", level+"_"+i);
					var foo = document.getElementById("fooBar");
					foo.appendChild(element);					
				}				
			}			
		</script>